@extends('layouts.admin')

@section('content')
    <listings-index-page items="{{$listings}}" deleted_items="{{$deleted}}">
    </listings-index-page>
@endsection
