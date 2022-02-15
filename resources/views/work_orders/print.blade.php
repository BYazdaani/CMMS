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
                <thead>
                <tr>
                    <th colspan="12" class="text-center"></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td colspan="3"><img src="{{asset('../theme/img/logo/logo.png')}}"
                                         style="height: 30px" alt=""/></td>
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
                    <td colspan="3"><strong>N° DT: </strong></td>
                    <td colspan="3">DT{{$work_order->workRequest->id}}</td>
                </tr>
                <tr>
                    <td colspan="3"><strong>Date :</strong></td>
                    <td colspan="3">{{$work_order->created_at->toDateString()}}</td>
                    <td colspan="3"><strong>Heure :</strong></td>
                    <td colspan="3">{{$work_order->created_at->toTimeString()}}</td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="height: 200px">
                        <strong>Instructions :</strong> {{$work_order->description}} </td>
                </tr>
                <tr>
                    <td colspan="12" class="text-left" style="height: 200px">
                        <strong>Description anomalie
                            :</strong> {{$work_order->workRequest->description}} </td>
                </tr>
                @if($work_order->workOrderLogs->last()->status == "canceled")

                    <tr>
                        <td colspan="12" class="text-left" style="height: 200px">
                            <strong>Motif d'annulation
                                :</strong> {{$work_order->reason}} </td>
                    </tr>

                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Data Table area End-->

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>

</body>
</html>
