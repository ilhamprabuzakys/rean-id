<form wire:submit.prevent='authenticate'>
    <div class="form-floating form-floating-outline mb-3">
       {{-- {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }} @error('login') is-invalid @enderror --}}
       <input type="text" class="form-control" id="input-username" name="login" wire:model='login' placeholder="Masukkan email atau username anda" autofocus>
       <label for="email">Email atau Username</label>
       {{-- @if ($errors->has('username') || $errors->has('email'))
          <div class="invalid-feedback">
             {{ $errors->first('username') ?: $errors->first('email') }}
          </div>
       @endif
       @error('login')
             <div class="invalid-feedback">
                {{ $errors->first('login') }}
             </div>
       @enderror --}}
    </div>
    <div class="mb-3">
       <div class="form-password-toggle">
          <div class="input-group input-group-merge">
             <div class="form-floating form-floating-outline">
                <input type="{{ $passwordToggle == 1 ? 'password' : 'text' }}" id="password" class="form-control @error('password') is-invalid @enderror" name="password" wire:model='password'
                value="{{ old('password') }}" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"   
                   aria-describedby="password" />
                <label for="password">Password</label>
                @error('password')
                   <div class="invalid-feedback">
                      {{ $errors->first('password') }}
                   </div>
                @enderror
             </div>
             <a class="input-group-text cursor-pointer" wire:click.prevent='changePasswordToggle'><i class="{{ $passwordToggle == 1 ? 'mdi mdi-eye-off-outline' : 'mdi mdi-eye-outline' }}"></i></a>
          </div>
       </div>
    </div>
    <div class="mb-3 d-flex justify-content-between">
       <div class="form-check">
          <input class="form-check-input" type="checkbox" id="remember-me" name="remember" wire:model='remember' value="true" checked>
          <label class="form-check-label" for="remember-me">
             Ingat saya
          </label>
       </div>
       <a href="{{ route('password.request') }}" class="float-end mb-1">
          <span>Lupa Password?</span>
       </a>
    </div>
    <div class="mb-3">
       <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
    </div>
 </form>
