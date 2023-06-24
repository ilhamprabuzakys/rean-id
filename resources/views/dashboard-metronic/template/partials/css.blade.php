<!--begin::Fonts(mandatory for all pages)-->
   <link rel="stylesheet" href="{{ asset('assets/Metronic/fonts.googleapis.com/css7b91.css?family=Inter:300,400,500,600,700') }}" />
   <!--end::Fonts-->

   <!--begin::Vendor Stylesheets(used for this page only)-->
   <link href="{{ asset('assets/Metronic/preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/Metronic/preview.keenthemes.com/metronic8/demo1/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
   <!--end::Vendor Stylesheets-->


   <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
   <link href="{{ asset('assets/Metronic/preview.keenthemes.com/metronic8/demo1/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
   <link href="{{ asset('assets/Metronic/preview.keenthemes.com/metronic8/demo1/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
   <!--end::Global Stylesheets Bundle-->

   <!--Begin::Google Tag Manager -->
   <script>
      (function(w, d, s, l, i) {
         w[l] = w[l] || [];
         w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
         });
         var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
         j.async = true;
         j.src =
            '../../../www.googletagmanager.com/gtm5445.html?id=' + i + dl;
         f.parentNode.insertBefore(j, f);
      })(window, document, 'script', 'dataLayer', 'GTM-5FS8GGP');
   </script>
   <!--End::Google Tag Manager -->

   <script>
      // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking)
      if (window.top != window.self) {
         window.top.location.replace(window.self.location.href);
      }
   </script>s
