<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>REAN.ID</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/Bootslander/assets/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <!-- Custom -->
  <link href="{{ asset('assets/Bootslander/assets/vendor/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="{{ asset('assets/Landing/css/custom.css') }}">



  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/Bootslander/assets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/Bootslander/assets/css/owl.theme.default.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Bootslander
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center header-transparent">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1>
          <a href="index.html">
            <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="Header-logo" id="header-logo">
          </a>
        </h1>
        <!-- <h1><a href="index.html"><span>Bootslander</span></a></h1> -->
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link active" href="#hero">Home</a></li>
          <li><a class="nav-link" href="#about">Activities</a></li>
          <li><a class="nav-link" href="#features">Event</a></li>
          <li class="dropdown"><a href="#"><span>Data</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">E-book</a></li>
              <li><a href="#">Artikel</a></li>
              <li><a href="#">Video</a></li>
              <li><a href="#">Motion Graphic</a></li>
              <li><a href="#">Musik</a></li>
              <li><a href="#">Fotografi</a></li>
              <li><a href="#">Poster</a></li>
              <li><a href="#">Desain</a></li>
              <li><a href="#">Infografis</a></li>
            </ul>
          </li>
          <li><a class="nav-link" href="https://c3.siar.us:2199/start/cnsradio/" target="_blank">CNS Radio</a></li>
          <li><a class="nav-link" href="/administrator-compilation">Karya Admin</a></li>
          @auth
            <li>
              {{-- <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#logoutModalGuest">Logout</a> --}}
              <form action="{{ route('logout') }}" method="post">
              @csrf
                <button type="submit" class="nav-link border-0 bg-transparent">Logout</button>
              </form>
              @include('home.components.modal')
            </li>
          </form>
          @else
            <li><a class="nav-link" href="/login">Login</a></li>
          @endauth
          <li><a class="nav-link" href="#cari-karya">Cari Karya</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      
      
      <!-- Optional: Place to the bottom of scripts -->
      <script>
        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
      
      </script>

    </div>
  </header>
  <!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">

    <div class="container">
      <div class="row justify-content-between mt-4">
        <div class="col-lg-7 pt-5 pt-lg-0 order-2 order-lg-1 d-flex align-items-center">
          <div data-aos="zoom-out">
            <h1>Rumah Edukasi Anti Narkoba <span>REAN</span></h1>
            <h2>Suatu platform resmi yang mengedukasi demi kemajuan anak bangsa.</h2>
            <div class="text-center text-lg-start">
              <a href="{{ route('login') }}" class="btn-get-started scrollto">Mulai Bergabung</a>
            </div>
          </div>
        </div>
        <div class="col-lg-4 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="300">
          <!-- <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
          <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

    <div id="canvas"></div>


    <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
      viewBox="0 24 150 28 " preserveAspectRatio="none">
      <defs>
        <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z">
      </defs>
      <g class="wave1">
        <use xlink:href="#wave-path" x="50" y="3" fill="rgba(255,255,255, .1)">
      </g>
      <g class="wave2">
        <use xlink:href="#wave-path" x="50" y="0" fill="rgba(255,255,255, .2)">
      </g>
      <g class="wave3">
        <use xlink:href="#wave-path" x="50" y="9" fill="#fff">
      </g>
    </svg>
    <div class="bottom-divider">
    </div> 

  </section>
  <!-- End Hero -->

  <main id="main">
     <!-- Highlighted Content -->
     {{-- <div class="untree_co-section">
       <div class="container">
         <div class="row text-center justify-content-center mb-5">
           <div class="col-lg-7">
             <h2 class="section-title text-center">Popular Destination</h2>
           </div>
         </div>
 
         <div class="owl-carousel owl-3-slider">
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-1.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>Pragser Wildsee</h3>
                 <span class="location">Italy</span>
               </div>
               <img src="assets/img/highlighted/highlighted-1.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-2.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>Oia</h3>
                 <span class="location">Greece</span>
               </div>
               <img src="assets/img/highlighted/highlighted-2.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-3.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>Perhentian Islands</h3>
                 <span class="location">Malaysia</span>
               </div>
               <img src="assets/img/highlighted/highlighted-3.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-4.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>Rialto Bridge</h3>
                 <span class="location">Italy</span>
               </div>
               <img src="assets/img/highlighted/highlighted-4.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-5.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>San Francisco, United States</h3>
                 <span class="location">United States</span>
               </div>
               <img src="assets/img/highlighted/highlighted-5.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
           <div class="item">
             <a class="media-thumb" href="assets/img/highlighted/highlighted-1.jpg" data-fancybox="gallery">
               <div class="media-text">
                 <h3>Lake Thun</h3>
                 <span class="location">Switzerland</span>
               </div>
               <img src="assets/img/highlighted/highlighted-2.jpg" alt="Image" class="img-fluid">
             </a>
           </div>
 
         </div>
 
       </div>
     </div> --}}
     <!-- End Highlighted Content -->
    @yield('content')
  </main>



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="footer-info">
              <h3>Bootslander</h3>
              <p class="pb-3"><em>Qui repudiandae et eum dolores alias sed ea. Qui suscipit veniam excepturi quod.</em>
              </p>
              <p>
                A108 Adam Street <br>
                NY 535022, USA<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> info@example.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Bootslander</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/bootslander-free-bootstrap-landing-page-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>
    {{-- WhatsApp Icon --}}
   <a href="https://wa.me/6285162783743?text=Hi,%20perkenalkan%20nama%20saya%20Ilham!%20Senang%20bertemu%20dengan%20anda!"
   class="whatsapp d-flex align-items-center justify-content-center" target="_blank">
   <i class="fas fa-brands fa-whatsapp"></i>
  </a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/Bootslander/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/Bootslander/assets/vendor/aos/aos.js"></script>
  <script src="assets/Bootslander/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/php-email-form/validate.js"></script>
  <!-- Custom -->
  <!-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
  <script src="assets/Bootslander/assets/vendor/jquery/jquery-3.4.1.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/jquery/jquery.fancybox.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/jquery/jquery.animateNumber.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/jquery/jquery.waypoints.min.js"></script>
  <script src="assets/Bootslander/assets/vendor/owlcarousel/owl.carousel.min.js"></script>


  <!-- Template Main JS File -->
  <script src="assets/Bootslander/assets/js/main.js"></script>
  <!-- Script JS -->
  <script src="assets/Bootslander/assets/js/script.js"></script>
  <script src="assets/Bootslander/assets/js/carousel.js"></script>
</body>

</html>
