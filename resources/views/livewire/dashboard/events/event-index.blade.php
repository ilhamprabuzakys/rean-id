<div>
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
                  <select class="form-select" name="paginate" id="paginate" wire:model.live.debounce.300ms='paginate'>
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-lg-3 col-sm-2 d-flex justify-content-start">
                  <input type="text" name="search" id="search" wire:model.live.debounce.300ms="search"
                     class="form-control" placeholder="Ketik sesuatu..">
               </div>
               <div class="col-lg-5 col-sm-3 d-flex justify-content-start" wire:ignore>
                  <div class="input-group">
                     <input type="text" id="filter_date" class="form-control" placeholder="Filter berdasarkan tanggal">
                     <span class="input-group-text"><i class="fas fa-calendar-alt text-primary"></i></span>
                     <span id="reset-filter" class="input-group-text"
                        style="cursor: pointer; user-select: none"
                     ><i class="fas fa-x text-danger"></i></span>
                  </div>
               </div>
               <div class="col-lg-3 col-sm-5 d-flex justify-content-end">
                  <a class="btn btn-primary" href="{{ route('events.create') }}">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-none d-sm-inline-block">Tambah Data</span></span>
                  </a>
               </div>
            </div>
         </div>
         @include('livewire.dashboard.events.partials.table')
      </div>
   </div>

   @push('scripts')
   <script>
      $(document).ready(function() {
         let filterDateInstance = $("#filter_date").flatpickr({
            mode: "range",
            minDate: "today",
            dateFormat: "Y-m-d",  // Format yang dikirim ke backend
            altInput: true,  // Membuat input tambahan untuk menampilkan format
            altFormat: "d F Y",  // Format tanggal yang ditampilkan di frontend
            rangeSeparator: " sampai ",
            onClose: function(selectedDates, dateStr, instance) {
               // Mengganti "to" dengan "sampai" pada altInput setelah tanggal dipilih
               instance.altInput.value = instance.altInput.value.replace(' to ', ' sampai ');
            }
         });


         let timeout;  // Variabel untuk menyimpan referensi timeout
         $('#filter_date').on('change', function (e) {
            var data = $('#filter_date').val();
            // Jika ada timeout sebelumnya, batalkan dulu
            if (timeout) {
               clearTimeout(timeout);
            }
            // Atur timeout baru
            timeout = setTimeout(function() {
               @this.set('filter_date', data);
            }, 300);
         });
         
         $('#reset-filter').on('click', function(e) {
            e.preventDefault();
            filterDateInstance.clear();
            Livewire.dispatch('resetFilter'); // Panggil fungsi resetFilter di komponen Livewire
         });
      });
   </script>
   @endpush
</div>