@extends('layouts.app')

@section('content')

    <div id="app">

        <invoice csrf_token="{{csrf_token()}}" v-bind:spares="{{json_encode($spares)}}" v-bind:providers="{{json_encode($providers)}}"></invoice>

    </div>

@endsection()

@section('bodyScripts')
    <script src="{{asset("./js/app.js")}}"></script>

@endsection
