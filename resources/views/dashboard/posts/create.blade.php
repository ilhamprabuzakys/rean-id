@extends('dashboard.template.dashboard')
@push('script')
   {{-- <script src="{{ asset('assets/borex/libs/ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script> --}}
   <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/classic/ckeditor.js"></script>
   {{-- <script src="https://cdn.ckeditor.com/ckeditor5/38.1.1/super-build/ckeditor.js"></script> --}}
   <script>
      ClassicEditor
         .create(document.querySelector('#body-editor'))
         .catch(error => {
            console.error(error);
         });
   </script>
   {{-- <script src="{{ asset('assets/dashboard/velzon/assets/libs/choices-js/scripts/choices.min.js') }}"></script> --}}
   {{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> --}}

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

   <!-- Choice JS -->
   {{-- <link rel="stylesheet" href="{{ asset('assets/dashboard/velzon/assets/libs/choices-js/styles/choices.min.css') }}"> --}}
   {{-- <link
   rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/base.min.css"
   /> --}}
   {{-- 
   <link
   rel="stylesheet"
   href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
   /> --}}
@endpush
@section('content')
   <!-- start page title -->
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Daftar Postingan /</a>
      Tambah Postingan
   </h4>
   {{-- <div class="row">
      <div class="col-12">
         <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Buat Postingan</h4>

            <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('posts.index') }}">Postingan</a></li>
                     <li class="breadcrumb-item active">Buat Postingan</li>
                  </ol>
            </div>

         </div>
      </div>
   </div> --}}
   <!-- end page title -->

   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" id="createPost">
                  @csrf
                  <div class="row mb-3">
                     <div class="col-lg-12">
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
                                 <option value="{{ $category->id }}" data-slug="{{ $category->slug }}" selected>{{ $category->name }}</option>
                              @else
                                 <option value="{{ $category->id }}" data-slug="{{ $category->slug }}">{{ $category->name }}</option>
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
                                 @if (in_array($tag->name, old('tags', [])))
                                    <option value="{{ $tag->name }}" selected>{{ $tag->name }}</option>
                                 @else
                                    <option value="{{ $tag->name }}">{{ $tag->name }}</option>
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
                        <label for="slug" class="form-label">Slug <sup class="text-danger">*</sup></label>
                        <div class="input-group">
                           <span class="input-group-text" id="slug-input-addon">{{ config('app.url') }}posts/</span>
                           <input type="text"
                              class="form-control @error('slug') is-invalid @enderror" name="slug" id="slug" value="{{ old('slug') }}">
                        </div>
                        @error('slug')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="body" class="form-label" id="label-file">File</label>
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
                           <button id="cancel-button" class="btn btn-danger" style="display: none;">
                              <i class="mdi mdi-close" style="font-size: 26px"></i>
                           </button>
                        </div>
                     </div>
                     {{-- <script>
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

                        $("#file_path").change(function() {
                           var fileExtension = ['jpeg', 'jpg', 'png', 'webp'];

                           if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) != -1) {
                              readImage(this);
                           } else {
                              $('#image-preview').hide();
                              $('#cancel-button').hide();
                           }
                        });

                        $("#cancel-button").click(function() {
                           $('#file_path').val('');
                           $('#image-preview').hide();
                           $('.image-preview-container').hide();
                           $(this).hide();
                        });
                     </script> --}}
                  </div>
                  <div class="row mb-3">
                     <div class="col-lg-12">
                        <label for="body" class="form-label">Body <sup class="text-danger">*</sup></label>
                        {{-- <div id="body"></div> --}}
                        <textarea name="body" id="body-editor" rows="3" class="@error('body')
                        is-invalid
                     @enderror">{!! old('body') !!}</textarea>
                        {{-- <trix-editor input="body" class="@error('body')
                        is-invalid
                     @enderror">{!! old('body') !!}</trix-editor> --}}
                        @error('body')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row form-button mx-1">
                     <div class="col">
                        <a class="btn btn-danger text-decoration-none" href="{{ route('posts.index') }}">
                           Kembali
                           <i class="mdi mdi-arrow-left ms-2"></i>
                        </a>
                     </div>
                     <div class="col">
                        <button class="btn btn-primary">
                           Simpan Data
                           <i class="mdi mdi-content-save-check ms-2"></i>
                        </button>
                     </div>
                     <div class="col">
                        <button class="btn btn-primary">
                           Simpan Data Dan Isi Kembali
                           <i class="mdi mdi-content-save-edit ms-2"></i>
                        </button>
                     </div>
                  </div>
                  {{-- <div class="row justify-content-end mx-1 mt-2">
                        
                  </div> --}}
               </form>
            </div>
         </div>
      </div>
   </div>
   <script>
      const title = document.querySelector('#title');
      const slug = document.querySelector('#slug');

      title.addEventListener('change', function() {
         fetch('/dashboard/posts/checkSlug?title=' + title.value)
            .then(response => response.json())
            .then(data => slug.value = data.slug)
      });


      $(document).ready(function() {
         $('#tags-multi-select').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Pilih Tag',
            allowClear: true,
            tags: true,
         });
         $('#category_id').select2({
            theme: 'bootstrap-5'
         });
         // $('#category_id').on('change', function() {
         //    var url = "{{ config('app.url') }}/" + this.value + "/";
         //    $('#slug-input-addon').text(url);
         // });

         $('#category_id').change(function() {
            var selectedText = $('option:selected', this).text();
            var selectedSlug = $('option:selected', this).data('slug');
            console.log("selectedText : " + selectedText);
            var url = "{{ config('app.url') }}" + selectedSlug + "/";
            $('#slug-input-addon').text(url);
            var fileExtension;
            if (selectedText == 'Ebook') {
               $('#label-file').text('Ebook File (PDF)')
               fileExtension = ['pdf'];
            } else if (selectedText == 'Video' || selectedText == 'Musik' || selectedText == 'Audio') {
               $('#label-file').text('Media Pilihan')
               fileExtension = ['mp4', 'mp3']; // tambahkan format file media yang diperbolehkan di sini
            } else {
               $('#label-file').text('Image Pilihan')
               fileExtension = ['jpeg', 'jpg', 'png', 'webp'];
            }

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

            $("#file_path").change(function() {
               if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
                  alert('Format file tidak diperbolehkan!');
                  $(this).val(''); // mengosongkan input file
                  $('#image-preview').hide();
                  $('#cancel-button').hide();
               } else {
                  // panggil fungsi readImage atau yang lainnya di sini
                  readImage(this);
               }
            });


            // $("#file_path").change(function() {
            //    var fileExtension = ['jpeg', 'jpg', 'png', 'webp'];

            //    if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) != -1) {
            //       readImage(this);
            //    } else {
            //       $('#image-preview').hide();
            //       $('#cancel-button').hide();
            //    }
            // });

            $("#cancel-button").click(function() {
               $('#file_path').val('');
               $('#image-preview').hide();
               $('.image-preview-container').hide();
               $(this).hide();
            });
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
