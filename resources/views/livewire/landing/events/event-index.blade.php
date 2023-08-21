<div>
    <section class="position-relative bg-primary text-white" data-speed='.2'>
        <!--Overlay-->
        <div
        class="position-absolute start-0 top-0 w-100 h-100 bg-dark opacity-75"
    ></div>
       <!--:Hero BG:-->
       {{-- <img src="{{ asset('assets/img/hero-image/background-1.jpg') }}" alt="" class="jarallax-img opacity-25"> --}}
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
       <div class="container pt-15 pb-9 pb-lg-12 position-relative z-1">
          <div class="row justify-content-center">
             <div class="col-lg-10 col-xl-8 position-relative z-2">
                <h1 class="display-3 text-center text-white mb-4">
                   Portal Event <br>dari komunitas kami.
                </h1>
                {{-- <p class="fw-bolder text-center mb-6 text-white">
                   <strong>BUY. SELL . RENT Property</strong>
                </p> --}}
                <div class="text-center ">
                   <a href="#list" class="btn btn-primary shadow-sm px-5 rounded-pill mb-3">
                      Jelajahi
                   </a>
                </div>
                <form class="position-relative p-3 bg-dark bg-opacity-10 rounded-3 shadow-sm">
                   <div class="row g-2 mx-0 align-items-end">
                      <div class="col-md-6 col-lg-3">
                         <label for="p_type" class="form-label text-white small block">Kota</label>
                         {{-- <select class="form-control border-0 bg-white text-dark pe-5"
                            data-choices='{"searchEnabled":false,"itemSelectText":""}' name="p_type" id="p_type">
                            <option value="Any type" selected>
                               Bandung
                            </option>
                            <option value="Villa">Villa</option>
                            <option value="Apartment">
                               Apartment
                            </option>
                            <option value="Office">
                               Office
                            </option>
                            <option value="Parking">
                               Parking
                            </option>
                         </select> --}}
                         <input type="text" id="kota" class="form-control border-0 bg-white text-dark" placeholder="Bandung" wire:model='kota' />
                      </div>
                      <div class="col-md-6 col-lg-3">
                         <label for="p_for" class="form-label small text-white block">Provinsi:</label>
                         {{-- <select class="form-control border-0 bg-white text-dark pe-5"
                            data-choices='{"searchEnabled":false,"itemSelectText":""}' name="p_for" id="p_type">
                            <option value="Rent">
                               Jawa Barat
                            </option>
                            <option value="Sale">
                               For Sale
                            </option> --}}
                         </select>
                         <input type="text" id="provinsi" class="form-control border-0 bg-white text-dark" placeholder="Jawa Barat" wire:model='provinsi'/>
                      </div>
                      <div class="col-md-9 col-lg-4">
                         <label for="tanggal" class="form-label small text-white">Tanggal:</label>
                         <div class="position-relative">
                            {{-- <i class="bx bxs-map small ms-3 position-absolute start-0 top-50 translate-middle-y"></i> --}}
                            <input type="text" id="tanggal" class="form-control border-0 bg-white text-dark" wire:model='filter_date' />
                         </div>
                      </div>
                      <div class="col-md-3 col-lg-2 text-md-end">
                         <button type="submit" class="btn btn-primary w-100">
                            <i class="bx bx-search"></i>
                         </button>
                      </div>
                   </div>
                </form>
                <small class="text-white-50 pt-3 pt-lg-4 text-center d-block">
                   Kesenangan itu jika bersama banyak orang tahu.
                </small>
             </div>
          </div>
       </div>
    </section>
    <section class="position-relative">
        <div class="container py-9 py-lg-11">
            <div class="d-flex mb-6 align-items-center">
                <h3 class="mb-0">Daftar Event</h3>
                <div class="flex-grow-1 border-top mx-3"></div>
                <a
                    href="#"
                    class="flex-shrink-0 link-hover-underline"
                    >Lihat semua</a
                >
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a
                            href="{{ route('home.events.show') }}"
                            class="d-block card-hover overflow-hidden rounded-4"
                        >
                            <!--Image-->
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/listing/1.jpg') }}"
                                class="img-fluid img-zoom"
                                alt=""
                            />
                            <!--Background-->
                            <div
                                class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"
                            ></div>
                            <div
                                class="position-absolute start-0 top-0 w-100 pt-3 px-3"
                            >
                                <span class="badge bg-primary"
                                    >Berlangsung</span
                                >
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end"
                            >
                                <div
                                    class="flex-grow-1 overflow-hidden pe-4"
                                >
                                    <h5 class="mb-3">Pembagian Sembako</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span
                                            class="small text-truncate"
                                            >Kota Bandung, Jawa Barat</span
                                        >
                                    </p>
                                </div>
                                <!--Agent-->
                                <div
                                    class="d-flex align-items-center flex-shrink-0"
                                >
                                    <img
                                        src="{{ asset('assets/landing/assan/assets/img/avatar/1.jpg') }}"
                                        alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid"
                                    />
                                    <span class="small"> Abdul </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a
                                href="{{ asset('demo-real-estate-2.html#!') }}"
                                class="text-dark d-block mb-4"
                            >
                                <h5>Pembagian Sembako dan Party</h5>
                            </a>
                            <div class="row">
                                <div
                                    class="col-12">
                                    <div
                                        class="d-flex align-items-center"
                                    >
                                        <i
                                            class="bx bx-calendar fs-5 me-2"
                                        ></i>
                                        <strong class="small">April 10, 2021 3:08 PM - April 12, 2021 3:08 PM</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a
                            href="{{ asset('demo-real-estate-2.html#!') }}"
                            class="d-block card-hover overflow-hidden rounded-4"
                        >
                            <!--Image-->
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/listing/2.jpg') }}"
                                class="img-fluid img-zoom"
                                alt=""
                            />
                            <!--Background-->
                            <div
                                class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"
                            ></div>
                            <div
                                class="position-absolute start-0 top-0 w-100 pt-3 px-3"
                            >
                                <span class="badge bg-danger"
                                    >Berakhir</span
                                >
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end"
                            >
                                <div
                                    class="flex-grow-1 overflow-hidden pe-4"
                                >
                                    <h5 class="mb-3">Makan Bersama</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span
                                            class="small text-truncate"
                                            >Kota Bandung, Jawa Barat</span
                                        >
                                    </p>
                                </div>
                                <!--Agent-->
                                <div
                                    class="d-flex align-items-center flex-shrink-0"
                                >
                                    <img
                                        src="{{ asset('assets/landing/assan/assets/img/avatar/1.jpg') }}"
                                        alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid"
                                    />
                                    <span class="small"> Abdul </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a
                                href="{{ asset('demo-real-estate-2.html#!') }}"
                                class="text-dark d-block mb-4"
                            >
                                <h5>Makan Bersama dan Party</h5>
                            </a>
                            <div class="row">
                                <div
                                    class="col-12">
                                    <div
                                        class="d-flex align-items-center"
                                    >
                                        <i
                                            class="bx bx-calendar fs-5 me-2"
                                        ></i>
                                        <strong class="small">April 10, 2021 3:08 PM - April 12, 2021 3:08 PM</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-10 mb-5 mb-lg-0">
                    <!--Card-property-2-->
                    <div class="position-relative">
                        <a
                            href="{{ asset('demo-real-estate-2.html#!') }}"
                            class="d-block card-hover overflow-hidden rounded-4"
                        >
                            <!--Image-->
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/listing/3.jpg') }}"
                                class="img-fluid img-zoom"
                                alt=""
                            />
                            <!--Background-->
                            <div
                                class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark opacity-50"
                            ></div>
                            <div
                                class="position-absolute start-0 top-0 w-100 pt-3 px-3"
                            >
                                <span class="badge bg-danger"
                                >Berakhir</span
                            >
                            </div>
                            <div
                                class="text-white d-flex justify-content-between w-100 px-3 pb-4 position-absolute start-0 bottom-0 w-100 h-100 align-items-end"
                            >
                                <div
                                    class="flex-grow-1 overflow-hidden pe-4"
                                >
                                    <h5 class="mb-3">Kampanye Partai Hijau</h5>
                                    <!--Location-->
                                    <p class="mb-0 d-flex">
                                        <i class="bx bxs-map me-1"></i>
                                        <span
                                            class="small text-truncate"
                                            >Kota Bandung, Jawa Barat</span
                                        >
                                    </p>
                                </div>
                                <!--Agent-->
                                <div
                                    class="d-flex align-items-center flex-shrink-0"
                                >
                                    <img
                                        src="{{ asset('assets/landing/assan/assets/img/avatar/1.jpg') }}"
                                        alt=""
                                        class="flex-shrink-0 flex-shrink-0 avatar sm rounded-circle me-2 img-fluid"
                                    />
                                    <span class="small"> Abdul </span>
                                </div>
                            </div>
                        </a>
                        <div class="card-body pt-4">
                            <a
                                href="{{ asset('demo-real-estate-2.html#!') }}"
                                class="text-dark d-block mb-4"
                            >
                                <h5>Kampanye Partai Hijau</h5>
                            </a>
                            <div class="row">
                                <div
                                    class="col-12">
                                    <div
                                        class="d-flex align-items-center"
                                    >
                                        <i
                                            class="bx bx-calendar fs-5 me-2"
                                        ></i>
                                        <strong class="small">April 10, 2021 3:08 PM - April 12, 2021 3:08 PM</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative overflow-hidden">
        <!--Circle line-->
        <div
            class="position-absolute start-0 bottom-0 mb-n4 h-100 w-50 text-warning rellax"
            data-rellax-percentage=".75"
            data-rellax-speed="1"
        >
            <svg
                class="flip-x w-100 h-auto"
                width="324"
                height="324"
                viewBox="0 0 324 324"
                fill="none"
                xmlns="http://www.w3.org/2000/svg"
            >
                <path
                    d="M324 0.999969C281.583 0.999971 239.581 9.35461 200.393 25.5869C161.205 41.8192 125.598 65.6112 95.6045 95.6045C65.6112 125.598 41.8192 161.205 25.5869 200.393C9.35463 239.581 0.999996 281.583 1 324"
                    stroke-width=".5"
                    stroke="currentColor"
                />
            </svg>
        </div>
        <div class="container py-9 py-lg-11 position-relative">
            <div class="row align-items-center">
                <div
                    class="col-lg-6 mb-5 mb-md-0"
                    data-aos="fade-up"
                    data-aos-delay="100"
                >
                    <div class="position-relative ps-12 pb-12">
                        <img
                            src="{{ asset('assets/landing/assan/assets/img/estate/listing/4.jpg') }}"
                            class="img-fluid rounded-4"
                            alt=""
                        />
                        <img
                            src="{{ asset('assets/landing/assan/assets/img/estate/listing/2.jpg') }}"
                            class="img-fluid w-50 rounded-4 position-absolute bottom-0 start-0 ml-3 rellax"
                            data-rellax-speed="1"
                            data-rellax-percentage=".5"
                            alt=""
                        />
                    </div>
                </div>
                <div class="col-lg-6 col-xl-5 ms-lg-auto">
                    <h5
                        class="fw-bold mb-4"
                        data-aos="fade-up"
                        data-aos-delay="100"
                    >
                        Tujuan Kami
                    </h5>
                    <h3
                        class="fs-2 fw-normal"
                        data-aos="fade-up"
                        data-aos-delay="150"
                    >
                        As a team, we develop solutions to meet the
                        highest requirements. We not only keep up with
                        the times, but are always one step ahead of the
                        requirements and innovation standards. We are
                        the source of ideas.
                    </h3>
                </div>
            </div>
        </div>
    </section>

    <section class="position-relative overflow-hidden">
        <!--Circle line-->
        <svg
            class="position-absolute end-0 bottom-0 h-75 w-auto text-primary"
            width="324"
            height="324"
            viewBox="0 0 324 324"
            fill="none"
            xmlns="http://www.w3.org/2000/svg"
        >
            <path
                d="M324 0.999969C281.583 0.999971 239.581 9.35461 200.393 25.5869C161.205 41.8192 125.598 65.6112 95.6045 95.6045C65.6112 125.598 41.8192 161.205 25.5869 200.393C9.35463 239.581 0.999996 281.583 1 324"
                stroke-width=".5"
                stroke="currentColor"
            />
        </svg>

        <div class="container py-9 py-lg-11 position-relative z-1">
            <!--Masonry layout-->
            <div class="row" data-isotope='{"layoutMode":"masonry"}'>
                <!--Masonry-Grid-item-->
                <div class="col-md-4 col-6 mb-4 grid-item">
                    <h3 class="fs-1 mb-3" data-aos="fade-up">
                        Kunjungan Terpopuler
                    </h3>
                    <p data-aos="fade-up" data-aos-delay="100">
                        Most popular places, Lorem ipsum dolor sit amet,
                        consectetur adipiscing elit.
                    </p>
                </div>
                <!--Masonry-Grid-item-->
                <div
                    data-aos="fade-up"
                    class="col-md-4 col-6 mb-4 grid-item"
                >
                    <a
                        href="{{ asset('demo-real-estate-2.html#!') }}"
                        class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0"
                    >
                        <div class="position-relative overflow-hidden">
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/cities/liverpool.jpg') }}"
                                class="img-zoom img-fluid"
                                alt=""
                            />
                            <!--Overlay background-->
                            <div
                                class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100"
                            ></div>
                            <!--Overlay content-->
                            <div
                                class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4"
                            >
                                <h5>Bandung</h5>
                                <p class="mb-0 opacity-75">
                                    3 Event
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Masonry-Grid-item-->
                <div
                    data-aos="fade-up"
                    class="col-md-4 col-6 mb-4 grid-item"
                >
                    <a
                        href="{{ asset('demo-real-estate-2.html#!') }}"
                        class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0"
                    >
                        <div class="position-relative overflow-hidden">
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/cities/bristol.jpg') }}"
                                class="img-zoom img-fluid"
                                alt=""
                            />
                            <!--Overlay background-->
                            <div
                                class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100"
                            ></div>
                            <!--Overlay content-->
                            <div
                                class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4"
                            >
                                <h5>Cimahi</h5>
                                <p class="mb-0 opacity-75">
                                    2 Event
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Masonry-Grid-item-->
                <div
                    data-aos="fade-up"
                    class="col-md-4 col-6 mb-4 grid-item"
                >
                    <a
                        href="{{ asset('demo-real-estate-2.html#!') }}"
                        class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0"
                    >
                        <div class="position-relative overflow-hidden">
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/cities/birmingham.jpg') }}"
                                class="img-zoom img-fluid"
                                alt=""
                            />
                            <!--Overlay background-->
                            <div
                                class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100"
                            ></div>
                            <!--Overlay content-->
                            <div
                                class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4"
                            >
                                <h5>Jakarta selatan</h5>
                                <p class="mb-0 opacity-75">
                                    9 Event
                                </p>
                            </div>
                        </div>
                    </a>
                </div>

                <!--Masonry-Grid-item-->
                <div
                    data-aos="fade-up"
                    class="col-md-4 col-6 mb-4 grid-item"
                >
                    <a
                        href="{{ asset('demo-real-estate-2.html#!') }}"
                        class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0"
                    >
                        <div class="position-relative overflow-hidden">
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/cities/manchester.jpg') }}"
                                class="img-zoom img-fluid"
                                alt=""
                            />
                            <!--Overlay background-->
                            <div
                                class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100"
                            ></div>
                            <!--Overlay content-->
                            <div
                                class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4"
                            >
                                <h5>Bogor</h5>
                                <p class="mb-0 opacity-75">
                                    12 Event
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
                <!--Masonry-Grid-item-->
                <div
                    data-aos="fade-up"
                    class="col-md-4 col-6 mb-4 grid-item"
                >
                    <a
                        href="{{ asset('demo-real-estate-2.html#!') }}"
                        class="position-relative card-hover overflow-hidden card border hover-lift hover-shadow-xl rounded-4 border-0"
                    >
                        <div class="position-relative overflow-hidden">
                            <img
                                src="{{ asset('assets/landing/assan/assets/img/estate/cities/london.jpg') }}"
                                class="img-zoom img-fluid"
                                alt=""
                            />
                            <!--Overlay background-->
                            <div
                                class="bg-gradient-dark opacity-50 position-absolute start-0 top-0 w-100 h-100"
                            ></div>
                            <!--Overlay content-->
                            <div
                                class="position-absolute start-0 text-white d-flex flex-column align-items-center justify-content-end top-0 w-100 h-100 p-2 p-md-4"
                            >
                                <h5>Bali</h5>
                                <p class="mb-0 opacity-75">
                                    17 Event
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
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
</div>
