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
            {{-- <div class="card">
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
            </div> --}}
         </div>
         <div class="col-md-12 col-12">
            <div class="card" id="card-social-media-user">
               <form action="{{ route('settings.social-media.update', $user) }}" method="post">
                  @csrf
                  <h5 class="card-header pb-1">Koneksi Akun Sosial</h5>
                  <div class="card-body">
                     <p>Lengkapi data mu agar kamu semakin populer demi postingannya.</p>
                     <!-- Social Accounts -->
                     <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                           <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/facebook.png') }}" alt="facebook" class="me-3" height="30">
                        </div>
                        <div class="flex-grow-1 row">
                           <div class="col-2">
                              <h6 class="mb-0">Facebook</h6>
                              @if ($user->facebook !== null)
                                 <small class="text-success">Connected</small>
                              @else
                                 <small class="text-danger">Not Connected</small>
                              @endif
                           </div>
                           <div class="col-10 text-end">
                              <div class="input-group">
                                 <span class="input-group-text" id="slug-input-addon">www.facebook.com/</span>
                                 <input type="text"
                                    class="form-control @error('facebook') is-invalid @enderror" name="facebook" id="facebook" value="{{ old('facebook', $user->facebook) }}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                           <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/twitter.png') }}" alt="twitter" class="me-3" height="30">
                        </div>
                        <div class="flex-grow-1 row">
                           <div class="col-2">
                              <h6 class="mb-0">Twitter</h6>
                              @if ($user->twitter !== null)
                                 <small class="text-success">Connected</small>
                              @else
                                 <small class="text-danger">Not Connected</small>
                              @endif
                           </div>
                           <div class="col-10 text-end">
                              <div class="input-group">
                                 <span class="input-group-text" id="slug-input-addon">www.twitter.com/</span>
                                 <input type="text"
                                    class="form-control @error('twitter') is-invalid @enderror" name="twitter" id="twitter" value="{{ old('twitter', $user->twitter) }}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                           <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/instagram.png') }}" alt="instagram" class="me-3" height="30">
                        </div>
                        <div class="flex-grow-1 row">
                           <div class="col-2">
                              <h6 class="mb-0">Instagram</h6>
                              @if ($user->instagram !== null)
                                 <small class="text-success">Connected</small>
                              @else
                                 <small class="text-danger">Not Connected</small>
                              @endif
                           </div>
                           <div class="col-10 text-end">
                              <div class="input-group">
                                 <span class="input-group-text" id="slug-input-addon">www.instagram.com/</span>
                                 <input type="text"
                                    class="form-control @error('instagram') is-invalid @enderror" name="instagram" id="instagram" value="{{ old('instagram', $user->instagram) }}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex mb-3">
                        <div class="flex-shrink-0">
                           <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/gmail.png') }}" alt="gmail" class="me-3" height="30">
                        </div>
                        <div class="flex-grow-1 row">
                           <div class="col-2">
                              <h6 class="mb-0">Gmail</h6>
                              @if ($user->gmail !== null)
                                 <small class="text-success">Connected</small>
                              @else
                                 <small class="text-danger">Not Connected</small>
                              @endif
                           </div>
                           <div class="col-10 text-end">
                              <div class="input-group">
                                 <input type="text"
                                    class="form-control @error('gmail') is-invalid @enderror" name="gmail" id="gmail" value="{{ old('gmail', $user->gmail) }}">
                                 <span class="input-group-text" id="slug-input-addon">@gmail.com</span>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="d-flex">
                        <div class="flex-shrink-0">
                           <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/youtube.png') }}" alt="youtube" class="me-3" height="30">
                        </div>
                        <div class="flex-grow-1 row">
                           <div class="col-2">
                              <h6 class="mb-0">YouTube</h6>
                              @if ($user->youtube !== null)
                                 <small class="text-success">Connected</small>
                              @else
                                 <small class="text-danger">Not Connected</small>
                              @endif
                           </div>
                           <div class="col-10 text-end">
                              <div class="input-group">
                                 <span class="input-group-text" id="slug-input-addon">www.youtube.com/@/</span>
                                 <input type="text"
                                    class="form-control @error('youtube') is-invalid @enderror" name="youtube" id="youtube" value="{{ old('youtube', $user->youtube) }}">
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- /Social Accounts -->
                     <div class="my-4 float-end">
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
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
@endsection
