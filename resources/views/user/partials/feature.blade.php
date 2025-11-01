 <div class="container-xxl feature py-5">
        <div class="container">

            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">{{ $chooseContent->data_value->choose_title }}</p>
                    <h1 class="display-5 mb-4">{{ $chooseContent->data_value->choose_heading }}</h1>
                    <p class="mb-4">{{ $chooseContent->data_value->choose_content }}
                    </p>
                    <a class="btn btn-primary py-3 px-5" href="">Explore More</a>
                </div>
                <div class="col-lg-6">
                    <div class="row g-4 align-items-center">
                        <div class="col-md-6">
                            <div class="row g-4">
                                @foreach ($chooseElement->take(3) as $element)
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="feature-box border rounded p-4">
                                        <i class="fa fa-check fa-3x text-primary mb-3"></i>
                                        <h4 class="mb-3">{{ $element->data_value->card_name }}</h4>
                                        <p class="mb-3">{{ $element->data_value->card_content }}</p>
                                        <a class="fw-semi-bold" href="">Read More <i
                                                class="fa fa-arrow-right ms-1"></i></a>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                         @foreach ($chooseElement->take(4)->skip(3) as $element)
                        <div class="col-md-6 wow fadeIn" data-wow-delay="0.7s">
                            <div class="feature-box border rounded p-4">
                                <i class="fa fa-check fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">{{ $element->data_value->card_name }}</h4>
                                <p class="mb-3">{{ $element->data_value->card_content }}</p>
                                <a class="fw-semi-bold" href="">Read More <i class="fa fa-arrow-right ms-1"></i></a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>