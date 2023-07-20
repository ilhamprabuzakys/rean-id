<!--  Large modal example -->
@php
$notifications = \App\Models\EventLog::where('user_id', auth()->user()->id)
      ->orderBy('updated_at', 'desc')
      ->get();
@endphp
<div class="modal fade" id="SemuaNotifikasi" tabindex="-1" role="dialog" aria-hidden="true">
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
                              {{ $time }}
                           </div>
                        </div>
                     </div>
                  </a>
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