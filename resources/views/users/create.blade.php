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
                            <p><strong>NB: </strong>thank you for being careful with users functions, which will affect automatically permissions and roles to use the system</p>
                        </div>
                        <form method="post" action="{{route("users.store")}}" onsubmit="return confirm('Êtes-vous sûr de vouloir soumettre ce formulaire ?');">
                            @csrf
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-support"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Nom & Prénom" name="name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-mail"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Email" name="email">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-phone"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Numéro téléphone" name="phone_number">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-eye"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="password" class="form-control" placeholder="Mot de passe" name="password">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-eye"></i>
                                        </div>
                                        <div class="nk-int-st">
                                            <input type="password" class="form-control" placeholder="Confirmer mot de passe" name="password_confirmation">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true" name="role">
                                                @foreach($roles as $role)
                                                    <option value="{{$role}}">{{$role}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <div class="form-group ic-cmp-int">
                                        <div class="form-ic-cmp">
                                            <i class="notika-icon notika-promos"></i>
                                        </div>
                                        <div class="nk-int-st ">
                                            <select class="selectpicker form-control" data-live-search="true" name="department_id">
                                                @foreach($departments as $department)
                                                    <option value="{{$department->id}}">{{$department->designation}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-example-int mg-t-15">
                                <button type="submit" class="btn btn-primary notika-btn-success">Submit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
