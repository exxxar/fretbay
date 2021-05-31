@extends('layouts.admin')

@section('content')
    <users-profiles></users-profiles>
@endsection

@section('javascript')

    <script src="{{ asset('js/admin/Chart.min.js') }}"></script>
    <script src="{{ asset('js/admin/coreui-chartjs.bundle.js') }}"></script>
    <script src="{{ asset('js/admin/main.js') }}" defer></script>
@endsection
