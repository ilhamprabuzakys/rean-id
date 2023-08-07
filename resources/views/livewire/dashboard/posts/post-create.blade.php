<div>
    <form wire:submit.prevent='store' enctype="multipart/form-data" id="createPost">
        @csrf
        <div class="row mb-3">
           <div class="col-lg-12">
              <label for="title" class="form-label">Judul <sup class="text-danger">*</sup></label>
              <input type="text"
                 class="form-control @error('title')
                    is-invalid
                 @enderror" name="title" wire:model='title' id="title" value="{{ old('title') }}">
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
              @enderror" name="category_id" wire:model='category_id' id="category_id">
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
              @enderror" name="tags[]" wire:model='tags[]' id="tags-multi-select" multiple>
                 <optgroup label="Pilih label">
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                    @endforeach
                 </optgroup>
              </select>
           </div>
           <div class="col-lg-2">
              <label for="user_id" class="form-label">Author</label>
              <input type="text"
                 class="form-control" id="user_id" placeholder="{{ auth()->user()->name }}" readonly>
              <input type="hidden" name="user_id" wire:model='user_id' value="{{ auth()->user()->id }}">
           </div>
        </div>
        <div class="row mb-3">
           <div class="col-lg-12">
              <label for="slug" class="form-label">Slug <sup class="text-danger">*</sup></label>
              <div class="input-group">
                 <span class="input-group-text" id="slug-input-addon">{{ config('app.url') }}posts/</span>
                 <input type="text"
                    class="form-control @error('slug') is-invalid @enderror" name="slug" wire:model='slug' id="slug" value="{{ old('slug') }}" readonly>
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
              <input type="file" name="file_path" wire:model='file_path' id="file_path" class="form-control @error('file_path')
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
           <script>
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
           </script>
        </div>
        <div class="row mb-3">
           <div class="col-lg-12">
              <label for="body" class="form-label">Body <sup class="text-danger">*</sup></label>
              {{-- <div id="body"></div> --}}
              <textarea name="body" wire:model='body' id="body-editor" rows="3" class="@error('body')
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
     </form>
</div>
