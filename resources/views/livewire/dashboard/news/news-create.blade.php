<div class="card">
   <div class="card-body">
      <div class="row g-4">
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="title">Judul Berita <sup class="text-danger">*</sup></label>
               </div>
               <div class="col-10">
                  <input type="text" id="title" wire:model='title' class="form-control @error('title') is-invalid @enderror" />
                  @error('title')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="about">Topik <sup class="text-danger">*</sup></label>
               </div>
               <div class="col-10">
                  <input type="text" id="about" wire:model='about' class="form-control @error('about') is-invalid @enderror" />
                  @error('about')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="file_path">Cover <sup class="text-danger">*</sup></label>
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
                  <label for="body">Body <sup class="text-danger">*</sup></label>
               </div>
               <div class="col-12 mt-3">
                  <div wire:ignore>
                     <textarea name="body" wire:model='body' class="form-control @error('body') is-invalid @enderror" id="body" rows="4" placeholder="Isi berita"></textarea>
                     @error('body')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
            </div>
         </div>
         <div class="col-12 mb-3 d-flex justify-content-end gap-3">
            <a class="btn btn-light" href="{{ route('news.index') }}"><i
                  class="mdi mdi-arrow-left me-2"></i>Kembali</a>
            <button class="btn btn-primary" type="button" wire:click='store()' wire:loading.attr="disabled"><i
                  class="mdi mdi-content-save-check me-2"></i>Simpan Data</button>
         </div>
      </div>
   </div>
</div>

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
         const inputElement = document.querySelector('#file_path');
         const pond = FilePond.create(inputElement);
         pond.setOptions({
            server: {
               process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                  @this.upload('file_path', file, load, error, progress);

               },
               revert: (filename, load) => {
                  @this.removeUpload('file_path', filename, load);
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
