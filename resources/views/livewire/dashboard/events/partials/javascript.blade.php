<script>
   function reverseGeocode(lat, lng, callback) {
      fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
         .then(response => response.json())
         .then(data => {
            if (data && data.display_name) {
               console.log(data);
               callback(data.display_name); // ini adalah alamat yang dihasilkan
            } else {
               callback("Alamat tidak ditemukan");
            }
         })
         .catch(error => {
            console.error("Terjadi kesalahan saat reverse geocoding: ", error);
            callback("Alamat tidak ditemukan");
         });
   }

   function reverseGeocodeWithOpenCage(latitude, longitude, callback) {
      const apiKey = '7bc40489fd664986b840c12c6a3a0b12'; // Ganti dengan API key Anda
      const url = `https://api.opencagedata.com/geocode/v1/json?q=${latitude}+${longitude}&key=${apiKey}`;

      fetch(url)
         .then(response => response.json())
         .then(data => {
            if (data && data.results && data.results.length > 0) {
               console.log(data);
               const address = data.results[0].formatted;
               callback(address);
            } else {
               console.error('No address found');
            }
         })
         .catch(error => console.error('Error fetching data from OpenCage:', error));
   }

   const providerOSM = new GeoSearch.OpenStreetMapProvider();

   const tileLayerOptions = {
      fullscreenControl: true,
      fullscreenControl: {
         pseudoFullscreen: false
      },
      maxZoom: 20,
      minZoom: 2,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
   };

   const street = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', tileLayerOptions);
   // const satellite = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', tileLayerOptions);
   // const hybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', tileLayerOptions);

   // const customMarkers = L.layerGroup();

   var map = L.map('map', {
      layers: [street]
   }).setView([-6.967606, 107.6587713], 20);
   var geocoder = L.Control.geocoder({
      defaultMarkGeocode: false
   }).addTo(map);

   const baseLayers = {
      'Street': street,
   };

   let theMarker = {};

   $('#locationPickerModal').on('shown.bs.modal', function() {
      map.invalidateSize();
   });


   const addClickListener = (marker, data) => {
      marker.on('click', function(e) {
         let latitude = e.latlng.lat.toString().substring(0, 15);
         let longitude = e.latlng.lng.toString().substring(0, 15);

         let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Koordinat : " + latitude + " - " + longitude)
            .openOn(map);

         marker.bindPopup(`Name : <b>${data.name}</b><br />
      Coordinate :
      <br />Long : <b>${latitude}</b>
      <br />Lat : <b>${longitude}</b>`)
            .openPopup();
      })
   };

   // $.getJSON('coordinates/json', function(data) {
   //    data.forEach((item) => {
   //       var homeIcon = L.icon({
   //          iconUrl: 'assets/img/rean-logo-brand.png',
   //          iconSize: [32, 37],
   //          shadowSize: [35, 40],
   //          iconAnchor: [22, 94],
   //          shadowAnchor: [4, 62],
   //          popupAnchor: [-3, -76]
   //       });

   //       var marker = L.marker([parseFloat(item.longitude), parseFloat(item.latitude)], {
   //          icon: homeIcon
   //       }).addTo(customMarkers);
   //       addClickListener(marker, item);
   //    });
   // });

   /* map.on('click', function(e) {
      let latitude = e.latlng.lat.toString().substring(0, 15);
      let longitude = e.latlng.lng.toString().substring(0, 15);

      let popup = L.popup()
         .setLatLng([latitude, longitude])
         .setContent("Koordinat : " + latitude + " - " + longitude)
         .openOn(map);

      if (theMarker != undefined) {
         map.removeLayer(theMarker);
      };

      theMarker = L.marker([latitude, longitude]).addTo(map);

      // Baris baru: mengirim event ke Livewire
      Livewire.emit('coordinatesUpdated', {
         latitude,
         longitude
      });
   }); */

   map.on('click', function(e) {
      let latitude = e.latlng.lat.toString().substring(0, 15);
      let longitude = e.latlng.lng.toString().substring(0, 15);

      reverseGeocode(latitude, longitude, function(address) {
         // Kirim alamat ke komponen Livewire Anda
         Livewire.emit('updateLocation', address);

         // Tampilkan popup di peta dengan alamat yang ditemukan
         let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Alamat: " + address)
            .openOn(map);

         // Hapus marker lama, jika ada
         if (theMarker != undefined) {
            map.removeLayer(theMarker);
         };

         // Tambahkan marker baru ke peta
         theMarker = L.marker([latitude, longitude]).addTo(map);

         // Kirim event ke Livewire dengan latitude dan longitude
         Livewire.emit('coordinatesUpdated', {
            latitude,
            longitude
         });
      });
   });


   const search = new GeoSearch.GeoSearchControl({
      provider: providerOSM,
      style: 'icon',
   });

   // const overlays = {
   //    'CustomMarkers': customMarkers
   // };
   const layerControl = L.control.layers(baseLayers, overlays).addTo(map);
   // map.addControl(search);

   document.addEventListener('livewire:contentChanged', function() {
      if (map) {
         setTimeout(() => {
            map.invalidateSize();
         }, 0);
      }
   });
</script>
