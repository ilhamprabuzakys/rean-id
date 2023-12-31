<link rel="stylesheet" href="{{ asset('assets/Landing/world/style.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('assets/Landing/world/css/font-awesome6.min.css') }}"> --}}
<link rel="stylesheet" href="{{ asset('assets/Landing/world/css/custom.css') }}">
<link rel="stylesheet" href="{{ asset('assets/Landing/world/vendor/bootstrap-icons/bootstrap-icons.css') }}">
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
<script src="{{ asset('assets/Landing/world/js/jquery/jquery-2.2.4.min.js') }}"></script>