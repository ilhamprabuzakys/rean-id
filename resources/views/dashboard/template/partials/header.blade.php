<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
   id="layout-navbar">

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
               <span class="d-none d-md-inline-block text-muted">Search <strong>(Ctrl+/)</strong></span>
            </a>
         </div>
      </div>
      <!-- /Search -->

      <ul class="navbar-nav flex-row align-items-center ms-auto">

         {{--
         <!-- Style Switcher -->
         <li class="nav-item me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon style-switcher-toggle hide-arrow"
               href="javascript:void(0);">
               <i class='mdi mdi-24px'></i>
            </a>
         </li>
         <!--/ Style Switcher -->

         <!-- Quick links  -->
         <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-1 me-xl-0">
            <a class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
               href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
               <i class='mdi mdi-view-grid-plus-outline mdi-24px'></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end py-0">
               <div class="dropdown-menu-header border-bottom">
                  <div class="dropdown-header d-flex align-items-center py-3">
                     <h5 class="text-body mb-0 me-auto">Menu Cepat</h5>
                     <a href="javascript:void(0)" class="dropdown-shortcuts-add text-muted" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Add shortcuts"><i
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
         <!-- Quick links --> --}}

         <!-- Notification -->
         <livewire:dashboard.partials.header-notification />
         <!--/ Notification -->

         <!-- User Dropdown -->
         <livewire:dashboard.partials.header-user-dropdown />

      </ul>
   </div>


   <!-- Search Small Screens -->
   <div class="navbar-search-wrapper search-input-wrapper d-none">
      <input type="text" class="form-control search-input container-xxl border-0 ps-4" placeholder="Search..."
         aria-label="Search...">
      <i class="mdi mdi-close search-toggler cursor-pointer"></i>
   </div>



</nav>