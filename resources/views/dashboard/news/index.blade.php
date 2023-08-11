@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Berita
   </h4>
   <livewire:dashboard.news.news-index />
@endsection
