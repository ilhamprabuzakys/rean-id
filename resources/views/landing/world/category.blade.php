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
                              <h5>{{ $title }}</h5>
                           </div>
                           <div class="col-4 d-flex justify-content-end align-items-end">
                              <h6>Jumlah : {{ $posts->count() }}</h6>
                           </div>
                        </div>
                     </div>
            
                     <div class="row">
                     @forelse ($posts as $post)
                        @if ($loop->iteration > 5) @break @endif
                        <div class="col-lg-12 mb-2">
                           <div class="card category-item shadow-md">
                              <div class="card-body">
                                 <a href="{{ route('home.show_post', $post) }}"><h5>{{ $post->title }}</h5></a>
                                 <p> {!! Str::limit(strip_tags($post->body), 25) !!}</p>
                                 <p>Tags : 
                                    @forelse ($post->tags as $tag)
                                    @if ($loop->iteration > 6)
                                       @break
                                    @endif
                                       #{{ $tag->name . ' '}}
                                    @empty
                                       ''
                                    @endforelse
                                 </p>
                                 <p>Terakhir diupdate : {{ $post->updated_at->format('M d, Y \a\t g:i a') }}</p>
                              </div>
                           </div>
                        </div>
                     @empty
                     <div class="col-lg-12 mb-2">
                        <div class="card category-item shadow-md">
                           <div class="card-body">
                              <h5>Belum ada post yang dibuat.</h5>
                              <p>Mari bergabung dan ramaikan komunitas ini! <a href="{{ route('login') }}" class="text-decoration-none text-primary">Bergabung Disini</a></p>
                           </div>
                        </div>
                     </div>
                     @endforelse
                     @if ($posts->count() > 5)
                           <div class="col-12 d-flex align-items-center justify-content-center">
                              <div class="load-more-btn mt-50 text-center">
                                 <a href="#" class="btn world-btn">Load More</a>
                              </div>
                           </div>
                     @endif
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
   @include('landing.world.partials.hero.hero-category-detail')
@endsection
