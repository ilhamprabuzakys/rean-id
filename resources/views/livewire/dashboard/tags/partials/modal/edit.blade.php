<!--  Large modal example -->
<div wire:ignore.self class="modal fade" id="editTagModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Edit Data Tag <strong>{{ $name_placeholder ?? '' }}</strong></h3>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="update">
            <div class="modal-body">
               <div class="row justify-content-between mb-2">
                  <div class="col-3">
                     <label for="title" class="form-label">Nama <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-9">
                     <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.live.debounce.500ms="name">
                     <div wire:loading wire:target="name" class="spinner-border spinner-border-sm" role="status">
                        <span class="sr-only">Loading...</span>
                     </div>

                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <span class="d-block text-danger mt-3 text-sm">Dengan <strong>memperbarui</strong> data ini akan membuat semua postingan yang memiliki tag <strong>#{{ $name_placeholder ?? '' }}</strong> menjadi <strong>diperbarui</strong> pada daftar <strong>tagnya</strong>.</span>
            </div>
            <div class="modal-footer">
               <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">
                  <i class="fas fa-xmark fa-md me-2"></i>
                  Tutup</button>
               <button id="save-button" class="btn btn-primary px-2" type="submit" wire:loading.attr="disabled">
                  <i class="fas fa-save fa-md me-2"></i>
                  Perbarui Data</button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
