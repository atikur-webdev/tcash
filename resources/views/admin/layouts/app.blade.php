<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($pageTitle) ? $pageTitle : '' }}</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>

    @yield('panel')

    <script src="{{ asset('assets/admin/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/admin/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/simplebar.js') }}"></script>
    <script src="{{ asset('assets/admin/js/dashboard.js') }}"></script>

    @stack('scripts')



</body>

</html>
