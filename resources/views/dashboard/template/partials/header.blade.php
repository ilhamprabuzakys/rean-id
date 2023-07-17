<nav class="navbar navbar-expand navbar-light navbar-bg">
   <a class="sidebar-toggle js-sidebar-toggle">
      <i class="hamburger align-self-center"></i>
   </a>

   <form class="d-none d-sm-inline-block">
      <div class="input-group input-group-navbar">
         <input type="text" class="form-control" placeholder="Search…" aria-label="Search">
         <button class="btn" type="button">
            <i class="align-middle" data-feather="search"></i>
         </button>
      </div>
   </form>

   <div class="navbar-collapse collapse">
      <ul class="navbar-nav navbar-align">
         <li class="nav-item dropdown">
            @php
               $notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)
                   ->orderBy('updated_at', 'desc')
                   ->get();
            @endphp
            <a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
               <div class="position-relative">
                  <i class="align-middle" data-feather="bell"></i>
                  @if ($notifications->count() > 0)
                     <span class="indicator">{{ $notifications->count() }}</span>
                  @endif
               </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">
               <div class="dropdown-menu-header">
                  Notifications
               </div>
               <div class="list-group">
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
                     
                      <a href="#" class="list-group-item">
                        <div class="row g-0 align-items-center">
                           <div class="col-2">
                              <i class="text-success" data-feather="check"></i>
                           </div>
                           <div class="col-10">
                              <div class="text-dark">Data {{ $subject_type }} {{ $event }}.</div>
                              <div class="text-muted small mt-1">Tabel {{ $subject_type }} {{ $event }}, silahkan cek kembali dilaman nya masing-masing.</div>
                              <div class="text-muted small mt-1">
                              <i class="text-secondary" data-feather="clock"></i>
                                 {{ $time }}</div>
                           </div>
                        </div>
                     </a>
                     @if ($loop->iteration > 3)
                     	@break
                     @endif
                  @empty
                  <a href="#" class="list-group-item">
                     <div class="row g-0 align-items-center">
                        <div class="col-2">
                           <i class="text-danger" data-feather="x"></i>
                        </div>
                        <div class="col-10">
                           <div class="text-dark">Tidak ada pemberitahuan</div>
                           <div class="text-muted small mt-1">Silahkan lakukan beberapa aksi untuk merekap aktivitasmu.</div>
                           <div class="text-muted small mt-1">Sekarang</div>
                        </div>
                     </div>
                  </a>
                  @endforelse
                 
               </div>
               <div class="dropdown-menu-footer">
                  <a href="{{ route('logs.index') }}" class="text-muted">Show all notifications</a>
               </div>
            </div>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-icon dropdown-toggle" href="#" id="messagesDropdown" data-bs-toggle="dropdown">
               <div class="position-relative">
                  <i class="align-middle" data-feather="message-square"></i>
               </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="messagesDropdown">
               <div class="dropdown-menu-header">
                  <div class="position-relative">
                     4 New Messages
                  </div>
               </div>
               <div class="list-group">
                  <a href="#" class="list-group-item">
                     <div class="row g-0 align-items-center">
                        <div class="col-2">
                           <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar-5.jpg') }}" class="avatar img-fluid rounded-circle" alt="Vanessa Tucker">
                        </div>
                        <div class="col-10 ps-2">
                           <div class="text-dark">Vanessa Tucker</div>
                           <div class="text-muted small mt-1">Nam pretium turpis et arcu. Duis arcu tortor.</div>
                           <div class="text-muted small mt-1">15m ago</div>
                        </div>
                     </div>
                  </a>
                  <a href="#" class="list-group-item">
                     <div class="row g-0 align-items-center">
                        <div class="col-2">
                           <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar-2.jpg') }}" class="avatar img-fluid rounded-circle" alt="William Harris">
                        </div>
                        <div class="col-10 ps-2">
                           <div class="text-dark">William Harris</div>
                           <div class="text-muted small mt-1">Curabitur ligula sapien euismod vitae.</div>
                           <div class="text-muted small mt-1">2h ago</div>
                        </div>
                     </div>
                  </a>
                  <a href="#" class="list-group-item">
                     <div class="row g-0 align-items-center">
                        <div class="col-2">
                           <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar-4.jpg') }}" class="avatar img-fluid rounded-circle" alt="Christina Mason">
                        </div>
                        <div class="col-10 ps-2">
                           <div class="text-dark">Christina Mason</div>
                           <div class="text-muted small mt-1">Pellentesque auctor neque nec urna.</div>
                           <div class="text-muted small mt-1">4h ago</div>
                        </div>
                     </div>
                  </a>
                  <a href="#" class="list-group-item">
                     <div class="row g-0 align-items-center">
                        <div class="col-2">
                           <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar-3.jpg') }}" class="avatar img-fluid rounded-circle" alt="Sharon Lessman">
                        </div>
                        <div class="col-10 ps-2">
                           <div class="text-dark">Sharon Lessman</div>
                           <div class="text-muted small mt-1">Aenean tellus metus, bibendum sed, posuere ac, mattis non.</div>
                           <div class="text-muted small mt-1">5h ago</div>
                        </div>
                     </div>
                  </a>
               </div>
               <div class="dropdown-menu-footer">
                  <a href="#" class="text-muted">Show all messages</a>
               </div>
            </div>
         </li>
         <li class="nav-item">
            <a class="nav-icon js-fullscreen d-none d-lg-block" href="#">
               <div class="position-relative">
                  <i class="align-middle" data-feather="maximize"></i>
               </div>
            </a>
         </li>
         <li class="nav-item dropdown">
            <a class="nav-icon pe-md-0 dropdown-toggle" href="#" data-bs-toggle="dropdown">
               <img src="{{ asset('assets/dashboard/adminkit/img/avatars/avatar.jpg') }}" class="avatar img-fluid rounded" alt="Charles Hall" />
            </a>
            <div class="dropdown-menu dropdown-menu-end">
               <a class="dropdown-item" href="pages-profile.html">
                  <i class="align-middle me-1" data-feather="user"></i> Profile
               </a>
               <a class="dropdown-item" href="#">
                  <i class="align-middle me-1" data-feather="pie-chart"></i> Aktivitas</a>
               <div class="dropdown-divider"></div>
               <a class="dropdown-item" href="pages-settings.html"><i class="align-middle me-1" data-feather="settings"></i> Settings &
                  Privacy</a>
               <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalLogout"><i class="align-middle me-1" data-feather="log-out"></i> Log out</a>
            </div>
         </li>
      </ul>
   </div>
</nav>
