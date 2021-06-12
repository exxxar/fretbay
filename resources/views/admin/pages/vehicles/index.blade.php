@extends('layouts.admin')

@section('content')
    <vehicles-index-page items="{{$vehicles}}" deleted_items="{{$deleted}}">
    </vehicles-index-page>
@endsection
