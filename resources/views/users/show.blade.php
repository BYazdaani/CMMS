@extends('layouts.app')

@section('headerScripts')

    <!-- Data Table JS============================================ -->
    <link rel="stylesheet" href="{{asset('../theme/css/jquery.dataTables.min.css')}}">

@endsection()

@section("content")
    <!-- Start tabs area-->
    <div class="tabs-info-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget-tabs-int">
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#information">Informations</a></li>
                                @can("user_management_access")
                                    <li><a data-toggle="tab" href="#logs">Logs</a></li>
                                @endcan
                                <li><a data-toggle="tab" href="#dt">Demande de Travaille</a></li>
                                @if($user->hasRole('Maintenance Technician'))
                                    <li><a data-toggle="tab" href="#ot">Ordre de Travaille</a></li>
                                @endif
                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="information" class="tab-pane fade in active">
                                    <div class="contact-inner">
                                        <div class="contact-hd widget-ctn-hd">
                                            <h2>{{$user->name}}</h2>
                                        </div>
                                        <div class="contact-dt">
                                            <form method="post" action="{{route("users.update",['user'=>$user])}}"
                                                  onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-support"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Nom & Prénom" name="name"
                                                                       value="{{$user->name}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-mail"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Email" name="email"
                                                                       value="{{$user->email}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-phone"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="text" class="form-control"
                                                                       placeholder="Numéro téléphone"
                                                                       name="phone_number"
                                                                       value="{{$user->phone_number}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-eye"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="password" class="form-control" min="8"
                                                                       placeholder="Mot de passe" name="password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-eye"></i>
                                                            </div>
                                                            <div class="nk-int-st">
                                                                <input type="password" class="form-control" min="8"
                                                                       placeholder="Confirmer mot de passe"
                                                                       name="password_confirmation">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-promos"></i>
                                                            </div>
                                                            <div class="nk-int-st ">
                                                                <select class="selectpicker form-control"
                                                                        data-live-search="true" name="role">
                                                                    @foreach($roles as $role)
                                                                        <option
                                                                            @if($user->hasRole($role)) selected
                                                                            @endif value="{{$role}}">@if($role == "Client") Demandeur @else {{$role}} @endif</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                        <div class="form-group ic-cmp-int">
                                                            <div class="form-ic-cmp">
                                                                <i class="notika-icon notika-promos"></i>
                                                            </div>
                                                            <div class="nk-int-st ">
                                                                <select class="selectpicker form-control"
                                                                        data-live-search="true" name="department_id">
                                                                    @foreach($departments as $department)
                                                                        <option
                                                                            @if($user->department_id == $department->id) selected
                                                                            @endif
                                                                            value="{{$department->id}}">{{$department->designation}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-example-int mg-t-15">
                                                        <button type="submit"
                                                                class="btn btn-primary notika-btn-success">Modifier
                                                        </button>
                                                        @can("user_restrict")
                                                            @if($user->account_state)
                                                                <a href="{{route("users.restrict",["user"=>$user])}}"
                                                                   class="btn btn-danger notika-btn-success">Bloquer</a>
                                                            @else
                                                                <a href="{{route("users.restrict",["user"=>$user])}}"
                                                                   class="btn btn-success notika-btn-success">Activer</a>
                                                            @endif
                                                        @endcan
                                                    </div>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @can("user_management_access")
                                    <div id="logs" class="tab-pane fade">
                                        <div class="normal-table-list">
                                            <div class="basic-tb-hd">
                                                <h2>Log d'utilisateur</h2>
                                                <p>for the actual version the system record connexion logs only</p>
                                            </div>
                                            <div class="bsc-tbl">
                                                <table class="table table-sc-ex">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Date/ Heure</th>
                                                        <th>Adresse IP</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($logs as $log)
                                                        <tr>
                                                            <td>{{$log->id}}</td>
                                                            <td>{{$log->login_at}}</td>
                                                            <td>{{$log->login_ip}}</td>
                                                            <td>Connexion</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endcan
                                <div id="dt" class="tab-pane fade">
                                    <div class="data-table-list">
                                        <div class="basic-tb-hd">
                                            <h4>Demandes de travaille</h4>
                                        </div>
                                        <div class="table-responsive">
                                            <table id="data-table-basic" class="table table-striped">
                                                <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Heure</th>
                                                    <th>Equipement</th>
                                                    <th>Code</th>
                                                    <th>Priorité</th>
                                                    <th>Etat</th>
                                                    <th></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($workRequests as $workRequest)
                                                    <tr>
                                                        <td>{{$workRequest->created_at->toDateString()}}</td>
                                                        <td>{{$workRequest->created_at->toTimeString()}}</td>
                                                        <td>{{$workRequest->equipment->name}}</td>
                                                        <td>{{$workRequest->equipment->code}}</td>
                                                        <td>{{$workRequest->priority}}</td>
                                                        <td>
                                                            @switch($workRequest->status)

                                                                @case(0) en attente @break
                                                                @case(1) en cours @break
                                                                @case(2) traitée @break
                                                                @case(3) annullée @break
                                                                @default N/A @break
                                                            @endswitch
                                                        </td>
                                                        <td>
                                                            <a href="{{route("work_requests.show", ["work_request"=>$workRequest])}}">Detail</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                @if($user->hasRole('Maintenance Technician'))
                                    <div id="ot" class="tab-pane fade">
                                        <div class="data-table-list">
                                            <div class="basic-tb-hd">
                                                <h4>Ordres de travail</h4>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="data-table-basic" class="table table-striped">
                                                    <thead>
                                                    <tr>
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
                                                    @foreach($user->maintenanceTechnician->workOrders as $workOrder)
                                                        <tr>
                                                            <td>{{$workOrder->admin->user->name ?? "By System"}}</td>
                                                            <td>{{$workOrder->type}}</td>
                                                            <td>{{$workOrder->interventionReport->nature ?? "N/A"}}</td>
                                                            <td>{{$workOrder->date}}</td>
                                                            <td>{{$workOrder->hour}}</td>
                                                            <th>
                                                                @switch($workOrder->workOrderLogs->last()->status)
                                                                    @case("created") en attente @break
                                                                    @case("opened") en cours @break
                                                                    @case("started") traitée @break
                                                                    @case("done") annullée @break
                                                                    @case("canceled") annullée @break
                                                                    @default Erreur @break
                                                                @endswitch</th>
                                                            <td>
                                                                <a href="{{route("work_orders.show", ["work_order"=>$workOrder])}}">Detail</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End tabs area-->
@endsection()
