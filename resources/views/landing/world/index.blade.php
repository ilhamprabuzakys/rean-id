@extends('landing.world.world')
@section('content')
@php
   $postArtikel = $posts->where('category_id', 1);
   $postVideo = $posts->where('category_id', 3);

   $firstPostSemua = $posts->first();
@endphp
<div class="row justify-content-center">

   <div class="col-12 col-lg-8">
      <div class="post-content-area">

         <div class="world-catagory-area">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="title">Daftar Postingan</li>
               <li class="nav-item">
                  <a class="nav-link active" id="tab1" data-toggle="tab" href="#tab-semua" role="tab" aria-controls="tab-semua" aria-selected="true">Semua</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab2" data-toggle="tab" href="#world-tab-2" role="tab" aria-controls="world-tab-2" aria-selected="false">Artikel</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab3" data-toggle="tab" href="#world-tab-3" role="tab" aria-controls="world-tab-3" aria-selected="false">Ebook</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab4" data-toggle="tab" href="#world-tab-4" role="tab" aria-controls="world-tab-4" aria-selected="false">Event</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab5" data-toggle="tab" href="#world-tab-5" role="tab" aria-controls="world-tab-5" aria-selected="false">Video</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab6" data-toggle="tab" href="#world-tab-6" role="tab" aria-controls="world-tab-6" aria-selected="false">Audio</a>
               </li>
               {{-- <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                  <div class="dropdown-menu">
                     <a class="nav-link" id="tab7" data-toggle="tab" href="#world-tab-7" role="tab" aria-controls="world-tab-7" aria-selected="false">Sports</a>
                     <a class="nav-link" id="tab8" data-toggle="tab" href="#world-tab-8" role="tab" aria-controls="world-tab-8" aria-selected="false">Politices</a>
                     <a class="nav-link" id="tab9" data-toggle="tab" href="#world-tab-9" role="tab" aria-controls="world-tab-9" aria-selected="false">Features</a>
                  </div>
               </li> --}}
            </ul>
            <div class="row d-flex justify-content-end mt-3 mb-0">
               <div class="mr-3">
                  <a style="word-spacing: 1px; margin-bottom: 0 !important;" href="?category=semua">Lihat semua konten..</a>
               </div>
            </div>
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="tab-semua" role="tabpanel" aria-labelledby="tab1">
                  <div class="row">
                     <div class="col-12 col-md-6">
                        <div class="wow fadeInUpBig" data-wow-delay="0.1s">
                           <div class="single-blog-post">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b1.jpg" alt="">

                                 <div class="post-cta"><a href="#">{{ $firstPostSemua->category->name }}</a></div>
                              </div>

                              <div class="post-content">
                                 <a href="{{ route('home.show_post', $firstPostSemua) }}" class="headline">
                                    <h5>{{ $firstPostSemua->title }}</h5>
                                 </a>
                                 <p style="color: grey; font-size: 11pt !imp
                                 ">{!! $firstPostSemua->body !!}</p>
                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">{{ $firstPostSemua->user->name }}</a> on <a href="#" class="post-date">{{ $firstPostSemua->updated_at->format('M d, Y \a\t g:i a') }}
                                    </a></p>
                                 </div>
                              </div>
                           </div>

                          
                           {{-- <div class="single-blog-post">

                              <div class="post-thumbnail">
                                 <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                                 <div class="post-cta"><a href="#">travel</a></div>
                              </div>

                              <div class="post-content">
                                 <a href="#" class="headline">
                                    <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                                 </a>
                                 <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                                 <div class="post-meta">
                                    <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                 </div>
                              </div>
                           </div>  --}}

                          
                        </div>
                     </div>
                     <div class="col-12 col-md-6">
                        @php
                           $counter = 1;
                        @endphp
                        @foreach ($posts as $post)
                        @if ($counter > 4)
                           @break
                        @endif
                        <div class="single-blog-post post-style-2 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.{{ $counter+1 }}s">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b10.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="{{ route('home.show_post', $post) }}" class="headline">
                                 <h5>{{ $post->title }}</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">{{ $post->user->name }}</a> on <a href="#" class="post-date">{{ $post->updated_at->format('M d, Y \a\t g:i a') }}</a></p>
                              </div>
                           </div>
                        </div>
                        @php
                           $counter++;
                        @endphp
                        @endforeach
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-2" role="tabpanel" aria-labelledby="tab2">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-3" role="tabpanel" aria-labelledby="tab3">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-4" role="tabpanel" aria-labelledby="tab4">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-5" role="tabpanel" aria-labelledby="tab5">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-6" role="tabpanel" aria-labelledby="tab6">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-7" role="tabpanel" aria-labelledby="tab7">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-8" role="tabpanel" aria-labelledby="tab8">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-9" role="tabpanel" aria-labelledby="tab9">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>

         <div class="world-catagory-area mt-50">
            <ul class="nav nav-tabs" id="myTab2" role="tablist">
               <li class="title">What's Trending</li>
               <li class="nav-item">
                  <a class="nav-link active" id="tab10" data-toggle="tab" href="#world-tab-10" role="tab" aria-controls="world-tab-10" aria-selected="true">All</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab11" data-toggle="tab" href="#world-tab-11" role="tab" aria-controls="world-tab-11" aria-selected="false">Style hunter</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab12" data-toggle="tab" href="#world-tab-12" role="tab" aria-controls="world-tab-12" aria-selected="false">Vogue</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab13" data-toggle="tab" href="#world-tab-13" role="tab" aria-controls="world-tab-13" aria-selected="false">Health &amp; Fitness</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab14" data-toggle="tab" href="#world-tab-14" role="tab" aria-controls="world-tab-14" aria-selected="false">Travel</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="tab15" data-toggle="tab" href="#world-tab-15" role="tab" aria-controls="world-tab-15" aria-selected="false">Gadgets</a>
               </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">More</a>
                  <div class="dropdown-menu">
                     <a class="nav-link" id="tab16" data-toggle="tab" href="#world-tab-16" role="tab" aria-controls="world-tab-16" aria-selected="false">Sports</a>
                     <a class="nav-link" id="tab17" data-toggle="tab" href="#world-tab-17" role="tab" aria-controls="world-tab-17" aria-selected="false">Politices</a>
                     <a class="nav-link" id="tab18" data-toggle="tab" href="#world-tab-18" role="tab" aria-controls="world-tab-18" aria-selected="false">Features</a>
                  </div>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent2">
               <div class="tab-pane fade show active" id="world-tab-10" role="tabpanel" aria-labelledby="tab10">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.3s">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 mt-50">
                        <div class="world-catagory-slider2 owl-carousel wow fadeInUpBig" data-wow-delay="0.4s">

                           <div class="single-cata-slide">
                              <div class="row">
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="single-cata-slide">
                              <div class="row">
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="col-12 col-md-6">

                                    <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                                       <div class="post-thumbnail">
                                          <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                                       </div>

                                       <div class="post-content">
                                          <a href="#" class="headline">
                                             <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                                          </a>

                                          <div class="post-meta">
                                             <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-11" role="tabpanel" aria-labelledby="tab11">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-12" role="tabpanel" aria-labelledby="tab12">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-13" role="tabpanel" aria-labelledby="tab13">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-14" role="tabpanel" aria-labelledby="tab14">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-15" role="tabpanel" aria-labelledby="tab15">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-16" role="tabpanel" aria-labelledby="tab16">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-17" role="tabpanel" aria-labelledby="tab17">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="tab-pane fade" id="world-tab-18" role="tabpanel" aria-labelledby="tab18">
                  <div class="row">
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b2.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b3.jpg" alt="">

                              <div class="post-cta"><a href="#">travel</a></div>
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                              </a>
                              <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b15.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b16.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-12 col-md-6">

                        <div class="single-blog-post post-style-2 d-flex align-items-center mb-1">

                           <div class="post-thumbnail">
                              <img src="assets/Landing/world/img/blog-img/b17.jpg" alt="">
                           </div>

                           <div class="post-content">
                              <a href="#" class="headline">
                                 <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                              </a>

                              <div class="post-meta">
                                 <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-12 col-md-8 col-lg-4">
      <div class="post-sidebar-area wow fadeInUpBig" data-wow-delay="0.2s">

         <div class="sidebar-widget-area">
            <h5 class="title">About World</h5>
            <div class="widget-content">
               <p>
                  REAN (Rumah Edukasi Anti Narkoba) mengajak generasi milenial dan generasi Z dalam berkarya yang bersih dari Narkotika. REAN.ID merupakan media informasi, edukasi dan sumber informasi dan edukasi yang dikemas dalam bentuk muda inovasi dengan tujuan sebagai jejaring belajar, berbagi cerita dan inspirasi dalam mengekspresikan karya, menggali potensi dan membangun kepercayaan diri guna memperkuat citra remaja yang gemar mencoba hal baru, Yang mana Informasi dan edukasi ini difokuskan dalam pembuatan konten yang berliterasi di bidang pencegahan narkoba.
               </p>
            </div>
         </div>

         <div class="sidebar-widget-area">
            <h5 class="title">Top Stories</h5>
            <div class="widget-content">

               <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b11.jpg" alt="">
                  </div>

                  <div class="post-content">
                     <a href="#" class="headline">
                        <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                     </a>
                  </div>
               </div>

               <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b13.jpg" alt="">
                  </div>

                  <div class="post-content">
                     <a href="#" class="headline">
                        <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                     </a>
                  </div>
               </div>

               <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b14.jpg" alt="">
                  </div>

                  <div class="post-content">
                     <a href="#" class="headline">
                        <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                     </a>
                  </div>
               </div>

               <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b10.jpg" alt="">
                  </div>

                  <div class="post-content">
                     <a href="#" class="headline">
                        <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                     </a>
                  </div>
               </div>

               <div class="single-blog-post post-style-2 d-flex align-items-center widget-post">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b12.jpg" alt="">
                  </div>

                  <div class="post-content">
                     <a href="#" class="headline">
                        <h5 class="mb-0">How Did van Gogh’s Turbulent Mind Depict One of the Most</h5>
                     </a>
                  </div>
               </div>
            </div>
         </div>

         <div class="sidebar-widget-area">
            <h5 class="title">Stay Connected</h5>
            <div class="widget-content">
               <div class="social-area d-flex justify-content-between">
                  <a href="#"><i class="fa fa-facebook"></i></a>
                  <a href="#"><i class="fa fa-twitter"></i></a>
                  <a href="#"><i class="fa fa-pinterest"></i></a>
                  <a href="#"><i class="fa fa-vimeo"></i></a>
                  <a href="#"><i class="fa fa-instagram"></i></a>
                  <a href="#"><i class="fa fa-google"></i></a>
               </div>
            </div>
         </div>

         <div class="sidebar-widget-area">
            <h5 class="title">Today’s Pick</h5>
            <div class="widget-content">

               <div class="single-blog-post todays-pick">

                  <div class="post-thumbnail">
                     <img src="assets/Landing/world/img/blog-img/b22.jpg" alt="">
                  </div>

                  <div class="post-content px-0 pb-0">
                     <a href="#" class="headline">
                        <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

