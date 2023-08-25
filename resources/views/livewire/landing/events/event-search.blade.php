<div id="search-bar" class="mt-5">
    <form class="position-relative p-3 bg-dark bg-opacity-10 rounded-3 shadow-sm">
        <div class="row g-2 mx-0 align-items-end">
            <div class="col-md-6 col-lg-5">
                <label for="filter_location" class="form-label text-white small block">Lokasi</label>
                <div class="input-icon-group">
                    <span class="input-icon">
                        <i class="bx bxs-map text-dark"></i>
                    </span>
                    <input type="text" id="filter_location" class="form-control border-0 bg-white text-dark" placeholder="Kota Bandung, Jawa Barat"
                    wire:model.live='filter_location' />
                </div>
            </div>
            <div class="col-md-9 col-lg-5">
                <label for="filter_date" class="form-label small text-white">Tanggal:</label>
                 <div class="input-icon-group">
                    <span class="input-icon">
                        <i class="bx bxs-time text-dark"></i>
                    </span>
                    <input type="text" id="filter_date" class="form-control ps-6 border-0 bg-white text-dark"
                        wire:model.live='filter_date' />
                </div>
            </div>
            <div class="col-md-3 col-lg-2 text-md-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bx bx-search"></i>
                </button>
            </div>
        </div>
    </form>

    @if(strlen($filter_location) > 0 || strlen($filter_date) > 0)
    <div class="px-5 py-4 bg-dark bg-opacity-10 rounded-3 shadow-sm">
        @forelse($events as $event)
        <a href="{{ route('home.events.show', $event) }}"
            class="card-hover d-flex d-block overflow-hidden position-relative pt-3">
            <div class="me-4 overflow-hidden width-12x height-9x">
                <img src="{{ asset($event->files->first()->file_path) }}" alt="" class="img-zoom img-fluid">
            </div>
            <div>
                <div class="fs-6 fw-medium">{{ $event->title }}</div>
                <div class="opacity-75"><i class="bx bx-calendar me-3"></i>{{ $event->start_date }} - {{
                    $event->end_date }}</div>
                <div class="opacity-100"><i class="bx bx-current-location me-3"></i>{{ $event->city . ', ' .
                    $event->province }}</div>
            </div>
        </a>
        <!--Divider-->
        <hr class="my-2">
        @empty
        <a class="card-hover overflow-hidden position-relative pt-3">
            <div class="row justify-content-center">
                <div class="col-10">
                    <div class="text-center">
                        <div class="fs-6 fw-medium">Pencarian tidak ditemukan.</div>
                        <span class="opacity-75">Nantikan kabar selanjutnya dari kami</span>
                    </div>
                </div>
            </div>
        </a>
        @endforelse
    </div>
    @endif
</div>