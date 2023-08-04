<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed " dir="ltr" data-theme="theme-semi-dark" data-assets-path="{{ asset('assets/dashboard/materialize/assets/') }}/"
   data-template="vertical-menu-template">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> 
   <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>{{ $title . ' - ' . config('app.name') }}</title>


   <meta name="description" content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
   <meta name="keywords" content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
   <!-- Canonical SEO -->
   <link rel="canonical"
      href="https://themeforest.net/item/materialize-material-design-admin-template/11446068?irgwc=1&amp;clickid=&amp;iradid=275988&amp;irpid=1244113&amp;iradtype=ONLINE_TRACKING_LINK&amp;irmptype=mediapartner&amp;mp_value1=&amp;utm_campaign=af_impact_radius_1244113&amp;utm_medium=affiliate&amp;utm_source=impact_radius">


   <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
   {{-- <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      '../../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');</script> --}}
   <!-- End Google Tag Manager -->

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/rean-logo-brand.png') }}" />

   <!-- Fonts -->
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/index.html') }}">
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.gstatic.com/index.html') }}" crossorigin>
   <link href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/css2ab8c.css?family=Karla:wght@300;400;500;600;700&amp;display=swap') }}" rel="stylesheet">

   <!-- Icons -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/materialdesignicons.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/fontawesome.css') }}" />

   <!-- Core CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/demo.css') }}" />

   <!-- Vendors CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
   @stack('vendor-css')

   <!-- Page CSS -->
   @stack('page-css')
   <!-- Custom -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/custom.css') }}">
   <!-- Helpers -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/helpers.js') }}"></script>
   <!-- Pace CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace-theme-default.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/flash.css') }}">
   


   <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
   <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/template-customizer.js') }}"></script>
   <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
   <script src="{{ asset('assets/dashboard/materialize/assets/js/config.js') }}"></script>

   <!-- Jquery  -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
   
   {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> --}}
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.css') }}">
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/toastr/toastr.js') }}"></script>

   @stack('head')
   @stack('style')
   @stack('css')
   @livewireStyles
   {{-- <livewire:styles /> --}}
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
      {{-- <div class="layout-overlay layout-menu-toggle"></div> --}}
      <!-- Drag Target Area To SlideIn Menu On Small Screens -->
      <div class="drag-target"></div>

   </div>
   <!-- / Layout wrapper -->


   {{-- <div class="buy-now">
      <a href="https://1.envato.market/materialize_admin" target="_blank" class="btn btn-danger btn-buy-now">Buy Now</a>
   </div> --}}
   
   @include('sweetalert::alert')
   @include('dashboard.template.partials.modal.logout')
   @include('dashboard.template.partials.modal.notifikasi')

   @stack('scripts')
   @stack('script')
   @stack('modal')

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   {{-- <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/jquery/jquery.js') }}"></script> --}}
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/bootstrap.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/hammer/hammer.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/i18n/i18n.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/menu.js') }}"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->
   @stack('vendor-js')

   <!-- Main JS -->
   <script src="{{ asset('assets/dashboard/materialize/assets/js/main.js') }}"></script>

   <!-- Page JS -->
   @stack('page-js')
   
   <!-- Pace JS -->
   <script data-pace-options='{ "ajax": false }' src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace.min.js') }}"></script>
   @livewireScripts
   {{-- <livewire:scripts /> --}}
   <script>
      window.addEventListener('alert', event => { 
         toastr[event.detail.type](event.detail.message, 
         event.detail.title ?? ''), toastr.options = {
               "closeButton": true,
               "progressBar": true,
               "debug": true,
               "newest": true,
               "preventDuplicates": true,
               // "showEasing": "swing",
               // "hideEasing": "linear",
               // "showMethod": "slideInRight",
               // "hideMethod": "slideInLeft"
            }
      });
   </script>
</body>

</html>
