@extends('layouts.admin')

@section('content')
    <reviews-index-page items="{{$reviews}}" deleted_items="{{$deleted}}">
    </reviews-index-page>
@endsection


