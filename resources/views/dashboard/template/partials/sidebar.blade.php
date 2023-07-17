<nav id="sidebar" class="sidebar js-sidebar">
   <div class="sidebar-content js-simplebar">
      <a class="sidebar-brand" href="{{ route('dashboard') }}">
         {{-- <span class="sidebar-brand-text align-middle">
            AdminKit
            <sup><small class="badge bg-primary text-uppercase">Pro</small></sup>
         </span>
         --}}
         {{-- <svg class="sidebar-brand-icon align-middle" width="32px" height="32px" viewBox="0 0 24 24" fill="none" stroke="#FFFFFF" stroke-width="1.5"
            stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF" style="margin-left: -3px">
            <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
            <path d="M20 12L12 16L4 12"></path>
            <path d="M20 16L12 20L4 16"></path>
         </svg>  --}}
         <img src="{{ asset('assets/img/rean-logo-hitam-putih.png') }}" alt="" class="sidebar-brand-icon align-middle sidebar-image-brand-sm">

         <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="" class="sidebar-brand-text align-middle sidebar-image-brand">
      </a>

      <div class="sidebar-user">
         <div class="d-flex justify-content-center">
            <div class="flex-shrink-0">
               <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded me-1" alt="User Avatar" />
            </div>
            <div class="flex-grow-1 ps-2">
               <a class="sidebar-user-title dropdown-toggle" href="#" data-bs-toggle="dropdown">
                  {{ auth()->user()->name }}
               </a>
               <div class="dropdown-menu dropdown-menu-start">
                  <a class="dropdown-item" href="pages-profile.html">
                     <i class="align-middle me-1" data-feather="user"></i> Profile
                  </a>
                  <a class="dropdown-item" href="#">
                     <i class="align-middle me-1" data-feather="pie-chart"></i> Aktivitas</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                     Privacy</a>
                  <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalLogout">
                     <i class="align-middle me-1" data-feather="log-out"></i> Log out
                  </a>
               </div>

               <div class="sidebar-user-subtitle">{{ auth()->user()->role }}</div>
            </div>
         </div>
      </div>

      <ul class="sidebar-nav">
         <li class="sidebar-header">
            Information
         </li>
         
         <li class="sidebar-item {{ request()->url() == route('dashboard') ? ' active' : '' }}">
            <a class="sidebar-link" href="{{ route('dashboard') }}">
               <i class="align-middle" data-feather="airplay"></i> <span class="align-middle">Dashboard</span>
            </a>
         </li>
         
         <li class="sidebar-item {{ request()->url() == route('logs.index') ? ' active' : '' }}">
            <a class="sidebar-link" href="{{ route('logs.index') }}">
               <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Log Aktivitas</span>
            </a>
         </li>

         <li class="sidebar-item">
            <a class="sidebar-link" href="/social-media">
               <i class="align-middle" data-feather="instagram"></i> <span class="align-middle">Sosial Media</span>
            </a>
         </li>

         
         <li class="sidebar-header">
            Data Utama
         </li>
         <li class="sidebar-item {{ str_starts_with(request()->url(), route('posts.index')) ? 'active' : '' }}">
            <a data-bs-target="#data-postingan" data-bs-toggle="collapse" class="sidebar-link collapsed">
               <i class="align-middle" data-feather="book-open"></i> <span class="align-middle">Postingan</span>
            </a>
            <ul id="data-postingan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('posts.index') }}">Semua</a></li>
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('posts.create') }}">Tambah Data</a></li>
            </ul>
         </li>
         <li class="sidebar-item {{ str_starts_with(request()->url(), route('categories.index')) ? 'active' : '' }}">
            <a data-bs-target="#data-kategori" data-bs-toggle="collapse" class="sidebar-link collapsed">
               <i class="align-middle" data-feather="link"></i> <span class="align-middle">Kategori</span>
            </a>
            <ul id="data-kategori" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('categories.index') }}">Semua</a></li>
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('categories.create') }}">Tambah Data</a></li>
            </ul>
         </li>
         <li class="sidebar-item {{ str_starts_with(request()->url(), route('tags.index')) ? 'active' : '' }}">
            <a data-bs-target="#data-tags" data-bs-toggle="collapse" class="sidebar-link collapsed">
               <i class="align-middle" data-feather="hash"></i> <span class="align-middle">Tags</span>
            </a>
            <ul id="data-tags" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tags.index') }}">Semua</a></li>
               <li class="sidebar-item"><a class="sidebar-link" href="{{ route('tags.create') }}">Tambah Data</a></li>
            </ul>
         </li>
         

         <li class="sidebar-header">
            Settings
         </li>

         <li class="sidebar-item">
            <a class="sidebar-link" href="/profile">
               <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
            </a>
         </li>
        
         <li class="sidebar-item">
            <a class="sidebar-link" href="/settings">
               <i class="align-middle" data-feather="settings"></i> <span class="align-middle">Settings</span>
            </a>
         </li>
      </ul>

      {{-- <div class="sidebar-cta">
         <div class="sidebar-cta-content">
            <strong class="d-inline-block mb-2">Weekly Sales Report</strong>
            <div class="mb-3 text-sm">
               Your weekly sales report is ready for download!
            </div>

            <div class="d-grid">
               <a href="https://adminkit.io/" class="btn btn-outline-primary" target="_blank">Download</a>
            </div>
         </div>
      </div> --}}
   </div>
</nav>