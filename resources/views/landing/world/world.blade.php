<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="description" content="">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   @if ($title == '')
      <title>REAN.ID - Anti Narkoba Cegah Narkoba</title>
   @else
      <title>{{ $title }} | REAN.ID - Anti Narkoba Cegah Narkoba</title>
   @endif

   <link rel="icon" href="{{ asset('assets/img/rean-berwarna-logo-saja2.png') }}">
   <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
   @include('landing.world.partials.css')
   @stack('head')
</head>

<body>
   @php
      $company = cache()->remember('company', 60*60*7, function() {
         return \App\Models\Company::with('social_media')->first();
      })
   @endphp
   <div id="preloader">
      <div class="preload-content">
         <div id="world-load"></div>
      </div>
   </div>


   @include('landing.world.partials.header')

   @yield('hero')

   <div class="main-content-wrapper pt-5 pb-3">
      <div class="@yield('parent')">
         @yield('content')
      </div>
   </div>

   @include('landing.world.partials.footer')

   <a id="whatsapp-icon-main" href="https://wa.me/625280800064?text=Hi,%20saya%20ingin%20bergabung%20dengan%20anda!%20Senang%20bertemu%20dengan%20anda!"><i class="fa fa-whatsapp" aria-hidden="true"></i></a>
   <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
   @include('landing.world.partials.script')
   @stack('script')
</body>

</html>
