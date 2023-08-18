<div>
    <div class="card mb-4">
        <h5 class="card-header">
           Ganti Password
        </h5>
        <div class="card-body">
           <form wire:submit.prevent='update()'>
              <div class="row">
                 <div
                    class="mb-3 col-md-6 form-password-toggle">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control @error('current_password')
                                is-invalid
                             @enderror"
                             type="password"
                             name="current_password"
                             wire:model='current_password'
                             id="password.current_password"
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                          <label
                             for="current_password">Password Saat Ini</label>
                             @error('current_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                       </div>
                       <span
                          class="input-group-text cursor-pointer"><i
                             class="mdi mdi-eye-off-outline"></i></span>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div
                    class="mb-4 col-md-6 form-password-toggle">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control @error('new_password')
                                is-invalid
                             @enderror"
                             type="password"
                             id="new_password"
                             name="new_password"
                             wire:model='new_password'
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                          <label
                             for="new_password">Password Baru</label>
                             @error('new_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                       </div>
                       <span
                          class="input-group-text cursor-pointer"><i
                             class="mdi mdi-eye-off-outline"></i></span>
                    </div>
                 </div>
                 <div
                    class="mb-4 col-md-6 form-password-toggle">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control @error('confirmation_password')
                                is-invalid
                             @enderror"
                             type="password"
                             name="confirmation_password"
                             wire:model='confirmation_password'
                             id="confirmation_password"
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                          <label
                             for="confirmation_password">Konfirmasi Password Baru</label>
                             @error('confirmation_password')
                                <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                       </div>
                       <span
                          class="input-group-text cursor-pointer"><i
                             class="mdi mdi-eye-off-outline"></i></span>
                    </div>
                 </div>
              </div>
              <h6 class="text-body">
                 Password persyaratan:
              </h6>
              <ul class="ps-3 mb-0">
                 <li class="mb-1">
                    Minimal 8 huruf, lebih banyak lebih baik
                 </li>
                 <li class="mb-1">
                    Memiliki setidaknya 1 karakter yang huruf besar
                 </li>
                 <li>
                    Memiliki setidaknya 1 simbol khusus
                 </li>
              </ul>
              <div class="mt-4">
                 <button
                    type="submit"
                    class="btn btn-primary me-2">
                    Simpan perubahan
                 </button>
                 <button
                    type="button"
                    class="btn btn-outline-secondary" wire:click='resetForm()'>
                    Batalkan
                 </button>
              </div>
           </form>
        </div>
     </div>
</div>
