@php
$newreleases = \App\Models\Post::latest('created_at')->where('status', 'approved')->take(12)->get();
$artikel = \App\Models\Post::latest('created_at')->where('status', 'approved')
->whereHas('category', function($query) {
$query->where('name', 'Artikel');
})->take(12)->get();
$foto = \App\Models\Post::latest('created_at')->where('status', 'approved')
->whereHas('category', function($query) {
$query->where('name', 'Foto');
})->take(12)->get();
$desain = \App\Models\Post::latest('created_at')->where('status', 'approved')
->whereHas('category', function($query) {
$query->where('name', 'Desain');
})->take(12)->get();
$poster = \App\Models\Post::latest('created_at')->where('status', 'approved')
->whereHas('category', function($query) {
$query->where('name', 'Poster');
})->take(12)->get();
$videodanmusik = \App\Models\Post::latest('created_at')->where('status', 'approved')
->whereHas('category', function($query) {
$query->where('name', 'Musik')->where('name', 'Audio')->where('name', 'Video');
})->take(12)->get();
@endphp

{{-- New Releases --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">New Releases</h2>
            </div>
            {{-- <div class="col-sm-5">
                <div class="position-relative d-flex justify-content-md-end align-items-center">
                    <!--Buttons navigation-->
                    <div
                        class="swiper-master-button-prev start-0 swiper-button-prev mt-0 position-relative rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2">
                    </div>
                    <div
                        class="swiper-master-button-next swiper-button-next mt-0 position-relative end-0 rounded-pill width-5x height-5x border border-primary text-primary bg-transparent">
                    </div>
                </div>
            </div> --}}
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.semua_postingan') }}" class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($newreleases->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($newreleases as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    @if($post->category->name == 'Foto' || $post->category->name == 'Poster' || $post->category->name ==
                    'Desain')
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                        <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x1140/'. rand(1,5)  .'.jpg') }}"
                            class="img-fluid img-zoom" alt="..." style="object-fit: cover; height: 320px;">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                            <div class="mb-2">
                                <a href="{{ route('home.category_view', $post->category)}}" class="badge bg-primary">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                            <h5 class="h5 mb-4"><span>{{ Str::limit($post->title, 20, '..') }}</span>
                            </h5>
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                                        alt="author" class="avatar sm rounded-circle me-2">
                                </span>
                                <div class="small">
                                    {{$post->user->name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </div>
                    @else
                    <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                        <div class="overflow-hidden position-relative">
                            <!--Article image-->
                            <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x640/'. rand(1,5)  .'.jpg') }}"
                                alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute start-0 bottom-0 mb-n1" style="color:var(--bs-body-bg)"
                                preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--Content-body-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i>{{
                                $post->created_at->format('d M Y');
                                }}</small>
                            <h5 class="py-3 mb-0">{{ Str::limit($post->title, 20, '..') }}</h5>
                            <p class="mb-0 text-truncate px-lg-4">
                                {!! Str::limit($post->body, 50, '...') !!}
                            </p>
                        </div>

                        <!--Article link-->
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </article>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="row col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END New Releases --}}

{{-- Artikel --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">Artikel menarik</h2>
            </div>
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.category_view', ['category' => 'artikel']) }}"
                    class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($artikel->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($artikel as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                        <div class="overflow-hidden position-relative">
                            <!--Article image-->
                            <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x640/'. rand(1,5)  .'.jpg') }}"
                                alt="" class="img-fluid img-zoom">

                            <!--Article image divider-->
                            <svg class="position-absolute start-0 bottom-0 mb-n1" style="color:var(--bs-body-bg)"
                                preserveAspectRatio="none" width="100%" height="48" viewBox="0 0 1460 120" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M122 22.8261L0 0V120H1460V0L1338 22.8261C1217 44.1304 973 88.2609 730 88.2609C487 88.2609 243 44.1304 122 22.8261Z"
                                    fill="currentColor"></path>
                            </svg>
                        </div>
                        <!--Content-body-->
                        <div class="card-body pb-5 position-relative">
                            <small class="text-body-secondary"><i class="bx bx-calendar-alt me-1"></i>{{
                                $post->created_at->format('d M Y');
                                }}</small>
                            <h5 class="py-3 mb-0">{{ Str::limit($post->title, 20, '..') }}</h5>
                            <p class="mb-0 text-truncate px-lg-4">
                                {!! Str::limit($post->body, 50, '...') !!}
                            </p>
                        </div>

                        <!--Article link-->
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </article>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END Artikel --}}

{{-- Foto --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">Foto & Dokumentasi</h2>
            </div>
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.category_view', ['category' => 'foto']) }}"
                    class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($foto->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($foto as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                        <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x1140/'. rand(1,5)  .'.jpg') }}"
                            class="img-fluid img-zoom" alt="..." style="object-fit: cover; height: 390px;">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                            <div class="mb-2">
                                <a href="{{ route('home.category_view', $post->category)}}" class="badge bg-primary">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                            <h5 class="h3 mb-4"><span>{{ Str::limit($post->title, 20, '..') }}</span>
                            </h5>
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                                        alt="author" class="avatar sm rounded-circle me-2">
                                </span>
                                <div class="small">
                                    {{$post->user->name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="row col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END Foto --}}

{{-- Desain --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">Desain</h2>
            </div>
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.category_view', ['category' => 'desain']) }}"
                    class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($desain->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($desain as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                        <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x1140/'. rand(1,5)  .'.jpg') }}"
                            class="img-fluid img-zoom" alt="..." style="object-fit: cover; height: 390px;">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                            <div class="mb-2">
                                <a href="{{ route('home.category_view', $post->category)}}" class="badge bg-primary">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                            <h5 class="h3 mb-4"><span>{{ Str::limit($post->title, 20, '..') }}</span>
                            </h5>
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                                        alt="author" class="avatar sm rounded-circle me-2">
                                </span>
                                <div class="small">
                                    {{$post->user->name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END Desain --}}

{{-- Poster --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">Poster</h2>
            </div>
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.category_view', ['category' => 'poster']) }}"
                    class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($poster->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($poster as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                        <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x1140/'. rand(1,5)  .'.jpg') }}"
                            class="img-fluid img-zoom" alt="..." style="object-fit: cover; height: 390px;">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                            <div class="mb-2">
                                <a href="{{ route('home.category_view', $post->category)}}" class="badge bg-primary">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                            <h5 class="h3 mb-4"><span>{{ Str::limit($post->title, 20, '..') }}</span>
                            </h5>
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                                        alt="author" class="avatar sm rounded-circle me-2">
                                </span>
                                <div class="small">
                                    {{$post->user->name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="row col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END Poster --}}

{{-- Video dan Musik --}}
<section class="position-relative bg-body overflow-hidden" data-aos="fade-up" data-aos-once='false'>
    <div class="container py-9 py-lg-11 position-relative">
        <div class="row mb-7 align-items-end justify-content-between">
            <div class="col-lg-7 mb-4 mb-lg-0">
                <div class="mb-4" data-aos="fade-up">
                    <!--Subheading-->
                    <h6 class="mb-0 text-uppercase">Blog</h6>
                </div>
                <h2 class="mb-0 display-5" data-aos="fade-right">Video dan Musik</h2>
            </div>
            {{-- <div class="col-sm-5">
                <div class="position-relative d-flex justify-content-md-end align-items-center">
                    <!--Buttons navigation-->
                    <div
                        class="swiper-master-button-prev start-0 swiper-button-prev mt-0 position-relative rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2">
                    </div>
                    <div
                        class="swiper-master-button-next swiper-button-next mt-0 position-relative end-0 rounded-pill width-5x height-5x border border-primary text-primary bg-transparent">
                    </div>
                </div>
            </div> --}}
            <div class="col-12 col-lg-3 text-lg-end" data-aos="fade-left" data-aos-delay="150">
                <a href="{{ route('home.category_view', ['category' => 'video']) }}"
                    class="btn btn-primary btn-hover-arrow hover-lift">
                    <span>Lihat semua</span>
                </a>
            </div>
        </div>
        @if ($videodanmusik->count() > 0)
        <div class="swiper-container data-master overflow-hidden">
            <div class="swiper-master-button-prev swiper-button-prev position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent me-2"
                style="left: -50px">
            </div>
            <div class="swiper-master-button-next swiper-button-next mt-0 position-absolute rounded-pill width-5x height-5x border border-primary text-primary bg-transparent"
                style="right: -50px">
            </div>
            <div class="swiper-wrapper">
                @foreach($videodanmusik as $post)
                <div class="swiper-slide" data-aos="fade-up">
                    <div
                        class="card card-hover hover-lift hover-shadow-lg text-white border-0 overflow-hidden rounded-5">
                        <img src="{{ asset($post->files->first()->file_path ?? 'assets/landing/assan/assets/img/960x1140/'. rand(1,5)  .'.jpg') }}"
                            class="img-fluid img-zoom" alt="..." style="object-fit: cover; height: 390px;">
                        <!--Background-layer-->
                        <div class="position-absolute start-0 top-0 w-100 h-100 bg-gradient-dark"></div>
                        <div
                            class="card-body d-flex flex-column position-absolute start-0 top-0 w-100 h-100 justify-content-end pb-lg-5 px-4">
                            <div class="mb-2">
                                <a href="{{ route('home.category_view', $post->category)}}" class="badge bg-primary">
                                    {{ $post->category->name }}
                                </a>
                            </div>
                            <h5 class="h3 mb-4"><span>{{ Str::limit($post->title, 20, '..') }}</span>
                            </h5>
                            <div class="d-flex align-items-center">
                                <span>
                                    <img src="{{ asset($post->user->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                                        alt="author" class="avatar sm rounded-circle me-2">
                                </span>
                                <div class="small">
                                    {{$post->user->name}}
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post] )}}"
                            class="stretched-link"></a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @else
        <div class="row col-lg-12 mb-4 mb-lg-0" data-aos="fade-up">
            <article class="card card-hover text-center hover-shadow-lg overflow-hidden border-0 rounded-3">
                <div class="card-body pb-5 position-relative">
                    <h5 class="py-3 mb-0">Data masih kosong..</h5>
                    <p class="mb-0 text-truncate px-lg-4">
                        Data masih kosong, nantikan update selanjutnya dari kami.
                    </p>
                </div>

                <!--Article link-->
                <a href="javascript:void(0)" class="stretched-link"></a>
            </article>
        </div>
        @endif
    </div>
</section>
{{-- END Video dan Musik --}}