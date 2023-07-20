@extends('landing.world.world')
@section('parent', 'container-fluid')
@push('script')
   <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
@endpush
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
                           {{-- <div class="col-lg-6 mb-2">
                              <div class="card category-item shadow-md">
                                 <div class="card-body">
                                    @if ($jumlahPostingan < 1)
                                       <h5>{{ $category->name }}</h5>
                                    @else
                                       <a href="{{ route('home.category_view', $category) }}">
                                          <h5>{{ $category->name }}</h5>
                                       </a>
                                    @endif
                                    <p>Jumlah Postingan : {{ $jumlahPostingan < 1 ? 'Masih kosong' : $jumlahPostingan }}</p>
                                    <p>Terakhir diupdate : {{ $category->updated_at->format('M d, Y \a\t g:i a') }}</p>
                                 </div>
                              </div>
                           </div> --}}

                        @empty
                           <div class="single-blog-post d-flex align-items-center wow fadeInUpBig" data-wow-delay="0.2s">
                              <div class="post-content">
                                 <a href="#" class="headline">
                                    <h5>Belum ada kategori yang dibuat.</h5>
                                 </a>
                                 <p>Mari bergabung dan ramaikan komunitas ini! <a href="{{ route('login') }}" class="text-decoration-none">Bergabung Disini</a></p>
                              </div>
                           </div>
                        @endforelse
                     </div>
                     <div id="grid-container">
                        <img src="{{ asset('assets/img/category-item/artikel.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/foto.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/video.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/poster.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/desain.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/musik.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/audio.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/ebook.jpg') }}" alt="" class="grid-item">
                        <img src="{{ asset('assets/img/category-item/event.jpg') }}" alt="" class="grid-item">
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <script>
         // var elem = document.querySelector('#grid-container');
         // var msnry = new Masonry(elem, {
         //    // options
         //    itemSelector: 'img.grid-item',
         //    columnWidth: 200
         // });

         $('#grid-container').masonry({
            // options
            itemSelector: '.grid-item',
            columnWidth: 200
         });
      </script>

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
