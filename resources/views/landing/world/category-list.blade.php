@extends('landing.world.world')
@section('parent', 'container-fluid')
@section('content')
   <div class="row justify-content-center">
      <div class="col-12 col-lg-8">
         <div class="post-content-area mb-100">
           
            <div class="world-latest-articles">
               <div class="row">
                  <div class="col-12 col-lg-12">
                     <div class="title-categories">
                        <div class="row d-flex justify-content-between">
                           <div class="col-8">
                              <h5>Daftar Kategori</h5>
                           </div>
                           <div class="col-4 d-flex justify-content-end align-items-end">
                              <h6>Jumlah : {{ $categories->count() }}</h6>
                           </div>
                        </div>
                     </div>
            
                     <div class="row">
                     @forelse ($categories as $category)
                     @php
                        $jumlahPostingan = $category->posts->count();
                     @endphp
                     <div class="col-lg-6 mb-2">
                        <div class="card category-item shadow-md">
                           <div class="card-body">
                              @if ($jumlahPostingan < 1)
                              <h5>{{ $category->name }}</h5>
                              @else
                              <a href="{{ route('home.category_view', $category) }}"><h5>{{ $category->name }}</h5></a>
                              @endif
                              <p>Jumlah Postingan : {{ ($jumlahPostingan < 1) ? 'Masih kosong' : $jumlahPostingan }}</p>
                              <p>Terakhir diupdate : {{ $category->updated_at->format('M d, Y \a\t g:i a') }}</p>
                           </div>
                        </div>
                     </div>
                     @empty
                     <div class="single-blog-post d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                        <div class="post-content">
                           <a href="#" class="headline">
                              <h5>Belum ada kategori yang dibuat.</h5>
                           </a>
                           <p>Mari bergabung dan ramaikan komunitas ini! <a href="{{ route('login') }}" class="text-decoration-none">Bergabung Disini</a></p>
            
                           {{-- <div class="post-meta">
                              <p><a href="#" class="post-author">Katy Liu</a> on <a href="#" class="post-date">Sep 29, 2017 at 9:48 am</a></p>
                           </div> --}}
                        </div>
                     </div>
                     @endforelse
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="col-12 col-md-8 col-lg-4">
         <div class="post-sidebar-area">
            @include('landing.world.partials.content.chatango')
            @include('landing.world.partials.content.topartikel')
            @include('landing.world.partials.content.stayconnected')
            @include('landing.world.partials.content.popularvideo')
         </div>
      </div>
   </div>
@endsection
@section('hero')
   @include('landing.world.partials.hero.hero-category-list')
@endsection
