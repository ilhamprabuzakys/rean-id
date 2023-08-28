@push('modal')
{{-- SuperAdmin List Modal --}}
<div class="modal fade" id="userSuperAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Daftar <strong>Super Admin</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            @forelse($superadmins as $user)
            <div class="d-flex align-items-center p-3 border-bottom">
               <img src="{{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt="User Avatar" width="84" height="84"
                  class="rounded-circle" style="object-fit: cover">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">{{ $user->name }} <span class="text-primary h7">{{ auth()->user()->id == $user->id ? '(Anda)' : '' }}</span></h6>
                  <div class="row d-flex flex-wrap justify-content-start">
                     <div class="col-12">
                        <ul class="list-unstyled mb-0">
                           <li class="d-flex mb-2 pb-1 align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Email</small>
                              <small class="mb-0 text-truncate">{{ $user->email }}</small>
                           </li>
                           <li class="d-flex align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Username</small>
                              <small class="mb-0 text-truncate">{{ $user->username }}</small>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="d-flex align-items-center p-3 border-bottom">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">Data masih kosong</h6>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </div>
</div>

{{-- Admin List Modal --}}
<div class="modal fade" id="userAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Daftar <strong>Admin</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            @forelse($admins as $user)
            <div class="d-flex align-items-center p-3 border-bottom">
               <img src="{{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt="User Avatar" width="84" height="84"
                  class="rounded-circle" style="object-fit: cover">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">{{ $user->name }}</h6>
                  <div class="row d-flex flex-wrap justify-content-start">
                     <div class="col-12">
                        <ul class="list-unstyled mb-0">
                           <li class="d-flex mb-2 pb-1 align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Email</small>
                              <small class="mb-0 text-truncate">{{ $user->email }}</small>
                           </li>
                           <li class="d-flex align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Username</small>
                              <small class="mb-0 text-truncate">{{ $user->username }}</small>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="d-flex align-items-center p-3 border-bottom">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">Data masih kosong</h6>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </div>
</div>

{{-- Member List Modal --}}
<div class="modal fade" id="userMemberModal" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Daftar <strong>Member</strong></h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            @forelse($members as $user)
            <div class="d-flex align-items-center p-3 border-bottom">
               <img src="{{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt="User Avatar" width="84" height="84"
                  class="rounded-circle" style="object-fit: cover">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">{{ $user->name }}</h6>
                  <div class="row d-flex flex-wrap justify-content-start">
                     <div class="col-12">
                        <ul class="list-unstyled mb-0">
                           <li class="d-flex mb-2 pb-1 align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Email</small>
                              <small class="mb-0 text-truncate">{{ $user->email }}</small>
                           </li>
                           <li class="d-flex align-items-center">
                              <small class="mb-0 me-2 px-2 sales-text-bg bg-label-secondary">Username</small>
                              <small class="mb-0 text-truncate">{{ $user->username }}</small>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
            @empty
            <div class="d-flex align-items-center p-3 border-bottom">
               <div class="d-flex flex-column w-100 ms-4">
                  <h6 class="mb-3">Data masih kosong</h6>
               </div>
            </div>
            @endforelse
         </div>
      </div>
   </div>
</div>
@endpush