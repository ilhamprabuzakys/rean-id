@extends('dashboard-borex.layouts.app')
@section('content')
   <div class="card">
      <div class="card-body">
         <form action="{{ route('tags.store') }}" method="post">
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
      </div>
      </form>
   </div>
   </div>
@endsection
