@extends('dashboard.template.dashboard')
@include('dashboard.components.select2')
@include('dashboard.components.flatpickr')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Postingan 
   </h4>
   <!-- end page title -->

   <livewire:dashboard.posts.post-index />
@endsection
@push('scripts')
   <script>
      $("#filter_date").flatpickr({
         mode: "range",
      });
   </script>
@endpush
