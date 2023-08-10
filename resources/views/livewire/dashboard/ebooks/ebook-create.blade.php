<div class="accordion mb-2">
   <div class="card accordion-item">
      <h2 class="accordion-header" id="headingCreateEbookForm">
         <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#createEbookForm" aria-expanded="false" aria-controls="createEbookForm"> <i
               class="fas fa-plus-circle me-2"></i> Buat Ebook </button>
      </h2>
      {{-- Create or Update Form --}}
      <div id="createEbookForm" class="accordion-collapse show" aria-labelledby="headingCreateEbookForm" data-bs-parent="#collapsibleSection">
         <form wire:submit.prevent='store()'>
            <div class="accordion-body">
               <div class="row g-4">
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="title" class="form-control @error('title') is-invalid @enderror" />
                        <label for="title">Judul Buku</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="number" id="pages" class="form-control @error('pages') is-invalid @enderror" />
                        <label for="pages">Pages</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="author" class="form-control @error('author') is-invalid @enderror" />
                        <label for="author">Judul Buku</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="number" id="pages" class="form-control @error('pages') is-invalid @enderror" />
                        <label for="pages">Pages</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="form-floating form-floating-outline">
                        <textarea name="collapsible-address" class="form-control" id="collapsible-address" rows="2" placeholder="1456, Mall Road" style="height: 60px;"></textarea>
                        <label for="collapsible-address">Address</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="collapsible-pincode" class="form-control" placeholder="658468" />
                        <label for="collapsible-pincode">Pincode</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="collapsible-landmark" class="form-control" placeholder="Nr. Wall Street" />
                        <label for="collapsible-landmark">Landmark</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <input type="text" id="collapsible-city" class="form-control" placeholder="Jackson" />
                        <label for="collapsible-city">City</label>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-floating form-floating-outline">
                        <select id="collapsible-state" class="select2 form-select" data-allow-clear="true">
                           <option value="">Select</option>
                           <option value="AL">Alabama</option>
                           <option value="AK">Alaska</option>
                           <option value="AZ">Arizona</option>
                           <option value="AR">Arkansas</option>
                           <option value="CA">California</option>
                           <option value="CO">Colorado</option>
                           <option value="CT">Connecticut</option>
                           <option value="DE">Delaware</option>
                           <option value="DC">District Of Columbia</option>
                           <option value="FL">Florida</option>
                           <option value="GA">Georgia</option>
                           <option value="HI">Hawaii</option>
                           <option value="ID">Idaho</option>
                           <option value="IL">Illinois</option>
                           <option value="IN">Indiana</option>
                           <option value="IA">Iowa</option>
                           <option value="KS">Kansas</option>
                           <option value="KY">Kentucky</option>
                           <option value="LA">Louisiana</option>
                           <option value="ME">Maine</option>
                           <option value="MD">Maryland</option>
                           <option value="MA">Massachusetts</option>
                           <option value="MI">Michigan</option>
                           <option value="MN">Minnesota</option>
                           <option value="MS">Mississippi</option>
                           <option value="MO">Missouri</option>
                           <option value="MT">Montana</option>
                           <option value="NE">Nebraska</option>
                           <option value="NV">Nevada</option>
                           <option value="NH">New Hampshire</option>
                           <option value="NJ">New Jersey</option>
                           <option value="NM">New Mexico</option>
                           <option value="NY">New York</option>
                           <option value="NC">North Carolina</option>
                           <option value="ND">North Dakota</option>
                           <option value="OH">Ohio</option>
                           <option value="OK">Oklahoma</option>
                           <option value="OR">Oregon</option>
                           <option value="PA">Pennsylvania</option>
                           <option value="RI">Rhode Island</option>
                           <option value="SC">South Carolina</option>
                           <option value="SD">South Dakota</option>
                           <option value="TN">Tennessee</option>
                           <option value="TX">Texas</option>
                           <option value="UT">Utah</option>
                           <option value="VT">Vermont</option>
                           <option value="VA">Virginia</option>
                           <option value="WA">Washington</option>
                           <option value="WV">West Virginia</option>
                           <option value="WI">Wisconsin</option>
                           <option value="WY">Wyoming</option>
                        </select>
                        <label for="collapsible-state">State</label>
                     </div>
                  </div>

                  <label class="form-check-label">Address Type</label>
                  <div class="col mt-2">
                     <div class="form-check form-check-inline">
                        <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-home" checked="" />
                        <label class="form-check-label" for="collapsible-address-type-home">Home (All day delivery)</label>
                     </div>
                     <div class="form-check form-check-inline">
                        <input name="collapsible-address-type" class="form-check-input" type="radio" value="" id="collapsible-address-type-office" />
                        <label class="form-check-label" for="collapsible-address-type-office"> Office (Delivery between 10 AM - 5 PM) </label>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12">
                        <button class="btn btn-primary px-2" type="submit"><i class="fas fa-save me-2"></i>Simpan Ebook</button>
                     </div>
                  </div>
               </div>
         </form>
      </div>
   </div>
</div>
