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

    @yield("headerScripts")

</head>
<body class="font-sans antialiased">

<!-- Start Header Top Area -->
@include('layouts.topHeader')
<!-- End Header Top Area -->

<!-- Mobile Menu start -->
{{--@include('layouts.mobileHeader')--}}
<!-- Mobile Menu end -->

<!-- Main Menu area start-->
@include('layouts.mainMenu')
<!-- Main Menu area End-->

@yield('content')

@yield('bodyScripts')

@include('layouts.bodyScripts')

</body>
</html>
