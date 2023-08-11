   <div class="card">
      <div class="card-body">
         <div class="row g-4">
            <div class="col-md-6">
               <div class="form-floating form-floating-outline">
                  <input type="text" id="title" wire:model='title' class="form-control @error('title') is-invalid @enderror" />
                  <label for="title">Judul Buku</label>
               </div>
               @error('title')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-md-6">
               <div class="input-group input-group-merge">
                  <input type="number" class="form-control @error('pages') is-invalid @enderror" id="pages" wire:model='pages' placeholder="Pages" />
                  <span class="input-group-text" id="pages-icon">Page</span>
               </div>
               @error('pages')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-md-6">
               <div class="form-floating form-floating-outline">
                  <input type="text" id="author" wire:model='author' class="form-control @error('author') is-invalid @enderror" />
                  <label for="author">Author</label>
               </div>
               @error('author')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-md-6">
               <div class="form-floating form-floating-outline">
                  <input type="text" id="published_at" wire:model='published_at' class="form-control @error('published_at') is-invalid @enderror" />
                  <label for="published_at">Tahun Publish</label>
               </div>
               @error('published_at')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-12">
               <div class="form-floating form-floating-outline">
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" placeholder="Deskripsi Ebook" wire:model='description'></textarea>
               </div>
               @error('description')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-12">
               <label for="cover_path">Cover</label>
               <input type="file" name="cover_path" id="cover_path" wire:model='cover_path' class="form-control @error('cover_path') is-invalid @enderror">
               @error('cover_path')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-12">
               <label for="file_path">File PDF</label>
               <input type="file" name="file_path" id="file_path" wire:model='file_path' class="form-control @error('file_path') is-invalid @enderror">
               @error('file_path')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <div class="col-12">
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
         <div class="float-end my-3 gap-3">
            <button class="btn btn-primary px-2" type="submit" wire:click='update()'><i class="fas fa-save me-2"></i>Simpan Ebook</button>
            <a class="btn btn-secondary px-2" href="{{ route('ebooks.index') }}"><i class="fas fa-x me-2"></i>Batalkan</a>
         </div>
      </div>
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
               }
            });
         });
         $("#published_at").flatpickr();
      </script>
   @endpush
