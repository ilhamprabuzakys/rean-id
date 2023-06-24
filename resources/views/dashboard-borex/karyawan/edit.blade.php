{{-- @push('scripts')
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
@endpush --}}
@extends('layouts.app')
@section('title')
   <h4 class="page-title">Edit Karyawan</h4>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card">
            {{-- <div class="card-header">
                   <h4 class="card-title">Input User Data</h4>
               </div> --}}
            <div class="card-body">


               <form action="{{ route('karyawan.update', $karyawan) }}" method="post">
                  @csrf
                  @method('put')
                  <div class="mb-3 row">
                     <div class="col-md-8">
                        <label for="nama" class="form-label">Nama</label>
                        <input class="form-control @error('nama') is-invalid @enderror" type="text" value="{{ old('nama', $karyawan->nama) }}" name="nama"
                           id="nama">
                        @error('nama')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-md-4">
                        <label for="umur" class="form-label">Umur</label>
                        <input class="form-control" type="number" value="{{ old('umur', $karyawan->umur) }}" name="umur"
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
                              id="jenis_kelamin" value="Pria" @if (old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Pria')
                              checked
                              @endif>
                           <label class="form-check-label" for="jenis_kelamin">
                              Pria
                           </label>
                        </div>
                        <div class="form-check mb-3">
                           <input class="form-check-input" type="radio" name="jenis_kelamin"
                              id="jenis_kelamin" value="Wanita"  @if (old('jenis_kelamin', $karyawan->jenis_kelamin) == 'Wanita')
                              checked
                              @endif>
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
                           placeholder="Masukan alamat" rows="4" value="{{ old('alamat', $karyawan->alamat) }}" name="alamat">{{ old('alamat', $karyawan->alamat) }}</textarea>
                        @error('alamat')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="d-flex justify-content-end">
                     <button class="btn btn-primary" type="submit">Save Data</button>
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
