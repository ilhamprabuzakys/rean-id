@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      Daftar Kategori
   </h4>
   <!-- end page title -->
   
   <livewire:dashboard.categories.category-index />
@endsection
@push('scripts')
   <script>
      window.addEventListener('close-modal', event => {
         $('#createCategoryModal').modal('hide');
         $('#editCategoryModal').modal('hide');
         $('#deleteCategoryModal').modal('hide');
      })
      
      window.addEventListener('close-offcanvas', event => {
         $('#createCategory').offcanvas('hide');
         $('#editCategory').offcanvas('hide');
         $('#deleteCategory').offcanvas('hide');
      })
   </script>
@endpush