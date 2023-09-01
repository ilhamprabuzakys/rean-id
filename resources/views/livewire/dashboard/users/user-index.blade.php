<div>
   @include('livewire.dashboard.users.partials.modal.create')
   @include('livewire.dashboard.users.partials.modal.edit')
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
            <div class="row justify-content-between">
               <div class="col-lg-1 col-sm-2 col-md-2 d-flex justify-content-start">
                  <select class="form-select" name="paginate" id="paginate" wire:model.live.debounce.300ms='paginate'>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-start">
                  <input type="text" name="search" id="search" wire:model.live.debounce.300ms="search"
                     class="form-control" placeholder="Ketik sesuatu..">
               </div>
               <div class="col-lg-2 col-md-2 col-sm-2 d-flex justify-content-start">
                  <select class="form-select" name="rolefilter" id="rolefilter"
                     wire:model.live.debounce.300ms='rolefilter'>
                     <option selected value="">Semua Role</option>
                     @foreach ($roles as $role)
                     <option value="{{ $role->key }}">{{ $role->label }}</option>
                     @endforeach
                  </select>
               </div>
               <div class="col-lg-3 col-sm-3">
                  <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control"
                     placeholder="Filter berdasarkan tanggal" wire:model.live.debounce.300ms='filter_date'>
               </div>
               <div class="col-lg-4 col-md-4 col-sm-4 d-flex justify-content-end gap-1">
                  <button class="btn btn-primary w-100" id="buttonTambahUser" data-bs-target="#createUserModal"
                     data-bs-toggle="modal">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </button>
                  <button type="button" class="btn w-100 btn-success dropdown-toggle waves-effect"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fas fa-file-export me-2"></i>
                     <span class="d-none d-sm-block">Excel Menu</span>
                     <div wire:loading>
                        <span class="ms-2 spinner-border" role="status" aria-hidden="true"></span>
                        <span class="visually-hidden">Loading...</span>
                     </div>
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1" style="">
                     <a class="dropdown-item waves-effect" wire:click='exportExcel()' href="javascript:void(0);">Export
                        Excel</a>
                     <input type="file" wire:model="file">
                     <button wire:click="importExcel">Import</button>

                     {{-- <a class="dropdown-item waves-effect" href="javascript:void(0);"
                        wire:click="importExcel">Import Excel</a> --}}

                     {{-- <a class="dropdown-item waves-effect" onclick="document.getElementById('fileInput').click();"
                        href="javascript:void(0);">
                        <input type="file" wire:model="file" id="fileInput" style="display: none;">
                        Import
                        Excel</a> --}}
                  </div>
               </div>
            </div>
         </div>
         <div class="card-datatable">
            @include('livewire.dashboard.users.partials.table')
         </div>
      </div>
   </div>
   @include('livewire.dashboard.users.partials.modal.delete')
</div>