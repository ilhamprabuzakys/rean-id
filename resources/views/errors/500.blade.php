@extends('dashboard.template.error')
@section('title')
   500 Internal Server Error
@endsection
@section('content')
   <h1 class="error-title"> <span class="blink-infinite">500</span></h1>
   <h4 class="text-uppercase">Internal Server Error</h4>
   <p class="font-size-15 mx-auto text-muted w-50 mt-3">Cek kembali jaringan anda, dan pastikan konfigurasi server atau dns sudah disetting dengan benar</p>
   <p class="font-size-10 mx-auto text-light w-100 mt-0">Error ini terjadi dikarenakan kesalahan konfigurasi jaringan dari sisi client bukan dari sisi aplikasi/server, mohon periksa kembali jaringan anda</p>
@endsection
