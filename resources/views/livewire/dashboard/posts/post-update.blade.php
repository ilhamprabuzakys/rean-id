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
                             @enderror" id="title" wire:model.live='title'>
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
                           <option value="{{ $tag->name }}" {{ in_array($tag->name, $this->tags) ? 'selected' : '' }}>{{
                              $tag->name }}</option>
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
               @if ($existingMediaFile !== null)
               <div class="row mb-3">
                  <div class="col-12">
                     <label for="old_media_file">File Media (Saat ini)</label>
                     <div class="row">
                        <div class="col-9 my-3">
                           <div class="bg-white shadow-lg py-3 px-2" style="
                                 border: 1px solid #006eff;
                                 border-radius: 10px;">
                              <h5>{{ $existingMediaFile->file_name }}</h5>
                              <p class="text-muted mb-0">{{ $existingMediaFile->source_path }} - <span class="text-primary">{{
                                 $existingMediaFile->file_size }}</span></p>
                           </div>
                        </div>
                        <div class="col-3 d-flex justify-content-start align-items-center">
                           <button class="btn btn-danger py-2 px-3 rounded-circle waves-effect waves-light"
                              style="width: 20px;" wire:click='removeMediaFile({{ $existingMediaFile->id }})'><i
                                 class="fas fa-xmark"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
               @else
               @endif

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
                        <span class="text-muted mt-1 text-sm">Kosongkan jika tidak ingin mengganti file</span>
                     </div>
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
                  <span class="text-muted mt-1 text-sm">File harus berformat mp3, mp4 atau mkv</span>
               </div>
               <div class="row mb-3">
                  <div class="col-12">
                     <label for="files" class="mb-2">Cover Image <sup class="text-danger">*</sup></label>
                     <div wire:ignore>
                        <div id="files" class="filepond @error('files') is-invalid @enderror"></div>
                     </div>
                     @error('files')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
               <div class="col-12 mb-5">
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
               <div class="col-12 mb-3 d-flex justify-content-end gap-3">
                  <a class="btn btn-light" href="{{ route('posts.index') }}"><i
                        class="mdi mdi-arrow-left me-2"></i>Kembali</a>
                  <button class="btn btn-primary" type="button" wire:click='update()'><i
                        class="mdi mdi-content-save-check me-2"></i>Simpan Perubahan</button>
               </div>

            </div>
         </div>
      </div>
   </div>
   {{-- @dd($existingFiles) --}}
   @push('scripts')
   <script>
      $(document).ready(function() {
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
                  ['insert', ['link', 'picture', 'video']],
                  ['view', ['codeview', 'help']],
               ]
            });

            FilePond.registerPlugin(FilePondPluginImagePreview);

            const inputElement = document.querySelector('#files');
            const pond = FilePond.create(inputElement, {
               files: @json($existingFiles),
               allowMultiple: 'true',
               server: {
                  process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                     @this.upload('files', file, load, error, progress);
                  },
                  revert: (filename, load) => {
                     if (filename.includes('storage/posts/cover/')) {
                        const fileId = filename.split('/').pop();
                        @this.removeFile(fileId, load);
                     } else {
                        @this.removeUpload('files', filename, load);
                     }
                  }
               }
            });

            $('#tags-multi-select').select2({
               // theme: 'bootstrap-5',
               placeholder: 'Pilih Tag',
               allowClear: true,
               tags: true,
            });
            $('#category_id').select2({
               theme: 'bootstrap-5'
            });
            $('#category_id').on('change', function (e) {
                  var data = $('#category_id').select2("val");
                  @this.set('category_id', data);
            });
         });
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