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
