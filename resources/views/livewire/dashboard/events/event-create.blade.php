<div class="card">
   <div class="card-header">
      <h2>
         <i class="fas fa-plus-circle me-2"></i> Buat Event
      </h2>
   </div>
   {{-- Create or Update Form --}}
   <div class="card-body">
      <form wire:submit.prevent='store'>
         <div class="row g-3">
            <div class="col-md-6">
               <div class="row">
                  <label class="col-sm-3 col-form-label text-sm-end" for="title">Judul Acara</label>
                  <div class="col-sm-9">
                     <input type="text" id="title" class="form-control" placeholder="Kampanye Anti Narkoba" wire:model='title' />
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="row">
                  <label class="col-sm-3 col-form-label text-sm-end" for="organizer">Penyelenggara</label>
                  <div class="col-sm-9">
                     <input type="text" id="organizer" class="form-control" wire:model='organizer' />
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="row">
                  <label class="col-sm-3 col-form-label text-sm-end" for="description">Deskripsi</label>
                  <div class="col-sm-9">
                     <textarea name="description" class="form-control" id="description" rows="4" placeholder="Deskripsi dari keseluruhan event yang akan diadakan" wire:model='description'></textarea>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="mb-3">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="contact_email">Email</label>
                     <div class="col-sm-9">
                        <input type="text" id="contact_email" class="form-control" wire:model='contact_email' placeholder="penyelenggara@gmail.com" />
                     </div>
                  </div>
               </div>
               <div class="mb-3">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="province">Provinsi</label>
                     <div class="col-sm-9">
                        <input type="text" id="province" class="form-control" placeholder="Jawa Barat" wire:model='province' />
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-md-6">
               <div class="row">
                  <label class="col-sm-3 col-form-label text-sm-end" for="merge_date">Tanggal</label>
                  <div class="col-sm-9">
                     <input type="text" id="merge_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Tanggal acara" wire:model='merge_date'>
                  </div>
                  {{-- <div class="col-sm-4">
                        <input type="datetime" name="" id="">
                     </div>
                     <div class="col-sm-4">
                        <input type="datetime" name="" id="">
                     </div> --}}
               </div>
            </div>
            <div class="col-md-6">
               <div class="row">
                  <label class="col-sm-3 col-form-label text-sm-end" for="city">Kota</label>
                  <div class="col-sm-9">
                     <input type="text" id="city" wire:model='city' class="form-control" placeholder="Kota Bandung" />
                  </div>
               </div>
            </div>
            <div class="col-md-7">
               <div class="row" style="margin-right: 4rem;">
                  <label class="col-sm-3 col-form-label text-end" for="location">Lokasi</label>
                  <div class="col-sm-6">
                     {{-- <input type="text" id="location" class="form-control" placeholder="Kota Bandung" wire:model='location'> --}}
                     <textarea name="description" class="form-control" id="location" rows="4" placeholder="Lokasi diadakannya Event" wire:model='location'></textarea>
                  </div>
                  <div class="col-sm-3">
                     <button id="locationPickerBtn" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#locationPickerModal"><i
                           class="fas fa-location-pin me-2"></i>Pilih</button>
                  </div>
               </div>
            </div>
            <div class="col-md-5">
               <div class="row">
                  <div class="col-sm-12 text-end">
                     <button class="btn btn-primary px-2" type="submit"><i class="fas fa-save me-2"></i>Simpan Event</button>
                  </div>
               </div>
            </div>
         </div>
      </form>
   </div>
</div>
