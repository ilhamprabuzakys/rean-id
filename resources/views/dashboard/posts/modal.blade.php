<!--  Large modal example -->
<div class="modal fade" id="postinganDenganID{{ $post->id }}" tabindex="-1" role="dialog">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h4 class="modal-title" id="postinganDenganID{{ $post->id }}">{{ $post->category->name . ' ' . $post->title }}</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <div class="card">
               @if (in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                  <img class="post-image-size-modal" src="{{ asset('storage/' . $post->file_path) }}" alt="Title">
               @endif
               <div class="card-body">
                  <div class="row justify-content-between">
                     <div class="col-lg-8 d-flex align-items-center">
                        <h2>{{ $post->title }}</h2>
                     </div>
                     <div class="col-lg-4 d-flex align-items-center justify-content-end">
                        <div> <span class="badge bg-success-subtle text-success w-md p-1 font-size-14 text-decoration-none">{{ $post->category->name }}</span></div>
                     </div>
                  </div>
                  <div class="text-start">
                     @forelse ($post->tags as $tag)
                           <span class="badge bg-primary-subtle text-primary font-size-14 text-decoration-none">{{ $tag->name }}</span>
                     @empty
                     @endforelse
                  </div>
                  <p class="card-text">{!! $post->body !!}</p>
               </div>
            </div>
         </div>
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
</div>

<!-- Tooltips and Popovers -->
{{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalPopovers">
   Launch demo modal
</button> --}}

<!-- tooltips and popovers modal -->
{{-- <div class="modal fade" id="post{{ $post->id }}" tabindex="-1" aria-labelledby="post{{ $post->id }}Label" aria-modal="true">
   <div class="modal-dialog">
       <div class="modal-content">
           <div class="modal-header">
               <h5 class="modal-title" id="post{{ $post->id }}Label">Modal title</h5>
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
           </div>
           <div class="modal-body">
               <h5>Popover in a modal</h5>
               <p>This <a href="#" role="button" class="btn btn-secondary popover-test" title="" data-bs-toggle="popover" data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus." data-bs-container="body" data-bs-original-title="Popover Title">button</a> triggers a popover on click.
               </p>
               <hr>
               <h5>Tooltips in a modal</h5>
               <p><a href="#" class="tooltip-test text-decoration-underline" title="" data-bs-container="#exampleModalPopovers" data-bs-toggle="tooltip" data-bs-original-title="Tooltip title">This
                       link</a> and <a href="#" class="tooltip-test text-decoration-underline" title="" data-bs-toggle="tooltip" data-bs-container="#exampleModalPopovers" data-bs-original-title="Tooltip title">that link</a> have tooltips on
                   hover.</p>
           </div>
           <div class="modal-footer">
               <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
               <button type="button" class="btn btn-primary">Save changes</button>
           </div>
       </div>
   </div>
</div> --}}
