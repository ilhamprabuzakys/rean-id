<div>
    @if($ebooks->count() > 0)
    <h5 class="mb-4">Daftar Ebook</h5>
    @if($ebooks->count() > 5)
        <div class="p-3">
        {{ $ebooks->links() }}
    </div>
    @endif
    <div class="p-3">
        @foreach ($ebooks as $key => $ebook)
        <div class="card rounded-3 mb-5 aos-init aos-animate" data-aos="fade-up">
            <div class="mb-0 p-2 pb-0">
                <a href="{{ route('home.ebooks.show', $ebook) }}" class="d-block overflow-hidden rounded-3">
                    @if ($ebook->files->first())
                    <img src="{{ asset($ebook->files->first()->file_path) }}" class="img-zoom img-fluid" alt="" style="width: -webkit-fill-available; height: 200px; object-fit: cover;">
                    @endif
                </a>
            </div>
            <div class="card-body overflow-hidden p-4 px-lg-5 flex-grow-1">
                {{-- <span class="badge bg-body-tertiary text-primary mb-3">For Sale</span> --}}
                <a href="{{ route('home.ebooks.show', $ebook) }}" class="text-dark d-block mb-4">
                    <h4>{{ $ebook->title }}</h4>
                </a>
                <div class="row mb-3 mb-lg-4">
                    <div class="col-9" data-bs-toggle="tooltip" data-bs-placement="top" title=""
                        data-bs-original-title="Penulis">
                        <div class="d-flex align-items-center">
                            <i class="bx bx-user fs-5 me-2"></i>
                            <strong class="small">{{ $ebook->author }}</strong>
                        </div>
                    </div>
                    <div class="col-3 border-start border-end" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="" data-bs-original-title="Jumlah Halaman">
                        <div class="d-flex align-items-center">
                            <i class="bx bx-book-open fs-5 me-2"></i>
                            <strong class="small">{{ $ebook->pdf->first()->file_path ? 'Downloadable' : 'Not Exist' }}</strong>
                        </div>
                    </div>
                </div>
                <p class="mb-4 mb-lg-5 text-truncate">
                    {{ $ebook->description }}
                </p>
                <p class="mb-0">
                    <i class="bx bx-calendar fs-5 me-2"></i>
                    {{ $ebook->published_at }}
                </p>
            </div>
        </div>
        @endforeach
    </div>
    @if($ebooks->count() > 5)
        <div class="p-3">
        {{ $ebooks->links() }}
    </div>
    @endif
    @else
    <h5 class="mb-4">Data Ebook masih kosong</h5>
    @endif
</div>