<!DOCTYPE html>


<html lang="en" class="light-style  customizer-hide" dir="ltr" data-theme="theme-default"
   data-assets-path="{{ asset('assets/dashboard/materialize/assets/') }}/" data-template="vertical-menu-template">

<head>
   <meta charset="utf-8" />
   <meta name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

   <title>{{ $title . ' - ' . config('app.name') }}</title>


   <meta name="description"
      content="Materialize – is the most developer friendly &amp; highly customizable Admin Dashboard Template." />
   <meta name="keywords"
      content="dashboard, material, material design, bootstrap 5 dashboard, bootstrap 5 design, bootstrap 5">
   <!-- Canonical SEO -->
   <link rel="canonical"
      href="https://themeforest.net/item/materialize-material-design-admin-template/11446068?irgwc=1&amp;clickid=&amp;iradid=275988&amp;irpid=1244113&amp;iradtype=ONLINE_TRACKING_LINK&amp;irmptype=mediapartner&amp;mp_value1=&amp;utm_campaign=af_impact_radius_1244113&amp;utm_medium=affiliate&amp;utm_source=impact_radius">

   <!-- ? PROD Only: Google Tag Manager (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
   {{-- <script>
      (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
      new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
      j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
      'www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
      })(window,document,'script','dataLayer','GTM-5J3LMKC');
   </script> --}}
   <!-- End Google Tag Manager -->

   <!-- Favicon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/rean-logo-brand.png') }}" />

   <!-- Fonts -->
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/index.html') }}">
   <link rel="preconnect" href="{{ asset('assets/dashboard/materialize/fonts.gstatic.com/index.html') }}" crossorigin>
   <link
      href="{{ asset('assets/dashboard/materialize/fonts.googleapis.com/css2ab8c.css?family=Inter:wght@300;400;500;600;700&amp;display=swap') }}"
      rel="stylesheet">

   <!-- Icons -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/materialdesignicons.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/fonts/fontawesome.css') }}" />

   <!-- Core CSS -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/core.css') }}"
      class="template-customizer-core-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/rtl/theme-default.css') }}"
      class="template-customizer-theme-css" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/demo.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/css/custom.css') }}" />

   <!-- Vendors CSS -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bs-stepper/bs-stepper.css') }}" />
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bootstrap-select/bootstrap-select.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.css') }}" />

   <!-- Vendor -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css">

   <!-- Page CSS -->
   <!-- Page -->
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/css/pages/page-auth.css') }}">
   <!-- Helpers -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/helpers.js') }}"></script>
   <!-- Pace CSS -->
   <link rel="stylesheet"
      href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace-theme-default.min.css') }}">
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/flash.css') }}">

   <!-- Jquery  -->
   <script src="https://code.jquery.com/jquery-3.7.0.min.js"
      integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

   <style>
      .my-custom-content {
         text-align: left;
      }

      .my-custom-title {
         font-size: 16px;
      }
   </style>
   @stack('head')
   @stack('style')
   @stack('css')
   <livewire:styles />
</head>

