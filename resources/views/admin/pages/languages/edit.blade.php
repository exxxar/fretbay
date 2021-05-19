@extends('layouts.admin')

@section('content')
    <languages-edit-page  :language="{{json_encode($language)}}"></languages-edit-page>
@endsection
