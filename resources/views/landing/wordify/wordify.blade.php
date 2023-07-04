<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="description" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   @if ($title == '')
      <title>REAN.ID - Anti Narkoba Cegah Narkoba</title>
   @else
      <title>{{ $title }} | REAN.ID - Anti Narkoba Cegah Narkoba</title>
   @endif

   <link rel="icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}">

   <link rel="stylesheet" href="assets/Landing/world/style.css">
   <script nonce="28376c94-0920-41cf-90d5-77ff6a603ffe">
      (function(w, d) {
         ! function(dK, dL, dM, dN) {
            dK[dM] = dK[dM] || {};
            dK[dM].executed = [];
            dK.zaraz = {
               deferred: [],
               listeners: []
            };
            dK.zaraz.q = [];
            dK.zaraz._f = function(dO) {
               return function() {
                  var dP = Array.prototype.slice.call(arguments);
                  dK.zaraz.q.push({
                     m: dO,
                     a: dP
                  })
               }
            };
            for (const dQ of ["track", "set", "debug"]) dK.zaraz[dQ] = dK.zaraz._f(dQ);
            dK.zaraz.init = () => {
               var dR = dL.getElementsByTagName(dN)[0],
                  dS = dL.createElement(dN),
                  dT = dL.getElementsByTagName("title")[0];
               dT && (dK[dM].t = dL.getElementsByTagName("title")[0].text);
               dK[dM].x = Math.random();
               dK[dM].w = dK.screen.width;
               dK[dM].h = dK.screen.height;
               dK[dM].j = dK.innerHeight;
               dK[dM].e = dK.innerWidth;
               dK[dM].l = dK.location.href;
               dK[dM].r = dL.referrer;
               dK[dM].k = dK.screen.colorDepth;
               dK[dM].n = dL.characterSet;
               dK[dM].o = (new Date).getTimezoneOffset();
               if (dK.dataLayer)
                  for (const dX of Object.entries(Object.entries(dataLayer).reduce(((dY, dZ) => ({
                        ...dY[1],
                        ...dZ[1]
                     })), {}))) zaraz.set(dX[0], dX[1], {
                     scope: "page"
                  });
               dK[dM].q = [];
               for (; dK.zaraz.q.length;) {
                  const d_ = dK.zaraz.q.shift();
                  dK[dM].q.push(d_)
               }
               dS.defer = !0;
               for (const ea of [localStorage, sessionStorage]) Object.keys(ea || {}).filter((ec => ec.startsWith("_zaraz_"))).forEach((eb => {
                  try {
                     dK[dM]["z_" + eb.slice(7)] = JSON.parse(ea.getItem(eb))
                  } catch {
                     dK[dM]["z_" + eb.slice(7)] = ea.getItem(eb)
                  }
               }));
               dS.referrerPolicy = "origin";
               dS.src = "../../cdn-cgi/zaraz/sd0d9.js?z=" + btoa(encodeURIComponent(JSON.stringify(dK[dM])));
               dR.parentNode.insertBefore(dS, dR)
            };
            ["complete", "interactive"].includes(dL.readyState) ? zaraz.init() : dK.addEventListener("DOMContentLoaded", zaraz.init)
         }(w, d, "zarazData", "script");
      })(window, document);
   </script>
</head>

