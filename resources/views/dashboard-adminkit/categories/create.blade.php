@extends('dashboard.template.dashboard')
@section('content')
   <div class="row mb-2 mb-xl-3">
      <div class="col-auto d-none d-sm-block">
         <h3><strong>Tambah </strong>Data</h3>
      </div>
   </div>

   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <form action="{{ route('categories.store') }}" method="post">
                  @csrf
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text"
                           class="form-control @error('name')
                              is-invalid
                           @enderror" name="name" id="name" value="{{ old('name') }}">
                     </div>
                  </div>
                  <div class="row justify-content-end mx-1">
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
