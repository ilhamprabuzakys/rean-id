@extends('landing.layouts.template')
@section('content')
   @php
      $company = \App\Models\Company::first();
   @endphp
   <section class="position-relative">
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
               <div class="px-4 py-7 px-lg-5 py-lg-7 border border-2 rounded-3 position-relative"
                  data-aos="fade-up">
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
   <section class="position-relative bg-gradient-tint">
      <!--divider-->
      <svg class="position-absolute start-0 bottom-0 flip-y" style="color: var(--bs-body-bg);" width="100%" height="64" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 152" fill="none"
         preserveAspectRatio="none">
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
               <p class="mb-0 lead pe-lg-8">Jika kamu memiliki pertanyaan untuk kami? Silahkan gunakan Contact Form dibawah ini untuk menghubungi kami.</p>
            </div>
         </div>
         <!--/.row-->
      </div>
      <!--/.content-->
   </section>
@endsection
@section('navbar')
   <img src="{{ asset('assets/img/rean-text-logo-dark.png') }}" alt="" style="height: 30px;
   width: 140px;">
@endsection
