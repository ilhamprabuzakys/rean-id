<div>
   <div class="row">
      <div class="col-12">
         <div class="card">
            <div class="card-header flex-column flex-md-row">

               <div class="row mb-3 justify-content-start">
                  <div class="col-lg-4">
                     <label for="filter-category" class="form-label">Kategori</label>
                     <select class="form-select form-select-md" id="filter-category" wire:model='filter_category'>
                        <option selected value="">Semua</option>
                        @foreach ($categories as $category)
                           <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-4">
                     <label for="filter-status" class="form-label">Status</label>
                     <select class="form-select form-select-md" name="status" id="filter-status" wire:model='filter_status'>
                        <option selected value="">Semua</option>
                        @foreach ($statuses as $status)
                           <option value="{{ $status->key }}">{{ $status->label }}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-lg-4 d-flex align-items-end align-self-end justify-content-end">
                     <a class="btn btn-primary"
                        href="{{ route('posts.create') }}">
                        <span><i class="mdi mdi-plus me-sm-1"></i>
                           <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                     </a>
                  </div>
               </div>
               <div class="row justify-content-between">
                  <div class="col-lg-1 col-md-2 col-sm-2 d-flex justify-content-start">
                     <select class="form-select" name="paginate" id="paginate" wire:model='paginate'>
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                     </select>
                  </div>
                  <div class="col-3 d-flex justify-content-start">
                     <input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Ketik sesuatu..">
                  </div>
                  <div class="col-3 d-flex justify-content-start">
                     <input type="text" name="search" id="search" wire:model="search" class="form-control" placeholder="Cari Popular..">
                  </div>
                  <div class="col-5 d-flex justify-content-start">
                     <input type="text" id="filter_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal" wire:model='filter_date'>
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
