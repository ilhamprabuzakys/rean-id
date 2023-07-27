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
      Sosial Media
   </h4>
   <div class="row col-md-12">
      <ul
         class="nav nav-pills flex-column flex-md-row mb-3 gap-2 gap-lg-0">
         <li class="nav-item">
            <a
               class="nav-link"
               href="{{ route('settings.profile', auth()->user()) }}"><i
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
               class="nav-link active"
               href="#"><i
                  class="mdi mdi-link mdi-20px me-1"></i>Sosial Media</a>
         </li>
      </ul>
      <div class="row">
         <div class="col-md-12 col-12 mb-md-0 mb-4">
            <div class="card">
               <h5 class="card-header pb-1">Connected Accounts</h5>
               <div class="card-body">
                  <p>Display content from your connected accounts on your site</p>
                  <!-- Connections -->
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/google.png') }}" alt="google" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-9">
                           <h6 class="mb-0">Google</h6>
                           <small class="text-muted">Calendar and contacts</small>
                        </div>
                        <div class="col-3 text-end">
                           <label class="switch">
                              <input type="checkbox" class="switch-input" checked />
                              <span class="switch-toggle-slider">
                                 <span class="switch-on"></span>
                                 <span class="switch-off"></span>
                              </span>
                              <span class="switch-label"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/slack.png') }}" alt="slack" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-9">
                           <h6 class="mb-0">Slack</h6>
                           <small class="text-muted">Communication</small>
                        </div>
                        <div class="col-3 text-end">
                           <label class="switch">
                              <input type="checkbox" class="switch-input" />
                              <span class="switch-toggle-slider">
                                 <span class="switch-on"></span>
                                 <span class="switch-off"></span>
                              </span>
                              <span class="switch-label"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/github.png') }}" alt="github" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-9">
                           <h6 class="mb-0">Github</h6>
                           <small class="text-muted">Manage your Git repositories</small>
                        </div>
                        <div class="col-3 text-end">
                           <label class="switch">
                              <input type="checkbox" class="switch-input" checked />
                              <span class="switch-toggle-slider">
                                 <span class="switch-on"></span>
                                 <span class="switch-off"></span>
                              </span>
                              <span class="switch-label"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/mailchimp.png') }}" alt="mailchimp" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-9">
                           <h6 class="mb-0">Mailchimp</h6>
                           <small class="text-muted">Email marketing service</small>
                        </div>
                        <div class="col-3 text-end">
                           <label class="switch">
                              <input type="checkbox" class="switch-input" checked />
                              <span class="switch-toggle-slider">
                                 <span class="switch-on"></span>
                                 <span class="switch-off"></span>
                              </span>
                              <span class="switch-label"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/asana.png') }}" alt="asana" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-9">
                           <h6 class="mb-0">Asana</h6>
                           <small class="text-muted">Communication</small>
                        </div>
                        <div class="col-3 text-end">
                           <label class="switch">
                              <input type="checkbox" class="switch-input" />
                              <span class="switch-toggle-slider">
                                 <span class="switch-on"></span>
                                 <span class="switch-off"></span>
                              </span>
                              <span class="switch-label"></span>
                           </label>
                        </div>
                     </div>
                  </div>
                  <!-- /Connections -->
               </div>
            </div>
         </div>
         <div class="col-md-6 col-12">
            <div class="card">
               <h5 class="card-header pb-1">Social Accounts</h5>
               <div class="card-body">
                  <p>Display content from social accounts on your site</p>
                  <!-- Social Accounts -->
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-7">
                           <h6 class="mb-0">Facebook</h6>
                           <small class="text-muted">Not Connected</small>
                        </div>
                        <div class="col-5 text-end">
                           <button class="btn btn-text-secondary btn-icon rounded-pill"><i class="mdi mdi-link-variant mdi-24px"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/twitter.png') }}" alt="twitter" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-7">
                           <h6 class="mb-0">Twitter</h6>
                           <a href="https://twitter.com/pixinvents" target="_blank">@Pixinvent</a>
                        </div>
                        <div class="col-5 text-end">
                           <button class="btn btn-text-danger btn-icon rounded-pill"><i class="mdi mdi-delete-outline mdi-24px"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-7">
                           <h6 class="mb-0">instagram</h6>
                           <a href="https://www.instagram.com/pixinvents/" target="_blank">@Pixinvent</a>
                        </div>
                        <div class="col-5 text-end">
                           <button class="btn btn-text-danger btn-icon rounded-pill"><i class="mdi mdi-delete-outline mdi-24px"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex mb-3">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/dribbble.png') }}" alt="dribbble" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-7">
                           <h6 class="mb-0">Dribbble</h6>
                           <small class="text-muted">Not Connected</small>
                        </div>
                        <div class="col-5 text-end">
                           <button class="btn btn-text-secondary btn-icon rounded-pill"><i class="mdi mdi-link-variant mdi-24px"></i></button>
                        </div>
                     </div>
                  </div>
                  <div class="d-flex">
                     <div class="flex-shrink-0">
                        <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/behance.png') }}" alt="behance" class="me-3" height="30">
                     </div>
                     <div class="flex-grow-1 row">
                        <div class="col-7">
                           <h6 class="mb-0">Behance</h6>
                           <small class="text-muted">Not Connected</small>
                        </div>
                        <div class="col-5 text-end">
                           <button class="btn btn-text-secondary btn-icon rounded-pill"><i class="mdi mdi-link-variant mdi-24px"></i></button>
                        </div>
                     </div>
                  </div>
                  <!-- /Social Accounts -->
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
