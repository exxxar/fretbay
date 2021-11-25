@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <preloader-component></preloader-component>
    <listing-page listing_id="{{$id}}"></listing-page>
    <footer-component></footer-component>
@endsection
