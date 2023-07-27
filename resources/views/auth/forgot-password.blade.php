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
   <h4 class="mb-2">Lupa Password</h4>
   <p class="mb-4">
      Masukkan email anda untuk dikirim link reset password.
   </p>
@endsection
@section('content')
   <form
      id="formAuthentication"
      class="mb-3"
      action="{{ route('password.email') }}"
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
      <button class="btn btn-primary d-grid w-100" type="submit">
         Kirim
      </button>
   </form>
   <div class="text-center">
      <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
         <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i> Sudah ingat password? Kembali ke login
      </a>
   </div>
@endsection

