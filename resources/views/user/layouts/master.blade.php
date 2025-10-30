@extends('user.layouts.app')
@section('panel')
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->
    @include('user.partials.navbar')
    <!-- Navbar End -->

    <!-- Carousel Start -->
    @include('user.partials.carousel')
    <!-- Carousel End -->

    <!-- About Start -->
    @include('user.partials.about')
    <!-- About End -->

    <!-- Facts Start -->
    @include('user.partials.facts')
    <!-- Facts End -->

    <!-- Features Start -->
    @include('user.partials.feature')
    <!-- Features End -->

    <!-- Service Start -->
    @include('user.partials.service')
    <!-- Service End -->

    <!-- Callback Start -->
    @include('user.partials.callback')
    <!-- Callback End -->

    <!-- Projects Start -->
    @include('user.partials.projects')
    <!-- Projects End -->

    <!-- Team Start -->
    @include('user.partials.team')
    <!-- Team End -->

    <!-- Testimonial Start -->
    @include('user.partials.testiomonal')
    <!-- Testimonial End -->

    <!-- Footer Start -->
    @include('user.partials.footer')
    <!-- Footer End -->


    <!-- Copyright Start -->
    @include('user.partials.copyright')
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded-circle back-to-top"><i
            class="bi bi-arrow-up"></i></a>
@endsection
