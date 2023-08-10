 <div id="EbookCreateCollapseSection">
   <div class="card">
      <div class="card-header">
         <button type="button" class="accordion-button" data-bs-toggle="collapse" data-bs-target="#collapseEbookCreateForm" aria-expanded="true" aria-controls="collapseEbookCreateForm"> <i class="fas fa-plus me-2"></i> Buat Ebook
         </button>
      </div>
      <div id="collapseEbookCreateForm" class="accordion-collapse collapse show" data-bs-parent="#EbookCreateCollapseSection">
         <form wire:submit.prevent='store()'>
            <div class="card-body">
               <div class="row g-4">
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="title" wire:model='title' class="form-control @error('title') is-invalid @enderror" />
                        <label for="title">Judul Buku</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     {{-- <div class="form-floating form-floating-outline">
                        <input type="number" id="pages" wire:model='pages' class="form-control @error('pages') is-invalid @enderror" />
                        <label for="pages">Pages</label>
                     </div> --}}
                     <div class="input-group input-group-merge">
                        <input type="text" class="form-control @error('pages') is-invalid @enderror" id="pages" wire:model='pages' placeholder="Pages" />
                        <span class="input-group-text" id="pages-icon">Page</span>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="author" wire:model='author' class="form-control @error('author') is-invalid @enderror" />
                        <label for="author">Author</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="published_at" wire:model='published_at' class="form-control @error('published_at') is-invalid @enderror" />
                        <label for="published_at">Tahun Publish</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-floating form-floating-outline">
                        <textarea name="description" class="form-control" id="description" rows="4" placeholder="Deskripsi Ebook" wire:model='description'></textarea>
                     </div>
                  </div>
               </div>
               <div class="float-end my-3">
                  <button class="btn btn-primary px-2" type="submit"><i class="fas fa-save me-2"></i>Simpan Ebook</button>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
