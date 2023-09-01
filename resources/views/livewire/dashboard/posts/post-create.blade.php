<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3">
                  <div class="col-lg-12">
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
                  <div class="col-lg-5">
                     <label for="category_id" class="form-label">Kategori <sup class="text-danger">*</sup></label>
                     <select class="form-select form-select-md @error('category_id')
                                is-invalid
                            @enderror" wire:model.live="category_id" id="category_id">
                        <option selected value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                     @error('category_id')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
                  <div class="col-lg-5" wire:ignore>
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
                  <div class="col-lg-2">
                     <label for="user_id" class="form-label">Author</label>
                     <input type="text" class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}"
                        readonly>
                  </div>
               </div>

               <div class="row mb-3 @if (in_array($category_id, [3, 6, 7])) @else d-none @endif">
                  <div class="col-12">
                     <label for="files" class="mb-2">File
                        @if ($category_id == 6 || $category_id == 7)
                        Audio
                        @elseif($category_id == 3)
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
                  <span class="text-muted">File harus berformat mp3, mp4 atau mkv</span>
               </div>
               <div class="row mb-3">
                  <div class="col-12">
                     <label for="files" class="mb-2">Cover Image</label>
                     <div wire:ignore>
                        <div id="files" class="filepond @error('files') is-invalid @enderror" wire:model='files'></div>
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
                     <button class="btn btn-primary" type="button" wire:click='store()'>
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
            var data = $('#category_id').select2("val");
            @this.set('category_id', data);
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

      /* $('#category_id').change(function() {
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
      }); */
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
   <script>
      document.addEventListener('DOMContentLoaded', function() {
         const mediaFileInput = document.getElementById('file_path');

         // Pastikan mediaFileInput ada
         if (!mediaFileInput) return;

         mediaFileInput.addEventListener('change', function() {
            const file = mediaFileInput.files[0];
            
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
            const allowedFormats = ['mp3', 'mp4', 'mkv'];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (!allowedFormats.includes(fileExtension)) {
                  Swal.fire({
                     title: "Gagal Upload",
                     html: "Media file harus berformat media: <span class='text-danger'>mp3, mp4, mkv</span>",
                     icon: "error",
                     confirmButtonText: 'Ok',
                     timer: 2500,
                  })
                  // alert('Media file harus berformat media: mp3, mp4, mkv');
                  mediaFileInput.value = ''; // Reset input file
                  return;
            }
         });
      });
   </script>
   @endpush
</div>