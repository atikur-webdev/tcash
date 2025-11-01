@extends('user.layouts.master')
@section('content')
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
@endsection
