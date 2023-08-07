@extends('dashboard.template.dashboard')
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
         <livewire:dashboard.security.social-media />
      </div>
   </div>
@endsection
