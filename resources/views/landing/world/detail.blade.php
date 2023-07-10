@extends('landing.world.world')
@php
   $postRelated = \App\Models\Post::where('category_id', $post->category->id)->get();
@endphp
@push('script')
   <script id="dsq-count-scr" src="//ilahazs.disqus.com/count.js" async></script>
@endpush
@section('content')
<div class="row justify-content-center">
   <div class="col-12 col-lg-12">
      <div class="single-blog-content mb-2">
         <div class="row justify-content-between">
            <div class="col-12">
               <h4>{{ $post->title }}</h4>
            </div>
            <div class="col-12">
               <p>
                  Oleh
                  <a href="#" class="post-author">{{ $post->user->name }}</a>
                  pada
                  <a href="#" class="post-date">{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a>
               </p>
            </div>
         </div>


         <div class="post-content">
            @if ($post->category->name == 'Artikel' || $post->category->name == 'Foto' && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
               <img class="post-image my-2" src="{{ asset('storage/' . $post->file_path) }}" alt="Title">
            @endif

            {!! $post->body !!}

            <div class="row mt-3">
               <div class="col-8">
                  <p>
                     <span>Author: <a href="#" class="text-primary">{{ $post->user->name }}</a></span>
                     pada
                     <a href="#" class="post-date">{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a>
                  </p>
               </div>
               <div class="col-4 d-flex justify-content-end">
                  <p>
                     <span>Kategori: <a href="#" class="text-primary">{{ $post->category->name }}</a></span>
                  </p>
               </div>
               @if ($post->tags != null)
                  <div class="col-lg-5 d-flex justify-content-start">
                     <p>
                        <span>Tags:
                           @foreach ($post->tags as $tag)
                              <a href="#" class="text-primary">#{{ $tag->name }}</a>
                           @endforeach
                        </span>
                     </p>
                  </div>
                  @endif
               <div class="col-lg-7 d-flex justify-content-end">
                  <span class="like-container">
                     <a href="#" class="love-icon"><i class="fa fa-heart-o"></i></a>
                     <span class="like-text">123 Likes</span>
                   </span>
                   
                  
               </div>
            </div>
         </div>

         <div class="row mt-3">
            <div class="col-lg-12">
               <div class="card px-0 shadow-sm">
                  <div class="card-body">
                     <div id="disqus_thread"></div>
                  </div>
               </div>
               <script>
                  /**
                   *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                   *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
                  /*
                  var disqus_config = function () {
                  this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                  this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                  };
                  */
                  (function() { // DON'T EDIT BELOW THIS LINE
                     var d = document,
                        s = d.createElement('script');
                     s.src = 'https://rean-id.disqus.com/embed.js';
                     s.setAttribute('data-timestamp', +new Date());
                     (d.head || d.body).appendChild(s);
                  })();
               </script>
               <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
            </div>

         </div>
      </div>

      <div class="row my-5">
      @foreach ($postRelated as $post)
         @if ($loop->iteration > 3) @break @endif
         <div class="col-12 col-md-6 col-lg-4">
            <div class="single-blog-post">
               {{-- <div class="post-thumbnail">
                     <img src="img/blog-img/b1.jpg" alt="" />

                     <div class="post-cta">
                        <a href="#">travel</a>
                     </div>
                  </div> --}}

               <div class="post-content">
                  <a href="#" class="headline">
                     <h5>
                        {{ Str::limit($post->title, 20, '') }}
                     </h5>
                  </a>
                  <p>
                     {{ Str::limit($post->body, 30) }}
                  </p>

                  <div class="post-meta">
                     <p>
                        <a href="#" class="post-author">{{ $post->user->name }}</a>
                        on
                        <a href="#" class="post-date">{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a>
                     </p>
                  </div>
               </div>
            </div>
         </div>
      @endforeach
      </div>
   </div>
</div>
@endsection
@section('hero')
<div
   class="hero-area height-700 bg-img background-overlay"
   style="background-image: url(assets/Landing/world/img/blog-img/bg-custom-1.jpg)">
   <div class="container h-100">
      <div
         class="row h-100 align-items-center justify-content-center">
         <div class="col-12 col-md-8 col-lg-6">
            <div class="single-blog-title text-center">
               <div class="post-cta py-2"><a href="#">{{ $heropost->category->name }}</a></div>
               <h3>
                  {{ $heropost->title }}
               </h3>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
