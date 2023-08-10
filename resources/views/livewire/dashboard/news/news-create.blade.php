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
            </div>
         </div>
         <div class="col-md-12">
            <div class="row">
               <div class="col-4">
                  <label for="file_path">Body</label>
               </div>
               <div class="col-12 mt-3">
                  <div wire:ignore>
                     <textarea name="body" wire:model.defer='body' class="form-control @error('body') is-invalid @enderror" id="body" rows="4" placeholder="Isi berita"></textarea>
                  </div>
               </div>
            </div>
         </div>
         <div class="float-end my-3">
            <button class="btn btn-primary px-2" type="button" wire:click="store()"><i class="fas fa-save me-2"></i>Simpan Berita</button>
            <button class="btn btn-primary px-2" type="button" wire:click="store('save-and-continue')"><i class="fas fa-pen-to-square me-2"></i>Simpan Dan Tambah Kembali</button>
         </div>
      </div>
   </div>
</div>

@push('scripts')
   <script>
      $(document).ready(function() {
         $('#body').summernote({
            height: 200,
            callbacks: {
               onChange: function(contents, $editable) {
                  @this.set('body', contents);
               }
            }
         });
      });
   </script>
@endpush
