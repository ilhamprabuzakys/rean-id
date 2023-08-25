<div class="table-responsive">
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
                  <i class="fas fa-lg fa-edit"></i>
               </th>
            @endcannot
            <th class="text-center">Tanggal Publish</th>
            <th class="text-center">
               <i class="fas fa-lg fa-eye"></i>
            </th>
            <th class="text-center">
               <i class="fas fa-lg fa-heart"></i>
            </th>
            <th class="text-center">
               <i class="fas fa-lg fa-edit"></i>
            </th>
         </tr>
      </thead>
      <tbody>
         @forelse ($posts as $key => $post)
            <tr>
               <th scope="row">{{ $loop->iteration + ($paginate * ($posts->currentPage()-1)) }}</th>
               <td>
                   {!! Str::limit(strip_tags($post->title), 20, '...') !!}
               </td>
               <td>
                  {{ optional($post->user)->name }}
                  @if (optional($post->user)->username == auth()->user()->username)
                     <span class="text-primary">{{ __(' (Anda)') }}</span>
                  @endif
               </td>
               <td class="text-center">
                  @if ($post->category)
                     <a href="{{ route('home.category_view', $post->category) }}" class="text-decoration-none">{{ $post->category->name }}</a>
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
                           <i class="fas fa-lg fa-ellipsis"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                           @if ($post->status == 'pending')
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='approve({{ $post->id }})'>
                                    <span class="text-success"><i class="fas fa-md fa-check me-3"></i>Setuju</span>
                              </a>
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='reject({{ $post->id }})'>
                                 <span class="text-danger"><i class="fas fa-md fa-xmark me-3"></i>Tolak</span>
                              </a>
                           @elseif ($post->status == 'rejected')
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='pending({{ $post->id }})'>
                                    <span class="text-primary"><i class="far fa-md fa-clock me-3"></i>Kembalikan ke pending</span>
                              </a>
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='approve({{ $post->id }})'>
                                 <span class="text-success"><i class="fas fa-md fa-check me-3"></i>Setuju</span>
                              </a>
                           @elseif ($post->status == 'approved')
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='pending({{ $post->id }})'>
                                 <span class="text-primary"><i class="far fa-md fa-clock me-3"></i>Kembalikan ke pending</span>
                              </a>
                              <a class="dropdown-item text-decoration-none" href="#" wire:click='reject({{ $post->id }})'>
                                 <span class="text-danger"><i class="fas fa-md fa-xmark me-3"></i>Tolak</span> 
                              </a>
                           @endif
                        </div>
                     </div>
                  </td>
               @endcannot
               <td class="text-center">{{ echoTime($post->created_at) }}</td>
               <td class="text-center">
                  {{ $post->views }}<i class="fas text-primary fa-sm fa-user ms-2"></i>
               </td>
               <td class="text-center">
                  {{ $post->likes->count() }}<i class="fas text-danger fa-sm fa-heart ms-2"></i>
               </td>
               <td class="text-center">
                  <div class="dropdown">
                     <a class="text-muted dropdown-toggle font-size-18 px-2" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true">
                        <i class="fas fa-lg fa-ellipsis"></i>
                     </a>
   
                     <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item text-primary text-decoration-none" href="#" data-bs-toggle="modal" data-bs-target="#postinganDenganID{{ $post->id }}">
                           <i class="fas fa-md fa-eye me-2"></i>Tampilkan
                        </a>
                        <a class="dropdown-item text-success text-decoration-none" href="{{ route('posts.edit', $post) }}">
                           <i class="fas fa-md fa-edit me-3"></i>Edit
                        </a>
                        <a class="text-danger text-decoration-none dropdown-item" wire:click.prevent="deleteConfirmation({{ $post->id }})"><i class="far fa-md fa-trash-alt me-3"></i>Delete</a>
                     </div>
                  </div>
               </td>
            </tr>
            @push('modal')
               @include('dashboard.posts.modal')
            @endpush
         @empty
         <tr>
            <td colspan="8">
               <h5 class="text-center my-3">Tidak ada postingan yang tersedia.</h5>
            </td>
         </tr>
         @endforelse
      </tbody>
   </table>
</div>
<div class="float-end mt-5 me-3">
   {{ $posts->links() }}
</div>
@include('livewire.dashboard.posts.partials.modal.delete')    
