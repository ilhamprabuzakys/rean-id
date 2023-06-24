@extends('auth.auth')

@section('auth-content')
   <div class="text-center">
      <h5 class="mb-0">Reset Password</h5>
      <p class="text-muted mt-2">Enter your new password for your account.</p>
   </div>
   @include('auth.session')

   <form class="mt-4 pt-2" action="{{ route('password.update') }}" method="post">
      {{-- <input type="hidden" name="token" value="{{ request()->token }}"> --}}
      @csrf
      <input type="hidden" name="token" value="{{ $request->route('token') }}">
      <div class="form-floating form-floating-custom mb-4">
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
      </div>


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
