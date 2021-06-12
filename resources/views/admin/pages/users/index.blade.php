@extends('layouts.admin')

@section('content')
    <users-index-page items="{{$users}}" deleted_items="{{$deleted}}">
    </users-index-page>
@endsection


