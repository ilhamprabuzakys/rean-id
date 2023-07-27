@extends('dashboard.template.dashboard')
@push('script')
   <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
   <script>
      ClassicEditor
         .create(document.querySelector('#body-editor'))
         .catch(error => {
            console.error(error);
         });
   </script>
   @include('dashboard.plugin.select2')
   {{-- <script>
      let multitagsSelect = document.querySelector("#tags-multi-select");
      new Choices(multitagsSelect, {
         removeItems: true,
         removeItemButton: true,
         loadingText: 'Memuat...',
         noResultsText: 'Hasil tidak ditemukan',
         noChoicesText: 'Tidak ada label tersisa',
         itemSelectText: 'Klik untuk memilih',
      });
   </script> --}}
@endpush
@push('head')
   <!-- Trix Editor -->
   {{-- <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
   <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script> --}}
@endpush
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Daftar Postingan /</a>
      Edit Postingan
   </h4>
   <!-- end page title -->
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data" id="editPost">
                  @method('PUT')
                  @csrf
                  <div class="row mb-3">
                     <div class="col-lg-9">
                        <label for="title" class="form-label">Judul <sup class="text-danger">*</sup></label>
                        <input type="text"
                           class="form-control @error('title')
                              is-invalid
                           @enderror" name="title" id="title"
                           value="{{ old('title', $post->title) }}">
                        @error('title')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                     <div class="col-lg-3">
                        <label for="slug" class="form-label">Slug <sup class="text-danger">*</sup></label>
                        <input type="text"
                           class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug', $post->slug) }}">
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
                              @if (old('category_id', $post->category_id) == $category->id)
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
                                 @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
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
                 
                  @cannot('member')
                     <div class="row mb-3">
                        <div class="col-lg-12">
                           <label for="status" class="form-label">Status <sup class="text-danger">*</sup></label>
                           <select class="form-select form-select-sm @error('status')
                              is-invalid
                           @enderror" name="status" id="status">
                              <option selected disabled>Pilih Kategori</option>
                              @foreach ($statuses as $status)
                                 <option value="{{ $status->key }}" {{ old('status', $post->status) == $status->key ? 'selected' : '' }}>{{ $status->label }}</option>
                              @endforeach
                           </select>
                           @error('status')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror
                        </div>
                     </div>
                  @endcannot
                  
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
                        @if ($post->file_path && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                           <div class="image-preview-container">
                              <img id="image-preview" src="{{ asset($post->file_path) }}" alt="Preview">
                              <button id="cancel-button" class="btn btn-danger">
                                 <i class="ri-close-fill" style="font-size: 26px"></i>
                              </button>
                           </div>
                        @endif
                     </div>

                     <script>
                        // Fungsi untuk menampilkan preview gambar
                        function readImage(input) {
                           if (input.files && input.files[0]) {
                              var reader = new FileReader();

                              reader.onload = function(e) {
                                 $('#image-preview').attr('src', e.target.result).show();
                                 $('.image-preview-container').show();
                                 $('#cancel-button').show();
                              };

                              reader.readAsDataURL(input.files[0]);
                           }
                        }

                        // Cek apakah ada file_path pada $post dan validasi ekstensi
                        @if ($post->file_path && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                           // Tampilkan preview jika file ada dan ekstensi valid
                           $('#image-preview').attr('src', "{{ asset('storage/' . $post->file_path) }}").show();
                           $('.image-preview-container').show();
                           $('#cancel-button').show();

                           // Isi nilai input file dengan file_path yang sudah ada
                           $('#file_path').attr('value', "{{ $post->file_path }}");
                        @endif

                        // Event listener ketika input file berubah
                        $("#file_path").change(function() {
                           var fileExtension = ['jpeg', 'jpg', 'png'];

                           if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) != -1) {
                              readImage(this);
                           } else {
                              $('#image-preview').hide();
                              $('#cancel-button').hide();
                           }
                        });

                        // Event listener untuk tombol Cancel
                        $("#cancel-button").click(function() {
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
                        <textarea name="body" id="body-editor" cols="30" rows="20" class="d-none @error('body')
                        is-invalid
                     @enderror">{!! old('body', $post->body) !!}</textarea>
                        {{-- <trix-editor input="body" class="@error('body')
                        is-invalid
                     @enderror">{!! old('body', $post->body) !!}</trix-editor> --}}
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
         $('#tags-multi-select').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Pilih Tag',
            allowClear: true,
         });
         $('#category_id').select2({
            theme: 'bootstrap-5'
         });
         $('#status').select2({
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
