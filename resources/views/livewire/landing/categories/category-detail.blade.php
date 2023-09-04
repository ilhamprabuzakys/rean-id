<div>
   <section class="position-relative">
      <div class="container">
         <div class="row">
            <div class="col-md-9 col-lg-10">
               <div id="navinput" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                  <h6 class="mb-0 me-2 me-lg-4">Pencarian</h6>
                  <span class="border-top d-block flex-grow-1"></span>
               </div>
               <div class="row">
                  <div class="col-5">
                     <div class="input-icon-group">
                        <span class="input-icon">
                           <i class="bx bx-search fs-5"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari sesuatu..."
                           wire:model.live.debounce.500ms='search'>
                     </div>
                  </div>
                  <div class="col-6" wire:ignore>
                     <div class="input-icon-group">
                        <span class="input-icon">
                           <i class="bx bx-calendar fs-5"></i>
                        </span>
                        <input type="text" id="filter_date" class="form-control"
                           placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
                     </div>
                  </div>
                  <div class="col-1 d-flex align-items-center">
                     <a href="javascript:void(0);" wire:click='resetFilter()' class="align-center" id="reset-filter"><i
                           class="bx bx-x text-danger" style="font-size: 40px"></i></a>
                  </div>
               </div>
               <hr class="mt-5 mb-3">
            </div>
         </div>
      </div>
   </section>
   <section class="position-relative">
      <div class="container pb-9 pb-lg-11">
         <div class="row">
            <div class="col-lg-10 col-md-9">
               <div class="pe-lg-4 pe-md-2 mb-5">
                  <div class="row justify-content-between">
                     <div class="col-7">
                        {{ $posts->links() }}
                     </div>
                     <div class="col-1">
                        <select class="form-select form-select-sm" name="paginate" id="paginate" wire:model.live='paginate' style="width: 75px; padding-left: 1rem; padding-right: 0">
                           <option selected value="5">5</option>
                           <option value="10">10</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="pe-lg-4 pe-md-2">
                  @forelse ($posts as $key => $post)
                     <article wire:key="post-{{ $post->id }}" class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                        data-aos="fade-right" data-aos-once="true">
                        @if($post->files->first())
                        <div class="col-lg-5">
                           <a href="{{ asset($post->files->first()->file_path) }}"
                              class="d-block glightbox3 rounded-3 overflow-hidden hover-shadow-lg hover-lift"
                              data-glightbox data-gallery="gallery{{$key}}">
                              <img src="{{ asset($post->files->first()->file_path) }}" alt="{{ $post->title }}"
                                 class="img-post-item img-fluid rounded-3">
                           </a>
                        </div>
                        @endif
                        <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                           <div class="d-flex mb-0 justify-content-between">
                              <h4 class="mb-3">
                                 <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="flex-grow-1 d-block">
                                    {{ $post->title }}
                                 </a>
                              </h4>
                              <div class="ms-2"><a href="{{ route('home.category_view', $post->category) }}" class="badge badge-soft-primary">{{ $post->category->name }}</a></div>
                           </div>
                           
                           <p class="text-muted flex-grow-1 d-none d-lg-block">
                              {{ Str::limit(strip_tags($post->body), 120) }} <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="text-primary"> baca
                                 selengkapnya</a>
                           </p>
                           <div class="mt-auto mb-1 row">
                              <div class="col-6 d-flex">
                                 @if ($post->user->avatar == null)
                                    <img style="object-fit: cover;" class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset('assets/img/avatar/avatar-' . rand(1, 5) . '.png') }}" alt=""
                                       height="36">
                                 @else
                                    <img style="object-fit: cover;" class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset($post->user->avatar) }}" alt="" height="36">
                                 @endif
                                 <div class="flex-grow-1">
                                    <span class="m-0 fs-13"><a href="#">{{ $post->user->name }}</a></span>
                                    <p class="text-muted mb-0 small">{{ $post->created_at->format('d M, Y') }} · {{ rand(1, 5) }} min read</p>
                                 </div>
                              </div>
                              <div class="col-6 d-flex justify-content-end gap-1">
                                 @forelse ($post->tags as $tag)
                                    @if($loop->iteration > 2)
                                       @break
                                    @endif
                                    
                                    @if(strlen($tag->name) > 12 && $loop->iteration > 1)
                                       @break
                                    @endif
                              
                                    <div>
                                       <a href="{{ route('home.tag_view', $tag) }}"
                                          class="btn btn-soft-secondary tag-post-item">#{{ $tag->name }}</a>
                                    </div>
                                 @empty
                                 @endforelse
                                 {{-- <span class="align-self-center">
                                    ...
                                 </span> --}}
                              </div>
                           </div>
                        </div>
                     </article>
                  @empty
                  @if($search)
                  <h4 class="px-4">Postingan dengan kata kunci {{ \ucfirst($search) }} tidak ditemukan.</h4>
                  @elseif($filter_date)
                  @php
                  $dateRange = explode(' to ', $filter_date);
                  $startDate = $dateRange[0];
                  $endDate = $dateRange[1] ?? '';
                  @endphp
                  <h4 class="px-4">Postingan pada tanggal {{ 
                  \Carbon\Carbon::parse($startDate)->format('d F Y') . ' sampai ' . \Carbon\Carbon::parse($endDate)->format('d F Y')  }}
                     tidak ditemukan.</h4>
                  @endif
                  @endforelse
               </div>
               <div class="pe-lg-4 pe-md-2 mt-5">
                  {{ $posts->links() }}
               </div>
            </div>
            
         </div>
      </div>
   </section>
   @push('scripts')
   <script>
      $(document).ready(function() {
         let filterDateInstance = $("#filter_date").flatpickr({
            mode: "range",
            dateFormat: "Y-m-d",  // Format yang dikirim ke backend
            altInput: true,  // Membuat input tambahan untuk menampilkan format
            altFormat: "d F Y",  // Format tanggal yang ditampilkan di frontend
            rangeSeparator: " sampai ",
            onClose: function(selectedDates, dateStr, instance) {
               // Mengganti "to" dengan "sampai" pada altInput setelah tanggal dipilih
               instance.altInput.value = instance.altInput.value.replace(' to ', ' sampai ');
            }
         });


         let timeout;  // Variabel untuk menyimpan referensi timeout
         $('#filter_date').on('change', function (e) {
            var data = $('#filter_date').val();
            // Jika ada timeout sebelumnya, batalkan dulu
            if (timeout) {
               clearTimeout(timeout);
            }
            // Atur timeout baru
            timeout = setTimeout(function() {
               @this.set('filter_date', data);
            }, 300);
         });
         
         $('#reset-filter').on('click', function(e) {
            e.preventDefault();
            filterDateInstance.clear();
            Livewire.dispatch('resetFilter'); // Panggil fungsi resetFilter di komponen Livewire
         });
      });
   </script>
   @endpush
</div>
