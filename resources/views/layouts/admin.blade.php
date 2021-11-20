<!DOCTYPE html>
<html lang="en">
<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Allotrans Admin">
    <title>Allotrans Admin</title>
    <link rel="apple-touch-icon" sizes="57x57" href="images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon/favicon-16x16.png">

    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Icons-->
    <link href="{{ asset('css/admin/free.min.css') }}" rel="stylesheet"> <!-- icons -->
    <link href="{{ asset('css/admin/flag.min.css') }}" rel="stylesheet"> <!-- icons -->
    <!-- Main styles for this application-->
    <link href="{{ asset('css/admin/app.css') }}" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css" rel="stylesheet">

    @yield('css')

    <link rel="icon" href="/images/logo.svg">

    <link href="{{ asset('css/admin/coreui-chartjs.css') }}" rel="stylesheet">

    @if (Auth::check())
        <meta name="user" content="{{ App\User::self() }}" />
    @endif

</head>


<body class="c-app">

@include("admin.partials.sidebar")

<div class="c-wrapper" id="app">
    <notifications :position="'top left'" :group="'info'"></notifications>

    {{--<header-component items="{{Route::currentRouteName()}}" admin="{{route("admin.index")}}"></header-component>--}}
    <div class="c-body">
        <main class="c-main">
            @yield('content')
        </main>
        <footer-component></footer-component>
    </div>
</div>

<!-- CoreUI and necessary plugins-->
<script src="{{ asset('js/admin/app.js') }}" defer></script>
<script src="{{ asset('js/admin/coreui.bundle.min.js') }}" defer></script>
<script src="{{ asset('js/admin/coreui-utils.js') }}" defer></script>
@yield('javascript')


</body>
</html>
