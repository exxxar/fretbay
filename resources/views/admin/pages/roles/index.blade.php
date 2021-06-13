@extends('layouts.admin')

@section('content')
    <roles-index-page items="{{$roles}}" deleted_items="{{$deleted}}">
    </roles-index-page>
@endsection
