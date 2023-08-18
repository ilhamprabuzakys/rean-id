<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header flex-column flex-md-row">

               <div class="row mb-3 justify-content-start">
                  <div class="col-lg-3">
                     <label for="filter-category" class="form-label">Kategori {{ $filter_category }}</label>
                     <select class="form-select form-select-md" id="filter-category" 
                     wire:model.live='filter_category'>
                        <option selected value="">Semua</option>
                        @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-3">
                     <label for="filter-status" class="form-label">Status</label>
                     <select class="form-select form-select-md" name="status" id="filter-status" wire:model.live='filter_status'>
                        <option selected value="">Semua</option>
                        @foreach ($statuses as $status)
                           <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-6 d-flex align-items-end align-self-end justify-content-end gap-3">
                     <div><a class="btn btn-danger" href="#" wire:click='$dispatch("reset-filter")'>
                        <span><i class="fas fa-refresh"></i>
                           <span class="d-none d-sm-inline-block">Reset Filter</span></span>
                     </a></div>
                     <div><a class="btn btn-primary"
                        href="{{ route('posts.create') }}">
                        <span><i class="mdi mdi-plus me-sm-1"></i>
                           <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                     </a></div>
                  </div>
               </div>
               <div class="row justify-content-between">
                  <div class="col-lg-1 col-md-2 col-sm-2 d-flex justify-content-start">
                     <select class="form-select" name="paginate" id="paginate" wire:model.live='paginate'>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                     </select>
                  </div>
                  <div class="col-3 d-flex justify-content-start">
                     <input type="text" name="search" id="search" wire:model.live="search" class="form-control" placeholder="Ketik sesuatu..">
                  </div>
                  <div class="col-3 d-flex justify-content-start">
                     <select class="form-select form-select-md" name="filter_popularity" id="filter_popularity" wire:model.live='filter_popularity'>
                        <option selected value="">Pilih rentang views</option>
                        <option value="1-20">1 - 20</option>
                        <option value="21-50">21 - 50</option>
                        <option value="51-100">51 - 100</option>
                        <option value="100+">100 - keatas</option>
                     </select>
                  </div>
                  <div class="col-5 d-flex justify-content-start">
                     <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model.live='filter_date'>
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
            <div class="card-datatable text-nowrap">
               @include('livewire.dashboard.posts.partials.table')
            </div>
         </div>
      </div>
   </div>
   <script>
      $(document).ready(function() {
         $('#filter-tag').select2({
            // theme: 'bootstrap-5',
            placeholder: 'Pilih Tag',
            allowClear: true,
            // tags: true,
         });
         $('#filter-category').select2({
            theme: 'bootstrap-5'
         });
      });
   </script>
</div>
