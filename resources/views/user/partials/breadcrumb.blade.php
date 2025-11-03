    <div class="container-fluid page-header mb-5 wow fadeIn breadcrumb-wrap" data-wow-delay="0.1s" data-src="{{ asset('assets/images/'. $breadcrumbContent->data_value->file) }}">
        <div class="container">
            <h1 class="display-3 mb-4 animated slideInDown">{{ $breadcrumbContent->data_value->breadcrumb_title }}</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">About</li>
                </ol>
            </nav>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var bg = $('.page-header').data('src');
                if (bg) {
                    $('.page-header').css({
                        'background-image': 'url(' + bg + ')',
                        'background-size': 'cover',
                        'background-position': 'center',
                        'background-repeat': 'no-repeat'
                    });
                }
            });
        </script>
    @endpush
