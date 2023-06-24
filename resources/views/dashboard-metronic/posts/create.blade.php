@extends('dashboard.template.layouts')
@section('content')
   <div class="card">
      <div class="card-body">
         <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="row">
               <div class="col-lg-9">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text"
                     class="form-control @error('title')
                        is-invalid
                     @enderror" name="title" id="title" value="{{ old('title') }}">
               </div>
               <div class="col-lg-3">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text"
                     class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
               </div>
            </div>
            <div class="row">
               <div class="col-lg-9">
                  <label for="category_id" class="form-label">Kategori</label>
                  <select class="form-select form-select-md @error('category_id')
                     is-invalid
                  @enderror" name="category_id" id="category_id">
                     <option selected disabled>Pilih Kategori</option>
                     @foreach ($categories as $category)
                     @if (old('category_id') == $category->id) 
                     <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                     @else
                     <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endif
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-3">
                  <label for="user_id" class="form-label">Author</label>
                  <input type="text"
                     class="form-control @error('user_id') is-invalid @enderror" name="user_id" id="user_id" value="2">
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12">
                  <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" value="{{ old('body') }}">{{ old('body') }}</textarea>
                  </div>
               </div>
            </div>
            <div class="row justify-content-end">
               <div class="col-lg-3">
                  <button class="btn btn-primary px-2">
                     <i class="fas fa-save fa-md me-2"></i>
                     Simpan Data</button>
               </div>
            </div>
         </form>
      </div>
   </div>
@endsection
