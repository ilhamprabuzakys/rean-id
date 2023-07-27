@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('categories.index') }}">Daftar Kategori /</a>
      Tambah Kategori
   </h4>
   <!-- end page title -->

   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                  <div class="row mb-3 align-items-center">
                     <div class="col-2">
                        <label for="name" class="col-form-label-lg">Nama Kategori <sup class="text-danger">*</sup></label>
                     </div>
                     <div class="col-10">
                        <input type="text"
                           class="form-control form-control-sm @error('name')
                              is-invalid
                           @enderror" name="name" id="name" value="{{ old('name') }}">
                     </div>
                  </div>
                  <div class="row justify-content-end mx-1 mt-5">
                     <button class="btn btn-primary px-2">
                        <i class="fas fa-save fa-md me-2"></i>
                        Simpan Data</button>
                  </div>
                  <div class="row justify-content-end mx-1 mt-2">
                     <a class="btn btn-danger px-2 text-decoration-none" href="{{ route('categories.index') }}">
                        <i class="fas fa-step-backward fa-md me-2"></i>
                        Kembali</a>
                  </div>
            </div>
            </form>
         </div>
      </div>
   </div>
@endsection
