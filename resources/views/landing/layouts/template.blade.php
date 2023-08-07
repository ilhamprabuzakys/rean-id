<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('assets/img/rean-logo-brand.png') }}" type="image/ico">
        <!--Box Icons-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/5.1assets/fonts/boxicons/css/boxicons.min.css') }}">

        <!--AOS Animations-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/aos.css') }}">

        <!--Iconsmind Icons-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/fonts/iconsmind/iconsmind.css') }}">

        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap" rel="stylesheet">

        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/glightbox.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/css/theme.min.css') }}">

        <title>{{ $title ?? ''  }} | {{ config('app.name') }}</title>
    </head>

    <body>

         <!--Preloader Spinner-->
         <div class="spinner-loader bg-white text-white">
            <div class="spinner-grow" role="status">
            </div>
            {{-- <span class="small d-block ms-2">Loading...</span> --}}
        </div>
        <!--Header Start-->
        @include('landing.template.partials.header')
        <!--Main content-->

        <main class="main-content" id="main-content">

            <!--begin:Hero section-->
            <section class="position-relative bg-dark overflow-hidden">
                <!-- Swiper Main -->
                <div class="swiper-container swiper-classic">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg6.jpg')">

                            <!--Overlay-->
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <li data-carousel-layer="fade-start">
                                                <h2 class="display-1 mb-4 mb-lg-7">
                                                    We elevate the vision and the strategy
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <a href="index-landing-business.html#" class="btn btn-white btn-lg">
                                                    How it works
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg5.jpg')">
                            <!--Overlay-->
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <li data-carousel-layer="fade-start">
                                                <h2 class="display-1 mb-4 mb-lg-7">
                                                    We turns ideas into business
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <a href="index-landing-business.html#" class="btn btn-white btn-lg">
                                                    Purchase now
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide" style="background-image:url('assets/img/backgrounds/bg2.jpg')">
                            <!--Overlay-->
                            <div class="bg-dark position-absolute start-0 top-0 w-100 h-100 opacity-75"></div>
                            <div class="container-fluid text-white d-flex align-items-center h-100">
                                <div class="row w-100">
                                    <div class="col-xl-8 col-lg-10 mx-auto text-center">
                                        <ul class="carousel-layers list-unstyled mb-0">
                                            <li data-carousel-layer="fade-start">
                                                <h2 class="display-1 mb-4 mb-lg-7">
                                                    Take your business to the next level
                                                </h2>
                                            </li>
                                            <li data-carousel-layer="fade-start">
                                                <a href="index-landing-business.html#" class="btn btn-white btn-lg">
                                                    Try it Now!
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End swiper-main-->

                <!--Swiper thumbnails-->
                <div
                    class="progress-swiper-thumbs pb-3 pb-lg-5 position-absolute start-0 bottom-0 w-100 overflow-hidden text-white px-4 swiper-container">
                    <div class="swiper-wrapper">
                        <!-- Slide -->
                        <div class="swiper-slide swiper-pagination-progress">
                            <div class="swiper-pagination-progress-bar mb-2">
                                <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                </div>
                            </div>
                            <span class="small d-block text-truncate">Elevate vision</span>
                        </div>
                        <!-- End Slide -->

                        <!-- Slide -->
                        <div class="swiper-slide swiper-pagination-progress">
                            <div class="swiper-pagination-progress-bar mb-2">
                                <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                </div>
                            </div>
                            <span class="small d-block text-truncate">Turn ideas into business</span>
                        </div>
                        <!-- End Slide -->

                        <!-- Slide -->
                        <div class="swiper-slide swiper-pagination-progress">
                            <div class="swiper-pagination-progress-bar mb-2">
                                <div class="swiper-pagination-progress-inner swiper-pagination-progress-bar-inner">
                                </div>
                            </div>
                            <span class="small d-block text-truncate">Take your business to next level</span>
                        </div>
                        <!-- End Slide -->
                    </div>
                </div>
                <!-- End Swiper Thumbs Slider -->
            </section>
            <!--/end:Hero section-->

            <!--begin:Partners section-->
            <section class="border-bottom overflow-hidden">
                <div class="container pt-9 pb-6 pb-lg-9">
                    <div class="row align-items-center">
                        <!--begin:section-title-->
                        <div class="col-md-4 col-lg-3 text-center text-md-start">
                            <h6 class="mb-5 mb-md-0 text-body-secondary">Our partners</h6>
                        </div>
                        <!--end:section-title-->

                        <div class="col-md-8 col-lg-9">
                            <!--Paertners List-->
                            <div class="d-flex flex-wrap justify-content-md-end justify-content-center">
                                <!--Partner-->
                                <div
                                    class="d-flex justify-content-center align-items-center px-4 py-3 width-13x h-auto">
                                    <img class="img-fluid img-invert" src="assets/img/partners/dark/nasdaq.svg" alt="">
                                </div>
                                <!--Partner-->
                                <div
                                    class="d-flex justify-content-center align-items-center px-4 py-3 width-13x h-auto">
                                    <img class="img-fluid img-invert" src="assets/img/partners/dark/zillow.svg" alt="">
                                </div>
                                <!--Partner-->
                                <div
                                    class="d-flex justify-content-center align-items-center px-4 py-3 width-13x h-auto">
                                    <img class="img-fluid img-invert" src="assets/img/partners/dark/slack.svg" alt="">
                                </div>
                                <!--Partner-->
                                <div
                                    class="d-flex justify-content-center align-items-center px-4 py-3 width-13x h-auto">
                                    <img class="img-fluid img-invert" src="assets/img/partners/dark/google.svg" alt="">
                                </div>
                                <!--Partner-->
                                <div
                                    class="d-flex justify-content-center align-items-center px-4 py-3 width-13x h-auto">
                                    <img class="img-fluid img-invert" src="assets/img/partners/dark/amazon.svg" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end:Partners section-->

            <!--begin:About section-->
            <section class="position-relative overflow-hidden">
                <div class="container py-9 py-lg-11">
                    <div class="row mb-9 mb-lg-11 align-items-end">
                        <div class="col-lg-9 col-xl-8 mb-5 mb-lg-0">
                            <!--Subtitle-->
                            <h6 class="mb-3 text-body-secondary">Who we are</h6>

                            <!--title-->
                            <h2 class="display-4 mb-0" data-aos="fade-left" data-aos-duration="400">
                                We are
                                dedicated to making the
                                world a better place.
                            </h2>
                        </div>

                        <!--Video popup-->
                        <div class="col-xl-4 col-lg-3">
                            <div class="d-flex align-items-center">
                                <!--Video button-->
                            <a href="https://vimeo.com/353105087" data-glightbox data-gallery="03"
                            class="btn btn-primary ms-lg-auto me-3 btn-circle-ripple width-8x height-8x rounded-circle d-flex justify-content-center align-items-center">
                            <i class="bx bx-play fs-1"></i>
                        </a>
                        <small>Watch our story</small>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-5 mb-md-0" data-aos="fade-right" data-aos-delay="100"
                            data-aos-duration="400">
                            <!--:Icon:-->
                           <div class="width-5x height-5x mb-5 flex-center">
                            <img data-inject-svg src="assets/img/graphics/icons/hand-shake.svg"
                            class="w-100 h-100 fill-primary" alt="">
                           </div>
                            <h5 class="mb-3">Relationships</h5>
                            <p class="mb-0">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries layouts and visual mockups.
                            </p>
                        </div>
                        <div class="col-md-4 mb-5 mb-md-0" data-aos="fade-right" data-aos-delay="150"
                            data-aos-duration="400">
                           <!--:Icon:-->
                           <div class="width-5x height-5x mb-5 flex-center">
                            <img data-inject-svg src="assets/img/graphics/icons/target.svg"
                            class="w-100 h-100 fill-warning" alt="">
                           </div>
                            <h5 class="mb-3">Mission & vision</h5>
                            <p class="mb-0">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries layouts and visual mockups.
                            </p>
                        </div>
                        <div class="col-md-4" data-aos="fade-right" data-aos-delay="200" data-aos-duration="400">
                            <!--:Icon:-->
                           <div class="width-5x height-5x mb-5 flex-center">
                            <img data-inject-svg src="assets/img/graphics/icons/magic-wand.svg"
                            class="w-100 h-100 fill-info" alt="">
                           </div>
                            <h5 class="mb-3">Best results</h5>
                            <p class="mb-0">
                                Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing
                                industries layouts and visual mockups.
                            </p>
                        </div>
                    </div>

                </div>
            </section>
            <!--end/:About section-->

            <!--begin: Services section-->
            <section class="bg-body-tertiary position-relative overflow-hidden">
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row justify-content-between">
                        <div class="col-lg-5 mb-7 mb-lg-0">
                            <h6 class="mb-3 text-body-secondary">What we offer</h6>
                            <h2 class="display-4 pe-lg-5 mb-5 mb-lg-8" data-aos="fade-left" data-aos-duration="400">We
                                take your
                                Business to the next level
                            </h2>
                            <div class="w-lg-75">
                                <nav class="nav nav-pills flex-column" role="tablist" style="--bs-nav-pills-link-active-bg:var(--bs-secondary-bg);--bs-nav-pills-link-active-color:var(--bs-primary)">
                                    <a href="index-landing-business.html#code" class="nav-link rounded-pill active px-5 fs-5 py-3 mb-1"
                                        data-bs-toggle="tab"><span>Code</span></a>
                                    <a href="index-landing-business.html#strategy" class="nav-link rounded-pill fs-5 px-5 py-3 mb-1"
                                        data-bs-toggle="tab"><span>Strategy</span></a>
                                    <a href="index-landing-business.html#design" class="nav-link rounded-pill fs-5 px-5 py-3"
                                        data-bs-toggle="tab"><span>Design</span></a>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="tab-content">
                                <div class="tab-pane active fade show" id="code">
                                    <div class="position-relative">
                                        <h3 class="mb-3">Code</h3>
                                        <p class="mb-5">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    We design and development
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Mobile Solutions / App
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Microsite / web special
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Website / relaunch
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="strategy">
                                    <div class="position-relative">
                                        <h3 class="mb-3">Strategy</h3>
                                        <p class="mb-5">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Digital & communication strategy
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Customer journeys
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Internal communication strategy
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Brand story
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="design">
                                    <div class="position-relative">
                                        <h3 class="mb-3">Design</h3>
                                        <p class="mb-5">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                                            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                                            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
                                            non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                                        </p>
                                        <ul class="list-unstyled mb-0">
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    UX Design
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Keynote design
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Corporate Design
                                                </p>
                                            </li>
                                            <li class="d-flex py-2 align-items-center">
                                                <div class="me-3">
                                                    <i class="bx bx-check fs-4 text-body-secondary"></i>
                                                </div>
                                                <p class="mb-0">
                                                    Logo design & illustrations
                                                </p>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end: Services section-->

            <!--begin: quote parallax section-->
            <section class="jarallax text-white position-relative overflow-hidden bg-dark" data-speed=".2">
                <!--Section background image parallax-->
                <img src="assets/img/backgrounds/bg3.jpg" class="jarallax-img" alt="">

                <!--Overlay-->
                <div class="position-absolute w-100 h-100 start-0 top-0 bg-dark opacity-75"></div>

                <!--begin:Divider shape-->
                <svg class="w-100 position-absolute start-0 bottom-0 z-1 flip-y" style="color:var(--bs-body-bg)" height="64"
                    fill="currentColor" preserveAspectRatio="none" viewBox="0 0 1200 120"
                    xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) scaleX(-1);">
                    <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
     16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
     13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" />
                    <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
      60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
      62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
      113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5" />
                    <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
    112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
                </svg>
                <!--/end:Divider shape-->
                <div class="container py-9 py-lg-11 position-relative">
                    <div class="row pb-9">
                        <div class="col-lg-10 mx-auto">
                            <div class="position-relative z-1" data-aos-duration="400" data-aos="fade-up">
                                <!--Subtitle-->
                                <h6 class="mb-5 text-center text-warning">A good company</h6>
                                <!--Quote text-->
                                <h2 class="display-3 fw-semibold text-center mb-5">
                                    “ We believe in great details, and we also
                                    believe in businesses that keep that in
                                    our mind all days, everyday. ”
                                </h2>
                                <h5 class="text-center">
                                    - Client
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Parallax element circle-->
                <div class="position-absolute start-50 top-50 translate-middle">
                    <div class="width-20x height-20x rounded-circle bg-primary rellax" data-rellax-speed="2"
                        data-rellax-percentage=".9"></div>
                </div>

            </section>
            <!--/end: quote parallax section-->

            <!--begin: Testimonials section-->
            <section class="position-relative bg-body overflow-hidden">
                <div class="container position-relative py-9 py-lg-11">
                    <div class="row mb-4 mb-lg-5 align-items-end justify-content-between">
                        <div class="col-md-8 mb-4 mb-md-0">
                            <h6 class="mb-3 text-body-secondary">Testimonials</h6>
                            <h2 class="mb-4 display-4">Clients who love
                                <span class="d-block">our
                                    <span class="d-inline-block text-primary"
                                        data-typed='{"strings": ["Ideas...", "Creativity...", "passion...", "innovation..."]}'></span>
                                </span>
                            </h2>
                        </div>
                        <div class="col-md-4 text-md-end">
                            <div class="position-relative d-flex justify-content-md-end align-items-center">
                                <!--Buttons navigation-->
                                <div
                                    class="swiper-testimonials-button-prev start-0 swiper-button-prev mt-0 rounded-end-0 rounded-4 position-relative width-5x height-5x me-1 rounded-circle bg-transparent text-body border">
                                </div>
                                <div
                                    class="swiper-testimonials-button-next swiper-button-next mt-0 position-relative rounded-start-0 rounded-4 end-0 width-5x height-5x rounded-circle bg-transparent text-body border">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">

                            <!--Swiper slider testimonials-->
                            <div class="swiper-container swiper-testimonials">
                                <div class="swiper-wrapper">
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Loved working with the beautiful theme. Everything clean and
                                                    professional,
                                                    also very helpful throughout the customisation. Looking forward to
                                                    buy more
                                                    license of Assan again in the future.”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <!--Avatar Image-->
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/4.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Nala Goins</h5>
                                                    <small class="text-body-secondary">UI UX Designer, Paris</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Their design delivery framework is fantastic and it really helped
                                                    us all get
                                                    on the same page from day one. The team has delivered a strong brand
                                                    identity and a seamless UI
                                                    which we can’t wait to put live and begin testing. ”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/5.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Lilja Peltola</h5>
                                                    <small class="text-body-secondary">Full stack developer,
                                                        Toronto</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Their design delivery framework is fantastic and it really helped
                                                    us all get
                                                    on the same page from day one. The team has delivered a strong brand
                                                    identity and a seamless UI
                                                    which we can’t wait to put live and begin testing. ”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <!--Avatar Image-->
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/6.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Adam Macofey</h5>
                                                    <small class="text-body-secondary">CEO, Physics, Stockholm</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Loved working with the beautiful theme. Everything clean and
                                                    professional,
                                                    also very helpful throughout the customisation. Looking forward to
                                                    buy more
                                                    license of Assan again in the future.”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <!--Avatar Image-->
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/7.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Alex Lee</h5>
                                                    <small class="text-body-secondary">Developer, Barcelona</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Their design delivery framework is fantastic and it really helped
                                                    us all get
                                                    on the same page from day one. The team has delivered a strong brand
                                                    identity and a seamless UI
                                                    which we can’t wait to put live and begin testing. ”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <!--Avatar Image-->
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/8.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Jayden Massey</h5>
                                                    <small class="text-body-secondary">UI UX master, Warsaw</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--Slide-->
                                    <div class="swiper-slide">
                                        <div class="position-relative">
                                            <div class="mb-4 flex-grow-1 px-3 px-4 py-5 shadow rounded-4">
                                                <div class="mb-3 text-warning">
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                    <i class="bx bx-star small"></i>
                                                </div>
                                                <p class="fw-semibold fs-5 mb-0">
                                                    “ Their design delivery framework is fantastic and it really helped
                                                    us all get
                                                    on the same page from day one. The team has delivered a strong brand
                                                    identity and a seamless UI
                                                    which we can’t wait to put live and begin testing. ”
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-start">

                                                <div class="position-relative me-3">
                                                    <img class="position-relative avatar lg rounded-circle p-1"
                                                        src="assets/img/avatar/9.jpg" alt="">
                                                </div>
                                                <div>
                                                    <h5 class="mb-0">Raymond Atkins</h5>
                                                    <small class="text-body-secondary">Entrepreneur, Los
                                                        Angeles</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--/end: Testimonials section-->

            <!--begin: feature image section-->
            <section class="position-relative bg-body-tertiary overflow-hidden">
                <div class="container py-lg-11 py-9">
                    <div class="row align-items-center">
                        <div class="col-lg-5 mb-7 mb-lg-0">
                            <!--Feature heading-->
                            <h5 class="mb-4 text-body-tertiary">We're creative</h5>
                            <h2 class="display-4 mb-4" data-aos="fade-up">
                                Investing in the digital future.
                            </h2>
                            <!--feature description-->
                            <p class="mb-5" data-aos="fade-up">
                                Lorem ipsum dolor sit amet sed do eiusmod tempor incididunt ut labore et dolore magna
                                aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat.
                            </p>

                            <!--Feature buttons-->
                            <div class="d-flex flex-column flex-md-row align-items-md-center" data-aos="fade-up">
                                <span class="me-md-4 mb-3 mb-md-0">
                                    <a href="index-landing-business.html#!" class="btn btn-primary">Contact us</a>
                                </span>
                                <span>Or call us <strong>(123) 123-4567</strong></span>
                            </div>
                        </div>
                        <div class="col-lg-6 ms-auto">
                            <div class="position-relative pe-7 pb-7" data-aos="fade-up">
                                <!--parallax-->
                                <div class="width-15x height-15x bg-warning rounded-pill position-absolute end-0 top-0 mt-7 rellax"
                                    data-rellax-speed="2" data-rellax-percentage=".9"></div>

                                <!--Image-->
                                <div class="bg-mask">
                                    <img src="assets/img/960x900/2.jpg" alt="" class="mask-image mask-blob-3">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end: feature image section-->


            <!--begin: Process section-->
            <section class="position-relative overflow-hidden bg-gradient-primary text-white">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row mb-7">
                        <div class="col-lg-8 mx-auto text-center">
                            <div class="mb-3" data-aos="fade-up">
                                <h6 class="mb-0">Data-driven methodologies.
                                </h6>
                            </div>
                            <div class="mb-3" data-aos="fade-up">
                                <h1 class="mb-0 display-4">Our work process
                                </h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up">
                            <div class="position-relative">
                                <span
                                    class="d-block position-absolute start-50 top-0 translate-middle-x lh-1 display-1 opacity-25">01</span>
                                <div class="position-relative pt-4 pt-lg-6">
                                    <h5 class="mb-4">Collaboration</h5>
                                    <p class="mb-0 opacity-75 w-lg-75">
                                        Lorem ipsum dolor sit amet elit, sed do eiusmod tempor
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        ullamco laboris nisi ut aliquip commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                            <div class="position-relative">
                                <span
                                    class="d-block position-absolute start-50 top-0 translate-middle-x lh-1 display-1 opacity-25">02</span>
                                <div class="position-relative pt-4 pt-lg-6">
                                    <h5 class="mb-4">Execution</h5>
                                    <p class="mb-0 opacity-75 w-lg-75">
                                        Lorem ipsum dolor sit amet elit, sed do eiusmod tempor
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        ullamco laboris nisi ut aliquip commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="150">
                            <div class="position-relative">
                                <span
                                    class="d-block position-absolute start-50 top-0 translate-middle-x lh-1 display-1 opacity-25">03</span>
                                <div class="position-relative pt-4 pt-lg-6">
                                    <h5 class="mb-4">Financial Intelligence</h5>
                                    <p class="mb-0 opacity-75 w-lg-75">
                                        Lorem ipsum dolor sit amet elit, sed do eiusmod tempor
                                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                        ullamco laboris nisi ut aliquip commodo consequat.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--/end: Process section-->


            <!--begin:Blog section-->
            <section class="position-relative bg-body-secondary overflow-hidden">
                <div class="container py-9 py-lg-11 position-relative z-1">
                    <div class="row position-relative mb-7 align-items-end">
                        <div class="col-12 col-md-8 mb-4 mb-md-0">
                            <div class="position-relative" data-aos="fade-left" data-aos-duration="400">
                                <h2 class="display-4 mb-0">
                                    Insights, thoughts & announcements from us
                                </h2>
                            </div>
                        </div>

                        <div class="col-md-4 text-md-end" data-aos="fade-right" data-aos-duration="400">
                            <a href="index-landing-business.html#!"
                                class="btn btn-rise btn-outline-primary flex-center p-0 rounded-circle width-10x height-10x">
                                <div class="btn-rise-bg bg-primary"></div>
                                <div class="btn-rise-text small">Our blog</div>
                            </a>
                        </div>
                    </div>

                    <div class="position-relative">
                        <div class="row position-relative z-1">
                            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="400">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <div class="position-relative rounded-3 overflow-hidden">
                                        <img src="assets/img/960x640/3.jpg" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <div class="pt-4">
                                        <h4 class="link-multiline">
                                            The recipe for excellent design management
                                        </h4>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            02 May
                                        </p>
                                    </div>

                                    <!--Post link-->
                                    <a href="index-landing-business.html#" class="stretched-link"></a>
                                </article>
                            </div>
                            <div class="col-lg-4 mb-4 mb-lg-0" data-aos="fade-up" data-aos-duration="400"
                                data-aos-delay="100">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <div class="position-relative rounded-3 overflow-hidden">
                                        <img src="assets/img/960x640/4.jpg" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <div class="pt-4">
                                        <h4 class="link-multiline">
                                            How to use social media to invent or reinvent yourself
                                        </h4>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            01 May
                                        </p>
                                    </div>
                                    <!--Post link-->
                                    <a href="index-landing-business.html#" class="stretched-link"></a>
                                </article>
                            </div>
                            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="400" data-aos-delay="150">
                                <!--Article-->
                                <article class="card-hover hover-lift">
                                    <div class="position-relative rounded-3 overflow-hidden">
                                        <img src="assets/img/960x640/5.jpg" class="img-fluid img-zoom" alt="">
                                    </div>
                                    <div class="pt-4">
                                        <h4 class="link-multiline">
                                            Digital design trends in 2021
                                        </h4>
                                        <p class="mb-0 pt-3 text-body-secondary small">
                                            21 April
                                        </p>
                                    </div>

                                    <!--Post link-->
                                    <a href="index-landing-business.html#" class="stretched-link"></a>
                                </article>

                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--/end:Blog section-->


            <!--begin: Newsletter section-->
            <section class="position-relative bg-body-secondary overflow-hidden">
                <!--begin:Divider shape-->
                <svg style="color:var(--bs-dark)" class="w-100 flip-y position-absolute start-0 bottom-0 z-1 mb-n1" height="50%"
                    fill="currentColor" preserveAspectRatio="none" viewBox="0 0 1200 120"
                    xmlns="http://www.w3.org/2000/svg" style="transform: rotate(180deg) scaleX(-1);">
                    <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
     16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
     13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25" />
                    <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
      60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
      62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
      113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5" />
                    <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
    112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
                </svg>
                <!--/end:Divider shape-->
                <div class="container position-relative z-1">
                    <div class="px-4 py-5 px-lg-5 mx-auto bg-body-tertiary shadow-lg rounded-3 w-lg-50 w-md-75"
                        data-aos="fade-down" data-aos-duration="400">
                        <!--Title-->
                        <h5 class="mb-4 fs-4">Get updates direct to your inbox</h5>

                        <!--Newsletter form-->
                        <form class="needs-validation" novalidate>
                            <div class="position-relative">
                                <!--Input-->
                                <input type="email" required placeholder="Enter Work email"
                                    class="form-control bg-transparent pe-8 form-control-lg mb-2">

                                <!--Submit button-->
                                <div class="position-absolute end-0 me-1 top-50 translate-middle-y">
                                    <button type="submit" class="btn px-3 lh-1 btn-primary">
                                        <i class="bx bx-right-arrow-alt fs-3"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>
            <!--/end: Newsletter section-->
        </main>

        <!--begin:Footer-->
        <footer id="footer" class="position-relative bg-dark footer" data-bs-theme="dark">
            <div class="container pt-9 pt-lg-11 pb-5">
                <div class="row mb-5">
                    <div class="col-lg-7 col-md-12 mb-5 mb-lg-0">
                        <div class="mb-7 mb-lg-9 d-flex flex-column flex-sm-row justify-content-between align-items-end">
                            <img src="assets/img/logo/logo-white.svg" alt="Assan Logo" class="width-8x mb-6 mb-sm-0">
                            <!--:Dark Mode:-->
                            <div class="d-inline-flex width-13x align-items-center dropup mt-6">
                                <button class="btn border text-body py-2 px-2 d-flex align-items-center"
                                    id="assan-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown"
                                    data-bs-display="static">
                                    <span class="theme-icon-active d-flex align-items-center">
                                        <i class="bx align-middle"></i>
                                    </span>
                                </button>
                                <!--:Dark Mode Options:-->
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="assan-theme" style="--bs-dropdown-min-width: 9rem;">
                                    <li class="mb-1">
                                        <button type="button" class="dropdown-item d-flex align-items-center active"
                                            data-bs-theme-value="light">
                                            <span class="theme-icon d-flex align-items-center">
                                                <i class="bx bx-sun align-middle me-2"> </i>
                                            </span>
                                            Light
                                        </button>
                                    </li>
                                    <li class="mb-1">
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="dark">
                                            <span class="theme-icon d-flex align-items-center">
                                                <i class="bx bx-moon align-middle me-2"></i>
                                            </span>
                                            Dark
                                        </button>
                                    </li>
                                    <li>
                                        <button type="button" class="dropdown-item d-flex align-items-center"
                                            data-bs-theme-value="auto">
                                            <span class="theme-icon d-flex align-items-center">
                                                <i class="bx bx-color-fill align-middle me-2"></i>
                                            </span>
                                            Auto
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-5 mb-md-0">
                                <h5 class="mb-4 text-white">Products</h5>
                                <nav class="nav flex-column">
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Assan</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Airbnb</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Codepen</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Chrome</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Dropbox</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Jira</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Slack</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0">Zendesk</a>
                                </nav>
                            </div>
                            <div class="col-md-4 mb-5 mb-md-0">
                                <h5 class="mb-4 text-white">Resources</h5>
                                <nav class="nav flex-column">
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Bootstrap</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Wrapbootstrap</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Babel</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Browserify</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Greensock</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Javascript</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Gulp</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0">Sass</a>
                                </nav>
                            </div>
                            <div class="col-md-4">
                                <h5 class="mb-4 text-white">Company</h5>
                                <nav class="nav flex-column">
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">About us</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Career</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0 mb-3">Team</a>
                                    <a href="index-landing-business.html#" class="nav-link p-0">Blog</a>
                                </nav>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-5 ms-auto">
                        <div class="py-5 bg-white-25 bg-gradient px-4 rounded-4">
                            <h5 class="mb-4 text-white">Contact</h5>
                            <div class="mb-2"><a href="tel:+1123456789" class="fs-5 link-hover-underline">+1 1234 56789</a>
                            </div>
                            <div><a href="../../../cdn-cgi/l/email-protection.html#a5cdc0c9c9cae5c1cac8c4cccb8bc6cac89ad6d0c7cfc0c6d198edc0c9c9ca84" class="fs-5 link-hover-underline"><span class="__cf_email__" data-cfemail="05767075756a777145616a68646c6b2b666a68">[email&#160;protected]</span></a>
                            </div>
                            <hr class="my-4 text-white my-sm-5">
                            <h5 class="mb-4 text-white">Have a project?</h5>
                            <a href="index-landing-business.html#" class="btn btn-primary rounded-pill hover-lift btn-hover-arrow"><span>Let's talk with
                                    us</span></a>

                            <hr class="my-4 text-white my-sm-5">
                            <h5 class="mb-4 text-white">Follow us</h5>
                            <div class="mb-4 mb-md-0 d-flex">
                                <!-- Social button -->
                                <a href="index-landing-business.html#!" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-facebook">
                                    <i class="bx bxl-facebook fs-5"></i>
                                    <i class="bx bxl-facebook fs-5"></i>
                                </a>
                                <!-- Social button -->
                                <a href="index-landing-business.html#!" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-twitter">
                                    <i class="bx bxl-twitter fs-5"></i>
                                    <i class="bx bxl-twitter fs-5"></i>
                                </a>
                                <!-- Social button -->
                                <a href="index-landing-business.html#!" class="d-inline-block text-white mb-1 me-2 si rounded-pill si-hover-linkedin">
                                    <i class="bx bxl-linkedin fs-5"></i>
                                    <i class="bx bxl-linkedin fs-5"></i>
                                </a>
                                <!-- Social button -->
                                <a href="index-landing-business.html#!" class="d-inline-block text-white mb-1 si rounded-pill si-hover-instagram">
                                    <i class="bx bxl-instagram fs-5"></i>
                                    <i class="bx bxl-instagram fs-5"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mt-0 mb-5">
                <div class="row justify-content-between">
                    <div class="col-md-7 mb-4 mb-md-0">
                        <div class="nav small">
                            <a href="index-landing-business.html#" class="nav-link ps-0">Privacy Policy</a>
                            <a href="index-landing-business.html#" class="nav-link ps-0">Terms and Conditions</a>
                            <a href="index-landing-business.html#" class="nav-link ps-0">Press kit</a>
                        </div>
                    </div>

                    <div class="col-md-5 text-md-end">
                        <span class="d-block lh-sm small text-white-50">&copy; Copyright
                            <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>
                                document.write(new Date().getFullYear())

                            </script>. Assan
                        </span>
                    </div>
                </div>
            </div>
        </footer>
        <!--end:Footer-->

        <!-- begin:Back to Top button -->
        <a href="index-landing-business.html#" class="toTop">
            <i class="bx bxs-up-arrow"></i>
        </a>
        <!-- /end:Back to Top button -->


        <!--begin: Main script -->
        <script src="assets/js/theme.bundle.min.js"></script>
        <!--/end: Main script -->

        <!--begin:Swiper slider-->
        <script src="assets/vendor/node_modules/js/swiper-bundle.min.js"></script>
        <script>
            //Main Hero Slider
            var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                breakpoints: {
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 16,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                },
                on: {
                    'afterInit': function (swiper) {
                        swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                            .forEach($progress => $progress.style.transitionDuration =
                                `${swiper.params.autoplay.delay}ms`)
                    }
                }
            });
            var swiperClassic = new Swiper(".swiper-classic", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: true,
                        translate: ["-20%", 0, -1],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
                thumbs: {
                    swiper: sliderThumbs
                },
            });

            //swiper partners
            var swiperPartners5 = new Swiper(".swiper-partners", {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 16,
                autoplay: true,
                breakpoints: {
                    768: {
                        slidesPerView: 4
                    },
                    1024: {
                        slidesPerView: 5
                    }
                },
                pagination: {
                    el: ".swiper-partners-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-partners-button-next",
                    prevEl: ".swiper-partners-button-prev"
                }
            });

            //swiper Testimonials
            var swiperTestimonails = new Swiper(".swiper-testimonials", {
                autoHeight: true,
                spaceBetween: 16,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 16
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    }
                },
                pagination: {
                    el: ".swiper-testimonials-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-testimonials-button-next",
                    prevEl: ".swiper-testimonials-button-prev"
                }
            });

        </script>
        <!--/end:Swiper slider-->
    </body>

</html>
