<!--  Large modal example -->
<div wire:ignore.self class="modal fade" id="editUserModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Edit Data User <strong>{{ $name }}</strong></h3>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="update">
            <div class="modal-body">
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
               </div>
               <div class="row justify-content-between mb-2">
                  <div class="col-3">
                     <label for="title" class="form-label">Email <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-9">
                     <input type="email"
                        class="form-control @error('email')
                        is-invalid
                     @enderror" wire:model.lazy="email">
                     @error('email')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <div class="row justify-content-between mb-2">
                  <div class="col-3">
                     <label for="role" class="form-label">Role<sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-9">
                     <select class="form-select" name="role" id="role" wire:model.lazy="role">
                        <option selected>Pilih Role</option>
                        @foreach ($roles as $role)
                           <option value="{{ $role->key }}">{{ $role->label }}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="row justify-content-between mb-2">
                  <div class="col-3">
                     <label for="title" class="form-label">Password <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-9">
                     <input type="password"
                        class="form-control @error('password')
                           is-invalid
                        @enderror" wire:model.lazy="password">
                     @error('password')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">
                  <i class="fas fa-xmark fa-md me-2"></i>
                  Tutup</button>
               <button id="save-button" class="btn btn-primary px-2 not-allowed" type="submit">
                  <i class="fas fa-save fa-md me-2"></i>
                  Simpan Data</button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
