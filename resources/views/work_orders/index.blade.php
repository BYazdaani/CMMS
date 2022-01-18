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
                            <h4>Ordres de travail</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))
                                        <th><strong>Technicien</strong></th>
                                    @endif
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
                                @foreach($workOrders as $workOrder)
                                    <tr>
                                        @if(auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Super Admin'))
                                            <th><strong>{{$workOrder->maintenanceTechnician->user->name}}</strong></th>
                                        @endif
                                        <td>{{$workOrder->admin->user->name ?? "By System"}}</td>
                                        <td>{{$workOrder->type}}</td>
                                        <td>{{$workOrder->nature}}</td>
                                        <td>{{$workOrder->date}}</td>
                                        <td>{{$workOrder->hour}}</td>
                                        <th>@switch($workOrder->workOrderLogs->last()->status)
                                                @case("created") en attente @break
                                                @case("opened") en cours @break
                                                @case("started") traitée @break
                                                @case("done") annullée @break
                                                @case("canceled") annullée @break
                                                @default Erreur @break
                                            @endswitch
                                        </th>
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
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
