<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed layout-menu-collapsed" dir="ltr" data-theme="theme-semi-dark"
   data-assets-path="{{ asset('assets/dashboard/materialize/assets/') }}/" data-template="vertical-menu-template">

<head>
   <meta charset="utf-8" />
   {{--
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> --}}
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>{{ $title . ' - ' . config('app.name') }}</title>


   <meta name="description"
      content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
   <meta name="keywords"
      content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">

   <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
   {{-- <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');
   </script> --}}
   <!-- End Google Tag Manager -->

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/rean-logo-brand.png') }}" />

   <!-- Fonts -->
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/index.html') }}">
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.gstatic.com/index.html') }}" crossorigin>
   <link
      href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/css2ab8c.css?family=Karla:wght@300;400;500;600;700&amp;display=swap') }}"
      rel="stylesheet">

   <!-- Material Design Icons -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/materialdesignicons.css') }}" />

   <!--Font Awesome Icons-->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/fontawesome.css') }}" />

   <!--Box Icons-->
   {{--
   <link rel="stylesheet" href="{{ asset('assets/landing/assan/assets/fonts/boxicons/css/boxicons.min.css') }}"> --}}

   <!-- Core CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/core.css') }}"
      class="template-customizer-core-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/theme-default.css') }}"
      class="template-customizer-theme-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/demo.css') }}" />

   <!-- Vendors CSS -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">
   @stack('vendor-css')

   <!-- Page CSS -->
   @stack('page-css')
   <!-- Custom -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/custom.css') }}">
   <!-- Helpers -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/helpers.js') }}"></script>
   <!-- Pace CSS -->
   {{--
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace-theme-default.min.css') }}">
   --}}
   {{--
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/flash.css') }}"> --}}


   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/template-customizer.js') }}"></script>
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="{{ asset('assets/dashboard/materialize/assets/js/config.js') }}"></script>

   <!-- Jquery  -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

   {{-- Toastr --}}
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.css') }}">
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.js') }}"></script>

   @stack('head')
   @stack('style')
   @stack('styles')
   @stack('css')

   <livewire:styles />
   {{-- @vite('resources/js/app.css') --}}

   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=G-D84783NT2M"></script>
   <script>
      window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-D84783NT2M');
   </script>
</head>

<body>
   <!-- Layout wrapper -->
   <div class="layout-wrapper layout-content-navbar  ">
      <div class="layout-container">

         <!-- Menu -->
         @include('dashboard.template.partials.sidebar')
         <!-- / Menu -->

         <!-- Layout container -->
         <div class="layout-page">

            <!-- Navbar -->
            @include('dashboard.template.partials.header')
            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
               <!-- Content -->
               <div class="container-xxl flex-grow-1 container-p-y">
                  @include('components.session')
                  @yield('content')
               </div>
               <!-- / Content -->

               <!-- Footer -->
               @include('dashboard.template.partials.footer')
               <!-- / Footer -->

               <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
         </div>
         <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>

   </div>
   <!-- / Layout wrapper -->

   @include('sweetalert::alert')
   @include('dashboard.template.partials.modal.logout')
   @include('dashboard.template.partials.modal.notifikasi')

   <livewire:scripts />
   {{-- <livewire:charts-scripts /> --}}
   @stack('script')
   @stack('modal')

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   {{-- <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/jquery/jquery.js') }}"></script> --}}
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/bootstrap.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}">
   </script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/hammer/hammer.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/i18n/i18n.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/menu.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/js/ui-popover.js') }}"></script>

   <!-- endbuild -->

   <!-- Vendors JS -->
   {{-- SweetAlert 2 --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
   @stack('vendor-js')

   <!-- Main JS -->
   <script src="{{ asset('assets/dashboard/materialize/assets/js/main.js') }}"></script>

   <!-- Page JS -->
   @stack('page-js')

   <!-- Pace JS -->
   {{-- <script data-pace-options='{ "restartOnPushState": false, "restartOnRequestAfter": false }'
      src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace.min.js') }}"></script> --}}

   {{-- @livewireScripts --}}
   @include('dashboard.template.partials.js')
   {{-- <script>
      window.addEventListener('chatSelected', event => {
         setTimeout(function() {
            scrollToBottom();
         }, 300); // Anda bisa menyesuaikan durasi timeout sesuai kebutuhan.
      });
      
      window.addEventListener('newMessageLoaded', event => {
         setTimeout(function() {
            scrollToBottom();
         }, 600); // Anda bisa menyesuaikan durasi timeout sesuai kebutuhan.
      });

      function scrollToBottom() {
         // const chatBody = document.querySelector('.chat-history-body');
         if (document.querySelector('.chat-history-body')) {
            // console.log(chatBody);
            document.querySelector('.chat-history-body').scrollTop = document.querySelector('.chat-history-body').scrollHeight+50;
            // console.log("LEWAT BUTTON ============");
            // console.log("Tinggi konten:", document.querySelector('.chat-history-body').scrollHeight);
            // console.log("Tinggi container:", document.querySelector('.chat-history-body').clientHeight);
         } else {
            console.log('tidak ada');
         }
      }
   </script> --}}
   {{-- @vite('resources/js/app.js') --}}
   @stack('scripts')
   {{-- <script>
      document.addEventListener("DOMContentLoaded", function() {
         Echo.private(`chat.2`).listen('.MessageSent', (e) => {
            console.log('eh');
            console.log(e);
         });
      });
   </script> --}}
   {{-- <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script> --}}
   {{-- <script>
      import Echo from 'laravel-echo';
      import Pusher from 'pusher-js';
      Pusher.logToConsole = true;
      window.Pusher = Pusher;

      window.Echo = new Echo({
         broadcaster: 'pusher',
         key: import.meta.env.VITE_PUSHER_APP_KEY,
         cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER ?? 'mt1',
         enabledTransports: ['ws', 'wss'],
         // encrypted: true, // Aktifkan enkripsi
         useTLS: true,    // Gunakan TLS
         disableStats: true,
      });
   </script> --}}
   @livewireChartsScripts
</body>

</html>