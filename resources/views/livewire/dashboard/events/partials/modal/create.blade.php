<div class="accordion">
   <div class="card accordion-item">
      <h2 class="accordion-header" id="headingCreateEventForm">
         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#createEventForm" aria-expanded="false" aria-controls="createEventForm"> <i class="fas fa-plus-circle me-2"></i> Buat Event </button>
      </h2>
      {{-- Create or Update Form --}}
      <div id="createEventForm" class="accordion-collapse collapse" aria-labelledby="headingCreateEventForm" data-bs-parent="#collapsibleSection">
         <div class="accordion-body">
            <div class="row g-3">
               <div class="col-md-6">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="title">Judul Acara</label>
                     <div class="col-sm-9">
                        <input type="text" id="title" class="form-control" placeholder="Kampanye Anti Narkoba" />
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="organizer">Penyelenggara</label>
                     <div class="col-sm-9">
                        <input type="text" id="organizer" class="form-control" placeholder />
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="description">Deskripsi</label>
                     <div class="col-sm-9">
                        <textarea name="description" class="form-control" id="description" rows="4" placeholder="Deskripsi dari keseluruhan event yang akan diadakan"></textarea>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="mb-3">
                     <div class="row">
                        <label class="col-sm-3 col-form-label text-sm-end" for="contact_email">Email</label>
                        <div class="col-sm-9">
                           <input type="text" id="contact_email" class="form-control" placeholder="penyelenggara@gmail.com" />
                        </div>
                     </div>
                  </div>
                  <div class="mb-3">
                     <div class="row">
                        <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-landmark">Provinsi</label>
                        <div class="col-sm-9">
                           <input type="text" id="collapsible-landmark" class="form-control" placeholder="Jawa Barat" />
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <label class="col-sm-3 col-form-label text-sm-end" for="merge_date">Tanggal</label>
                     <div class="col-sm-9">
                        <input type="text" id="merge_date" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Tanggal acara">
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
                     <label class="col-sm-3 col-form-label text-sm-end" for="collapsible-landmark">Kota</label>
                     <div class="col-sm-9">
                        <input type="text" id="collapsible-landmark" class="form-control" placeholder="Kota Bandung" />
                     </div>
                  </div>
               </div>
               <div class="col-md-7">
                  <div class="row" style="margin-right: 4rem;">
                     <label class="col-sm-3 col-form-label text-end" for="collapsible-landmark">Lokasi</label>
                     <div class="col-sm-6">
                        <input type="text" id="collapsible-landmark" class="form-control" placeholder="Kota Bandung">
                     </div>
                     <div class="col-sm-3">
                        <button id="locationPickerBtn" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#locationPickerModal"><i class="fas fa-location-pin me-2"></i>Pilih</button>
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
            {{-- <div class="row mt-5">
               <div class="col-sm-3">
                  <label class="form-label" for="location">Lokasi</label>
               </div>
               <div class="col-sm-4">
                  <input type="text" id="location" class="form-control" placeholder="Moh. Toha no 77." />
               </div>
               <div class="col-sm-4">
                  
               </div>
            </div> --}}
            {{-- <div class="col-md-6">
              <div class="row">
                <label class="col-sm-3 col-form-label text-sm-end">Address Type</label>
                <div class="col-sm-9">
                  <div class="form-check mb-2">
                    <input name="collapsible-addressType" class="form-check-input" type="radio" value="" id="collapsible-addressType-home" checked="" />
                    <label class="form-check-label" for="collapsible-addressType-home"> Home (All day delivery) </label>
                  </div>
                  <div class="form-check">
                    <input name="collapsible-addressType" class="form-check-input" type="radio" value="" id="collapsible-addressType-office" />
                    <label class="form-check-label" for="collapsible-addressType-office"> Office (Delivery between 10 AM - 5 PM) </label>
                  </div>
                </div>
              </div>
            </div> --}}
         </div>
      </div>
   </div>
</div>