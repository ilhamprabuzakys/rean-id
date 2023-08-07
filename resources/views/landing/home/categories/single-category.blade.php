@extends('landing.layouts.template')
@include('landing.components.flatpickr')
@section('header-class', 'navbar-link-white')
@section('hero')
   <section class="text-white" style="background-image: url({{ asset('assets/img/hero-image/background-12.jpg') }});" id="category-hero-image">
      <div class="container pt-14 pb-9 pb-lg-12">
         <div class="row pt-lg-7">
            <div class="col-xl-8">
               <ol class="breadcrumb mb-3">
                  <li class="breadcrumb-item"><a href="blog-sidebar.html#">Home</a></li>
                  <li class="breadcrumb-item active">Kategori</li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
               </ol>
               <h1 class="mb-0 display-3">Daftar {{ $category->name }}</h1>
            </div>
         </div>
      </div>
   </section>
@endsection
@section('content')
   <section class="position-relative">
      <div class="container">
         <div class="row">
            <div class="col-md-9 col-lg-10">
               <div id="navinput" class="d-flex align-items-center justify-content-center mb-4 pt-4">
                  <h6 class="mb-0 me-2 me-lg-4">Pencarian</h6>
                  <span class="border-top d-block flex-grow-1"></span>
               </div>
               <div class="row">
                  <div class="col-8">
                     <input type="text" class="form-control" placeholder="Cari sesuatu...">
                  </div>
                  <div class="col-4">
                     <input type="text" data-flatpickr='{"mode":"range"}' class="form-control" placeholder="Filter berdasarkan tanggal">
                  </div>
               </div>
               <hr class="my-5">
            </div>
         </div>
      </div>
   </section>
   <section class="position-relative">
      <div class="container pb-9 pb-lg-11">
         <div class="row">
            <div class="col-lg-10 col-md-9">
               <div class="pe-lg-4 pe-md-2">
                  @forelse ($posts as $post)
                     <article class="card align-items-stretch flex-md-row mb-4 mb-md-7 border-0 no-gutters"
                        data-aos="fade-up">
                        <div class="col-lg-5">
                           <a href="blog-sidebar.html#!"
                              class="d-block rounded-3 overflow-hidden hover-shadow-lg hover-lift">
                              @if ($post->file_path !== null && in_array(pathinfo($post->file_path, PATHINFO_EXTENSION), ['jpeg', 'jpg', 'png']))
                                 <img src="{{ asset('storage/' . $post->file_path) }}" alt="{{ $post->title }}" class="img-fluid rounded-3">
                              @else
                                 <img src="{{ asset('assets/landing/assan/assets/img/960x900/' . rand(1, 5) . '.jpg') }}" alt="{{ $post->title }}" class="img-fluid rounded-3">
                              @endif
                           </a>
                        </div>
                        <div class="card-body d-flex flex-column col-auto p-md-0 ps-md-4">
                           <div class="d-flex mb-0 justify-content-between">
                              <span class="d-inline-flex align-items-center small">
                                 <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                       d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                    </path>
                                    <path fill-rule="evenodd"
                                       d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                    </path>
                                 </svg>
                                 <span class="text-body-secondary">{{ echoTime($post->created_at) }}</span>
                              </span>
                              <a href="#" class="badge bg-soft-primary">{{ $category->name }}</a>
                           </div>
                           <h4 class="mb-3 mt-3">
                              <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="flex-grow-1 d-block">
                                 {{ $post->title }}
                              </a>
                           </h4>
                           <p class="mb-4 text-muted flex-grow-1 d-none d-lg-block">
                              {{ Str::limit(strip_tags($post->body), 120) }} <a href="{{ route('home.show_post', ['category' => $post->category, 'post' => $post]) }}" class="text-primary"> baca
                                 selengkapnya</a>
                           </p>
                           <div class="mt-auto mb-1">
                              <div class="d-flex">
                                 @if ($post->user->avatar == null)
                                    <img class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset('assets/img/avatar/avatar-' . rand(1, 5) . '.png') }}" alt="" height="36">
                                 @else
                                    <img class="me-3 avatar d-flex align-self-center sm rounded-circle" src="{{ asset($post->user->avatar) }}" alt="" height="36">
                                 @endif
                                 <div class="flex-grow-1">
                                    <span class="m-0 fs-13"><a href="#">{{ $post->user->name }}</a></span>
                                    <p class="text-muted mb-0 small">{{ $post->created_at->format('d M, Y') }} · {{ rand(1, 5) }} min read</p>
                                 </div>
                              </div>
                           </div>
                           {{-- <div class="d-flex mb-0 small align-items-center">
                           @if ($post->user->avatar == null)
                           <img src="{{ asset('assets/img/avatar/avatar-1.png') }}" alt=""
                                 class="avatar sm me-2 rounded-circle">
                           @else
                           <img src="{{ asset($post->user->avatar) }}" alt=""
                                 class="avatar sm me-2 rounded-circle">
                           @endif
                           <span class="text-body-secondary d-inline-block">By <a
                                    href="blog-sidebar.html#!">{{ $post->user->name }}</a></span>
                        </div> --}}
                        </div>
                        <!--/.card-body-->
                     </article>
                  @empty

                     <article
                        class="card px-4 px-md-5 px-lg-8 py-lg-5 card-body rounded-5 overflow-hidden bg-dark text-white flex-md-row mb-7 border-0"
                        data-aos="fade-up">
                        <img src="{{ asset('assets/landing/assan/assets/img/1200x600/1.jpg') }}" alt="" class="bg-image opacity-25 rounded-3">
                        <div class="d-flex flex-column">
                           <div class="d-flex mb-0 justify-content-between small mb-4">
                              <span class="d-inline-flex align-items-center">
                                 <svg class="bx bx-clock me-2 text-body-secondary" width="1em"
                                    height="1em" viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                       d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm8-7A8 8 0 1 1 0 8a8 8 0 0 1 16 0z">
                                    </path>
                                    <path fill-rule="evenodd"
                                       d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z">
                                    </path>
                                 </svg>
                                 <span>Sekarang</span>
                              </span>
                              <a href="blog-sidebar.html#!">
                                 Pemberitahuan
                              </a>
                           </div>
                           <div class="d-flex flex-column justify-content-between">
                              <h3 class="h2 mb-4 flex-grow-1">
                                 <a href="blog-sidebar.html#!" class="text-white line-height-base d-block">
                                    Postingan {{ $category->name }} masih kosong...
                                 </a>
                              </h3>
                              <div class="d-flex mb-0 small align-items-center">
                                 {{-- <img src="assets/img/avatar/10.jpg" alt=""
                                  class="avatar sm rounded-circle me-2">
                              <span class="text-body-secondary d-inline-block">By <a href="blog-sidebar.html#!">Drew
                                      Carey</a></span> --}}
                                 <a href="{{ route('login') }}" class="badge badge-soft-primary">
                                    <span>Bergabung dan ramaikan forum ini.</span>
                                 </a>
                              </div>
                           </div>
                        </div>
                        <!--/.card-body-->
                     </article>
                  @endforelse
               </div>

               <div class="row pt-5 justify-content-end">
                  <div class="col-auto">
                     <nav class="mb-0" aria-label="Page navigation example">
                        <ul class="pagination mb-0">
                           <li class="page-item disabled">
                              <a class="page-link" href="blog-sidebar.html#" aria-label="Previous">
                                 <svg class="bx bx-chevron-left" width="1em" height="1em"
                                    viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                       d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z">
                                    </path>
                                 </svg>
                              </a>
                           </li>
                           <li class="page-item active"><a class="page-link" href="blog-sidebar.html#">1</a></li>
                           <li class="page-item"><a class="page-link" href="blog-sidebar.html#">2</a></li>
                           <li class="page-item"><a class="page-link" href="blog-sidebar.html#">3</a></li>
                           <li class="page-item">
                              <a class="page-link" href="blog-sidebar.html#" aria-label="Next">
                                 <svg class="bx bx-chevron-right" width="1em" height="1em"
                                    viewBox="0 0 16 16" fill="currentColor"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                       d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z">
                                    </path>
                                 </svg>
                              </a>
                           </li>
                        </ul>
                     </nav>
                  </div>
               </div>
               <!--/.Pagination-row-->
            </div>
         </div>
         <!--/.blog-row-->
      </div>
   </section>
@endsection
