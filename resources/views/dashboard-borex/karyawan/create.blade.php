@extends('layouts.app')
@section('title')
   <h4 class="page-title">Tambah Data Karyawan</h4>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header">
                   <h4 class="card-title">Input Data Karyawan</h4>
               </div>
            <div class="card-body">

               <p class="card-title-desc">Tambahkan data karyawan untul menggunakan <code>layanan kami</code>
                  dengan <code>gratis</code>.</p>

               <form action="{{ route('karyawan.store') }}" method="post">
                  @csrf
                  <div class="mb-3 row">
                     <div class="col-md-8">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" value="{{ old('nama') }}" name="nama"
                           id="nama">
                        @error('nama')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-4">
                        <label for="umur" class="form-label">Umur</label>
                        <input class="form-control" type="number" value="{{ old('umur') }}" name="umur"
                           id="umur" max="120" min="5">
                        @error('umur')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-9">
                        <h5 class="font-size-14 mb-4">Jenis Kelamin</h5>
                        <div class="form-check mb-3">
                           <input class="form-check-input" type="radio" name="jenis_kelamin"
                              id="jenis_kelamin" value="Pria">
                           <label class="form-check-label" for="jenis_kelamin">
                              Pria
                           </label>
                        </div>
                        <div class="form-check mb-3">
                           <input class="form-check-input" type="radio" name="jenis_kelamin"
                              id="jenis_kelamin" value="Wanita">
                           <label class="form-check-label" for="jenis_kelamin">
                              Wanita
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-12">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea id="alamat" class="form-control @error('alamat')
                          is-invalid
                      @enderror"
                           placeholder="Masukan alamat" rows="4" value="{{ old('alamat') }}" name="alamat">{{ old('alamat') }}</textarea>
                        @error('alamat')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="d-flex justify-content-end">
                     <button class="btn btn-primary" type="submit">Submit form</button>
                  </div>
               </form>
            </div>
         </div>
      </div> <!-- end col -->
   </div>
   <!-- end row -->
@endsection
@push('style')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endpush
