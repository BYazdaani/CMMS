@extends('layouts.app')

@section('headerScripts')

    <!-- Data Table JS============================================ -->
    <link rel="stylesheet" href="{{asset('../theme/css/jquery.dataTables.min.css')}}">

@endsection()

@section('content')


    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="basic-tb-hd">
                            <h4>Piéces de rechanges</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Pièce</th>
                                    <th>Catégorie</th>
                                    <th>Stock initial</th>
                                    <th>Stock actuel</th>
                                    <th>Seuil d'alerte</th>
                                    <th>Descriptif</th>
                                    <th>Stockage</th>
                                    <th>Observation</th>
                                    <th>Entrées</th>
                                    <th>Sorties</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($spare_parts as $spare_part)
                                    <tr>
                                        <td>{{$spare_part->code}}</td>
                                        <td>{{$spare_part->sparePartCategory->tag}}</td>
                                        <td>{{$spare_part->init_stock}}</td>
                                        <td
                                        @if($spare_part->actual_stock< $spare_part->alert_threshold)
                                            style="background-color: #ffbbbb"
                                            @endif
                                        >{{$spare_part->actual_stock}}</td>
                                        <td>{{$spare_part->alert_threshold}}</td>
                                        <td>{{$spare_part->description}}</td>
                                        <td>{{$spare_part->stockSite->designation}}</td>
                                        <td>{{$spare_part->observation}}</td>
                                        <td>{{$spare_part->in_stock}}</td>
                                        <td>{{$spare_part->out_stock}}</td>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
