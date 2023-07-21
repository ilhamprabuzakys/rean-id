<div class="app-menu navbar-menu">
   <!-- LOGO -->
   <div class="navbar-brand-box">
      <!-- Dark Logo-->
      <a href="index.html" class="logo logo-dark">
         <span class="logo-sm">
            <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="25">
         </span>
         <span class="logo-lg">
            <img src="{{ asset('assets/img/rean-putih-hitam2.png') }}" alt="" height="20">
         </span>
      </a>
      <!-- Light Logo-->
      <a href="index.html" class="logo logo-light">
         <span class="logo-sm">
            <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="25">
         </span>
         <span class="logo-lg">
            <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="" height="20">
         </span>
      </a>
      <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
         <i class="ri-record-circle-line"></i>
      </button>
   </div>

   <div id="scrollbar">
      <div class="container-fluid">

         <div id="two-column-menu">
         </div>
         <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
               <a class="nav-link menu-link" href="{{ route('dashboard') }}">
                  <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboard">Dashboard</span>
               </a>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-pages">Data</span></li>

            <li class="nav-item">
               <a class="nav-link menu-link" href="#posts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="posts">
                  <i class="ri-book-open-line"></i> <span data-key="t-posts">Postingan</span>
               </a>
               <div class="collapse menu-dropdown" id="posts">
                  <ul class="nav nav-sm flex-column">
                     <li class="nav-item">
                        <a href="{{ route('posts.index') }}" class="nav-link" data-key="t-posts-all">Semua Data</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('posts.create') }}" class="nav-link" data-key="t-posts-create">Tambah Data</a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link menu-link" href="#categories" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="categories">
                  <i class="ri-price-tag-3-line"></i> <span data-key="t-categories">Kategori</span>
               </a>
               <div class="collapse menu-dropdown" id="categories">
                  <ul class="nav nav-sm flex-column">
                     <li class="nav-item">
                        <a href="{{ route('categories.index') }}" class="nav-link" data-key="t-categories-all">Semua Data</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('categories.create') }}" class="nav-link" data-key="t-categories-create">Tambah Data</a>
                     </li>
                  </ul>
               </div>
            </li>
            <li class="nav-item">
               <a class="nav-link menu-link" href="#tags" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="tags">
                  <i class="ri-hashtag"></i> <span data-key="t-tags">Label</span>
               </a>
               <div class="collapse menu-dropdown" id="tags">
                  <ul class="nav nav-sm flex-column">
                     <li class="nav-item">
                        <a href="{{ route('tags.index') }}" class="nav-link" data-key="t-tags-all">Semua Data</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('tags.create') }}" class="nav-link" data-key="t-tags-create">Tambah Data</a>
                     </li>
                  </ul>
               </div>
            </li>

            <li class="menu-title"><i class="ri-more-fill"></i> <span data-key="t-components">Manajemen</span></li>

            <li class="nav-item">
               <a class="nav-link menu-link" href="#users" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="users">
                  <i class="ri-group-line"></i> <span data-key="t-users">Data Pengguna</span>
               </a>
               <div class="collapse menu-dropdown" id="users">
                  <ul class="nav nav-sm flex-column">
                     <li class="nav-item">
                        <a href="{{ route('users.index') }}" class="nav-link" data-key="t-users-all">Semua Data</a>
                     </li>
                     <li class="nav-item">
                        <a href="{{ route('users.create') }}" class="nav-link" data-key="t-users-create">Tambah Data</a>
                     </li>
                  </ul>
               </div>
            </li>

            <li class="nav-item">
               <a class="nav-link menu-link" href="{{ route('logs.index') }}">
                  <i class="ri-line-chart-line"></i> <span data-key="t-log">Log Aktivitas</span>
               </a>
            </li>

            {{-- <li class="nav-item">
               <a class="nav-link menu-link" href="#sidebarMultilevel" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarMultilevel">
                  <i class="ri-share-line"></i> <span data-key="t-multi-level">Multi Level</span>
               </a>
               <div class="collapse menu-dropdown" id="sidebarMultilevel">
                  <ul class="nav nav-sm flex-column">
                     <li class="nav-item">
                        <a href="#" class="nav-link" data-key="t-level-1.1"> Level 1.1 </a>
                     </li>
                     <li class="nav-item">
                        <a href="#sidebarAccount" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarAccount"
                           data-key="t-level-1.2"> Level
                           1.2
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarAccount">
                           <ul class="nav nav-sm flex-column">
                              <li class="nav-item">
                                 <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                              </li>
                              <li class="nav-item">
                                 <a href="#" class="nav-link" data-key="t-level-2.1"> Level 2.1 </a>
                              </li>
                           </ul>
                        </div>
                     </li>
                  </ul>
               </div>
            </li> --}}

         </ul>
      </div>
      <!-- Sidebar -->
   </div>

   <div class="sidebar-background"></div>
</div>