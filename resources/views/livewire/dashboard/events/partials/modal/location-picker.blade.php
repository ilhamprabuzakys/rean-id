<div wire:ignore.self class="modal fade" id="locationPickerModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-xl">
      <div class="modal-content">
         <div class="modal-header">
            <div class="row justify-content-start">
               <div class="col-3">
                  <label for="coordinates" class="form-label fs-5">Lokasi Koordinat <sup class="text-danger">*</sup></label>
               </div>
               <div class="col-3">
                  <input type="text"
                     class="form-control" id="locationInput" wire:model="location">
               </div>
               <div class="col-3">
                  <input type="text"
                     class="form-control" wire:model="latitude" readonly>
               </div>
               <div class="col-3">
                  <input type="text" class="form-control" wire:model="longitude" readonly>
               </div>
            </div>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

         </div>
         <div class="modal-body">
            <div class="row">
               <!-- Draggable Marker With Popup -->
               <div class="col-12">
                  <div class="card ">
                     <div class="card-body">
                        <div class="leaflet-map" id="map" style="height: 400px;" wire:ignore></div>
                     </div>
                  </div>
               </div>
               <!-- /Draggable Marker With Popup -->
            </div>

         </div>
         <div class="modal-footer">
            {{-- <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">
               <i class="fas fa-xmark fa-md me-2"></i>
               Batalkan</button> --}}
            <button id="save-button" class="btn btn-primary px-2" wire:click="closeModal" type="button" data-bs-dismiss="modal>
               <i class="fas fa-save fa-md me-2"></i>
               Konfirmasi lokasi</button>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   function reverseGeocode(lat, lng, callback) {
      fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
         .then(response => response.json())
         .then(data => {
            if (data && data.address) {
               console.log(data);
               console.log(data.address);
               let city = data.address.city || data.address.town || data.address.village || data.address.hamlet;
               let province = data.address.state;
               let road = data.address.road || "Tidak diketahui";
               let kecamatan = data.address.suburb || data.address.neighbourhood || "Tidak diketahui";
               let kelurahan = data.address.village || data.address.hamlet || "Tidak diketahui";
               let fullAddress = data.display_name;
               callback(road, kelurahan, kecamatan, city, province, fullAddress);
            } else {
               callback("Tidak ada kota", "Tidak ada provinsi");
            }
         })
         .catch(error => {
            console.error("Terjadi kesalahan saat reverse geocoding: ", error);
            callback("Tidak ada kota", "Tidak ada provinsi");
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

   var map = L.map('map', {
      layers: street
   }).setView([-6.967606, 107.6587713], 20);
   var geocoder = L.Control.geocoder({
      defaultMarkGeocode: false
   }).addTo(map);

   // Ini adalah kode untuk menambahkan control pencarian
   // const search = new L.Control.Search({
   //    url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
   //    jsonpParam: 'json_callback',
   //    propertyName: 'display_name',
   //    propertyLoc: ['lat', 'lon'],
   //    marker: false,
   //    moveToLocation: function(latlng) {
   //       map.setView(latlng, 15);
   // }});

   const search = new GeoSearch.GeoSearchControl({
      provider: providerOSM,
      style: 'icon',
   });

   map.addControl(search);

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

   map.on('click', function(e) {
      let latitude = e.latlng.lat.toString().substring(0, 15);
      let longitude = e.latlng.lng.toString().substring(0, 15);

      reverseGeocode(latitude, longitude, function(road, kelurahan, kecamatan, city, province, fullAddress) {
         document.getElementById('city').value = city;
         document.getElementById('province').value = province;
         // document.getElementById('locationInput').value = fullAddress;
         // document.getElementById('location').value = fullAddress;

         // Tampilkan popup di peta dengan alamat yang ditemukan
         let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent(`Alamat: <b>${fullAddress}</b><br />
                        Provinsi: <b>${province}</b><br />
                        Kota: <b>${city}</b><br />
                        Kecamatan: <b>${kecamatan}</b><br />
                        Kelurahan: <b>${kelurahan}</b><br />
                        Jalan: <b>${road}</b><br />
            `).openOn(map);

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

          // Kirim alamat ke komponen Livewire Anda
         Livewire.emit('updateLocation', {
            fullAddress,
            province,
            city
         });
      });
   });

   const layerControl = L.control.layers(baseLayers).addTo(map);

   document.addEventListener('livewire:contentChanged', function() {
      if (map) {
         setTimeout(() => {
            map.invalidateSize();
         }, 0);
      }
   });
</script>
