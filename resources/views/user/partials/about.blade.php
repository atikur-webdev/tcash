                 <!-- About Start -->
                 <div class="container-xxl py-5">
                     <div class="container">
                         <div class="row g-4 align-items-end mb-4">
                             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                                 <img class="img-fluid rounded" src="{{ asset('assets/user/img/about.jpg') }}">
                             </div>
                             <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.3s">
                                 <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                                     {{ $aboutContent->data_value->about_title ?? '' }}
                                 </p>


                                 <h1 class="display-5 mb-4">
                                     {{ $aboutContent->data_value->aboutHeading ?? '' }}
                                 </h1>
                                 <p class="mb-4">
                                     {{ $aboutContent->data_value->aboutContent ?? '' }}
                                 </p>
                                 <div class="border rounded p-4">
                                     <nav>
                                         <div class="nav nav-tabs mb-3" id="nav-tab" role="tablist">
                                             @foreach ($aboutElements as $aboutElement)
                                                 <button
                                                     class="nav-link fw-semi-bold @if ($loop->first) active @endif"
                                                     data-bs-toggle="tab" data-bs-target="#nav-data_{{ $loop->index }}"
                                                     type="button" role="tab" aria-controls="nav-story"
                                                     aria-selected="true">{{ $aboutElement->data_value->tab_name }}</button>
                                             @endforeach
                                         </div>
                                     </nav>
                                     <div class="tab-content" id="nav-tabContent">
                                         @foreach ($aboutElements as $aboutElement)
                                             <div class="tab-pane fade @if ($loop->first) show active @endif"
                                                 id="nav-data_{{ $loop->index }}" role="tabpanel">
                                                 {{ $aboutElement->data_value->tab_content }}
                                             </div>
                                         @endforeach
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="border rounded p-4 wow fadeInUp" data-wow-delay="0.1s">
                             <div class="row g-4">
                                 <div class="col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                                     <div class="h-100">
                                         <div class="d-flex">
                                             <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                 <i class="fa fa-times text-white"></i>
                                             </div>
                                             <div class="ps-3">
                                                 <h4>{{ $featureContent->data_value->feature_title_one }}</h4>
                                                 <span>{{ $featureContent->data_value->feature_content_one }}</span>
                                             </div>
                                             <div class="border-end d-none d-lg-block"></div>
                                         </div>
                                         <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4 wow fadeIn" data-wow-delay="0.3s">
                                     <div class="h-100">
                                         <div class="d-flex">
                                             <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                 <i class="fa fa-users text-white"></i>
                                             </div>
                                             <div class="ps-3">
                                                 <h4>{{ $featureContent->data_value->feature_title_two }}</h4>
                                                 <span>{{ $featureContent->data_value->feature_content_two }}</span>
                                             </div>
                                             <div class="border-end d-none d-lg-block"></div>
                                         </div>
                                         <div class="border-bottom mt-4 d-block d-lg-none"></div>
                                     </div>
                                 </div>
                                 <div class="col-lg-4 wow fadeIn" data-wow-delay="0.5s">
                                     <div class="h-100">
                                         <div class="d-flex">
                                             <div class="flex-shrink-0 btn-lg-square rounded-circle bg-primary">
                                                 <i class="fa fa-phone text-white"></i>
                                             </div>
                                             <div class="ps-3">
                                                 <h4>{{ $featureContent->data_value->feature_title_three }}</h4>
                                                 <span>{{ $featureContent->data_value->feature_content_three }}</span>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <!-- About End -->

                 {{-- 
    {
    "story": "Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.  Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit",
    "title": null,
    "vision": "Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.  Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit",
    "mission": "Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore.  Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit",
    "subtitle": null,
    "titleTwo": null
} --}}


                 {{-- {
    "aboutContent": "Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet nurrr",
    "aboutHeading": "We Help Our Clients To Grow Their Businessssssss"
} --}}
