<!--  Large modal example -->
@php
   $notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)
       ->orderBy('updated_at', 'desc')
       ->get();
@endphp
<div class="modal fade zoomIn" id="notifikasiModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Semua notifikasi</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
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
                  <li class="dropdown-notifications-list scrollable-container">
                     <ul class="list-group list-group-flush">
                        <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                           <div class="d-flex gap-2">
                              <div class="flex-shrink-0">
                                 <div class="avatar me-1">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i class="mdi mdi-check-outline"></i></span>
                                 </div>
                              </div>
                              <div class="d-flex flex-column flex-grow-1 overflow-hidden w-px-200">
                                 <h6 class="mb-1 text-truncate">Data {{ $subject_type }} {{ $event }}</h6>
                                 <small class="text-truncate text-body">Tabel {{ $subject_type }} {{ $event }}, silahkan cek kembali dilaman nya masing-masing</small>
                              </div>
                              <div class="flex-shrink-0 dropdown-notifications-actions">
                                 <small class="text-muted">{{ $time }}</small>
                              </div>
                           </div>
                        </li>
                     </ul>
                  </li>
               @endforeach
            </ul>
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
