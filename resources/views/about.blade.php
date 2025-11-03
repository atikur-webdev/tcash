@extends('user.layouts.master')
@section('content')
    <!-- Page Header Start -->

     @include('user.partials.breadcrumb')


    <!-- About Start -->
     @include('user.partials.about')
    <!-- About End -->


    <!-- Facts Start -->
    @include('user.partials.facts')
    <!-- Facts End -->


    <!-- Team Start -->
     @include('user.partials.team')
    <!-- Team End -->

@endsection

