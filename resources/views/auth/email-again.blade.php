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
      id="formAuthentication"
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
      <button class="btn btn-primary d-grid w-100" type="submit">
         Kirim
      </button>
   </form>
   <div class="text-center">
      <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
         <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i> Kembali ke login
      </a>
   </div>
@endsection
{{-- @section('auth-content')
   <div class="text-center">
      <h5 class="mb-0">Email for Verification</h5>
      <p class="text-muted mt-2">Masukkan email anda kembali untuk verifikasi.</p>
   </div>
   @include('auth.session')

   <form class="mt-4 pt-2" action="{{ route('register.email-again.authenticate', $user) }}" method="post">
      @csrf
      <div class="form-floating form-floating-custom mb-4">
         <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" type="email" placeholder="Enter Email" required name="email" value="{{ old('email') }}">
         @error('email')
            <div class="invalid-feedback">
               {{ $errors->first('email') }}
            </div>
         @enderror
         <label for="input-email">Email</label>
         <div class="form-floating-icon">
            <i data-eva="email-outline"></i>
         </div>

      </div>
      <div class="mb-3">
         <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Submit</button>
      </div>
   </form>

   <div class="mt-4 pt-3 text-center">
      <p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Login </a> </p>
   </div>
@endsection --}}
