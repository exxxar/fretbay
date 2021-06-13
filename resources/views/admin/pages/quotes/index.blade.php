@extends('layouts.admin')

@section('content')
    <quotes-index-page items="{{$quotes}}" deleted_items="{{$deleted}}">
    </quotes-index-page>
@endsection
