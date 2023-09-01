<div class="table-responsive">
   <table class="dt-complex-header table table-bordered" id="categories-table">
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
            @forelse ($categories as $category)
            <tr>
               <th scope="row">{{ $loop->iteration + ($paginate * ($categories->currentPage()-1)) }}</th>
               <td>
                  {{ $category->name }}
               </td>
               <td>
                  {{ $category->posts()->count() }}
               </td>
               <td>{{ echoTime($category->created_at)}} </td>
               <td class="text-center">
                  <div class="dropdown">
                     <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-ellipsis"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTerkait" wire:click="postinganTerkait({{ $category->id }})">
                           <i class="fas fa-eye me-2"></i> Lihat postingan terkait
                        </a>
                        <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#editCategoryModal" wire:click.prefetch="editCategory({{ $category->id }})">
                           <i class="fas fa-edit me-2"></i> Edit
                        </a>
                        <a class="text-danger text-decoration-none dropdown-item" wire:click.prevent="deleteConfirmation({{ $category->id }})">
                           <i class="far fa-trash-alt me-2"></i> Hapus</a>
                        {{-- <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Hapus</a> --}}
                     </div>
                  </div>
               </td> 
            </tr>
            @include('livewire.dashboard.categories.partials.modal.postingan-terkait')
         @empty
         <tr>
            <td colspan="6">
               <h5 class="text-center my-3">Data Kategori masih kosong</h5>
            </td>
         </tr>
         @endforelse
      </tbody>
   </table>
   <div class="float-end mt-3 me-3">
      {{ $categories->links() }}
   </div>
</div>