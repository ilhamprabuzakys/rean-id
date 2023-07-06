@extends('landing.world.world')
@php
   $postArtikel = $posts->filter(function ($post) {
        return $post->category->name === 'Artikel';
    });
   $postFoto = $posts->filter(function ($post) {
        return $post->category->name === 'Foto';
    });
   $postVideo = $posts->filter(function ($post) {
        return $post->category->name === 'Video';
    });
   $postPoster = $posts->filter(function ($post) {
        return $post->category->name === 'Poster';
    });
   $postDesain = $posts->filter(function ($post) {
        return $post->category->name === 'Desain';
    });
   $postMusik = $posts->filter(function ($post) {
        return $post->category->name === 'Musik';
    });
   $postAudio = $posts->filter(function ($post) {
        return $post->category->name === 'Audio';
    });
   $postEbook = $posts->filter(function ($post) {
        return $post->category->name === 'Ebook';
    });
   $postEvent = $posts->filter(function ($post) {
        return $post->category->name === 'Event';
    });
   $firstPostSemua = $posts->first();
@endphp
@section('content')
<div class="row justify-content-center">

   <div class="col-12 col-lg-8">
      <div class="post-content-area">

         <div class="world-catagory-area">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="title">Daftar Postingan</li>
               <li class="nav-item">
                  <a class="nav-link active" id="tab1" data-toggle="tab" href="#post-semua" role="tab" aria-controls="tab-semua" aria-selected="true">Semua</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab2" data-toggle="tab" href="#post-artikel" role="tab" aria-controls="world-tab-2" aria-selected="false">Artikel</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab3" data-toggle="tab" href="#post-ebook" role="tab" aria-controls="world-tab-3" aria-selected="false">Ebook</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab4" data-toggle="tab" href="#post-event" role="tab" aria-controls="world-tab-4" aria-selected="false">Event</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab5" data-toggle="tab" href="#post-video" role="tab" aria-controls="world-tab-5" aria-selected="false">Video</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab6" data-toggle="tab" href="#post-audio" role="tab" aria-controls="world-tab-6" aria-selected="false">Audio</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Lainnya</a>
                  <div class="dropdown-menu">
                     <a class="nav-link" id="tab7" data-toggle="tab" href="#post-foto" role="tab" aria-controls="world-tab-7" aria-selected="false">Foto</a>
                     <a class="nav-link" id="tab8" data-toggle="tab" href="#post-musik" role="tab" aria-controls="world-tab-8" aria-selected="false">Musik</a>
                     <a class="nav-link" id="tab9" data-toggle="tab" href="#post-desain" role="tab" aria-controls="world-tab-9" aria-selected="false">Desain</a>
                     <a class="nav-link" id="tab9" data-toggle="tab" href="#post-poster" role="tab" aria-controls="world-tab-9" aria-selected="false">Poster</a>
                  </div>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent" style="margin-top: 5px !important">
               <div class="tab-pane fade show active" id="post-semua" role="tabpanel" aria-labelledby="post-semua">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($posts != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @foreach ($posts as $post)
                        @if ($loop->iteration == 3)
                           @break
                        @endif
                        <div class="col-12 col-md-6">

                           <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">
   
                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">
   
                                 <div class="post-cta"><a href="#">{{ $post->category->name }}</a></div>
                              </div>
   
                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{{ $post->title }}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @endforeach
                     
                     <div class="col-12 mt-1">
                        <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">

                           <div class="single-cata-slide">
                              <div class="row">
                                 @foreach ($posts as $post)
                                    @if ($loop->iteration > 4)
                                       @break
                                    @endif
                                    <div class="col-12 col-md-6">

                                       <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                          <div class="post-thumbnail">
                                             <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">

                                             <div class="post-cta"><a href="#">{{ $post->category->name }}</a></div>
                                          </div>

                                          <div class="post-content">
                                             <a href="#" class="headline">
                                                <h5>{{ $post->title }}</h5>
                                             </a>

                                             <div class="post-meta">
                                                <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                                      {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 @endforeach
                              </div>
                           </div>
                           <div class="single-cata-slide">
                              <div class="row">
                                 @foreach ($posts as $post)
                                 @if ($loop->iteration > 4)
                                    @break
                                 @endif
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">

                                          <div class="post-cta post-all-cta"><a href="#">{{ $post->category->name }}</a></div>
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>{{ $post->title }}</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                                   {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="post-artikel" role="tabpanel" aria-labelledby="post-artikel">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postArtikel != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postArtikel as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-ebook" role="tabpanel" aria-labelledby="post-ebook">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postEbook != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postEbook as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-event" role="tabpanel" aria-labelledby="post-event">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postEvent != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postEvent as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-audio" role="tabpanel" aria-labelledby="post-audio">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postAudio != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postAudio as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-video" role="tabpanel" aria-labelledby="post-video">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postVideo != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postVideo as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail py-0">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-desain" role="tabpanel" aria-labelledby="post-desain">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postDesain != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postDesain as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-poster" role="tabpanel" aria-labelledby="post-poster">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postPoster != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postPoster as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-foto" role="tabpanel" aria-labelledby="post-foto">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postFoto != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postFoto as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
               <div class="tab-pane fade" id="post-musik" role="tabpanel" aria-labelledby="post-musik">
                  <div class="row d-flex justify-content-end mt-0 mb-3">
                     @if ($postMusik != null)   
                        <div class="mr-3">
                           <a style="word-spacing: 1px;" href="?category=semua">Lihat semua konten..</a>
                        </div>
                     @endif
                  </div>
                  <div class="row">
                     @forelse ($postMusik as $post)
                        @if ($loop->iteration > 4)
                           @break
                        @endif
                        <div class="col-12 col-md-6">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $post) }}" class="headline">
                                    <h5>{!! Str::limit($post->title, 20) !!}</h5>
                                 </a>
                                 <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>
   
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                       {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     @empty
                       <div class="col-12 col-md-12">
                           <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">
                              <div class="post-content ml-2">
                                 <a href="#" class="headline text-center">
                                    <h5>{{ __('Data Masih Kosong') }}</h5>
                                 </a>
                              </div>
                           </div>
                        </div>
                     @endforelse
                  </div>
               </div>
            </div>
         </div>

         <div class="world-latest-articles">
            <div class="row">
               <div class="col-12 col-lg-12">
                  <div class="title">
                     <h5>Latest Articles</h5>
                  </div>
         
                  @forelse ($postArtikel as $post)
                  @if ($loop->iteration > 4)
                     @break
                  @endif
                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.{{ $loop->iteration+1 }}s">
         
                     <div class="post-thumbnail">
                        <img src="assets/Landing/world/img/blog-img/b{{ 15 + $loop->iteration }}.jpg" alt="">
                     </div>
         
                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>{{ $post->title }}</h5>
                        </a>
                        <p>{!! Str::limit(strip_tags($post->body), 40) !!}</p>

                        <div class="post-meta">
                           <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">
                                 {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                        </div>
                     </div>
                  </div>
                  @empty
                  <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                     <div class="post-content">
                        <a href="#" class="headline">
                           <h5>Belum ada artikel yang dibuat.</h5>
                        </a>
                        <p>Mari bergabung dan ramaikan komunitas ini!</p>
         
                        {{-- <div class="post-meta">
                           <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                        </div> --}}
                     </div>
                  </div>
                  @endforelse
               </div>
            </div>
         </div>

         @if (!$postArtikel->count() > 4)
         <div class="row mb-3">
            <div class="col-12">
               <div class="load-more-btn mt-50 text-center">
                  <a href="#" class="btn world-btn">Load More</a>
               </div>
            </div>
         </div>
         @else
         <div class="row my-3 justify-content-center">
            <div class="col-4 d-flex justify-content-center align-items-center">
               <p>Tidak ada artikel lagi.</p>
            </div>
         </div>
         @endif
         
      </div>
   </div>

   <div class="col-12 col-md-8 col-lg-4">
      <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">
         @include('landing.world.partials.content.about')
         @include('landing.world.partials.content.topartikel')
         @include('landing.world.partials.content.stayconnected')
         @include('landing.world.partials.content.popularvideo')
      </div>
   </div>
</div>
@endsection
@section('hero')
   @include('landing.world.partials.hero.hero-index')
@endsection