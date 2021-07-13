<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fretbay') }}</title>

    <!-- Scripts -->

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="icon" href="/demenagement.png">


    <link
        href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic'
        rel='stylesheet' type='text/css'>

{{--   <link rel="stylesheet" href="{{asset("/css/custom.css")}}">--}}
<!-- Styles -->
    <link
        href="{{ env("APP_DEBUG")?asset('css/desktop/app.css'):asset("css/desktop/app.min.css") }}?version={{env("APP_VERSION")}}"
        rel="stylesheet">


    <link
        href="https://api.tiles.mapbox.com/mapbox-gl-js/v0.53.0/mapbox-gl.css"
        rel="stylesheet"
    />


    @if (Auth::check())
        <meta name="user" content="{{ App\User::self() }}"/>
    @endif

</head>
<body>

<div id="app">
    <preloader-component></preloader-component>
    @yield('content')
    <system-notification-component></system-notification-component>
    <modals-component>

    </modals-component>
    @if (Auth::check())
        <sidebar-component></sidebar-component>
    @endif
</div>

<script
    src="{{ env("APP_DEBUG")?asset('js/desktop/app.js'):asset("js/desktop/app.min.js") }}?version={{env("APP_VERSION")}}"
    defer></script>

</body>
</html>
