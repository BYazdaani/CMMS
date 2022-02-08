<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @include('layouts.headerScripts')


</head>
<body>

<!-- Data Table area Start-->
<div class="data-table-area">
    <div class="normal-table-list mg-t-10">
        <div class="table-responsive text-center">
            <table class="table table-bordered ">
                <tbody>
                <tr>
                    <td colspan="3"><img src="{{asset('../theme/img/logo/logo.png')}}"
                                         style="height: 30px" alt=""/></td>
                    <td colspan="6"><h3>RAPPORT D'INTERVENTION</h3></td>
                    <td colspan="3"></td>
                </tr>
                <tr>
                    <td colspan="3">N° DT</td>
                    <td colspan="3"><strong>DT{{$work_order->workRequest->id}}</strong></td>
                    <td colspan="3">N° OT</td>
                    <td colspan="3"><strong>OT{{$work_order->id}}</strong></td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Equipement :</strong></td>
                    <td colspan="3">{{$work_order->workRequest->equipment->name}}</td>
                    <td colspan="3"><strong>Code :</strong></td>
                    <td colspan="3">{{$work_order->workRequest->equipment->code}}</td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Date :</strong></td>
                    <td colspan="3">{{$work_order->created_at->toDateString()}}</td>
                    <td colspan="3"><strong>Heure :</strong></td>
                    <td colspan="3">{{$work_order->created_at->toTimeString()}}</td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Intervenant :</strong></td>
                    <td colspan="9">{{$work_order->maintenanceTechnician->user->name}}</td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Début :</strong></td>
                    <td colspan="3">{{$start->created_at->toDateString()}}</td>
                    <td colspan="3"><strong>Fin :</strong></td>
                    <td colspan="3">{{$end->created_at->toDateString()}}</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="height: 100px">
                        <strong>Description Problème :</strong> {{$work_order->workRequest->description}} </td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Nature :</strong></td>
                    <td colspan="9">{{$work_order->interventionReport->nature}}</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="height: 100px">
                        <strong>Détails Intervention
                            :</strong> {{$work_order->interventionReport->observation}} </td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="height: 200px">
                        <div class="basic-tb-hd">
                            <h4>Piéces de Rechange utilisées</h4>
                        </div>
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Code</th>
                                    <th>Designation</th>
                                    <th>Catégories</th>
                                    <th>Quantité</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($work_order->interventionReport->spareParts as $sparePart)
                                    <tr>
                                        <td>{{$sparePart->code}}</td>
                                        <td>{{$sparePart->designation}}</td>
                                        <td>{{$sparePart->sparePartCategory->tag}}</td>
                                        <td>{{$sparePart->pivot->quantity}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </td>
                </tr>
                </tbody>
            </table>
            <br>
            <h5 class="text-left">
                Visa
            </h5>
        </div>
    </div>
</div>
<!-- Data Table area End-->

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>

</body>
</html>
