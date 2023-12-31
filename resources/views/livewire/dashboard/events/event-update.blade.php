<div>
   @include('livewire.dashboard.events.partials.modal.location-picker-edit')
   <div class="card mb-4">
      <div class="card-body">
         <div class="row">
            {{-- @dd($existingFiles) --}}
            <div class="col-12 mb-3">
               <label class="mb-2" for="title">Judul Acara <sup class="text-danger">*</sup></label>
               <input type="text" wire:model='title' id="title"
                  class="form-control @error('title') is-invalid @enderror">
               @error('title')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-12 mb-3">
               <label class="mb-2" for="location">Lokasi Acara <sup class="text-danger">*</sup></label>
               <div class="input-group">
                  <textarea class="form-control @error('location') is-invalid @enderror" wire:model='location'
                     id="location" aria-label="With textarea" placeholder="Jl. Moh Toha No. 77"
                     style="height: 60px;"></textarea>
                  <button class="btn btn-outline-primary waves-effect" type="button"
                     data-bs-target="#locationPickerModal" data-bs-toggle="modal"><i
                        class="fas fa-map-location-dot me-2"></i>Pilih</button>
                  @error('location')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
            </div>
            <div class="col-6 mb-3">
               <div wire:ignore>
                  <label for="merge_date" class="mb-2">Tanggal Acara <sup class="text-danger">*</sup></label>
                  <div class="input-group">
                     <input type="text" wire:model='start_date' class="form-control @error('start_date') is-invalid @enderror" id="start_date">
                     <span class="input-group-text"><i class="fas fa-arrow-right text-primary"></i></span>
                     @error('start_date')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                     <input type="text" wire:model='end_date' class="form-control @error('end_date') is-invalid @enderror" id="end_date">
                     <span class="input-group-text"><i class="fas fa-calendar-alt text-primary"></i></span>
                     @error('end_date')
                     <div class="invalid-feedback">
                        {{ $message }}
                     </div>
                     @enderror
                  </div>
               </div>
            </div>
            <div class="col-3 mb-3">
               <label for="kota" class="mb-2">Kota <sup class="text-danger">*</sup></label>
               <input type="text" class="form-control @error('city') is-invalid @enderror" wire:model='city' id="city">
               @error('city')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-3 mb-3">
               <label for="provinsi" class="mb-2">Provinsi <sup class="text-danger">*</sup></label>
               <input type="text" class="form-control @error('province') is-invalid @enderror" wire:model='province'
                  id="province">
               @error('province')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-6 mb-3">
               <label for="organizer" class="mb-2">Penyelengara <sup class="text-danger">*</sup></label>
               <div class="input-group">
                  <input type="text" class="form-control @error('organizer') is-invalid @enderror"
                     wire:model='organizer' id="organizer">
                  <span class="input-group-text"><i class="fas fa-person text-primary"></i></span>
                  @error('organizer')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
            </div>
            <div class="col-6 mb-3">
               <label for="contact_email" class="mb-2">Kontak Email <sup class="text-danger">*</sup></label>
               <div class="input-group">
                  <input type="text" class="form-control @error('contact_email') is-invalid @enderror"
                     placeholder="kontak@gmail.com" wire:model='contact_email' id="contact_email">
                  <span class="input-group-text"><i class="fas fa-mail-bulk text-primary"></i></span>
                  @error('contact_email')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
            </div>
            <div class="col-12 mb-3">
               <label for="file_path" class="mb-2">Poster Event <sup class="text-danger">*</sup></label>
               <div wire:ignore>
                  <div id="files" class="filepond @error('files') is-invalid @enderror"></div>
               </div>
               @error('files')
               <div class="invalid-feedback">
                  {{ $message }}
               </div>
               @enderror
            </div>
            <div class="col-12 mb-5">
               <label for="description" class="mb-2">Deskripsi Acara <sup class="text-danger">*</sup></label>
               <div wire:ignore>
                  <textarea name="description" class="form-control @error('description') is-invalid @enderror"
                     id="descriptionEdit" rows="4" wire:model='description'></textarea>
                  @error('description')
                  <div class="invalid-feedback">
                     {{ $message }}
                  </div>
                  @enderror
               </div>
            </div>
            {{-- <div class="col-6 mb-3">
               <div class="form-check form-switch mb-2">
                  <input class="form-check-input" type="checkbox" wire:model='status' id="status">
                  <label class="form-check-label" for="status">Aktif</label>
               </div>
            </div> --}}
            <input class="form-check-input d-none" type="checkbox" wire:model='status' value='true' id="status">
            <div class="col-12 mb-3 d-flex gap-3 justify-content-end">
               <a class="btn btn-light" href="{{ route('events.index') }}"><i
                     class="mdi mdi-arrow-left me-2"></i>Kembali</a>
               <button class="btn btn-primary" type="button" wire:click='update()' wire:loading.attr="disabled"><i
                     class="mdi mdi-content-save-check me-2"></i>Perbarui Data</button>
            </div>
         </div>
      </div>
   </div>

   {{-- @dd($existingFiles) --}}
   @push('scripts')
   <script>
      $(document).ready(function() {
            let startDatePicker = $("#start_date").flatpickr({
               minDate: "today",
               dateFormat: "Y-m-d",
               altInput: true,
               altFormat: "d F Y",
               onChange: function(selectedDates, dateStr, instance) {
                  let endDate = endDatePicker.selectedDates[0];

                  if (selectedDates.length && endDate && selectedDates[0] > endDate) {
                        // Jika tanggal awal melebihi tanggal akhir, kosongkan tanggal akhir
                        endDatePicker.clear();
                  }

                  // Atur minDate untuk end_date berdasarkan tanggal awal yang dipilih
                  endDatePicker.set('minDate', selectedDates[0] || "today");
               }
            });

            let endDatePicker = $("#end_date").flatpickr({
               minDate: "today",
               dateFormat: "Y-m-d",
               altInput: true,
               altFormat: "d F Y"
            });
            
            $('#start_date').on('change', function (e) {
               var data = $('#start_date').val();
               console.log(data);
               @this.set('start_date', data);
            });
            $('#end_date').on('change', function (e) {
               var data = $('#end_date').val();
               console.log(data);
               @this.set('end_date', data);
            });


            $('#descriptionEdit').summernote({
               height: 200,
               tabsize: 2,
               lang: 'id-ID',
               callbacks: {
                  onChange: function(contents, $editable) {
                     @this.set('description', contents);
                  }
               },
               toolbar: [
                  ['style', ['style']],
                  ['font', ['bold', 'underline', 'clear']],
                  ['fontname', ['fontname']],
                  ['color', ['color']],
                  ['para', ['ul', 'ol', 'paragraph']],
                  ['table', ['table']],
                  ['insert', ['link', 'picture']],
                  ['view', ['codeview', 'help']],
               ]
            });

            FilePond.registerPlugin(FilePondPluginImagePreview);
            const inputElement = document.querySelector('#files');
            const pond = FilePond.create(inputElement, {
               files: @json($existingFiles),
            });
            pond.setOptions({
               allowMultiple: 'true',
               server: {
                  process: (fieldName, file, metadata, load, error, progress, abort, transfer, options) => {
                     @this.upload('files', file, load, error, progress);
                  },
                  // revert: (filename, load) => {
                  //    @this.removeUpload('files', filename, load);
                  // },
                  revert: (filename, load) => {
                     if (filename.includes('storage/events/cover/')) {
                        const fileId = filename.split('/').pop();
                        @this.removeFile(fileId, load);
                     } else {
                        @this.removeUpload('files', filename, load);
                     }
                  }

               }
            });

            Livewire.on('close-modal', event => {
               $('#locationPickerModal').modal('hide');
            })
         });
   </script>
   @endpush

</div>