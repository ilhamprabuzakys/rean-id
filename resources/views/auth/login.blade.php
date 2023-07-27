@extends('auth.auth')
@section('bg-img')
<img alt="mask" src="{{ asset('assets/dashboard/materialize/assets/img/illustrations/auth-basic-login-mask-light.png') }}" class="authentication-image d-none d-lg-block"
data-app-light-img="illustrations/auth-basic-login-mask-light.png" data-app-dark-img="illustrations/auth-basic-login-mask-dark.html" />
@endsection
@section('header')
<h4 class="mb-2 fw-semibold">Selamat datang di {{ config('app.name') }}!</h4>
<p class="mb-4">Silahkan masuk menggunakan akun anda dan sebarkan karya anda!</p>
@endsection
@section('content')
<form id="formAuthentication" class="mb-3"  action="{{ route('login.authenticate') }}" method="post">
   @csrf
   <div class="form-floating form-floating-outline mb-3">
      <input type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }} @error('login') is-invalid @enderror" id="input-username" name="login" value="{{ old('username') ?: old('email') }}" placeholder="Masukkan email atau username anda" autofocus>
      <label for="email">Email atau Username</label>
      @if ($errors->has('username') || $errors->has('email'))
            <div class="invalid-feedback">
               {{ $errors->first('username') ?: $errors->first('email') }}
            </div>
         @endif
         @error('login')
            <div class="invalid-feedback">
               {{ $errors->first('login') }}
            </div>
         @enderror
   </div>
   <div class="mb-3">
      <div class="form-password-toggle">
         <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
               <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" autocomplete="on" name="password"
               value="{{ old('password') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
               <label for="password">Password</label>
               @error('password')
                  <div class="invalid-feedback">
                     {{ $errors->first('password') }}
                  </div>
               @enderror
            </div>
            <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
         </div>
      </div>
   </div>
   <div class="mb-3 d-flex justify-content-between">
      <div class="form-check">
         <input class="form-check-input" type="checkbox" id="remember-me" name="remember" value="true">
         <label class="form-check-label" for="remember-me">
            Ingat saya
         </label>
      </div>
      <a href="{{ route('password.request') }}" class="float-end mb-1">
         <span>Lupa Password?</span>
      </a>
   </div>
   <div class="mb-3">
      <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
   </div>
</form>
<p class="text-center">
   <span>Baru disini?</span>
   <a href="{{ route('register') }}">
      <span>Buat akun dulu</span>
   </a>
</p>
@include('auth.partials.3rd')
@endsection
