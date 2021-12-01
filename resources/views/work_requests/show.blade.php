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
                    <div class="normal-table-list mg-t-30">
                        <div class="table-responsive text-center">
                            <table class="table table-bordered ">
                                <thead>
                                <tr>
                                    <th colspan="12" class="text-center"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td colspan="3"><img src="{{asset('../theme/img/logo/logo.png')}}" style="height: 30px" alt=""/></td>
                                    <td colspan="6"><h3>DEMANDE DE TRAVAIL</h3></td>
                                    <td colspan="3">N° DT: <strong>DT{{$workRequest->id}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Département :</strong></td>
                                    <td colspan="3">{{$workRequest->user->department->designation}}</td>
                                    <td colspan="3"><strong>Priorité :</strong></td>
                                    <td colspan="3">{{$workRequest->priority}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Equipement :</strong></td>
                                    <td colspan="3">{{$workRequest->equipment->name}}</td>
                                    <td colspan="3"><strong>Code :</strong></td>
                                    <td colspan="3">{{$workRequest->equipment->code}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Demandeur :</strong></td>
                                    <td colspan="3">{{$workRequest->user->name}}</td>
                                    <td colspan="3"><strong>Lot N° :</strong></td>
                                    <td colspan="3">{{$workRequest->lot}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Date :</strong></td>
                                    <td colspan="3">{{$workRequest->created_at->toDateString()}}</td>
                                    <td colspan="3"><strong>Heure :</strong></td>
                                    <td colspan="3">{{$workRequest->created_at->toTimeString()}}</td>
                                </tr>
                                <tr>
                                    <td colspan="12" rowspan="5" class="text-left" style="height: 200px"><strong>Description anomalie :</strong> {{$workRequest->description}} </td>
                                </tr>
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
