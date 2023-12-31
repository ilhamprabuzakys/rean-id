@extends('dashboard.template.dashboard')
@include('dashboard.components.flatpickr')
@include('dashboard.components.summernote')
@include('dashboard.components.filepond')
@include('dashboard.components.leaflet')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('events.index') }}">Daftar Events /</a>
      Edit Event
   </h4>
   <livewire:dashboard.events.event-update :$event :user="auth()->user()->id" />
@endsection

