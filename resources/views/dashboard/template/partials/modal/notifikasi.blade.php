@php
$notifications = \Spatie\Activitylog\Models\Activity::causedBy(auth()->user())->latest('created_at')->get();
@endphp
<div class="modal fade zoomIn" id="notifikasiModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Semua notifikasi</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="list-group">
               @foreach ($notifications as $notification)
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
               <div
                  class="list-group-item list-group-item-action d-flex align-items-center cursor-pointer waves-effect">
                  <div class="avatar me-1 w-px-50">
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
                     @endif
                  </div>
                  {{-- <img src="../../assets/img/avatars/2.png" alt="User Image" class="rounded-circle me-3 w-px-50">
                  --}}
                  <div class="w-100">
                     <div class="d-flex justify-content-between">
                        <div class="user-info ps-2">
                           <h6 class="mb-0">{{ $notification->description }}</h6>
                           <div>
                              <small>
                                 @if($notification->event == 'ganti-email')
                                 Email untuk akun anda berhasil diperbarui.
                                 @elseif($notification->event == 'ganti-password')
                                 Password untuk akun anda berhasil diperbarui.
                                 @elseif($notification->event == 'profile')
                                 Pembaharuan berhasil diterapkan.
                                 @elseif($notification->event == 'liked')
                                 Postingan anda disukai oleh orang lain
                                 @else
                                 Terjadi {{ $event }} data pada tabel {{ $notification->log_name }}
                                 @endif
                              </small>
                           </div>
                           <div class="d-flex align-items-center mt-1">
                              <div class="user-status me-2 d-flex align-items-center">
                                 @if($notification->event == 'created')
                                 <span class="badge badge-dot bg-primary me-1"></span>
                                 <small>Penambahan</small>
                                 @elseif ($notification->event == 'updated' || $notification->event == 'profile' ||
                                 $notification->event == 'ganti-email' || $notification->event == 'ganti-password' || $notification->event == 'liked' )
                                 <span class="badge badge-dot bg-success me-1"></span>
                                 <small>Perubahan</small>
                                 </span>
                                 @elseif ($notification->event == 'deleted')
                                 <span class="badge badge-dot bg-danger me-1"></span>
                                 <small>Penghapusan</small>
                                 </span>
                                 @endif
                              </div>
                           </div>
                        </div>
                        <small class="text-muted">{{ $time }}</small>
                        {{-- <div class="add-btn">
                           <button class="btn btn-primary btn-sm waves-effect waves-light">{{ $time }}</button>
                        </div> --}}
                     </div>
                  </div>
               </div>
               @endforeach
            </div>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" id="ModalLogout" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Keluar untuk akhiri sesi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p class="mb-0">Apakah anda yakin ingin keluar? Jika iya maka klik tombol Keluar.</p>
         </div>
         <div class="modal-footer">
            {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button> --}}
            <form action="{{ route('logout') }}" method="post">
               @csrf
               <button type="submit" class="btn btn-danger">Keluar</button>
            </form>
         </div>
      </div>
   </div>
</div>