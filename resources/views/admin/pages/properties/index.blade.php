@extends('layouts.admin')

@section('content')
    <properties-index-page items="{{$properties}}" deleted_items="{{$deleted}}">
    </properties-index-page>
@endsection
