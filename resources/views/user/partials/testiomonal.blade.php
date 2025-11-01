    <!-- Testimonial Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                    {{ $testimonialContent->data_value->testimonial_title }}</p>
                <h1 class="display-5 mb-5">{{ $testimonialContent->data_value->testimonial_heading }}</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.3s">
                @foreach ($testimonialElement as $element)

                    <div class="testimonial-item">
                        <div class="testimonial-text border rounded p-4 pt-5 mb-5">
                            <div class="btn-square bg-white border rounded-circle">
                                <i class="fa fa-quote-right fa-2x text-primary"></i>
                            </div>
                            {{ $element->data_value->testimonial_content }}
                        </div>
                        <img class="rounded-circle mb-3" src="{{ asset('assets/images/' . $element->data_value->file) }}"
                            alt="">
                        <h4>{{ $element->data_value->testimonial_name }}</h4>
                        <span>{{ $element->data_value->testimonial_bio }}</span>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <!-- Testimonial End -->
