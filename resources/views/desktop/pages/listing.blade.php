@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <listing-page listing_id="{{$id}}"></listing-page>
    <footer-component></footer-component>
@endsection
