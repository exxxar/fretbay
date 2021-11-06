@extends("layouts.app")

@section("content")
    <header-component></header-component>
    <div class="container" style="padding-top:30px;">
        <div class="row">
            <profile-legal-documents-page ></profile-legal-documents-page>
        </div>
    </div>
    <footer-component></footer-component>
@endsection
