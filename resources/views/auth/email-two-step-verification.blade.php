@extends('auth.auth')

@section('auth-content')
   <div class="text-center">
      <h5 class="mb-0">Verify your email</h5>
      <p class="text-muted mt-2">Untuk menggunakan aplikasi ini, tolong verifikasi email mu.</p>
   </div>
   @include('auth.session')
   @push('style')    
      <style>
         input::-webkit-outer-spin-button,
         input::-webkit-inner-spin-button {
                  -webkit-appearance: none;
                  margin: 0;
         }
   
         input[type=number] {
               -moz-appearance: textfield;
         }
      </style>
   @endpush
   <form class="mt-4 pt-2" action="{{ route('register.verification_authenticate', $temp_user) }}" method="post">
      @csrf
      <div class="row">
         <input type="hidden" name="verification_code" value="0">
         <div class="col-2">
            <div class="mb-3">
               <label for="digit1-input" class="visually-hidden">Dight 1</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="1"
                  id="digit1-input"
                  name="digit1-input"
                  >
            </div>
         </div>

         <div class="col-2">
            <div class="mb-3">
               <label for="digit2-input" class="visually-hidden">Dight 2</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="2"
                  id="digit2-input"
                  name="digit2-input"
                  >
            </div>
         </div>

         <div class="col-2">
            <div class="mb-3">
               <label for="digit3-input" class="visually-hidden">Dight 3</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="3"
                  id="digit3-input"
                  name="digit3-input"
                  >
            </div>
         </div>

         <div class="col-2">
            <div class="mb-3">
               <label for="digit4-input" class="visually-hidden">Dight 4</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="4"
                  id="digit4-input"
                  name="digit4-input"
                  >
            </div>
         </div>
         <div class="col-2">
            <div class="mb-3">
               <label for="digit5-input" class="visually-hidden">Dight 5</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="5"
                  id="digit5-input"
                  name="digit5-input"
                  >
            </div>
         </div>
         <div class="col-2">
            <div class="mb-3">
               <label for="digit6-input" class="visually-hidden">Dight 6</label>
               <input type="number"
                  class="form-control form-control-lg text-center two-step"
                  maxLength="1"
                  oninput="limitInput(this)"
                  data-value="6"
                  id="digit6-input"
                  name="digit6-input"
                  >
            </div>
         </div>
      </div>
      <div class="mb-3">
         <button class="btn btn-primary w-100 waves-effect waves-light" type="submit">Submit</button>
      </div>
   </form>

   <div class="mt-4 pt-3 text-center">
      <p class="text-muted mb-0">Salah memasukkan email? <a href="{{ route('register') }}" class="text-primary fw-semibold"> Klik disini </a> </p>
   </div>

   @push('script')
      <script>
         function limitInput(input) {
         if (input.value.length > 1) {
         input.value = input.value.slice(0, 1); // Mengambil hanya satu karakter pertama
         }
      }
      </script>
   @endpush
@endsection
