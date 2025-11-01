  <!-- Team Start -->
  <div class="container-xxl py-5">
      <div class="container">
          <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
              <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">
                  {{ $teamContent->data_value->team_title }}</p>
              <h1 class="display-5 mb-5">{{ $teamContent->data_value->team_heading }}</h1>
          </div>
          <div class="row g-4">
              @foreach ($teamElement as $element)
                  <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                      <div class="team-item">
                          <img class="img-fluid rounded" src="{{ asset('assets/images/' . $element->data_value->file) }}"
                              alt="">
                          <div class="team-text">
                              <h4 class="mb-0">{{ $element->data_value->team_name }}</h4>
                              <div class="team-social d-flex">
                                  <a class="btn btn-square rounded-circle mx-1"
                                      href="{{ $element->data_value->team_facebook_link }}"><i
                                          class="fab fa-facebook-f"></i></a>
                                  <a class="btn btn-square rounded-circle mx-1"
                                      href="{{ $element->data_value->team_twitter_link }}"><i
                                          class="fab fa-twitter"></i></a>
                                  <a class="btn btn-square rounded-circle mx-1"
                                      href="{{ $element->data_value->team_instagram_link }}"><i
                                          class="fab fa-instagram"></i></a>
                              </div>
                          </div>
                      </div>

                  </div>
              @endforeach
          </div>
      </div>
  </div>
  <!-- Team End -->
