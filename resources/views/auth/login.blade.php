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
<livewire:auth.login />

<p class="text-center">
   <span>Baru disini?</span>
   <a href="{{ route('register') }}">
      <span>Buat akun dulu</span>
   </a>
</p>
@include('auth.partials.3rd')
@endsection
