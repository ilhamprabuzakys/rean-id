<div class="card-datatable text-nowrap">
   <div class="table-responsive">
      <table class="dt-complex-header table table-bordered" id="users-table">

         <thead class="table-light">
            <tr>
               <th>#</th>
               <th>Nama</th>
               <th>Email</th>
               <th>Role</th>
               <th>Dibuat</th>
               <th class="text-center">
                  {{-- <i class="align-middle" data-feather="edit"></i> --}}
                  Action
               </th>
            </tr>
         </thead>
         <tbody>
             @forelse ($users as $user)
               <tr>
                  <th scope="row">{{ $loop->iteration + (10 * ($users->currentPage()-1)) }}</th>
                  <td>
                     <a href="{{ route('users.show', $user) }}" class="text-decoration-none text-secondary">{{ $user->name }}</a>
                  </td>
                  <td>{{ $user->email }}</td>
                  <td>
                     @php
                     $role = ucfirst($user->role);
                     $role = $role != 'Superadmin' ? $role : 'Super Admin'
                     @endphp
                     {{ $role }}
                  </td>
                  <td>
                     @php
                        $currentTime = now();
                        $updatedAt = $user->created_at;
                        
                        $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                        
                        if ($diffInSeconds < 60) {
                            echo 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                        } else {
                            echo $updatedAt->format('l, d F Y - H:i:s');
                        }
                     @endphp
                  </td>
                  <td class="text-center">
                     <div class="dropdown">
                        <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                           <i class="align-middle" data-feather="more-horizontal"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end">
                           <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTerkait" wire:click="postinganTerkait({{ $user->id }})">
                              Lihat postingan terkait
                           </a>
                           <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editUserModal" wire:click="editUser({{ $user->id }})">
                              Edit
                           </a>
                           <a class="text-danger text-decoration-none dropdown-item" wire:click="findUser({{ $user->id }})" data-bs-toggle="modal" data-bs-target="#deleteUserModal">Hapus</a>
                           {{-- <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Hapus</a> --}}
                        </div>
                     </div>
                  </td> 
               </tr>
               @include('livewire.user.postingan-terkait')
               @include('livewire.user.edit')
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
</div>