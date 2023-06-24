@extends('dashboard-borex.layouts.app')
@push('scripts')
   {{-- <script src="{{ asset('assets/borex/libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script> --}}
   {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create( document.querySelector('#body') )
         .catch( error => {
            console.error( error );
         } );
   </script> --}}
@endpush
@push('head')
<link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush
@section('content')
   <div class="card">
      <div class="card-body">
         <form action="{{ route('posts.store') }}" method="post">
            @csrf
            <div class="row mb-3">
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
            <div class="row mb-3">
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
                     class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}" readonly>
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-lg-12">
                  <label for="body" class="form-label">Body</label>
                  {{-- <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" value="{{ old('body') }}">{{ old('body') }}</textarea> --}}
                  <input type="hidden" id="body" name="body" value="{{ old('body') }}">
                  <trix-editor input="body">{{ old('body') }}</trix-editor>
                  {{-- <div id="body"></div> --}}
                  {{-- <textarea name="body" id="body-postingan"></textarea> --}}
               </div>
            </div>
            <div class="row justify-content-end mx-1">
               <button class="btn btn-primary px-2">
                  <i class="fas fa-save fa-md me-2"></i>
                  Simpan Data</button>
            </div>
         </form>
      </div>
   </div>
   <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
         fetch('/posts/checkSlug?title=' + title.value)
         .then(response => response.json())
         .then(data => slug.value = data.slug)
      })
   </script>
@endsection
