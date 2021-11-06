@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <div class="my-account-container">
        <div class="row">
            <profile-my-company-page></profile-my-company-page>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
