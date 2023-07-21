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
            <div class="list-group">
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