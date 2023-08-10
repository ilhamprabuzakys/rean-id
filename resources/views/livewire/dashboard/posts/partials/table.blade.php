<table id="posts-table" class="table table-sm" style="width:100%">
   <thead class="table-light">
      <tr>
         <th>#</th>
         <th>Judul</th>
         <th>Author</th>
         <th class="text-center">Kategori</th>
         <th class="text-center">Status</th>
         @cannot('member')
            <th class="text-center">
               <i class="align-middle" data-feather="edit"></i>
            </th>
         @endcannot
         <th>Terakhir diupdate</th>
         <th class="text-center">
            <i class="align-middle" data-feather="edit"></i>
         </th>
      </tr>
   </thead>
   <tbody>
      @foreach ($posts as $key => $post)
         <tr>
            <th scope="row">{{ $loop->iteration + ($paginate * ($posts->currentPage()-1)) }}</th>
            <td>
                {!! Str::limit(strip_tags($post->title), 20, '...') !!}
                {{-- <span class="d-none">{{ $post->title }}</span> --}}
                {{-- {{ $post->title }} --}}
            </td>
            <td><a href="#" class="text-decoration-none text-dark">
                  {{ optional($post->user)->name }}
                  @if (optional($post->user)->username == auth()->user()->username)
                     <span class="text-primary">{{ __(' (Anda)') }}</span>
                  @endif
               </a></td>
            <td class="text-center">
               @if ($post->category)
                  <a href="{{ route('categories.show', $post->category) }}" class="text-decoration-none">{{ $post->category->name }}</a>
               @else
                  Belum diset
               @endif
            </td>
            <td class="text-center">
               @if ($post->status == 'pending')
                  <span class="badge bg-label-primary rounded-pill">Pending</span>
               @elseif ($post->status == 'approved')
                  <span class="badge bg-label-success rounded-pill">Approved</span>
               @else
                  <span class="badge bg-label-danger rounded-pill">Rejected</span>
               @endif
            </td>
            @cannot('member')
               <td class="text-center">
                  <div class="dropdown">
                     <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="align-middle" data-feather="more-horizontal"></i>
                     </a>
                     <div class="dropdown-menu dropdown-menu-end">
                        @if ($post->status == 'pending')
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='approve({{ $post->id }})'>
                                 <span class="text-success">Setuju</span>
                           </a>
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='reject({{ $post->id }})'>
                              <span class="text-danger">Tolak</span>
                           </a>
                        @elseif ($post->status == 'rejected')
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='pending({{ $post->id }})'>
                                 <span class="text-primary">Kembalikan ke pending</span>
                           </a>
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='approve({{ $post->id }})'>
                              <span class="text-success">Setuju</span>
                           </a>
                        @elseif ($post->status == 'approved')
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='pending({{ $post->id }})'>
                              <span class="text-primary">Kembalikan ke pending</span>
                           </a>
                           <a class="dropdown-item text-decoration-none" href="#" wire:click='reject({{ $post->id }})'>
                              <span class="text-danger">Tolak</span> 
                           </a>
                        @endif
                     </div>
                  </div>
               </td>
            @endcannot
            <td>{{ echoTime($post->updated_at) }}</td>
            <td class="text-center">
               <div class="dropdown">
                  <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                     <i class="align-middle" data-feather="more-horizontal"></i>
                  </a>

                  <div class="dropdown-menu dropdown-menu-end">
                     <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganDenganID{{ $post->id }}">
                        Tampilkan
                     </a>
                     <a class="dropdown-item text-success text-decoration-none" href="{{ route('posts.edit', $post) }}">
                        Edit
                     </a>
                     <a class="text-danger text-decoration-none dropdown-item" wire:click.prefetch="findItem({{ $post }})" data-bs-toggle="modal" data-bs-target="#deletePostModal">Delete</a>
                  </div>
               </div>
            </td>
         </tr>
         @push('modal')
            @include('dashboard.posts.modal')
         @endpush
      @endforeach
   </tbody>
</table>
<div class="float-end mt-5 me-3">
   {{ $posts->links() }}
</div>
@include('livewire.dashboard.posts.partials.modal.delete')    
