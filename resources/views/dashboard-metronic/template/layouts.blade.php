<!DOCTYPE html>
<html lang="en">
   <head>
      <title>{{ config('app.name') }}</title>
      <meta charset="utf-8" />
      <meta name="description"
         content="
         Aplikasi Rean.ID
         " />
      <meta name="keywords"
         content="
         rean, rean.id, bnn, narkob, narkoboy, gacor kang
         " />
      <meta name="viewport" content="width=device-width, initial-scale=1" />
      <meta property="og:locale" content="en_US" />
      <meta property="og:type" content="article" />
      <meta property="og:title"
         content="
         Rean.ID
         " />
      <meta property="og:url" content="https://rean.bnn.go.id" />
      <meta property="og:site_name" content="Rean.ID | Anti Narkoba" />
      <link rel="canonical" href="/" />
      <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja.png') }}" />
      @include('dashboard.template.partials.css')
   </head>
   <!--end::Head-->
   <!--begin::Body-->
   <body id="kt_app_body" data-kt-app-layout="dark-sidebar" data-kt-app-header-fixed="true" data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
      data-kt-app-sidebar-push-header="true" data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true" class="app-default">
      <!--begin::Theme mode setup on page load-->
      <script>
         var defaultThemeMode = "light";
         var themeMode;
         
         if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
               themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
               if (localStorage.getItem("data-bs-theme") !== null) {
                  themeMode = localStorage.getItem("data-bs-theme");
               } else {
                  themeMode = defaultThemeMode;
               }
            }
         
            if (themeMode === "system") {
               themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
         
            document.documentElement.setAttribute("data-bs-theme", themeMode);
         }
      </script>
      <!--end::Theme mode setup on page load-->
      <!--Begin::Google Tag Manager (noscript) -->
      <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <!--End::Google Tag Manager (noscript) -->
      <!--begin::App-->
      <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
         <!--begin::Page-->
         <div class="app-page  flex-column flex-column-fluid " id="kt_app_page">
            <!--begin::Header-->
            @include('dashboard.template.partials.header')
            <!--end::Header-->
            <!--begin::Wrapper-->
            <div class="app-wrapper  flex-column flex-row-fluid " id="kt_app_wrapper">
               <!--begin::Sidebar-->
               @include('dashboard.template.partials.sidebar-old')
               <!--end::Sidebar-->
               <!--begin::Main-->
               <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                  <!--begin::Content wrapper-->
                  <div class="d-flex flex-column flex-column-fluid">
                     <!--begin::Toolbar-->
                     <div id="kt_app_toolbar" class="app-toolbar  py-3 py-lg-6 ">
                        <!--begin::Toolbar container-->
                        <div id="kt_app_toolbar_container" class="app-container  container-fluid d-flex flex-stack ">
                           <!--begin::Page title-->
                           <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3 ">
                              <!--begin::Title-->
                              <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                 @yield('page-heading')
                              </h1>
                              <!--end::Title-->
                              <!--begin::Breadcrumb-->
                              <ul class="breadcrumb breadcrumb-separatorless fw-semibold fs-7 my-0 pt-1">
                                @yield('breadcrumb')
                              </ul>
                              <!--end::Breadcrumb-->
                           </div>
                           <!--end::Page title-->
                           <!--begin::Actions-->
                           <div class="d-flex align-items-center gap-2 gap-lg-3">
                              <!--begin::Secondary button-->
                              <a href="#" class="btn btn-sm fw-bold bg-body btn-color-gray-700 btn-active-color-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_app">
                              Rollover </a>
                              <!--end::Secondary button-->
                              <!--begin::Primary button-->
                              <a href="#" class="btn btn-sm fw-bold btn-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_new_target">
                              Add Target </a>
                              <!--end::Primary button-->
                           </div>
                           <!--end::Actions-->
                        </div>
                        <!--end::Toolbar container-->
                     </div>
                     <!--end::Toolbar-->
                     <!--begin::Content-->
                     <div id="kt_app_content" class="app-content  flex-column-fluid ">
                        <!--begin::Content container-->
                        <div id="kt_app_content_container" class="app-container  container-xxl ">
                        @yield('content')
                        <!--end::Content container-->
                     </div>

                     </div>
                     <!--end::Content-->
                  </div>
                  <!--end::Content wrapper-->
                  <!--begin::Footer-->
                  <div id="kt_app_footer" class="app-footer ">
                     <!--begin::Footer container-->
                     <div class="app-container  container-fluid d-flex flex-column flex-md-row flex-center flex-md-stack py-3 ">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                           <span class="text-muted fw-semibold me-1">2023&copy;</span>
                           <a href="http://rean.bnn.go.id/" target="_blank" class="text-gray-800 text-hover-primary">REAN.ID</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Menu-->
                        <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
                           <li class="menu-item"><a href="http://rean.bnn.go.id/" target="_blank" class="menu-link px-2">About</a></li>
                           <li class="menu-item"><a href="http://rean.bnn.go.id/" target="_blank" class="menu-link px-2">Support</a></li>
                        </ul>
                        <!--end::Menu-->
                     </div>
                     <!--end::Footer container-->
                  </div>
                  <!--end::Footer-->
               </div>
               <!--end:::Main-->
            </div>
            <!--end::Wrapper-->
         </div>
         <!--end::Page-->
      </div>
      <!--end::App-->
      {{-- @include('dashboard.template.partials.metronic-plugin') --}}
      <!--end::Engage-->
      <!--begin::Engage modals-->
      @include('dashboard.template.partials.modals.metronic')
      <!--end::Modals-->
      <!--begin::Javascript-->
      @include('dashboard.template.partials.script')
   </body>
   <!--end::Body-->
   <!-- Mirrored from preview.keenthemes.com/metronic8/demo1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 22 Jun 2023 01:48:51 GMT -->
</html>
