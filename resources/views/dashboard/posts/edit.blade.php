@extends('dashboard.template.dashboard')
@include('dashboard.components.filepond')
@include('dashboard.components.select2')
@include('dashboard.components.summernote')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Daftar Postingan /</a>
      Edit Postingan
   </h4>
   <livewire:dashboard.posts.post-update :$post />
@endsection
