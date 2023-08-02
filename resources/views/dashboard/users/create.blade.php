@extends('dashboard.template.dashboard')
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('users.index') }}">Daftar User /</a>
      Tambah User
   </h4>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('users.store') }}" method="post">
                  @csrf
                  <div class="alert alert-success d-none" id="create-modal-alert-success"></div>
                  <div class="row justify-content-between mb-2">
                     <div class="col-2">
                        <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
                     </div>
                     <div class="col-10">
                        <input type="text"
                           class="form-control @error('name')
                           is-invalid
                        @enderror" name="name" id="name" value="{{ old('name') }}" required>
                     </div>
                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
                  <div class="row justify-content-between mb-2">
                     <div class="col-2">
                        <label for="email" class="form-label">Email <sup class="text-danger">*</sup></label>
                     </div>
                     <div class="col-10">
                        <input type="email"
                           class="form-control @error('email')
                           is-invalid
                        @enderror" name="email" id="email" value="{{ old('email') }}" required>
                     </div>
                     @error('email')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
                  <div class="row justify-content-between mb-2">
                     <div class="col-2">
                        <label for="role" class="form-label">Role<sup class="text-danger">*</sup></label>
                     </div>
                     <div class="col-10">
                        <select class="form-select" name="role" id="role">
                           <option selected>Pilih Role</option>
                           @foreach ($roles as $role)
                              <option value="{{ $role->key }}">{{ $role->label }}</option>
                           @endforeach
                        </select>
                     </div>
                  </div>
                  <div class="row justify-content-between mb-2">
                     <div class="col-2">
                        <label for="password" class="form-label">Password <sup class="text-danger">*</sup></label>
                     </div>
                     <div class="col-10">
                        <input type="password"
                           class="form-control @error('password')
                              is-invalid
                           @enderror" name="password" id="password" required>
                        @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row justify-content-center mt-4 mb-3">
                     <div class="col-4 d-flex justify-content-end">
                        <button type="button" class="btn btn-danger">
                           <i class="fas fa-xmark fa-md me-2"></i>
                           Kembali
                        </button>
                     </div>
                     <div class="col-4 justify-content-end"> 
                        <button id="save-button" class="btn btn-primary px-2 not-allowed" type="submit">
                           <i class="fas fa-save fa-md me-2"></i>
                           Simpan Data</button>
                     </div>
                  </div>
            </div>
            </form>
         </div>
      </div>
   </div>
   </div>
@endsection
