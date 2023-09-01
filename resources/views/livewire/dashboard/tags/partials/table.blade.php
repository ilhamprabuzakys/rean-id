<div class="table-responsive">
   <table class="dt-complex-header table table-bordered" id="tags-table">
      <thead class="table-light">
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jumlah Postingan</th>
            <th>Dibuat</th>
            <th class="text-center">
               {{-- <i class="align-middle" data-feather="edit"></i> --}}
               <i class="fas fa-edit fa-lg"></i>
            </th>
         </tr>
      </thead>
      <tbody>
            @forelse ($tags as $tag)
            <tr>
               <th scope="row">{{ $loop->iteration + ($paginate * ($tags->currentPage()-1)) }}</th>
               <td>
                  <a href="{{ route('home.tag_view', $tag) }}" class="text-dark">
                     {{ $tag->name }}
                  </a>
               </td>
               <td>
                  {{ $tag->posts()->count() }}
               </td>
               <td>{{ echoTime($tag->created_at)}} </td>
               <td class="text-center">
                  <div class="dropdown">
                     <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-ellipsis"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTerkait" wire:click="postinganTerkait({{ $tag->id }})">
                           <i class="fas fa-eye me-2"></i> Lihat postingan terkait
                        </a>
                        <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editTagModal" wire:click.prefetch="editTag({{ $tag->id }})">
                           <i class="fas fa-edit me-2"></i> Edit
                        </a>
                        <a class="text-danger text-decoration-none dropdown-item" wire:click.prevent="deleteConfirmation({{ $tag->id }})">
                           <i class="far fa-trash-alt me-2"></i> Hapus</a>
                        {{-- <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Hapus</a> --}}
                     </div>
                  </div>
               </td> 
            </tr>
            @include('livewire.dashboard.tags.partials.modal.postingan-terkait')
         @empty
         <tr>
            <td colspan="6">
               <h5 class="text-center my-3">Data Tag masih kosong</h5>
            </td>
         </tr>
         @endforelse
      </tbody>
   </table>
   <div class="float-end mt-3 me-3">
      {{ $tags->links() }}
   </div>
</div>