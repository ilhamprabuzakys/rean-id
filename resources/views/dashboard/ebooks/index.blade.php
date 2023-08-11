@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.summernote')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Ebook

   </h4>
   <livewire:dashboard.ebooks.ebook-index  :user="auth()->user()"/>
@endsection

