<div>
   @include('livewire.user.create')
   <div class="col-12">
      <div class="card shadow-md">
         <div class="card-header">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
               <i class="mdi mdi-check-circle-outline me-2"></i>
               {!! session('success') !!}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
               </button>
             </div>
            @endif
            <div class="row justify-content-between">
               <div class="col-4 d-flex justify-content-start">
                  <input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Ketik sesuatu..">
               </div>
               <div class="col-4 d-flex justify-content-start">
                  <select class="form-select" name="rolefilter" id="rolefilter" wire:model='rolefilter'>
                     <option selected value="">Semua Role</option>
                     @foreach ($roles as $role)
                        <option value="{{ $role->key }}">{{ $role->label }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-4 d-flex justify-content-end">
                  <button class="btn btn-primary" id="buttonTambahUser" data-bs-target="#createUserModal" data-bs-toggle="modal">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                     <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </button>
                  {{-- @include('dashboard.users.modal.create') --}}
               </div>
            </div>
         </div>
         @include('livewire.user.table')
      </div>
   </div>
   @include('livewire.user.delete')    
</div>
