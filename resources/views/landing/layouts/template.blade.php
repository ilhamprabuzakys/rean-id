<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="author" content="TechyDevs">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>{{ $title ?? '' }} - {{ config('app.name') }}</title>

    <!-- Google fonts -->
    <link rel="preconnect" href="{{ asset('assets/landing/disilab/fonts.gstatic.com/index.html') }}">
    <link href="{{ asset('assets/landing/disilab/fonts.googleapis.com/css2ba15.css?family=Ubuntu:wght@300;400;500;700&amp;display=swap') }}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" sizes="16x16" href="{{ asset('assets/img/rean-logo-brand.png') }}">

    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/landing/disilab/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/disilab/css/line-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/disilab/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/disilab/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/disilab/css/style.css') }}">
    <!-- end inject -->
    @stack('styles')
</head>
<body>

<!-- start cssload-loader -->
<div id="preloader">
    <div class="loader">
        <svg class="spinner" viewBox="0 0 50 50">
            <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
        </svg>
    </div>
</div>
<!-- end cssload-loader -->

<!--======================================
        START HEADER AREA
    ======================================-->
@include('landing.layouts.partials.header')
<!--======================================
        END HEADER AREA
======================================-->

<!--======================================
        START HERO AREA
======================================-->
@include('landing.layouts.partials.hero')
<!--======================================
        END HERO AREA
======================================-->

<!-- ================================
         START FUNFACT AREA
================================= -->
@include('landing.layouts.partials.funfact')
<!-- ================================
         END FUNFACT AREA
================================= -->

<!-- ================================
         START GET START AREA
================================= -->
@include('landing.layouts.partials.getstart')
<!-- ================================
         END GET START AREA
================================= -->

<!--======================================
        START CLIENT LOGO AREA
======================================-->
@include('landing.layouts.partials.clientlogo')
<!--======================================
        END CLIENT LOGO AREA
======================================-->

<!-- ================================
         START CTA AREA
================================= -->
@include('landing.layouts.partials.cta')
<!-- ================================
         END CTA AREA
================================= -->

<!-- ================================
         START CTA AREA
================================= -->
@include('landing.layouts.partials.cta2')
<!-- ================================
         END CTA AREA
================================= -->

<!-- ================================
         START INFO AREA
================================= -->
@include('landing.layouts.partials.info')
<!-- ================================
         END INFO AREA
================================= -->

<hr class="border-top-gray">

<!-- ================================
         START INFO AREA
================================= -->
@include('landing.layouts.partials.info2')
<!-- ================================
         END INFO AREA
================================= -->

<hr class="border-top-gray">

<!-- ================================
         START PACKAGE AREA
================================= -->
@include('landing.layouts.partials.package')
<!-- ================================
         END PACKAGE AREA
================================= -->

<!-- ================================
         START TESTIMONIAL AREA
================================= -->
@include('landing.layouts.partials.testimonial')
<!-- ================================
         END TESTIMONIAL AREA
================================= -->

<hr class="border-top-gray">

<!-- ================================
         START CTA AREA
================================= -->
@include('landing.layouts.partials.cta3')
<!-- ================================
         END CTA AREA
================================= -->

<hr class="border-top-gray">

<!-- ================================
         START CTA AREA
================================= -->
@include('landing.layouts.partials.cta4')
<!-- ================================
         END CTA AREA
================================= -->

<!-- ================================
         START CTA AREA
================================= -->
@include('landing.layouts.partials.cta5')
<!-- ================================
         END CTA AREA
================================= -->

<!-- ================================
         END FOOTER AREA
================================= -->
@include('landing.layouts.partials.footer')
<!-- ================================
          END FOOTER AREA
================================= -->

<!-- start back to top -->
<div id="back-to-top" data-toggle="tooltip" data-placement="top" title="Return to top">
    <i class="la la-arrow-up"></i>
</div>
<!-- end back to top -->

@include('landing.layouts.partials.modal')

<!-- template js files -->
<script src="{{ asset('assets/landing/disilab/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/landing/disilab/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/landing/disilab/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/landing/disilab/js/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('assets/landing/disilab/js/main.js') }}"></script>
@stack('scripts')
</body>

</html>