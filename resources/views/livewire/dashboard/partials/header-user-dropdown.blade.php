<li class="nav-item navbar-dropdown dropdown-user dropdown">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
       <div class="avatar avatar-online">
          @if (auth()->user()->avatar == null)
             <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt class="w-px-40 h-auto rounded-circle img-profile-header">
          @else
             <img src="{{ asset(auth()->user()->avatar) }}" alt class="w-px-40 h-auto rounded-circle img-profile-header">
          @endif
       </div>
    </a>
    <ul class="dropdown-menu dropdown-menu-end">
       <li>
          <a class="dropdown-item" href="pages-account-settings-account.html">
             <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                   <div class="avatar avatar-online">
                      @if (auth()->user()->avatar == null)
                         <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt class="w-px-40 h-auto rounded-circle img-profile-header">
                      @else
                         <img src="{{ asset(auth()->user()->avatar) }}" alt class="w-px-40 h-auto rounded-circle img-profile-header">
                      @endif
                   </div>
                </div>
                <div class="flex-grow-1">
                   <span class="fw-semibold d-block">{{ auth()->user()->name }}</span>
                   <small class="text-muted">Login sebagai {{ auth()->user()->role }}</small>
                </div>
             </div>
          </a>
       </li>
       <li>
          <div class="dropdown-divider"></div>
       </li>
       <li>
          <a class="dropdown-item" href="javascript:void(0)">
             <i class="mdi mdi-clock-outline me-2"></i>
             <span class="align-middle text-muted small">Terakhir login {{ \Carbon\Carbon::parse(auth()->user()->last_activity_at)->diffForHumans() }}</span>
          </a>
       </li>
       <li>
          <div class="dropdown-divider"></div>
       </li>
       <li>
          <a class="dropdown-item" href="{{ route('profile') }}">
             <i class="mdi mdi-account-outline me-2"></i>
             <span class="align-middle">My Profile</span>
          </a>
       </li>
       <li>
          <a class="dropdown-item" href="{{ route('settings', ['tab' => 'security']) }}">
             <i class="mdi mdi-cog-outline me-2"></i>
             <span class="align-middle">Settings</span>
          </a>
       </li>
       <li>
          <div class="dropdown-divider"></div>
       </li>
       <li>
          <a class="dropdown-item" href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#logoutModal">
             <i class="mdi mdi-logout me-2"></i>
             <span class="align-middle">Log Out</span>
          </a>
       </li>
    </ul>
 </li>