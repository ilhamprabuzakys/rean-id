<div>
    <section class="position-relative bg-gradient-primary text-white">
        <!--Overlay-->
        <div class="position-absolute start-0 top-0 w-100 h-100"></div>
        <svg class="w-100 position-absolute start-0 bottom-0 z-1 mb-n1" height="48" fill="currentColor"
            preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg"
            style="transform: rotate(180deg) scaleX(-1);color:var(--bs-body-bg)">
            <path
                d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"
                opacity=".25" />
            <path
                d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15 60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39 62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z"
                opacity=".5" />
            <path
                d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63 112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z" />
        </svg>
        <div class="container pt-12 pb-12 position-relative z-1">
            <div class="row pt-3 pt-lg-9 pb-4 justify-content-between align-items-center">
                <div class="col-xl-8 mb-5 mb-xl-0">
                    <ol class="breadcrumb mb-3">
                        <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('home.events.index') }}">{{ __('Daftar Event')
                                }}</a></li>
                        <li class="breadcrumb-item active fw-bold" aria-current="page">{{ $event->title }}</li>
                    </ol>
                    <h2 class="display-2 mb-4">
                        {{ $event->title }}
                    </h2>
                    <p class="mb-0 lead pe-lg-8"><i class="bx bx-map me-2 align-center"></i><span class="align-end">{{ $event->city . ', ' . $event->province }}</span></p>
                </div>
                <div class="col-xl-4">
                    <div class="d-flex align-items-center justify-content-xl-end">
                        <!--Share options-->
                        <div class="dropdown text-dark text-end">
                            <a href="javascript:void(0);" data-bs-toggle="dropdown"
                                class="btn btn-primary dropdown-toggle">
                                <i class="bx bx-share-alt fs-4 me-2"></i>
                                Bagikan
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mt-2">
                                <a href="javascript:void(0);" class="dropdown-item text-dark">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-link fs-5 me-2 text-secondary"></i>
                                        <span>Copy link</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item text-dark">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bxl-facebook fs-5 me-2 text-primary"></i>
                                        <span>Bagikan ke facebook</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item text-dark">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bxl-twitter fs-5 me-2 text-info"></i>
                                        <span>Bagikan ke Twitter</span>
                                    </div>
                                </a>
                                <a href="javascript:void(0);" class="dropdown-item text-dark">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bxl-whatsapp fs-5 me-2 text-success"></i>
                                        <span>Bagikan ke Whatsapp</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container py-9 py-lg-11">
            <div class="row mb-3">
                <div class="col-md-6 mb-7 mb-md-0">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12">
                            <small class="d-block text-body-secondary mb-2">Deskripsi:</small>
                            <span class="mb-0 pb-3 border-bottom">{!! $event->description !!}</span>
                        </div>
                        <div class="col-sm-12 col-lg-12">
                            <span class="d-block text-body-secondary mb-2">Penyelenggara:</span>
                            <div class="row">
                                <div class="col-sm-6 mb-4 col-6">
                                    <small class="text-body-secondary block">Nama:</small>
                                    <span class="d-block mb-0 pb-2 border-bottom">{{ $event->organizer }}</span>
                                </div>
                                <div class="col-sm-6 mb-4 col-6">
                                    <small class="text-body-secondary block">Email Penyelenggara</small>
                                    <span class="d-block mb-0 pb-2 border-bottom">
                                        {{ $event->contact_email }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <span class="d-block text-body-secondary mb-2">Diupload oleh:</span>
                            <div class="d-flex align-items-center">
                                <div class="me-4">
                                    <img src="{{ asset($event->user->avatar == null ? " assets/img/avatar/avatar-1.png"
                                        : $event->user->avatar) }}" class="img-fluid avatar xl rounded-circle" alt=""
                                    style="object-fit: cover;" />
                                </div>
                                <div class="flex-grow-1">
                                    <a href="/u/{{ $event->user->username }}">
                                        <h6 class="mb-1">{{ $event->user->name }}</h6>
                                        <p class="small mb-1 text-body-secondary">
                                            {{ '@' . $event->user->username }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row">
                        <div class="col-12 mb-4 col-sm-12">
                            <small class="text-body-secondary block">Tanggal dan Waktu</small>
                            @php
                            $start_date = \Carbon\Carbon::parse($event->start_date);
                            $end_date = \Carbon\Carbon::parse($event->end_date);
                            $diffInDays = $start_date->diffInDays($end_date);
                            @endphp
                            <h6 class="mt-1 mb-0 pb-4 border-bottom">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('F d, Y h:i A') }} - {{
                                \Carbon\Carbon::parse($event->end_date)->format('F d, Y h:i A') }}
                            </h6>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-secondary block">Durasi:</small>
                            <h5 class="lead mb-0 pb-4 border-bottom">{{ $diffInDays }} hari</h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-secondary block">Kota</small>
                            <h5 class="lead mb-0 pb-4 border-bottom">
                                {{ $event->city }}
                            </h5>
                        </div>
                        <div class="col-sm-4 mb-4 col-12">
                            <small class="text-body-secondary block">Provinsi</small>
                            <h5 class="lead mb-0 pb-4 border-bottom">
                                {{ $event->province }}
                            </h5>
                        </div>
                        <div class="col-sm-12 mb-4 col-12">
                            <small class="text-body-secondary block mb-2">Alamat Lengkap</small>
                            <span class="d-block mb-0 pb-3 border-bottom">{{ $event->location }}</span>
                        </div>
                        <div class="col-sm-4 mb-4 col-6">
                            <small class="text-body-secondary">Status:</small>
                            <a
                                class="badge px-2 py-1 ms-2 d-inline badge-soft-{{ $event->status == TRUE ? 'primary' : 'danger'}}">{{
                                $event->status == TRUE ? 'Berlangsung' : 'Berakhir'}}</a>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="mb-0">Lokasi Map:</h5>
                            </div>
                            <div class="card-body">
                                <div class="leaflet-map" id="map" style="height: 400px;" wire:ignore></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="mb-4">
        <div class="container position-relative">
            <h3 class="mb-3 border-bottom pb-3">Gambar Terkait</h3>
            <div class="row">
                @if($event->files)
                @forelse($event->files as $key => $file)
                <div class="col-6 mb-4">
                    <a href="{{ asset($file->file_path) }}" data-glightbox data-gallery="gallery0{{$key}}"
                        class="d-block">
                        <img src="{{ asset($file->file_path) }}" class="img-fluid rounded-4 shadow-lg" alt=""
                            style="max-height: 400px" />
                    </a>
                </div>
                @empty
                @endforelse
                @endif
            </div>
        </div>
    </section>
    {{-- <section class="bg-body-tertiary">
        <div class="container py-9 py-lg-11">
            <div class="d-flex mb-6 align-items-center">
                <h3 class="mb-0">Nearby Properties</h3>
                <div class="flex-grow-1 border-top ms-3"></div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a href="{{ asset('demo-real-estate-listing.html#!') }}"
                            class="d-block card-hover overflow-hidden rounded-4">
                            <!--Image-->
                            <img src="{{ asset('assets/landing/assan/assets/img/estate/listing/1.jpg') }}"
                                class="img-fluid img-zoom" alt="" />
                            <!--Background-->
                            <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"></div>
                            <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                <span class="badge bg-white text-primary">For Sale</span>
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                <div class="flex-grow-1 overflow-hidden pe-4">
                                    <h5 class="mb-3">$453,675</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bx-map me-1"></i>
                                        <span class="small text-truncate">Manchester</span>
                                    </p>
                                </div>
                                <!--Agent-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <img src="{{ asset('assets/landing/assan/assets/img/avatar/1.jpg') }}" alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid" />
                                    <span class="small"> Sonia </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a href="{{ asset('demo-real-estate-listing.html#!') }}" class="d-block mb-4">
                                <h5>Villa in Coral Gables</h5>
                            </a>
                            <div class="row">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-bath fs-5 me-2"></i>
                                        <strong class="small">2</strong>
                                    </div>
                                </div>
                                <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Area">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-area fs-5 me-2"></i>
                                        <strong class="small">6400 Sq Ft</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a href="{{ asset('demo-real-estate-listing.html#!') }}"
                            class="d-block card-hover overflow-hidden rounded-4 position-relative">
                            <!--Image-->
                            <img src="{{ asset('assets/landing/assan/assets/img/estate/listing/2.jpg') }}"
                                class="img-fluid rounded-4 img-zoom" alt="" />
                            <!--Background-->
                            <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-75"></div>
                            <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                <span class="badge bg-info">For Rent</span>
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                <div class="flex-grow-1 overflow-hidden pe-4">
                                    <h5 class="mb-3">$953,000</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span class="small text-truncate">Liverpool</span>
                                    </p>
                                </div>
                                <!--Agent-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <img src="{{ asset('assets/landing/assan/assets/img/avatar/2.jpg') }}" alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid" />
                                    <span class="small"> Monika </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a href="{{ asset('demo-real-estate-listing.html#!') }}" class="d-block mb-4">
                                <h5>Located in the heart of city</h5>
                            </a>
                            <div class="row">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bxs-bath fs-5 me-2"></i>
                                        <strong class="small">2</strong>
                                    </div>
                                </div>
                                <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Area">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-area fs-5 me-2"></i>
                                        <strong class="small">6400 Sq Ft</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a href="{{ asset('demo-real-estate-listing.html#!') }}"
                            class="d-block card-hover overflow-hidden rounded-4 position-relative">
                            <!--Image-->
                            <img src="{{ asset('assets/landing/assan/assets/img/estate/listing/4.jpg') }}"
                                class="img-fluid img-zoom" alt="" />
                            <!--Background-->
                            <div
                                class="position-absolute rounded-4 start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50">
                            </div>
                            <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                <span class="badge bg-white text-primary">For Sale</span>
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                <div class="flex-grow-1 overflow-hidden pe-4">
                                    <h5 class="mb-3">$399,000</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span class="small text-truncate">Bristol</span>
                                    </p>
                                </div>
                                <!--Agent-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <img src="{{ asset('assets/landing/assan/assets/img/avatar/6.jpg') }}" alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid" />
                                    <span class="small"> Adam </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a href="{{ asset('demo-real-estate-listing.html#!') }}" class="d-block mb-4">
                                <h5>
                                    Standing in the heart of the city
                                </h5>
                            </a>
                            <div class="row">
                                <div class="col-3" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Bedrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-bed fs-5 me-2"></i>
                                        <strong class="small">4</strong>
                                    </div>
                                </div>
                                <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                                    data-bs-placement="top" title="" data-bs-original-title="Bathrooms">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-bath fs-5 me-2"></i>
                                        <strong class="small">2</strong>
                                    </div>
                                </div>
                                <div class="col-6" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                                    data-bs-original-title="Area">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-area fs-5 me-2"></i>
                                        <strong class="small">6400 Sq Ft</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <script>
        function reverseGeocode(lat, lng, callback) {
          fetch(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`)
             .then(response => response.json())
             .then(data => {
                if (data && data.address) {
                   let city = data.address.city || data.address.town || data.address.village || data.address.hamlet;
                   let province = data.address.state || "{{ $event->province }}";
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
       var initialLatitude = '{{ $event->latitude }}';
       var initialLongitude = '{{ $event->longitude }}';
       var map = L.map('map', {
          layers: street
       }).setView([initialLatitude, initialLongitude], 20);
/*        var geocoder = L.Control.geocoder({
          defaultMarkGeocode: false
       }).addTo(map); */
    
       const search = new GeoSearch.GeoSearchControl({
          notFoundMessage: 'Maaf alamat yang kamu cari tidak ditemukan, tolong cari alamat terdekat secara manual.',
          provider: providerOSM,
          style: 'icon',
       });
    
       map.addControl(search);
    
       const baseLayers = {
          'Street': street,
       };
    
       let theMarker = {};
       theMarker = L.marker([initialLatitude, initialLongitude]).addTo(map);
    
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
    
             /* // Hapus marker lama, jika ada
             if (theMarker != undefined) {
                map.removeLayer(theMarker);
             };
    
             // Tambahkan marker baru ke peta
             theMarker = L.marker([latitude, longitude]).addTo(map); */
          });
       });
    </script>
</div>