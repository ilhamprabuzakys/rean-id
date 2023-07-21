<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="sm-hover" data-sidebar-image="none" data-preloader="enable">
<head>

   <meta charset="utf-8" />
   <title>{{ $title ?? '' }} - REAN.ID</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
   <meta content="Themesbrand" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}">

   <!-- jsvectormap css -->
   <link href="{{ asset('assets/dashboard/velzon/assets/dashboard/velzon/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

   <!--Swiper slider css-->
   <link href="{{ asset('assets/borex/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />

   <!-- Layout config Js -->
   <script src="{{ asset('assets/dashboard/velzon/assets/js/layout.js') }}"></script>
   <!-- Bootstrap Css -->
   <link href="{{ asset('assets/dashboard/velzon/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{ asset('assets/dashboard/velzon/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('assets/dashboard/velzon/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- custom Css-->
   <link href="{{ asset('assets/dashboard/velzon/assets/css/custom.min.css') }}" rel="stylesheet" type="text/css" />

	<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
	@stack('head')
	@stack('css')
	@stack('style')
</head>

<body>

   <!-- Begin page -->
   <div id="layout-wrapper">

      <!-- Top Bar -->
      @include('dashboard.template.partials.header')

      <!-- removeNotificationModal -->
      @include('dashboard.template.partials.modal.remove-notification')
      
      <!-- ========== App Menu or Sidebar ========== -->
      @include('dashboard.template.partials.sidebar')
      
      <!-- Left Sidebar End -->
      <!-- Vertical Overlay-->
      <div class="vertical-overlay"></div>

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">

         <div class="page-content">
            <div class="container-fluid">

               @yield('content')

            </div>
            <!-- container-fluid -->
         </div>
         <!-- End Page-content -->
			
         <!-- Footer -->
         @include('dashboard.template.partials.footer')
      </div>
      <!-- end main content-->

   </div>
   <!-- END layout-wrapper -->



   <!--start back-to-top-->
   <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
      <i class="ri-arrow-up-line"></i>
   </button>
   <!--end back-to-top-->

   <!--preloader-->
   <div id="preloader">
      <div id="status">
         <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
         </div>
      </div>
   </div>

   {{-- <div class="customizer-setting d-none d-md-block">
      <div class="btn-info rounded-pill shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas" data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas">
         <i class='mdi mdi-spin mdi-cog-outline fs-22'></i>
      </div>
   </div> --}}

   <!-- Theme Settings -->
   {{-- @include('dashboard.template.partials.theme') --}}

   <!-- JAVASCRIPT -->
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/simplebar/simplebar.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/node-waves/waves.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/feather-icons/feather.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/js/pages/plugins/lord-icon-2.1.0.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/js/plugins.js') }}"></script>

   <!-- apexcharts -->
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

   <!-- Vector map-->
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

   <!--Swiper slider js-->
   <script src="{{ asset('assets/dashboard/velzon/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

   <!-- Dashboard init -->
   <script src="{{ asset('assets/dashboard/velzon/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>

   <!-- App js -->
   <script src="{{ asset('assets/dashboard/velzon/assets/js/app.js') }}"></script>
   @stack('modal')
	@stack('script')
	@stack('javascript')
</body>
</html
