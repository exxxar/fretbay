@extends('layouts.admin')

@section('content')
    <verifications-index-page items="{{$verifications}}" deleted_items="{{$deleted}}">
    </verifications-index-page>
@endsection
