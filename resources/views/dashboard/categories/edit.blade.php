@extends('dashboard.template.dashboard')
@section('headline')
<div class="row mb-2 mb-xl-3">
   <div class="col-auto d-none d-sm-block">
      <h3><strong>Edit </strong>Data</h3>
   </div>
</div>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <form action="{{ route('categories.update', $category) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text"
                           class="form-control @error('name')
                              is-invalid
                           @enderror" name="name" id="name"
                           value="{{ old('name', $category->name) }}">
                     </div>
                  </div>
                  <p class="text-muted mb-0 mt-4 text-sm"><span class="text-danger">Perhatikan</span> dengan mengedit data kategori ini akan <strong>mengganti</strong> seluruh kategori postingan yang
                     berkaitan dengan kategori ini.</p>
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
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
