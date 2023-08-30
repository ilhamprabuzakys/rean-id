<section class="position-relative bg-primary text-white pb-10 overflow-hidden">
    <!--begin: Divider shape-->
    <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg); transform: rotate(180deg);" width="100%" height="28"
        preserveAspectRatio="none" viewBox="0 0 1284 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M0 0L31.03 14.5833C60.99 29.1667 121.98 58.3333 182.97 62.5C245.03 66.6667 306.02 45.8333 367.01 35.4167C428 25 488.99 25 549.98 37.5C610.97 50 673.03 75 734.02 70.8333C795.01 66.6667 856 33.3333 916.99 31.25C977.98 29.1667 1038.97 58.3333 1101.03 75C1162.02 91.6667 1223.01 95.8333 1252.97 97.9167L1284 100V0H1252.97C1223.01 0 1162.02 0 1101.03 0C1038.97 0 977.98 0 916.99 0C856 0 795.01 0 734.02 0C673.03 0 610.97 0 549.98 0C488.99 0 428 0 367.01 0C306.02 0 245.03 0 182.97 0C121.98 0 60.99 0 31.03 0H0Z"
            fill="currentColor"></path>
    </svg>
    {{-- <svg class="position-absolute start-0 top-0" style="color: var(--bs-body-bg);" width="100%" height="28"
        preserveAspectRatio="none" viewBox="0 0 1284 100" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M0 0L31.03 14.5833C60.99 29.1667 121.98 58.3333 182.97 62.5C245.03 66.6667 306.02 45.8333 367.01 35.4167C428 25 488.99 25 549.98 37.5C610.97 50 673.03 75 734.02 70.8333C795.01 66.6667 856 33.3333 916.99 31.25C977.98 29.1667 1038.97 58.3333 1101.03 75C1162.02 91.6667 1223.01 95.8333 1252.97 97.9167L1284 100V0H1252.97C1223.01 0 1162.02 0 1101.03 0C1038.97 0 977.98 0 916.99 0C856 0 795.01 0 734.02 0C673.03 0 610.97 0 549.98 0C488.99 0 428 0 367.01 0C306.02 0 245.03 0 182.97 0C121.98 0 60.99 0 31.03 0H0Z"
            fill="currentColor"></path>
    </svg> --}}
    <!--end: Divider shape-->

    <div class="container py-9 py-lg-11 position-relative">
        <div class="row pt-7">
            <div class="col-lg-4 mb-5 mb-lg-0">
                <!--Subtitle-->
                <h6 class="mb-3 text-body-white">Hiburan</h6>

                <!--title-->
                <h2 class="display-4 mb-0" data-aos="fade-left" data-aos-duration="400">
                    Event saat ini.
                </h2>
            </div>
            <div class="col-8" data-aos="fade-right">
                <div class="position-relative d-flex justify-content-md-end align-items-center mb-3">
                    <!--Buttons navigation-->
                    <div
                        class="swiper3-button-prev start-0 swiper-button-prev mt-0 position-relative rounded-pill width-5x height-5x border border-primary text-primary bg-white me-2">
                    </div>
                    <div
                        class="swiper3-button-next swiper-button-next mt-0 position-relative end-0 rounded-pill width-5x height-5x border border-primary text-primary bg-white">
                    </div>
                </div>
                <!--Testimonial card-->
                <div class="swiper-container event-saat-ini overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($events as $event)
                        <div class="swiper-slide">

                            <!--Article-->
                            <article class="card-hover position-relative d-flex justify-content-end">
                                <div class="row bg-white rounded">
                                    <div class="col-lg-5">
                                        <div class="d-block rounded-5 overflow-hidden">
                                            <img src="{{ asset($event->files->first()->file_path) }}" alt=""
                                                class="img-fluid position-relative" style="height: 300px; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 p-3">
                                        <h4 class="text-dark">{{ $event->title }}</h4>
                                    </div>
                                    <a href="{{ route('home.events.show', $event) }}" class="stretched-link"></a>
                                </div>
                            </article>
                        </div>
                        @empty
                            <h4>Tidak ada event yang berlangsung</h4>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>