@extends('dashboard.template.dashboard')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('news.index') }}">Berita /</a>
      Buat Berita
   </h4>
   {{-- @livewire('dashboard.news.news-create', ['user' => auth()->user()->id]) --}}
   <livewire:dashboard.news.news-create :user="auth()->user()->id" />
@endsection
@include('dashboard.components.summernote')

