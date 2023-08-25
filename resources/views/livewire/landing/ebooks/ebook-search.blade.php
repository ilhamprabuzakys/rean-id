<div id="search-bar">
    <form class="position-relative p-3 bg-dark bg-opacity-10 rounded-pill shadow-sm">
        <div class="d-flex align-items-center position-relative z-2">
            <input type="text" class="form-control form-control-lg text-dark pe-8 py-3 shadow-xl rounded-pill"
            wire:model.live='search' placeholder="Cari Ebook" aria-describedby="search-icon" />
            <button role="button" type="button"
                class="btn text-dark rounded-circle p-0 width-6x h-100 position-absolute end-0 top-50 translate-middle-y"
                id="search-icon">
                <i class="bx bx-search fs-4"></i>
            </button>
        </div>
    </form>

    @if(strlen($search) > 0)
    <div class="px-5 py-4 bg-dark bg-opacity-10 rounded-3 shadow-sm">
        @forelse($ebooks as $ebook)
        <a href="{{ route('home.ebooks.show', $ebook) }}"
            class="card-hover d-flex d-block overflow-hidden position-relative pt-3">
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset($ebook->files->first()->file_path) }}" alt="" class="img-zoom img-fluid">
                </div>
                <div class="col-8 text-start">
                    <h5>{{ $ebook->title }}</h5>
                    <div>
                        <p>{{ $ebook->description }}</p>
                    </div>
                    <div>
                        <i class="bx bx-calendar me-3"></i>{{ $ebook->published_at }}
                    </div>
                    <div>
                        <i class="bx bx-user me-3"></i>{{ $ebook->author }}
                    </div>
                </div>
            </div>
        </a>
        <!--Divider-->
        <hr class="my-2">
        @empty
        <a class="card-hover overflow-hidden position-relative pt-3">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="text-center">
                        <div class="fs-6 fw-medium">Tidak ada ebook saat ini.</div>
                        <span class="opacity-75">Nantikan unggahan selanjutnya dari kami</span>
                    </div>
                </div>
            </div>
        </a>
        @endforelse
    </div>
    @endif
</div>