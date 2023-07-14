<!--  Large modal example -->
<div class="modal fade" id="heroImage{{ $hero->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="heroImage{{ $hero->id }}">Hero Main Ke-{{ $loop->iteration }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="card">
               <div class="card-body">
                  <img class="post-image-size-modal" src="{{ asset('storage/' . $hero->file_path) }}" alt="Title">
               </div>
            </div>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
