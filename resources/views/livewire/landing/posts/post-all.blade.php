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
                  <div class="col-8">
                     <input type="text" class="form-control" placeholder="Cari sesuatu..." wire:model='search'>
                  </div>
                  <div class="col-4">
                     <input type="text" id="dateFilter" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model='filter_date'>
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
                     <div class="col-2 ms-auto">
                        <select class="form-select form-select-sm" name="filter_category" id="filter_category" wire:model='filter_category' style="padding-left: 1rem">
                            <option value="" selected>Semua</option>
                            @forelse ($categories as $category)
                                <option value="{{ $category->slug }}">{{ $category->name }}</option>
                            @empty
                                <option selected>Tidak ada kategori ditemukan.</option>
                            @endforelse
                        </select>
                     </div>
                     <div class="col-1">
                        <select class="form-select form-select-sm" name="paginate" id="paginate" wire:model='paginate' style="width: 75px; padding-left: 1rem; padding-right: 0">
                            <option selected value="5">5</option>
                            <option value="10">10</option>
                        </select>
                     </div>
                  </div>
               </div>
               <div class="pe-lg-4 pe-md-2">
                  @forelse ($posts as $post)
                     <article wire:key="post-{{ $post->id }}" class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                        data-aos="fade-right" data-aos-once="true">
                        <div class="col-lg-5">
                           <a href="blog-sidebar.html#!"
                              class="d-block rounded-3 overflow-hidden hover-shadow-lg hover-lift">
                              @if ($post->file_path !== null && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                                 <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="img-post-item img-fluid rounded-3">
                              @else
                                 <img src="{{ asset('assets/landing/assan/assets/img/960x900/' . rand(1, 5) . '.jpg') }}" alt="{{ $post->title }}" class="img-post-item img-fluid rounded-3">
                              @endif
                           </a>
                        </div>
                        <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                           <div class="d-flex mb-0 justify-content-between">
                              <h4 class="mb-3">
                                 <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="flex-grow-1 d-block">
                                    {{ $post->title }}
                                 </a>
                              </h4>
                              <div><a href="#" class="badge badge-soft-primary">{{ $post->category->name }}</a></div>
                           </div>

                           <p class="text-muted flex-grow-1 d-none d-lg-block">
                              {{ Str::limit(strip_tags($post->body), 120) }} <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="text-primary"> baca
                                 selengkapnya</a>
                           </p>
                           <div class="mt-auto mb-1 row">
                              <div class="col-9 d-flex">
                                 @if ($post->user->avatar == null)
                                    <img class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset('assets/img/avatar/avatar-' . rand(1, 5) . '.png') }}" alt=""
                                       height="36">
                                 @else
                                    <img class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset($post->user->avatar) }}" alt="" height="36">
                                 @endif
                                 <div class="flex-grow-1">
                                    <span class="m-0 fs-13"><a href="#">{{ $post->user->name }}</a></span>
                                    <p class="text-muted mb-0 small">{{ $post->created_at->format('d M, Y') }} · {{ rand(1, 5) }} min read</p>
                                 </div>
                              </div>
                              <div class="col-3 d-flex justify-content-end">
                                 @forelse ($post->tags as $tag)
                                    @if ($loop->iteration > 2)
                                    @break
                                 @endif
                                 <div class="me-1"><a href="#" class="btn btn-soft-secondary tag-post-item">#{{ $tag->name }}</a></div>
                              @empty
                              @endforelse
                           </div>
                        </div>
                     </div>
                  </article>
               @empty
               @if ($filter_category)
               <h4 class="px-4">Postingan dengan tipe {{ \ucfirst($filter_category) }} tidak ditemukan.</h4>
               @elseif($search)
               <h4 class="px-4">Postingan dengan kata kunci {{ \ucfirst($search) }} tidak ditemukan.</h4>
               @elseif($filter_date)
               <h4 class="px-4">Postingan pada tanggal  {{ \ucfirst($filter_date) }} tidak ditemukan.</h4>
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
</div>
