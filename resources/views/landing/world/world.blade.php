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
   @stack('head')
</head>

<body>

   <div id="preloader">
      <div class="preload-content">
         <div id="world-load"></div>
      </div>
   </div>


  @include('landing.world.partials.header')
  
  @include('landing.world.partials.hero')
  

   <div class="main-content-wrapper section-padding-100">
      <div class="container">
         @yield('content')
      </div>
   </div>

   @include('landing.world.partials.footer')


   @include('landing.world.partials.script')
   @stack('script')
</body>

</html>
