<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-2 me-xl-1" style="overflow: visible;">
    <a style="overflow: visible;" class="nav-link btn btn-text-secondary rounded-pill btn-icon dropdown-toggle hide-arrow"
       href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
       <i class="mdi mdi-bell-outline mdi-24px"></i>

       @if ($banyakNotifikasi > 0)
       <span
          class="position-absolute top-0 start-50 translate-middle-y badge rounded-circle bg-danger mt-2 border" style="font-size: 10px">{{ $banyakNotifikasi }}</span>
       @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end py-0">
       <li class="dropdown-menu-header border-bottom">
          <div class="dropdown-header d-flex align-items-center py-3">
             <h6 class="mb-0 me-auto">Notifikasi</h6>
             @if ($banyakNotifikasi > 0)
             <span class="badge rounded bg-danger me-2" wire:click.prevent='bersihkanNotifikasi()' style="cursor: pointer;">Bersihkan notifikasi</span>
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
             $event = ' penambahan';
             break;
             case 'updated':
             $event = ' perubahan';
             break;
             case 'deleted':
             $event = ' penghapusan';
             case 'imported':
             $event = ' import';
             break;
             default:
             $event = ' ?';
             break;
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
                        @if($notification->event == 'created')
                        <span class="avatar-initial rounded-circle bg-label-primary">
                           <i class="mdi mdi-plus"></i>
                        </span>
                        @elseif ($notification->event == 'updated')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-note-edit-outline"></i>
                        </span>
                        @elseif ($notification->event == 'deleted')
                        <span class="avatar-initial rounded-circle bg-label-danger">
                           <i class="mdi mdi-trash-can-outline"></i>
                        </span>
                        @elseif ($notification->event == 'profile')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-account-outline"></i>
                        </span>
                        @elseif ($notification->event == 'ganti-password')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-lock-outline"></i>
                        </span>
                        @elseif ($notification->event == 'ganti-email')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-email-outline"></i>
                        </span>
                        @elseif ($notification->event == 'liked')
                        <span class="avatar-initial rounded-circle bg-label-danger">
                           <i class="mdi mdi-heart-outline"></i>
                        </span>
                        @elseif ($notification->event == 'approved')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-check-all"></i>
                        </span>
                        @elseif ($notification->event == 'rejected')
                        <span class="avatar-initial rounded-circle bg-label-danger">
                           <i class="mdi mdi-exclamation-thick"></i>
                        </span>
                        @elseif ($notification->event == 'pending')
                        <span class="avatar-initial rounded-circle bg-label-primary">
                           <i class="mdi mdi-information-outline"></i>
                        </span>
                        @elseif ($notification->event == 'imported')
                        <span class="avatar-initial rounded-circle bg-label-success">
                           <i class="mdi mdi-plus"></i>
                        </span>
                        @endif
                      </div>
                   </div>
                   <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                      <h6 class="mb-1 text-truncate">{{ $notification->description }}</h6>
                      <small class="text-truncate text-body">
                        @if($notification->event == 'ganti-email')
                        Email untuk akun anda berhasil diperbarui.   
                        @elseif($notification->event == 'ganti-password')
                        Password untuk akun anda berhasil diperbarui.
                        @elseif($notification->event == 'profile')
                        Data Profile anda berhasil diperbarui.
                        @elseif($notification->event == 'liked')
                        Postingan {{ $notification->subject->title }} disukai oleh {{ $notification->causer->name }}
                        @elseif($notification->event == 'approved')
                        {{ $notification->properties['message'] }}
                        @elseif($notification->event == 'pending')
                        {{ $notification->properties['message'] }}
                        @elseif($notification->event == 'rejected')
                        {{ $notification->properties['message'] }}
                        @elseif($notification->event == 'imported')
                        Data User sukses diimpor.
                        @else
                        Terjadi {{ $event }} data pada tabel {{ $notification->log_name }}
                        @endif
                      </small>
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
      {{--  @if ($banyakNotifikasi > 0)
       <li class="dropdown-menu-footer border-top p-2">
          <a href="#" class="btn btn-primary d-flex justify-content-center" data-bs-toggle="modal"
             data-bs-target="#notifikasiModal">
             Lihat semua notifikasi
          </a>
       </li>
       @endif --}}
    </ul>
 </li>