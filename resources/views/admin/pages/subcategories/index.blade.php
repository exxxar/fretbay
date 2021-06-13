@extends('layouts.admin')

@section('content')
    <subcategories-index-page items="{{$subcategories}}" deleted_items="{{$deleted}}">
    </subcategories-index-page>
@endsection


