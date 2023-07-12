@extends('landing.world.world')
@php
   $postRelated = \App\Models\Post::where('category_id', $post->category->id)->get();
@endphp
@push('script')
   <script id="dsq-count-scr" src="//ilahazs.disqus.com/count.js" async></script>
@endpush
@section('parent', 'container-fluid')
@section('content')
<div class="row justify-content-center">
   <div class="col-12 col-lg-12">
      <div class="single-blog-content mb-2">
         <div class="row justify-content-between">
            <div class="col-12">
               <h4>{{ $post->title }}</h4>
            </div>
            <div class="col-5">
               <p>
                  Oleh
                  <a href="#" class="post-author">{{ $post->user->name }}</a>
                  pada
                  <a href="#" class="post-date">{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a>
               </p>
            </div>
            <div class="col-7 d-flex justify-content-end text-white">
               @include('landing.world.partials.content.detail.share-social-media')
            </div>
         </div>


         <div class="post-content">
            @if ($post->category->name == 'Artikel' || $post->category->name == 'Foto' && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
               <img class="post-image my-2" src="{{ asset('storage/' . $post->file_path) }}" alt="Title">
            @endif

            <iframe src="https://a5.siar.us/public/cnsradio/history?theme=light"></iframe>
            
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

         @include('landing.world.partials.content.disqus')
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
                     {!! Str::limit(strip_tags($post->body), 30) !!}
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
