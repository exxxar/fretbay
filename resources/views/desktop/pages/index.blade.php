@extends("layouts.app")

@section("content")
    <header-content-component background="/images/home/video-bg.png" auth="{{Auth::check()}}">

    </header-content-component>
    <index-page></index-page>
    <footer-component></footer-component>
@endsection
