<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3">
                  <div class="col-lg-12 mb-3">
                     <label for="title" class="form-label">Judul <sup class="text-danger">*</sup></label>
                     <input type="text" class="form-control @error('title')
                            is-invalid
                            @enderror" id="title" wire:model='title'>
                     @error('title')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="row mb-3">
                  <div class="col-lg-5 mb-3" wire:ignore>
                     <label for="category_id" class="form-label">Kategori <sup class="text-danger">*</sup></label>
                     <select class="form-select form-select-md @error('category_id')
                                is-invalid
                            @enderror" wire:model.live="category_id" id="category_id">
                        <option selected value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
                  <div class="col-lg-5 mb-3" wire:ignore>
                     <label for="tags-multi-select" class="form-label">Tags</label>
                     <select class="form-select form-select-md @error('tags')
                            is-invalid
                        @enderror" wire:model="tags" id="tags-multi-select" multiple>
                        <optgroup label="Pilih label">
                           @foreach ($tagsItem as $tag)
                           <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                           @endforeach
                        </optgroup>
                     </select>
                  </div>
                  <div class="col-lg-2 mb-3">
                     <label for="user_id" class="form-label">Author</label>
                     <input type="text" class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}"
                        readonly>
                  </div>
               </div>

               {{-- @dump($category_type_id)
               @dump(in_array($category_type_id, [2, 3])) --}}
               <input type="hidden" id="category_type_id" value="{{ $category_type_id }}">
               <div class="row mb-3 @if (in_array($category_type_id, [2, 3])) @else d-none @endif">
                  <div class="col-12 mb-3">
                     <label for="files" class="mb-2">File
                        @if ($category_type_id == 2)
                        Audio
                        @elseif($category_type_id == 3)
                        Video
                        @endif
                        <sup class="text-danger">*</sup>
                     </label>
                     <div>
                        <input type="file" name="file_path" id="file_path"
                           class="form-control @error('file_path') is-invalid @enderror" wire:model='file_path'>
                     </div>
                     @error('file_path')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                     <div class="invalid-feedback" id="error_message">
                     </div>
                  </div>
                  <span class="text-muted">File harus berformat <strong>
                        @if($category_type_id == 2)
                        MP3
                        @elseif($category_type_id == 3)
                        MP4
                        @endif
                     </strong>
                  </span>
               </div>
               <div class="row mb-3">
                  <div class="col-12 mb-3">
                     <label for="files" class="mb-2">Cover Image
                        @if($category_type_id == 4)
                        <sup class="text-danger">*</sup>
                        @endif
                     </label>
                     <div wire:ignore>
                        <div id="files" class="filepond @error('files') is-invalid @enderror" wire:model='files' value=""></div>
                     </div>
                     @error('files')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="col-12 mb-3">
                  <label for="body" class="mb-2">Body <sup class="text-danger">*</sup></label>
                  <div wire:ignore>
                     <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="4"
                        wire:model='body'></textarea>
                     @error('body')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               @can('superadmin')
               <div class="col-12 mb-4">
                  <p class="text-muted">Anda login sebagai <strong>Super Admin</strong>, data yang anda tambahkan akan
                     otomatis masuk ke dalam status <strong>Approved</strong>.</p>
               </div>
               @endcan
               <div class="row form-button mx-1">
                  <div class="col">
                     <a class="btn btn-danger text-decoration-none" href="{{ route('posts.index') }}">
                        Kembali
                        <i class="mdi mdi-arrow-left ms-2"></i>
                     </a>
                  </div>
                  <div class="col">
                     <button class="btn btn-primary" id="saveBTN" type="button" wire:click='store()'>
                        Simpan Data
                        <i class="mdi mdi-content-save-check ms-2"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   @push('scripts')
   <script>
      $(document).ready(function() {
         $('#tags-multi-select').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Pilih Tag',
            allowClear: true,
            tags: true,
         });
         $('#tags-multi-select').on('change', function (e) {
            var data = $('#tags-multi-select').select2("val");
            @this.set('tags', data);
         });
         $('#category_id').select2({
            theme: 'bootstrap-5'
         });
         $('#category_id').on('change', function (e) {
            var dataString = $('#category_id').select2("val");
            var data = JSON.parse(dataString);
            // console.log(data);
            // console.log(data.type.id);
            // Set data-category-type-id attribute pada #saveBTN
            $('#saveBTN').data('category-type-id', data.type.id);
            $('#category_type_id').val(data.type.id);

            @this.set('category_id', data.id);
            @this.set('category_type_id', data.type.id);
            console.log("Nilai terbaru category_type_id:", $('#category_type_id').val());
         });

         // $('#category_id').on('change', function() {
         //    var url = "{{ config('app.url') }}/" + this.value + "/";
         //    $('#slug-input-addon').text(url);
         // });

         $('#body').summernote({
            height: 200,
            tabsize: 2,
            lang: 'id-ID',
            callbacks: {
               onChange: function(contents, $editable) {
                     @this.set('body', contents);
               },
               onImageUpload: function(files) {
                     for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        let fileName = file["name"];
                        let ext = fileName.split('.').pop().toLowerCase();
                        if($.inArray(ext, ['jpg','jpeg','png']) == -1) {
                           alert('Ekstensi file tidak diizinkan! Hanya jpg, jpeg, dan png yang diperbolehkan.');
                        } else {
                           // Proses unggah gambar Anda
                           // Anda dapat menambahkan fungsi unggah Anda di sini
                           // Contoh: $.upload(file);
                        }
                     }
               }
            },
            toolbar: [
               ['style', ['style']],
               ['font', ['bold', 'underline', 'clear']],
               ['fontname', ['fontname']],
               ['color', ['color']],
               ['para', ['ul', 'ol', 'paragraph']],
               ['table', ['table']],
               ['insert', ['link', 'picture']],
               ['view', ['codeview', 'help']],
            ]
         });


         FilePond.registerPlugin(FilePondPluginImagePreview);
         const inputElement = document.querySelector('#files');
         const inputElementAdditional = document.querySelector('#files_media');
         const pond = FilePond.create(inputElement);
         const pondAdditional = FilePond.create(inputElementAdditional);

         pond.setOptions({
            allowMultiple: 'true',
            server: {
               process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                  @this.upload('files', file, load, error, progress);

               },
               revert: (filename, load) => {
                  @this.removeUpload('files', filename, load);
               },
            }
         });

         pondAdditional.setOptions({
            allowMultiple: 'true',
            server: {
               process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                  @this.upload('files', file, load, error, progress);

               },
               revert: (filename, load) => {
                  @this.removeUpload('files', filename, load);
               },
            }
         });

         Livewire.on('stored', () => {
            pond.removeFiles();
            @this.set('body', '');
         });
      });
   </script>
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const mediaFileInput = document.getElementById('file_path');
         const fileCover = document.getElementById('files');

         // Pastikan mediaFileInput ada
         if (!mediaFileInput) return;
         if (!fileCover) return;

         $('#saveBTN').on('click', function(event) {
            var categoryTypeID = $('#category_type_id').val();
            console.log(fileCover.files);
            if (categoryTypeID != 1 && categoryTypeID != 5) {
               if (!fileCover.files || !fileCover.files[0]) {
                     Swal.fire({
                        title: "Gagal Submit",
                        html: "File untuk Cover harus disertakan",
                        icon: "error",
                        confirmButtonText: 'Ok',
                        timer: 2500,
                     });
                     fileCover.value = '';
                     event.preventDefault();
                     return;
               }

               // Cek ukuran file
               if (fileCover.files[0].size > 3 * 1024 * 1024) {
                     Swal.fire({
                        title: "Gagal Submit",
                        html: "Ukuran file terlalu besar, maksimal hanya 3MB",
                        icon: "error",
                        confirmButtonText: 'Ok',
                        timer: 2500,
                     });
                     fileCover.value = '';
                     event.preventDefault();
                     return;
               }

               // Cek ekstensi file
               var fileName = fileCover.files[0].name;
               var ext = fileName.split('.').pop().toLowerCase();
               if (['jpg', 'jpeg', 'png'].indexOf(ext) == -1) {
                     Swal.fire({
                        title: "Gagal Submit",
                        html: "Format file anda tidak valid, harus dalam: JPG, JPEG, PNG",
                        icon: "error",
                        confirmButtonText: 'Ok',
                        timer: 2500,
                     });
                     fileCover.value = '';
                     event.preventDefault();
                     return;
               }
            }
         });


         mediaFileInput.addEventListener('change', function() {
            var categoryTypeID = $('#category_type_id').val();  // Ini harus mengambil nilai terbaru
            console.log("categoryTypeID saat file diubah:", categoryTypeID);
            const file = mediaFileInput.files[0];
            // console.log(file);
            
            if (!file) {
                  Swal.fire({
                     title: "Gagal Submit",
                     html: "Media file harus disertakan",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus disertakan');
                  mediaFileInput.value = ''; // Reset input file
                  return;
            }

            // Cek ukuran file (20MB = 20 * 1024 * 1024 bytes)
            if (file.size > 20 * 1024 * 1024) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "Ukuran media file tidak boleh lebih besar dari <span class='text-danger'>20MB</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Ukuran media file tidak boleh lebih besar dari 20MB');
                  mediaFileInput.value = ''; // Reset input file
                  return;
            }

            // Cek ekstensi file
            let allowedFormats = [];
            const formatMap = {
               2: ['mp3'],
               3: ['mp4']
            };

            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (formatMap[categoryTypeID]) {
               allowedFormats = formatMap[categoryTypeID];
            }
            console.log(allowedFormats);
            if (!allowedFormats.includes(fileExtension)) {
               Swal.fire({
                  title: "Gagal Upload",
                  html: "Media file harus berformat media: <span class='text-danger'>"+ allowedFormats.join(", ") +"</span>",
                  icon: "error",
                  confirmButtonText: 'Ok',
                  timer: 2500,
               });
               mediaFileInput.value = ''; // Reset input file
               return;
            }

         });

         fileCover.addEventListener('change', function() {
            const file = fileCover.files[0];
            
            if (!file) {
                  Swal.fire({
                     title: "Gagal Submit",
                     html: "File untuk Cover harus disertakan",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus disertakan');
                  fileCover.value = ''; // Reset input file
                  return;
            }

            // Cek ukuran file (3MB = 3 * 1024 * 1024 bytes)
            if (file.size > 3 * 1024 * 1024) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "Ukuran file tidak boleh lebih besar dari <span class='text-danger'>3MB</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Ukuran media file tidak boleh lebih besar dari 20MB');
                  fileCover.value = ''; // Reset input file
                  return;
            }

            // Cek ekstensi file
            const allowedFormats = ['jpg', 'jpeg', 'png'];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (!allowedFormats.includes(fileExtension)) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "File harus dalam format: <span class='text-danger'>jpg, jpeg dan png</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus berformat media: mp3, mp4, mkv');
                  fileCover.value = ''; // Reset input file
                  return;
            }
         });
      });
   </script>
   @endpush
</div>