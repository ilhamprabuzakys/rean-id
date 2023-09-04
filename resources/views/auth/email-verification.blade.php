@extends('auth.auth')
@section('bg-img')
   <img alt="mask" src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/auth-basic-register-mask-light.png') }}" class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-register-mask-light.png" data-app-dark-img="illustrations/auth-basic-register-mask-dark.html" />
@endsection
@push('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/pages-auth-two-steps.js') }}"></script>
@endpush
@section('header')
   <h4 class="mb-2 fw-semibold">
      Verifikasi Email
   </h4>
   <p class="text-start mb-4">
      Kami telah mengirim kode verifikasi ke email anda.
      Masukkan kode tersebut untuk menyelesaikan tahap ini.
      {{-- <span class="fw-bold d-block mt-2">il*****s@gmail.com</span> --}}
   </p>
@endsection
@section('content')
   <form
      id="twoStepsForm"
      action="{{ route('register.verification_authenticate', $temp_user) }}"
      method="POST">
      @csrf
      <div class="mb-3">
         <div
            class="auth-input-wrapper d-flex align-items-center justify-content-sm-between numeral-mask-wrapper">
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1"
               autofocus />
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1" />
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1" />
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1" />
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1" />
            <input
               type="text"
               class="form-control auth-input w-px-50 text-center numeral-mask text-center h-px-50 mx-1 my-2"
               maxlength="1" />
            @error('verification_code')
               <div class="invalid-feedback">
                  {{ $errors->first('verification_code') }}
               </div>
            @enderror
         </div>
         <!-- Create a hidden field which is combined by 3 fields above -->
         <input type="hidden" name="verification_code" />
      </div>
      <button
         class="btn btn-primary d-grid w-100 mb-3">
         Kirim
      </button>
      <div class="text-center">
         <span class="d-inline-block">Tidak mendapatkan kode?</span>
         <a id="kirim-ulang-email" href="{{ route('register.code_verification', ['user' => $temp_user, 'resend' => 'true']) }}"> Kirim Ulang </a>
         {{-- <a href="{{ route('register.again_code_verification', $temp_user) }}"> Kirim Ulang </a> --}}
         {{-- <button class="resend-link" data-user="{{ $temp_user->id }}"> Kirim Ulang </button> --}}
         <span class="d-inline-block">Salah memasukkan email?</span>
         <a href="{{ route('register.email-again', $temp_user) }}"> Ganti email </a>
      </div>
   </form>
@endsection
@section('auth-content')
   <div class="text-center">
      <h5 class="mb-0">Verify your email</h5>
      <p class="text-muted mt-2">Untuk menggunakan aplikasi ini, tolong verifikasi email mu.</p>
   </div>
   @include('auth.session')

   <form class="mt-4 pt-2" action="{{ route('register.verification_authenticate', $temp_user) }}" method="post">
      @csrf
      <div class="form-floating form-floating-custom mb-4">
         <input type="number" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" placeholder="Enter Verifiction Code" required name="verification_code"
            value="{{ old('verification_code') }}">
         @error('verification_code')
            <div class="invalid-feedback">
               {{ $errors->first('verification_code') }}
            </div>
         @enderror
         <label for="input-email">Verification Code</label>
         <div class="form-floating-icon">
            <i data-eva="email-outline"></i>
         </div>

      </div>
      <div class="mb-3">
         <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Submit</button>
      </div>
   </form>

   <div class="mt-4 pt-3 text-center">
      <p class="text-muted mb-0">Salah memasukkan email? <a href="{{ route('register.email-again', $temp_user) }}" class="text-primary fw-semibold"> Klik disini </a> </p>
   </div>
@endsection
@push('scripts')
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const kirimUlang = document.querySelector("#kirim-ulang-email");
    kirimUlang.addEventListener("click", () => {
        Swal.fire({
            title: 'Sedang Diproses',
            html: 'Mengirim ulang email..',
            timer: 12000,
            timerProgressBar: true,
            allowOutsideClick: false,
            didOpen: () => {
                Swal.showLoading();
            }
        }).then((result) => {
            if (result.dismiss === Swal.DismissReason.timer) {
               //  console.log('Modal ditutup oleh timer');
            }
        });
    });
});
</script>
@endpush