@extends('layouts.admin')

@section('content')
    <translations-edit-page  :translation="{{json_encode($translation)}}"></translations-edit-page>
@endsection
