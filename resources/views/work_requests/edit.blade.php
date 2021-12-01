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
                            <h2>Création du compte</h2>
                            <p><strong>NB: </strong>thank you for being careful </p>
                        </div>
                        <form method="post" action="{{route("work_requests.update",['work_request'=>$workRequest])}}"
                              onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                            @csrf
                            @method("PUT")
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="equipment_id">
                                                @foreach($equipments as $equipment)
                                                    <option @if($workRequest->equipment_id == $equipment->id) selected
                                                            @endif  value="{{$equipment->id}}">{{$equipment->code}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-edit"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input required type="text" class="form-control" placeholder="Lot N:"
                                                   name="lot" value="{{$workRequest->lot}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true"
                                                    name="priority">
                                                @foreach($priorities as $priority)
                                                    <option @if($workRequest->priority == $priority) selected
                                                            @endif value="{{$priority}}">{{$priority}}</option>
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
                                            <textarea type="text" rows="5" class="form-control"
                                                      placeholder="Description anomalie :"
                                                      name="description">{{$workRequest->description}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-primary notika-btn-success">Modifier</button>
                                @can("work_request_delete")
                                    <form id="my-delete-form"
                                          action="{{route("work_requests.destroy",["work_request"=>$workRequest])}}"
                                          method="GET" class="d-none">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger notika-btn-success">Supprimer
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
