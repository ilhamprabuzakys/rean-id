@extends('auth.auth')
@section('header')
   <h4 class="mb-2 fw-semibold">Ganti Password</h4>
   <p class="mb-4">
      Password baru anda mesti berbeda dengan password anda sebelumnya.
   </p>
@endsection
@section('content')
   <form class="mb-0" action="{{ route('password.update') }}" method="POST">
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      {{-- <div class="form-floating form-floating-outline mb-3">
            <input
               type="email"
               class="form-control @error('email') is-invalid @enderror"
               id="email"
               name="email"
               value="{{ $email ?? old('email') }}"
               placeholder="Masukkan email/nomer telepon anda"
               required />
            <label for="email">Email<sup class="text-danger">*</sup></label>
            @error('email')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
      </div> --}}
      <div class="mb-3 form-password-toggle">
         <div class="input-group input-group-merge">
            <div
               class="form-floating form-floating-outline">
               <input
                  type="password"
                  id="password"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password"
                  placeholder="*******"
                  />
               <label for="password">Password Baru</label>
               @error('password')
                  <div class="invalid-feedback">
                     {{ $errors->first('password') }}                     
                  </div>
               @enderror
            </div>
            <span
               class="input-group-text cursor-pointer"><i
                  class="mdi mdi-eye-off-outline"></i></span>
         </div>
      </div>
      <div class="mb-3 form-password-toggle">
         <div class="input-group input-group-merge">
            <div
               class="form-floating form-floating-outline">
               <input
                  type="password"
                  id="password_confirmation"
                  class="form-control @error('password') is-invalid @enderror"
                  name="password_confirmation"
                  placeholder="*******"
                  required />
               <label for="password_confirmation">Konfirmasi Password</label>
               @error('password_confirmation')
                  <div class="invalid-feedback">
                     {{ $errors->first('password') }}
                  </div>
               @enderror
               @error('email')
                  <div class="invalid-feedback">
                     {{ $errors->first('email') }}
                  </div>
               @enderror
            </div>
            <span
               class="input-group-text cursor-pointer"><i
                  class="mdi mdi-eye-off-outline"></i></span>
         </div>
      </div>
      @php
         $email = $_GET['email'];
         $email = urldecode($email); // Mengubah %40 menjadi @
      @endphp
      <input type="hidden" name="email" value="{{ $email }}">
      <button
         class="btn btn-primary d-grid w-100 mb-3" type="submit">
         Terapkan perubahan
      </button>
      <div class="text-center">
         <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
            <i class="mdi mdi-chevron-left scaleX-n1-rtl mdi-24px"></i> Kembali ke login
         </a>
      </div>
   </form>
@endsection
@section('content2')
   <div class="text-center">
      <h5 class="mb-0">Reset Password</h5>
      <p class="text-muted mt-2">Enter your new password for your account.</p>
   </div>
   @include('auth.session')

   <form class="mt-4 pt-2" action="{{ route('password.update') }}" method="post">
      {{-- <input type="hidden" name="token" value="{{ request()->token }}"> --}}
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      {{-- <div class="form-floating form-floating-custom mb-4">
         <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Enter Email" autocomplete="on" name="email" value="{{ $email ?? old('email') }}"
            required>
         @error('email')
            <div class="invalid-feedback">
               {{ $errors->first('email') }}
            </div>
         @enderror
         <label for="input-email">Email</label>
         <div class="form-floating-icon">
            <i data-eva="email-outline"></i>
         </div>
      </div> --}}
      @php
         $email = $_GET['email'];
         $email = urldecode($email); // Mengubah %40 menjadi @
      @endphp
      <input type="hidden" name="email" value="{{ $email }}">


      <div class="form-floating form-floating-custom mb-4">
         <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Enter Password" name="password" value="{{ old('password') }}" required
            autocomplete="new-password">
         @error('password')
            <div class="invalid-feedback">
               {{ $errors->first('password') }}
            </div>
         @enderror
         <label for="input-password">Password</label>
         <div class="form-floating-icon">
            <i data-eva="lock-outline"></i>
         </div>
      </div>
      <div class="form-floating form-floating-custom mb-4">
         <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password_confirmation" placeholder="Enter Password_confirmation" name="password_confirmation"
            value="{{ old('password_confirmation') }}" required>
         @error('password_confirmation')
            <div class="invalid-feedback">
               {{ $errors->first('password') }}
            </div>
         @enderror
         <label for="input-password">Repeat password</label>
         <div class="form-floating-icon">
            <i data-eva="lock-outline"></i>
         </div>
      </div>

      <div class="mb-4">
         <p class="mb-0">By registering you agree to the Makerindo <a href="#" class="text-primary">Terms of Use</a></p>
      </div>
      <div class="mb-3">
         <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Register</button>
      </div>
   </form>

   <div class="mt-4 pt-3 text-center">
      <p class="text-muted mb-0">Already have an account ? <a href="{{ route('login') }}" class="text-primary fw-semibold"> Login </a> </p>
   </div>
@endsection
