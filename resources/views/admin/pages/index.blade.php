@extends('layouts.admin')

@section('content')
    @switch($display)
        @case("index")
            <index-page></index-page>
            @break  
        @case("objects-categories")
            <objects-categories></objects-categories>
            @break
        @case("objects-types")
            <objects-types></objects-types>
            @break
        @case("objects-transport-categories")
            <objects-transport-categories></objects-transport-categories>
            @break
        @case("objects-transport")
            <objects-transport></objects-transport>
            @break
        @case("orders")
            <orders-component></orders-component>
            @break
        @case("users-list")
            <users-list></users-list>
            @break
        @case("users-profiles")
            <users-profiles></users-profiles>
            @break
        @case("users-roles")
            <users-roles></users-roles>
            @break
        @case("users-roles-and-permissions")
            <users-roles-and-permissions></users-roles-and-permissions>
            @break
        @case("localization-languages")
            <users-roles-and-permissions></users-roles-and-permissions>
            @break
        @case("localization-translations")
            <users-roles-and-permissions></users-roles-and-permissions>
            @break


    @endswitch
@endsection

@section('javascript')

    <script src="{{ asset('js/admin/Chart.min.js') }}"></script>
    <script src="{{ asset('js/admin/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}" defer></script>
@endsection
