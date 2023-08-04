<!--  Large modal example -->
<div wire:ignore.self class="modal fade" id="deleteTagModal" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Hapus Data</h3>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <form wire:submit.prevent="delete">
            <div class="modal-body">
               Apakah kamu yakin akan menghapus data ini?
               <span class="mt-3 text-sm text-danger">Jika anda menghapus ini, semua postingan yang memiliki tag ini akan kehilangan tag ini.</span>
            </div>
            <div class="modal-footer">
               <button type="button" wire:click="closeModal" class="btn btn-danger" data-bs-dismiss="modal">
                  <i class="fas fa-xmark fa-md me-2"></i>
                  Tutup</button>
               <button id="save-button" class="btn btn-primary px-2 not-allowed" type="submit">
                  <i class="fas fa-trash-alt fa-md me-2"></i>
                  Hapus</button>
            </div>
         </form>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
