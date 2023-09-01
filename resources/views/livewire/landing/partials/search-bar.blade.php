<div wire:ignore.self id="modal-search-bar" class="modal fade" tabindex="-1" aria-labelledby="modal-search-bar"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-top modal-lg modal-dialog-scrollable">
        <div class="modal-content position-relative">
            {{-- <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalScrollableTitle">Modal title</h1>
                <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x fs-5"></i>
                </button>
            </div> --}}
            <div class="modal-body">
                <div class="position-relative px-4">
                    <div
                        class="position-absolute end-0 top-0 d-flex me-2 align-items-center h-100 justify-content-center">
                        <button type="button" class="btn-close w-auto small" data-bs-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x fs-5"></i>
                        </button>
                    </div>
                    <form class="mb-0">
                        <div class="d-flex align-items-center">
                            <div class="d-flex flex-grow-1 align-items-center">
                                <i class="bx bx-search-alt-2 opacity-25"></i>
                                <input type="text" wire:model.live.debounce.500ms='search' placeholder="Cari halaman.."
                                    autofocus class="form-control shadow-none border-0 flex-grow-1 form-control-lg">
                                <div wire:loading class="text-end me-5">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                @if(strlen($search) > 0)
                <div class="p-4 border-top">
                    <div class="list-group list-group-flush">
                        @if(array_sum(array_map("count", $results)) == 0)
                        <div class="list-group-item px-0">
                            <div class="row">
                                <div class="col-12 px-5 py-2">
                                    <h5>Pencarian tidak ditemukan, coba pakai kata kunci lain.</h5>
                                </div>
                            </div>
                        </div>
                        @else
                        @foreach($results as $resultType => $resultItems)
                        @foreach($resultItems as $result)
                        <div class="list-group-item px-0">
                            <div class="row" style="height: 6rem;">
                                <div class="col-3 col-sm-2" style="width: 9rem;height: -webkit-fill-available;">
                                    <!-- Anda bisa menyesuaikan gambar berdasarkan jenisnya -->
                                    <img src="{{ asset($result->files->first()->file_path ?? 'assets/img/illustrations/event.png') }}"
                                        alt="" class="img-zoom img-fluid rounded-1"
                                        style="
                                     object-fit: cover;
                                     height: -webkit-fill-available;
                                     width: -webkit-fill-available;
                                 ">
                                </div>
                                <div class="col-9 col-sm-8">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="fs-sm-5 fs-6 fw-medium">
                                                @if($resultType == 'posts')
                                                <a
                                                    href="{{ route('home.show_post', ['category' => $result->category, 'post' => $result->slug]) }}">
                                                    <p class="no-wrap overflow-hidden">{{ $result->title }}</p>
                                                </a>
                                                @elseif($resultType == 'events')
                                                <a href="{{ route('home.events.show', ['event' => $result->slug]) }}">
                                                    <p class="no-wrap overflow-hidden">{{ $result->title }}</p>
                                                </a>
                                                @elseif($resultType == 'ebooks')
                                                <a href="{{ route('home.ebooks.show', ['ebook' => $result->id]) }}">
                                                    <p class="no-wrap overflow-hidden">{{ $result->title }}</p>
                                                </a>
                                                @endif
                                                <!-- Anda bisa menambahkan kondisi lainnya jika ada jenis lain -->
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="opacity-100 mt-1">
                                                <div class="row">
                                                    <div class="col-lg-6 col-sm-12">
                                                        <span class="text-start">
                                                            <i class="bx bx-calendar me-2"></i>{{
                                                            formatTanggalIndonesia($result->created_at); }}
                                                        </span>
                                                    </div>
                                                    <div class="col-lg-6 col-sm-12">
                                                        <span class="text-end"><i class="bx bx-user me-2"></i>{{
                                                            $result->user->name ??
                                                            'Anonymous' }}</span>
                                                    </div>
                                                    <div class="col-12">
                                                        <span class="text-start d-flex align-items-center">
                                                            <i class="bx bx-label me-2"></i>
                                                            <span>
                                                                @if($resultType == 'posts')
                                                                {{ $result->category->name }}
                                                                @elseif($resultType == 'events')
                                                                {{ __('Event') }}
                                                                @elseif($resultType == 'ebooks')
                                                                {{ __('Ebook') }}
                                                                @endif
                                                            </span>
                                                        </span>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        @endforeach
                        @endif
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
</div>