<body>

   <div id="preloader">
      <div class="preload-content">
         <div id="world-load"></div>
      </div>
   </div>


   <header class="header-area">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <nav class="navbar navbar-expand-lg">

                  <a class="navbar-brand" href="index.html"><img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="Logo" style="height: 32px !important"></a>

                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#worldNav" aria-controls="worldNav" aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>

                  <div class="collapse navbar-collapse" id="worldNav">
                     <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                           <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data</a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item" href="index.html">Home</a>
                              <a class="dropdown-item" href="catagory.html">Catagory</a>
                              <a class="dropdown-item" href="single-blog.html">Single Blog</a>
                              <a class="dropdown-item" href="regular-page.html">Regular Page</a>
                              <a class="dropdown-item" href="contact.html">Contact</a>
                           </div>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Artikel</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Ebook</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Events</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                           @auth
                              <a class="nav-link" href="#">Logout</a>
                           @else
                              <a class="nav-link" href="#">Login</a>
                           @endauth
                        </li>
                     </ul>

                     <div id="search-wrapper">
                        <form action="#">
                           <input type="text" id="search" placeholder="Search something...">
                           <div id="close-icon"></div>
                           <input class="d-none" type="submit" value="">
                        </form>
                     </div>
                  </div>
               </nav>
            </div>
         </div>
      </div>
   </header>


   <div class="hero-area">

      <div class="hero-slides owl-carousel">

         <div class="single-hero-slide bg-img background-overlay" style="background-image: url(assets/Landing/world/img/blog-img/bg2.jpg);"></div>

         <div class="single-hero-slide bg-img background-overlay" style="background-image: url(assets/Landing/world/img/blog-img/bg1.jpg);"></div>
      </div>

      <div class="hero-post-area">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="hero-post-slide">

                     <div class="single-slide d-flex align-items-center">
                        <div class="post-number">
                           <p>1</p>
                        </div>
                        <div class="post-title">
                           <a href="single-blog.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex</a>
                        </div>
                     </div>

                     <div class="single-slide d-flex align-items-center">
                        <div class="post-number">
                           <p>2</p>
                        </div>
                        <div class="post-title">
                           <a href="single-blog.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex</a>
                        </div>
                     </div>

                     <div class="single-slide d-flex align-items-center">
                        <div class="post-number">
                           <p>3</p>
                        </div>
                        <div class="post-title">
                           <a href="single-blog.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex</a>
                        </div>
                     </div>

                     <div class="single-slide d-flex align-items-center">
                        <div class="post-number">
                           <p>4</p>
                        </div>
                        <div class="post-title">
                           <a href="single-blog.html">How Did van Gogh’s Turbulent Mind Depict One of the Most Complex</a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="main-content-wrapper section-padding-100">
      <div class="container">
         @yield('content')
         <div class="world-latest-articles">
            <div class="row">
               <div class="col-12 col-lg-8">
                  <div class="title">
                     <h5>Latest Articles</h5>
                  </div>

                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b18.jpg" alt="">
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>

                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b19.jpg" alt="">
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>

                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b20.jpg" alt="">
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>

                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b21.jpg" alt="">
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-lg-4">
                  <div class="title">
                     <h5>Most Popular Videos</h5>
                  </div>

                  <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b7.jpg" alt="">

                        <div class="post-cta"><a href="#">travel</a></div>

                        <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>

                  <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.4s">

                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b8.jpg" alt="">

                        <div class="post-cta"><a href="#">travel</a></div>

                        <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
                     </div>

                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                        </a>
                        <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-12">
               <div class="load-more-btn mt-50 text-center">
                  <a href="#" class="btn world-btn">Load More</a>
               </div>
            </div>
         </div>
      </div>
   </div>

   <footer class="footer-area">
      <div class="container">
         <div class="row">
            <div class="col-12 col-md-4">
               <div class="footer-single-widget">
                  <a href="#"><img src="assets/Landing/world/img/core-img/logo.png" alt=""></a>
                  <div class="copywrite-text mt-30">
                     <p>
                        Copyright &copy;
                        <script>
                           document.write(new Date().getFullYear());
                        </script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/"
                           target="_blank">Colorlib</a>
                     </p>
                  </div>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div class="footer-single-widget">
                  <ul class="footer-menu d-flex justify-content-between">
                     <li><a href="#">Home</a></li>
                     <li><a href="#">Fashion</a></li>
                     <li><a href="#">Lifestyle</a></li>
                     <li><a href="#">Contact</a></li>
                     <li><a href="#">Gadgets</a></li>
                     <li><a href="#">Video</a></li>
                  </ul>
               </div>
            </div>
            <div class="col-12 col-md-4">
               <div class="footer-single-widget">
                  <h5>Subscribe</h5>
                  <form action="#" method="post">
                     <input type="email" name="email" id="email" placeholder="Enter your mail">
                     <button type="button"><i class="fa fa-arrow-right"></i></button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </footer>


   <script src="assets/Landing/world/js/jquery/jquery-2.2.4.min.js"></script>

   <script src="assets/Landing/world/js/popper.min.js"></script>

   <script src="assets/Landing/world/js/bootstrap.min.js"></script>

   <script src="assets/Landing/world/js/plugins.js"></script>

   <script src="assets/Landing/world/js/active.js"></script>

   <script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
   <script>
      window.dataLayer = window.dataLayer || [];

      function gtag() {
         dataLayer.push(arguments);
      }
      gtag('js', new Date());

      gtag('config', 'UA-23581568-13');
   </script>
   <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v52afc6f149f6479b8c77fa569edb01181681764108816"
      integrity="sha512-jGCTpDpBAYDGNYR5ztKt4BQPGef1P0giN6ZGVUi835kFF88FOmmn8jBQWNgrNd8g/Yu421NdgWhwQoaOPFflDw=="
      data-cf-beacon='{"rayId":"7ddbdf78cd2a6be7","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

</html>
