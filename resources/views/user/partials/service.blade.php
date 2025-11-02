    <!-- Service Start -->
    <div class="container-xxl service py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                    {{ $serviceContent->data_value->service_title }}</p>
                <h1 class="display-5 mb-5">{{ $serviceContent->data_value->service_heading }}</h1>
            </div>
            <div class="row g-4 wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-lg-4">
                    <div class="nav nav-pills d-flex justify-content-between w-100 me-4">
                        @foreach ($serviceElement as $key => $element)
                            <button class="nav-link w-100 d-flex align-items-center text-start border p-4 mb-4 {{ $loop->first ? 'active' : '' }}"
                                data-bs-toggle="pill" data-bs-target="#tab-pane-{{ $key }}" type="button">
                                <h5 class="m-0"><i
                                        class="fa fa-bars text-primary me-3"></i>{{ $element->data_value->tab_name }}
                                </h5>
                            </button>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="tab-content w-100">
                        @foreach ($serviceElement as $key => $element)
                            <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}" id="tab-pane-{{ $key }}">
                                <div class="row g-4">
                                    <div class="col-md-6" style="min-height: 350px;">
                                        <div class="position-relative h-100">
                                            <img class="position-absolute rounded w-100 h-100"
                                                src="{{ asset('assets/images/' . $element->data_value->file) }}"
                                                style="object-fit: cover;" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <h3 class="mb-4">{{ $element->data_value->tab_heading }}</h3>
                                        <p class="mb-4">{{ $element->data_value->tab_content }}</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Secured Loans</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Credit Facilities</p>
                                        <p><i class="fa fa-check text-primary me-3"></i>Cash Advanced</p>
                                        <a href="" class="btn btn-primary py-3 px-5 mt-3">Read More</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->
