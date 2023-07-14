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
               <div class="row">
                  <div class="col">
                     @if ($post->file_path)
                        @if ($post->category->name == 'Artikel' || in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                           <div class="post-image">
                              <img class="post-content-image" src="{{ asset('storage/' . $post->file_path) }}" alt="Title">
                           </div>
                        @endif
                     @endif
                     <div class="post-body">
                        {!! $post->body !!}
                     </div>
                  </div>
               </div>


               <div class="row post-info">
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
               @if ($loop->iteration > 3)
               @break
            @endif
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
@include('landing.world.partials.hero.hero-detail')
@endsection
