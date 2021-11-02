@extends('layouts.app')

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
                                <li><a data-toggle="tab" href="#ot">Ordre de Travaille</a></li>
                                <li><a data-toggle="tab" href="#ri">Rapport d'invetaire</a></li>
                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="information" class="tab-pane fade in active">
                                    <div class="contact-inner">
                                        <div class="contact-hd widget-ctn-hd">
                                            <h2>{{$user->name}}</h2>
                                        </div>
                                        <div class="contact-dt">
                                            <ul class="contact-list widget-contact-list">
                                                <li><i class="notika-icon notika-phone"></i>+213{{$user->phone_number}}
                                                </li>
                                                <li><i class="notika-icon notika-mail"></i>{{$user->email}}</li>
                                                <li><i class="notika-icon notika-finance"></i>{{$user->function}}</li>
                                                <li>
                                                    <i class="notika-icon notika-promos"></i>Permissions: {{$user->roles[0]->name}}
                                                </li>
                                                <li>
                                                    <i class="notika-icon notika-settings"></i>Compte: {{$user->account_state ? "Activé" : "Bloqué"}}
                                                </li>
                                            </ul>
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
                                    <div class="tab-ctn">
                                        <p>dt</p>
                                    </div>
                                </div>
                                <div id="ot" class="tab-pane fade">
                                    <div class="tab-ctn">
                                        <p>ot</p>
                                    </div>
                                </div>
                                <div id="ri" class="tab-pane fade">
                                    <div class="tab-ctn">
                                        <p>ri</p>
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
