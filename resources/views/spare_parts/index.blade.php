@extends('layouts.app')

@section('headerScripts')

    <!-- Data Table JS============================================ -->
    <link rel="stylesheet" href="{{asset('../theme/css/jquery.dataTables.min.css')}}">

@endsection()

@section('content')


    <!-- Start tabs area-->
    <div class="tabs-info-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="widget-tabs-int">
                        <div class="widget-tabs-list">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#list">List</a></li>

                                <li><a data-toggle="tab" href="#add">Ajouter</a></li>

                                <li><a data-toggle="tab" href="#in_stock">Entrées</a></li>

                            </ul>
                            <div class="tab-content tab-custom-st">
                                <div id="list" class="tab-pane fade in active">
                                        <div class="data-table-list">
                                            <div class="table-responsive">
                                                <table id="data-table-basic" class="table table-striped">
                                                    <thead>
                                                    <tr>
                                                        <th>Pièce</th>
                                                        <th>Catégorie</th>
                                                        <th>Stock initial</th>
                                                        <th>Stock actuel</th>
                                                        <th>Seuil d'alerte</th>
                                                        <th>Descriptif</th>
                                                        <th>Stockage</th>
                                                        <th>Observation</th>
                                                        <th>Entrées</th>
                                                        <th>Sorties</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($spare_parts as $spare_part)
                                                        <tr>
                                                            <td>{{$spare_part->code}}</td>
                                                            <td>{{$spare_part->sparePartCategory->tag}}</td>
                                                            <td>{{$spare_part->init_stock}}</td>
                                                            <td
                                                                @if($spare_part->actual_stock< $spare_part->alert_threshold)
                                                                style="background-color: #ffbbbb"
                                                                @endif
                                                            >{{$spare_part->actual_stock}}</td>
                                                            <td>{{$spare_part->alert_threshold}}</td>
                                                            <td>{{$spare_part->description}}</td>
                                                            <td>{{$spare_part->stockSite->designation}}</td>
                                                            <td>{{$spare_part->observation}}</td>
                                                            <td>{{$spare_part->in_stock}}</td>
                                                            <td>{{$spare_part->out_stock}}</td>
                                                            </th>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                </div>

                                <div id="add" class="tab-pane fade">
                                    <form method="post" action="{{route("spare_parts.store")}}" onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group ic-cmp-int">
                                                    <div class="form-ic-cmp">
                                                        <i class="notika-icon notika-edit"></i>
                                                    </div>
                                                    <div class="nk-int-st">
                                                        <input type="text" class="form-control" placeholder="Code" name="code" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group ic-cmp-int">
                                                    <div class="form-ic-cmp">
                                                        <i class="notika-icon notika-edit"></i>
                                                    </div>
                                                    <div class="nk-int-st">
                                                        <input type="number" class="form-control" placeholder="Stock initial" name="init_stock" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <div class="form-group ic-cmp-int">
                                                    <div class="form-ic-cmp">
                                                        <i class="notika-icon notika-edit"></i>
                                                    </div>
                                                    <div class="nk-int-st">
                                                        <input type="number" class="form-control" placeholder="Seuil d'alerte" name="alert_threshold" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group ic-cmp-int">
                                                    <div class="form-ic-cmp">
                                                        <i class="notika-icon notika-promos"></i>
                                                    </div>
                                                    <div class="nk-int-st ">
                                                        <select class="selectpicker form-control" data-live-search="true" name="stock_site_id">
                                                            @foreach($sites as $site)
                                                                <option value="{{$site->id}}">{{$site->designation}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group ic-cmp-int">
                                                    <div class="form-ic-cmp">
                                                        <i class="notika-icon notika-promos"></i>
                                                    </div>
                                                    <div class="nk-int-st ">
                                                        <select class="selectpicker form-control" data-live-search="true" name="spare_part_category_id">
                                                            @foreach($categories as $category)
                                                                <option value="{{$category->id}}">{{$category->tag}}</option>
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
                                                        <textarea type="text" rows="5" class="form-control" placeholder="Description" name="description"></textarea>
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
                                                        <textarea type="text" rows="5" class="form-control" placeholder="Observation" name="observation"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-example-int mg-t-15">
                                            <button type="submit" class="btn btn-primary notika-btn-success">Submit</button>
                                        </div>
                                    </form>
                                </div>

                                <div id="in_stock" class="tab-pane fade">

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
