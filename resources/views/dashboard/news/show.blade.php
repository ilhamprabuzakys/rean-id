@extends('dashboard.template.dashboard')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('news.index') }}">Berita /</a>
      Detail Berita
   </h4>
   {{-- @livewire('dashboard.news.news-show', ['news' => $news]) --}}
   <livewire:dashboard.news.news-show :$news />

@endsection
