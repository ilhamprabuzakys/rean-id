<div class="modal fade" id="resetPasswordModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Kirim reset password link</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <p class="mb-0">Apakah anda yakin ingin mereset password anda? Jika iya maka klik tombol <b>Kirim Link.</b></p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
            {{-- <livewire:auth.logout /> --}}
            <livewire:dashboard.settings.security.reset-password-link />
         </div>
      </div>
   </div>
</div>