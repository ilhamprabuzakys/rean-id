<form wire:submit.prevent='store'>
   <div class="row justify-content-center mb-4">
      <div class="col-6">
          <div class="row align-items-center">
              <div class="col-3">
                  <label for="name" class="form-label">Name <sup class="text-danger">*</sup></label>
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
          </div>
      </div>
      <div class="col-6">
          <div class="row align-items-center">
              <div class="col-3">
                  <label for="slug" class="form-label">Slug <sup class="text-danger">*</sup></label>
               </div>
               <div class="col-9">
                  <input type="text"
                     class="form-control @error('slug')
                     is-invalid
                  @enderror" wire:model.lazy="slug">
                  @error('slug')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
          </div>
      </div>
   </div>
   <div class="row justify-content-end mb-3">
      <div class="col-4 d-flex justify-content-end">
         <button class="btn btn-primary" id="buttonTambahTag" type="submit">
            <span><i class="fas fa-save fa-md me-1"></i>
            <span class="d-none d-sm-inline-block">Simpan</span></span>
         </button>
      </div>
   </div>
</form>