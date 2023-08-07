@extends('dashboard.template.error')
@section('title')
   404 Not Found
@endsection
@section('content')
   <h1 class="error-title"> <span class="blink-infinite">404</span></h1>
   <h4 class="text-uppercase text-light">Halaman yang anda tuju tidak ditemukan</h4>
   <p class="font-size-15 mx-auto text-primary w-100 mt-3">"{{ request()->url() }}"</p>
   <p class="font-size-15 mx-auto text-light w-100 mt-0">Halaman yang anda kunjungi tidak ada atau mungkin sudah dihapus.</p>
@endsection
