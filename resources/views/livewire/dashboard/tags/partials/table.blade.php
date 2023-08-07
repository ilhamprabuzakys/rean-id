<div class="table-responsive">
   <table class="table table-sm mb-0" id="tags-table">

      <thead class="table-light">
         <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jumlah Postingan</th>
            <th>Dibuat</th>
            <th>Detail</th>
            <th class="text-center">
               <i class="align-middle" data-feather="edit"></i>
            </th>
         </tr>
      </thead>
      <tbody>
         @foreach ($tags as $tag)
            <tr>
               @php
                  $time = '';
                  $currentTime = now();
                  $updatedAt = $tag->created_at;
                  
                  $diffInSeconds = $currentTime->diffInSeconds($updatedAt);
                  
                  if ($diffInSeconds < 60) {
                        $time = 'Baru saja - ' . $diffInSeconds + 4 . ' detik yang lalu';
                  } else {
                        $time = $updatedAt->format('l, d F Y - H:i:s');
                  }
               @endphp
               <th scope="row">{{ $loop->iteration + ($paginate * ($tags->currentPage()-1)) }}</th>
               <td>
                  <a href="{{ route('tags.show', $tag) }}" class="text-decoration-none text-secondary">{{ $tag->name }}</a>
               </td>
               <td>{{ $tag->posts->count() }}</td>
               <td>{{ $time }}</td>
               <td>
                  <a href="#" class="text-decoration-none text-uppercase" data-bs-toggle="modal" data-bs-target="#postinganTag{{ $tag->id }}">Lihat semua postingan</a>
               </td>
               <td class="text-center">
                  <div class="dropdown">
                     <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                     </a>

                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganTerkait" wire:click="postinganTerkait({{ $tag->id }})">
                           Lihat postingan terkait
                        </a>
                        <a class="dropdown-item text-success text-decoration-none" wire:click="edit({{ $tag->id }})">
                           Edit
                        </a>
                        <a class="text-danger text-decoration-none dropdown-item" wire:click="findId({{ $tag->id }})" data-bs-toggle="modal" data-bs-target="#deleteTagModal">Hapus</a>
                     </div>
                  </div>
               </td> 
            </tr>
            @include('livewire.dashboard.tags.partials.modal.postingan-terkait')
         @endforeach
      </tbody>
   </table>
   <div class="float-end mt-3 me-3">
      {{ $tags->links() }}
   </div>
</div>