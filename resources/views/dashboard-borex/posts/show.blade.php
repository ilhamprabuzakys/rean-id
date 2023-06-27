@extends('dashboard-borex.layouts.app')
@push('scripts')
   <!-- swiper js -->
   <script src="{{ asset('assets/borex/libs/swiper/swiper-bundle.min.js') }}"></script>
   <!-- nouisliderribute js -->
   <script src="{{ asset('assets/borex/libs/nouislider/nouislider.min.js') }}"></script>
   <script src="{{ asset('assets/borex/libs/wnumb/wNumb.min.js') }}"></script>
@endpush
@push('style')
   <!-- swiper css -->
   <link rel="stylesheet" href="{{ asset('assets/borex/libs/swiper/swiper-bundle.min.css') }}">
   <!-- nouisliderribute css -->
   <link rel="stylesheet" href="{{ asset('assets/borex/libs/nouislider/nouislider.min.css') }}">
@endpush
@section('content')
   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            <div class="card-body p-0">
               <div class="swiper-container slider rounded">
                  <div class="swiper-wrapper" dir="ltr">
                     <div class="swiper-slide p-4 rounded overflow-hidden ecommerce-slied-bg" style="background-image: url({{ asset('assets/borex/images/auth-bg.jpg') }});">
                        <div class="bg-overlay bg-dark"></div>
                        <div class="row justify-content-center">
                           <div class="col-xl-7 col-lg-11">
                              <div class="row align-items-center">
                                 <div class="col-md-7">
                                    <h3 class="mb-2 text-truncate text-white"><a href="#" class="text-white">{{ $post->title }} </a></h3>
                                    {{-- <ul class="list-unstyled px-0 mb-0 mt-4">
                                               <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Ceramic Shield front, matt glass back and stainless steel design</p></li>
                                               <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Water resistant to a depth of 6 metres for up to 30 minutes (IP68)</p></li>
                                               <li><p class="text-white-50 mb-0 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Pro 12MP camera system (Telephoto, Wide and Ultra Wide)</p></li>
                                           </ul> --}}
                                    <h2 class="mb-0 mt-4 text-white"><span class="font-size-20">Sebuah </span><b> {{ $post->category->name }}</b></h2>
                                    <div class="mt-4">
                                       @forelse ($post->tags as $tag)
                                          <span class="badge rounded-pill bg-soft-primary w-md p-2 font-size-16 text-decoration-none">{{ $tag->name }}</span>
                                       @empty
                                          <a class="btn btn-primary w-md waves-effect waves-light">Belum memiliki tag</a>
                                       @endforelse
                                       {{-- <a class="btn btn-success w-lg waves-effect waves-light">Buy Now</a> --}}
                                    </div>
                                 </div>
                                 <div class="col-md-5">
                                    <div class="p-4">
                                       <img src="{{ asset('storage/' . $post->file_path) }}" class="img-fluid" alt="image-posts">
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     {{-- 
                       <div class="swiper-slide p-4 rounded overflow-hidden ecommerce-slied-bg" style="background-image: url({{ asset('assets/borex/images/auth-bg-1.jpg') }});">
                           <div class="bg-overlay bg-dark"></div>
                           <div class="row justify-content-center">
                               <div class="col-xl-7 col-lg-11">
                                  <div class="row align-items-center">
                                   <div class="col-md-5">
                                       <div class="p-4">
                                        <img src="{{ asset('assets/borex/images/product/img-2.png') }}" class="img-fluid" alt="">
                                       </div>
                                    </div>

                                    <div class="col-md-6 offset-md-1">
                                       <h3 class="mb-2 text-truncate text-white"><a href="ecommerce-product-detail.html" class="text-white">New Iphone 11 Pro +128GB </a></h3>
                                       <h5 class="text-white-50 font-size-16 mt-1">Heavy On Features, Light on Price.</h5>
                                       <ul class="list-unstyled px-0 mb-0 mt-4">
                                           <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Battery life: Up to 22 hours of video playback</p></li>
                                           <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> 13.7 cm (5.4-inch) Super Retina HDR and True Tone</p></li>
                                           </ul>
                                       <h2 class="mb-0 mt-4 text-white"><span class="font-size-20">Form</span><b> $2,360</b> <span class="text-white-50 me-2"><del class="font-size-20 fw-normal">$3500</del></span></h2>
                                       <div class="mt-4">
                                           <button type="button" class="btn btn-success w-lg waves-effect waves-light">Buy Now</button>
                                       </div>
                                   </div>
                                  </div>
                               </div>
                          </div>
                       </div>

                       <div class="swiper-slide p-4 rounded overflow-hidden ecommerce-slied-bg" style="background-image: url({{ asset('assets/borex/images/auth-bg-2.jpg') }});">
                           <div class="bg-overlay bg-dark"></div>
                           <div class="row justify-content-center">

                               <div class="col-xl-7 col-lg-11">
                                  <div class="row align-items-center">
                                       <div class="col-md-7">
                                           <h3 class="mb-2 text-truncate text-white"><a href="ecommerce-product-detail.html" class="text-white">New Iphone 13 Max Pro +256GB </a></h3>
                                           <h5 class="text-white font-size-16 mt-1">Heavy On Features, Light on Price.</h5>
                                           <ul class="list-unstyled px-0 mb-0 mt-4">
                                               <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Ceramic Shield front, matt glass back and stainless steel design</p></li>
                                               <li><p class="text-white-50 mb-1 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Water resistant to a depth of 6 metres for up to 30 minutes (IP68)</p></li>
                                               <li><p class="text-white-50 mb-0 text-truncate"><i class="mdi mdi-circle-medium align-middle text-white me-1"></i> Pro 12MP camera system (Telephoto, Wide and Ultra Wide)</p></li>
                                           </ul>
                                           <h2 class="mb-0 mt-4 text-white"><span class="font-size-20">Form</span><b> $7,999</b> <span class="text-white-50 me-2"><del class="font-size-20 fw-normal">$9,999</del></span></h2>
                                           <div class="mt-4">
                                               <button type="button" class="btn btn-success w-lg waves-effect waves-light">Buy Now</button>
                                           </div>
                                       </div>
                                       <div class="col-md-5">
                                          <div class="p-4">
                                           <img src="{{ asset('assets/borex/images/product/img-3.png') }}" class="img-fluid" alt="">
                                          </div>
                                       </div>
                                  </div>
                               </div>
                          </div>
                       </div> --}}
                  </div>

                  {{-- <div class="swiper-button-next"></div>
                   <div class="swiper-button-prev"></div> --}}
               </div>


            </div>
         </div>
      </div>
   </div>

   <div class="row">
      <div class="col-lg-12">
         <div class="card">
            {{-- <div class="card-header">
               <h4 class="card-title">Top Product</h4>
           </div> --}}
            <div class="card-body">
               <div class="row mb-4 justify-content-between">
                  <div class="col-lg-7">
                     <h3 class="text-capitalize">{{ $post->title }}</h3>
                  </div>
                  <div class="col-lg-5">
                     <div class="d-flex justify-content-end">
                        {{-- <a class="badge badge-soft-success rounded-circle">
                           <i class="bx bx-badge-check" style="font-size: 25px"></i>
                        </a> --}}
                        {{-- <button type="submit" class="bg-transparent border-0">
                           <span class="badge rounded-pill bg-approval w-md p-2 font-size-16 text-decoration-none">
                              Approve?
                              <i class="bx bx-check-circle"></i>
                           </span>
                        </button> --}}
                        <a href="{{ route('posts.index') }}">
                           <span class="badge rounded-pill bg-primary w-md p-2 font-size-16 text-decoration-none">Kembali <i class="bx bx-share ms-2"></i></span>
                        </a>
                     </div>
                  </div>
                  <div class="row my-2 justify-content-start">
                     <div>
                        <img src="{{ asset('storage/' . $post->file_path) }}" alt="image-postingan" class="img-fluid post-image-size">
                     </div>
                  </div>
                  <div class="row ms-1">
                     @forelse ($post->tags as $tag)
                        <div class="col-lg-1 me-3">
                           <span class="badge rounded-pill bg-primary w-md p-1 font-size-16 text-decoration-none">{{ $tag->name }}</span>
                        </div>

                     @empty
                        ''
                     @endforelse
                  </div>
                  <div class="row my-3">
                     {!! $post->body !!}
                  </div>
               </div>



            </div>
         </div>
         <!-- end row -->


      </div>
   </div>
@endsection
