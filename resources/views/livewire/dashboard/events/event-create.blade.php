<div>
   @include('livewire.dashboard.events.partials.modal.location-picker')
   <div class="card mb-4">
      <div class="card-body">
         <form wire:submit.prevent='store'>
            <div class="row">
               <div class="col-12 mb-3">
                  <label class="mb-2" for="title">Judul Acara <sup class="text-danger">*</sup></label>
                  <input type="text" wire:model='title' id="title" class="form-control">
               </div>
               <div class="col-12 mb-3">
                  <label class="mb-2" for="location">Lokasi Acara <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <textarea class="form-control" wire:model='location' id="location" aria-label="With textarea" placeholder="Jl. Moh Toha No. 77" style="height: 60px;"></textarea>
                     <button class="btn btn-outline-primary waves-effect" type="button" data-bs-target="#locationPickerModal" data-bs-toggle="modal"><i
                           class="fas fa-map-location-dot me-2"></i>Pilih</button>
                  </div>
               </div>
               <div class="col-6 mb-3">
                  <label for="merge_date" class="mb-2">Tanggal Acara <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <input type="text" class="form-control" wire:model='merge_date' id="merge_date">
                     <span class="input-group-text"><i class="fas fa-calendar-alt text-primary"></i></span>
                  </div>
               </div>
               <div class="col-3 mb-3">
                  <label for="kota" class="mb-2">Kota <sup class="text-danger">*</sup></label>
                  <input type="text" class="form-control" wire:model='city' id="city">
               </div>
               <div class="col-3 mb-3">
                  <label for="provinsi" class="mb-2">Provinsi <sup class="text-danger">*</sup></label>
                  <input type="text" class="form-control" wire:model='province' id="province">
               </div>
               <div class="col-6 mb-3">
                  <label for="organizer" class="mb-2">Penyelengara <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <input type="text" class="form-control" wire:model='organizer' id="organizer">
                     <span class="input-group-text"><i class="fas fa-person text-primary"></i></span>
                  </div>
               </div>
               <div class="col-6 mb-3">
                  <label for="contact_email" class="mb-2">Kontak Email <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <input type="text" class="form-control" placeholder="kontak@gmail.com" wire:model='contact_email' id="contact_email">
                     <span class="input-group-text"><i class="fas fa-mail-bulk text-primary"></i></span>
                  </div>
               </div>
               <div class="col-12 mb-3">
                  <label for="file_path" class="mb-2">Poster Event <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <input type="file" class="form-control" wire:model='file_path' id="file_path">
                     <span class="input-group-text"><i class="fas fa-photo-film text-primary"></i></span>
                  </div>
               </div>
               <div class="col-12 mb-5">
                  <label for="description" class="mb-2">Deskripsi Acara <sup class="text-danger">*</sup></label>
                  <div wire:ignore>
                     <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" rows="4" wire:model='description'></textarea>
                  </div>
                  @error('description')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                  @enderror
               </div>
               <div class="col-6 mb-3">
                  <div class="form-check form-switch mb-2">
                     <input class="form-check-input" type="checkbox" wire:model='status' id="status" checked="1">
                     <label class="form-check-label" for="status">Aktif</label>
                  </div>
               </div>
               <div class="col-6 mb-3 d-flex justify-content-end">
                  <button class="btn btn-primary" type="button" wire:click='store()'><i class="fas fa-save me-2"></i>Simpan</button>
               </div>
            </div>
         </form>
      </div>
   </div>


   @push('scripts')
      <script>
         $("#merge_date").flatpickr({
            mode: "range",
            enableTime: true,
            minDate: "today",
            minTime: "06:00",
            maxTime: "22:00",
         });

         $('#description').summernote({
            height: 200,
            tabsize: 2,
            lang: 'id-ID',
            callbacks: {
               onChange: function(contents, $editable) {
                  @this.set('description', contents);
               }
            }
         });

         window.addEventListener('close-modal', event => {
            $('#locationPicker').modal('hide');
         })
      </script>
   @endpush

</div>
