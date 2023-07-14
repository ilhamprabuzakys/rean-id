<!--  Large modal example -->
<div class="modal fade" id="mediaPost{{ $media->post->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="postinganDenganID{{ $media->post->id }}">{{ $media->post->category->name . ' ' . $media->post->title }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="card">
               @if ($media->post->category->name == 'Foto' || in_array(pathinfo($media->post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                  <img class="post-image-size-modal" src="{{ asset('storage/' . $media->post->file_path) }}" alt="Title">
               @endif
               <div class="card-body">
                  <div class="row justify-content-between">
                     <div class="col-lg-8 d-flex align-items-center">
                        <a href="{{ route('home.show_post', ['category' => $media->post->category, 'post' => $media->post]) }}" target="_blank"><h2>{{ $media->post->title }}</h2></a>
                     </div>
                     <div class="col-lg-4 d-flex align-items-center justify-content-end">
                        <div> <span class="badge badge-soft-success w-md p-1 font-size-14 text-decoration-none">{{ $media->post->category->name }}</span></div>
                     </div>
                  </div>
                  <div class="row justify-content-start mt-2 mb-3">
                     @forelse ($media->post->tags as $tag)
                        <div class="col-lg-2">
                           <span class="badge bg-primary w-md p-1 font-size-14 text-decoration-none">{{ $tag->name }}</span>
                        </div>
                     @empty
                        ''
                     @endforelse
                  </div>
                  <p class="card-text">{!! $media->post->body !!}</p>
               </div>
            </div>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