{{-- <div class="row justify-content-center">

   <div class="col-12 col-md-6 col-lg-4">
      <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.2s">

         <div class="post-thumbnail">
            <img src="assets/Landing/world/img/blog-img/b4.jpg" alt="">

            <div class="post-content d-flex align-items-center justify-content-between">

               <div class="post-tag"><a href="#">travel</a></div>

               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-12 col-md-6 col-lg-4">
      <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.4s">

         <div class="post-thumbnail">
            <img src="assets/Landing/world/img/blog-img/b5.jpg" alt="">

            <div class="post-content d-flex align-items-center justify-content-between">

               <div class="post-tag"><a href="#">travel</a></div>

               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <div class="col-12 col-md-6 col-lg-4">
      <div class="single-blog-post post-style-3 mt-50 wow fadeInUpBig" data-wow-delay="0.6s">

         <div class="post-thumbnail">
            <img src="assets/Landing/world/img/blog-img/b6.jpg" alt="">

            <div class="post-content d-flex align-items-center justify-content-between">

               <div class="post-tag"><a href="#">travel</a></div>

               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div> --}}

<div class="world-latest-articles">
   <div class="row">
      <div class="col-12 col-lg-8">
         <div class="title">
            <h5>Latest Articles</h5>
         </div>

         <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b18.jpg" alt="">
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>

         <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.3s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b19.jpg" alt="">
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>

         <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.4s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b20.jpg" alt="">
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>

         <div class="single-blog-post post-style-4 d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.5s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b21.jpg" alt="">
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>Pick the yellow peach that looks like a sunset with its red, orange, and pink coat skin, peel it off with your teeth. Sink them into unripened...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>
      </div>
      <div class="col-12 col-lg-4">
         <div class="title">
            <h5>Most Popular Videos</h5>
         </div>

         <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.2s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b7.jpg" alt="">

               <div class="post-cta"><a href="#">travel</a></div>

               <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>

         <div class="single-blog-post wow fadeInUpBig" data-wow-delay="0.4s">

            <div class="post-thumbnail">
               <img src="assets/Landing/world/img/blog-img/b8.jpg" alt="">

               <div class="post-cta"><a href="#">travel</a></div>

               <a href="https://www.youtube.com/watch?v=IhnqEwFSJRg" class="video-btn"><i class="fa fa-play"></i></a>
            </div>

            <div class="post-content">
               <a href="#" class="headline">
                  <h5>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in Physics?</h5>
               </a>
               <p>How Did van Gogh’s Turbulent Mind Depict One of the Most Complex Concepts in...</p>

               <div class="post-meta">
                  <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

<div class="row">
   <div class="col-12">
      <div class="load-more-btn mt-50 text-center">
         <a href="#" class="btn world-btn">Load More</a>
      </div>
   </div>
</div>
@endsection