@extends('dashboard-borex.layouts.app')
@push('scripts')
   <script src="{{ asset('assets/borex/libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
@endpush
@section('content')
   <div class="card">
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
                     @enderror" name="name" id="name" value="{{ old('name', $category->name) }}">
               </div>
            </div>
            <div class="row justify-content-end mx-1">
               <button class="btn btn-primary px-2">
                  <i class="fas fa-save fa-md me-2"></i>
                  Simpan Perubahan</button>
            </div>
         </form>
      </div>
   </div>
@endsection
