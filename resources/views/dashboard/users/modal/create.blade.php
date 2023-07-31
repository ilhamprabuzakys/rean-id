<!--  Large modal example -->
<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-md">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title">Tambah Data</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form action="{{ route('users.store') }}" method="post">
               @csrf
               <div class="alert alert-success d-none" id="create-modal-alert-success"></div>
               <div class="row justify-content-between mb-2">
                  <div class="col-2">
                     <label for="title" class="form-label">Name <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="text"
                        class="form-control" name="name" id="name" value="{{ old('name') }}" required>
                        <div class="invalid-feedback d-none">
                        </div>
                  </div>
               </div>
               <div class="row justify-content-between mb-2">
                  <div class="col-2">
                     <label for="title" class="form-label">Email <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="email"
                        class="form-control" name="email" id="email" value="{{ old('email') }}" required>
                        <div class="invalid-feedback d-none">
                        </div>
                  </div>
               </div>
               <div class="row justify-content-between mb-2">
                  <div class="col-2">
                     <label for="title" class="form-label">Password <sup class="text-danger">*</sup></label>
                  </div>
                  <div class="col-10">
                     <input type="email"
                        class="form-control" name="password" id="password" value="password" required>
                        <div class="invalid-feedback d-none">
                        </div>
                  </div>
               </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
               <i class="fas fa-xmark fa-md me-2"></i>
               Tutup</button>
            <button id="save-button" class="btn btn-primary px-2 not-allowed" type="button">
               <i class="fas fa-save fa-md me-2"></i>
               Simpan Data</button>
            </form>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->