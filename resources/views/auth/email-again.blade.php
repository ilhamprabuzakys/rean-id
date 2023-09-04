@extends('auth.auth')
@section('bg-img')
   <img
      alt="mask"
      src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/auth-basic-forgot-password-mask-light.png') }}"
      class="authentication-image d-none d-lg-block"
      data-app-light-img="illustrations/auth-basic-forgot-password-mask-light.png"
      data-app-dark-img="illustrations/auth-basic-forgot-password-mask-dark.html" />
@endsection
@section('header')
   <h4 class="mb-2">Email untuk verifikasi</h4>
   <p class="mb-4">
      Masukkan email anda untuk verifikasi.
   </p>
@endsection
@section('content')
   <form
      id="emailAgain"
      class="mb-3"
      action="{{ route('register.email-again.authenticate', $user) }}"
      method="POST">
      @csrf
      <div
         class="form-floating form-floating-outline mb-3">
         <input
            type="text"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            name="email"
            placeholder="Masukkan email anda"
            value="{{ old('email') }}"
            required
            autofocus />
         <label>Email</label>
         @error('email')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror
      </div>
      <button class="btn btn-primary d-grid w-100">
         Kirim
      </button>
   </form>
   <div class="text-center">
      <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
         <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i> Kembali ke login
      </a>
   </div>
@endsection
@push('scripts')
<script>
   document.addEventListener("DOMContentLoaded", () => {
    const formElement = document.querySelector("#emailAgain");
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