@extends('layouts.admin')

@section('content')
    <things-index-page items="{{$things}}" deleted_items="{{$deleted}}">
    </things-index-page>
@endsection
