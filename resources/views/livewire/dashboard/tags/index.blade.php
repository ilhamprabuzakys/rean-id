<div>
    <div class="row">
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
                {{-- <livewire:dashboard.tags.form :tags=$tags/> --}}
                @include('livewire.dashboard.tags.form')
                 <div class="row justify-content-between">
                    <div class="col-1 d-flex justify-content-start">
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
