@extends('layouts.app')

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
                                        <a href="#"><i class="notika-icon notika-print"></i></a>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>Demande de Travail N°: <a href="{{route("work_requests.show",["work_request"=>$work_order->workRequest])}}" >DT{{$work_order->workRequest->id}}</a></h2>
                                        <p>Etat de l'ordre:
                                            <span class="bread-ntd">
                                                {{$work_order->workOrderLogs->last()->status}}
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @can("work_order_delete")
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                    <div class="breadcomb-report">
                                        <a href="#"
                                           onclick="event.preventDefault(); document.getElementById('delete-form').submit();"
                                           class="btn btn-danger notika-btn-success"><i
                                                class="notika-icon notika-close"></i> Annuller</a>
                                        <form id="delete-form"
                                              action="{{ route('work_orders.destroy',['work_order'=>$work_order]) }}"
                                              method="post" class="d-none">
                                            @csrf
                                            @method("DELETE")
                                        </form>
                                    </div>
                                </div>
                            @endcan
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
                    <div class="normal-table-list mg-t-10">
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
                                    <td colspan="6"><h3>ORDRE DE TRAVAIL</h3></td>
                                    <td colspan="3">N° OT: <strong>OT{{$work_order->id}}</strong></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Intervenant :</strong></td>
                                    <td colspan="3">{{$work_order->maintenanceTechnician->user->name}}</td>
                                    <td colspan="3"><strong>Priorité :</strong></td>
                                    <td colspan="3">{{$work_order->workRequest->priority}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Equipement :</strong></td>
                                    <td colspan="3">{{$work_order->workRequest->equipment->name}}</td>
                                    <td colspan="3"><strong>Code :</strong></td>
                                    <td colspan="3">{{$work_order->workRequest->equipment->code}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Type :</strong></td>
                                    <td colspan="3">{{$work_order->type}}</td>
                                    <td colspan="3"><strong>Nature :</strong></td>
                                    <td colspan="3">{{$work_order->nature}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"><strong>Date :</strong></td>
                                    <td colspan="3">{{$work_order->created_at->toDateString()}}</td>
                                    <td colspan="3"><strong>Heure :</strong></td>
                                    <td colspan="3">{{$work_order->created_at->toTimeString()}}</td>
                                </tr>
                                <tr>
                                    <td colspan="12"  class="text-left" style="height: 200px">
                                        <strong>Instructions :</strong> {{$work_order->description}} </td>
                                </tr>
                                <tr>
                                    <td colspan="12"  class="text-left" style="height: 200px">
                                        <strong>Instructions :</strong> {{$work_order->workRequest->description}} </td>
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
