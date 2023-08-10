{{-- @dd($ebooks) --}}
<table class="dt-complex-header table table-bordered">

    <thead class="table-light">
       <tr>
          <th>#</th>
          <th>Judul</th>
          <th>Author</th>
          <th>Tanggal Publish</th>
          <th class="text-center">
             {{-- <i class="align-middle" data-feather="edit"></i> --}}
             <i class="fas fa-pencil-alt"></i>
          </th>
       </tr>
    </thead>
    <tbody>
       @forelse ($ebooks as $ebook)
          <tr>
             <th scope="row">{{ $loop->iteration }}</th>
             <td>
                {{ $ebook->title }}
             </td>
             <td>
                {{ $ebook->author }}
             </td>
             <td>
                {{ $ebook->published_at }}
             </td>
             <td class="text-center">
                <div class="dropdown">
                   <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                      <i class="align-middle" data-feather="more-horizontal"></i>
                   </a>
 
                   <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item text-success text-decoration-none" href="#" data-bs-toggle="offcanvas" data-bs-target="#editEvent"
                         wire:click.prefetch="editEvent({{ $event->id }})">
                         Edit
                      </a>
                      <a class="text-danger text-decoration-none dropdown-item" wire:click="findEvent({{ $event->id }})" data-bs-toggle="modal" data-bs-target="#deleteEventModal">Hapus</a>
                      {{-- <a class="text-danger text-decoration-none dropdown-item" href="{{ route('users.destroy', $user) }}" data-confirm-delete="true">Hapus</a> --}}
                   </div>
                </div>
             </td>
          </tr>
       @empty
          <tr>
             <td colspan="6">
                <h5 class="text-center my-3">Tidak ada ebook yang tersedia.</h5>
             </td>
          </tr>
       @endforelse
    </tbody>
 </table>
 <div class="float-end mt-3 me-3">
    {{ $ebooks->links() }}
 </div>
 