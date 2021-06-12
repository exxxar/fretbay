@extends('layouts.admin')

@section('content')
    <categories-index-page items="{{$categories}}" deleted_items="{{$deleted}}">
    </categories-index-page>
@endsection

