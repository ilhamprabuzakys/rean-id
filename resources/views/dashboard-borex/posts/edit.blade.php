@extends('dashboard-borex.layouts.app')
@section('title')
   <h4 class="page-title">Edit Postingan</h4>
@endsection
@push('head')
   <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
   <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
@endpush
@push('scripts')
   @include('dashboard-borex.components.select2')
@endpush
@section('content')
   <div class="card">
      <div class="card-body">
         <form action="{{ route('posts.update', $post) }}" method="post">
            @csrf
            @method('PUT')
            <div class="row mb-3">
               <div class="col-lg-6">
                  <label for="title" class="form-label">Judul</label>
                  <input type="text"
                     class="form-control @error('title')
                        is-invalid
                     @enderror" name="title" id="title" value="{{ old('title', $post->title) }}">
               </div>
               <div class="col-lg-6">
                  <label for="slug" class="form-label">Slug</label>
                  <input type="text"
                     class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-lg-6">
                  <label for="status-select" class="form-label">Status</label>
                  <select class="form-select form-select-md @error('status')
                     is-invalid
                  @enderror" name="status" id="status-select">
                     @foreach ($statuses as $key => $status)
                        @if (old('status', $post->status) == $status->key)
                           <option value="{{ $status->key }}" selected>{{ $status->label }}</option>
                        @else
                           <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endif
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-6">
                  <label for="user_id" class="form-label">Author</label>
                  <input type="text"
                     class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}" readonly>
                  <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-lg-6">
                  <label for="category_id" class="form-label">Kategori</label>
                  <select class="form-select form-select-md @error('category_id')
                     is-invalid
                  @enderror" name="category_id" id="category_id">
                     <option selected disabled>Pilih Kategori</option>
                     @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id) == $category->id)
                           <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-6">
                  <label for="tags-multi-select" class="form-label">Tags</label>
                  <select class="form-select form-select-md @error('tags')
                     is-invalid
                  @enderror" name="tags[]" id="tags-multi-select" multiple="multiple">
                     @foreach ($tags as $tag)
                        @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
                           <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                        @else
                           <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                        @endif
                     @endforeach
                  </select>
               </div>
            </div>
            <div class="row mb-3">
               <div class="col-lg-12">
                  <label for="body" class="form-label">Body</label>
                  {{-- <textarea class="form-control @error('body') is-invalid @enderror" name="body" id="body" rows="5" value="{{ old('body', $post->body) }}">{{ old('body', $post->body) }}</textarea> --}}
                  <input type="hidden" id="body" name="body" value="{{ $post->body }}">
                  <trix-editor input="body"></trix-editor>

               </div>
            </div>
            <div class="row justify-content-end mx-1">
               <button class="btn btn-primary px-2">
                  <i class="fas fa-save fa-md me-2"></i>
                  Simpan Perubahan</button>
            </div>
            <div class="row justify-content-end mx-1 mt-2">
               <a class="btn btn-danger px-2 text-decoration-none" href="{{ route('posts.index') }}">
                  <i class="fas fa-step-backward fa-md me-2"></i>
                  Kembali</a>
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

      $(document).ready(function() {
         $('#tags-multi-select').select2({
            theme: 'bootstrap-5'
         });
         $('#category_id').select2({
            theme: 'bootstrap-5'
         });
      });
   </script>
@endsection
