@extends('landing.layouts.template')
@section('navbar')
   <img src="{{ asset('assets/img/rean-text-logo-dark.png') }}" alt="" class="img-fluid">
@endsection
@section('content')
   <section id="article-header" class="position-relative">
      <div class="container pt-14 pb-9 pb-lg-11 position-relative">
         <article class="row pt-lg-7 pb-11">
            <div class="col-lg-10 col-xl-8">
               <div class="position-relative pb-3 pb-lg-0">
                  <div class="d-flex align-items-center w-100">
                     <a href="blog-article-basic.html#!" class="badge bg-primary rounded-pill me-3">{{ $post->category->name }}</a>
                     <small class="text-body-secondary">{{ echoTime($post->updated_at) }}</small>
                  </div>

                  <div>
                     <h2 class="my-4 display-3">
                        {{ $post->title }}
                     </h2>
                     <div class="d-flex pt-2 mb-0 small align-items-center">
                        @if ($post->user->avatar == null)
                           <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt="" class="width-3x height-3x rounded-circle me-2">
                        @else
                           <img src="{{ asset($post->user->avatar) }}" alt="" class="width-3x height-3x rounded-circle me-2">
                        @endif
                        <span class="text-body-secondary d-inline-block">By <a href="blog-article-basic.html#!"
                              class="text-dark">{{ $post->user->name }}</a></span>
                     </div>
                  </div>
               </div>

            </div>
         </article>
         <!--/.article-->
      </div>


      <!--Divider-->
      {{-- <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg);" preserveAspectRatio="none" width="100%"
        height="120" viewBox="0 0 800 240" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M800 240H0L800 0V240Z" fill="#532fff" />
    </svg> --}}
      {{-- <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg);"
         fill="#532fff" width="100%" height="80" preserveAspectRatio="none"
         viewBox="0 0 1440 150">
         <path
            d="M0,139.588931 C152,152.720009 299.666667,139.401344 443,99.6329343 C658,39.9803202 681,66.1486839 905,90.6287661 C1129,115.108848 1222,59.3955578 1293,37.4478979 C1340.33333,22.8161246 1389.33333,16.1567919 1440,17.4698997 L1440,150 L0,150 L0,139.588931 Z">
         </path>
         <path
            d="M0,117.980769 C152,145.786435 299.666667,138.940533 443,97.4430619 C658,35.1968558 697,56.6671048 921,82.2115385 C1145,107.755972 1222,55.4562342 1293,32.5543282 C1340.33333,17.2863909 1389.33333,10.337522 1440,11.7077215 L1440,150 L0,150 L0,117.980769 Z"
            fill-opacity="0.3"></path>
         <path
            d="M0,106.034486 C156.666667,132.662839 291.666667,129.406134 405,96.2643713 C575,46.5517277 637,36.0308187 861,62.6436817 C1085,89.2565447 1215,51.1586623 1286,27.2988541 C1333.33333,11.3923153 1384.66667,2.2926973 1440,1.13686838e-13 L1440,150 L0,150 L0,106.034486 Z"
            fill-opacity="0.3"></path>
      </svg> --}}
      {{-- <svg class="position-absolute start-0 bottom-0" style="color: var(--bs-body-bg); rotate: 180deg"
         fill="#532fff" width="100%" height="80" preserveAspectRatio="none"
         viewBox="0 0 1440 150">
         <path
            d="M0,139.588931 C152,152.720009 299.666667,139.401344 443,99.6329343 C658,39.9803202 681,66.1486839 905,90.6287661 C1129,115.108848 1222,59.3955578 1293,37.4478979 C1340.33333,22.8161246 1389.33333,16.1567919 1440,17.4698997 L1440,150 L0,150 L0,139.588931 Z">
         </path>
         <path
            d="M0,117.980769 C152,145.786435 299.666667,138.940533 443,97.4430619 C658,35.1968558 697,56.6671048 921,82.2115385 C1145,107.755972 1222,55.4562342 1293,32.5543282 C1340.33333,17.2863909 1389.33333,10.337522 1440,11.7077215 L1440,150 L0,150 L0,117.980769 Z"
            fill-opacity="0.3"></path>
         <path
            d="M0,106.034486 C156.666667,132.662839 291.666667,129.406134 405,96.2643713 C575,46.5517277 637,36.0308187 861,62.6436817 C1085,89.2565447 1215,51.1586623 1286,27.2988541 C1333.33333,11.3923153 1384.66667,2.2926973 1440,1.13686838e-13 L1440,150 L0,150 L0,106.034486 Z"
            fill-opacity="0.3"></path>
      </svg> --}}

   </section>
   <!--/.Article header-end-->

   <section class="position-relative border-bottom post-detail">
      <div class="container pb-9 pb-lg-11">
        <div class="post-detail-img-container">
         @if ($post->file_path !== null && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
            <img src="{{ asset('storage/' . $post->file_path) }}" alt=""
               class="img-fluid shadow-lg rounded-4 mb-7 mb-lg-9 position-relative mt-n14">
         @else
            <img src="{{ asset('assets/landing/assan/assets/img/1200x600/4.jpg') }}" alt=""
               class="img-fluid shadow-lg rounded-4 mb-7 mb-lg-9 position-relative mt-n14">
         @endif
        </div>

         <div class="row">
            <div class="col-xl-9 mx-auto">
               <article class="article mb-9">
                  {!! $post->body !!}
               </article>
               <!--/.article-->

               {{--  <div class="d-flex justify-content-end align-items-center mb-9">
                    <div class="me-3 small text-body-secondary">
                        Share Article
                    </div>
                    <div>
                        <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                            <img src="https://uigator.com/assan/5.1/public/assets/img/brands/facebook.svg" alt="" class="width-2x height-2x hover-lift">
                        </a>
                        <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                            <img src="https://uigator.com/assan/5.1/public/assets/img/brands/twitter.svg" alt="" class="width-2x height-2x hover-lift">
                        </a>
                        <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                            <img src="assets/img/brands/Linkedin.svg" alt="" class="width-2x height-2x hover-lift">
                        </a>
                    </div>
                </div> --}}

               <div class="mt-5">
                  @forelse ($post->tags as $tag)
                     <a class="btn btn-sm btn-soft-secondary mb-1" href="#">#{{ $tag->name }}</a>
                  @empty
                  @endforelse
               </div>

               <ul class="list-inline mb-0 mt-4">
                  <li class="list-inline-item text-muted align-middle me-2 text-uppercase fs-13 fw-medium">Share:</li>
                  <li class="list-inline-item me-2 align-middle">
                     <a href="blog-post.html#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" class="feather feather-facebook icon-xs icon-dual-primary">
                           <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>
                     </a>
                  </li>
                  <li class="list-inline-item me-2 align-middle">
                     <a href="blog-post.html#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" class="feather feather-twitter icon-xs icon-dual-info">
                           <path
                              d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                           </path>
                        </svg>
                     </a>
                  </li>
                  <li class="list-inline-item align-middle">
                     <a href="blog-post.html#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                           stroke-linejoin="round" class="feather feather-instagram icon-xs icon-dual-danger">
                           <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                           <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                           <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>
                     </a>
                  </li>
               </ul>
               {{-- <!--/.social-->
                <h4 class="mb-5">Comments (2)</h4>
                <ul class="list-unstyled mb-7">
                    <li class="d-flex mb-3">
                        <div class="me-3">
                            <img src="assets/img/avatar/1.jpg" alt="" class="width-5x height-5x rounded-circle">
                        </div>
                        <div class="px-3 py-4 border rounded border-end">
                            <div class="d-flex mb-3 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">Jessica</h6>
                                    <small class="text-body-secondary">02 June</small>
                                </div>
                                <div>
                                    <a href="blog-article-basic.html#!" class="text-dark small">Reply</a>
                                </div>
                            </div>
                            <p class="mb-0">
                                It is a long fact that a reader will be distracted by the readable
                                content of a page when looking at its layout of a page when looking at its
                                layout.
                            </p>
                        </div>
                    </li>
                    <!--media-->
                    <li class="d-flex mb-3">
                        <div class="me-3">
                            <img src="assets/img/avatar/3.jpg" alt="" class="width-5x height-5x rounded-circle">
                        </div>
                        <div class="px-3 py-4 border rounded border-end">
                            <div class="d-flex mb-3 justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-3">Rebecca</h6>
                                    <small class="text-body-secondary">29 May</small>
                                </div>
                                <div>
                                    <a href="blog-article-basic.html#!" class="text-dark small">Reply</a>
                                </div>
                            </div>
                            <p class="mb-0">
                                It is a long fact that a reader will be distracted by the readable
                                content of a page when looking at its layout of a page when looking at its
                                layout.
                            </p>
                        </div>
                    </li>
                    <!--media-->
                </ul>
                <!--/.comments-->
                <h4 class="mb-4">Post a comment</h4>
                <form>
                    <div class="mb-3">
                        <input type="text" class="form-control" placeholder="Name" name="comment-name">
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" placeholder="Email Address"
                            name="comment-email">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="comment-text" rows="10"
                            placeholder="Comment"></textarea>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                            <label class="form-check-label text-body-secondary" for="flexCheckDefault">
                                Notify me when someone reply
                            </label>
                        </div>
                        <button class="btn btn-primary btn-lg" type="submit">Submit</button>
                    </div>
                </form> --}}
            </div>
         </div>
      </div>
   </section>

   <section class="position-relative border-bottom comment-section">
      <div class="container pb-9 pb-lg-11">
         <div class="row mt-3">
            <div class="col-lg-12">
               <div id="disqus_thread"></div>

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
   </section>

   <section class="position-relative overflow-hidden">
      <div class="container py-9 py-lg-11">
         <div class="row justify-content-center">
            <!--Post card col-->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
               <a href="blog-article-basic.html#!"
                  class="card-hover p-4 border d-flex flex-row hover-shadow-lg align-items-center rounded-3 hover-lift">
                  <div class="me-4 rounded-3 flex-shrink-0 overflow-hidden">
                     <img src="{{ asset('assets/landing/assan/assets/img/projects/1.jpg') }}" alt=""
                        class="img-fluid img-zoom h-auto width-10x">
                  </div>
                  <div class="flex-grow-1 h-100">
                     <div class="d-flex small mb-3 justify-content-between">
                        <span class="d-inline-block me-2 small text-warning">

                           Business
                        </span>
                        <span class="text-body-secondary small">19 Aug.</span>
                     </div>
                     <h5 class="mb-0">
                        How to configure output css files from sass
                     </h5>
                  </div>
               </a>
               <!--/.card-->

            </div>
            <!--/.col-->

            <!--Post card col-->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
               <a href="blog-article-basic.html#!"
                  class="card-hover p-4 border d-flex flex-row hover-shadow-lg align-items-center rounded-3 hover-lift">
                  <div class="me-4 rounded-3 flex-shrink-0 overflow-hidden">
                     <img src="{{ asset('assets/landing/assan/assets/img/projects/2.jpg') }}" alt=""
                        class="img-fluid img-zoom h-auto width-10x">
                  </div>
                  <div class="flex-grow-1 h-100">
                     <div class="d-flex small mb-3 justify-content-between">
                        <span class="d-inline-block me-2 small text-success">

                           Community
                        </span>
                        <span class="text-body-secondary small">12 Nov.</span>
                     </div>
                     <h5 class="mb-0">
                        How to configure output css files from sass
                     </h5>
                  </div>
               </a>
               <!--/.card-->

            </div>
            <!--/.col-->

            <!--Post card col-->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
               <a href="blog-article-basic.html#!"
                  class="card-hover p-4 border d-flex flex-row hover-shadow-lg align-items-center rounded-3 hover-lift">
                  <div class="me-4 rounded-3 flex-shrink-0 overflow-hidden">
                     <img src="{{ asset('assets/landing/assan/assets/img/projects/3.jpg') }}" alt=""
                        class="img-fluid img-zoom h-auto width-10x">
                  </div>
                  <div class="flex-grow-1 h-100">
                     <div class="d-flex small mb-3 justify-content-between">
                        <span class="d-inline-block me-2 small text-danger">

                           Design
                        </span>
                        <span class="text-body-secondary small">24 Dec.</span>
                     </div>
                     <h5 class="mb-0">
                        How to configure output css files from sass
                     </h5>
                  </div>
               </a>
               <!--/.card-->

            </div>
            <!--/.col-->

            <!--Post card col-->
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
               <a href="blog-article-basic.html#!"
                  class="card-hover p-4 border d-flex flex-row hover-shadow-lg align-items-center rounded-3 hover-lift">
                  <div class="me-4 rounded-3 flex-shrink-0 overflow-hidden">
                     <img src="{{ asset('assets/landing/assan/assets/img/projects/4.jpg') }}" alt=""
                        class="img-fluid img-zoom h-auto width-10x">
                  </div>
                  <div class="flex-grow-1 h-100">
                     <div class="d-flex small mb-3 justify-content-between">
                        <span class="d-inline-block me-2 small text-primary">

                           Tech
                        </span>
                        <span class="text-body-secondary small">11 Jan.</span>
                     </div>
                     <h5 class="mb-0">
                        How to configure output css files from sass
                     </h5>
                  </div>
               </a>
               <!--/.card-->

            </div>
            <!--/.col-->
         </div>
      </div>
   </section>
@endsection

@section('footer')
   @include('landing.home.posts.partials.footer')
@endsection