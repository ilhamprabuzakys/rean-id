@extends('dashboard.template.dashboard')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar User
   </h4>
   <div class="row">
      <livewire:dashboard.users.user-index />
   </div>
@endsection
@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#createUserModal').modal('hide');
         $('#editUserModal').modal('hide');
         $('#deleteUserModal').modal('hide');
      })
   </script>
@endpush