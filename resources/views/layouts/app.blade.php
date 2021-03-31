<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fretbay') }}</title>

    <!-- Scripts -->
    <script
        src="{{ env("APP_DEBUG")?asset('js/desktop/app.js'):asset("js/desktop/app.min.js") }}?version={{env("APP_VERSION")}}"
        defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">

    <link rel="icon" href="/images/logo.svg">


    <link href='https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

 {{--   <link rel="stylesheet" href="{{asset("/css/custom.css")}}">--}}
    <!-- Styles -->
    <link
        href="{{ env("APP_DEBUG")?asset('css/desktop/app.css'):asset("css/desktop/app.min.css") }}?version={{env("APP_VERSION")}}"
        rel="stylesheet">


</head>
<body>
<div id="app">

    <preloader-component></preloader-component>

    @yield('content')

    <system-notification-component></system-notification-component>

    <modals-component></modals-component>
</div>
</body>
</html>
