@extends('dashboard.template.dashboard')
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
   @include('dashboard.plugin.select2')
@endpush
@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#deletePostModal').modal('hide');
      })
   </script>
@endpush