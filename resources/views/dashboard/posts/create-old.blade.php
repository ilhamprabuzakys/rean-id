@extends('dashboard.template.dashboard')
@push('script')
   {{-- <script src="{{ asset('assets/borex/libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
   <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create(document.querySelector('#body-editor'))
         .catch(error => {
            console.error(error);
         });
   </script> --}}
   <script src="{{ asset('assets/borex/libs/dropzone/min/dropzone.min.js') }}"></script>
   @include('dashboard.plugin.select2')
   <script>
      let multitagsSelect = document.querySelector("#tags-multi-select");
      new Choices(multitagsSelect, {
         removeItems: true,
         removeItemButton: true,
         loadingText: 'Memuat...',
         noResultsText: 'Hasil tidak ditemukan',
         noChoicesText: 'Tidak ada label tersisa',
         itemSelectText: 'Klik untuk memilih',
      });
   </script>
@endpush
@push('head')
   <!-- Trix Editor -->
   <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
   <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
   <!-- dropzone css -->
   <link href="{{ asset('assets/borex/libs/dropzone/min/dropzone.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('headline')
<div class="row mb-2 mb-xl-3">
   <div class="col-auto d-none d-sm-block">
      <h3><strong>Edit </strong>Postingan</h3>
   </div>
</div>
@endsection
@section('content')
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" id="createPost">
                  @csrf
                  <div class="row mb-3">
                     <div class="col-lg-9">
                        <label for="title" class="form-label">Judul <sup class="text-danger">*</sup></label>
                        <input type="text"
                           class="form-control @error('title')
                              is-invalid
                           @enderror" name="title" id="title" value="{{ old('title') }}">
                        @error('title')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-lg-3">
                        <label for="slug" class="form-label">Slug <sup class="text-danger">*</sup></label>
                        <input type="text"
                           class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
                        @error('slug')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-5">
                        <label for="category_id" class="form-label">Kategori <sup class="text-danger">*</sup></label>
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
                        @error('category_id')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-lg-5">
                        <label for="tags-multi-select" class="form-label">Tags</label>
                        <select class="form-select form-select-md @error('tags')
                           is-invalid
                        @enderror" name="tags[]" id="tags-multi-select" multiple>
                           <optgroup label="Pilih label">
                              @foreach ($tags as $tag)
                                 @if (in_array($tag->id, old('tags', [])))
                                    <option value="{{ $tag->id }}" selected>{{ $tag->name }}</option>
                                 @else
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                 @endif
                              @endforeach
                           </optgroup>

                        </select>
                     </div>
                     <div class="col-lg-2">
                        <label for="user_id" class="form-label">Author</label>
                        <input type="text"
                           class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}" readonly>
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="body" class="form-label">File</label>
                        <input type="file" name="file_path" id="file_path" class="form-control @error('file_path')
                           is-invalid
                        @enderror">
                        @error('file_path')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-lg-12 mt-3">
                        <div class="image-preview-container" style="display: none;">
                           <img id="image-preview" src="#" alt="Preview" style="display: none;">
                           <button id="cancel-button" class="btn btn-danger" style="display: none;"> <i class="fas fa-xmark"></i></button>
                        </div>
                     </div>
                     <script>
                        function readImage(input) {
                           if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function (e) {
                                 $('#image-preview').attr('src', e.target.result).show();
                                 $('.image-preview-container').show();
                                 $('#cancel-button').show();
                                 
                              };

                              reader.readAsDataURL(input.files[0]);
                           }
                        }

                        $("#file_path").change(function () {
                           var fileExtension = ['jpeg', 'jpg', 'png', 'webp'];

                           if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) != -1) {
                              readImage(this);
                           } else {
                              $('#image-preview').hide();
                              $('#cancel-button').hide();
                           }
                        });

                        $("#cancel-button").click(function () {
                           $('#file_path').val('');
                           $('#image-preview').hide();
                           $('.image-preview-container').hide();
                           $(this).hide();
                        });
                     </script>
                     
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="body" class="form-label">Body <sup class="text-danger">*</sup></label>
                        <input type="hidden" id="body" name="body">
                        {{-- <div id="body"></div> --}}
                        {{-- <textarea name="body-editor" id="body-editor" cols="30" rows="20" class="d-none @error('body')
                        is-invalid
                     @enderror">{!! old('body') !!}</textarea> --}}
                        <trix-editor input="body" class="@error('body')
                        is-invalid
                     @enderror">{!! old('body') !!}</trix-editor>
                        @error('body')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row justify-content-end mx-1">
                     <button class="btn btn-primary px-2">
                        <i class="fas fa-save fa-md me-2"></i>
                        Simpan Data</button>
                  </div>
                  <div class="row justify-content-end mx-1 mt-2">
                     <a class="btn btn-danger px-2 text-decoration-none" href="{{ route('posts.index') }}">
                        <i class="fas fa-step-backward fa-md me-2"></i>
                        Kembali</a>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
   <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
         fetch('/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
      });


      $(document).ready(function() {
         // $('#tags-multi-select').select2({
         //    theme: 'bootstrap-5',
         //    placeholder: 'Pilih Tag',
         //    allowClear: true,
         // });
         $('#category_id').select2({
            theme: 'bootstrap-5'
         });
      });

      // document.getElementById('createPost').addEventListener('submit', function(event) {
      //    event.preventDefault(); // Mencegah pengiriman formulir secara langsung

      //    // Tangkap nilai dari editor CKEditor
      //    var editorData = CKEditor.instances['body-editor'].getData();

      //    // Setel nilai pada elemen input
      //    document.getElementById('body').value = editorData;

      //    // Kirim formulir
      //    this.submit();
      // });
   </script>
@endsection
