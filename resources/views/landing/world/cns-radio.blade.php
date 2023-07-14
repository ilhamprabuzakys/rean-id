@extends('landing.world.world')
@section('parent', 'container-fluid')
@section('content')
   <div class="row justify-content-center my-3">
      <div class="col-12">
         <div class="card cns-radio shadow-lg">
            <div class="card-body">
               <div class="row">
                  <div class="col-3">
                     <img src="{{ asset('assets/img/CNS/logo-CNS-big.jpg') }}" alt="">
                  </div>
                  <div class="col-3">
                     <div class="streaming">
                        <h5>Streaming Now</h5>

                        <iframe src="https://a5.siar.us/public/cnsradio/embed?theme=light" frameborder="0" allowtransparency="true" style="width: 100%; min-height: 150px; border: 0;" class="player">
                        </iframe>
                     </div>

                     <div class="playlist">
                        <h5>Recently Playlist</h5>

                        <iframe
                           src="https://a5.siar.us/public/cnsradio/history"
                           width="100%"
                           height="150"
                           allowfullscreen=""
                           loading="lazy"
                           class="playlist"
                           referrerpolicy="no-referrer-when-downgrade"></iframe>
                     </div>
                  </div>
                  <div class="col-6">
                     <h3 class="program-siaran">Program Siaran CNS Radio</h3>
                     <img src="{{ asset('assets/img/CNS/CNS-YOUNG-VIBES_2021_a3-2.jpg') }}" alt="">
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
@section('hero')
   @include('landing.world.partials.hero.hero-basic')
@endsection
