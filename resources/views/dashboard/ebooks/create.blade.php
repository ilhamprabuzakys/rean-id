@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.summernote')
@include('dashboard.components.filepond')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Daftar Ebook /</a>
      Buat Ebook
   </h4>
   <livewire:dashboard.ebooks.ebook-create  :user="auth()->user()->id"/>
@endsection

