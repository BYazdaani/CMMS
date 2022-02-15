@extends('layouts.app')

@section('headerScripts')

    <!-- Data Table JS============================================ -->
    <link rel="stylesheet" href="{{asset('../theme/css/jquery.dataTables.min.css')}}">

@endsection()

@section('content')

    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <div class="breadcomb-wp">
                                    <div class="breadcomb-icon">
                                        <i class="notika-icon notika-house"></i>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Fournisseurs</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                @can("stock_create")
                                    <div class="breadcomb-report">
                                        <a href="#" data-toggle="modal" data-target="#myModalone"
                                           data-placement="left" title="Modifier Zone"
                                           class="btn"><i class="notika-icon notika-edit"></i></a>
                                    </div>
                                @endcan
                            </div>

                            <div class="modal fade" id="myModalone" role="dialog">
                                <div class="modal-dialog modals-default">
                                    <div class="modal-content">
                                        <form method="post" action="{{route("providers.store")}}">
                                            @csrf
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Ajouter Fournisseur</h2>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input required type="text" class="form-control" placeholder="Nom & Prénom" name="name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input required type="text" class="form-control" placeholder="Email" name="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input required type="text" class="form-control" placeholder="Phone Number" name="phone_number">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-edit"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input required type="text" class="form-control" placeholder="Information" name="information">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-default" >
                                                    Ajouter
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Fermer
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcomb area End-->

    <!-- Data Table area Start-->
    <div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Nom et Prénom</th>
                                    <th>Numéro de téléphone</th>
                                    <th>Email</th>
                                    <th>Information</th>
                                    <th>Factures</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($providers as $provider)
                                    <tr>
                                        <td>#{{$provider->id}}</td>
                                        <td>{{$provider->name}}</td>
                                        <td>{{$provider->phone_number}}</td>
                                        <td>{{$provider->email}}</td>
                                        <td>{{$provider->information}}</td>
                                        <td>{{count($provider->invoices)}} Factures</td>
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
