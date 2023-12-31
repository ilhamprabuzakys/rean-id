<div>
    <section id="article-header" class="position-relative">
       <div class="container @if($news->file->first() !== null) pb-9 pb-lg-11 @endif position-relative">
          <article
             class="row @if($news->file->first() !== null) pt-lg-7 pb-7 @else pt-lg-5 pb-5  @endif justify-content-center">
             <div class="col-lg-10 col-xl-9">
                <div class="position-relative pb-3 pb-lg-0">
                   <div class="d-flex align-items-center w-100">
                      <a href="javascript:void(0);"
                         class="badge bg-primary rounded-pill me-3">{{
                         $news->about }}</a>
                      <small class="text-body-secondary">{{ echoTime($news->created_at) }}</small>
                   </div>
 
                   <div>
                      <h2 class="my-4 display-4">
                         {{ $news->title }}
                      </h2>
                      <div class="d-flex pt-2 mb-0 small align-items-center">
                         @if ($news->user->avatar == null)
                         <img style="object-fit: cover;" src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt=""
                            class="width-3x height-3x rounded-circle me-2">
                         @else
                         <img style="object-fit: cover;" src="{{ asset($news->user->avatar) }}" alt=""
                            class="width-3x height-3x rounded-circle me-2">
                         @endif
                         <span class="text-body-secondary d-inline-block">By <a href="{{ route('home.show_user', $news->user) }}"
                               class="text-dark">{{ $news->user->name }}</a></span>
                      </div>
                   </div>
                </div>
 
             </div>
          </article>
          <!--/.article-->
       </div>
    </section>
    <!--/.Article header-end-->
 
    <section class="position-relative border-bottom post-detail">
       <div class="container pb-9 pb-lg-11">
          @if ($news->file->first() && in_array(pathinfo($news->file->first()->file_path, PATHINFO_EXTENSION),
          ['jpeg', 'jpg', 'png']))
          <div class="post-detail-img-container container">
             <img style="object-fit: contain;" src="{{ asset($news->file->first()->file_path) }}" alt=""
                class="img-fluid shadow-lg rounded-4 mb-6 mb-lg-5 position-relative mt-n14" data-glightbox data-gallery="gallery{{$news->file->first()->id}}">
             {{-- <img style="object-fit: cover;" src="{{ asset('assets/landing/assan/assets/img/1200x600/4.jpg') }}"
                alt="" class="img-fluid shadow-lg rounded-4 mb-7 mb-lg-9 position-relative mt-n14"> --}}
          </div>
          @endif
 
          <div class="row">
             <div class="col-xl-9 mx-auto">
                <article class="article mb-5 dropcap">
                   {!! $news->body !!}
                </article>
                <!--/.article-->
 
                {{-- <div class="d-flex justify-content-end align-items-center mb-9">
                   <div class="me-3 small text-body-secondary">
                      Share Article
                   </div>
                   <div>
                      <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                         <img style="object-fit: cover;"
                            src="https://uigator.com/assan/5.1/public/assets/img/brands/facebook.svg" alt=""
                            class="width-2x height-2x hover-lift">
                      </a>
                      <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                         <img style="object-fit: cover;"
                            src="https://uigator.com/assan/5.1/public/assets/img/brands/twitter.svg" alt=""
                            class="width-2x height-2x hover-lift">
                      </a>
                      <a href="blog-article-basic.html#!" class="d-inline-block me-1">
                         <img style="object-fit: cover;" src="assets/img/brands/Linkedin.svg" alt=""
                            class="width-2x height-2x hover-lift">
                      </a>
                   </div>
                </div> --}}
 
                <div class="row">
                   <div class="col-12">
                      <ul class="list-inline mb-0 mt-4">
                         <li class="list-inline-item text-muted align-middle me-2 text-uppercase fs-13 fw-medium">Share:</li>
                         <li class="list-inline-item me-2 align-middle">
                            <a href="javascript:void(0);" onclick="shareToFacebook()">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-facebook icon-xs icon-dual-primary">
                                  <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                               </svg>
                            </a>
                         </li>
                         <li class="list-inline-item me-2 align-middle">
                            <a href="javascript:void(0);" onclick="shareToTwitter()">
                               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                  stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                  class="feather feather-twitter icon-xs icon-dual-info">
                                  <path
                                     d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                  </path>
                               </svg>
                            </a>
                         </li>
                         <li class="list-inline-item align-middle">
                            <a href="javascript:void(0);" onclick="shareToWhatsapp()">
                               <i class="bx bxl-whatsapp icon-xs icon-dual-success" style="font-size: 26px"></i>
                            </a>
                         </li>
                         {{-- <li
                            class="list-inline-item text-muted align-middle text-uppercase fs-13 fw-medium float-end d-flex align-items-end">
                            <span class="ms-1 me-1">Like: {{ $news->likes->count() }}</span>
                            <button wire:click='likeThis()' class="border-0 bg-transparent">
                               <i class="bx {{ $news->likes->contains(auth()->user()) ? 'bxs-heart' : 'bx-heart' }}  text-danger"
                                  style="font-size: 22px"></i>
                            </button>
                         </li> --}}
                      </ul>
                   </div>
                </div>
                {{--
                <!--/.social-->
                <h4 class="mb-5">Comments (2)</h4>
                <ul class="list-unstyled mb-7">
                   <li class="d-flex mb-3">
                      <div class="me-3">
                         <img style="object-fit: cover;" src="assets/img/avatar/1.jpg" alt=""
                            class="width-5x height-5x rounded-circle">
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
                         <img style="object-fit: cover;" src="assets/img/avatar/3.jpg" alt=""
                            class="width-5x height-5x rounded-circle">
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
                      <input type="email" class="form-control" placeholder="Email Address" name="comment-email">
                   </div>
                   <div class="mb-3">
                      <textarea class="form-control" name="comment-text" rows="10" placeholder="Comment"></textarea>
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
 
    {{-- <section class="position-relative border-bottom comment-section" wire:ignore>
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
                <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments
                      powered by Disqus.</a></noscript>
 
             </div>
 
          </div>
       </div>
    </section> --}}
 
    {{-- <section class="position-relative overflow-hidden">
       <div class="container py-9 py-lg-11">
          <div class="row justify-content-center">
             <div class="mb-4">
                <h2>Postingan terkait</h2>
             </div>
             @forelse($related_post as $key => $news)
             <div class="col-12 col-md-8 col-lg-6 col-xl-5 mb-4">
                <a href="{{ route('home.show_post', ['category' => $news->category, 'post' => $news]) }}"
                   class="card-hover p-4 border d-flex flex-row hover-shadow-lg align-items-center rounded-3 hover-lift">
                   <div class="me-4 rounded-3 flex-shrink-0 overflow-hidden">
                      <img
                         src="{{ asset($news->file->first()->file_path ?? 'assets/landing/assan/assets/img/projects/'. $key+1 .'.jpg') }}"
                         alt="" class="img-fluid img-zoom h-auto width-10x">
                   </div>
                   <div class="flex-grow-1 h-100">
                      <div class="d-flex small mb-3 justify-content-between">
                         <span class="d-inline-block me-2 small text-warning">
                            {{$news->category->name}}
                         </span>
                         <span class="text-body-secondary small">{{ echoTime($news->created_at) }}</span>
                      </div>
                      <h5 class="mb-0">
                         {{ $news->title }}
                      </h5>
                   </div>
                </a>
                <!--/.card-->
             </div>
             @empty
 
             @endforelse
          </div>
       </div>
       @push('scripts')
       <script>
          Livewire.on('notAuthenticated', function(e) {
             console.log('not auth');
             return alert('Untuk memberikan like pada postingan anda harus login terlebih dahulu!');
          });
       </script>
       @endpush
    </section> --}}
 
 </div>