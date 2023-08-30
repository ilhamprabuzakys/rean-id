@php
$latestPosts = \App\Models\Post::latest('created_at')->where('status', 'approved')->take(10)->get();
@endphp
<section class="position-relative overflow-hidden bg-body-tertiary">
  <!--begin:Divider wave shape-->
  <svg class="position-absolute start-0 bottom-0 w-100" style="color: #05f;" preserveAspectRatio="none" width="100%"
    height="288" viewBox="0 0 1200 288" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" clip-rule="evenodd"
      d="M0 0L67 30C133 60 267 120 400 138C533 156 667 132 800 126C933 120 1067 132 1133 138L1200 144V288H1133C1067 288 933 288 800 288C667 288 533 288 400 288C267 288 133 288 67 288H0V0Z"
      fill="currentColor" />
  </svg>
  <!--end:Divider wave shape-->

  <div class="container position-relative z-1 py-9 py-lg-11">
    <div class="row mb-7 align-items-end justify-content-between">
      <!--begin: Section headings-->
      <div class="col-lg-7 mb-4 mb-lg-0">

        <div class="mb-4" data-aos="fade-up">
          <!--Subheading-->
          <a href="javascript:void(0)" class="badge bg-primary">
            <h6 class="mb-0 text-uppercase">Konten Terbaru</h6>
          </a>
        </div>
        <!--Heading-->
        <h2 class="mb-2 display-5" data-aos="fade-right">Beberapa <span class="text-primary"
            data-typed='{"strings": ["Karya...", "Kreatifitas...", "Inovasi..."]}'></span></h2>
      </div>
      <!--end: Section headings-->
      {{-- <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
        <!--begin: button-->
        <a href="{{ asset('index.html#!') }}" class="btn btn-secondary btn-hover-arrow hover-lift">
          <span>Customer stories</span>
        </a>
        <!--end: button-->
      </div> --}}
    </div>
    <div class="row justify-content-center" data-aos="fade-up">
      <div class="col-12 position-relative">
        <!--Begin:swiper slider-->
        <div class="swiper-container overflow-hidden swiper-testimonials shadow-lg rounded-3">
          <!--Begin:wrapper-->
          <div class="swiper-wrapper">
            @forelse ($latestPosts as $post)
            <div class="swiper-slide">
              <div class="d-flex align-items-center flex-column bg-body overflow-hidden flex-lg-row">
                <div class="col-lg-6 px-0 mb-4 mb-md-0">
                  <div class="position-relative">
                    <!--testimonial Image-->
                    <img
                      src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x900/' . rand(1,5) . '.jpg') }}"
                      class="img-fluid" alt="">

                    <!--Testimonial image divider-->
                    <svg class="position-absolute d-none d-lg-block end-0 top-0 h-100 me-n1"
                      style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="58" height="583"
                      viewBox="0 0 58 583" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                        fill="currentColor" />
                    </svg>

                    <!--Testimonial image small device divider-->
                    <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none" style="color:var(--bs-body-bg)"
                      width="100%" height="48" preserveAspectRatio="none" viewBox="0 0 1200 64" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                        fill="currentColor" />
                    </svg>

                  </div>
                </div>
                <div class="col-lg-6 mx-auto px-0">
                  <div class="px-3 py-4 mb-0">
                    <div class="mb-3 mb-lg-4 h-auto mx-auto text-primary">
                      <h4>{{ Str::limit($post->title, 30, '...') }}</h4>
                    </div>
                    <!-- Text -->
                    <p class="mb-5 w-lg-75">
                      {!! Str::limit($post->body, 60, '...') !!}
                    </p>

                    <!-- Footer -->
                    <div class="pb-4 pb-lg-0">
                      <div>
                        <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt=""
                          class="img-fluid img-zoom me-2 rounded-circle"
                          style="object-fit: cover;width: 50px;height: 50px;">
                        <span class="h6 me-2">{{ $post->user->name }}</span>
                        <span class="ms-5"><i class="bx bx-time me-2"></i>
                          <span class="h6">{{ $post->created_at->diffForHumans() }}</span></span>
                      </div>
                      <div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            @empty
            <div class="swiper-slide">
              <div class="d-flex align-items-center flex-column bg-body overflow-hidden flex-lg-row">
                <div class="col-lg-6 px-0 mb-4 mb-md-0">
                  <div class="position-relative">
                    <!--testimonial Image-->
                    <img src="{{ asset('assets/landing/assan/assets/img/960x900/2.jpg') }}" class="img-fluid" alt="">

                    <!--Testimonial image divider-->
                    <svg class="position-absolute d-none d-lg-block end-0 top-0 h-100 me-n1"
                      style="color:var(--bs-body-bg)" preserveAspectRatio="none" width="58" height="583"
                      viewBox="0 0 58 583" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 583L9.66667 534.417C19.3333 485.833 38.6667 388.667 39.7407 291.5C40.8148 194.333 23.6296 97.1667 15.037 48.5833L6.44444 -1.62125e-05H58V48.5833C58 97.1667 58 194.333 58 291.5C58 388.667 58 485.833 58 534.417V583H0Z"
                        fill="currentColor" />
                    </svg>

                    <!--Testimonial image small device divider-->
                    <svg class="position-absolute bottom-0 start-0 mb-n1 d-lg-none" style="color:var(--bs-body-bg)"
                      width="100%" height="48" preserveAspectRatio="none" viewBox="0 0 1200 64" fill="none"
                      xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M0 0L100 10.6667C200 21.3333 400 42.6667 600 43.8519C800 45.037 1000 26.0741 1100 16.5926L1200 7.11111V64H1100C1000 64 800 64 600 64C400 64 200 64 100 64H0L0 0Z"
                        fill="currentColor" />
                    </svg>

                  </div>
                </div>
                <div class="col-lg-6 mx-auto px-0">
                  <blockquote class="blockquote text-center mb-0 px-4 py-5 py-lg-7">
                    <!--Testimonial Comapny Logo -->
                    <div class="width-10x mb-3 mb-lg-4 h-auto mx-auto" style="color: #FF5A5F;">
                      <img class="img-fluid img-invert"
                        src="{{ asset('assets/landing/assan/assets/img/partners/booking.com.svg') }}" alt="">
                    </div>
                    <!-- Text -->
                    <p class="mb-5 fs-4 w-lg-75 mx-auto">
                      “ It is really refreshing to work with this bootstrap theme
                      which is truly helpful in the development of one of my client’s
                      website.”
                    </p>

                    <!-- Footer -->
                    <footer class="blockquote-footer pb-4 pb-lg-0">
                      <span class="h6">Nikita Millton</span>
                    </footer>

                  </blockquote>
                </div>
              </div>
            </div>
            @endforelse

          </div>
          <!--end:wrapper-->
        </div>


        <!--Begin:Swiper navigation-->
        <div class="position-absolute end-0 bottom-0 mb-4 me-5 z-1 d-flex align-items-center">
          <div
            class="swiperAuto-button-prev swiper-button-prev position-relative me-1 ms-0 start-0 width-4x height-4x hover-shadow hover-lift bg-body-tertiary text-body p-0">
          </div>
          <div
            class="swiperAuto-button-next swiper-button-next position-relative ms-1 ms-0 end-0 width-4x height-4x hover-shadow hover-lift bg-body-tertiary text-body">
          </div>
        </div>
        <!--end:Swiper navigation-->

      </div>
      <!--end:swiper slider-->
    </div>
  </div>
</section>