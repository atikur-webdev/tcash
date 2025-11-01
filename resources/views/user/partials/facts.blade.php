    <!-- Facts Start -->
    <div class="container-fluid facts my-5 py-5">
        <div class="container py-5">
            <div class="row g-5">
                @foreach ($statisticElement as $element)
                    <div class="col-sm-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                        <i class="fa fa-users fa-3x text-white mb-3"></i>
                        <h1 class="display-4 text-white" data-toggle="counter-up">
                            {{ $element->data_value->statistic_multi_count }}</h1>
                        <span class="fs-5 text-white">{{ $element->data_value->statistic_multi_title }}</span>
                        <hr class="bg-white w-25 mx-auto mb-0">
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!-- Facts End -->
