@php
   $posts = \App\Models\Post::orderBy('updated_at', 'desc')->get();
   $mostViewedArticles = \App\Models\Post::mostViewed($posts, 5, 'Artikel');
@endphp
<div class="sidebar-widget-area" id="sidebar-top-artikel">
   <h5 class="title">Artikel popular</h5>
   <div class="widget-content">
      @php
         $hasPosts = false; // Membuat variabel untuk menandai apakah ada post yang tampil
      @endphp

      @foreach ($mostViewedArticles as $post)
         @if ($post->views > 0)
            @php
               $hasPosts = true; // Mengubah status variabel menjadi true karena ada post yang tampil
            @endphp
            <div class="card mb-1" id="card-top-artikel">
               <div class="row no-gutters">
                  <div class="col-md-3">
                     <img class="card-img-left" src="{{ asset('storage/' . $post->file_path) }}" alt="Card image">
                  </div>
                  <div class="col-md-9">
                     <div class="card-body">
                        <div class="row justify-content-between">
                           <div class="col-9">
                              <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}">
                                 <h6>{!! Str::limit(strip_tags($post->title), 15) !!}</h6>
                              </a>
                           </div>
                           <div class="col-3 d-flex justify-content-end align-items-center">
                              <span><i class="fa fa-eye mr-1"></i>{{ $post->views }}</span>
                           </div>
                        </div>
                        <p class="post-body">{!! Str::limit(strip_tags($post->body), 30) !!}</p>
                        <p>{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</p>
                     </div>
                  </div>
               </div>
            </div>
         @endif
      @endforeach

      @if (!$hasPosts)
         <div class="card mb-1" id="card-top-artikel">
            <div class="card-body">
               <h6>Semua artikel dalam kondisi yang sama..</h6>
            </div>
         </div>
      @endif

      {{-- <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="{{ asset('assets/Landing/world/img/blog-img/b14.jpg') }}" alt="Card image cap">
         <div class="card-body">
           <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
       </div> --}}
   </div>
</div>

{{-- <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">
   <div class="post-thumbnail">
      <img src="{{ asset('storage/' . $post->file_path) }}" alt="">
   </div>
   <div class="post-content">
      <div class="row">
         <div class="col"><a href="{{ route('home.show_post', $post) }}" class="headline">
            <h5 class="mb-0">{{ $post->title }}</h5>
         </a></div>
         <div>
            <p class="text-primary end"><i class="fa fa-eye"></i>{{ $post->views }}</p>
         </div>
      </div>
   </div>
</div> --}}
