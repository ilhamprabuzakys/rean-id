<div>
   @include('livewire.dashboard.ebooks.partials.modal.delete')
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
               <div class="col-lg-1 col-sm-2 d-flex justify-content-start">
                  <select class="form-select" name="paginate" id="paginate" wire:model.live='paginate'>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-lg-3 col-sm-3 d-flex justify-content-start">
                  <input type="text" name="search" id="search" wire:model.live="search" class="form-control"
                     placeholder="Ketik sesuatu..">
               </div>
               <div class="col-lg-2 col-sm-2">
                  <div class="form-floating form-floating-outline">
                     <select class="form-select" name="status" id="filter-status"
                     wire:model.live.live='filter_status'>
                        <option selected value="">Semua</option>
                        @foreach ($statuses as $status)
                        <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endforeach
                     </select>
                     <label for="filter-status">Status</label>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-3 d-flex justify-content-start">
                  <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control"
                     placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
               </div>
               <div class="col-lg-3 col-sm-3 d-flex justify-content-end">
                  <a class="btn btn-primary w-100" href="{{ route('ebooks.create') }}">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </a>
               </div>
            </div>
         </div>
         <div class="card-datatable">
            @include('livewire.dashboard.ebooks.partials.table')
         </div>
      </div>
   </div>
</div>

@push('scripts')
<script>
   $("#published_at").flatpickr();
      $("#filter_date").flatpickr({
         mode: "range",
      });
</script>
@endpush