<div class="card">
   <div class="card-body">
      <div class="row g-4">
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="title">Judul Berita</label>
               </div>
               <div class="col-10">
                  <input type="text" id="title" wire:model.defer='title' class="form-control @error('title') is-invalid @enderror" />
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="about">Topik</label>
               </div>
               <div class="col-10">
                  <input type="text" id="about" wire:model.defer='about' class="form-control @error('about') is-invalid @enderror" />
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-2">
                  <label for="file_path">Cover</label>
               </div>
               <div class="col-10">
                  <input type="file" id="file_path" wire:model.defer='file_path' class="form-control @error('file_path') is-invalid @enderror">
               </div>
               <div class="col-12 my-4">
                  @if ($this->file_path)
                     <div style="height: 100px; width: 300px;">
                        <img src="{{ $this->file_path->temporaryUrl() }}" alt="cover_image" class="img-fluid"
                           style="width: -webkit-fill-available; height: -webkit-fill-available;object-fit: cover;">
                     </div>
                  @elseif ($news->file_path)
                     <div style="height: 100px; width: 300px;">
                        <img src="{{ asset($news->file_path) }}" alt="cover_image" class="img-fluid" style="width: -webkit-fill-available; height: -webkit-fill-available; object-fit: cover;">
                     </div>
                  @else
                  @endif

                  {{-- @if ($this->avatar)
                     <img src="{{ $this->avatar->temporaryUrl() }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                  @elseif (auth()->user()->avatar)
                     <img src="{{ asset(auth()->user()->avatar) }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                  @else
                     <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="user-avatar" class="d-block w-px-120 h-px-120 rounded" id="uploadedAvatar" />
                  @endif --}}
               </div>
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-4">
                  <label for="file_path">Body</label>
               </div>
               <div class="col-12 mt-3">
                  <div wire:ignore>
                     <textarea name="body" wire:model.defer='body' class="form-control @error('body') is-invalid @enderror" id="editbody" rows="4" placeholder="Isi berita"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="float-end my-3">
            <button class="btn btn-primary px-2" type="button" wire:click="update()"><i class="fas fa-save me-2"></i>Perbarui Berita</button>
         </div>
      </div>
   </div>
</div>

@push('scripts')
   <script>
      $(document).ready(function() {
         $('#editbody').summernote({
            placeholder: 'Isi body dari Konten Berita',
            height: 400,
            tabsize: 2,
            lang: 'id-ID',
            callbacks: {
               onChange: function(contents, $editable) {
                  @this.set('body', contents);
               }
            }
         });
      });
   </script>
@endpush
