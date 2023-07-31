@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Users
   </h4>
   <!-- end page title -->
   <div class="row">
      {{-- @livewire('user') --}}
      <livewire:user />
   </div>
@endsection
@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#createUserModal').modal('hide');
         $('#editUserModal').modal('hide');
         $('#deleteUserModal').modal('hide');
      })

      // Livewire.on('userStore', () => {
      //       $('#userModal').modal('hide');
      // });
   </script>
@endpush