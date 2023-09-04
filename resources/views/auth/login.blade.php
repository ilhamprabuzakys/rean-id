@extends('auth.auth')
@section('bg-img')
<img alt="mask"
   src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/auth-basic-login-mask-light.png') }}"
   class="authentication-image d-none d-lg-block" data-app-light-img="illustrations/auth-basic-login-mask-light.png"
   data-app-dark-img="illustrations/auth-basic-login-mask-dark.html" />
@endsection
@section('header')
<h4 class="mb-2 fw-semibold">Selamat datang di {{ config('app.name') }}!</h4>
<p class="mb-4">Silahkan masuk menggunakan akun anda dan sebarkan karya anda!</p>
@endsection
@section('content')
<livewire:auth.login />

<p class="text-center">
   <span>Baru disini?</span>
   <a href="{{ route('register') }}">
      <span>Buat akun dulu</span>
   </a>
</p>
<div class="divider mt-3 mb-2">
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
    const formElement = document.querySelector("#loginForm");
    formElement.addEventListener("submit", () => {
        Swal.fire({
            title: 'Sedang Diproses',
            html: 'Mencoba untuk login...',
            timer: 5000,
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