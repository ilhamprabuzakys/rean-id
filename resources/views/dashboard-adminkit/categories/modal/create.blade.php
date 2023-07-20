<!--  Large modal example -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Tambah Data</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('categories.store') }}" method="post">
               @csrf
               <div class="row justify-content-between">
                  <div class="col-2">
                     <label for="title" class="form-label">Nama <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="text"
                        class="form-control @error('name')
                           is-invalid
                        @enderror" name="name" id="name" value="{{ old('name') }}" required>
                     @error('name')
                        <div class="invalid-feedback">
                           {{ $message }}
                        </div>
                     @enderror
                  </div>
                 </div>
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