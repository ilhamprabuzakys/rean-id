<div>
    <section class="position-relative bg-gradient-primary text-white">
        <div class="container pt-12 pb-9 pb-lg-12 position-relative z-2">
            <div class="row pb-7 pt-lg-9 align-items-center">
                <div class="col-12 col-lg-7 mb-5 mb-lg-0">
                    <h2 class="display-1 mb-4">
                        Ebook.
                    </h2>
                    <p class="lead mb-0">
                        {{ $ebook->description }}
                    </p>
                </div>
                <!--/.col-->
                <div class="col-lg-4 ms-auto">
                    <div class="text-lg-end">
                        <a href="#heading-ebook"
                            class="btn ms-lg-auto fs-1 p-0 width-10x height-10x btn-outline-white btn-circle-ripple rounded-circle flex-center d-flex text-center">
                            <div class="link-arrow-bounce">
                                <i class="bx bx-down-arrow-alt"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--/.row-->
        </div>

        <!--Vector divider shape-->
        <svg class="w-100 position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-body-bg)" height="48"
            fill="currentColor" preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54
                16.88 218.2 35.26 69.27 18 138.3 24.88 209.4
                13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z" opacity=".25"></path>
                            <path d="M0 0v15.81c13 21.11 27.64 41.05 47.69 56.24C99.41 111.27 165 111 224.58 91.58c31.15-10.15
                60.09-26.07 89.67-39.8 40.92-19 84.73-46 130.83-49.67 36.26-2.85 70.9 9.42 98.6 31.56 31.77 25.39
                62.32 62 103.63 73 40.44 10.79 81.35-6.69 119.13-24.28s75.16-39 116.92-43.05c59.73-5.85 
                113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5"></path>
                            <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
            112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path>
        </svg>
    </section>
    <section class="position-relative">
        <div class="container pt-12 pb-9 pb-lg-11">
            <div class="row pt-lg-7 justify-content-center">
                <div class="col-lg-12 col-xl-10">
                    <div class="pb-2 mb-4 border-bottom border-2">
                        <a href="{{ route('home.ebooks.index') }}" class="fw-semibold fs-6">
                            <i class="bx bx-left-arrow-alt fs-4 me-1"></i> Daftar Ebook</a>
                    </div>
                    <div class="row align-items-center justify-content-between mb-6">
                        <div class="col-12 col-md-10 col-lg-9">
                            <small class="d-block text-body-tertiary mb-3">
                                <i class="bx bx-history me-1 fs-5"></i> Ditambahkan : {{ $ebook->created_at }}
                            </small>
                            <h1 class="display-4 mb-3" id="heading-ebook">
                                {{ $ebook->title }}
                            </h1>
                            <p class="fs-6 mb-5 mb-md-0">
                                <i class="bx bx-calendar me-1 fs-5"></i> Diterbitkan pada : {{ $ebook->published_at }}
                            </p>

                        </div>
                        <div class="col-12 col-md-10 col-lg-9 mt-3">
                            <img src="{{ asset($ebook->files->first()->file_path) }}" alt="" class="img-fluid img-zoom"
                                style="width: -webkit-fill-available;">
                        </div>
                    </div>



                    <!--career details-->
                    <article>
                        <p class="mb-4">
                            {!! $ebook->description !!}
                        </p>

                        <div class="mb-5 p-4 border rounded-4">
                            <h5 class="mb-4">Detail Ebook</h5>
                            <ul class="list-unstyled mb-0">
                                <li class="d-flex align-items-center mb-4">
                                    <div>Judul</div>
                                    <div class="flex-grow-1 border-bottom mx-3"></div>
                                    <div><strong>{{ $ebook->title }}</strong></div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <div>Jumlah Halaman</div>
                                    <div class="flex-grow-1 border-bottom mx-3"></div>
                                    <div><strong>Hal {{ $ebook->pages }}</strong></div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <div>Penulis</div>
                                    <div class="flex-grow-1 border-bottom mx-3"></div>
                                    <div><strong>{{ $ebook->author }}</strong></div>
                                </li>
                                <li class="d-flex align-items-center mb-4">
                                    <div>Tanggal Publish</div>
                                    <div class="flex-grow-1 border-bottom mx-3"></div>
                                    <div><strong>{{ \Carbon\Carbon::parse($ebook->published_at)->format('d F, Y')
                                            }}</strong></div>
                                </li>
                                <li class="d-flex align-items-center">
                                    <div>Diupload oleh</div>
                                    <div class="flex-grow-1 border-bottom mx-3"></div>
                                    <div><strong>{{ $ebook->user->name }}</strong></div>
                                </li>
                            </ul>
                        </div>
                        <h5>Sinopsis Buku</h5>
                        {!! $ebook->body !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
    <section class="position-sticky bottom-0 shadow bg-body">
        <div class="container py-4">
            <div class="row align-items-center justify-content-center">
                <div class="col-7 col-md-5"> <a data-bs-toggle="modal" data-bs-target="#downloadEbook{{ $ebook->id }}"
                        class="btn btn-primary"><i class="bx bxs-download me-2"></i>Download Ebook</a>
                </div>
                <div class="col-5 col-md-auto">
                    <ul class="list-unstyled d-flex mb-0 align-items-center">

                        <li class="small text-body-secondary d-none d-lg-block me-3">
                            Share konten ini
                        </li>
                        <li class="list-inline-item mr-0 share-content">
                            <a class="rounded-circle p-2 text-white bg-primary me-3" onclick="shareToFacebook()">
                                <i class="bx bxl-facebook fs-4"></i>
                            </a>
                            <!--/.brand-a-->
                            <a class="rounded-circle p-2 text-white bg-success me-3" onclick="shareToWhatsapp()">
                                <i class="bx bxl-whatsapp fs-4"></i>
                            </a>
                            <!--/.brand-a-->
                            <a class="rounded-circle p-2 text-white p-0" onclick="shareToTwitter()"
                                style="background-color: rgb(0, 204, 255)">
                                <i class="bx bxl-twitter fs-4"></i>
                            </a>
                            <!--/.brand-a-->
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <script>
            function shareToFacebook() {
                var currentURL = window.location.href;
                var shareURL = "https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(currentURL);
                window.open(shareURL, "_blank");
            }

            function shareToWhatsapp() {
                var currentURL = window.location.href;
                var encodedMessage = encodeURIComponent("Lihat ini: " + currentURL);
                var shareURL = `https://web.whatsapp.com/send?text=${encodedMessage}`;
                window.open(shareURL, "_blank");
            }


            function shareToTwitter() {
                var currentURL = window.location.href;
                var shareURL = "https://twitter.com/intent/tweet?url=" + encodeURIComponent(currentURL);
                window.open(shareURL, "_blank");
            }

        </script>
    </section>
    <div class="modal fade" id="downloadEbook{{ $ebook->id }}" tabindex="-1" aria-labelledby="downloadEbook"
        aria-hidden="true">
        <div class="modal-dialog modal-md p-0 modal-lg">
            <div class="modal-content p-0">
                <div class="modal-header mb-0">
                    <div class="col-6 d-flex align-items-end justify-content-start">
                        <h4>{{ $ebook->title }}</h4>
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-end">
                        <button type="button"
                            class="btn btn-secondary border-2 width-5x height-5x flex-center rounded-pill me-4 mt-4 p-0"
                            data-bs-dismiss="modal" aria-label="Close">
                            <i class="bx bx-x fs-4"></i>
                        </button>
                    </div>
                </div>
                <!--Job form-->
                <div class="modal-body mt-0 px-2">
                    <!-- Embed PDF viewer dari PDF.js melalui CDN -->
                    <div class="row g-0">
                        <div class="col-12">
                            {{-- <iframe
                                src="https://mozilla.github.io/pdf.js/web/viewer.html?file={{ asset($ebook->pdf->file_path) }}"
                                width="80%" height="500px" class="mt-5"></iframe> --}}
                            {{-- <iframe
                                src="{{ asset('plugins/pdf.js/web/viewer.html') }}?file={{ asset($ebook->pdf->file_path) }}"
                                width="100%" height="500px" class="mt-5"></iframe>
                            <div class="modal-body p-5"> --}}
                                <iframe src="{{ asset($ebook->pdf->file_path) }}" width="100%" height="500px"></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>