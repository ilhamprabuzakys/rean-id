<!doctype html>
<html lang="en">

<head>

   <meta charset="utf-8" />
   <title>{{ $title . ' | ' . config('app.name') }}</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="Komunitas Anti Narkoba REAN.ID" name="description" />
   <meta content="Ilham Prabu Zaky S" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja.png') }}">
   <!-- Bootstrap Css -->
   <link href="{{ asset('assets/borex/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{ asset('assets/borex/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('assets/borex/css/app.min.css') }}" rel="stylesheet" type="text/css" />
   @stack('style')
   @stack('head')
</head>


<body data-sidebar="dark">

   @php
      $auth = cache()->remember('auth-user', 60 * 60 * 24, function () {
          return auth()->user();
      });
   @endphp
   <!-- <body data-layout="horizontal"> -->

   <!-- Begin page -->
   <div id="layout-wrapper">
      @include('dashboard.layouts.components.topbar')
      <!-- ========== Left Sidebar Start ========== -->
      <div class="vertical-menu">

         <!-- LOGO -->
         <div class="navbar-brand-box">
            <a href="index.html" class="logo logo-dark">
               <span class="logo-sm">
                  <img src="assets/borex/images/logo-dark-sm.png" alt="" height="22">
               </span>
               <span class="logo-lg">
                  <img src="assets/borex/images/logo-dark.png" alt="" height="22">
               </span>
            </a>

            <a href="index.html" class="logo logo-light">
               <span class="logo-lg">
                  <img src="assets/borex/images/logo-light.png" alt="" height="22">
               </span>
               <span class="logo-sm">
                  <img src="assets/borex/images/logo-light-sm.png" alt="" height="22">
               </span>
            </a>
         </div>

         <button type="button" class="btn btn-sm px-3 header-item vertical-menu-btn topnav-hamburger">
            <div class="hamburger-icon">
               <span></span>
               <span></span>
               <span></span>
            </div>
         </button>

         <div data-simplebar class="sidebar-menu-scroll">

            <!--- Sidemenu -->
            @include('dashboard.layouts.components.sidebar')
            <!-- Sidebar -->

            <div class="p-3 px-4 sidebar-footer">
               <p class="mb-1 main-title">
                  <script>
                     document.write(new Date().getFullYear())
                  </script> &copy; Borex.
               </p>
               <p class="mb-0">Design & Develop by Themesbrand</p>
            </div>
         </div>
      </div>
      <!-- Left Sidebar End -->
      @include('dashboard.layouts.components.header')

      <!-- ============================================================== -->
      <!-- Start right Content here -->
      <!-- ============================================================== -->
      <div class="main-content">
         <div class="page-content">
            <div class="container-fluid" id="app">
               @include('dashboard.components.session')
                @yield('content')
            </div>
            <!-- container-fluid -->
         </div>
         <!-- End Page-content -->

         <footer class="footer">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-12">
                     <script>
                        document.write(new Date().getFullYear())
                     </script> &copy; Rean.ID - Powered & Develop by PT. Inti Optima Teknologi
                  </div>
               </div>
            </div>
         </footer>
      </div>
      <!-- end main content-->

   </div>
   <!-- END layout-wrapper -->

   <!-- Right Sidebar -->
   <div class="right-bar">
      <div data-simplebar class="h-100">
         <div class="rightbar-title d-flex align-items-center bg-dark p-3">

            <h5 class="m-0 me-2 text-white">Theme Customizer</h5>

            <a href="javascript:void(0);" class="right-bar-toggle-close ms-auto">
               <i class="mdi mdi-close noti-icon"></i>
            </a>
         </div>

         <!-- Settings -->
         <hr class="m-0" />

         <div class="p-4">
            <h6 class="mb-3">Layout</h6>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout"
                  id="layout-vertical" value="vertical">
               <label class="form-check-label" for="layout-vertical">Vertical</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout"
                  id="layout-horizontal" value="horizontal">
               <label class="form-check-label" for="layout-horizontal">Horizontal</label>
            </div>

            <h6 class="mt-4 mb-3">Layout Mode</h6>

            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-mode"
                  id="layout-mode-light" value="light">
               <label class="form-check-label" for="layout-mode-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-mode"
                  id="layout-mode-dark" value="dark">
               <label class="form-check-label" for="layout-mode-dark">Dark</label>
            </div>

            <h6 class="mt-4 mb-3">Layout Width</h6>

            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-width"
                  id="layout-width-fluid" value="fluid" onchange="document.body.setAttribute('data-layout-size', 'fluid')">
               <label class="form-check-label" for="layout-width-fluid">Fluid</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-width"
                  id="layout-width-boxed" value="boxed" onchange="document.body.setAttribute('data-layout-size', 'boxed')">
               <label class="form-check-label" for="layout-width-boxed">Boxed</label>
            </div>

            <h6 class="mt-4 mb-3">Layout Position</h6>

            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-position"
                  id="layout-position-fixed" value="fixed" onchange="document.body.setAttribute('data-layout-scrollable', 'false')">
               <label class="form-check-label" for="layout-position-fixed">Fixed</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-position"
                  id="layout-position-scrollable" value="scrollable" onchange="document.body.setAttribute('data-layout-scrollable', 'true')">
               <label class="form-check-label" for="layout-position-scrollable">Scrollable</label>
            </div>

            <h6 class="mt-4 mb-3">Topbar Color</h6>

            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="topbar-color"
                  id="topbar-color-light" value="light" onchange="document.body.setAttribute('data-topbar', 'light')">
               <label class="form-check-label" for="topbar-color-light">Light</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="topbar-color"
                  id="topbar-color-dark" value="dark" onchange="document.body.setAttribute('data-topbar', 'dark')">
               <label class="form-check-label" for="topbar-color-dark">Dark</label>
            </div>

            <div id="sidebar-setting">
               <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Size</h6>

               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size"
                     id="sidebar-size-default" value="default" onchange="document.body.setAttribute('data-sidebar-size', 'lg')">
                  <label class="form-check-label" for="sidebar-size-default">Default</label>
               </div>
               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size"
                     id="sidebar-size-compact" value="compact" onchange="document.body.setAttribute('data-sidebar-size', 'md')">
                  <label class="form-check-label" for="sidebar-size-compact">Compact</label>
               </div>
               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-size"
                     id="sidebar-size-small" value="small" onchange="document.body.setAttribute('data-sidebar-size', 'sm')">
                  <label class="form-check-label" for="sidebar-size-small">Small (Icon View)</label>
               </div>

               <h6 class="mt-4 mb-3 sidebar-setting">Sidebar Color</h6>

               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color"
                     id="sidebar-color-light" value="light" onchange="document.body.setAttribute('data-sidebar', 'light')">
                  <label class="form-check-label" for="sidebar-color-light">Light</label>
               </div>
               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color"
                     id="sidebar-color-dark" value="dark" onchange="document.body.setAttribute('data-sidebar', 'dark')">
                  <label class="form-check-label" for="sidebar-color-dark">Dark</label>
               </div>
               <div class="form-check sidebar-setting">
                  <input class="form-check-input" type="radio" name="sidebar-color"
                     id="sidebar-color-brand" value="brand" onchange="document.body.setAttribute('data-sidebar', 'brand')">
                  <label class="form-check-label" for="sidebar-color-brand">Brand</label>
               </div>
            </div>

            <h6 class="mt-4 mb-3">Direction</h6>

            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-direction"
                  id="layout-direction-ltr" value="ltr">
               <label class="form-check-label" for="layout-direction-ltr">LTR</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="layout-direction"
                  id="layout-direction-rtl" value="rtl">
               <label class="form-check-label" for="layout-direction-rtl">RTL</label>
            </div>

         </div>

      </div> <!-- end slimscroll-menu-->
   </div>
   <!-- /Right-bar -->

   <!-- Right bar overlay-->
   <div class="rightbar-overlay"></div>

   <!-- chat offcanvas -->
   <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasActivity" aria-labelledby="offcanvasActivityLabel">
      <div class="offcanvas-header border-bottom">
         <h5 id="offcanvasActivityLabel">Offcanvas right</h5>
         <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
         ...
      </div>
   </div>

   @stack('modal')

   <!-- JAVASCRIPT -->
   <script src="{{ asset('assets/borex/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/metismenujs/metismenujs.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/simplebar/simplebar.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/eva-icons/eva.min.js') }}"></script>
   
   @stack('scripts')
   <script src="{{ asset('assets/borex/js/app.js') }}"></script>
   {{-- @vite('resources/js/app.js') --}}
</body>

</html>
