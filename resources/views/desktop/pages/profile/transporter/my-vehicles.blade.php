@extends("layouts.app")

@section("content")
    <header-transporter-profile-component></header-transporter-profile-component>
    <div class="my-account-container">
        <div class="row">
            <profile-menu-component></profile-menu-component>
            <profile-my-vehicles-page></profile-my-vehicles-page>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
