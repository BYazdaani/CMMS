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
                            <h2>Facture entrée</h2>
                            <p><strong>Date: </strong>{{$invoice->created_at->toDateTimeString()}}</p>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="provider" class="form-control-label">Fourniseur</label>
                                <input class="form-control" type="text" placeholder="Numéro Facture"
                                       value="{{$invoice->provider->name}}"
                                       id="provider" required disabled>
                            </div>
                            <div class="form-group col-lg-6 col-sm-12">
                                <label for="serial_number" class="form-control-label">Numéro Facture</label>
                                <input class="form-control" type="text" placeholder="Numéro Facture"
                                       value="{{$invoice->invoice_code}}"
                                       id="serial_number" required disabled>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-12 col-sm-12">
                                <hr>
                                <p>List PDR</p>
                            </div>
                        </div>
                        @foreach($invoice->spareParts as $sparePart)
                            <div class="row">
                                <div class="form-group col-lg-8 col-sm-12">
                                    <input value="{{$sparePart->code}}" class="form-control" type="text" disabled>
                                </div>
                                <div class="form-group col-lg-4 col-sm-12">
                                    <input value="{{$sparePart->pivot->quantity}}" class="form-control" type="number" disabled>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Data Table area End-->

@endsection()
