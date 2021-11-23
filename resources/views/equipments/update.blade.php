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
                    <div class="form-element-list">
                        <div class="cmp-tb-hd bcs-hd">
                            <h2 style="font-size: 15px">Modifier equipement</h2>
                            <p><strong>NB: </strong>Attached files should respect formats and size format</p>
                        </div>
                        <form method="post" action="{{route("equipments.update",['equipment'=>$equipment])}}"
                              enctype="multipart/form-data"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Equipement"
                                                   name="name" value="{{$equipment->name}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control"
                                                   placeholder="Code d'équipement" name="code"
                                                   value="{{$equipment->code}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control"
                                                   placeholder="Numéro de série" name="serial_number"
                                                   value="{{$equipment->serial_number}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Modèle"
                                                   name="model" value="{{$equipment->model}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control"
                                                   placeholder="Pression air comprimé" name="compressed_air_pressure"
                                                   value="{{$equipment->technicalFile->compressed_air_pressure}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Début"
                                                   name="start" value="{{$equipment->technicalFile->start}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Puissance"
                                                   name="power" value="{{$equipment->technicalFile->power}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Fréquence"
                                                   name="frequency" value="{{$equipment->technicalFile->frequency}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Courant"
                                                   name="electric_power"
                                                   value="{{$equipment->technicalFile->electric_power}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Tension"
                                                   name="voltage" value="{{$equipment->technicalFile->voltage}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Poids"
                                                   name="weight" value="{{$equipment->technicalFile->weight}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Capacité"
                                                   name="capacity" value="{{$equipment->technicalFile->capacity}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Longueur"
                                                   name="length" value="{{$equipment->technicalFile->length}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Largeur"
                                                   name="width" value="{{$equipment->technicalFile->width}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Hauteur"
                                                   name="height" value="{{$equipment->technicalFile->height}}">
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
                                                      placeholder="Description"
                                                      name="description">{{$equipment->technicalFile->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control"
                                                   placeholder="Outillage spécial" name="special_tools"
                                                   value="{{$equipment->technicalFile->special_tools}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Fabricant"
                                                   name="manufacturer"
                                                   value="{{$equipment->technicalFile->manufacturer}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Adresse"
                                                   name="address" value="{{$equipment->technicalFile->address}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Téléphone"
                                                   name="phone_number"
                                                   value="{{$equipment->technicalFile->phone_number}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Email"
                                                   name="email" value="{{$equipment->technicalFile->email}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Cout"
                                                   name="cost" value="{{$equipment->technicalFile->cost}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Date de fabrication</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="date" class="form-control"
                                                   placeholder="Date de fabrication" name="date_of_manufacture"
                                                   value="{{$equipment->technicalFile->date_of_manufacture}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Date d’achat</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="date" class="form-control" placeholder="Date d’achat"
                                                   name="date_of_purchase"
                                                   value="{{$equipment->technicalFile->date_of_purchase}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Date de mise en service</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="date" class="form-control"
                                                   placeholder="Date de mise en service" name="commissioning_date"
                                                   value="{{$equipment->technicalFile->commissioning_date}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Date installation</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="date" class="form-control"
                                                   placeholder="Date installation" name="installation_date"
                                                   value="{{$equipment->technicalFile->installation_date}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Salle</h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="zone_id">
                                                @foreach($zones as $zone)
                                                    <option
                                                        @if($equipment->zone_id == $zone->id)
                                                        selected
                                                        @endif
                                                        value="{{$zone->id}}">{{$zone->room}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">
                                            Photo de l'équipement
                                            <span style="font-size: 12px">
                                                @if(isset($equipment->technicalFile->picture))
                                                    <a href="{{asset($equipment->technicalFile->picture)}}"
                                                       target="_blank"><i class="notika-icon notika-down-arrow"> Télécharger</i></a>
                                                @endif
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-up-arrow"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <input type="file" class="form-control" name="picture">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Schéma électrique
                                            <span style="font-size: 12px">
                                                @if(isset($equipment->technicalFile->electrical_schema))
                                                    <a href="{{asset($equipment->technicalFile->electrical_schema)}}"
                                                       target="_blank"><i class="notika-icon notika-down-arrow"> Télécharger</i></a>
                                                @endif
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-up-arrow"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <input type="file" class="form-control" name="electrical_schema">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Plan
                                            <span style="font-size: 12px">
                                                @if(isset($equipment->technicalFile->plan))
                                                    <a href="{{asset($equipment->technicalFile->plan)}}"
                                                       target="_blank"><i class="notika-icon notika-down-arrow"> Télécharger</i></a>
                                                @endif
                                            </span></h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-up-arrow"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <input type="file" class="form-control" name="plan">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="nk-int-mk">
                                        <h2 style="font-size: 15px">Fichiers attachés
                                            <span style="font-size: 12px; color: #0d4c92">
                                                @if(isset($equipment->technicalFile->equipmentAttachedFile))
                                                    <a href="{{asset($equipment->technicalFile->equipmentAttachedFile->file)}}"
                                                       target="_blank"><i class="notika-icon notika-down-arrow"> Télécharger</i></a>
                                                @else
                                                    <i class="notika-icon notika-close"> No files</i>
                                                @endif
                                            </span></h2>
                                    </div>
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-up-arrow"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <input type="file" class="form-control" name="file">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-primary notika-btn-success">Modifier</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
