<div class="table-responsive">
   <table class="dt-complex-header table table-bordered" id="users-table">

      <thead class="table-light">
         <tr>
            <th>#</th>
            <th class="text-center">
               <i class="fas fa-lg fa-face-grin-wink"></i>
            </th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>Dibuat</th>
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
               @if ($user->avatar == null)
               <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt
                  class="w-px-40 h-auto rounded-circle img-profile-header">
               @else
               <img src="{{ asset($user->avatar) }}" alt
                  class="w-px-40 h-auto rounded-circle img-profile-header">
               @endif
            </td>
            <td>
               {{ $user->name }} <span class="text-primary">{{ $user->id == auth()->user()->id ? ' (Anda)' : '' }}</span>
            </td>
            <td>{{ $user->email }}</td>
            <td>
               @php
               $role = ucfirst($user->role);
               $role = $role != 'Superadmin' ? $role : 'Super Admin'
               @endphp
               {{ $role }}
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