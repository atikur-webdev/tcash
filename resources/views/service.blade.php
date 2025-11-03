@extends('user.layouts.master')
@section('content')
    <!-- Page Header Start -->
 @include('user.partials.breadcrumb')
    <!-- Page Header End -->


    <!-- Service Start -->
  @include('user.partials.service')
    <!-- Service End -->


    <!-- Callback Start -->
       @include('user.partials.callback')
    <!-- Callback End -->

@endsection