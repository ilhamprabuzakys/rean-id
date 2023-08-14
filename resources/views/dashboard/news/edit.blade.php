@extends('dashboard.template.dashboard')
@include('dashboard.components.summernote')
@include('dashboard.components.filepond')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('news.index') }}">Berita /</a>
      Perbarui Berita
   </h4>
   {{-- @livewire('dashboard.news.news-update', ['news' => $news, 'user' => auth()->user()->id]) --}}
   <livewire:dashboard.news.news-update :$news :user="auth()->user()->id" />
@endsection
