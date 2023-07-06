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

   @include('landing.world.partials.css')
   @stack('head')
</head>

<body>

   <div id="preloader">
      <div class="preload-content">
         <div id="world-load"></div>
      </div>
   </div>


   @include('landing.world.partials.header')

   @yield('hero')

   <div class="main-content-wrapper py-3">
      <div class="container">
         @yield('content')
      </div>
   </div>

   @include('landing.world.partials.footer')


   @include('landing.world.partials.script')
   @stack('script')
</body>

</html>
