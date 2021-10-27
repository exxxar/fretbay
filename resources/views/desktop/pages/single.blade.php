@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <single-page type="{{$type}}" index="{{$id}}"></single-page>
    <footer-component></footer-component>
@endsection
