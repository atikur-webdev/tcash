<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($pageTitle) ? $pageTitle : '' }}</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/styles.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/admin/css/izitoast.min.css') }}">
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
    <script src="{{ asset('assets/admin/js/izitoast.min.js') }}"></script>

    @stack('scripts')



<script>

    const colors = {
    success: '#28c76f',
    error: '#eb2222',
    warning: '#ff9f43',
    info: '#1e9ff2',
    }

    function showNotify(status, message) {
        iziToast[status]({
            title: status.charAt(0).toUpperCase() + status.slice(1),
            message: message,
            position: "topRight",
            backgroundColor: '#fff',
            titleSize: '1rem',
            messageSize: '1rem',
            titleColor: '#474747',
            messageColor: '#a2a2a2',
            iconColor: colors[status],
            progressBarColor: colors[status],
            transitionIn: 'obunceInLeft'
        });
    }

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            showNotify('error', "{{ $error }}");
        @endforeach
    @endif

    @if (session('success'))
        showNotify('success', "{{ session('success') }}");
    @endif

    @if (session('error'))
        showNotify('error', "{{ session('error') }}");
    @endif

    @if (session('info'))
        showNotify('info', "{{ session('info') }}");
    @endif
</script>

</body>

</html>
