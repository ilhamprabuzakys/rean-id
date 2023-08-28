@extends('landing.layouts.template')
@push('scripts')
<script>
   var swiper = new Swiper(".swiper-1", {
   slidesPerView: 1,
   spaceBetween: 16,
   pagination: {                       //pagination(dots)
      el: '.swiper-pagination',
   },
   navigation: {
       nextEl: ".swiper-button-next",
       prevEl: ".swiper-button-prev",
   },
   loop: true,
   autoplay:{
      delay:3000,
      disableOnInteraction:false,
   },
});
</script>
@endpush
@section('header-class', 'navbar-link-white')
@section('content')
   @php
      $company = \App\Models\Company::first();
   @endphp
   <section class="position-relative">
      <div class="container py-9 py-lg-11">
         <div class="row">
            <div class="col-md-7 col-lg-6 mb-7 mb-md-0 me-auto">
               <div class="position-relative">
                  <h2>
                     CNS Radio
                  </h2>
                  <p class="mb-3 w-lg-75">
                     Program Siaran CNS Radio. CNS Siang Seru. CNS Young VIbes. CNS Morning VIbes:
                  </p>
                  <div class="width-7x pt-1 bg-primary mb-5"></div>
                  <!-- CNS Radio -->
                  <div class="row">
                     <div class="col-5">
                        <img src="{{ asset('assets/img/CNS/logo-CNS-big.jpg') }}" alt="" style="width: 150px">
                     </div>
                     <div class="col-7">
                        <div class="streaming">
                           <h5>Streaming Now</h5>
   
                           <iframe src="https://a5.siar.us/public/cnsradio/embed?theme=light" frameborder="0" allowtransparency="true" style="width: 100%; min-height: 150px; border: 0;" class="player">
                           </iframe>
                        </div>
   
                        <div class="playlist">
                           <h5>Recently Playlist</h5>
   
                           <iframe
                              src="https://a5.siar.us/public/cnsradio/history"
                              width="100%"
                              height="150"
                              allowfullscreen=""
                              loading="lazy"
                              class="playlist"
                              referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                     </div>
                  </div>
                  <!-- End of CNS Radio -->
               </div>
            </div>
            <div class="col-md-5">
               <div data-aos="fade-up">
                  <h4 class="mb-3">Program Siaran CNS Radio</h4>
                  <div class="width-7x pt-1 bg-primary mb-5"></div>
               </div>
               <div data-aos="fade-right">
                  <div class="swiper swiper-1 position-relative">
                     <div class="swiper-wrapper cns-swiper">
                         <!--Slide item-->
                         <div class="swiper-slide">
                             <img src="{{ asset('assets/img/CNS/CNS-YOUNG-VIBES_2021_a3-2.jpg') }}" alt="">
                         </div>
                         <!--Slide item-->
                         <div class="swiper-slide">
                             <img src="{{ asset('assets/img/CNS/CNS-MORNING-VIBES_2021_a3-2.jpg') }}" alt="">
                         </div>
                         <!--Slide item-->
                         <div class="swiper-slide">
                             <img src="{{ asset('assets/img/CNS/CNS-MUSIC-LIST_2021_a3-2.jpg') }}" alt="">
                         </div>
                         <!--Slide item-->
                         <div class="swiper-slide">
                             <img src="{{ asset('assets/img/CNS/Desain-tanpa-judul.png') }}" alt="">
                         </div>
                     </div>
                     {{-- <div class="swiper-wrapper">

                        <!--Slide item-->
                        <div class="swiper-slide">
                            <div
                                class="vh-75 d-flex w-100 bg-success text-white align-items-center justify-content-center">
                                Slide 1
                            </div>
                        </div>

                        <!--Slide item-->
                        <div class="swiper-slide">
                            <div
                                class="vh-75 d-flex w-100 bg-danger text-white align-items-center justify-content-center">
                                Slide 2
                            </div>
                        </div>

                        <!--Slide item-->
                        <div class="swiper-slide">
                            <div
                                class="vh-75 d-flex w-100 bg-primary text-white align-items-center justify-content-center">
                                Slide 3
                            </div>
                        </div>

                        <!--Slide item-->
                        <div class="swiper-slide">
                            <div
                                class="vh-75 d-flex w-100 bg-info text-white align-items-center justify-content-center">
                                Slide 4
                            </div>
                        </div>

                     </div> --}}
                     <div class="swiper-pagination"></div>
                     <div class="swiper-button-next"></div>
                     <div class="swiper-button-prev"></div>
                 </div>
               </div>
            </div>

         </div>
      </div>
   </section>
@endsection
@section('hero')
   <!--::Start Hero BG Shape Divider::-->
   <section class="position-relative bg-gradient-primary text-white">
      <!--:Hero Divider:-->
      <svg class="w-100 position-absolute start-0 bottom-0 z-1 mb-n1" height="48" fill="currentColor"
         preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"
         style="transform: rotate(180deg) scaleX(-1);color:var(--bs-body-bg)">
         <path
            d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
            opacity=".25" />
         <path
            d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
            opacity=".5" />
         <path
            d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
      </svg>
      <div class="container position-relative py-12 py-lg-15">
         <div class="row pb-5">
            <div class="col-lg-10">
               <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                  <li class="breadcrumb-item active fw-bold" aria-current="page">CNS Radio</li>
               </ol>
               <!--:Heading:-->
               <h1 class="display-1 mb-4">CNS Radio</h1>
               <!--:Subheading:-->
               <p class="lead mb-3">Cegah Narkoba Streaming Radio adalah Radio berbasis streaming yang dimaksudkan sebagai jembatan kepada masyarakat untuk berkomunikasi serta menyampaikan informasi dan
                  edukasi, dalam upaya pencegahan terhadap bahaya penyalahgunaan dan peredaran gelap narkoba. Mari Kita War On Drugs!!! </p>
               <!--:Action button:-->
               {{-- <a href="#!" class="btn btn-white btn-lg px-4 px-lg-5 rounded-pill btn-hover-arrow">
                      <span class="btn-rise-text">Get started</span>
                  </a> --}}
            </div>
         </div>
         <!--/.row-->
      </div>
      <!--/.content-->
   </section>
   <!--::/End Hero BG Shape Divider::-->

@endsection