<body>


   <!-- ?PROD Only: Google Tag Manager (noscript) (Default ThemeSelection: GTM-5DDHKGP, PixInvent: GTM-5J3LMKC) -->
   {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5J3LMKC" height="0" width="0"
         style="display: none; visibility: hidden"></iframe></noscript> --}}
   <!-- End Google Tag Manager (noscript) -->

   <!-- Content -->

   <div class="position-relative">
      <div class="authentication-wrapper authentication-basic container-p-y">
         <div class="authentication-inner py-4 @yield('custom-width')">

            <!-- Login -->
            <div class="card p-2">
               <!-- Logo -->
               <div class="app-brand justify-content-start mt-5">
                  <a href="{{ route('index') }}" class="app-brand-link gap-2">
                     <span class="app-brand-logo demo ms-4">
                        {{-- <span style="color:#666cff;">
                           <svg width="268" height="150" viewBox="0 0 38 20" fill="none"
                              xmlns="http://www.w3.org/2000/svg">
                              <path
                                 d="M30.0944 2.22569C29.0511 0.444187 26.7508 -0.172113 24.9566 0.849138C23.1623 1.87039 22.5536 4.14247 23.5969 5.92397L30.5368 17.7743C31.5801 19.5558 33.8804 20.1721 35.6746 19.1509C37.4689 18.1296 38.0776 15.8575 37.0343 14.076L30.0944 2.22569Z"
                                 fill="currentColor" />
                              <path
                                 d="M30.171 2.22569C29.1277 0.444187 26.8274 -0.172113 25.0332 0.849138C23.2389 1.87039 22.6302 4.14247 23.6735 5.92397L30.6134 17.7743C31.6567 19.5558 33.957 20.1721 35.7512 19.1509C37.5455 18.1296 38.1542 15.8575 37.1109 14.076L30.171 2.22569Z"
                                 fill="url(#paint0_linear_2989_100980)" fill-opacity="0.4" />
                              <path
                                 d="M22.9676 2.22569C24.0109 0.444187 26.3112 -0.172113 28.1054 0.849138C29.8996 1.87039 30.5084 4.14247 29.4651 5.92397L22.5251 17.7743C21.4818 19.5558 19.1816 20.1721 17.3873 19.1509C15.5931 18.1296 14.9843 15.8575 16.0276 14.076L22.9676 2.22569Z"
                                 fill="currentColor" />
                              <path
                                 d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                 fill="currentColor" />
                              <path
                                 d="M14.9558 2.22569C13.9125 0.444187 11.6122 -0.172113 9.818 0.849138C8.02377 1.87039 7.41502 4.14247 8.45833 5.92397L15.3983 17.7743C16.4416 19.5558 18.7418 20.1721 20.5361 19.1509C22.3303 18.1296 22.9391 15.8575 21.8958 14.076L14.9558 2.22569Z"
                                 fill="url(#paint1_linear_2989_100980)" fill-opacity="0.4" />
                              <path
                                 d="M7.82901 2.22569C8.87231 0.444187 11.1726 -0.172113 12.9668 0.849138C14.7611 1.87039 15.3698 4.14247 14.3265 5.92397L7.38656 17.7743C6.34325 19.5558 4.04298 20.1721 2.24875 19.1509C0.454514 18.1296 -0.154233 15.8575 0.88907 14.076L7.82901 2.22569Z"
                                 fill="currentColor" />
                              <defs>
                                 <linearGradient id="paint0_linear_2989_100980" x1="5.36642" y1="0.849138" x2="10.532"
                                    y2="24.104" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-opacity="1" />
                                    <stop offset="1" stop-opacity="0" />
                                 </linearGradient>
                                 <linearGradient id="paint1_linear_2989_100980" x1="5.19475" y1="0.849139" x2="10.3357"
                                    y2="24.1155" gradientUnits="userSpaceOnUse">
                                    <stop offset="0" stop-opacity="1" />
                                    <stop offset="1" stop-opacity="0" />
                                 </linearGradient>
                              </defs>
                           </svg>
                        </span> --}}
                        <img src="{{ asset('assets/img/rean-logo-brand.png') }}" alt="logo-brand" style="height: 60px">
                     </span>
                     {{-- <span class="app-brand-text demo text-heading fw-bold ms-3">
                        <img src="{{ asset('assets/img/rean-text-logo-dark.png') }}" alt="logo-brand-text" style="
                           height: 35px;">
                     </span> --}}
                  </a>
               </div>
               <!-- /Logo -->

               <div class="card-body mt-2">

                  @yield('header')

                  @include('auth.session')

                  @yield('content')
               </div>


            </div>
            <!-- /Login -->
            @yield('bg-img')
            {{-- <img alt="mask"
               src="{{ asset('assets/dashboard/mater               ialize/assets/img/illustrations/auth-basic-login-mask-light.png') }}"
               class="authentication-image d-none d-lg-block"
               data-app-light-img="illustrations/auth-basic-login-mask-light.png"
               data-app-dark-img="illustrations/auth-basic-login-mask-dark.html" /> --}}
         </div>
      </div>
   </div>

   <!-- / Content -->
   @include('sweetalert::alert')

   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/jquery/jquery.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/popper/popper.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/bootstrap.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}">
   </script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/hammer/hammer.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/i18n/i18n.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/js/menu.js') }}"></script>
   <!-- endbuild -->

   <!-- Vendors JS -->
   {{-- SweetAlert 2 --}}
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/bs-stepper/bs-stepper.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.js') }}"></script>
   <script
      src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}">
   </script>
   <script
      src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}">
   </script>
   <script
      src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}">
   </script>

   <!-- Main JS -->
   <script src="{{ asset('assets/dashboard/materialize/assets/js/main.js') }}"></script>
   <!-- Page JS -->
   @stack('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/pages-auth.js') }}"></script>
   <!-- Pace JS -->
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/pace/pace-1.2.4/pace.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/js/ui-popover.js') }}"></script>

   <livewire:scripts />
   @stack('javascripts')
   @stack('scripts')
   <script>
      Livewire.on('swal:modal', data => {
         Swal.fire({
            title: data[0].title,
            html: data[0].text,
            icon: data[0].icon,
            showConfirmButton: true,
            // confirmButtonText: 'Okay',
            timer: data[0].duration ?? 2500,
            timerProgressBar: true,
            allowOutsideClick: false,
         })
      });
   </script>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const toggleEyes = document.querySelectorAll('.form-password-toggle .input-group-text');
         toggleEyes.forEach(toggle => {
            toggle.addEventListener('click', function() {
                  const input = this.closest('.input-group').querySelector('input');
                  const icon = this.querySelector('i');
      
                  // Jika tipe saat ini adalah 'password', ganti menjadi 'text' dan sebaliknya
                  if (input.type === 'password') {
                     input.type = 'text';
                     icon.classList.remove('mdi-eye-off-outline');
                     icon.classList.add('mdi-eye-outline');
                  } else {
                     input.type = 'password';
                     icon.classList.remove('mdi-eye-outline');
                     icon.classList.add('mdi-eye-off-outline');
                  }
            });
         });
      });
   </script>
   <script>
      window.addEventListener("message", function(event) {
         console.log("Pesan diterima:", event.data);
         if (event.data === "loginSuccess") {
            window.location.href = "{{ route('dashboard') }}";
         }
      });
      // Google Login
      function googleLogin() {
         Swal.fire({
            title: 'Konfirmasi Login',
            html: `
                     <div class="text-start">
                        Dengan melanjutkan login dengan <strong>google</strong> akan membuat <strong>akun baru</strong> untuk REAN.ID bila sebelumnya <strong>belum</strong> pernah membuat akun. <br><br>
                        Jika Anda sudah <strong>pernah</strong> mendaftar, Anda akan langsung <strong>masuk</strong> dengan akun Anda yang sudah ada.   
                     </div>
            `,
            showCancelButton: true,
            confirmButtonText: 'Lanjutkan',
            cancelButtonText: 'Batal',
         }).then((result) => {
            if (result.isConfirmed) {
                  Swal.fire({
                     title: 'Mengarahkan',
                     html: 'Sedang mencoba login...',
                     timer: 5000,
                     timerProgressBar: true,
                     allowOutsideClick: false,
                     didOpen: () => {
                        Swal.showLoading();
                     }
                  }).then((result) => {
                     if (result.dismiss === Swal.DismissReason.timer) {
                        // console.log('Modal ditutup oleh timer');
                     }
                  });

                  const url = `{{ route('google.login') }}`;
                  setTimeout(() => {
                     window.open(url, '_self');
                  }, 500); // Jeda 0.5 detik sebelum mengarahkan ulang, agar SweetAlert sempat ditampilkan

                  return false;
            } else {
                  return false;
            }
         });
      }

   </script>
</body>

</html>