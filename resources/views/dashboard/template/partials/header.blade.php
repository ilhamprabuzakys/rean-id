<header id="page-topbar">
   <div class="layout-width">
      <div class="navbar-header">
         <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
               <a href="index.html" class="logo logo-dark">
                  <span class="logo-sm">
                     <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                     <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="" height="17">
                  </span>
               </a>

               <a href="index.html" class="logo logo-light">
                  <span class="logo-sm">
                     <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" height="22">
                  </span>
                  <span class="logo-lg">
                     <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="" height="17">
                  </span>
               </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
               <span class="hamburger-icon">
                  <span></span>
                  <span></span>
                  <span></span>
               </span>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-md-block">
               <div class="position-relative">
                  <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                  <span class="mdi mdi-magnify search-widget-icon"></span>
                  <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
               </div>
               <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                  <div data-simplebar style="max-height: 320px;">
                     <!-- item-->
                     <div class="dropdown-header">
                        <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                     </div>

                     <div class="dropdown-item bg-transparent text-wrap">
                        <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                        <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                     </div>
                     <!-- item-->
                     <div class="dropdown-header mt-2">
                        <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                     </div>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                        <span>Analytics Dashboard</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                        <span>Help Center</span>
                     </a>

                     <!-- item-->
                     <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                        <span>My account settings</span>
                     </a>

                     <!-- item-->
                     <div class="dropdown-header mt-2">
                        <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                     </div>

                     <div class="notification-list">
                        <!-- item -->
                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                           <div class="d-flex">
                              <img src="assets/dashboard/velzon/assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="m-0">Angela Bernier</h6>
                                 <span class="fs-11 mb-0 text-muted">Manager</span>
                              </div>
                           </div>
                        </a>
                        <!-- item -->
                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                           <div class="d-flex">
                              <img src="assets/dashboard/velzon/assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="m-0">David Grasso</h6>
                                 <span class="fs-11 mb-0 text-muted">Web Designer</span>
                              </div>
                           </div>
                        </a>
                        <!-- item -->
                        <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                           <div class="d-flex">
                              <img src="assets/dashboard/velzon/assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="m-0">Mike Bunch</h6>
                                 <span class="fs-11 mb-0 text-muted">React Developer</span>
                              </div>
                           </div>
                        </a>
                     </div>
                  </div>

                  <div class="text-center pt-3 pb-1">
                     <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                  </div>
               </div>
            </form>
         </div>

         <div class="d-flex align-items-center">

            <div class="dropdown d-md-none topbar-head-dropdown header-item">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                  aria-expanded="false">
                  <i class="bx bx-search fs-22"></i>
               </button>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                  <form class="p-3">
                     <div class="form-group m-0">
                        <div class="input-group">
                           <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                           <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>

            <div class="dropdown topbar-head-dropdown ms-1 header-item">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class='bx bx-category-alt fs-22'></i>
               </button>
               <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                  <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                     <div class="row align-items-center">
                        <div class="col">
                           <h6 class="m-0 fw-semibold fs-12"> Website Lainnya</h6>
                        </div>
                        <div class="col-auto">
                           <a href="#!" class="btn btn-sm btn-soft-info"> Lihat semua website
                              <i class="ri-arrow-right-s-line align-middle"></i></a>
                        </div>
                     </div>
                  </div>

                  <div class="p-2">
                     <div class="row g-0">
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/LogoBNN.png') }}" alt="Github">
                              <span>Cegah Narkoba</span>
                           </a>
                        </div>
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/LogoBNN.png') }}" alt="bitbucket">
                              <span>Sidepe</span>
                           </a>
                        </div>
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/siparel.png') }}" alt="dribbble">
                              <span>Siparel</span>
                           </a>
                        </div>
                     </div>

                     <div class="row g-0">
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/LogoBNN.png') }}" alt="dropbox">
                              <span>Simpeg</span>
                           </a>
                        </div>
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/LogoBNN.png') }}" alt="mail_chimp">
                              <span>BNN</span>
                           </a>
                        </div>
                        <div class="col">
                           <a class="dropdown-icon-item" href="#!">
                              <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="slack">
                              <span>REAN</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="dropdown topbar-head-dropdown ms-1 header-item">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-cart-dropdown" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                  <i class='bx bx-shopping-bag fs-22'></i>
                  <span class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">5</span>
               </button>
               <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart" aria-labelledby="page-header-cart-dropdown">
                  <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                     <div class="row align-items-center">
                        <div class="col">
                           <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                        </div>
                        <div class="col-auto">
                           <span class="badge bg-warning-subtle text-warning fs-13"><span class="cartitem-badge">7</span>
                              items</span>
                        </div>
                     </div>
                  </div>
                  <div data-simplebar style="max-height: 300px;">
                     <div class="p-2">
                        <div class="text-center empty-cart" id="empty-cart">
                           <div class="avatar-md mx-auto my-3">
                              <div class="avatar-title bg-info-subtle text-info fs-36 rounded-circle">
                                 <i class='bx bx-cart'></i>
                              </div>
                           </div>
                           <h5 class="mb-3">Your Cart is Empty!</h5>
                           <a href="apps-ecommerce-products.html" class="btn btn-success w-md mb-3">Shop Now</a>
                        </div>
                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                           <div class="d-flex align-items-center">
                              <img src="assets/dashboard/velzon/assets/images/products/img-1.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Branded
                                       T-Shirts</a>
                                 </h6>
                                 <p class="mb-0 fs-12 text-muted">
                                    Quantity: <span>10 x $32</span>
                                 </p>
                              </div>
                              <div class="px-2">
                                 <h5 class="m-0 fw-normal">$<span class="cart-item-price">320</span></h5>
                              </div>
                              <div class="ps-2">
                                 <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                              </div>
                           </div>
                        </div>

                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                           <div class="d-flex align-items-center">
                              <img src="assets/dashboard/velzon/assets/images/products/img-2.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Bentwood Chair</a>
                                 </h6>
                                 <p class="mb-0 fs-12 text-muted">
                                    Quantity: <span>5 x $18</span>
                                 </p>
                              </div>
                              <div class="px-2">
                                 <h5 class="m-0 fw-normal">$<span class="cart-item-price">89</span></h5>
                              </div>
                              <div class="ps-2">
                                 <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                              </div>
                           </div>
                        </div>

                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                           <div class="d-flex align-items-center">
                              <img src="assets/dashboard/velzon/assets/images/products/img-3.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">
                                       Borosil Paper Cup</a>
                                 </h6>
                                 <p class="mb-0 fs-12 text-muted">
                                    Quantity: <span>3 x $250</span>
                                 </p>
                              </div>
                              <div class="px-2">
                                 <h5 class="m-0 fw-normal">$<span class="cart-item-price">750</span></h5>
                              </div>
                              <div class="ps-2">
                                 <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                              </div>
                           </div>
                        </div>

                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                           <div class="d-flex align-items-center">
                              <img src="assets/dashboard/velzon/assets/images/products/img-6.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Gray
                                       Styled T-Shirt</a>
                                 </h6>
                                 <p class="mb-0 fs-12 text-muted">
                                    Quantity: <span>1 x $1250</span>
                                 </p>
                              </div>
                              <div class="px-2">
                                 <h5 class="m-0 fw-normal">$ <span class="cart-item-price">1250</span></h5>
                              </div>
                              <div class="ps-2">
                                 <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                              </div>
                           </div>
                        </div>

                        <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                           <div class="d-flex align-items-center">
                              <img src="assets/dashboard/velzon/assets/images/products/img-5.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                              <div class="flex-grow-1">
                                 <h6 class="mt-0 mb-1 fs-14">
                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Stillbird Helmet</a>
                                 </h6>
                                 <p class="mb-0 fs-12 text-muted">
                                    Quantity: <span>2 x $495</span>
                                 </p>
                              </div>
                              <div class="px-2">
                                 <h5 class="m-0 fw-normal">$<span class="cart-item-price">990</span></h5>
                              </div>
                              <div class="ps-2">
                                 <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border" id="checkout-elem">
                     <div class="d-flex justify-content-between align-items-center pb-3">
                        <h5 class="m-0 text-muted">Total:</h5>
                        <div class="px-2">
                           <h5 class="m-0" id="cart-item-total">$1258.58</h5>
                        </div>
                     </div>

                     <a href="apps-ecommerce-checkout.html" class="btn btn-success text-center w-100">
                        Checkout
                     </a>
                  </div>
               </div>
            </div>

            <div class="ms-1 header-item d-none d-sm-flex">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                  <i class='bx bx-fullscreen fs-22'></i>
               </button>
            </div>

            <div class="ms-1 header-item d-none d-sm-flex">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                  <i class='bx bx-moon fs-22'></i>
               </button>
            </div>

            <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
               <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown"
                  data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                  <i class='bx bx-bell fs-22'></i>
                  @php
                     $notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)
                         ->orderBy('updated_at', 'desc')
                         ->get();
                  @endphp
                  @if ($notifications->count() > 0)
                     <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">{{ $notifications->count() }}</span>
                  @endif
               </button>
               <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                  <div class="dropdown-head bg-primary bg-pattern rounded-top">
                     <div class="p-3">
                        <div class="row align-items-center">
                           <div class="col">
                              <h6 class="m-0 fs-16 fw-semibold text-white"> Notifikasi </h6>
                           </div>
                           <div class="col-auto dropdown-tabs">
                              <span class="badge bg-light-subtle text-body fs-13">Total : {{ $notifications->count() }}</span>
                           </div>
                        </div>
                     </div>

                     <div class="px-2 pt-2">
                        <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                           {{-- <li class="nav-item waves-effect waves-light">
                              <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                 Notifikasi
                              </a>
                           </li> --}}
                           <li class="nav-item waves-effect waves-light">
                              <a class="nav-link active" data-bs-toggle="tab" href="#notifikasi-tab" role="tab" aria-selected="false">
                                 Notifikasi
                              </a>
                           </li>
                           <li class="nav-item waves-effect waves-light">
                              <a class="nav-link" data-bs-toggle="tab" href="#peringatan-tab" role="tab" aria-selected="false">
                                 Peringatan
                              </a>
                           </li>
                        </ul>
                     </div>

                  </div>

                  <div class="tab-content position-relative" id="notificationItemsTabContent">
                     {{-- <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                           <div class="text-reset notification-item d-block dropdown-item position-relative">
                              <div class="d-flex">
                                 <div class="avatar-xs me-3 flex-shrink-0">
                                    <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                       <i class="bx bx-badge-check"></i>
                                    </span>
                                 </div>
                                 <div class="flex-grow-1">
                                    <a href="#!" class="stretched-link">
                                       <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                          Optimization <span class="text-secondary">reward</span> is
                                          ready!
                                       </h6>
                                    </a>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                       <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                    </p>
                                 </div>
                                 <div class="px-2 fs-15">
                                    <div class="form-check notification-check">
                                       <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                       <label class="form-check-label" for="all-notification-check01"></label>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="text-reset notification-item d-block dropdown-item position-relative">
                              <div class="d-flex">
                                 <img src="assets/dashboard/velzon/assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                 <div class="flex-grow-1">
                                    <a href="#!" class="stretched-link">
                                       <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                    </a>
                                    <div class="fs-13 text-muted">
                                       <p class="mb-1">Answered to your comment on the cash flow forecast's
                                          graph 🔔.</p>
                                    </div>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                       <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                    </p>
                                 </div>
                                 <div class="px-2 fs-15">
                                    <div class="form-check notification-check">
                                       <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                       <label class="form-check-label" for="all-notification-check02"></label>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="text-reset notification-item d-block dropdown-item position-relative">
                              <div class="d-flex">
                                 <div class="avatar-xs me-3 flex-shrink-0">
                                    <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                       <i class='bx bx-message-square-dots'></i>
                                    </span>
                                 </div>
                                 <div class="flex-grow-1">
                                    <a href="#!" class="stretched-link">
                                       <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                       </h6>
                                    </a>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                       <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                    </p>
                                 </div>
                                 <div class="px-2 fs-15">
                                    <div class="form-check notification-check">
                                       <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                       <label class="form-check-label" for="all-notification-check03"></label>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="text-reset notification-item d-block dropdown-item position-relative">
                              <div class="d-flex">
                                 <img src="assets/dashboard/velzon/assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                 <div class="flex-grow-1">
                                    <a href="#!" class="stretched-link">
                                       <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                    </a>
                                    <div class="fs-13 text-muted">
                                       <p class="mb-1">We talked about a project on linkedin.</p>
                                    </div>
                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                       <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                    </p>
                                 </div>
                                 <div class="px-2 fs-15">
                                    <div class="form-check notification-check">
                                       <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                       <label class="form-check-label" for="all-notification-check04"></label>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="my-3 text-center view-all">
                              <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                 All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                           </div>
                        </div>

                     </div> --}}

                     <div class="tab-pane fade show active py-2 ps-2" id="notifikasi-tab" role="tabpanel" aria-labelledby="notifikasi-tab">
                        <div data-simplebar style="max-height: 300px;" class="pe-2">
                           @if ($notifications->count() > 1)
                              @foreach ($notifications as $notification)
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
                                 <div class="text-reset notification-item d-block dropdown-item position-relative">
                                    <div class="d-flex">
                                       <div class="avatar-xs me-3 flex-shrink-0">
                                          <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                             <i class="bx bx-badge-check"></i>
                                          </span>
                                       </div>
                                       <div class="flex-grow-1">
                                          <a href="#!" class="stretched-link">
                                             <h6 class="mt-0 mb-1 fs-13 fw-semibold">Data {{ $subject_type }} {{ $event }}
                                             </h6>
                                          </a>
                                          <div class="fs-13 text-muted">
                                             <p class="mb-1">Tabel {{ $subject_type }} {{ $event }}, perubahan telah diterapkan, cek dimasing-masing tabel</p>
                                          </div>

                                          <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                             <span><i class="mdi mdi-clock-outline"></i> {{ $time }}</span>
                                          </p>
                                       </div>
                                       <div class="px-2 fs-15">
                                          <div class="form-check notification-check">
                                             <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                             <label class="form-check-label" for="all-notification-check01"></label>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              @endforeach
                           @else
                           @endif
                           <div class="my-3 text-center view-all">
                              <button type="button" class="btn btn-soft-success waves-effect waves-light"
                                 data-bs-toggle="modal" data-bs-target="#notifikasiModal">Lihat semua notifikasi<i class="ri-arrow-right-line align-middle"></i></button>
                           </div>
                        </div>
                     </div>
                     <div class="tab-pane fade p-4" id="peringatan-tab" role="tabpanel" aria-labelledby="peringatan-tab">

                        <div class="notifikasi-kosong">
                           <div class="w-25 w-sm-50 pt-3 mx-auto"> <img src="{{ asset('assets/dashboard/velzon/assets/images/svg/bell.svg') }}" class="img-fluid" alt="user-pic"> </div>
                           <div class="text-center pb-5 mt-2">
                              <h6 class="fs-18 fw-semibold lh-base">Tidak ada peringatan. </h6>
                           </div>
                        </div>

                     </div>

                     <div class="notification-actions" id="notification-actions">
                        <div class="d-flex text-muted justify-content-center">
                           Terpilih <div id="select-content" class="text-body fw-semibold px-1">0</div> Hasil <button type="button" class="btn btn-link link-danger p-0 ms-3"
                              data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Hapus</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>

            <div class="dropdown ms-sm-3 header-item topbar-user">
               <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="d-flex align-items-center">
                     <img class="rounded-circle header-profile-user" src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar.jpg') }}" alt="Header Avatar">
                     <span class="text-start ms-xl-2">
                        <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">{{ auth()->user()->name }}</span>
                        <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">{{ auth()->user()->role }}</span>
                     </span>
                  </span>
               </button>
               <div class="dropdown-menu dropdown-menu-end">
                  <!-- item-->
                  <h6 class="dropdown-header">Welcome {{ auth()->user()->name }}!</h6>
                  <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                  <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Messages</span></a>
                  <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span
                        class="align-middle">Taskboard</span></a>
                  <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance :
                        <b>$5971.67</b></span></a>
                  <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i
                        class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                  <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                  <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle"
                        data-key="t-logout">Logout</span></a>
               </div>
            </div>
         </div>
      </div>
   </div>
</header>