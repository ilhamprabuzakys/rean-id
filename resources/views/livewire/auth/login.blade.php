<form wire:submit.prevent='authenticate' id="loginForm">
   <div class="form-floating form-floating-outline mb-3">
      <input type="text" class="form-control" id="input-username" name="login" wire:model='login'
         placeholder="Masukkan email atau username anda" autofocus>
      <label for="email">Email atau Username</label>
   </div>
   <div class="mb-3">
      <div class="form-password-toggle">
         <div class="input-group input-group-merge">
            <div class="form-floating form-floating-outline">
               <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                  name="password" wire:model='password' value="{{ old('password') }}"
                  placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                  aria-describedby="password" />
               <label for="password">Password</label>
               @error('password')
               <div class="invalid-feedback">
                  {{ $errors->first('password') }}
               </div>
               @enderror
            </div>
            <a class="input-group-text cursor-pointer" data-bs-toggle="tooltip" data-bs-placement="top" title="Tampilkan password">
               <i class="mdi mdi-eye-off-outline"></i>
            </a>
         </div>
      </div>
   </div>
   <div class="mb-3 d-flex justify-content-between">
      <div class="form-check">
         <input class="form-check-input" type="checkbox" id="remember-me" name="remember" wire:model='remember'
            value="true" checked>
         <label class="form-check-label" for="remember-me" data-bs-toggle="tooltip" data-bs-placement="right" title="Sesi anda akan disimpan sehingga tidak perlu login ulang">
            Ingat saya
         </label>
      </div>
      <a href="{{ route('password.request') }}" class="float-end mb-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Jika anda melupakan password anda, klik link dibawah ini">
         <span>Lupa Password?</span>
      </a>
   </div>
   <div class="mb-3">
      <button class="btn btn-primary d-flex align-items-center justify-content-center w-100" type="submit">
         <div wire:loading wire:target='authenticate'>
             <span class="spinner-border" role="status" aria-hidden="true"></span>
             <span class="visually-hidden">Loading...</span>
         </div>
         <span class="ms-2">Masuk</span>
     </button>
     
   </div>
</form>