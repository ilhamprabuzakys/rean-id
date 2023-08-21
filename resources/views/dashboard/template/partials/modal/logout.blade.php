<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
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
            {{-- <form action="{{ route('logout') }}" method="post">
            @csrf
               <button type="submit" class="btn btn-danger">Keluar</button>
            </form> --}}
            <livewire:auth.logout />
         </div>
      </div>
   </div>
</div>