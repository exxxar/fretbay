@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <profile-page :info="{{json_encode($info)}}"></profile-page>
    <footer-component></footer-component>
@endsection
