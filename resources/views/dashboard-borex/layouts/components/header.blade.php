<header id="page-topbar" class="isvertical-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                {{-- <a href="{{ route('dashboard') }}" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="{{ asset('assets/icon-doang.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ asset('assets/icon-doang.png') }}" alt="" height="22">
                    </span>
                </a> --}}

                <a href="{{ route('dashboard') }}" class="logo logo-light me-3">
                    <span class="logo-lg">
                        <img src="{{ asset('assets/img/rean-hitam-putiih.png') }}" alt="" height="22">
                    </span>
                    <span class="logo-sm">
                        <img src="{{ asset('assets/img/rean-berwarna-logo-saja.png') }}" alt="" height="22">
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item vertical-menu-btn topnav-hamburger">
                <div class="hamburger-icon open">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </button> 
            
            {{-- <button type="button" class="btn btn-sm px-3 font-size-16 header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button> --}}

            <div class="d-none d-sm-block ms-3 align-self-center">
                <h4 class="page-title">{{ $title }}</h4>
            </div>

        </div>

        <div class="d-flex">
            {{-- <div class="dropdown">
                <button type="button" class="btn header-item"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-sm" data-eva="search-outline"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-0">
                    <form class="p-2">
                        <div class="search-box">
                            <div class="position-relative">
                                <input type="text" class="form-control bg-light border-0" placeholder="Search...">
                                <i class="search-icon" data-eva="search-outline" data-eva-height="26" data-eva-width="26"></i>
                            </div>
                        </div>
                    </form>
                </div>
            </div> --}}

            <div class="dropdown d-inline-block">
                @php
                    $notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)->orderBy('updated_at', 'desc')->get();                
                @endphp
                <button type="button" class="btn header-item noti-icon" id="page-header-notifications-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon-sm" data-eva="bell-outline"></i>
                    <span class="noti-dot bg-danger rounded-pill">{{ $notifications->count() }}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h5 class="m-0 font-size-15"> Notifications </h5>
                            </div>
                            {{-- <div class="col-auto">
                                <a href="#!" class="small fw-semibold text-decoration-underline"> Mark all as read</a>
                            </div> --}}
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 250px;">
                        @foreach ($notifications as $notification)
                        <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
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
                                    <h6 class="mb-1">Data {{ $subject_type }} {{ $event }}.</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">Tabel {{ $subject_type }} {{ $event }}, silahkan cek kembali dilaman nya masing-masing.</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>{{ $time }}</span></p>
                                    </div>
                                </div>
                            </div>
                        </a>
                        @endforeach
                        {{-- <a href="#!" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="bx bx-badge-check"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Your item is shipped</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1">If several languages coalesce the grammar</p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span>3 min ago</span></p>
                                    </div>
                                </div>
                            </div>
                        </a> --}}
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 btn-block text-center" href="{{ route('logs.index') }}">
                            <i class="uil-arrow-circle-right me-1"></i> <span>View More..</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon right-bar-toggle" id="right-bar-toggle">
                    <i class="icon-sm" data-eva="settings-outline"></i>
                </button>
            </div>

            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item user text-start d-flex align-items-center" id="page-header-user-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{-- <img class="rounded-circle header-profile-user" src="{{ asset('assets/images/users/avatar-3.jpg') }}"
                    alt="Header Avatar"> --}}
                    <div>
                        <div class="avatar-title bg-soft-primary text-primary display-6 m-0 rounded-circle">
                            <i class="bx bxs-user-circle"></i>
                        </div>
                    </div>
                </button>
                <div class="dropdown-menu dropdown-menu-end pt-0">
                    <div class="p-3 border-bottom">
                        <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                        <p class="mb-0 font-size-11 text-muted">{{ auth()->user()->email }}</p>
                    </div>
                    <a class="dropdown-item" href="{{ route('profile.index', auth()->user()) }}">
                        {{-- <i class="mdi mdi-account-circle text-muted font-size-16 align-middle me-1"></i> --}}
                        <i data-eva="person-outline" class="me-2 text-sm text-secondary fill-secondary"></i>
                        <span class="align-middle">Profile</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="dropdown-item bg-transparent border-0 text-muted">
                        <i data-eva="log-out-outline" class="me-2 text-sm text-secondary fill-secondary"></i>
                            
                            {{-- <i class="mdi mdi-lock text-muted font-size-16 align-middle me-1"></i> --}}
                            <span
                              class="align-middle">Logout</span></button>
                     </form>
                    {{-- <a class="dropdown-item" href="#"><i class="mdi mdi-logout text-muted font-size-16 align-middle me-1"></i> <span class="align-middle">
                        <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="bg-transparent border-0 p-0 m-0 text-muted">Logout</button>
                        </form>
                    </span></a> --}}
                </div>
            </div>
        </div>
    </div>
</header>