<!DOCTYPE html>
<html lang="en">

<head>
   <title>{{ $title }} | Rean.ID &mdash; Anti Narkoba</title>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <link href="../../../fonts.googleapis.com/css25fc.css?family=B612+Mono|Cabin:400,700&amp;display=swap" rel="stylesheet">
   @include('landing.partials.css')
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
   <div class="site-wrap">
      <div class="site-mobile-menu site-navbar-target">
         <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
               <span class="icon-close2 js-menu-toggle"></span>
            </div>
         </div>
         <div class="site-mobile-menu-body"></div>
      </div>
      <div class="header-top">
         <div class="container">
            <div class="row align-items-center">
               <div class="col-12 col-lg-6 d-flex">
                  <a href="index.html" class="site-logo">
                     <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="60px" class="">
                     <span class="ml-2">Rean.ID</span>

                  </a>
                  <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
               </div>
               <div class="col-12 col-lg-6 ml-auto d-flex">
                  <div class="ml-md-auto top-social d-none d-lg-inline-block">
                     <a href="#" class="d-inline-block p-3"><span class="icon-facebook"></span></a>
                     <a href="#" class="d-inline-block p-3"><span class="icon-twitter"></span></a>
                     <a href="#" class="d-inline-block p-3"><span class="icon-instagram"></span></a>
                  </div>
                  <form action="#" class="search-form d-inline-block">
                     <div class="d-flex">
                        <input type="email" class="form-control" placeholder="Search...">
                        <button type="submit" class="btn btn-secondary"><span class="icon-search"></span></button>
                     </div>
                  </form>
               </div>
               <div class="col-6 d-block d-lg-none text-right">
               </div>
            </div>
         </div>
         @include('landing.partials.navbar')
      </div>
      <div class="site-section py-0">
         <div class="owl-carousel hero-slide owl-style">
            <div class="site-section">
               <div class="container">
                  <div class="half-post-entry d-block d-lg-flex bg-light">
                     <div class="img-bg" style="background-image: url('images/big_img_1.jpg')"></div>
                     <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim
                           praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                        <div class="post-meta">
                           <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                           <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="site-section">
               <div class="container">
                  <div class="half-post-entry d-block d-lg-flex bg-light">
                     <div class="img-bg" style="background-image: url('images/big_img_1.jpg')"></div>
                     <div class="contents">
                        <span class="caption">Editor's Pick</span>
                        <h2><a href="blog-single.html">News Needs to Meet Its Audiences Where They Are</a></h2>
                        <p class="mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate vero obcaecati natus adipisci necessitatibus eius, enim vel sit ad reiciendis. Enim
                           praesentium magni delectus cum, tempore deserunt aliquid quaerat culpa nemo veritatis, iste adipisci excepturi consectetur doloribus aliquam accusantium beatae?</p>
                        <div class="post-meta">
                           <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">Food</a></span>
                           <span class="date-read">Jun 14 <span class="mx-1">&bullet;</span> 3 min read <span class="icon-star2"></span></span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      @yield('content')
      @include('landing.partials.footer')
   </div>


   @include('landing.partials.js')
</body>

</html>
