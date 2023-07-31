{{-- <a class="dropdown-item" href="#" wire:click="logout">
    <i class="mdi mdi-logout me-2"></i>
    <span class="align-middle">Log Out</span>
 </a> --}}
 <div wire:ignore.self class="modal fade" id="livewireLogout" tabindex="-1" role="dialog" aria-hidden="true">
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
             <form wire:submit.prevent="logout" method="post">
             @csrf
                <button type="submit" class="btn btn-danger" wire:click="logout">Keluar</button>
             </form>
          </div>
       </div>
    </div>
 </div>
 
<a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#livewireLogout">
    <i class="mdi mdi-logout me-2"></i>
    <span class="align-middle">Log Out</span>
</a>

