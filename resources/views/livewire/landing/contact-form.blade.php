<div>
   @if (session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
      {!! session('success') !!}
      <button type="button" class="btn-close p-0 top-50 translate-middle-y me-2" data-bs-dismiss="alert"
         aria-label="Close">
         <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="16" height="16"
            viewBox="0 0 128 128">
            <g>
               <path stroke="currentColor" stroke-width="8" stroke-linecap="square" fill="none"
                  d="M7 7l114 114m0-114l-114 114"></path>
            </g>
         </svg>
      </button>
   </div>
   @elseif(session('fails'))
   <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {!! session('fails') !!}
      <button type="button" class="btn-close p-0 top-50 translate-middle-y me-2" data-bs-dismiss="alert"
         aria-label="Close">
         <svg xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid meet" width="16" height="16"
            viewBox="0 0 128 128">
            <g>
               <path stroke="currentColor" stroke-width="8" stroke-linecap="square" fill="none"
                  d="M7 7l114 114m0-114l-114 114"></path>
            </g>
         </svg>
      </button>
   </div>
   @endif
   <form id="form" wire:submit.prevent='store'>
      <div class="row">
         <div class="col-sm-6 mb-3">
            <label class="form-label" for="name">Nama anda</label>
            <input type="text" name="name" wire:model='name' class="form-control @error('name')
                 is-invalid
              @enderror" id="name" placeholder="Windah Basudara" required>
            @error('name')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>
         <div class="col-sm-6 mb-3">
            <label class="form-label" for="email">Alamat email</label>
            <input type="email" class="form-control @error('email')
                 is-invalid   
              @enderror" name="email" wire:model='email' id="email" placeholder="windah@gmail.com" id="email"
               aria-label="windah@gmail.com" required>
            @error('email')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>

         <div class="w-100"></div>

         <!-- Services -->
         <div class="col-sm-12 mb-3">
            <label class="form-label" for="subject">Subjek</label>
            <input type="text" class="form-control @error('subject')
                 is-invalid
              @enderror" name="subject" wire:model='subject' id="subject" placeholder="Keanggotaan" required>
            @error('subject')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
            @enderror
         </div>
         <!-- End Input -->
      </div>

      <!-- Message -->
      <div class="mb-3">
         <label for="message" class="form-label">Pesan</label>
         <textarea class="form-control @error('message')
              is-invalid
           @enderror" name="message" wire:model='message' placeholder="Halo Rean, saya ingin ..." required></textarea>
         @error('message')
         <div class="invalid-feedback">
            {{ $message }}
         </div>
         @enderror
      </div>

      <div class="mb-3">
         <div wire:ignore>
            {!! NoCaptcha::renderJs() !!}
            {!! NoCaptcha::display(['data-callback' => 'onCallback']) !!}
         </div>
         @error('recaptcha')
         <div class="text-danger small">
            {{ $message }}
         </div>
         @enderror
      </div>

      <div class="d-md-flex justify-content-between align-items-center">
         <p class="small mb-4 text-body-secondary mb-md-0">Kami akan membalas pesan paling lambat 2 - 3 di hari kerja.
         </p>
         {{-- <input type="submit" name="submit" wire:model='submit' value="Kirim pesan" id="sendBtn"
            class="btn btn-lg btn-primary"> --}}
         <button type="submit" class="btn btn-lg btn-primary" id="send-btn-contact">
            <div wire:loading wire:target='store'>
               <span class="spinner-border" role="status" aria-hidden="true"></span>
               <span class="visually-hidden">Loading...</span>
            </div>
            Kirim pesan
         </button>
      </div>
   </form>

   @push('scripts')
      <script>
         var onCallback = function() {
            @this.set('recaptcha', grecaptcha.getResponse());
         }
      </script>
   @endpush
</div>