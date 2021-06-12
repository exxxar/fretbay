@extends('layouts.admin')

@section('content')
    <orders-index-page items="{{$orders}}" deleted_items="{{$deleted}}">
    </orders-index-page>
@endsection
