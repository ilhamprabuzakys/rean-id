@extends('auth.auth')
@section('custom-width', 'w-550px')
@section('bg-img')
<img alt="mask"
   src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/auth-basic-register-mask-light.png') }}"
   class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-register-mask-light.png"
   data-app-dark-img="illustrations/auth-basic-register-mask-dark.html" />
@endsection
@section('header')
<h4 class="mb-2 fw-semibold">{{ __('Mulai dan bergabung dengan kami!') }}</h4>
<p class="mb-4">{{ __('Daftarkan akun anda dan mulai berkarya dengan kami!') }}!</p>
@endsection
@section('content')
<form id="formAuthentication" class="mb-3" action="{{ route('register.authenticate') }}" method="POST">
   @csrf
   <div class="form-floating form-floating-outline mb-3">
      <input required type="text" class="form-control @error('name') is-invalid @enderror" id="name" autocomplete="on"
         name="name" value="{{ old('name') }}" required autofocus />
      <label for="name">Nama</label>
   </div>
   <div class="form-floating form-floating-outline mb-3">
      <input required type="text" class="form-control" id="username" name="username" placeholder="Masukkan username anda"
         value="{{ old('username') }}" required />
      <label for="username">Username</label>
      @error('username')
      <div class="invalid-feedback">
         {{ $message }}
      </div>
      @enderror
   </div>
   <div class="form-floating form-floating-outline mb-3">
      <input required type="email" class="form-control @error('email') is-invalid @enderror" id="email"
         name="email" value="{{ old('email') }}" placeholder="Masukkan email anda" required />
      <label for="email">Email<sup class="text-danger">*</sup></label>
      @error('email')
      <div class="invalid-feedback">
         {{ $message }}
      </div>
      @enderror
   </div>
   {{-- <input required type="hidden" name="username" value="username"> --}}
   <div class="mb-3 form-password-toggle">
      <div class="input-group input-group-merge">
         <div class="form-floating form-floating-outline">
            <input required type="password" id="input-password" class="form-control @error('password') is-invalid @enderror"
               name="password" value="{{ old('password') }}"
               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
               aria-describedby="password" required />
            <label for="password">Password<sup class="text-danger">*</sup></label>
            @error('password')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>
         <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
      </div>
   </div>
   <div class="mb-3 form-password-toggle">
      <div class="input-group input-group-merge">
         <div class="form-floating form-floating-outline">
            <input required type="password" id="input-password_confirmation"
               class="form-control @error('password') is-invalid @enderror" name="password_confirmation"
               value="{{ old('password_confirmation') }}"
               placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
               aria-describedby="password_confirmation" required />
            <label for="password">Konfirmasi Password<sup class="text-danger">*</sup></label>
            @error('password_confirmation')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>
         <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
      </div>
   </div>
   <div class="mb-3">
      <div class="form-check">
         <input required class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
         <label class="form-check-label" for="terms-conditions">
            Saya setuju terhadap
            <a href="javascript:void(0);">Kebijakan dan aturan</a>
         </label>
      </div>
   </div>
   <button class="btn btn-primary d-grid w-100">
      Daftar akun
   </button>
</form>

<p class="text-center">
   <span>Sudah memiliki akun?</span>
   <a href="{{ route('login') }}">
      <span>Masuk disini</span>
   </a>
</p>

<div class="divider my-4">
   <div class="divider-text">atau</div>
</div>

<div class="d-flex justify-content-center gap-2">
   <a onclick='return googleLogin()' class="btn-outline-secondary btn w-100" data-bs-toggle="tooltip" data-bs-placement="right" title="Langsung bergabung dengan REAN hanya dengan menggunakan akun google anda">
      {{-- <i class="tf-icons mdi mdi-24px mdi-google me-2"></i> --}}
      <span class="ceaed94f7 cb1a65fd9 me-2 google-icon"></span>
      <span class="">Lanjutkan dengan google</span>
   </a>
</div>
@endsection
@push('scripts')
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const formElement = document.querySelector("#formAuthentication");
    formElement.addEventListener("submit", () => {
        Swal.fire({
            title: 'Sedang Diproses',
            html: 'Mengirim email verifikasi ke email yang anda masukkan..',
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