<div class="col-xl-4 col-lg-6 col-md-6">
   <div class="card">
      <div class="card-body">
         <div class="d-flex justify-content-between mb-2">
            <h6 class="fw-normal">
               Total {{ $jumlahSuperadmin }} user
            </h6>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
               @foreach($superadmins as $user)
               <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  title="{{ $user->name }}" class="avatar pull-up">
                  <img class="rounded-circle"
                     src="{{ $user->avatar ? asset($user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                     alt="Avatar" style="object-fit: cover" />
               </li>
               @endforeach

               @if($jumlahSuperadmin > 3)
               <li class="avatar">
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                     data-bs-placement="bottom" title="{{ $jumlahSuperadmin - 3 }} lagi">+{{ $jumlahSuperadmin - 3
                     }}</span>
               </li>
               @endif
            </ul>
         </div>
         <div class="d-flex justify-content-between align-items-end">
            <div class="role-heading">
               <h4 class="mb-1 text-body">
                  Super Admin
               </h4>
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#userSuperAdminModal"
                  class="role-edit-modal"><span>Lihat User</span></a>
            </div>
            <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
         </div>
      </div>
   </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
   <div class="card">
      <div class="card-body">
         <div class="d-flex justify-content-between mb-2">
            <h6 class="fw-normal">
               Total {{ $jumlahAdmin }} user
            </h6>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
               @foreach($admins as $user)
               <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  title="{{ $user->name }}" class="avatar pull-up">
                  <img class="rounded-circle"
                     src="{{ $user->avatar ? asset($user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                     alt="Avatar" />
               </li>
               @endforeach

               @if($jumlahAdmin > 3)
               <li class="avatar">
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                     data-bs-placement="bottom" title="{{ $jumlahAdmin - 3 }} lagi">+{{ $jumlahAdmin - 3
                     }}</span>
               </li>
               @endif
            </ul>
         </div>
         <div class="d-flex justify-content-between align-items-end">
            <div class="role-heading">
               <h4 class="mb-1 text-body">
                  Admin
               </h4>
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#userAdminModal"
                  class="role-edit-modal"><span>Lihat User</span></a>
            </div>
            <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
         </div>
      </div>
   </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-6">
   <div class="card">
      <div class="card-body">
         <div class="d-flex justify-content-between mb-2">
            <h6 class="fw-normal">
               Total {{ $jumlahMember }} user
            </h6>
            <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
               @foreach($members as $user)
               <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  title="{{ $user->name }}" class="avatar pull-up">
                  <img class="rounded-circle"
                     src="{{ $user->avatar ? asset($user->avatar) : asset('assets/img/avatar/avatar-1.png') }}"
                     alt="Avatar" />
               </li>
               @endforeach

               @if($jumlahMember > 3)
               <li class="avatar">
                  <span class="avatar-initial rounded-circle pull-up bg-lighter text-body" data-bs-toggle="tooltip"
                     data-bs-placement="bottom" title="{{ $jumlahMember - 3 }} lagi">+{{ $jumlahMember - 3
                     }}</span>
               </li>
               @endif
            </ul>
         </div>
         <div class="d-flex justify-content-between align-items-end">
            <div class="role-heading">
               <h4 class="mb-1 text-body">
                  Member
               </h4>
               <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#userMemberModal"
                  class="role-edit-modal"><span>Lihat User</span></a>
            </div>
            <a href="javascript:void(0);" class="text-muted"><i class="mdi mdi-content-copy mdi-20px"></i></a>
         </div>
      </div>
   </div>
</div>