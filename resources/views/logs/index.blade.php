@extends('layouts.app')

@section('content')

    <!-- Breadcomb area Start-->
    <div class="breadcomb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcomb-list">
                        <div class="row">
                            @can("user_management_access")
                                <div class="normal-table-list">
                                    <div class="basic-tb-hd">
                                        <h2>Log des utilisateurs</h2>
                                        <p>for the actual version the system record connexion logs only</p>
                                    </div>
                                    <div class="bsc-tbl">
                                        <table class="table table-sc-ex">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>User</th>
                                                <th>Fonction</th>
                                                <th>Role</th>
                                                <th>Date/ Heure</th>
                                                <th>Adresse IP</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($logs as $log)
                                                @if($log->user->id != auth()->id())
                                                    <tr>
                                                        <td>{{$log->id}}</td>
                                                        <td>{{$log->user->name}}</td>
                                                        <td>{{$log->user->function}}</td>
                                                        <td>{{$log->user->roles->first()->name}}</td>
                                                        <td>{{$log->login_at}}</td>
                                                        <td>{{$log->login_ip}}</td>
                                                        <td>Connexion</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                            </tbody>
                                        </table>
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

@endsection()
