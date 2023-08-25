<div>
    <section class="position-relative bg-gradient-primary text-white" data-speed='.2'>
        <!--Overlay-->
        <div class="position-absolute start-0 top-0 w-100 h-100"></div>
        <!--:Hero BG:-->
        {{-- <img src="{{ asset('assets/img/hero-image/background-1.jpg') }}" alt="" class="jarallax-img opacity-25">
        --}}
        <!--:Hero Divider:-->
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
        <div class="container position-relative pt-12 pb-6 pb-lg-9">
            <div class="row pt-lg-6">
                <div class="col-md-10 col-xl-7 mx-auto text-center">
                    <h1 class="display-3 mb-5">Pencarian Ebook</h1>
                    <livewire:landing.ebooks.ebook-search />
                </div>
            </div>
            <!--/.row-->
        </div>
    </section>
    <section class="position-relative">
        <div class="container py-9 py-lg-11">
            <div class="d-flex mb-6 align-items-center">
                <h3 class="mb-0">Daftar Ebook</h3>
                <div class="flex-grow-1 border-top mx-3"></div>
                {{-- <a href="#" class="flex-shrink-0 link-hover-underline">Lihat semua</a> --}}
            </div>
            <div class="row justify-content-start">

                @forelse($ebooks as $ebook)
                <div class="col-md-4 col-lg-3">
                    <!--Property-item-row-->
                    <div class="card rounded-3 mb-5 aos-init aos-animate" data-aos="fade-up">
                        <div class="mb-0 p-2 pb-0">
                            <a href="{{ route('home.ebooks.show', $ebook) }}" class="d-block overflow-hidden rounded-3">
                                <img src="{{ asset($ebook->files->first()->file_path) }}" class="img-zoom img-fluid" alt="" style="width: -webkit-fill-available;">
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
                                        <strong class="small">{{ $ebook->pages }}</strong>
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
                </div>
                @empty
                <div class="col-12 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <div class="card-body pt-4">
                            <h4>Tidak ada ebook yang diunggah saat ini.</h4>
                        </div>
                    </div>
                </div>
                @endforelse
                {{-- <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a href="#" class="d-block card-hover overflow-hidden rounded-4">
                            <!--Image-->
                            <img src="{{ asset('assets/landing/assan/assets/img/estate/listing/1.jpg') }}"
                                class="img-fluid img-zoom" alt="" />
                            <!--Background-->
                            <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"></div>
                            <div class="position-absolute start-0 top-0 w-100 pt-3 px-3">
                                <span class="badge bg-primary">Berlangsung</span>
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end">
                                <div class="flex-grow-1 overflow-hidden pe-4">
                                    <h5 class="mb-3">Pembagian Sembako</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span class="small text-truncate">Kota Bandung, Jawa Barat</span>
                                    </p>
                                </div>
                                <!--Agent-->
                                <div class="d-flex align-items-center flex-shrink-0">
                                    <img src="{{ asset('assets/landing/assan/assets/img/avatar/1.jpg') }}" alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid" />
                                    <span class="small"> Abdul </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a href="{{ asset('demo-real-estate-2.html#!') }}" class="text-dark d-block mb-4">
                                <h5>Pembagian Sembako dan Party</h5>
                            </a>
                            <div class="row">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <i class="bx bx-calendar fs-5 me-2"></i>
                                        <strong class="small">April 10, 2021 3:08 PM - April 12, 2021 3:08 PM</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
</div>