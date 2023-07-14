@extends('auth.auth')

@section('auth-content')
   <div class="text-center">
      <h5 class="mb-0">Register Account</h5>
      <p class="text-muted mt-2">Get your free Makerindo account now.</p>
   </div>

   @include('auth.session')


   <form class="mt-4 pt-2" action="{{ route('register.authenticate') }}" method="post">
      @csrf
      <div class="form-floating form-floating-custom mb-4">
         <input type="text" class="form-control @error('name') is-invalid @enderror" id="input-name" placeholder="Enter Your Name" autocomplete="on" name="name" value="{{ old('name') }}" autofocus
            required>
         @error('name')
            <div class="invalid-feedback">
               {{ $errors->first('name') }}
            </div>
         @enderror
         <label for="input-name">Name</label>
         <div class="form-floating-icon">
            <i data-eva="people-outline"></i>
         </div>
      </div>
      <div class="form-floating form-floating-custom mb-4">
         <input type="text" class="form-control @error('auth_field') is-invalid @enderror" id="auth_field" placeholder="Enter Email/Phone" autocomplete="on" name="auth_field" value="{{ old('auth_field') }}" required>
         @error('auth_field')
            <div class="invalid-feedback">
               {{ $errors->first('auth_field') }}
            </div>
         @enderror
         <label for="auth_field">Email/Phone</label>
         <div class="form-floating-icon">
            <i data-eva="email-outline"></i>
         </div>
      </div>
      {{-- <div class="form-floating form-floating-custom mb-4">
         <input type="verification_code" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" placeholder="Enter Verification Code" autocomplete="on" name="verification_code"
            value="{{ old('verification_code') }}" required>
         @error('verification_code')
            <div class="invalid-feedback">
               {{ $errors->first('verification_code') }}
            </div>
         @enderror
         <label for="verification_code">Verification Code</label>
         <div class="form-floating-icon">
            <i data-eva="phone-outline"></i>
         </div>
      </div> --}}
      {{-- <div class="form-floating form-floating-custom mb-4">
         <input type="number" class="form-control @error('mobile_no') is-invalid @enderror" id="input-mobile_no" placeholder="Enter Mobile Number" autocomplete="on" name="mobile_no"
            value="{{ old('mobile_no') }}" required>
         @error('mobile_no')
            <div class="invalid-feedback">
               {{ $errors->first('mobile_no') }}
            </div>
         @enderror
         <label for="input-mobile_no">Phone</label>
         <div class="form-floating-icon">
            <i data-eva="phone-outline"></i>
         </div>
      </div> --}}
      <input type="hidden" name="username" value="username">
      {{-- <div class="form-floating form-floating-custom mb-4">
       <input type="text" class="form-control @error('username') is-invalid @enderror" id="input-username" placeholder="Enter username" required>
       <div class="invalid-feedback">
           Please Enter Username
       </div> 
       <label for="input-username">Username</label>
       <div class="form-floating-icon">
           <i data-eva="people-outline"></i>
       </div>
   </div> --}}

      <div class="form-floating form-floating-custom mb-4">
         <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password" placeholder="Enter Password" name="password" value="{{ old('password') }}" required>
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
         <input type="password" class="form-control @error('password') is-invalid @enderror" id="input-password_confirmation" placeholder="Enter Password Confirmation" name="password_confirmation"
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
