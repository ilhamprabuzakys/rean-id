<div>
    <div class="row">
        <div class="col-12">
           <div class="card shadow-md">
              <div class="card-header">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible d-flex align-items-center" role="alert">
                    <i class="mdi mdi-check-circle-outline me-3"></i>
                    {{-- {!! session('success') !!} --}}
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible d-flex align-items-center" role="alert">
                    <i class="mdi mdi-check-circle-outline me-3"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    </button>
                    </div>
                @endif

                @if ($statusUpdate == true) 
                <h3 class="my-2">Perbarui Label</h3>
                <hr class="mt-3 mb-4">
                <livewire:dashboard.tags.tag-update />
                @else
                <h3 class="my-2">Tambah Label</h3>
                <hr class="mt-3 mb-4">
                <livewire:dashboard.tags.tag-create />
                @endif
                <hr class="mt-3 mb-4">
                 <div class="row justify-content-between">
                    <div class="col-lg-1 col-md-2 col-sm-2 d-flex justify-content-start">
                       <select class="form-select" name="paginate" id="paginate" wire:model='paginate'>
                          <option value="5">5</option>
                          <option value="10">10</option>
                          <option value="15">15</option>
                       </select>
                    </div>
                    <div class="col-7 d-flex justify-content-start">
                       <input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Ketik sesuatu..">
                    </div>
                    {{-- <div class="col-4 d-flex justify-content-start">
                       <select class="form-select" name="popularityFilter" id="popularityFilter" wire:model='popularityFilter'>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">20</option>
                        <option value="15">50</option>
                        <option value="15">100</option>
                       </select>
                    </div> --}}
                 </div>
              </div>
              <div class="card-datatable">
                 @include('livewire.dashboard.tags.partials.table')
              </div>
           </div>
        </div>
     </div>
   @include('livewire.dashboard.tags.partials.modal.delete')    
</div>
