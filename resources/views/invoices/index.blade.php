@extends('layouts.app')

@section('headerScripts')

    <!-- Data Table JS============================================ -->
    <link rel="stylesheet" href="{{asset('../theme/css/jquery.dataTables.min.css')}}">

@endsection()

@section('content')

    <!-- Start tabs area-->
    <div class="tabs-info-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget-tabs-int">
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#list">List</a></li>

                                <li><a data-toggle="tab" href="#add">Ajouter</a></li>

                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="list" class="tab-pane fade in active">
                                    <div class="data-table-list">
                                        <div class="table-responsive">
                                            <table id="data-table-basic" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Facture</th>
                                                    <th>Fourniseur</th>
                                                    <th>Accusée par</th>
                                                    <th>Date</th>
                                                    <th class="text-center justify-content-center">Detail</th>
                                                    <th class="text-center justify-content-center">Supprimer</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($invoices as $invoice)
                                                    <tr>
                                                        <td>{{$invoice->invoice_code}}</td>
                                                        <td>{{$invoice->provider->name}}</td>
                                                        <td>{{$invoice->admin->user->name}}</td>
                                                        <td>{{$invoice->created_at->toDateTimeString()}}</td>
                                                        <td class="text-center justify-content-center">
                                                            <a href="{{route("invoices.show", ["invoice"=>$invoice])}}">Consulter</a>
                                                        </td>
                                                        <td class="text-center justify-content-center">
                                                            <form action="{{route("invoices.destroy", ["invoice"=>$invoice])}}" method="post" onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                                                                @csrf
                                                                @method("DELETE")
                                                                <button type="submit" class="btn-danger notika-btn-danger"><i class="notika-icon notika-close"></i></button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <div id="add" class="tab-pane fade">
                                    <div id="app">
                                        <invoice csrf_token="{{csrf_token()}}" v-bind:spares="{{json_encode($spares)}}"
                                                 v-bind:providers="{{json_encode($providers)}}"></invoice>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End tabs area-->

@endsection()

@section('bodyScripts')
    <script src="{{asset("./js/app.js")}}"></script>

@endsection
