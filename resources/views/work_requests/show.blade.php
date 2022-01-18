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
                                        <a href="{{route("work_requests.print",["work_request"=>$workRequest])}}" target="_blank">
                                            <i class="notika-icon notika-print"></i>
                                        </a>
                                    </div>
                                    <div class="breadcomb-ctn">
                                        <h2>DT{{$workRequest->id}}</h2>
                                        <p>Etat de la demande:
                                            <span class="bread-ntd">
                                                @switch($workRequest->status)
                                                    @case(0) En Attente @break
                                                    @case(1) En Cours @break
                                                    @case(2) Traitée @break
                                                    @case(3) Annullée @break
                                                    @default N/A @break
                                                @endswitch
                                            </span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            @can("work_order_create")
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-3">
                                    <div class="breadcomb-report">

                                        @if($workRequest->status !=3)

                                            <a href="#" data-toggle="modal" data-target="#addOrder"
                                               class="btn btn-success notika-btn-success"><i
                                                    class="notika-icon notika-settings"></i> Ajouter OT</a>

                                            <a href="#"
                                               onclick="event.preventDefault(); document.getElementById('cancel-form').submit();"
                                               class="btn btn-danger notika-btn-success"><i
                                                    class="notika-icon notika-close"></i> Annuller</a>
                                            <form id="cancel-form"
                                                  action="{{ route('work_requests.cancel',['work_request'=>$workRequest]) }}"
                                                  method="post" class="d-none">
                                                @csrf
                                            </form>

                                        @endif

                                    </div>
                                    <div class="modal fade" id="addOrder" role="dialog">
                                        <div class="modal-dialog modal-large">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;
                                                    </button>
                                                </div>
                                                <form action="{{route("work_orders.store")}}" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$workRequest->id}}" name="work_request_id">
                                                    <div class="modal-body">
                                                        <h2>Nouveau Ordre de Travail</h2>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="nk-int-mk">
                                                                    <h5>Type :</h5>
                                                                </div>
                                                                <div class="form-group ic-cmp-int">
                                                                    <div class="form-ic-cmp">
                                                                        <i class="notika-icon notika-promos"></i>
                                                                    </div>
                                                                    <div class="nk-int-st ">
                                                                        <select class="selectpicker form-control"
                                                                                data-live-search="true"
                                                                                name="type">
                                                                            @foreach($types as $type)
                                                                                <option value="{{$type}}">{{$type}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                           {{-- <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="nk-int-mk">
                                                                    <h5>Nature :</h5>
                                                                </div>
                                                                <div class="form-group ic-cmp-int">
                                                                    <div class="form-ic-cmp">
                                                                        <i class="notika-icon notika-promos"></i>
                                                                    </div>
                                                                    <div class="nk-int-st ">
                                                                        <select class="selectpicker form-control"
                                                                                data-live-search="true"
                                                                                name="nature">
                                                                            @foreach($natures as $nature)
                                                                                <option value="{{$nature}}">{{$nature}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>--}}
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="nk-int-mk">
                                                                    <h5>Intervenant :</h5>
                                                                </div>
                                                                <div class="form-group ic-cmp-int">
                                                                    <div class="form-ic-cmp">
                                                                        <i class="notika-icon notika-promos"></i>
                                                                    </div>
                                                                    <div class="nk-int-st ">
                                                                        <select class="selectpicker form-control"
                                                                                data-live-search="true" name="maintenance_technician_id">
                                                                            @foreach($technicians as $technician)
                                                                                <option value="{{$technician->id}}">{{$technician->user->name}}</option>
                                                                            @endforeach
                                                                        </select>
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
                                                                        <textarea type="text" rows="5"
                                                                                  class="form-control"
                                                                                  placeholder="Instructions :"
                                                                                  name="description"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-default">Save changes</button>
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal">Close
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
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
                                    <td colspan="3"><img src="{{asset('../theme/img/logo/logo.png')}}"
                                                         style="height: 30px" alt=""/></td>
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
                                    <td colspan="12" rowspan="5" class="text-left" style="height: 200px"><strong>Description
                                            anomalie :</strong> {{$workRequest->description}} </td>
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

    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))
        <!-- Data Table area Start-->
        <div class="data-table-area mg-t-30">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="data-table-list">
                            <div class="basic-tb-hd">
                                <h4>Ordres de travail</h4>
                            </div>
                            <div class="table-responsive">
                                <table id="data-table-basic" class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>Technicien</th>
                                        <th>Affecté par</th>
                                        <th>Type</th>
                                        <th>Nature</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Etat</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($workRequest->workOrders as $workOrder)
                                        <tr>
                                            <th>{{$workOrder->maintenanceTechnician->user->name}}</th>
                                            <td>{{$workOrder->admin->user->name ?? "By System"}}</td>
                                            <td>{{$workOrder->type}}</td>
                                            <td>{{$workOrder->nature}}</td>
                                            <td>{{$workOrder->date}}</td>
                                            <td>{{$workOrder->hour}}</td>
                                            <th>{{$workOrder->workOrderLogs->last()->status}}</th>
                                            <td><a href="{{route("work_orders.show", ["work_order"=>$workOrder])}}">Detail</a></td>
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
    @endif

@endsection()
