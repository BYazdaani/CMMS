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
                                        <a href="#"><i class="notika-icon notika-print"></i></a>
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
                                                    <input type="hidden" value="{{$workRequest->id}}"
                                                           name="work_request_id">
                                                    <div class="modal-body">
                                                        <h2>Nouveau Ordre de Travail</h2>
                                                        <br>
                                                        <div class="row">
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                                                                <option
                                                                                    value="{{$type}}">{{$type}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
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
                                                                                <option
                                                                                    value="{{$nature}}">{{$nature}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                                <div class="nk-int-mk">
                                                                    <h5>Intervenant :</h5>
                                                                </div>
                                                                <div class="form-group ic-cmp-int">
                                                                    <div class="form-ic-cmp">
                                                                        <i class="notika-icon notika-promos"></i>
                                                                    </div>
                                                                    <div class="nk-int-st ">
                                                                        <select class="selectpicker form-control"
                                                                                data-live-search="true"
                                                                                name="maintenance_technician_id">
                                                                            @foreach($technicians as $technician)
                                                                                <option
                                                                                    value="{{$technician->id}}">{{$technician->user->name}}</option>
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
                                                        <button type="submit" class="btn btn-default">Save changes
                                                        </button>
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
                    <div class="form-element-list mg-t-10">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2>Création du compte</h2>
                            <p><strong>NB: </strong>thank you for being careful </p>
                        </div>
                        <form method="post" action="{{route("work_requests.update",['work_request'=>$workRequest])}}"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="equipment_id">
                                                @foreach($equipments as $equipment)
                                                    <option @if($workRequest->equipment_id == $equipment->id) selected
                                                            @endif  value="{{$equipment->id}}">{{$equipment->code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Lot N:"
                                                   name="lot" value="{{$workRequest->lot}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="priority">
                                                @foreach($priorities as $priority)
                                                    <option @if($workRequest->priority == $priority) selected
                                                            @endif value="{{$priority}}">{{$priority}}</option>
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
                                            <textarea type="text" rows="5" class="form-control"
                                                      placeholder="Instructions :"
                                                      name="description">{{$workRequest->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-primary notika-btn-success">Modifier</button>
                                @can("work_request_delete")
                                    <form id="my-delete-form"
                                          action="{{route("work_requests.destroy",["work_request"=>$workRequest])}}"
                                          method="GET" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger notika-btn-success">Supprimer
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

    @can("work_order_access")
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
                                        <td>{{$workOrder->admin->user->name}}</td>
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
    @endcan
@endsection()
