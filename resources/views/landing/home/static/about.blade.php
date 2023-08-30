@extends('landing.layouts.template')
@section('content')
@php
   $artikelCount = \App\Models\Post::where('status', 'approved')->whereHas('category', function($query) {
      return $query->where('name', 'Artikel');
   })->count();
   
   $fotoPosterDesainCount = \App\Models\Post::where('status', 'approved')->whereHas('category', function($query) {
      return $query->where('name', 'Foto')->where('name', 'Poster')->where('name', 'Desain');
   })->count();
   
   $videoAudioMusikCount = \App\Models\Post::where('status', 'approved')->whereHas('category', function($query) {
      return $query->where('name', 'Video')->where('name', 'Audio')->where('name', 'Musik');
   })->count();
@endphp
<section class="position-relative overflow-hidden" id="rean">
   <div class="container py-9 py-lg-11">
      <div class="row align-items-center">
         <div class="col-lg-6 mb-5 mb-lg-0">
            <h6 class="pb-2 border-bottom mb-3" data-aos="fade-right" data-aos-duration="700">
               Sejarah </h6>
            <h1 class="display-4 mb-4" data-aos="fade-left" data-aos-delay="100" data-aos-duration="700">
               Rumah Edukasi <span class="d-block text-primary">
                  Anti Narkoba
               </span>
            </h1>
            <p class="mb-5 w-lg-75 text-secondary" data-aos="fade-right" data-aos-delay="150" data-aos-duration="700">
               Dalam program Rumah edukasi anti narkoba mencangkup 3 hal yaitu <strong>Media Informasi</strong>, <strong>Media Edukasi</strong> dan <strong>Sumber
                  Informasi dan Edukasi</strong>. ke 3 hal tersebut memiliki fokus yang berbeda-beda. <strong>Media informasi</strong> untuk remaja
               indonesia berjejaring, belajar, berbagi cerita dan inspirasi. Sedangkan untuk <strong>Media edukasi</strong> untuk remaja
               indonesia yang mampu mengekspresikan karya, menggali potensi, membangun kepercayaan diri guna memperkuat
               citra remaja dan untuk <strong>Sumber Informasi dan Edukasi</strong> di fokuskan untuk remaja yang membuat konten yang
               berliterasi dibidang pencegahan narkoba.
            </p>
         </div>
         <div class="col-lg-6 ms-auto position-relative">
            <div class="rellax position-absolute top-0 mt-n3 end-0 width-16x h-auto" data-rellax-speed="-1"
               data-rellax-percentage=".9">
               <img src="{{ asset('assets/landing/assan/assets/img/vectors/line2.svg') }}" data-inject-svg
                  class=" fill-success w-100 h-auto" alt="">
            </div>
            <div class="position-relative ps-9 ps-lg-12 pb-9 pb-lg-12 pe-5 pt-5" data-aos="fade-right"
               data-aos-delay="200" data-aos-duration="700">
               <img src="{{ asset('assets/img/about/1.png') }}" alt=""
                  class="img-fluid rounded-4 shadow-lg position-relative">
               <img src="{{ asset('assets/img/about/2.png') }}" alt=""
                  class="img-fluid position-absolute rounded-4 shadow-lg bottom-0 start-0 w-lg-60 w-50">
            </div>
         </div>
      </div>
   </div>
