{{-- @dd($ebooks) --}}
<table class="dt-complex-header table table-sm table-bordered">

   <thead class="table-light">
      <tr>
         <th>#</th>
         <th>Judul</th>
         <th>Author</th>
         <th class="text-center">Status</th>
         @cannot('member')
         <th class="text-center">
            <i class="fas fa-lg fa-edit"></i>
         </th>
         @endcannot
         <th>Tanggal Publish</th>
         <th class="text-center">
            <i class="fas fa-lg fa-edit"></i>
         </th>
      </tr>
   </thead>
   <tbody>
      @forelse ($ebooks as $ebook)
      <tr>
         <th scope="row">{{ $loop->iteration + ($paginate * ($ebooks->currentPage()-1)) }}</th>
         <td>
            @if($ebook->status == 'approved' || $this->ebook->user_id == auth()->user()->id || auth()->user()->role != 'member')
            <a href="{{ route('home.ebooks.show', $ebook) }}" class="text-dark text-decoration-underline">{{ $ebook->title }}</a>
            @else
            {{ $ebook->title }}
            @endif
         </td>
         <td>
            {{ $ebook->author }}
         </td>
         <td class="text-center">
            @if ($ebook->status == 'pending')
            <span class="badge bg-label-primary rounded-pill">Pending</span>
            @elseif ($ebook->status == 'approved')
            <span class="badge bg-label-success rounded-pill">Approved</span>
            @else
            <span class="badge bg-label-danger rounded-pill">Rejected</span>
            @endif
         </td>
         @cannot('member')
         <td class="text-center">
            <div class="dropdown">
               <a class="text-muted dropdown-toggle font-size-18 px-2" href="javascript:void(0)" role="button"
                  data-bs-toggle="dropdown" aria-haspopup="true">
                  <i class="fas fa-lg fa-ellipsis"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-end">
                  @if ($ebook->status == 'pending')
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='approve({{ $ebook->id }})'>
                     <span class="text-success"><i class="fas fa-md fa-check me-3"></i>Setuju</span>
                  </a>
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='reject({{ $ebook->id }})'>
                     <span class="text-danger"><i class="fas fa-md fa-xmark me-3"></i>Tolak</span>
                  </a>
                  @elseif ($ebook->status == 'rejected')
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='pending({{ $ebook->id }})'>
                     <span class="text-primary"><i class="far fa-md fa-clock me-3"></i>Kembalikan ke pending</span>
                  </a>
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='approve({{ $ebook->id }})'>
                     <span class="text-success"><i class="fas fa-md fa-check me-3"></i>Setuju</span>
                  </a>
                  @elseif ($ebook->status == 'approved')
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='pending({{ $ebook->id }})'>
                     <span class="text-primary"><i class="far fa-md fa-clock me-3"></i>Kembalikan ke pending</span>
                  </a>
                  <a class="dropdown-item text-decoration-none" href="javascript:void(0)"
                     wire:click.prevent='reject({{ $ebook->id }})'>
                     <span class="text-danger"><i class="fas fa-md fa-xmark me-3"></i>Tolak</span>
                  </a>
                  @endif
               </div>
            </div>
         </td>
         @endcannot
         <td>
            {{ $ebook->published_at }}
         </td>
         <td class="text-center">
            <div class="dropdown">
               <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown"
                  aria-haspopup="true">
                  <i class="fas fa-lg fa-ellipsis"></i>
               </a>
               <div class="dropdown-menu dropdown-menu-end">
                  <a class="dropdown-item text-primary text-decoration-none" href="{{ route('home.ebooks.show', $ebook) }}" target="_blank">
                     <i class="fas fa-md fa-eye me-2"></i>Lihat Ebook
                  </a>
                  <a class="dropdown-item text-success text-decoration-none"
                     href="{{ route('ebooks.edit', $ebook) }}"><i class="fas fa-md fa-edit me-3"></i>Edit</a>
                  <a class="text-danger text-decoration-none dropdown-item"
                     wire:click.prevent="deleteConfirmation({{ $ebook->id }})"><i
                        class="far fa-md fa-trash-alt me-3"></i>Hapus</a>
               </div>
            </div>
         </td>
      </tr>
      @empty
      <tr>
         @cannot('member')
         <td colspan="8">
            <h5 class="text-center my-3">Tidak ada ebook yang tersedia.</h5>
         </td>
         @else
         <td colspan="7">
            <h5 class="text-center my-3">Tidak ada ebook yang tersedia.</h5>
         </td>
         @endcannot
      </tr>
      @endforelse
   </tbody>
</table>
<div class="float-end mt-3 me-3">
   {{ $ebooks->links() }}
</div>