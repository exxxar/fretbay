@extends('layouts.admin')

@section('content')
    <permissions-show-page item="{{$permission}}">
    </permissions-show-page>
@endsection
