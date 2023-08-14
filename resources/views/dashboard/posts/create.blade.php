@extends('dashboard.template.dashboard')
@include('dashboard.components.select2')
@include('dashboard.components.summernote')
@include('dashboard.components.filepond')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Daftar Postingan /</a>
      Tambah Postingan
   </h4>
   <!-- end page title -->

   <livewire:dashboard.posts.post-create />
@endsection
