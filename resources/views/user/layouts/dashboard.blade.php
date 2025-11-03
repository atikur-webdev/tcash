<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Finanza - Financial Services Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/user/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/user/css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('assets/user/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/user/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">


        @include('user.partials.user_navbar')


        <div class="container">
            @yield('panel')
        </div>
    </div>
</body>

</html>


<!-- JavaScript Libraries -->
<script src="{{ asset('assets/user/js/jquery-3.7.1.min.js') }}"></script>
<script src="{{ asset('assets/user/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/user/js/wow.min.js') }}"></script>
<script src="{{ asset('assets/user/js/easing.min.js') }}"></script>
<script src="{{ asset('assets/user/js/waypoints.min.js') }}"></script>
<script src="{{ asset('assets/user/js/owlcarousel.min.js') }}"></script>
<script src="{{ asset('assets/user/js/counterup.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/izitoast.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ asset('assets/user/js/main.js') }}"></script>

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
