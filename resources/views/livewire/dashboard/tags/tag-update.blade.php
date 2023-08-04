<form wire:submit.prevent='update'>
    <div class="row justify-content-between mb-4">
       <div class="col-9">
          <label for="name" class="form-label">Nama <sup class="text-danger">*</sup></label>
          <input type="text"
             class="form-control @error('name') is-invalid @enderror" wire:model="name" id="name">
          @error('name')
             <div class="invalid-feedback">
                {{ $message }}
             </div>
          @enderror
       </div>
       <div class="col-3 d-flex align-self-end">
         <button class="btn btn-primary" type="submit">
            <span><i class="fas fa-save fa-md me-1"></i>
               <span class="d-none d-sm-inline-block">Terapkan</span></span>
         </button>
      </div>
       {{-- <div class="col-6">
          <label for="name" class="form-label">Slug <sup class="text-danger">*</sup></label>
          <input type="text"
             class="form-control @error('slug')
                       is-invalid
                    @enderror" wire:model="slug" id="slug">
          @error('slug')
             <div class="invalid-feedback">
                {{ $message }}
             </div>
          @enderror
       </div> --}}
    </div>
 </form>
 