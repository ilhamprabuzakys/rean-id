
<form wire:submit.prevent='store'>
   <div class="row justify-content-between mb-4">
      <div class="col-9">
         <label for="name" class="form-label">Nama <sup class="text-danger">*</sup></label>
         <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model.defer="name" id="name">
         @error('name')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
         @enderror

        {{--  <div class="form-floating form-floating-outline">
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="John Doe" aria-describedby="name" wire:model="name"/>
            <label for="name">Name</label>
            @error('name')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
            @enderror
         </div> --}}
      </div>
      <div class="col-3 d-flex align-self-end">
        <button class="btn btn-primary" type="submit">
           <span><i class="fas fa-save fa-md me-1"></i>
              <span class="d-none d-sm-inline-block">Simpan</span></span>
        </button>
        {{-- <button class="btn btn-primary" type="submit" style="position: relative; bottom:  15px;">
           <span><i class="fas fa-save fa-md me-1"></i>
              <span class="d-none d-sm-inline-block">Simpan</span></span>
        </button> --}}
     </div>
   </div>
</form>
