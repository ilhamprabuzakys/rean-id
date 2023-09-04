<div>
   <div class="card">
      <div class="card-body">
         <div class="row g-4">
            <div class="col-md-12">
               <label class="mb-2" for="title">Judul Buku <sup class="text-danger">*</sup></label>
               <input type="text" id="title" wire:model='title'
                  class="form-control @error('title') is-invalid @enderror" />
               @error('title')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-md-6">
               <label class="mb-2" for="author">Penulis <sup class="text-danger">*</sup></label>
               <input type="text" id="author" wire:model='author'
                  class="form-control @error('author') is-invalid @enderror" />
               @error('author')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-md-6">
               <label class="mb-2" for="published_at">Tahun Publish <sup class="text-danger">*</sup></label>
               <input type="text" id="published_at" wire:model='published_at'
                  class="form-control @error('published_at') is-invalid @enderror" />
               @error('published_at')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-12">
               <label class="mb-2" for="description">Deskripsi</label>
               <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                  id="description" rows="4" placeholder="Deskripsi Ebook" wire:model='description'></textarea>
               @error('description')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            @if ($existingPDF !== null)
            <div class="col-12 mb-3">
               <label for="old_media_file">File PDF (Saat ini)</label>
               <div class="row">
                  <div class="col-9 my-3">
                     <div class="bg-white shadow-lg py-3 px-2" style="
                                 border: 1px solid #006eff;
                                 border-radius: 10px;">
                        <h5>{{ $existingPDF->file_name }}</h5>
                        <p class="text-muted mb-0">{{ $existingPDF->source_path }} - <span class="text-primary">{{
                              $existingPDF->file_size }}</span></p>
                     </div>
                  </div>
                  <div class="col-3 d-flex justify-content-start align-items-center">
                     <button class="btn btn-danger py-2 px-3 rounded-circle waves-effect waves-light" style="width: 20px;"
                        wire:click='removePDFFile({{ $existingPDF->id }})'><i class="fas fa-xmark"></i></button>
                  </div>
               </div>
            </div>
            @else
            @endif
            <div class="col-12">
               <label class="mb-2" for="file_path">File PDF</label>
               <div>
                  <span class="text-muted text-sm mb-2">Kosongkan jika tidak ingin mengganti file saat ini.</span>
               </div>
               <input type="file" name="file_path" id="file_path" wire:model='file_path'
                  class="form-control @error('file_path') is-invalid @enderror">
               @error('file_path')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-12">
               <label for="files" class="mb-2">Cover Ebook <sup class="text-danger">*</sup></label>
               <div wire:ignore>
                  <div id="files" class="filepond @error('files') is-invalid @enderror"></div>
               </div>
               @error('files')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
   
            <div class="col-12">
               <label class="mb-2" for="file_path">Ringkasan/Sinopsis</label>
               <div wire:ignore>
                  <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="4"
                     wire:model='body'></textarea>
               </div>
               @error('body')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
         </div>
         <div class="col-12 mt-5 mb-2 d-flex justify-content-end gap-3">
            <a class="btn btn-light" href="{{ route('ebooks.index') }}"><i class="mdi mdi-arrow-left me-2"></i>Kembali</a>
            <button class="btn btn-primary" type="button" wire:click='update()'><i
                  class="mdi mdi-content-save-check me-2"></i>Simpan Perubahan</button>
         </div>
      </div>
      {{-- @dump($existingFiles) --}}
   </div>
   
   @push('scripts')
   <script>
      $(document).ready(function() {
         $('#body').summernote({
            height: 300,
            tabsize: 2,
            lang: 'id-ID',
            callbacks: {
               onChange: function(contents, $editable) {
                  @this.set('body', contents);
                  // Livewire.find(Livewire.first()).set('body', contents)
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
         $("#published_at").flatpickr({
            mode: "single",
            dateFormat: "Y",
            view: "years"
         });
   
         FilePond.registerPlugin(FilePondPluginImagePreview);
         const inputElement = document.querySelector('#files');
         const pond = FilePond.create(inputElement, {
            files: @json($existingFiles),
         });
   
         pond.setOptions({
            allowMultiple: 'true',
            server: {
               process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                  @this.upload('files', file, load, error, progress);
   
               },
               // revert: (filename, load) => {
               //    @this.removeUpload('files', filename, load);
               // },
               revert: (filename, load) => {
                  if (filename.includes('storage/ebooks/cover/')) {
                     const fileId = filename.split('/').pop();
                     @this.removeFile(fileId, load);
                  } else {
                     @this.removeUpload('files', filename, load);
                  }
               }
   
            }
         });
      });
   </script>
   @endpush
</div>