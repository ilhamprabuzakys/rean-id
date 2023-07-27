@extends('dashboard.template.dashboard')
@push('vendor-css')
   {{-- <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/node-waves/node-waves.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/typeahead-js/typeahead.css') }}" /> --}}
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/animate-css/animate.css') }}" />
   <link rel="stylesheet" href="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.css') }}" />
@endpush
@push('vendor-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/select2/select2.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/cleavejs/cleave-phone.js') }}"></script>
   <script src="{{ asset('assets/dashboard/materialize/assets/vendor/libs/sweetalert2/sweetalert2.js') }}"></script>
@endpush
@push('page-js')
   <script src="{{ asset('assets/dashboard/materialize/assets/js/pages-account-settings-account.js') }}"></script>
@endpush
@section('content')
   <h4 class="fw-bold py-3 mb-4">
      <a class="text-muted fw-light" href="{{ route('dashboard') }}">Home /</a>
      <a class="text-muted fw-light" href="{{ route('posts.index') }}">Profile /</a>
      Informasi Akun
   </h4>
   <div class="row">
      <div class="col-md-12">
         <ul
            class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
            <li class="nav-item">
               <a
                  class="nav-link active"
                  href="javascript:void(0);"><i
                     class="mdi mdi-account-outline mdi-20px me-1"></i>Informasi Akun</a>
            </li>
            <li class="nav-item">
               <a
                  class="nav-link"
                  href="{{ route('settings.security', auth()->user()) }}"><i
                     class="mdi mdi-lock-open-outline mdi-20px me-1"></i>Keamanan</a>
            </li>
            <li class="nav-item">
               <a
                  class="nav-link"
                  href="{{ route('settings.social-media', auth()->user()) }}"><i
                     class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
            </li>
         </ul>
         <div class="card mb-4">
            <h4 class="card-header">
               Detail Profile
            </h4>
            <!-- Account -->
            <div class="card-body">
               <div
                  class="d-flex align-items-start align-items-sm-center gap-4">
                  <img
                     src="{{ asset('assets/dashboard/materialize/assets/img/avatars/1.png') }}"
                     alt="user-avatar"
                     class="d-block w-px-120 h-px-120 rounded"
                     id="uploadedAvatar" />
                  <div class="button-wrapper">
                     <label
                        for="upload"
                        class="btn btn-primary me-2 mb-3"
                        tabindex="0">
                        <span
                           class="d-none d-sm-block">Unggah Foto Baru</span>
                        <i
                           class="mdi mdi-tray-arrow-up d-block d-sm-none"></i>
                        <input
                           type="file"
                           id="upload"
                           class="account-file-input"
                           hidden
                           accept="image/png, image/jpeg" />
                     </label>
                     <button
                        type="button"
                        class="btn btn-outline-secondary account-image-reset mb-3">
                        <i
                           class="mdi mdi-reload d-block d-sm-none"></i>
                        <span
                           class="d-none d-sm-block">Urungkan</span>
                     </button>

                     <div
                        class="text-muted small">
                        Hanya JPG, JPEG dan PNG yang diperbolehkan.
                        Ukuran maksimal 800KB
                     </div>
                  </div>
               </div>
            </div>
            <div class="card-body pt-2 mt-1">
               <form
                  id="formAccountSettings"
                  method="POST"
                  onsubmit="return false">
                  <div class="row mt-2 gy-4">
                     <div class="col-md-12">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="text"
                              id="name"
                              name="name"
                              value="{{ auth()->user()->name }}"
                              autofocus />
                           <label
                              for="firstName">Nama Lengkap</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="email"
                              id="email"
                              name="email"
                              value="{{ $user->email }}"
                              disabled
                              />
                           <label for="email">E-mail</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="input-group input-group-merge">
                           <div
                              class="form-floating form-floating-outline">
                              <input
                                 type="text"
                                 id="phoneNumber"
                                 name="notelp"
                                 class="form-control"
                                 placeholder="0851 6278 3743" />
                              <label
                                 for="phoneNumber">Phone
                                 Number</label>
                           </div>
                           <span
                              class="input-group-text">US (+1)</span>
                        </div>
                     </div>
                     <div class="col-md-12">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              type="text"
                              class="form-control"
                              id="address"
                              name="address"
                              placeholder="Address" />
                           <label for="address">Address</label>
                        </div>
                     </div>
                     {{-- <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              class="form-control"
                              type="text"
                              id="state"
                              name="state"
                              placeholder="California" />
                           <label for="state">State</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <input
                              type="text"
                              class="form-control"
                              id="zipCode"
                              name="zipCode"
                              placeholder="231465"
                              maxlength="6" />
                           <label for="zipCode">Zip Code</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <select
                              id="country"
                              class="select2 form-select">
                              <option
                                 value="">
                                 Select
                              </option>
                              <option
                                 value="Australia">
                                 Australia
                              </option>
                              <option
                                 value="Bangladesh">
                                 Bangladesh
                              </option>
                              <option
                                 value="Belarus">
                                 Belarus
                              </option>
                              <option
                                 value="Brazil">
                                 Brazil
                              </option>
                              <option
                                 value="Canada">
                                 Canada
                              </option>
                              <option
                                 value="China">
                                 China
                              </option>
                              <option
                                 value="France">
                                 France
                              </option>
                              <option
                                 value="Germany">
                                 Germany
                              </option>
                              <option
                                 value="India">
                                 India
                              </option>
                              <option
                                 value="Indonesia">
                                 Indonesia
                              </option>
                              <option
                                 value="Israel">
                                 Israel
                              </option>
                              <option
                                 value="Italy">
                                 Italy
                              </option>
                              <option
                                 value="Japan">
                                 Japan
                              </option>
                              <option
                                 value="Korea">
                                 Korea,
                                 Republic of
                              </option>
                              <option
                                 value="Mexico">
                                 Mexico
                              </option>
                              <option
                                 value="Philippines">
                                 Philippines
                              </option>
                              <option
                                 value="Russia">
                                 Russian
                                 Federation
                              </option>
                              <option
                                 value="South Africa">
                                 South Africa
                              </option>
                              <option
                                 value="Thailand">
                                 Thailand
                              </option>
                              <option
                                 value="Turkey">
                                 Turkey
                              </option>
                              <option
                                 value="Ukraine">
                                 Ukraine
                              </option>
                              <option
                                 value="United Arab Emirates">
                                 United Arab
                                 Emirates
                              </option>
                              <option
                                 value="United Kingdom">
                                 United
                                 Kingdom
                              </option>
                              <option
                                 value="United States">
                                 United
                                 States
                              </option>
                           </select>
                           <label for="country">Country</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <select
                              id="language"
                              class="select2 form-select">
                              <option
                                 value="">
                                 Select
                                 Language
                              </option>
                              <option
                                 value="en">
                                 English
                              </option>
                              <option
                                 value="fr">
                                 French
                              </option>
                              <option
                                 value="de">
                                 German
                              </option>
                              <option
                                 value="pt">
                                 Portuguese
                              </option>
                           </select>
                           <label
                              for="language">Language</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <select
                              id="timeZones"
                              class="select2 form-select">
                              <option
                                 value="">
                                 Select
                                 Timezone
                              </option>
                              <option
                                 value="-12">
                                 (GMT-12:00)
                                 International
                                 Date Line
                                 West
                              </option>
                              <option
                                 value="-11">
                                 (GMT-11:00)
                                 Midway
                                 Island,
                                 Samoa
                              </option>
                              <option
                                 value="-10">
                                 (GMT-10:00)
                                 Hawaii
                              </option>
                              <option
                                 value="-9">
                                 (GMT-09:00)
                                 Alaska
                              </option>
                              <option
                                 value="-8">
                                 (GMT-08:00)
                                 Pacific Time
                                 (US &
                                 Canada)
                              </option>
                              <option
                                 value="-8">
                                 (GMT-08:00)
                                 Tijuana,
                                 Baja
                                 California
                              </option>
                              <option
                                 value="-7">
                                 (GMT-07:00)
                                 Arizona
                              </option>
                              <option
                                 value="-7">
                                 (GMT-07:00)
                                 Chihuahua,
                                 La Paz,
                                 Mazatlan
                              </option>
                              <option
                                 value="-7">
                                 (GMT-07:00)
                                 Mountain
                                 Time (US &
                                 Canada)
                              </option>
                              <option
                                 value="-6">
                                 (GMT-06:00)
                                 Central
                                 America
                              </option>
                              <option
                                 value="-6">
                                 (GMT-06:00)
                                 Central Time
                                 (US &
                                 Canada)
                              </option>
                              <option
                                 value="-6">
                                 (GMT-06:00)
                                 Guadalajara,
                                 Mexico City,
                                 Monterrey
                              </option>
                              <option
                                 value="-6">
                                 (GMT-06:00)
                                 Saskatchewan
                              </option>
                              <option
                                 value="-5">
                                 (GMT-05:00)
                                 Bogota,
                                 Lima, Quito,
                                 Rio Branco
                              </option>
                              <option
                                 value="-5">
                                 (GMT-05:00)
                                 Eastern Time
                                 (US &
                                 Canada)
                              </option>
                              <option
                                 value="-5">
                                 (GMT-05:00)
                                 Indiana
                                 (East)
                              </option>
                              <option
                                 value="-4">
                                 (GMT-04:00)
                                 Atlantic
                                 Time
                                 (Canada)
                              </option>
                              <option
                                 value="-4">
                                 (GMT-04:00)
                                 Caracas, La
                                 Paz
                              </option>
                           </select>
                           <label
                              for="timeZones">Timezone</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div
                           class="form-floating form-floating-outline">
                           <select
                              id="currency"
                              class="select2 form-select">
                              <option
                                 value="">
                                 Select
                                 Currency
                              </option>
                              <option
                                 value="usd">
                                 USD
                              </option>
                              <option
                                 value="euro">
                                 Euro
                              </option>
                              <option
                                 value="pound">
                                 Pound
                              </option>
                              <option
                                 value="bitcoin">
                                 Bitcoin
                              </option>
                           </select>
                           <label
                              for="currency">Currency</label>
                        </div>
                     </div> --}}
                  </div>
                  <div class="mt-4">
                     <button
                        type="submit"
                        class="btn btn-primary me-2">
                        Save changes
                     </button>
                     <button
                        type="reset"
                        class="btn btn-outline-secondary">
                        Cancel
                     </button>
                  </div>
               </form>
            </div>
            <!-- /Account -->
         </div>
         <div class="card">
            <h5 class="card-header">
               Delete Account
            </h5>
            <div class="card-body">
               <div class="mb-3 col-12 mb-0">
                  <div
                     class="alert alert-warning">
                     <h6
                        class="alert-heading mb-1">
                        Are you sure you want to
                        delete your account?
                     </h6>
                     <p class="mb-0">
                        Once you delete your
                        account, there is no
                        going back. Please be
                        certain.
                     </p>
                  </div>
               </div>
               <form
                  id="formAccountDeactivation"
                  onsubmit="return false">
                  <div class="form-check mb-3">
                     <input
                        class="form-check-input"
                        type="checkbox"
                        name="accountActivation"
                        id="accountActivation" />
                     <label
                        class="form-check-label"
                        for="accountActivation">I confirm my account
                        deactivation</label>
                  </div>
                  <button
                     type="submit"
                     class="btn btn-danger deactivate-account">
                     Deactivate Account
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
