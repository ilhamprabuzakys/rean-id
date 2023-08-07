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
            <!--Navbar Button-->
            {{-- <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5">
               @auth
                  <a href="{{ route('login') }}" class="btn btn-success btn-sm rounded-pill">Masuk</a>
               @else
                  <a href="{{ route('logout') }}" class="btn btn-success btn-sm rounded-pill">Keluar</a>
               @endauth
            </div> --}}
            @php
              $rand = rand(1,5);
            @endphp
            @auth
               <div class="nav-item me-3 me-lg-0 dropdown">
                  <!--:User:-->
                  <a href="header-logged-in.html#" class="btn btn-primary dropdown-toggle rounded-pill py-0 ps-0 pe-2"
                     data-bs-auto-close="outside" data-bs-toggle="dropdown">
                     @if (auth()->user()->avatar !== NULL) 
                     <img src="{{ asset(auth()->user()->avatar) }}" alt="avatar" class="avatar sm rounded-circle me-1">
                     @else
                     <img src="{{ asset('assets/img/avatar/avatar-'. $rand .'.png') }}" alt="avatar" class="avatar sm rounded-circle me-1">
                     @endif
                     <small>{{ auth()->user()->name }}</small>
                  </a>
                  <!--:User dropdown:-->
                  <div class="dropdown-menu shadow-lg dropdown-menu-end dropdown-menu-xs p-0">
                     <a href="header-logged-in.html#!" class="dropdown-header border-bottom p-4">
                        <div class="d-flex align-items-center">
                           <div>
                            @if (auth()->user()->avatar !== NULL) 
                              <img src="{{ asset(auth()->user()->avatar) }}" alt="avatar" class="avatar xl rounded-pill me-3">
                            @else
                              <img src="{{ asset('assets/img/avatar/avatar-'. $rand .'.png') }}" alt="avatar" class="avatar xl rounded-pill me-3">
                            @endif
                           </div>
                           <div>
                              <h5 class="mb-0 text-body">{{ auth()->user()->name }}</h5>
                              <span
                                 class="d-block mb-2 text-lowercase"><span class="__cf_email__" data-cfemail="3d575c4c48545358555c4f7d5952505c5453135e5250">{{ auth()->user()->email }}</span></span>
                                 <a href="{{ route('dashboard') }}">
                                 <div class="small d-inline-block link-underline fw-semibold">Lihat dashboard</div>
                                  </a>
                           </div>
                        </div>
                     </a>
                     <a href="{{ route('logout') }}" class="dropdown-item rounded-top-0 p-3">
                        <span class="d-block text-end">
                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                              fill="currentColor" class="bx bx-box-arrow-right me-2" viewBox="0 0 16 16">
                              <path fill-rule="evenodd"
                                 d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                              <path fill-rule="evenodd"
                                 d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                           </svg>
                           Keluar
                        </span>
                     </a>
                  </div>
               </div>
            @else
               <div class="nav-item me-3 me-lg-0 ms-lg-4 ms-xl-5 dropdown">
                  <a href="header-login.html#" class="btn btn-outline-primary px-4 btm-sm rounded-pill py-1" data-bs-auto-close="outside" data-bs-toggle="dropdown">
                     Sign In
                  </a>
                  <div class="dropdown-menu dropdown-menu-end dropdown-menu-xs p-4">
                     <!--:Sign In Form:-->
                     <form class="needs-validation" novalidate="">
                        <div>
                           <h3 class="mb-1">
                              Welcome back!
                           </h3>
                           <p class="mb-4 text-body-secondary">
                              Please Sign In with details...
                           </p>
                        </div>
                        <div class="input-icon-group mb-3">
                           <span class="input-icon">
                              <i class="bx bx-envelope"></i>
                           </span>
                           <input type="email" required="" class="form-control" autofocus="" placeholder="Username">
                        </div>
                        <div class="input-icon-group mb-3">
                           <span class="input-icon">
                              <i class="bx bx-key"></i>
                           </span>
                           <input type="password" required="" class="form-control" placeholder="Password">
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                           <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                              <label class="form-check-label" for="flexCheckDefault">
                                 Remember me
                              </label>
                           </div>
                           <div>
                              <label class="text-end d-block small mb-0"><a href="page-account-forget-password.html" class="link-decoration">Forget Password?</a></label>
                           </div>
                        </div>

                        <div class="d-grid">
                           <button class="btn btn-primary btn-hover-arrow" type="submit">
                              <span>Sign in</span>
                           </button>
                        </div>
                        <p class="pt-4 mb-0 text-body-secondary">
                           Don’t have an account yet? <a href="page-account-signup.html" class="ms-2 pb-0 fw-semibold link-underline">Sign Up</a>
                        </p>
                     </form>
                  </div>
               </div>
            @endauth
         </div>

         <!--Navbar Collapse-->
         <div class="collapse navbar-collapse" id="mainNavbarTheme">

            <!--begin:Navbar items-->
            <ul class="navbar-nav ms-auto">

               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.category_list') }}" class="nav-link">Kategori</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.all_post') }}" class="nav-link">Artikel</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.all_post') }}" class="nav-link">Events</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.cns') }}" class="nav-link">CNS Radio</a>
               </li>
               <li class="nav-item me-lg-2">
                  <a href="{{ route('home.contact') }}" class="nav-link">Contact Us</a>
               </li>

               <!--begin:demos-->
               <li class="nav-item dropdown">
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
               </li>
               <!--end:Pages-->
            </ul>
            <!--end:Navbar items-->

         </div>
      </div>
   </nav>
</header>
