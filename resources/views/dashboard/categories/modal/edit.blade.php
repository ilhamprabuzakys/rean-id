<!--  Large modal example -->
<div class="modal fade" id="editKategori{{ $category->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Edit Data</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('categories.update', $category) }}" method="post">
               @method('PUT')
               @csrf
               <div class="row justify-content-between">
                  <div class="col-2">
                     <label for="title" class="form-label">Nama <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="text"
                        class="form-control @error('name')
                           is-invalid
                        @enderror" name="name" id="name"
                        value="{{ old('name', $category->name) }}" required>
                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
               </div>
               <p class="text-muted mb-0 mt-4 text-sm"><span class="text-danger">Perhatikan</span> dengan mengedit data kategori ini akan <strong>mengganti</strong> seluruh kategori postingan yang berkaitan dengan kategori ini.</p>
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
            $('#save-button').prop('disabled', false).css('cursor', 'pointer');
         } else {
            $('#save-button').prop('disabled', true).css('cursor', 'not-allowed');
         }
      });
   });
</script>
