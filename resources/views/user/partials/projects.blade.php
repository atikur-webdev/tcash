    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                    {{ $projectContent->data_value->project_title }}</p>
                <h1 class="display-5 mb-5">{{ $projectContent->data_value->project_heading }}</h1>
            </div>
            <div class="owl-carousel project-carousel wow fadeInUp" data-wow-delay="0.3s">
                @foreach ($projectElement as $element)
                    <div class="project-item pe-5 pb-5">
                        <div class="project-img mb-3">
                            @if (isset($element->data_value?->file))
                                <img class="img-fluid rounded" src="{{ asset('assets/images/' . $element->data_value?->file) }}" alt="">
                            @endif
                            <a href=""><i class="fa fa-link fa-3x text-primary"></i></a>
                        </div>
                        <div class="project-title">
                            <h4 class="mb-0">{{ $element->data_value->project_image_text }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Projects End -->
