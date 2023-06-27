 <!-- Modal Body -->
      <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
      <div class="modal fade" id="logoutModalGuest" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog">
         <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
           <div class="modal-content">
             <div class="modal-header">
               <h5 class="modal-title" id="modalTitleId">Logout</h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body">
               Apakah anda yakin ingin logout?
             </div>
             <div class="modal-footer">
               <form action="{{ route('logout') }}" method="post">
               @csrf
                 <button type="submit" class="btn btn-primary">Ya saya ingin Logout</button>
               </form>
             </div>
           </div>
         </div>
       </div>