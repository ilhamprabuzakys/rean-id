<div>
   @include('livewire.dashboard.tags.partials.modal.create')
   @include('livewire.dashboard.tags.partials.modal.edit')
   <div class="col-12">
      <div class="card shadow-md">
         <div class="card-header">
            @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
               <i class="mdi mdi-check-circle-outline me-3"></i>
               {!! session('success') !!}
               <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
               </button>
             </div>
            @endif
            <div class="row mb-4">
               <div class="col-lg-1 col-sm-2">
                  <select class="form-select" name="paginate" id="paginate" wire:model.live='paginate'>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-lg-8 col-sm-5">
                  <input type="text" name="search" id="search" wire:model.live.debounce.400ms="search" class="form-control" placeholder="Ketik sesuatu..">
               </div>
               <div class="col-lg-3 col-sm-5">
                  <button class="btn btn-primary w-100" id="buttonTambahTag" data-bs-target="#createTagModal" data-bs-toggle="modal">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                     <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </button>
               </div>
            </div>
         </div>
         <div class="card-datatable">
            @include('livewire.dashboard.tags.partials.table')
         </div>
      </div>
   </div>
</div>