</section>
<section class="position-relative border-top border-bottom">
   <div class="container py-9 py-lg-11">
       <div class="row" data-aos='fade-up'>
           <div class="col-md-4 mb-5 mb-md-0">
               <h6 class="fst-italic font-serif">Artikel</h6>
               <h5 class="mb-3">
                   <span data-countup='{"startVal": 0,"suffix":"+"}' data-to="{{$artikelCount}}" data-aos=""
                       data-aos-id="countup:in" class="display-4 text-primary"></span>
               </h5>
               <p class="mb-0">
                   Beberapa karya <strong>Kreatif</strong> berupa artikel tersedia di komunitas kami.
               </p>
           </div>
           <div class="col-md-4 mb-5 mb-md-0">
               <h6 class="fst-italic font-serif">Poster Desain</h6>
               <h5 class="mb-3">
                   <span data-countup='{"startVal": 0,"suffix":"+"}' data-to="{{ $fotoPosterDesainCount }}" data-aos=""
                   data-aos-id="countup:in" class="display-4 text-primary"></span>
               </h5>
               <p class="mb-0">
                   Karya berupa foto <strong>Poster</strong> juga <strong>Desain</strong> yang menginsiprasi juga tersedia di komunitas kami.
               </p>
           </div>
           <div class="col-md-4 mb-5 mb-md-0">
               <h6 class="fst-italic font-serif">Video Musik</h6>
               <h5 class="mb-3">
                   <span data-countup='{"startVal": 0,"suffix":"+"}' data-to="{{ $videoAudioMusikCount }}" data-aos=""
                       data-aos-id="countup:in" class="display-4 text-primary"></span>
               </h5>
               <p class="mb-0">
                  Karya berupa hiburan seperti <strong>Video</strong> dan <strong>Musik</strong> yang menghibur dan mengedukasi juga tersedia di komunitas kami.
               </p>
           </div>
       </div>
   </div>
   </div>
</section>
<section class="position-relative overflow-hidden" id="visimisi">
   <div class="container py-9 py-lg-11">
      <div class="row align-items-center">
         <div class="col-lg-6 mb-5 mb-lg-0 ">
            <div class="rellax position-absolute top-0 mt-n3 end-0 width-16x h-auto" data-rellax-speed="-1"
               data-rellax-percentage=".9">
               <img src="{{ asset('assan/line.svg') }}" data-inject-svg
                  class=" fill-success w-100 h-auto" alt="">
            </div>
            <div class="position-relative pb-9 pb-lg-12 pt-5" data-aos="fade-right"
               data-aos-delay="200" data-aos-duration="700">
               <img src="{{ asset('assets/img/about/3.png') }}" alt=""
                  class="img-fluid rounded-4 position-relative">
            </div>
         </div>
         <div class="col-lg-6 ms-auto position-relative">
            <h6 class="pb-2 border-bottom mb-3" data-aos="fade-right" data-aos-duration="700">
               Motivasi </h6>
            <h1 class="display-4 mb-4" data-aos="fade-left" data-aos-delay="100" data-aos-duration="700">
               Visi dan <span class="text-primary">
                  Misi
               </span>
            </h1>
            <p class="mb-5 w-lg-75 text-secondary" data-aos="fade-right" data-aos-delay="150" data-aos-duration="700">
               Melibatkan remaja <strong>(Generasi Milenial)</strong> sebagai aktor utama dalam setiap kegiatan. Mengunggah seluruh
               aktivitas <strong>Drug Free Exhibition Day</strong> dan hasil karyanya dalam Rumah Edukasi Narkoba.
               Menyediakan ruang bagi remaja untuk mengakses informasi dan edukasi bidang pencegahan melalui
               konten-konten dan literatur digital dalam halaman Rumah Edukasi Anti Narkoba.
            </p>
         </div>
      </div>
   </div>
