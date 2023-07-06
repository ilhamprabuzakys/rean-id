@extends('landing.world.world')
@php
   $postRelated = \App\Models\Post::where('category_id', $post->category->id)->get();
@endphp
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
                     <div class="col-12">
                        <p>
                           <span>Tags:
                              @foreach ($post->tags as $tag)
                                 <a href="#" class="text-primary">#{{ $tag->name }}</a>
                              @endforeach
                           </span>
                        </p>
                     </div>
                  @endif
               </div>
            </div>
         </div>

         {{-- <div class="comment_area clearfix mb-2">
            <ol>
               <li class="single_comment_area">
                  <div class="comment-content">
                     <div
                        class="comment-meta d-flex align-items-center justify-content-between">
                        <p>
                           <a href="#" class="post-author">Katy Liu</a>
                           on
                           <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a>
                        </p>
                        <a
                           href="#"
                           class="comment-reply btn world-btn">Reply</a>
                     </div>
                     <p>
                        Pick the yellow peach that looks
                        like a sunset with its red, orange,
                        and pink coat skin, peel it off with
                        your teeth. Sink them into
                        unripened...
                     </p>
                  </div>
                  <ol class="children">
                     <li class="single_comment_area">
                        <div class="comment-content">
                           <div
                              class="comment-meta d-flex align-items-center justify-content-between">
                              <p>
                                 <a
                                    href="#"
                                    class="post-author">Katy Liu</a>
                                 on
                                 <a
                                    href="#"
                                    class="post-date">Sep 29, 2017 at
                                    9:48 am</a>
                              </p>
                              <a
                                 href="#"
                                 class="comment-reply btn world-btn">Reply</a>
                           </div>
                           <p>
                              Pick the yellow peach that
                              looks like a sunset with its
                              red, orange, and pink coat
                              skin, peel it off with your
                              teeth. Sink them into
                              unripened...
                           </p>
                        </div>
                     </li>
                  </ol>
               </li>
            </ol>
         </div>

         <div class="post-a-comment-area mb-2">
            <h5>Get in Touch</h5>

            <form action="#" method="post">
               <div class="row">
                  <div class="col-12 col-md-6">
                     <div class="group">
                        <input
                           type="text"
                           name="name"
                           id="name"
                           required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter your name</label>
                     </div>
                  </div>
                  <div class="col-12 col-md-6">
                     <div class="group">
                        <input
                           type="email"
                           name="email"
                           id="email"
                           required />
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter your email</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="group">
                        <textarea
                           name="message"
                           id="message"
                           required></textarea>
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Enter your comment</label>
                     </div>
                  </div>
                  <div class="col-12">
                     <button
                        type="submit"
                        class="btn world-btn">
                        Post comment
                     </button>
                  </div>
               </div>
            </form>
         </div> --}}
      </div>

      {{-- <div class="col-12 col-md-8 col-lg-4">
         <div class="post-sidebar-area">
            @include('landing.world.partials.content.about')
            @include('landing.world.partials.content.topartikel')
            @include('landing.world.partials.content.stayconnected')
            @include('landing.world.partials.content.todayspick')
         </div>
      </div>
   </div> --}}


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
