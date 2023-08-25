<div wire:ignore.self id="modal-search-bar" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar" aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg modal-dialog-scrollable">
        <div class="modal-content position-relative">
            <div class="position-relative px-4">
                <div class="position-absolute end-0 top-0 d-flex me-2 align-items-center h-100 justify-content-center">
                    <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal" aria-label="Close">
                        <i class="bx bx-x fs-5"></i>
                    </button>
                </div>
                <form class="mb-0">
                    <div class="d-flex align-items-center">
                        <div class="d-flex flex-grow-1 align-items-center">
                            <i class="bx bx-search-alt-2 opacity-25"></i>
                            <input type="text" wire:model.live.debounce.500ms='search' placeholder="Cari halaman.." autofocus
                                class="form-control shadow-none border-0 flex-grow-1 form-control-lg">
                        </div>
                    </div>
                </form>
            </div>
            @if(strlen($search) > 0)
            <div class="p-4 border-top">
                <div class="list-group list-group-flush">
                    @forelse($results as $resultType => $resultItems)
                        @foreach($resultItems as $result)
                        <div class="list-group-item px-0">
                            <div class="row">
                                <div class="col-2">
                                    <div class="me-4 overflow-hidden width-12x height-9x">
                                        <!-- Anda bisa menyesuaikan gambar berdasarkan jenisnya -->
                                        <img src="{{ asset('assets/img/illustrations/event.png') }}" alt=""
                                            class="img-zoom img-fluid">
                                    </div>
                                </div>
                                <div class="col-10 px-5 py-2">
                                    <div class="fs-6 fw-medium">
                                        @if($resultType == 'posts')
                                        <a
                                            href="{{ route('home.show_post', ['category' => $result->category, 'post' => $result->slug]) }}">
                                            {{ $result->title }}
                                        </a>
                                        @elseif($resultType == 'events')
                                        <a href="{{ route('home.events.show', ['event' => $result->slug]) }}">
                                            {{ $result->title }}
                                        </a>
                                        @elseif($resultType == 'ebooks')
                                        <a href="{{ route('home.ebooks.show', ['ebook' => $result->id]) }}">
                                            {{ $result->title }}
                                        </a>
                                        @endif
                                        <!-- Anda bisa menambahkan kondisi lainnya jika ada jenis lain -->
                                    </div>
                                    <div class="opacity-100 mt-1">
                                        <span class="text-start me-3">
                                            <i class="bx bx-calendar me-3"></i>{{ $result->created_at->format('Y-m-d') }}
                                        </span>
                                        <span class="text-end"><i class="bx bx-user me-3"></i>{{ $result->user->name ??
                                            'Anonymous' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{-- {{ var_dump($resultItems) }} --}}
                    @empty
                    <div class="list-group-item px-0">
                        <div class="row">
                            <div class="col-12 px-5 py-2">
                                <h5>Pencarian tidak ditemukan, coba pakai kata kunci lain.</h5>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </div>
            @endif

            {{-- <div class="p-4 border-top">
                <h6 class="mb-4">
                    <i class="bx bx-lightning me-2 text-body-secondary"></i>Pencarian populer
                </h6>
                <div class="d-flex flex-wrap gap-2 align-items-center">
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Berita</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Video</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Audio</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Musik</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Artikel</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Event</a></span>
                    <span><a href="header-search-bar-2.html#!"
                            class="d-block bg-body-secondary px-3 py-1 rounded small">Ebook</a></span>
                </div>
            </div> --}}
        </div>
    </div>
</div>