@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <div class="my-account-container">
        <div class="row">
            <profile-my-vehicles-page></profile-my-vehicles-page>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
