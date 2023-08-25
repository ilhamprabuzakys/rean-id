<div>
   <div class="card mb-4">
      <h5 class="card-header">
         Ganti Password
         <div class="text-muted small mt-2 mb-0">
            <small>Lupa password anda? klik link berikut untuk reset password, <a href="{{ route('password.request') }}" >Klik disini</a>.</small>
         </div>
         <div class="text-muted small mt-1 mb-0">
            <small>Jika anda mendaftar dengan akun google, maka password anda adalah nama depan email yang anda gunakan saat registrasi/login yakni <strong>{{ explode('@', auth()->user()->email)[0] }}</strong>.</small>
         </div>
      </h5>
      <div class="card-body">
         <form wire:submit.prevent='update()'>
            <div class="row mb-3">
               <div class="col-md-6 form-password-toggle">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('current_password') is-invalid @enderror" type="password"
                           name="current_password" wire:model.lazy='current_password' id="email.current_password"
                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <label for="current_password">Masukkan password saat ini</label>
                        @error('current_password')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                     <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control" type="email" id="current_email" name="current_email"
                           value='{{ auth()->user()->email }}' readonly />
                        <label for="current_email">Email saat ini</label>
                     </div>
                     <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                  </div>
               </div>
            </div>
            <div class="row mb-4">
               <div class="col-md-6 form-password-toggle">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('new_password')
                                 is-invalid
                              @enderror" type="password" id="new_password" name="new_password"
                           wire:model.live='new_password'
                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <label for="new_password">Password Baru</label>
                        @error('new_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                     </div>
                     <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
                  </div>
               </div>
               <div class="col-md-6 form-password-toggle">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('confirmation_password')
                                 is-invalid
                              @enderror" type="password" name="confirmation_password"
                           wire:model.live='confirmation_password' id="confirmation_password"
                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <label for="confirmation_password">Konfirmasi Password Baru</label>
                        @error('confirmation_password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                     </div>
                     <span class="input-group-text cursor-pointer"><i class="mdi mdi-eye-off-outline"></i></span>
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
               <button type="submit" class="btn btn-primary me-2">
                  Simpan perubahan
               </button>
               <button type="button" class="btn btn-outline-secondary" wire:click='resetForm()'>
                  Batalkan
               </button>
            </div>
         </form>
      </div>
   </div>
</div>