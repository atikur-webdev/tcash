@php
    $footerItems = \App\Models\Section::where('data_key', 'footer-element')->get();
@endphp


<!-- Footer Start -->
<div class="container-fluid bg-dark text-light footer mt-5 py-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">{{ $footerContent->data_value->footer_heading }}</h4>
                <p class="mb-2"><i
                        class="fa fa-map-marker-alt me-3"></i>{{ $footerContent->data_value->footer_address }}</p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>{{ $footerContent->data_value->footer_phone }}</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>{{ $footerContent->data_value->footer_email }}</p>
                <div class="d-flex pt-2">
                    @foreach ($footerItems as $footerItem)
                        <a target="_blank" class="btn btn-square btn-outline-light rounded-circle me-2"
                            href="{{ $footerItem->data_value?->footer_link ?? '' }}">
                            @php
                                echo $footerItem->data_value?->footer_link_icon;
                            @endphp
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Services</h4>
                <a class="btn btn-link" href="">Financial Planning</a>
                <a class="btn btn-link" href="">Cash Investment</a>
                <a class="btn btn-link" href="">Financial Consultancy</a>
                <a class="btn btn-link" href="">Business Loans</a>
                <a class="btn btn-link" href="">Business Analysis</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Quick Links</h4>
                <a class="btn btn-link" href="">About Us</a>
                <a class="btn btn-link" href="">Contact Us</a>
                <a class="btn btn-link" href="">Our Services</a>
                <a class="btn btn-link" href="">Terms & Condition</a>
                <a class="btn btn-link" href="">Support</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h4 class="text-white mb-4">Newsletter</h4>
                <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                <div class="position-relative w-100">
                    <input class="form-control bg-white border-0 w-100 py-3 ps-4 pe-5" type="text"
                        placeholder="Your email">
                    <button type="button"
                        class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->
