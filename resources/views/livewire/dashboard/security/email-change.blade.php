<div>
    <div class="card mb-4">
        <h5 class="card-header">
           Ganti Email
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
                             class="form-control @error('current_password') is-invalid @enderror"
                             type="password"
                             name="current_password"
                             wire:model.lazy='current_password'
                             id="email.current_password"
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                          <label
                             for="current_password">Masukkan password saat ini</label>
                           @error('current_password')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror
                       </div>
                       <span
                          class="input-group-text cursor-pointer"><i
                             class="mdi mdi-eye-off-outline"></i></span>
                    </div>
                 </div>
                 <div
                    class="mb-3 col-md-6">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control"
                             type="email"
                             id="current_email"
                             name="current_email"
                             value="{{ $current_user['email'] }}"
                             readonly />
                          <label
                             for="current_email">Email saat ini</label>
                       </div>
                    </div>
                 </div>
              </div>
              <div class="row">
                 <div
                    class="mb-4 col-md-6">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control @error('new_email') is-invalid @enderror"
                             type="email"
                             name="new_email"
                             wire:model='new_email'
                             id="new_email"
                            />
                          <label
                             for="new_email">Alamat email yang baru</label>
                           @error('new_email')
                              <div class="invalid-feedback">
                                 {{ $message }}
                              </div>
                           @enderror
                       </div>
                     </div>
                 </div>
                 <div class="mb-4 col-md-3 form-password-toggle d-flex align-items-center">
                    {{-- <button type="button" wire:click.prevent='sendEmail()' class="btn btn-primary px-2 py-1 text-white">
                       <span class="spinner-border me-1" role="status" aria-hidden="true" wire:loading wire:target='sendEmail()'></span>
                       Verifikasi
                  </button> --}}
                       <button class="btn btn-primary waves-effect waves-light" type="button" wire:click.prevent='sendEmail'>
                        <div wire:loading wire:target='sendEmail'>
                           <span class="spinner-border" role="status" aria-hidden="true"></span>
                           <span class="visually-hidden">Loading...</span>
                        </div>
                        <span class="ms-2">Kirim</span>
                      </button>
                      {{-- <div wire:loading wire:target='sendEmail'>
                        <span class="spinner-border" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                     </div> --}}
                 </div>
              </div>
              <div class="row">
                 <div
                    class="mb-4 col-md-6">
                    <div
                       class="input-group input-group-merge">
                       <div
                          class="form-floating form-floating-outline">
                          <input
                             class="form-control @error('otp')
                                is-invalid
                             @enderror"
                             type="number"
                             name="otp"
                             wire:model='otp'
                             id="otp"
                             placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                          <label
                             for="otp">Masukkan kode OTP</label>
                             @error('otp')
                             <div class="invalid-feedback">
                                   {{ $message }}
                             </div>
                          @enderror
                       </div>
                       <span
                          class="input-group-text cursor-pointer"><i
                             class="mdi mdi-eye-off-outline"></i></span>
                    </div>
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
                 <button
                    type="submit"
                    class="btn btn-primary me-2">
                    Simpan perubahan
                 </button>
                 <button
                    type="reset"
                    class="btn btn-outline-secondary"
                    wire:click='resetForm()'>
                    Batalkan
                 </button>
              </div>
           </form>
        </div>
     </div>
</div>
