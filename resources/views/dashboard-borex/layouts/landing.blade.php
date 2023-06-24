<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8">
   <meta content="width=device-width, initial-scale=1.0" name="viewport">

   <title>{{ config('app.name') }}</title>
   <meta content="" name="description">
   <meta content="" name="keywords">

   <!-- Favicons -->
   <link href="{{ asset('icon.png') }}" rel="icon">
   <link href="{{ asset('landing/assets/img/apple-touch-icon.png" rel=') }}"apple-touch-icon">

   <!-- Google Fonts -->
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
      rel="stylesheet">

   <!-- Vendor CSS Files -->
   <link href="{{ asset('landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

   <!-- Template Main CSS File -->
   <link href="{{ asset('landing/assets/css/style.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/css/custom.css') }}" rel="stylesheet">
   <link href="{{ asset('landing/assets/css/animated.css') }}" rel="stylesheet">

   {{-- CDN --}}
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
   @stack('head')
</head>

<body>

   

   <!-- ***** Preloader Start ***** -->
   {{-- <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
         <span class="dot"></span>
         <div class="dots">
            <span></span>
            <span></span>
            <span></span>
         </div>
      </div>
   </div> --}}
   <!-- ***** Preloader End ***** -->

   <!-- ======= Header ======= -->
   <header id="header" class="header fixed-top">
      <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

         <a href="index.html" class="logo d-flex align-items-center">
            <img src="{{ asset('assets/icon-doang.png') }}" alt="">
         </a>

         <nav id="navbar" class="navbar">
            <ul>
               @if (Request::is('/'))
                  <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
               @else
                  <li><a class="nav-link scrollto" href="{{ route('index') }}">Home</a></li>
               @endif
               <li><a class="nav-link scrollto" href="#about">About</a></li>
               <li><a class="nav-link scrollto" href="#counts">Catalog</a></li>
               <li><a class="nav-link scrollto" href="#competency">Competency</a></li>
               <li><a class="nav-link scrollto" href="#blog">Blog</a></li>
               <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
               <li><a class="getstarted rounded-pill scrollto" href="{{ route('message.index') }}">Message</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
         </nav><!-- .navbar -->

      </div>
   </header><!-- End Header -->

   @yield('hero')

   <main id="main">

      @yield('content')


      @yield('contact')

   </main><!-- End #main -->

   <!-- ======= Footer ======= -->
   <footer id="footer" class="footer" style="margin-top: 300px">

      <div class="footer-top">
         <div class="container">
            <div class="row gy-4">
               <div class="col-lg-5 col-md-12 footer-info">
                  <a href="index.html" class="logo d-flex align-items-center">
                     <img src="{{ asset('icon.png') }}" alt="">
                     <span>Siparel</span>
                  </a>
                  <p>{{ $company->description }}</p>
                  <div class="social-links mt-3">
                     <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                     <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                     <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                     <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                  </div>

                  <div class="mt-4 footer-contact text-center text-md-start">
                     <h4>Contact Us</h4>
                     <p>
                        {!! str_replace(',', '<br>', $company->address) !!}<br>
                        <strong>Phone:</strong> {{ $company->phone }}<br>
                        <strong>Email:</strong> company@gmail.com<br>
                     </p>

                  </div>

               </div>

               <div class="col-lg-7 col-6 footer-links">
                  <iframe data-aos="fade-up" data-aos-delay="200"
                     src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1980.1767032172495!2d107.65829293163706!3d-6.967569253344099!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e9d2cd28fcb3%3A0x4c7c7400f22c9e7a!2sBojongsoang%2C%20Cipagalo%2C%20Kec.%20Bojongsoang%2C%20Kabupaten%20Bandung%2C%20Jawa%20Barat%2040287!5e0!3m2!1sid!2sid!4v1641802481210!5m2!1sid!2sid"
                     width="100%" height="420px" frameborder="0" style="border:0" allowfullscreen title="Siparel"></iframe>
               </div>
            </div>
         </div>
      </div>

      <div class="container">
         <div class="copyright">
            &copy; Copyright <strong><span>Siparel</span></strong>. All Rights Reserved
         </div>
         <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/flexstart-bootstrap-startup-template/ -->
            Designed by <a href="https://github.com/ilhamprabuzakys">Ilhamprabuzakys</a>
         </div>
      </div>
   </footer><!-- End Footer -->

   <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
         class="bi bi-arrow-up-short"></i></a>

   {{-- WhatsApp Icon --}}
   <a href="https://wa.me/6285162783743?text=Hi,%20perkenalkan%20nama%20saya%20Ilham!%20Senang%20bertemu%20dengan%20anda!"
      class="whatsapp d-flex align-items-center justify-content-center" target="_blank">
      <i class="fa-brands fa-whatsapp"></i>
   </a>

   @stack('script')
   <script src="{{ asset('landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/aos/aos.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
   <script src="{{ asset('landing/assets/vendor/php-email-form/validate.js') }}"></script>

   <!-- Template Main JS File -->
   <script src="{{ asset('landing/assets/js/main.js') }}"></script>
   <script src="{{ asset('landing/assets/js/animation.js') }}"></script>
   <script>
      const aboutNavLink = document.querySelector('li a[href="#about"]');
      const aboutSection = document.querySelector('#about');

      aboutNavLink.addEventListener('click', (event) => {
         event.preventDefault();
         const sectionTopOffset = aboutSection.offsetTop + 100;
         const windowHeight = window.innerHeight;
         const scrollToPosition = sectionTopOffset - (windowHeight / 2);
         window.scrollTo({
            top: scrollToPosition,
            behavior: 'smooth'
         });
      });
   </script>

   {{-- <script src="{{ mix('js/leaflet.js') }}"></script> --}}
   {{-- @vite('resources/js/leaflet.js'); --}}
   @stack('scripts')
</body>

</html>
@stack('outer-scripts')