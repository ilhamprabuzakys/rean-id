<!DOCTYPE html>
<html class="no-js" lang="en">

<!-- Mirrored from preview.colorlib.com/theme/wordsmith/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 10:04:39 GMT -->

<head>

   <meta charset="utf-8">
   <title>Wordsmith</title>
   <meta name="description" content="">
   <meta name="author" content="">

   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

   <link rel="stylesheet" href="assets/Landing/wordsmith/css/base.css">
   <link rel="stylesheet" href="assets/Landing/wordsmith/css/vendor.css">
   <link rel="stylesheet" href="assets/Landing/wordsmith/css/main.css">

   <script src="assets/Landing/wordsmith/js/modernizr.js"></script>

   <link rel="shortcut icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" type="image/x-icon">
   <link rel="icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" type="image/x-icon">
   <script nonce="b741a27b-9943-45ca-849a-56e34d0c8d26">
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

<body id="top">

   <div id="preloader">
      <div id="loader" class="dots-fade">
         <div></div>
         <div></div>
         <div></div>
      </div>
   </div>

   <header class="s-header header">
      <div class="header__logo">
         <a class="logo" href="index.html">
            <img src="assets/Landing/wordsmith/images/logo.svg" alt="Homepage">
         </a>
      </div>
      <a class="header__search-trigger" href="#0"></a>
      <div class="header__search">
         <form role="search" method="get" class="header__search-form" action="#">
            <label>
               <span class="hide-content">Search for:</span>
               <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
            </label>
            <input type="submit" class="search-submit" value="Search">
         </form>
         <a href="#0" title="Close Search" class="header__overlay-close">Close</a>
      </div>
      <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
      <nav class="header__nav-wrap">
         <h2 class="header__nav-heading h6">Navigate to</h2>
         <ul class="header__nav">
            <li class="current"><a href="index.html" title="">Home</a></li>
            <li class="has-children">
               <a href="#0" title="">Categories</a>
               <ul class="sub-menu">
                  <li><a href="category.html">Lifestyle</a></li>
                  <li><a href="category.html">Health</a></li>
                  <li><a href="category.html">Family</a></li>
                  <li><a href="category.html">Management</a></li>
                  <li><a href="category.html">Travel</a></li>
                  <li><a href="category.html">Work</a></li>
               </ul>
            </li>
            <li class="has-children">
               <a href="#0" title="">Blog</a>
               <ul class="sub-menu">
                  <li><a href="single-video.html">Video Post</a></li>
                  <li><a href="single-audio.html">Audio Post</a></li>
                  <li><a href="single-standard.html">Standard Post</a></li>
               </ul>
            </li>
            <li><a href="style-guide.html" title="">Styles</a></li>
            <li><a href="page-about.html" title="">About</a></li>
            <li><a href="page-contact.html" title="">Contact</a></li>
         </ul>
         <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>
      </nav>
   </header>

   <section class="s-featured">
      <div class="row">
         <div class="col-full">
            <div class="featured-slider featured" data-aos="zoom-in">
               <div class="featured__slide">
                  <div class="entry">
                     <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-guitarman.jpg');"></div>
                     <div class="entry__content">
                        <span class="entry__category"><a href="#0">Music</a></span>
                        <h1><a href="#0" title="">What Your Music Preference Says About You and Your Personality.</a></h1>
                        <div class="entry__info">
                           <a href="#0" class="entry__profile-pic">
                              <img class="avatar" src="assets/Landing/wordsmith/images/avatars/user-05.jpg" alt="">
                           </a>
                           <ul class="entry__meta">
                              <li><a href="#0">Jonathan Smith</a></li>
                              <li>June 02, 2018</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="featured__slide">
                  <div class="entry">
                     <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-watch.jpg');"></div>
                     <div class="entry__content">
                        <span class="entry__category"><a href="#0">Management</a></span>
                        <h1><a href="#0" title="">The Pomodoro Technique Really Works.</a></h1>
                        <div class="entry__info">
                           <a href="#0" class="entry__profile-pic">
                              <img class="avatar" src="assets/Landing/wordsmith/images/avatars/user-03.jpg" alt="">
                           </a>
                           <ul class="entry__meta">
                              <li><a href="#0">John Doe</a></li>
                              <li>June 13, 2018</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="featured__slide">
                  <div class="entry">
                     <div class="entry__background" style="background-image:url('images/thumbs/featured/featured-beetle.jpg');"></div>
                     <div class="entry__content">
                        <span class="entry__category"><a href="#0">LifeStyle</a></span>
                        <h1><a href="#0" title="">The difference between Classics, Vintage & Antique Cars.</a></h1>
                        <div class="entry__info">
                           <a href="#0" class="entry__profile-pic">
                              <img class="avatar" src="assets/Landing/wordsmith/images/avatars/user-03.jpg" alt="">
                           </a>
                           <ul class="entry__meta">
                              <li><a href="#0">John Doe</a></li>
                              <li>June 12, 2018</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>

   <section class="s-content">
      <div class="row entries-wrap wide">
         <div class="entries">
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/lamp-400.jpg" srcset="images/thumbs/post/lamp-400.jpg 1x, images/thumbs/post/lamp-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Design</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">3 Benefits of Minimalism In Interior Design.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 15, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/tulips-400.jpg" srcset="images/thumbs/post/tulips-400.jpg 1x, images/thumbs/post/tulips-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Health</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">10 Interesting Facts About Caffeine.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 14, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/music-400.jpg" srcset="images/thumbs/post/music-400.jpg 1x, images/thumbs/post/music-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Health</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">The Power of Music to Reduce Stress.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 14, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/watch-400.jpg" srcset="images/thumbs/post/watch-400.jpg 1x, images/thumbs/post/watch-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Management</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">The Pomodoro Technique Really Works.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 12, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/wheel-400.jpg" srcset="images/thumbs/post/wheel-400.jpg 1x, images/thumbs/post/wheel-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Lifestyle</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">Visiting Theme Parks Improves Your Health.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 12, 2017</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/guitarist-400.jpg" srcset="images/thumbs/post/guitarist-400.jpg 1x, images/thumbs/post/guitarist-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Music</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">What Your Music Preference Says About You and Your Personality.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 02, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/jump-400.jpg" srcset="images/thumbs/post/jump-400.jpg 1x, images/thumbs/post/jump-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Relationships</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">Create Meaningful Family Moments.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 02, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/flowers-400.jpg" srcset="images/thumbs/post/flowers-400.jpg 1x, images/thumbs/post/flowers-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Lifestyle</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">Gardening: The Secret to Happiness.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">June 01, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/woodcraft-400.jpg" srcset="images/thumbs/post/woodcraft-400.jpg 1x, images/thumbs/post/woodcraft-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Creativity</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">An Examination of Minimalistic Design.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">May 30, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/fuji-400.jpg" srcset="images/thumbs/post/fuji-400.jpg 1x, images/thumbs/post/fuji-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Creativity</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">What Skills Are Required For a Photographer?</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">May 30, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/beetle-400.jpg" srcset="images/thumbs/post/beetle-400.jpg 1x, images/thumbs/post/beetle-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Lifestyle</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">Throwback To The Good Old Days.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">May 28, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
            <article class="col-block">
               <div class="item-entry" data-aos="zoom-in">
                  <div class="item-entry__thumb">
                     <a href="single-standard.html" class="item-entry__thumb-link">
                        <img src="assets/Landing/wordsmith/images/thumbs/post/sydney-400.jpg" srcset="images/thumbs/post/sydney-400.jpg 1x, images/thumbs/post/sydney-800.jpg 2x" alt="">
                     </a>
                  </div>
                  <div class="item-entry__text">
                     <div class="item-entry__cat">
                        <a href="category.html">Travel</a>
                     </div>
                     <h1 class="item-entry__title"><a href="single-standard.html">Planning Your First Trip To Sydney.</a></h1>
                     <div class="item-entry__date">
                        <a href="single-standard.html">May 28, 2018</a>
                     </div>
                  </div>
               </div>
            </article>
         </div>
      </div>
      <div class="row pagination-wrap">
         <div class="col-full">
            <nav class="pgn" data-aos="fade-up">
               <ul>
                  <li><a class="pgn__prev" href="#0">Prev</a></li>
                  <li><a class="pgn__num" href="#0">1</a></li>
                  <li><span class="pgn__num current">2</span></li>
                  <li><a class="pgn__num" href="#0">3</a></li>
                  <li><a class="pgn__num" href="#0">4</a></li>
                  <li><a class="pgn__num" href="#0">5</a></li>
                  <li><span class="pgn__num dots">…</span></li>
                  <li><a class="pgn__num" href="#0">8</a></li>
                  <li><a class="pgn__next" href="#0">Next</a></li>
               </ul>
            </nav>
         </div>
      </div>
   </section>

   <section class="s-extra">
      <div class="row">
         <div class="col-seven md-six tab-full popular">
            <h3>Popular Posts</h3>
            <div class="block-1-2 block-m-full popular__posts">
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/tulips-150.jpg" alt="">
                  </a>
                  <h5>10 Interesting Facts About Caffeine.</h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-14">Jun 14, 2018</time></span>
                  </section>
               </article>
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/wheel-150.jpg" alt="">
                  </a>
                  <h5><a href="#0">Visiting Theme Parks Improves Your Health.</a></h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                  </section>
               </article>
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/shutterbug-150.jpg" alt="">
                  </a>
                  <h5><a href="#0">Key Benefits Of Family Photography.</a></h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                  </section>
               </article>
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/cookies-150.jpg" alt="">
                  </a>
                  <h5><a href="#0">Absolutely No Sugar Oatmeal Cookies.</a></h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                  </section>
               </article>
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/beetle-150.jpg" alt="">
                  </a>
                  <h5><a href="#0">Throwback To The Good Old Days.</a></h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0">John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                  </section>
               </article>
               <article class="col-block popular__post">
                  <a href="#0" class="popular__thumb">
                     <img src="assets/Landing/wordsmith/images/thumbs/small/salad-150.jpg" alt="">
                  </a>
                  <h5>Healthy Mediterranean Salad Recipes</h5>
                  <section class="popular__meta">
                     <span class="popular__author"><span>By</span> <a href="#0"> John Doe</a></span>
                     <span class="popular__date"><span>on</span> <time datetime="2018-06-12">Jun 12, 2018</time></span>
                  </section>
               </article>
            </div>
         </div>
         <div class="col-four md-six tab-full end">
            <div class="row">
               <div class="col-six md-six mob-full categories">
                  <h3>Categories</h3>
                  <ul class="linklist">
                     <li><a href="#0">Lifestyle</a></li>
                     <li><a href="#0">Travel</a></li>
                     <li><a href="#0">Recipes</a></li>
                     <li><a href="#0">Management</a></li>
                     <li><a href="#0">Health</a></li>
                     <li><a href="#0">Creativity</a></li>
                  </ul>
               </div>
               <div class="col-six md-six mob-full sitelinks">
                  <h3>Site Links</h3>
                  <ul class="linklist">
                     <li><a href="#0">Home</a></li>
                     <li><a href="#0">Blog</a></li>
                     <li><a href="#0">Styles</a></li>
                     <li><a href="#0">About</a></li>
                     <li><a href="#0">Contact</a></li>
                     <li><a href="#0">Privacy Policy</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </section>

   <footer class="s-footer">
      <div class="s-footer__main">
         <div class="row">
            <div class="col-six tab-full s-footer__about">
               <h4>About Wordsmith</h4>
               <p>Fugiat quas eveniet voluptatem natus. Placeat error temporibus magnam sunt optio aliquam. Ut ut occaecati placeat at.
                  Fuga fugit ea autem. Dignissimos voluptate repellat occaecati minima dignissimos mollitia consequatur.
                  Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa error
                  temporibus magnam est voluptatem.</p>
            </div>
            <div class="col-six tab-full s-footer__subscribe">
               <h4>Our Newsletter</h4>
               <p>Sit vel delectus amet officiis repudiandae est voluptatem. Tempora maxime provident nisi et fuga et enim exercitationem ipsam. Culpa consequatur occaecati.</p>
               <div class="subscribe-form">
                  <form id="mc-form" class="group" novalidate="true">
                     <input type="email" value="" name="EMAIL" class="email" id="mc-email" placeholder="Email Address" required="">
                     <input type="submit" name="subscribe" value="Send">
                     <label for="mc-email" class="subscribe-message"></label>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <div class="s-footer__bottom">
         <div class="row">
            <div class="col-six">
               <ul class="footer-social">
                  <li>
                     <a href="#0"><i class="fab fa-facebook"></i></a>
                  </li>
                  <li>
                     <a href="#0"><i class="fab fa-twitter"></i></a>
                  </li>
                  <li>
                     <a href="#0"><i class="fab fa-instagram"></i></a>
                  </li>
                  <li>
                     <a href="#0"><i class="fab fa-youtube"></i></a>
                  </li>
                  <li>
                     <a href="#0"><i class="fab fa-pinterest"></i></a>
                  </li>
               </ul>
            </div>
            <div class="col-six">
               <div class="s-footer__copyright">
                  <span>
                     Copyright &copy;
                     <script>
                        document.write(new Date().getFullYear());
                     </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com/"
                        target="_blank">Colorlib</a>

                  </span>
               </div>
            </div>
         </div>
      </div>
      <div class="go-top">
         <a class="smoothscroll" title="Back to Top" href="#top"></a>
      </div>
   </footer>

   <script src="assets/Landing/wordsmith/js/jquery-3.2.1.min.js"></script>
   <script src="assets/Landing/wordsmith/js/plugins.js"></script>
   <script src="assets/Landing/wordsmith/js/main.js"></script>

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
      data-cf-beacon='{"rayId":"7ddcdddf6b14a02a","version":"2023.4.0","b":1,"token":"cd0b4b3a733644fc843ef0b185f98241","si":100}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from preview.colorlib.com/theme/wordsmith/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Jun 2023 10:05:19 GMT -->

</html>