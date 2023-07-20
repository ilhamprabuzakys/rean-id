<!--  Large modal example -->
<div class="modal fade" id="postinganTag{{ $tag->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title" id="postinganTag{{ $tag->id }}">Postingan dengan label {{ $tag->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
               @php
                  $posts = $tag->posts()->orderBy('updated_at', 'desc')->get();
               @endphp
               @forelse ($posts as $post)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                     <span class="badge bg-success badge-pill">{{ $post->user->name }}</span>
                  </li>
               @empty
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     Postingan dengan Kategori {{ $tag->name }} masih kosong!
                  </li>
               @endforelse
            </ul>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
