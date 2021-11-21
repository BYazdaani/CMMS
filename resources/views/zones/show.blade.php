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
                                        <h2>{{$zone->room}}</h2>
                                        <p>Code de la salle <span class="bread-ntd">{{$zone->room_code}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                @can("zone_edit")
                                    <div class="breadcomb-report">
                                        <a href="{{route("zones.edit",['zone'=>$zone])}}" data-toggle="tooltip" data-placement="left" title="Modifier Zone"
                                                class="btn"><i class="notika-icon notika-edit"></i></a>
                                    </div>
                                @endcan
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
                        <div class="basic-tb-hd">
                            <h4>Liste des utilisateurs du système</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Code Equipement</th>
                                    <th>Nom</th>
                                    <th>Modele</th>
                                    <th>Numéro de Série</th>
                                    <th>Zone d'Activité</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($equipments as $equipment)
                                    <tr>
                                        <td>{{$equipment->id}}</td>
                                        <td>
                                            <a href="{{route("equipments.show", ["equipment"=>$equipment])}}">{{$equipment->code}}</a>
                                        </td>
                                        <td>{{$equipment->name}}</td>
                                        <td>{{$equipment->model}}</td>
                                        <td>{{$equipment->serial_number}}</td>
                                        <td>{{$equipment->zone->room}}</td>
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
