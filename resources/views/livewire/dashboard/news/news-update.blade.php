<div class="card">
   <div class="card-body">
      <div class="row g-4">
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="title">Judul Berita</label>
               </div>
               <div class="col-10">
                  <input type="text" id="title" wire:model='title' class="form-control @error('title') is-invalid @enderror" />
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="about">Topik</label>
               </div>
               <div class="col-10">
                  <input type="text" id="about" wire:model='about' class="form-control @error('about') is-invalid @enderror" />
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="file_path">Cover</label>
               </div>
               <div class="col-10">
                  <div wire:ignore>
                     <div id="file_path" class="filepond @error('file_path') is-invalid @enderror"></div>
                  </div>
                  @error('file_path')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-4">
                  <label for="body">Body</label>
               </div>
               <div class="col-12 mt-3">
                  <div wire:ignore>
                     <textarea name="body" wire:model='body' class="form-control @error('body') is-invalid @enderror" id="editbody" rows="4" placeholder="Isi berita"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 mb-3 d-flex justify-content-end gap-3">
            <a class="btn btn-light" href="{{ route('news.index') }}"><i
                  class="mdi mdi-arrow-left me-2"></i>Kembali</a>
            <button class="btn btn-primary" type="button" wire:click='update()' wire:loading.attr="disabled"><i
                  class="mdi mdi-content-save-check me-2"></i>Perbarui Data</button>
         </div>
      </div>
   </div>
</div>

@push('scripts')
   <script>
      $(document).ready(function() {
         $('#editbody').summernote({
            placeholder: 'Isi body dari Konten Berita',
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
            const inputElement = document.querySelector('#file_path');
            const pond = FilePond.create(inputElement, {
               files: @json($existingFile),
            });

            pond.setOptions({
               server: {
                  process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                     @this.upload('file_path', file, load, error, progress);

                  },
                  // revert: (filename, load) => {
                  //    @this.removeUpload('files', filename, load);
                  // },
                  revert: (filename, load) => {
                     if (filename.includes('storage/news/cover/')) {
                        const fileId = filename.split('/').pop();
                        @this.removeFile(fileId, load);
                     } else {
                        @this.removeUpload('file_path', filename, load);
                     }
                  }

               }
            });
      });
   </script>
@endpush
