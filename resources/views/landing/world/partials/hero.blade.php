<div class="hero-area">

   <div class="hero-slides owl-carousel">

      <div class="single-hero-slide bg-img background-overlay" style="background-image: url(assets/Landing/world/img/blog-img/bg-custom-1.jpg);"></div>

      <div class="single-hero-slide bg-img background-overlay" style="background-image: url(assets/Landing/world/img/blog-img/bg1.jpg);"></div>
   </div>
   @php
      $posts = \App\Models\Post::orderBy('updated_at', 'desc')->get();
   @endphp
   <div class="hero-post-area">
      <div class="container">
         <div class="row">
            <div class="col-12">
               <div class="hero-post-slide">
                  @foreach ($posts as $post)
                  @if ($loop->iteration > 5)
                     @break
                  @endif
                  <div class="single-slide d-flex align-items-center">
                     <div class="post-number">
                        <p>{{ $loop->iteration }}</p>
                     </div>
                     <div class="post-title">
                        <a href="{{ route('home.show_post', $post) }}">{{ $post->title }}</a>
                     </div>
                  </div>
                  @endforeach
               </div>
            </div>
         </div>
      </div>
   </div>
</div>