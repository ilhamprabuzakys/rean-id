<div>
   <div class="card mb-4">
      <h5 class="card-header">
         Ganti Email
      </h5>
      <div class="card-body">
         <form wire:submit.prevent='update()'>
            <div class="row mb-3">
               <div class="col-md-6 form-password-toggle">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('current_password') is-invalid @enderror" type="password"
                           name="current_password" wire:model.lazy='current_password' id="email_current_password"
                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <label for="email_current_password">Masukkan password saat ini</label>
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
                        <input class="form-control" type="email" id="email_current_email" name="current_email"
                           value='{{ $user->email }}' readonly />
                        <label for="email_current_email">Email saat ini</label>
                     </div>
                     <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                  </div>
               </div>
            </div>
            <div class="row mb-4">
               <div class="col-md-6">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('new_email') is-invalid @enderror" type="email"
                           name="new_email" wire:model='new_email' id="new_email" />
                        <label for="new_email">Alamat email yang baru</label>
                     </div>
                     <span class="input-group-text"><i class="mdi mdi-email-outline"></i></span>
                  </div>
               </div>
               <div class="col-md-3 form-password-toggle d-flex align-items-center">
                  <button class="btn btn-primary waves-effect waves-light" type="button"
                     wire:click.prevent='sendEmail()' id="sendEmailBTN">
                     <div wire:loading wire:target='sendEmail'>
                        <span class="spinner-border" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                     </div>
                     <span class="ms-2"><i class="fas fa-paper-plane me-2"></i>Kirim OTP</span>
                  </button>
               </div>
               @error('new_email')
               <div class="ms-2 mt-2 small text-danger">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="row mb-4">
               <div class="col-md-6">
                  <div class="input-group input-group-merge">
                     <div class="form-floating form-floating-outline">
                        <input class="form-control @error('otp')
                                is-invalid
                             @enderror" type="number" name="otp" wire:model='otp' id="otp"
                           placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <label for="otp">Masukkan kode OTP</label>
                        @error('otp')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                        @enderror
                     </div>
                  </div>
                  @if ($otpSended == true)
                  <div class="text-muted small mt-1">
                     Tidak menerima OTP? coba klik kembali tombol diatas, atau klik <a href="#" wire:click.prevent='sendEmail()'>link ini</a>.
                  </div>
                  @endif
               </div>
            </div>

            <h6 class="text-body">
               Tutorial Ganti Email:
            </h6>
            <ul class="ps-3 mb-0">
               <li class="mb-1">
                  Verifikasi terlebih dahulu Password saat ini
               </li>
               <li class="mb-1">
                  Masukkan alamat Email yang baru
               </li>
               <li class="mb-1">
                  Klik tombol Verifikasi (Kode OTP akan dikirim ke alamat Email yang baru)
               </li>
               <li>
                  Masukkan kode OTP
               </li>
            </ul>
            <div class="mt-4">
               <button type="submit" class="btn btn-primary me-2">
                  Simpan perubahan
               </button>
               <button type="reset" class="btn btn-outline-secondary" wire:click='resetForm()'>
                  Batalkan
               </button>
            </div>
         </form>
      </div>
   </div>
</div>