<div class="table-responsive">
   <table class="dt-complex-header table table-sm table-bordered" id="users-table">

      <thead class="table-light">
         <tr>
            <th>#</th>
            <th class="text-center">
               <i class="fas fa-lg fa-face-grin-wink text-primary"></i>
            </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Status Email</th>
            <th>Role</th>
            <th class="text-center">Status Akun</th>
            <th class="text-center">
               <i class="fas fa-lg fa-edit"></i>
            </th>
            <th class="text-center">Status</th>
            <th>Bergabung pada</th>
            <th class="text-center">
               <i class="fas fa-edit fa-lg"></i>
            </th>
         </tr>
      </thead>
      <tbody>
         @forelse ($users as $user)
         <tr>
            <th scope="row">{{ $loop->iteration + ($paginate * ($users->currentPage()-1)) }}</th>
            <td class="text-center">
               {{-- <div class="avatar-wrapper me-3">
                  <div class="avatar rounded-2 bg-label-secondary">
                     <img src="../../assets/img/ecommerce-images/product-9.png" alt="Product-9" class="rounded-2">
                  </div>
               </div> --}}
               <img src="{{ asset($user->avatar ?? 'assets/img/avatar/avatar-1.png') }}" alt
                  class="w-px-40 h-px-40 rounded-circle img-profile-header" style="object-fit: cover">
            </td>
            <td>
               {{ $user->name }} <span class="text-primary">{{ $user->id == auth()->user()->id ? ' (Anda)' : ''
                  }}</span>
            </td>
            <td>{{ $user->email }}</td>
            <td class="text-center">
               @if($user->email_verified_at == null)
               <span class="text-danger"><i class="fas fa-xmark"></i></span>
               @else
               <span class="text-success"><i class="fas fa-check"></i></span>
               @endif
            </td>
            <td>
               @php
               $role = ucfirst($user->role);
               $role = $role != 'Superadmin' ? $role : 'Super Admin'
               @endphp
               {{ $role }}
            </td>
            <td class="text-center">
               @if ($user->active == TRUE)
               <span class="text-success"><i class="fas fa-check"></i></span>
               @else
               <span class="text-danger"><i class="fas fa-xmark"></i></span>
               @endif
            </td>
            <td class="text-center">
               <div class="dropdown">
                  <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0)" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true">
                     <i class="fas fa-lg fa-ellipsis"></i>
                  </a>
                  @if($user->role != 'superadmin')
                  <div class="dropdown-menu dropdown-menu-end">
                        @if ($user->active == TRUE)
                        <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                           wire:click.prevent='deactivate({{ $user->id }})'>
                           <span class="text-danger"><i class="fas fa-md fa-xmark me-3"></i>Nonaktifkan</span>
                        </a>
                        @else
                        <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                           wire:click.prevent='activate({{ $user->id }})'>
                           <span class="text-success"><i class="fas fa-md fa-check me-3"></i>Aktifkan</span>
                        </a>
                        @endif
                     </div>
                     @endif
               </div>
            </td>
            <td class="text-center">
               @if ($user->status == 'online')
               <span class="badge badge-dot bg-success me-1"></span> Online
               @else
               <span class="badge badge-dot bg-danger me-1"></span> Offline
               @endif
            </td>
            <td>{{ echoTime($user->created_at) }}</td>
            <td class="text-center">
               <div class="dropdown">
                  <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button"
                     data-bs-toggle="dropdown" aria-haspopup="true">
                     <i class="fas fa-ellipsis"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal"
                        data-bs-target="#postinganTerkait" wire:click="postinganTerkait({{ $user->id }})">
                        Lihat postingan {{ $user->id == auth()->user()->id ? 'saya' : 'terkait' }}
                     </a>
                     @if ($user->id != auth()->user()->id)
                     <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal"
                        data-bs-target="#editUserModal" wire:click="editUser({{ $user->id }})">
                        Edit
                     </a>
                     <a class="text-danger text-decoration-none dropdown-item"
                        wire:click="deleteConfirmation({{ $user->id }})">Hapus</a>
                     @endif
                  </div>
               </div>
            </td>
         </tr>
         @include('livewire.dashboard.users.partials.modal.postingan-terkait')
         @empty
         <tr>
            <td colspan="6">
               <h4 class="text-center my-3">Data User masih kosong</h4>
            </td>
         </tr>
         @endforelse
      </tbody>
   </table>
   <div class="float-end mt-3 me-3">
      {{ $users->links() }}
   </div>
</div>