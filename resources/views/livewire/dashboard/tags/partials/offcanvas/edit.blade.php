<div wire:ignore.self class="offcanvas offcanvas-end" tabindex="-1" id="editCategory" aria-labelledby="editCategoryLabel">
   <div class="offcanvas-header">
      <h5 id="editCategoryLabel" class="offcanvas-title">Edit Kategori</h5>
      <button type="button" wire:click='closeCanvas' class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
   </div>
   <div class="offcanvas-body mx-0 flex-grow-0">
      <form wire:submit.prevent="update">
         <div class="row justify-content-between mb-2">
            <div class="col-3">
               <label for="title" class="form-label">Nama <sup class="text-danger">*</sup></label>
            </div>
            <div class="col-9">
               <input type="text"
                  class="form-control @error('name')
                     is-invalid
                  @enderror" wire:model.lazy="name">
               @error('name')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
               @enderror
            </div>
            <span class="d-block text-danger mt-3 text-sm">Dengan <strong>memperbarui</strong> data ini akan membuat semua postingan yang memiliki kategori {{ $name }} ini akan <strong>diperbarui</strong> pada jenis <strong>kategorinya</strong>.</span>
         </div>
         <div class="row mt-4 justify-content-start">
            <div class="col-7 pe-0">
               <button type="submit" class="btn btn-primary mb-2 waves-effect waves-light">
                  <i class="fas fa-save fa-md me-2"></i>
                  Simpan Data</button>
            </div>
            <div class="col-4 ps-0">
               <button type="button" wire:click='closeCanvas' class="btn btn-secondary waves-effect" data-bs-dismiss="offcanvas">
                  <i class="fas fa-xmark fa-md me-2"></i>
                  Batalkan</button>
            </div>
         </div>
      </form>
   </div>
</div>

