<div class="row">
   <div class="col-12">
      <div class="card mb-4">
         <div class="user-profile-header-banner">
            <img src="{{ asset('assets/dashboard/materialize/assets/img/pages/profile-banner.png') }}"
               alt="Banner image" class="rounded-top" />
         </div>
         <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
            <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
               <img src="{{ asset(auth()->user()->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt="user image"
                  class="d-block h-auto ms-0 ms-sm-4 rounded user-profile-img" />
            </div>
            <div class="flex-grow-1 mt-3 mt-sm-5">
               <div
                  class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
                  <div class="user-profile-info">
                     <h4>{{ auth()->user()->name }}</h4>
                     <ul
                        class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                        <li class="list-inline-item">
                           <i class="mdi mdi-account-outline me-1 mdi-20px"></i><span class="fw-semibold">
                              @if(auth()->user()->role == 'superadmin')
                              Super Admin
                              @elseif(auth()->user()->role == 'admin')
                              Admin
                              @else
                              Member
                              @endif
                           </span>
                        </li>
                        <li class="list-inline-item">
                           <i class="mdi mdi-calendar-blank-outline me-1 mdi-20px"></i><span class="fw-semibold">
                              Bergabung sejak {{ auth()->user()->created_at->format('F Y') }}</span>
                        </li>
                     </ul>
                  </div>
                  <a href="{{ route('settings', ['tab' => 'profile']) }}" class="btn btn-primary">
                     <i class="mdi mdi-account-check-outline me-1"></i>Edit Profile
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>