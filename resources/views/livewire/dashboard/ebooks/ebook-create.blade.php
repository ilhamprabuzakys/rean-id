   <div class="card">
      <form wire:submit.prevent='store()'>
         <div class="card-body">
            <div class="row g-4">
               <div class="col-md-6">
                  <label class="mb-2" for="title">Judul Buku <sup class="text-danger">*</sup></label>
                  <input type="text" id="title" wire:model='title' class="form-control @error('title') is-invalid @enderror" />
                  @error('title')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="col-md-6">
                  <label class="mb-2" for="pages">Total halaman <sup class="text-danger">*</sup></label>

                  <div class="input-group input-group-merge">
                     <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" wire:model='pages' placeholder="Pages" />
                     <span class="input-group-text" id="pages-icon">Page</span>
                     @error('pages')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="col-md-6">
                  <label class="mb-2" for="author">Penulis <sup class="text-danger">*</sup></label>
                  <input type="text" id="author" wire:model='author' class="form-control @error('author') is-invalid @enderror" />
                  @error('author')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="col-md-6">
                  <label class="mb-2" for="published_at">Tahun Publish <sup class="text-danger">*</sup></label>
                  <input type="text" id="published_at" wire:model='published_at' class="form-control @error('published_at') is-invalid @enderror" />
                  @error('published_at')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="col-12">
                  <label class="mb-2" for="description">Deskripsi</label>
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Deskripsi Ebook" wire:model='description'></textarea>
                  @error('description')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="col-12">
                  <label class="mb-2" for="file_path">File PDF</label>
                  <input type="file" name="file_path" id="file_path" wire:model='file_path' class="form-control @error('file_path') is-invalid @enderror">
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
                     <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="4" wire:model='body'></textarea>
                  </div>
                  @error('body')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
            </div>
         </div>
         <div class="float-end my-3 me-2">
            <button class="btn btn-primary px-2" type="submit"><i class="fas fa-save me-2"></i>Simpan Ebook</button>
         </div>
      </form>
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
            $("#published_at").flatpickr();

            FilePond.registerPlugin(FilePondPluginImagePreview);
            const inputElement = document.querySelector('#files');
            const pond = FilePond.create(inputElement);

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

            Livewire.on('stored', () => {
               pond.removeFiles();
               @this.set('body', '');
            });
         });
      </script>
   @endpush
