<!--  Large modal example -->
<div class="modal fade" id="postinganUser{{ $user->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="postinganUser{{ $user->id }}">Postingan yang diupload oleh {{ $user->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
               @php
                  $posts = $user->posts()->orderBy('updated_at', 'desc')->get();
               @endphp
               @forelse ($posts as $post)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                     @forelse ($post->tags as $tag)
                     <span class="badge bg-success badge-pill">{{ $tag->name }}</span>                        
                     @empty
                     ''
                     @endforelse
                  </li>
               @empty
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     User {{ $user->name }} belum mengupload postingan apapun!
                  </li>
               @endforelse
            </ul>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
