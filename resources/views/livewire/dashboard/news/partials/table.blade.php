<table class="dt-complex-header table table-bordered">

    <thead class="table-light">
       <tr>
          <th>#</th>
          <th>Judul</th>
          <th>About</th>
          <th>Dibuat Oleh</th>
          <th>Tanggal Publish</th>
          <th class="text-center">
             <i class="fas fa-edit"></i>
          </th>
       </tr>
    </thead>
    <tbody>
       @forelse ($news as $berita)
          <tr>
             <th scope="row">{{ $loop->iteration + ($paginate * ($news->currentPage()-1)) }}</th>
             <td>
                <a href="{{ route('news.show', $berita) }}">{{ $berita->title }}</a>
             </td>
             <td>
                {{ $berita->about }}
             </td>
             <td>
                {{ $berita->user->name }}
             </td>
             <td>
                {{ \Carbon\Carbon::parse($berita->created_at)->format('F d, Y') }}
             </td>
             <td class="text-center">
                <div class="dropdown">
                   <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                      <i class="fas fa-ellipsis fa-lg"></i>
                   </a>
 
                   <div class="dropdown-menu dropdown-menu-end">
                      <a class="dropdown-item text-success text-decoration-none" href="{{ route('news.edit', $berita) }}">Edit</a>
                      <a class="text-danger text-decoration-none dropdown-item" wire:click.prevent="deleteConfirmation({{ $berita->id }})">Hapus</a>
                      {{-- <a class="text-danger text-decoration-none dropdown-item" wire:click="findEbook({{ $ebook->id }})" data-bs-toggle="modal" data-bs-target="#deleteEbookModal">Hapus</a> --}}
                   </div>
                </div>
             </td>
          </tr>
       @empty
          <tr>
             <td colspan="6">
                <h5 class="text-center my-3">Tidak ada berita yang tersedia.</h5>
             </td>
          </tr>
       @endforelse
    </tbody>
 </table>
 <div class="float-end mt-3 me-3">
    {{ $news->links() }}
 </div>
 