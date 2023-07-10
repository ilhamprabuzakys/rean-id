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
   @stack('style')
</head>

<body>
   <div class="auth-page">
      <div class="container-fluid p-0">
         <div class="row g-0 align-items-center d-flex justify-content-center mt-5">
            <div class="col-xxl-6 col-lg-6 col-md-6">
               <div class="row justify-content-center g-0">
                  <div class="col-xl-9">
                     <div class="p-4">
                        <div class="card mb-0">
                           <div class="card-body">
                              <div class="auth-full-page-content rounded d-flex p-3 my-2">
                                 <div class="w-100">
                                    <div class="d-flex flex-column h-100">
                                       <div class="mb-3">
                                          <a href="{{ route('login') }}" class="auth-logo">
                                             <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="120" class="auth-logo-light me-start">
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
            {{-- <div class="col-xxl-5 col-lg-5 col-md-5">
               <div class="auth-bg bg-white py-md-5 p-4 d-flex">
                  <div class="bg-overlay bg-white"></div>
                  <!-- end bubble effect -->
                  <div class="row justify-content-center align-items-center">
                     <div class="col-xl-8">
                        <div class="mt-4">
                           <img src="{{ asset('assets/borex/images/login-img.png') }}" class="img-fluid" alt="">
                        </div>
                        <div class="p-0 p-sm-4 px-xl-0 py-5">
                           <div id="reviewcarouselIndicators" class="carousel slide auth-carousel" data-bs-ride="carousel">
                              <div class="carousel-indicators carousel-indicators-rounded">
                                 <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                 <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                 <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                              </div>

                              <!-- end carouselIndicators -->
                              <div class="carousel-inner w-75 mx-auto">
                                 <div class="carousel-item active">
                                    <div class="testi-contain text-center">
                                       <h5 class="font-size-20 mt-4">“I feel confident
                                          imposing change
                                          on myself”
                                       </h5>
                                       <p class="font-size-15 text-muted mt-3 mb-0">Vestibulum auctor orci in risus iaculis consequat suscipit felis rutrum aliquet iaculis
                                          augue sed tempus In elementum ullamcorper lectus vitae pretium Aenean sed odio dolor Nullam ultricies diam
                                          eu ultrices tellus eifend sagittis.</p>
                                    </div>
                                 </div>

                                 <div class="carousel-item">
                                    <div class="testi-contain text-center">
                                       <h5 class="font-size-20 mt-4">“Our task must be to
                                          free widening our circle”</h5>
                                       <p class="font-size-15 text-muted mt-3 mb-0">
                                          Curabitur eget nulla eget augue dignissim condintum Nunc imperdiet ligula porttitor commodo elementum
                                          Vivamus justo risus fringilla suscipit faucibus orci luctus
                                          ultrices posuere cubilia curae lectus non ultricies cursus.
                                       </p>
                                    </div>
                                 </div>

                                 <div class="carousel-item">
                                    <div class="testi-contain text-center">
                                       <h5 class="font-size-20 mt-4">“I've learned that
                                          people will forget what you”</h5>
                                       <p class="font-size-15 text-muted mt-3 mb-0">
                                          Pellentesque lacinia scelerisque arcu in aliquam augue molestie rutrum magna Fusce dignissim dolor id auctor accumsan
                                          vehicula dolor
                                          vivamus feugiat odio erat sed vehicula lorem tempor quis Donec nec scelerisque magna
                                       </p>
                                    </div>
                                 </div>
                              </div>
                              <!-- end carousel-inner -->
                           </div>
                           <!-- end review carousel -->
                        </div>
                     </div>
                  </div>
               </div>
            </div> --}}
            {{-- <div class="col-xxl-8 col-lg-6 col-md-6">
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
            </div> --}}
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
   @stack('script')
</body>

</html>