</section>
<section class="position-relative bg-success bg-opacity-10 overflow-hidden" data-aos='fade-up'>
   <!--Divider shape-->
   <svg class="position-absolute start-0 bottom-0 w-100" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="1200"
       height="80" viewBox="0 0 1200 167" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" clip-rule="evenodd"
           d="M1200 39.6228L1133 26.8851C1067 14.1473 933 -11.3281 800 5.65554C667 22.6392 533 82.0819 400 99.0655C267 116.049 133 90.5737 67 77.836L0 65.0982V167H67C133 167 267 167 400 167C533 167 667 167 800 167C933 167 1067 167 1133 167H1200V39.6228Z"
           fill="currentColor" />
   </svg>
   <!--Divider shape-top-->
   <svg class="position-absolute start-0 flip-y top-0 w-100" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="1200"
       height="80" viewBox="0 0 1200 167" fill="none" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" clip-rule="evenodd"
           d="M1200 39.6228L1133 26.8851C1067 14.1473 933 -11.3281 800 5.65554C667 22.6392 533 82.0819 400 99.0655C267 116.049 133 90.5737 67 77.836L0 65.0982V167H67C133 167 267 167 400 167C533 167 667 167 800 167C933 167 1067 167 1133 167H1200V39.6228Z"
           fill="currentColor" />
   </svg>
   <div class="container position-relative">
       <div class="position-relative">
           <div class="row py-9">
               <div class="col-lg-10 col-xl-8 py-9 offset-lg-1 position-relative z-1">
                   <figure class="mb-0 position-relative">
                       <div class="position-relative">
                           <!--Avatar Image-->
                           <img class="position-relative avatar xl rounded-circle shadow"
                               src="{{ asset('assets/img/avatar/avatar-5.png') }}" alt="">
                       </div>
                       <div class="pt-4">
                           <blockquote>
                               <h2 class="display-6 font-serif mb-5 mb-lg-7">
                                   " Mari Berprestasi tanpa Ekstasi Mari Berkreasi tanpa Halusinasi.
                                   "
                               </h2>
                           </blockquote>
                           <figcaption>
                               <h6 class="mb-1">
                                   Sun Tzu
                               </h6>
                               <span class="text-body-secondary small">
                                   Art of Life
                               </span>
                           </figcaption>
                       </div>
                   </figure>
               </div>
           </div>
       </div>
   </div>
</section>
<section class="position-relative overflow-hidden border-bottom" id="tujuan">
   <div class="container py-9 py-lg-11">
      <div class="row align-items-center">
         <div class="col-lg-6 mb-5 mb-lg-0">
            <h6 class="pb-2 border-bottom mb-3" data-aos="fade-right" data-aos-duration="700">
               Tujuan </h6>
            <h1 class="display-4 mb-4" data-aos="fade-left" data-aos-delay="100" data-aos-duration="700">
               Tujuan Rumah Edukasi <span class="d-block text-primary">
                  Anti Narkoba
               </span>
            </h1>
            <p class="mb-5 w-lg-75 text-secondary" data-aos="fade-right" data-aos-delay="150" data-aos-duration="700">
               Terjalin hubungan <strong>“KITABISACEGAH”</strong> dengan remaja yang terlibat langsung dalam proses produksi konten pencegahan <strong>(Co-Produce)</strong>. Tersedianya media bagi remaja untuk berekspresi dalam pencegahan narkoba (Co-Creator). Terbentuk jati diri remaja sebagai role model pencegahan narkoba <strong>(Co-Brand)</strong>.
               Terbangunnya literasi informasi dan edukasi pencegahan narkoba bagi remaja <strong>(Co-Respon)</strong>.
            </p>
         </div>
         <div class="col-lg-6 ms-auto position-relative">
            <div class="rellax position-absolute top-0 mt-n3 end-0 width-16x h-auto" data-rellax-speed="-1"
               data-rellax-percentage=".9">
               <img src="{{ asset('assets/landing/assan/assets/img/graphics/icons/magic-wand.svg') }}" data-inject-svg
                  class=" fill-success w-100 h-auto" alt="">
            </div>
            <div class="position-relative ps-9 ps-lg-12 pb-9 pb-lg-12 pe-5 pt-5" data-aos="fade-right"
               data-aos-delay="200" data-aos-duration="700">
               <img src="{{ asset('assets/img/about/4.png') }}" alt=""
                  class="img-fluid rounded-4 position-relative">
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('hero')
<section class="position-relative bg-gradient-primary text-white">
   <div class="container pt-12 pb-9 pb-lg-12 position-relative z-2">
      <div class="row pb-7 pt-lg-9 align-items-center">
         <div class="col-12 col-lg-7 mb-5 mb-lg-0">
            <ol class="breadcrumb mb-3">
               <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
               <li class="breadcrumb-item active fw-bold" aria-current="page">About Us</li>
            </ol>
            <h1 class="display-2 mb-3">
               Ini cerita tentang aku
            </h1>
            <p class="mb-0 lead pe-lg-8">Sejarah detail serta visi misi dari Kami.</p>
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
                113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5">
      </path>
      <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
            112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path>
   </svg>
</section>
@endsection
@section('header-class', 'navbar-link-white')