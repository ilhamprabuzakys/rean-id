<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

   <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0   d-xl-none ">
      <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
         <i class="mdi mdi-menu mdi-24px"></i>
      </a>
   </div>

   <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

      <!-- Search -->
      <div class="navbar-nav align-items-center">
         <div class="nav-item navbar-search-wrapper mb-0">
            <a class="nav-item nav-link search-toggler fw-normal px-0" href="javascript:void(0);">
               <i class="mdi mdi-magnify mdi-24px scaleX-n1-rtl"></i>
               <span class="d-none d-md-inline-block text-muted">Search (Ctrl+/)</span>
            </a>
         </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">

         <!-- Style Switcher -->
         <li class="nav-item me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow" href="javascript:void(0);">
               <i class='mdi mdi-24px'></i>
            </a>
         </li>
         <!--/ Style Switcher -->

         <!-- Quick links  -->
         <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
               data-bs-auto-close="outside" aria-expanded="false">
               <i class='mdi mdi-view-grid-plus-outline mdi-24px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
               <div class="dropdown-menu-header border-bottom">
                  <div class="dropdown-header d-flex align-items-center py-3">
                     <h5 class="text-body mb-0 me-auto">Menu Cepat</h5>
                     <a href="javascript:void(0)" class="dropdown-shortcuts-add text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i
                           class="mdi mdi-view-grid-plus-outline mdi-24px"></i></a>
                  </div>
               </div>
               <div class="dropdown-shortcuts-list scrollable-container">
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-chart-pie-outline fs-4"></i>
                        </span>
                        <a href="{{ route('dashboard') }}" class="stretched-link">Dashboard</a>
                        <small class="text-muted mb-0">Statistik Data</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-calendar fs-4"></i>
                        </span>
                        <a href="{{ route('posts.index') }}" class="stretched-link">Postingan</a>
                        <small class="text-muted mb-0">Kelola blog</small>
                     </div>

                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-file-document-outline fs-4"></i>
                        </span>
                        <a href="{{ route('categories.index') }}" class="stretched-link">Kategori</a>
                        <small class="text-muted mb-0">Kelola struktur blog</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-shield-check-outline fs-4"></i>
                        </span>
                        <a href="{{ route('tags.index') }}" class="stretched-link">HashTags</a>
                        <small class="text-muted mb-0">Kelola label postingan</small>
                     </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-shield-check-outline fs-4"></i>
                        </span>
                        <a href="{{ route('tags.index') }}" class="stretched-link">Role dan Permission</a>
                        <small class="text-muted mb-0">Kelola hak akses</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-account-outline fs-4"></i>
                        </span>
                        <a href="{{ route('users.index') }}" class="stretched-link">Users</a>
                        <small class="text-muted mb-0">Manajemen User</small>
                     </div>
                  </div>
                  <div class="row row-bordered overflow-visible g-0">

                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-cog-outline fs-4"></i>
                        </span>
                        <a href="{{ route('settings') }}" class="stretched-link">Setelan</a>
                        <small class="text-muted mb-0">Pengelola Akun</small>
                     </div>
                     <div class="dropdown-shortcuts-item col">
                        <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                           <i class="mdi mdi-help-circle-outline fs-4"></i>
                        </span>
                        <a href="pages-help-center-landing.html" class="stretched-link">Pusat Bantuan</a>
                        <small class="text-muted mb-0">FAQs & Artikel</small>
                     </div>
                  </div>
               </div>
            </div>
         </li>
         <!-- Quick links -->

         <!-- Notification -->
         <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1">
            @php
               $notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)
                   ->orderBy('updated_at', 'desc')
                   ->get();
               $banyakNotifikasi = $notifications->count();
            @endphp
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown"
               data-bs-auto-close="outside" aria-expanded="false">
               <i class="mdi mdi-bell-outline mdi-24px"></i>

               @if ($banyakNotifikasi > 0)
                  <span class="position-absolute top-0 start-50 translate-middle-y badge badge-dot bg-danger mt-2 border"></span>
               @endif
            </a>
            <ul class="dropdown-menu dropdown-menu-end py-0">
               <li class="dropdown-menu-header border-bottom">
                  <div class="dropdown-header d-flex align-items-center py-3">
                     <h6 class="mb-0 me-auto">Notifikasi</h6>
                     @if ($banyakNotifikasi > 0)
                        <span class="badge rounded-pill bg-label-primary">{{ $banyakNotifikasi }}</span>
                     @endif
                  </div>
               </li>

               <li class="dropdown-notifications-list scrollable-container">
                  <ul class="list-group list-group-flush">
                     @forelse ($notifications as $notification)
                        @php
                           $event = '';
                           switch ($notification->event) {
                               case 'created':
                                   $event = ' telah dibuat';
                                   break;
                               case 'updated':
                                   $event = ' telah diperbarui';
                                   break;
                               case 'deleted':
                                   $event = ' telah dihapus';
                                   break;
                               default:
                                   $event = ' ?';
                                   break;
                           }
                           
                           $namespace = 'App\Models\\';
                           $subject_type = substr($notification->subject_type, strlen($namespace));
                           
                           if ($subject_type == 'Category') {
                               $subject_type = 'Kategori';
                           } elseif ($subject_type == 'Post') {
                               $subject_type = 'Postingan';
                           }
                           
                           $created_time = $notification->created_at;
                           $now = now();
                           $time_diff = $created_time->diff($now);
                           $formatted_time = '';
                           if ($time_diff->days > 0) {
                               $formatted_time = $time_diff->days . ' hari yang lalu';
                           } elseif ($time_diff->h > 0) {
                               $formatted_time = $time_diff->h . ' jam yang lalu';
                           } elseif ($time_diff->i > 0) {
                               $formatted_time = $time_diff->i . ' menit yang lalu';
                           } else {
                               $formatted_time = 'Baru saja';
                           }
                           $time = $formatted_time;
                        @endphp
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                           <div class="d-flex gap-2">
                              <div class="flex-shrink-0">
                                 <div class="avatar me-1">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-check-outline"></i></span>
                                 </div>
                              </div>
                              <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                 <h6 class="mb-1 text-truncate">Data {{ $subject_type }} {{ $event }}</h6>
                                 <small class="text-truncate text-body">Tabel {{ $subject_type }} telah diperbarui, silahkan cek kembali dilaman nya masing-masing</small>
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <small class="text-muted">{{ $time }}</small>
                              </div>
                           </div>
                        </li>
                     @empty
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                           <div class="d-flex gap-2">
                              <div class="text-start">
                                 <h5>Tidak ada pemberitahuan</h5>
                              </div>
                           </div>
                        </li>
                     @endforelse
                  </ul>
               </li>
               @if ($banyakNotifikasi > 0)
                  <li class="dropdown-menu-footer border-top p-2">
                     <a href="#" class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal" data-bs-target="#notifikasiModal">
                        Lihat semua notifikasi
                     </a>
                  </li>
               @endif
            </ul>
         </li>
         <!--/ Notification -->

         <!-- User Dropdown -->
         <livewire:dashboard.partials.header-user-dropdown />

      </ul>
   </div>


   <!-- Search Small Screens -->
   <div class="navbar-search-wrapper search-input-wrapper  d-none">
      <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search...">
      <i class="mdi mdi-close search-toggler cursor-pointer"></i>
   </div>



</nav>
