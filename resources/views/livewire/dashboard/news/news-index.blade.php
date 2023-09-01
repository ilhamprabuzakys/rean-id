<div>
   <div class="col-12">
      <div class="card shadow-md">
         <div class="card-header">
            @if (session('success'))
               <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                  <i class="mdi mdi-check-circle-outline me-3"></i>
                  <strong>{{ session('success') }}</strong>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
               </div>
            @elseif (session('fails'))
               <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                  <i class="mdi mdi-check-circle-outline me-3"></i>
                  {{ session('fails') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                  </button>
               </div>
            @endif

            <div class="row justify-content-between">
               <div class="col-1 d-flex justify-content-start">
                  <select class="form-select" name="paginate" id="paginate" wire:model.live='paginate'>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-3 d-flex justify-content-start">
                  <input type="text" name="search" id="search" wire:model.live.debounce.300ms="search" class="form-control" placeholder="Ketik sesuatu..">
               </div>
               <div class="col-5 d-flex justify-content-start">
                  <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model.live.debounce.300ms='filter_date'>
               </div>
               <div class="col-3 d-flex justify-content-end">
                  <a class="btn btn-primary w-100" href="{{ route('news.create') }}">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </a>
               </div>
            </div>
         </div>
         <div class="card-datatable">
            @include('livewire.dashboard.news.partials.table')
         </div>
      </div>
   </div>

</div>
