@extends('landing.layouts.template')
@section('content')
@php
$company = \App\Models\Company::first();
@endphp
<section class="position-relative" id="contact-us"> 
   <div class="container py-9 py-lg-11">
      <div class="row">
         <div class="col-md-8 col-lg-7 mb-7 mb-md-0 me-auto">
            <div class="position-relative">
               <h2>
                  Contact Us
               </h2>
               <p class="mb-3 w-lg-75">
                  Kirim semua pesan yang kamu inginkan. Setiap pesan yang kamu kirimkan akan kami tindak lanjuti:
               </p>
               <div class="width-7x pt-1 bg-primary mb-5"></div>
               <!-- Contacts Form -->
               <livewire:landing.contact-form />
               <!-- End Contacts Form -->
            </div>
         </div>
         <div class="col-md-4">
            <div data-aos="fade-up">
               <h4 class="mb-0">Alamat Kami</h4>
               <div class="border-top border-2 border-secondary mb-4 mt-2" data-aos="fade-up"></div>
            </div>
            <div data-aos="fade-up">
               <h5>Indonesia</h5>
               <div class="position-relative">
                  <p><strong>{{ $company->province }} </strong><br>
                     {{ $company->address }}
                  </p>
                  <p>Telepon: {{ $company->formattedPhone }}<br>
                     Email: {{ $company->email }}
                  </p>
               </div>
            </div>
         </div>

         <div class="col-md-12 mt-3">
            <div class="px-4 py-7 px-lg-5 py-lg-7 border border-2 rounded-3 position-relative" data-aos="fade-up">
               <div class="position-relative">

                  <h3 class="mb-4">Ingin bergabung dengan kami?</h3>
                  <p class="w-lg-90 mb-5 lead">
                     Jika anda ingin menjadi bagian dari komunitas ini, silahkan klik tombol Bergabung dibawah ini.
                  </p>
                  <div class="width-6x pt-1 bg-success mb-5"></div>
                  <a href="{{ route('login') }}" class="btn btn-outline-primary btn-rise">
                     <div class="btn-rise-bg bg-primary"></div>
                     <div class="btn-rise-text">
                        Bergabung
                     </div>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
@endsection
@section('hero')
{{-- <section class="position-relative bg-gradient-tint">
   <!--divider-->
   <svg class="position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-body-bg);" width="100%" height="64"
      xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none" preserveAspectRatio="none">
      <path
         d="M126.597 138.74C99.8867 127.36 76.6479 109.164 59.2161 85.9798L0 3.05176e-05L1440 0C1440 0 1419.98 25.8404 1380.15 32.9584L211.382 150.811C182.549 154.283 153.308 150.12 126.597 138.74Z"
         fill="currentColor" />
   </svg>
   <div class="container position-relative pt-12 pb-9">
      <div class="row align-items-center pb-8 pt-lg-9">
         <div class="col-md-10 col-lg-8">
            <h1 class="display-2 mb-3">
               Kirim pesan untuk kami
            </h1>
            <p class="mb-0 lead pe-lg-8">Jika kamu memiliki pertanyaan untuk kami? Silahkan gunakan Contact Form dibawah
               ini untuk menghubungi kami.</p>
         </div>
      </div>
      <!--/.row-->
   </div>
   <!--/.content-->
</section> --}}
<section class="position-relative bg-gradient-primary text-white">
   <div class="container pt-12 pb-9 pb-lg-12 position-relative z-2">
      <div class="row pb-7 pt-lg-9 align-items-center">
         <div class="col-12 col-lg-7 mb-5 mb-lg-0">
            <ol class="breadcrumb mb-3">
               <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
               <li class="breadcrumb-item active fw-bold" aria-current="page">Contact Us</li>
            </ol>
            <h1 class="display-2 mb-3">
               Kirim pesan untuk kami
            </h1>
            <p class="mb-0 lead pe-lg-8">Jika kamu memiliki pertanyaan untuk kami? Silahkan gunakan Contact Form dibawah
               ini untuk menghubungi kami.</p>
         </div>
         <!--/.col-->
         <div class="col-lg-4 ms-auto">
            <div class="text-lg-end">
               <a href="#contact-us"
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
                113.28 22.88 168.9 38.84 30.2 8.66 59 6.17 87.09-7.5 22.43-10.89 48-26.93 60.65-49.24V0z" opacity=".5">
      </path>
      <path d="M0 0v5.63C149.93 59 314.09 71.32 475.83 42.57c43-7.64 84.23-20.12 127.61-26.46 59-8.63
            112.48 12.24 165.56 35.4C827.93 77.22 886 95.24 951.2 90c86.53-7 172.46-45.71 248.8-84.81V0z"></path>
   </svg>
</section>
@endsection
@section('header-class', 'navbar-link-white')
