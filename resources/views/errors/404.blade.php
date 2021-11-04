@extends('layouts.app')

@section('content')

    <header-component></header-component>


    <main id="content">
        <!-- Hero Section -->

            <div class="d-flex align-items-center height-100vh">
                <div class="container text-center">
                    <div class="w-lg-60 mx-lg-auto">
                        <!-- SVG Mockup -->
                        <img src="/images/common/icons/general/content-loader.gif" alt="" style="width:300px; object-fit: cover;">
                        <!-- End SVG Mockup -->

                        <!-- Title -->
                        <h1 class="display-3 font-size-48--md-down font-weight-medium mb-3">Page not found</h1>
                        <p class="lead mb-0">Oops! Looks like you followed a bad link.</p>
                        <p class="lead mb-0">If you think this is a problem with us, please <a href="contacts-agency.html">tell us</a>.</p>
                        <!-- End Title -->
                        <a href="/" class="btn btn-outline-primary mt-5 p-2 pr-5 pl-5">Main page</a>
                    </div>
                </div>
            </div>

        <!-- End Hero Section -->
    </main>

    <footer-component></footer-component>
@endsection
