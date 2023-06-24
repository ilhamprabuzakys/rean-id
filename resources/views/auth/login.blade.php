@extends('auth.auth')
@section('auth-content')
   <div class="text-center">
      <h4 class="mb-0">Welcome Back !</h4>
      <p class="text-muted mt-2">{{ __('Masuk dan gunakan aplikasi multifungsi ini!') }}</p>
   </div>
   @include('auth.session')
   <form class="mt-4 pt-2" action="{{ route('login.authenticate') }}" method="post">
      @csrf
      <div class="form-floating form-floating-custom mb-4">
         <input type="text" class="form-control {{ $errors->has('username') || $errors->has('email') ? ' is-invalid' : '' }} @error('login') is-invalid @enderror" id="input-username"
            placeholder="Enter User Name" name="login" value="{{ old('username') ?: old('email') }}" autofocus required>

         @if ($errors->has('username') || $errors->has('email'))
            <div class="invalid-feedback">
               {{ $errors->first('username') ?: $errors->first('email') }}
            </div>
         @endif
         @error('login')
            <div class="invalid-feedback">
               {{ $errors->first('login') }}
            </div>
         @enderror
         <label for="input-username">Username or Email</label>
         <div class="form-floating-icon">
            <i data-eva="people-outline"></i>
         </div>
      </div>

      <div class="form-floating form-floating-custom mb-4 auth-pass-inputgroup">
         <input type="password" class="form-control pe-5 @error('password') is-invalid @enderror" id="password-input" placeholder="Enter Password" autocomplete="on" name="password"
            value="{{ old('password') }}" required>
         @error('password')
            <div class="invalid-feedback">
               {{ $errors->first('password') }}
            </div>
         @enderror
         {{-- <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
           <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
       </button> --}}
         <label for="input-password">Password</label>
         <div class="form-floating-icon">
            <i data-eva="lock-outline"></i>
         </div>
      </div>

      {{-- <div class="row mb-4">
       <div class="col">
           <div class="form-check font-size-15">
               <input class="form-check-input" type="checkbox" id="remember-check">
               <label class="form-check-label font-size-13" for="remember-check">
                   Remember me
               </label>
           </div>  
       </div>
       
   </div> --}}
   <div class="mt-1 mb-2 pb-2 text-center">
      <p class="text-muted mb-0">Forgotten your password ? <a href="{{ route('password.request') }}"
            class="text-primary fw-semibold"> Click here </a> </p>
   </div>

      <div class="mb-3">
         <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Log In</button>
      </div>
   </form>

   <div class="mt-4 pt-3 text-center">
      <p class="text-muted mb-0">Don't have an account ? <a href="{{ route('register') }}"
            class="text-primary fw-semibold"> Signup now </a> </p>
   </div>
@endsection
