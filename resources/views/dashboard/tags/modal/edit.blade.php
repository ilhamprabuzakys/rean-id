<!--  Large modal example -->
<div class="modal fade" id="editTag{{ $tag->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Edit Data</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('tags.update', $tag) }}" method="post">
               @method('PUT')
               @csrf
               <div class="row justify-content-between">
                  <div class="col-2">
                     <label for="name" class="form-label">Nama <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="text"
                        class="form-control @error('name')
                           is-invalid
                        @enderror" name="name" id="name"
                        value="{{ old('name', $tag->name) }}" required>
                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <p class="text-muted mb-0 mt-4 text-sm"><span class="text-danger">Perhatikan</span> dengan mengedit data label ini akan <strong>mengganti</strong> seluruh label postingan yang berkaitan dengan label ini.</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
               <i class="fas fa-xmark fa-md me-2"></i>
               Tutup</button>
            <button id="save-button" class="btn btn-primary px-2 not-allowed" disabled>
               <i class="fas fa-save fa-md me-2"></i>
               Simpan Data</button>
            </form>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
   $(document).ready(function() {
      $('#name').on('input', function() {
         var nameValue = $(this).val().trim();
         if (nameValue !== '') {
            $('#save-button').prop('disabled', false).removeClass('not-allowed');
         } else {
            $('#save-button').prop('disabled', true).addClass('not-allowed');
         }
      });
   });
</script>
