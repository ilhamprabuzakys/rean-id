<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-body">
               <div class="row mb-3">
                  <div class="col-lg-12">
                     <label for="title" class="form-label">Judul <sup class="text-danger">*</sup></label>
                     <input type="text"
                        class="form-control @error('title')
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
                            @enderror" wire:model="category_id"
                        id="category_id">
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
                        @enderror" name="tags[]" id="tags-multi-select"
                        multiple>
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
                           class="form-control @error('slug') is-invalid @enderror" wire:model="slug" id="slug">
                     </div>
                     @error('slug')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
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
                     <textarea name="body" class="form-control @error('body') is-invalid @enderror" id="body" rows="4" wire:model='body'></textarea>
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
                     <button class="btn btn-primary" type="button" wire:click='store()'>
                        Simpan Data
                        <i class="mdi mdi-content-save-check ms-2"></i>
                     </button>
                  </div>
                  <div class="col">
                     <button class="btn btn-primary" type="button" wire:click='store("no-return")'>
                        Simpan Data Dan Isi Kembali
                        <i class="mdi mdi-content-save-edit ms-2"></i>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <script>
      var title = '{{ $title }}';
      document.getElementById('slug').value = title;


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
            @this.set('description', '');
         });

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
</div>
