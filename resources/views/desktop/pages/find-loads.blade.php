@extends("layouts.app")

@section("content")
    <preloader-component></preloader-component>

    <header-component :filter="true"></header-component>
    <find-loads-page></find-loads-page>

    <footer-component></footer-component>
@endsection
