    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($bannerElements as $element)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <img class="w-100" src="{{ asset("assets/images/".$element?->data_value?->file ?? '') }}" alt="Image">
                        <div class="carousel-caption">
                            <div class="container">
                                <div class="row justify-content-start">
                                    <div class="col-lg-8">
                                        
                                        <p
                                            class="d-inline-block border border-white rounded text-primary fw-semi-bold py-1 px-3 animated slideInDown">
                                            {{ $element->data_value->subtitle ?? 'Welcome to Finanza' }}
                                        </p>
                                        <h1 class="display-1 mb-4 animated slideInDown" style="color: #011A41">
                                            {{ $element->data_value->title ?? 'Your Financial Status Is Our Goal' }}
                                        </h1>
                                        <a href="" class="btn btn-primary py-3 px-5 animated slideInDown">Explore
                                            More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
               
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->
