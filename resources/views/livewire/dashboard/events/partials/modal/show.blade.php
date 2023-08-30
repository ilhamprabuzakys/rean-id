<div>
   <div wire:key wire:ignore class="modal fade" id="showEvent{{ $event->id }}" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-dialog-scrollable modal-xl">
         <div class="modal-content">
            <div class="modal-header">
               <h4>Detail Event</h4>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
               @push('scripts')
                  <script>
                     var swiperClassic = new Swiper(".cover-images", {
                        slidesPerView: 1,
                        loop: true,
                        pagination: {
                           clickable: !0,
                           el: ".swiper-pagination"
                        },
                     });
                  </script>
               @endpush
               <div class="row">
                  <div class="col-4">
                     @php
                        $coverImages = \App\Models\FileEvent::where('event_id', $event->id)->get();
                     @endphp
                     <div class="swiper text-white cover-images">
                        <div class="swiper-wrapper">
                           @forelse($coverImages as $key => $image)
                              <div class="swiper-slide" style="background-image:url({{ asset($image->file_path) }})"></div>
                           @empty
                           @endforelse
                        </div>
                        <div class="swiper-pagination"></div>
                     </div>
                     {{-- <script>
                        var swiperClassic = new Swiper(".cover-images", {
                           slidesPerView: auto,
                           loop: true,
                           pagination: { clickable: !0, el: ".swiper-pagination" },
                        });
                     </script> --}}
                     {{-- <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
                        <ol class="carousel-indicators">
                           <li data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></li>
                           <li data-bs-target="#carouselExample" data-bs-slide-to="1"></li>
                           <li data-bs-target="#carouselExample" data-bs-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                           <div class="carousel-item active">
                              <img class="d-block w-100" src="../../assets/img/elements/13.jpg" alt="First slide" />
                              <div class="carousel-caption d-none d-md-block">
                                 <h3>{{$event->title}}</h3>
                                 <p>Eos mutat malis maluisset et, agam ancillae quo te, in vim congue pertinacia.</p>
                              </div>
                           </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-bs-slide="next">
                           <span class="carousel-control-next-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Next</span>
                        </a>
                     </div> --}}
                  </div>
                  <div class="col-8">
                     <div class="row justify-content-between">
                        <div class="col-8">
                           <h4>{{ $event->title }}</h4>
                        </div>
                        {{-- <div class="col-4 d-flex justify-content-end align-items-center">
                           <div class="form-check form-switch mb-2">
                              <input class="form-check-input" type="checkbox" id="status" wire:click='changeStatus({{  }})' checked="{{ $event->status == TRUE ? 1 : 0 }}">
                              <label class="form-check-label" for="status">{{ $event->status == TRUE ? 'Aktif' : 'Tidak Aktif' }}</label>
                           </div>
                        </div> --}}
                     </div>
                     <div><strong>Lokasi:</strong> {{ $event->location }}</div>
                     <div><strong>Kota:</strong> {{ $event->city }}</div>
                     <div><strong>Provinsi:</strong> {{ $event->province }}</div>
                     <div><span><strong>Waktu:</strong> {{ $event->start_date }}</span><span> - {{ $event->end_date }}</span></div>
                     <div><strong>Penyelenggara:</strong> {{ $event->organizer }}</div>
                     <div><strong>Kontak:</strong> {{ $event->contact_email }}</div>
                     <div class="mt-3">
                        <strong>Deskripsi Acara:</strong>
                        <div>
                           <p>{!! $event->description !!}</p>
                        </div>
                     </div>
   
                  </div>
                  <div class="col-12 mt-5">
                     <h5 class="text-center">Lokasi Detail Map</h5>
                     <div class="px-3">
                        <div id="map{{ $event->id }}" wire:key='map{{ $event->id }}' style="height: 400px;"></div>

                        <div id="map-container{{ $event->id }}"></div>
                     </div>
                  </div>
               </div>
            </div>
         </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
   </div>
</div>


<div class="d-none">
</div>
{{-- @push('scripts')
@endpush --}}
<script>
   var tileLayerOptions = {
      fullscreenControl: true,
      fullscreenControl: {
         pseudoFullscreen: false
      },
      maxZoom: 20,
      minZoom: 2,
      subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
   };

   var initialLatitude = {{ $event->latitude }};
   var initialLongitude = {{ $event->longitude }};

   var map{{$event->id}} = L.map('map{{ $event->id }}', {
      layers: L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', tileLayerOptions)
   }).setView([initialLatitude, initialLongitude], 20);

   var search = new GeoSearch.GeoSearchControl({
      notFoundMessage: 'Maaf alamat yang kamu cari tidak ditemukan, tolong cari alamat terdekat secara manual.',
      provider: new GeoSearch.OpenStreetMapProvider(),
      style: 'icon',
   });

   map{{$event->id}}.addControl(search);
   var theMarker = {};
   theMarker = L.marker([initialLatitude, initialLongitude]).addTo(map{{$event->id}});

   /*    let location = '{{ $event->location }}';
      let province = '{{ $event->province }}';
      let city = '{{ $event->city }}';
      let organizer = '{{ $event->organizer }}';
      let startDate = '{{ $event->start_date }}';
      let endDate = '{{ $event->end_date }}'; */

   theMarker.bindPopup(`Alamat: <b>{{ $event->location }}</b><br />
                        Provinsi: <b>{{ $event->province }}</b><br />
                        Kota: <b>{{ $event->city }}</b><br />
                        Penyelenggara: <b>{{ $event->organizer }}</b><br />
                        Tanggal: <b>{{ $event->start_date }}</b> - <b>{{ $event->end_date }}</b><br />
                     `);

   // document.addEventListener('livewire:contentChanged', function() {
   //    if (map) {
   //       setTimeout(() => {
   //          map.invalidateSize();
   //       }, 0);
   //    }
   // });
   $('#showEvent{{ $event->id }}').on('shown.bs.modal', function() {
      Livewire.dispatch('refreshMap');
   });

   $('.btn-refresh').on('click', function() {
      console.log('Map refreshed..');
      map{{$event->id}}.invalidateSize();
   });

   window.addEventListener('refreshMap', function() {
      // console.log('Map refreshed..');
      map{{$event->id}}.invalidateSize();
   });

   $('#map{{ $event->id }}').appendTo('#map-container{{ $event->id }}');
</script>
