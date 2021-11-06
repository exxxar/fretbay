@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <div class="my-account-container">
        <div class="row">
            <profile-my-account-page></profile-my-account-page>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
