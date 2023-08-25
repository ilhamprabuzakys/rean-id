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
   <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,400&family=Source+Serif+Pro:ital@0;1&display=swap"
      rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700&display=swap"
      rel="stylesheet">

   <!--Swiper slider-->
   <link rel="stylesheet"
      href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/swiper-bundle.min.css') }}">
   <!--G-lightbox-->
   <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/glightbox.min.css') }}">
   <!--AOS-->
   <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/vendor/node_modules/css/aos.css') }}">
   <!-- Main CSS -->
   <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/css/theme.min.css') }}">
   <!-- Custom CSS -->
   <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/css/custom.css') }}">
   {{-- Toastr --}}
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.css') }}">
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.js') }}"></script>
   <!-- Jquery  -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   <title>{{ $title ?? '' . config('app.name') }}</title>
   <style>
      /* ::-webkit-scrollbar {
                width: 5px;
            }

            ::-webkit-scrollbar-track {
                display: none;
                background-color: transparent;
            }

            ::-webkit-scrollbar-thumb {
                background-color: #b3cbf8;
            } */

      body {
         overflow: overlay;
      }

      ::-webkit-scrollbar {
         width: 5px;
         background: transparent;
      }


      ::-webkit-scrollbar-thumb {
         border-radius: 20px;
         background-color: #b3cbf8;
      }
   </style>
   @stack('styles')
   <livewire:styles />
</head>

<body>
   @stack('particle')
   <!--Preloader Spinner-->
   <div class="spinner-loader bg-white text-primary">
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
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
         class="feather feather-arrow-up icon-xxs">
         <line x1="12" y1="19" x2="12" y2="5"></line>
         <polyline points="5 12 12 5 19 12"></polyline>
      </svg>
   </a>

   <a class="whatsapp-ico" onclick="shareToWhatsApp('Halo, saya tertarik dengan komunitas ini, bisa izinkan saya untuk bergabung dengan Anda!')">
      <svg viewBox="0 0 32 32" class="whatsapp-ico">
         <path
            d=" M19.11 17.205c-.372 0-1.088 1.39-1.518 1.39a.63.63 0 0 1-.315-.1c-.802-.402-1.504-.817-2.163-1.447-.545-.516-1.146-1.29-1.46-1.963a.426.426 0 0 1-.073-.215c0-.33.99-.945.99-1.49 0-.143-.73-2.09-.832-2.335-.143-.372-.214-.487-.6-.487-.187 0-.36-.043-.53-.043-.302 0-.53.115-.746.315-.688.645-1.032 1.318-1.06 2.264v.114c-.015.99.472 1.977 1.017 2.78 1.23 1.82 2.506 3.41 4.554 4.34.616.287 2.035.888 2.722.888.817 0 2.15-.515 2.478-1.318.13-.33.244-.73.244-1.088 0-.058 0-.144-.03-.215-.1-.172-2.434-1.39-2.678-1.39zm-2.908 7.593c-1.747 0-3.48-.53-4.942-1.49L7.793 24.41l1.132-3.337a8.955 8.955 0 0 1-1.72-5.272c0-4.955 4.04-8.995 8.997-8.995S25.2 10.845 25.2 15.8c0 4.958-4.04 8.998-8.998 8.998zm0-19.798c-5.96 0-10.8 4.842-10.8 10.8 0 1.964.53 3.898 1.546 5.574L5 27.176l5.974-1.92a10.807 10.807 0 0 0 16.03-9.455c0-5.958-4.842-10.8-10.802-10.8z"
            fill-rule="evenodd"></path>
      </svg></a>

   @include('sweetalert::alert')

   {{-- <a class="btn btn-soft-primary shadow-none btn-icon btn-back-to-top show" href="blog-post.html#"><svg
         xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
         stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up icon-xxs">
         <line x1="12" y1="19" x2="12" y2="5"></line>
         <polyline points="5 12 12 5 19 12"></polyline>
      </svg></a> --}}
   <!-- /end:Back to Top button -->


   <livewire:scripts />

   <!--begin: Main script -->
   <script src="{{ asset('assets/landing/assan/assets/js/theme.bundle.min.js') }}"></script>
   <!--/end: Main script -->

   @stack('vendor-js')
   {{-- SweetAlert 2 --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

   <!--begin:Swiper slider-->
   <script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/swiper-bundle.min.js') }}"></script>

   <!--begin:Splitting -->
   <script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/splitting.min.js') }}"></script>

   <!--begin:AOS -->
   <script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/aos.js') }}"></script>

   @stack('scripts')
   @include('landing.layouts.partials.js.utils')
</body>

</html>