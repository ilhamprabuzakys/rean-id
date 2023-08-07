<!doctype html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="{{ asset('assets/img/rean-logo-brand.png') }}" type="image/ico">
        <!--Box Icons-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/fonts/boxicons/css/boxicons.min.css') }}">
       
        <!--FontAwesome Icons-->
        <link rel="stylesheet" href="{{ asset('assets/vendor/font-awesome/all.min.css') }}">

        <!--AOS Animations-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/aos.css') }}">

        <!--Iconsmind Icons-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/fonts/iconsmind/iconsmind.css') }}">

        <!--Google fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!--Swiper slider-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
        <!--G-lightbox-->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/glightbox.min.css') }}">
        <!-- Main CSS -->
        <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/css/theme.min.css') }}">

        <title>{{ config('app.name') }}</title>
        <style>
            ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                display: none;
                /* background-color: transparent; */
            }

            ::-webkit-scrollbar-thumb {
                background-color: #b3cbf8;
            }
        </style>
        @stack('styles')
    </head>

    <body>
        @stack('particle')
         <!--Preloader Spinner-->
         <div class="spinner-loader bg-dark text-white">
            <div class="spinner-grow" role="status">
            </div>
            {{-- <span class="small d-block ms-2">Loading...</span> --}}
        </div>
        <!--Header Start-->
        @include('landing.layouts.partials.header')
        <!--Main content-->

        <main class="main-content" id="main-content">

            <!--begin:Hero section-->
            @yield('hero')
            {{-- @include('landing.layouts.partials.hero') --}}
            {{-- @include('landing.layouts.partials.hero2') --}}
            
            <!--/end:Hero section-->

            @yield('content')
        </main>

        <!--begin:Footer-->
            @yield('footer', View::make('landing.layouts.partials.footer'))
        <!--end:Footer-->    

        <!-- begin:Back to Top button -->
        <a href="#" class="toTop">
            {{-- <i class="bx bxs-up-arrow"></i> --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up icon-xxs"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>
        </a>
        {{-- <a class="btn btn-soft-primary shadow-none btn-icon btn-back-to-top show" href="blog-post.html#"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up icon-xxs"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg></a> --}}
        <!-- /end:Back to Top button -->


        <!--begin: Main script -->
        <script src="{{ asset('assets/landing/assan/assets/js/theme.bundle.min.js') }}"></script>
        <!--/end: Main script -->

        <!--begin:Swiper slider-->
        <script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>
        
        <!--begin:Splitting -->
        <script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/splitting.min.js') }}"></script>

        
        @stack('scripts')
    </body>

</html>
