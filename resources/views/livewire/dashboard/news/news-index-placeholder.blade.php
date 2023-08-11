<div>
   <div class="col-12">
      <div class="card shadow-md">
         <div class="card-header">
            <div class="row justify-content-end mb-3">
               <div class="col-4 d-flex justify-content-end">
                  <a class="btn btn-primary" href="#">
                     <span><i class="mdi mdi-plus me-sm-1"></i>
                        <span class="d-sm-inline-block place-holder"></span></span>
                  </a>
               </div>
            </div>

            <div class="row justify-content-between">
               <div class="col-1 d-flex justify-content-start">
                  <select class="form-select placeholder">
                     <option value="5">5</option>
                     <option value="10">10</option>
                     <option value="15">15</option>
                  </select>
               </div>
               <div class="col-5 d-flex justify-content-start">
                  <input type="text" name="search" class="form-control placeholder">
               </div>
               <div class="col-6 d-flex justify-content-start">
                  <input type="text" name="search" class="form-control placeholder">
               </div>
            </div>
         </div>
         <div class="card-datatable">
            {{-- @dd($ebooks) --}}
            <table wire:poll.visible.2s class="dt-complex-header table table-bordered">

               <thead class="table-light">
                  <tr>
                     <th class="placeholder">#</th>
                     <th class="placeholder">Judul</th>
                     <th class="placeholder">About</th>
                     <th class="placeholder">Dibuat Oleh</th>
                     <th class="placeholder">Tanggal Publish</th>
                     <th class="text-center">
                        <i class="fas fa-pencil-square"></i>
                     </th>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th class="placeholder" scope="row"></th>
                     <td class="placeholder"></td>
                     <td class="placeholder"></td>
                     <td class="placeholder"></td>
                     <td class="placeholder"></td>
                     <td class="placeholder"></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
