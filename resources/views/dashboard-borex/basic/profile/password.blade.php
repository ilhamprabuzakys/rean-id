@extends('layouts.app')
@section('title')
   <h4 class="page-title">Update Profile</h4>
@endsection
@section('content')
   <div class="row d-flex justify-content-center">
      <div class="col-md-8">
         <div class="card shadow-lg">
            <form action="{{ route('profile.update-password', $user) }}" method="post">
               @csrf
               @method('PUT')
               <div class="card-body">
                  <div class="mb-3 row">
                     <div class="col-md-12">
                        <label for="current_password" class="form-label">Password saat ini</label>
                        <input class="form-control @error('current_password')
                       is-invalid
                      @enderror" type="password" value="{{ old('current_password') }}"
                           placeholder="Enter Password" name="current_password"
                           id="current_password">
                        @error('current_password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="mb-3 row">
                     <div class="col-md-12">
                        <label for="password" class="form-label">New Password</label>
                        <input class="form-control @error('password')
                       is-invalid
                      @enderror" type="password" value="{{ old('password') }}"
                           placeholder="Enter Password" name="password"
                           id="password">
                        @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <label for="password_confirmation" class="form-label">Repeat New Password</label>
                        <input class="form-control @error('password')
                       is-invalid
                      @enderror" type="password" value="{{ old('password_confirmation') }}"
                           placeholder="Repeat your password" name="password_confirmation"
                           id="password_confirmation">
                        @error('password')
                           <div class="invalid-feedback">
                              {{ $message }}
                           </div>
                        @enderror
                     </div>
                  </div>
                  <div class="row">
                     <button class="btn btn-success rounded-2 px-3 mt-4" type="submit">Update Password</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
@endsection
