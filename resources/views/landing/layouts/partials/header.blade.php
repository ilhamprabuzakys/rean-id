<header class="z-fixed pt-lg-4 header-absolute-top header-transparent">
   <nav class="navbar navbar-expand-lg navbar-light @yield('header-class')">
      <div class="container position-relative">
         <!--Logo Brand-->
         <a class="navbar-brand" href="{{ route('index') }}">
            @yield('navbar', View::make('landing.layouts.partials.items.navbar-brand'))
         </a>

         <div class="d-flex align-items-center navbar-no-collapse-items order-lg-last">
            <button class="navbar-toggler order-last" type="button" data-bs-toggle="collapse"
               data-bs-target="#mainNavbarTheme" aria-controls="mainNavbarTheme" aria-expanded="false"
               aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
                  <i></i>
               </span>
            </button>
            {{-- Search Bar --}}
            <div class="nav-item me-3 me-lg-0">
               <a href="javascript:void(0)" data-bs-target="#modal-search-bar" data-bs-toggle="modal" class="nav-link lh-1">
                  <i class="bx bx-search-alt-2 fs-5 lh-1"></i>
               </a>
               <!--Search-bar-2-collapse-->
            </div>
            <!--Navbar Button-->
            {{-- <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5">
               @auth
               <a href="{{ route('login') }}" class="btn btn-success btn-sm rounded-pill">Masuk</a>
               @else
               <a href="{{ route('logout') }}" class="btn btn-success btn-sm rounded-pill">Keluar</a>
               @endauth
            </div> --}}
            @auth
            <div class="nav-item me-3 me-lg-0 dropdown">
               <!--:User:-->
               <a href="javascript:void(0)" class="btn btn-primary dropdown-toggle rounded-pill py-0 ps-0 pe-2"
                  data-bs-toggle="dropdown">
                  <img
                     src="{{ asset(auth()->user()->avatar !== NULL ? auth()->user()->avatar : 'assets/img/avatar/avatar-1.png') }}"
                     alt="avatar" class="avatar sm rounded-circle me-1" style="object-fit: cover;">
                  <small>{{ Str::limit(auth()->user()->name, 5, '') }}</small>
               </a>
               <!--:User dropdown:-->
               <div class="dropdown-menu shadow-lg dropdown-menu-end dropdown-menu-xs p-0">
                  <div class="py-5 px-3 border-bottom">
                     <div class="row">
                        <div class="col-3">
                           <img src="{{ asset(auth()->user()->avatar ?? 'assets/img/avatar/avatar-1.png') }}"
                              alt="avatar" class="avatar xl rounded-pill me-3" style="object-fit: cover">
                        </div>
                        <div class="col-7">
                           <h5 class="ms-2 mb-0">{{ auth()->user()->name }}</h5>
                           <span class="ms-2 mb-2">{{ auth()->user()->email }}</span>
                           <a href="{{ route('dashboard') }}" class="ms-2 small link-underline fw-semibold">
                              Lihat dashboard
                           </a>
                        </div>
                     </div>
                  </div>
                  <form action="{{ route('logout') }}" method="POST" id="logoutForm">
                     @csrf
                     <a href="javascript:void(0)" onclick="confirmLogout(event);"
                        class="dropdown-item rounded-top-0 p-3">
                        <span class="d-block text-end">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                              class="bx bx-box-arrow-right me-2" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                 d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                              <path fill-rule="evenodd"
                                 d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                           </svg>
                           Keluar
                        </span>
                     </a>
                  </form>
                  <script>
                     function confirmLogout(event) {
                        event.preventDefault(); // Mencegah tindakan default dari link (navigasi)

                        if (window.confirm('Apakah Anda yakin ingin keluar?')) {
                           document.getElementById('logoutForm').submit(); // Submit form jika pengguna mengkonfirmasi
                        }
                     }
                  </script>
               </div>
            </div>
            @else
            <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5 dropdown">
               <a href="{{ route('login') }}" class="btn btn-primary px-4 btm-sm rounded-pill py-1">
                  Sign In
               </a>
            </div>
            @endauth
         </div>
         <!--Navbar Collapse-->
         <div class="collapse navbar-collapse" id="mainNavbarTheme">

            <!--begin:Navbar items-->
            <ul class="navbar-nav ms-auto">

               {{-- <li class="nav-item me-lg-2">
                  <a href="{{ route('home.all_post') }}" class="nav-link">Artikel</a>
               </li> --}}
               {{-- <li class="nav-item me-lg-2">
                  <a href="{{ route('home.category_list') }}" class="nav-link">Kategori</a>
               </li> --}}
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="javascript:void(0)" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                     data-bs-auto-close="click">Data
                  </a>
                  <div class="dropdown-menu">
                     <a class="dropdown-item" href="{{ route('home.category_list') }}">Daftar Kategori</a>
                     <a class="dropdown-item" href="{{ route('home.semua_postingan') }}">Daftar Postingan</a>
                     <a class="dropdown-item" href="{{ route('home.about') }}">Tentang Rean</a>
                  </div>
               </li>

               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.events.index') }}"
                     class="nav-link {{ str_starts_with(request()->url(), route('home.events.index')) ? 'active' : '' }}">Events</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.ebooks.index') }}"
                     class="nav-link {{ str_starts_with(request()->url(), route('home.ebooks.index')) ? 'active' : '' }}">Ebooks</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.news.index') }}"
                     class="nav-link {{ str_starts_with(request()->url(), route('home.news.index')) ? 'active' : '' }}">Berita</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.cns') }}"
                     class="nav-link {{ request()->url() == route('home.cns') ? 'active' : '' }}">CNS Radio</a>
               </li>
               {{-- @auth
               <li class="nav-item me-lg-2">
                  <a href="{{ route('chats.index') }}"
                     class="nav-link {{ request()->url() == route('chats.index') ? 'active' : '' }}">Layanan Chat</a>
               </li>
               @endauth --}}
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.contact') }}"
                     class="nav-link {{ request()->url() == route('home.contact') ? 'active' : '' }}">Contact Us</a>
               </li>

               <!--begin:demos-->
               {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle " href="index-landing-business.html#" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Demos
                  </a>
                  <div class="dropdown-menu p-lg-3 dropdown-menu-end dropdown-menu-xs">
                     <a class="dropdown-item" target="_blank" href="demo-shop.html">
                        E-commerce
                     </a>
                     <a class="dropdown-item" target="_blank" href="demo-one-page.html">
                        One Page
                     </a>
                     <a class="dropdown-item" target="_blank" href="demo-real-estate.html">
                        Real estate
                     </a>
                     <a class="dropdown-item" target="_blank" href="demo-jobs.html">
                        Jobs
                     </a>
                     <a class="dropdown-item" target="_blank" href="demo-event-landing.html">
                        Event Landing
                     </a>

                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" target="_blank" href="demo-rtl.html">
                        RTL Starter
                     </a>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" target="_blank" href="../admin-dashboard/index.html">
                        Admin Dashboard
                     </a>
                     <a class="dropdown-item" target="_blank" href="../nft-marketplace/index.html">
                        NFT Marketplace
                     </a>
                     <a class="dropdown-item" target="_blank" href="../blog-magazine/index.html">
                        Blog Magazine <span class="badge bg-success">New</span>
                     </a>
                     <!--footer-->
                     <div class="p-3">
                        <div class="row">
                           <div class="col-12 d-flex align-items-center justify-content-center">

                              <span class="flex-grow-1 small text-body-secondary">Many more demos
                                 coming soon...</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </li> --}}
               <!--end:Pages-->
            </ul>
            <!--end:Navbar items-->

         </div>
      </div>
   </nav>
</header>

<livewire:landing.partials.search-bar />