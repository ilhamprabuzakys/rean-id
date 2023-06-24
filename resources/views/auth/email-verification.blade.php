@extends('auth.auth')

@section('auth-content')
<div class="text-center">
   <h5 class="mb-0">Verify your email</h5>
   <p class="text-muted mt-2">We must verify your email now.</p>
</div>
@include('auth.session')

<form class="mt-4 pt-2" action="{{ route('register.verification_authenticate', $temp_user) }}" method="post">
   @csrf
   <div class="form-floating form-floating-custom mb-4">
       <input type="number" class="form-control @error('verification_code') is-invalid @enderror" id="verification_code" placeholder="Enter Verifiction Code" required name="verification_code" value="{{ old('verification_code') }}">
       @error('verification_code')
       <div class="invalid-feedback">
          {{ $errors->first('verification_code') }}
       </div>
    @enderror
       <label for="input-email">Verification Code</label>
       <div class="form-floating-icon">
           <i data-eva="email-outline"></i>
       </div>
       
   </div>
   <div class="mb-3">
       <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Submit</button>
   </div>
</form>

<div class="mt-4 pt-3 text-center">
   <p class="text-muted mb-0">Entered a wrong email? <a href="{{ route('register') }}" class="text-primary fw-semibold"> Click here </a> </p>
</div>
@endsection

