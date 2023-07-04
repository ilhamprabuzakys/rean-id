<!doctype html>
<html lang="en">

<head>

   <meta charset="utf-8" />
   <title>{{ $title }} - {{ config('app.name') }}</title>
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
   <meta content="Themesbrand" name="author" />
   <!-- App favicon -->
   <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja.png') }}">

   {{-- Box Icons Css --}}
   <link rel="stylesheet" href="{{ asset('assets/borex/libs/box-icons/css/boxicons.min.css') }}">
   <!-- Bootstrap Css -->
   <link href="{{ asset('assets/borex/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="{{ asset('assets/borex/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
   <!-- App Css-->
   <link href="{{ asset('assets/borex/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
   <style>
      #auth3dcontainer {
         height: 440px;
         width: auto;
         /* border: 1px solid red; */
         /* padding: 10px s0px 0px 0px; */
      }

      #cardauth3d {
         height: 470px;
      }
   </style>
</head>

<body>
   <div class="auth-page">
      <div class="container-fluid p-0">
         <div class="row g-0 align-items-center d-flex justify-content-center mt-5">
            <div class="col-xxl-4 col-lg-6 col-md-6">
               <div class="row justify-content-center g-0">
                  <div class="col-xl-9">
                     <div class="p-4">
                        <div class="card mb-0">
                           <div class="card-body">
                              <div class="auth-full-page-content rounded d-flex p-3 my-2">
                                 <div class="w-100">
                                    <div class="d-flex flex-column h-100">
                                       <div class="mb-1 mb-md-1">
                                          <a href="{{ route('login') }}" class="d-block auth-logo">

                                             <img src="{{ asset('assets/img/rean-berwarna-logo-saja.png') }}" alt="" height="120" class="auth-logo-light me-start">
                                          </a>
                                       </div>
                                       <div class="auth-content my-auto">
                                          @yield('auth-content')
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-8 col-lg-6 col-md-6">
               <div class="row justify-content-center g-0">
                  <div class="col-xl-9">
                     <div class="p-4">
                        <div class="card mb-0" id="cardauth3d">
                           <div class="card-body">
                              <div id="auth3dcontainer">
                                 <div id="auth3d"></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- end col -->
      </div>
      <!-- end row -->
   </div>
   <!-- end container fluid -->
   </div>

   <!-- JAVASCRIPT -->
   <script src="{{ asset('assets/borex/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/metismenujs/metismenujs.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/simplebar/simplebar.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/eva-icons/eva.min.js') }}"></script>

   <script src="{{ asset('assets/borex/js/pages/pass-addon.init.js') }}"></script>
   <script src="{{ asset('assets/borex/js/pages/eva-icon.init.js') }}"></script>

   @include('auth.partials.script')

</body>

</html>
