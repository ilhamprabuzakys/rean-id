<!--  Large modal example -->
<div wire:ignore.self class="modal fade" id="postinganTerkait" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title" id="postinganTerkait">Daftar {{ $name }}</h3>
            <button type="button" wire:click="closeModal" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
               {{-- @dump($dataposts) --}}
               {{-- @php
                  $posts = \App\Models\Post::where('user_id', $user_id)->orderBy('updated_at', 'desc')->get();
               @endphp --}}
               @if ($dataposts !== null)
                  @forelse ($dataposts as $post)
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                        <span class="badge bg-success badge-pill">{{ $post->user->name }}</span>
                     </li>
                  @empty
                     <li class="list-group-item d-flex justify-content-between align-items-center">
                        Data {{ $name }} masih kosong.
                     </li>
                  @endforelse
               @endif
            </ul>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
