@extends('layouts.app')

@section('content')
    <main id="content">
        <!-- Hero Section -->
        <div class="bg-gray-100">
            <div class="d-flex align-items-center height-100vh">
                <div class="container text-center">
                    <div class="w-lg-60 mx-lg-auto">
                        <!-- SVG Mockup -->
                        <object type="image/svg+xml" data="../../assets/svg/components/error-404.svg"></object>
                        <!-- End SVG Mockup -->

                        <!-- Title -->
                        <h1 class="display-3 font-size-48--md-down font-weight-medium mb-3">Page not found</h1>
                        <p class="lead mb-0">Oops! Looks like you followed a bad link.</p>
                        <p class="lead mb-0">If you think this is a problem with us, please <a href="contacts-agency.html">tell us</a>.</p>
                        <!-- End Title -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Hero Section -->
    </main>
@endsection
