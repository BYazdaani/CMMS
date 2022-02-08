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
            <!-- Data Table area Start-->
            <div class="data-table-area">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="normal-table-list">
                            <div class="table-responsive text-center">
                                <table class="table table-bordered ">
                                    <thead>
                                    <tr>
                                        <th colspan="6" class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td colspan="2"><img
                                                src="{{asset('../theme/img/logo/logo.png')}}"
                                                style="height: 30px" alt=""/></td>
                                        <td colspan="6"><h3>Dossier Technique</h3></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Equipement</strong></td>
                                        <td colspan="2"><strong>Code Equipement</strong>
                                        </td>
                                        <td colspan="2"><strong>Emplacement</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{$equipment->name}}</td>
                                        <td colspan="2">{{$equipment->code}}</td>
                                        <td colspan="2">{{$equipment->zone->room}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" rowspan="14"><img
                                                src="{{asset($equipment->technicalFile->picture)}}"
                                                style="object-fit: cover; max-width: 600px"
                                                alt=""/></td>
                                        <td colspan="2"><strong>Caractéristique
                                                technique</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Modèle</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->model}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">N Série</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->serial_number}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Puisssance</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->power}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Tension</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->voltage}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Courant</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->electric_power}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Fréquence</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->frequency}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Poids</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->weight}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Capacité</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->capacity}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Pression</td>
                                        <td colspan="1" style="color: #0d4c92"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Dimenssion</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Longeur</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->length}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Largeur</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->width}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="1">Hauteur</td>
                                        <td colspan="1"
                                            style="color: #0d4c92">{{$equipment->technicalFile->height}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4"><strong>Données du
                                                Fournisseur</strong></td>
                                        <td colspan="2"><strong>Caractéristique
                                                technique</strong></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Fabricant</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->manufacturer}} </td>
                                        @if(isset($equipment->technicalFile->electrical_schema))
                                            <td colspan="2"><a
                                                    href="{{asset($equipment->technicalFile->electrical_schema)}}"
                                                    target="_blank"><i
                                                        class="notika-icon notika-down-arrow"></i></a>
                                                <u> Schéma électrique</u></td>
                                        @else
                                            <td colspan="2"><i> No Schema</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Adresse</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->address}} </td>
                                        @if(isset($equipment->technicalFile->plan))
                                            <td colspan="2"><a
                                                    href="{{asset($equipment->technicalFile->plan)}}"
                                                    target="_blank"><i
                                                        class="notika-icon notika-down-arrow"></i></a>
                                                <u> Plan Autocad</u></td>
                                        @else
                                            <td colspan="2"><i> No Plan</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Téléphone</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->phone_number}} </td>
                                        @if(isset($equipment->technicalFile->equipmentAttachedFile))
                                            <td colspan="2"><a
                                                    href="{{asset($equipment->technicalFile->equipmentAttachedFile->file)}}"
                                                    target="_blank"><i
                                                        class="notika-icon notika-down-arrow"></i></a>
                                                <u> Autre Fichiers</u></td>
                                        @else
                                            <td colspan="2"><i> No Files</i></td>
                                        @endif
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>E-mail</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->email}} </td>
                                        <td colspan="2"><strong>Outillage spécial</strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Cout</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->cost}} </td>
                                        <td colspan="2"
                                            rowspan="5">{{$equipment->technicalFile->special_tools}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Date de Fabrication</strong>
                                        </td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->date_of_manufacture}} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Date d'Achat</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->date_of_purchase}} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Date d'Installation</strong>
                                        </td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->installation_date}} </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"><strong>Date de Mise en
                                                Service</strong></td>
                                        <td colspan="2"
                                            style="color: #0d4c92">{{$equipment->technicalFile->commissioning_date}} </td>
                                    </tr>
                                    <tr class="text-left">
                                        <td colspan="6"><strong>Description: </strong> {{$equipment->technicalFile->description}}</td>
                                    </tr>
                                    <!--                                                                <tr>
                                                                                                        <td colspan="4"><a><i
                                                                                                                    class="notika-icon notika-next"></i></a>
                                                                                                            <u> Pièce de rechange</u></td>
                                                                                                    </tr>
                                                                                                    <tr>
                                                                                                        <td colspan="4"><a><i
                                                                                                                    class="notika-icon notika-next"></i></a>
                                                                                                            <u> Fiche d'entretien préventif</u></td>
                                                                                                    </tr>-->

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data Table area End-->
        </div>
    </div>
</div>
<!-- Data Table area End-->

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>

</body>
</html>
