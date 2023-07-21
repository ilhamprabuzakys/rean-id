@extends('dashboard.template.dashboard')
@section('content')
   <!-- start page title -->
   <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Edit Label</h4>

            <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Label</a></li>
                     <li class="breadcrumb-item active">Edit Label</li>
                  </ol>
            </div>

         </div>
      </div>
   </div>
   <!-- end page title -->

   <div class="row">
      <div class="col-12">
         <div class="card shadow-md">
            <div class="card-body">
               <form action="{{ route('tags.update', $tag) }}" method="post">
                  @csrf
                  @method('PUT')
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="name" class="form-label">Nama</label>
                        <input type="text"
                           class="form-control @error('name')
                              is-invalid
                           @enderror" name="name" id="name"
                           value="{{ old('name', $tag->name) }}">
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
                     <a class="btn btn-danger px-2 text-decoration-none" href="{{ route('tags.index') }}">
                        <i class="fas fa-step-backward fa-md me-2"></i>
                        Kembali</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
