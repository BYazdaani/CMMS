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
                            <h2>Modifier PDR</h2>
                            <p><strong>NB: </strong>thank you for being careful</p>
                        </div>
                        <form method="post" action="{{route("spare_parts.update",['spare_part'=>$sparePart])}}"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <label for="code">Code</label>
                                            <input id="code" type="text" class="form-control" placeholder="Code"
                                                   name="code" required value="{{$sparePart->code}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <label for="designation">Désignation</label>
                                            <input id="designation" type="text" class="form-control"
                                                   placeholder="Désignation" name="designation" required
                                                   value="{{$sparePart->designation}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <label for="init_stock">Stock initial</label>
                                            <input type="number" class="form-control" placeholder="Stock initial"
                                                   name="init_stock" required disabled
                                                   value="{{$sparePart->init_stock}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <label for="alert_threshold">Seuil d'alerte</label>
                                            <input type="number" class="form-control" placeholder="Seuil d'alerte"
                                                   name="alert_threshold" required
                                                   value="{{$sparePart->alert_threshold}}">
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
                                            <label for="unite_price">Prix unitaire</label>
                                            <input type="number" class="form-control" placeholder="Prix unitaire"
                                                   name="unite_price" required value="{{$sparePart->unite_price}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <label for="stock_site_id">Site de stockage</label>
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="stock_site_id" id="stock_site_id">
                                                @foreach($sites as $site)
                                                    <option
                                                        @if($sparePart->stock_site_id == $site->id) selected @endif
                                                    value="{{$site->id}}">{{$site->designation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control"
                                                   placeholder="emplacement" name="emplacement"
                                                   required value="{{$site->emplacement}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <label for="spare_part_category_id">Catégorie</label>
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="spare_part_category_id" id="spare_part_category_id">
                                                @foreach($categories as $category)
                                                    <option
                                                        @if($sparePart->spare_part_category_id == $category->id) selected
                                                        @endif
                                                        value="{{$category->id}}">{{$category->tag}}</option>
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
                                            <label for="description">Description</label>
                                            <textarea id="description" type="text" rows="5" class="form-control"
                                                      placeholder="Description"
                                                      name="description">{{$sparePart->description}}</textarea>
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
                                            <label for="observation">Observation</label>
                                            <textarea id="observation" type="text" rows="5" class="form-control"
                                                      placeholder="Observation"
                                                      name="observation">{{$sparePart->observation}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-primary notika-btn-success">Mettre à jour</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
