<div class="row">
   <div class="col-xl-4 col-lg-5 col-md-5">
      <!-- About User -->
      <div class="card mb-4">
         <div class="card-body">
            <small class="card-text text-uppercase text-muted">About</small>
            <ul class="list-unstyled my-3 py-1">
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-account-outline mdi-24px"></i><span class="fw-semibold mx-2">Nama :</span>
                  <span>{{ auth()->user()->name }}</span>
               </li>
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-check mdi-24px"></i><span class="fw-semibold mx-2">Status:</span>
                  <span class='text-{{ auth()->user()->status == TRUE ? ' success' : 'danger' }}'>{{
                     auth()->user()->status == TRUE ? 'Aktif' : 'Nonaktif' }}</span>
               </li>
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-star-outline mdi-24px"></i><span class="fw-semibold mx-2">Role:</span>
                  <span>
                     @if(auth()->user()->role == 'superadmin')
                     Super Admin
                     @elseif(auth()->user()->role == 'admin')
                     Admin
                     @else
                     Member
                     @endif
                  </span>
               </li>
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-information-outline mdi-24px"></i><span class="fw-semibold mx-2">Tentang:</span>
                  <span>{{ auth()->user()->description }}</span>
               </li>
            </ul>
            <small class="card-text text-uppercase text-muted">Kontak</small>
            <ul class="list-unstyled my-3 py-1">
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-email-outline mdi-24px"></i><span class="fw-semibold mx-2">Email:</span>
                  <span>{{ auth()->user()->email }}</span>
               </li>
            </ul>
         </div>
      </div>
      <!--/ About User -->
      <!-- Profile Overview -->
      <div class="card mb-4">
         <div class="card-body">
            <small class="card-text text-uppercase text-muted">Status Postingan</small>
            <ul class="list-unstyled mb-0 mt-3 pt-1">
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-check mdi-24px"></i><span class="fw-semibold mx-2">Disetujui:</span>
                  <span class="text-success">{{ auth()->user()->posts()->where('status', 'approved')->count() }}</span>
               </li>
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-clock-outline mdi-24px"></i><span class="fw-semibold mx-2">Pending:</span>
                  <span class="text-primary">{{ auth()->user()->posts()->where('status', 'pending')->count() }}</span>
               </li>
               <li class="d-flex align-items-center mb-3">
                  <i class="mdi mdi-close mdi-24px"></i><span class="fw-semibold mx-2">Ditolak:</span>
                  <span class="text-danger">{{ auth()->user()->posts()->where('status', 'rejected')->count() }}</span>
               </li>
            </ul>
         </div>
      </div>
      <!--/ Profile Overview -->
      
      <!-- Social Media Overview -->
      <div class="card mb-4">
         <div class="card-body">
            <small class="card-text text-uppercase text-muted">Sosial Media</small>
            <div class="d-flex mt-3 mb-2">
               <div class="flex-shrink-0">
                  <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/facebook.png') }}"
                     alt="facebook" class="me-3" height="30">
               </div>
               <div class="row align-items-center">
                  <div class="col-4">
                     <h6 class="mb-0">Facebook</h6>
                  </div>
                  <div class="col-8 text-end">
                     <input type="text" class="form-control" readonly value="{{ auth()->user()->facebook }}">
                  </div>
               </div>
            </div>
            <div class="d-flex mb-2">
               <div class="flex-shrink-0">
                  <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/twitter.png') }}"
                     alt="twitter" class="me-3" height="30">
               </div>
               <div class="row align-items-center">
                  <div class="col-4">
                     <h6 class="mb-0">Twitter</h6>
                  </div>
                  <div class="col-8 text-end">
                     <input type="text" class="form-control" readonly value="{{ auth()->user()->twitter }}">
                  </div>
               </div>
            </div>
            <div class="d-flex mb-2">
               <div class="flex-shrink-0">
                  <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/instagram.png') }}"
                     alt="instagram" class="me-3" height="30">
               </div>
               <div class="row align-items-center">
                  <div class="col-4">
                     <h6 class="mb-0">Instagram</h6>
                  </div>
                  <div class="col-8 text-end">
                     <input type="text" class="form-control" readonly value="{{ auth()->user()->instagram }}">
                  </div>
               </div>
            </div>
            <div class="d-flex mb-2">
               <div class="flex-shrink-0">
                  <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/gmail.png') }}"
                     alt="gmail" class="me-3" height="30">
               </div>
               <div class="row align-items-center">
                  <div class="col-4">
                     <h6 class="mb-0">Gmail</h6>
                  </div>
                  <div class="col-8 text-end">
                     <input type="text" class="form-control" readonly value="{{ auth()->user()->gmail }}">
                  </div>
               </div>
            </div>
            <div class="d-flex mb-2">
               <div class="flex-shrink-0">
                  <img src="{{ asset('assets/dashboard/materialize/assets/img/icons/brands/youtube.png') }}"
                     alt="youtube" class="me-3" height="30">
               </div>
               <div class="row align-items-center">
                  <div class="col-4">
                     <h6 class="mb-0">YouTube</h6>
                  </div>
                  <div class="col-8 text-end">
                     <input type="text" class="form-control" readonly value="{{ auth()->user()->youtube }}">
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--/ Social Media Overview -->
   </div>
   <div class="col-xl-8 col-lg-7 col-md-7">
      <!-- Activity Timeline -->
      <livewire:dashboard.profile.partials.timeline />
      <!--/ Activity Timeline -->
   </div>
</div>