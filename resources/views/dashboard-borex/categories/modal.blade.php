<!--  Large modal example -->
<div class="modal fade" id="postinganKategori{{ $category->slug }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="postinganKategori{{ $category->slug }}">Postingan dengan kategori {{ $category->name }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <ul class="list-group">
               @forelse ($category->posts as $post)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     <a href="{{ route('posts.show', $post) }}" class="text-decoration-none">{{ $post->title }}</a>
                     <span class="badge bg-success badge-pill">{{ $post->user->name }}</span>
                  </li>
               @empty
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                     Postingan dengan Kategori {{ $category->name }} masih kosong!
                  </li>
               @endforelse
            </ul>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
