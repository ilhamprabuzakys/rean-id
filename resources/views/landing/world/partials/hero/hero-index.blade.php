<div class="hero-area height-700">

   <div class="hero-slides owl-carousel">
      <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ asset('assets/img/hero-image/background-1.jpg') }});"></div>

      <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ asset('assets/img/hero-image/background-2.png') }});"></div>
      
      <div class="single-hero-slide bg-img background-overlay" style="background-image: url({{ asset('assets/img/hero-image/background-3.jpg') }});"></div>
   </div>
   @php
    $posts = \App\Models\Post::where('status', 'approved')->orderBy('updated_at', 'desc')->get();
   @endphp
   <div class="hero-post-area">
      <div class="container">
         <div
            class="row align-items-center justify-content-center">
            <div class="col-12">
               <div id="logo-container" class="logo-hero">
                  <div id="logo-3d"></div>
               </div>
               {{-- <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" class="logo-hero" style="pointer-events: none;"> --}}
            </div>
         </div>
         <div class="row">
            <div class="col-12">
               {{-- <img src="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}" alt="" class="logo-hero"> --}}
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
                        <a href="{{ route('home.show_post', ['category' => $post->category->slug, 'post' => $post->slug]) }}">{{ $post->title }}</a>
                     </div>
                  </div>
               @endforeach
            </div>
         </div>
      </div>
   </div>
   @include('landing.world.extra.3d')
</div>
</div>
