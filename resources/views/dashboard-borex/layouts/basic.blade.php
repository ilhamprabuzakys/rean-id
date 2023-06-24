<!doctype html>
<html lang="en">

<head>
   <title>Maps</title>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS v5.2.1 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
   {{-- Geosearch --}}
   <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.css" />
   <script src="https://unpkg.com/leaflet-geosearch@3.1.0/dist/geosearch.umd.js"></script>
   <style>
      #map {
         height: 100%;
      }
   </style>
   @stack('head')
</head>

<body>
   <main>
      <div class="container my-5">
         <div class="card shadow-lg">
            <div class="card-header">
               <h2 class="text-center text-capitalize">Map Overview</h2>
            </div>
            <div class="card-body">
               <div id="map"></div>
            </div>
         </div>
      </div>
   </main>

   <!-- Bootstrap JavaScript Libraries -->
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
      integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>

   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
      integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous"></script>

   @stack('scripts')
</body>

</html>

<script>
   // you want to get it of the window global
   const providerOSM = new GeoSearch.OpenStreetMapProvider();

   //leaflet map
   var leafletMap = L.map('map', {
      fullscreenControl: true,
      // OR
      fullscreenControl: {
         pseudoFullscreen: false // if true, fullscreen to page width and height
      },
      minZoom: 2
   }).setView([0, 0], 2);

   L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
   }).addTo(leafletMap);

   let theMarker = {};

   leafletMap.on('click', function(e) {
      let latitude = e.latlng.lat.toString().substring(0, 15);
      let longitude = e.latlng.lng.toString().substring(0, 15);
      // document.getElementById("latitude").value = latitude;
      // document.getElementById("longitude").value = longitude;
      let popup = L.popup()
         .setLatLng([latitude, longitude])
         .setContent("Kordinat : " + latitude + " - " + longitude)
         .openOn(leafletMap);

      if (theMarker != undefined) {
         leafletMap.removeLayer(theMarker);
      };
      theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
   });

   const search = new GeoSearch.GeoSearchControl({
      provider: providerOSM,
      style: 'bar',
      searchLabel: 'Sinjai',
   });

   leafletMap.addControl(search);
</script>
