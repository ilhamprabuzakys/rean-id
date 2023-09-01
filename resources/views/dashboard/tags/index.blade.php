@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Tags
   </h4>
   <!-- end page title -->
   
   <livewire:dashboard.tags.tag-index />
@endsection
@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#createTagModal').modal('hide');
         $('#editTagModal').modal('hide');
         $('#deleteTagModal').modal('hide');
      })
   </script>
@endpush