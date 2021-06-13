@extends('layouts.admin')

@section('content')
    <permissions-index-page items="{{$permissions}}" deleted_items="{{$deleted}}">
    </permissions-index-page>
@endsection
