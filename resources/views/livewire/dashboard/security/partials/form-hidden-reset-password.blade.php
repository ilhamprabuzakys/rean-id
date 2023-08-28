<form
      id="formAuthentication"
      class="d-none"
      action="{{ route('password.email') }}"
      method="POST">
      @csrf
      <div
         class="form-floating form-floating-outline mb-3">
         <input
            type="text"
            class="form-control @error('email') is-invalid @enderror"
            id="email"
            name="email"
            placeholder="Masukkan email anda"
            value="{{ old('email') }}"
            required
            autofocus />
         <label>Email</label>
         @error('email')
            <div class="invalid-feedback">
               {{ $errors->first('email') }}
            </div>
         @enderror
      </div>
      <button class="btn btn-primary d-grid w-100" type="submit">
         Kirim
      </button>
   </form>