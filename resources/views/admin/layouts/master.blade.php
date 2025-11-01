@extends('admin.layouts.app')
@section('panel')
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <!-- Sidebar Start -->
        @include('admin.partials.sidebar')
        <!--  Sidebar End -->


        <div class="body-wrapper">
            <!--  Header Start -->
            @include('admin.partials.header')
            <!--  Header End -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>
@endsection
