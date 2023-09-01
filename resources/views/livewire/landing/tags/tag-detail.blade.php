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
                  <div class="col-7">
                     <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-search fs-5"></i>
                        </span>
                        <input type="text" class="form-control" placeholder="Cari sesuatu..." wire:model.live.debounce.500ms='search'>
                    </div>
                  </div>
                  <div class="col-4">
                     <div class="input-icon-group">
                        <span class="input-icon">
                            <i class="bx bx-calendar fs-5"></i>
                        </span>
                        <input type="text" id="dateFilter" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
                    </div>
                  </div>
                  <div class="col-1 d-flex align-items-center">
                     <a href="javascript:void(0);" wire:click='resetFilter()' class="align-center"><i class="bx bx-x text-danger" style="font-size: 40px"></i></a>
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
                    @forelse ($posts as $post)
                       <article wire:key="post-{{ $post->id }}" class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                          data-aos="fade-right" data-aos-once="true">
                          <div class="col-lg-5">
                             <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}"
                                class="d-block rounded-3 overflow-hidden hover-shadow-lg hover-lift">
                                <img style="object-fit: cover;" src="{{ asset($post->files->first()->file_path ?? 'assets/borex/css/icons.min.css' . rand(1, 5) . '.jpg' ) }}" alt="{{ $post->title }}" class="img-post-item img-fluid rounded-3">
                             </a>
                          </div>
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
                                <div class="col-8 d-flex">
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
                                <div class="col-4 d-flex justify-content-end gap-1">
                                   @forelse ($post->tags as $tag)
                                      @if($loop->iteration > 3) @break @endif
                                      <div><a href="{{ route('home.tag_view', $tag) }}"" class="btn btn-soft-secondary tag-post-item">#{{ $tag->name }}</a></div>
                                   @empty
                                   @endforelse
                                </div>
                             </div>
                          </div>
                       </article>
                    @empty
                       <h4 class="px-4">Tidak ada hasil ditemukan.</h4>
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
