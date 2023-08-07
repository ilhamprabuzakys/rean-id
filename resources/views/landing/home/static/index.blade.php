@extends('landing.layouts.template')
@push('particle')
   <!--Particles-js-->
   <div class="position-fixed start-0 top-0 bottom-0 end-0 z-fixed pe-none w-100 h-100 start-0 top-0"
   id="particles-js"></div>
@endpush
@section('hero')
   @include('landing.layouts.partials.hero-agency')
@endsection
@section('content')
   <!--begin:Partners section-->
   @include('landing.layouts.partials.partners')
   <!--/end:Partners section-->

   <!--begin:About section-->
   @include('landing.layouts.partials.about')
   <!--end/:About section-->

   <!--begin: Services section-->
  @include('landing.layouts.partials.services')
   <!--/end: Services section-->

   <!--begin: quote parallax section-->
   @include('landing.layouts.partials.quote')
   <!--/end: quote parallax section-->

   <!--begin: Testimonials section-->
   @include('landing.layouts.partials.testimonials')
   <!--/end: Testimonials section-->

   <!--begin: feature image section-->
   @include('landing.layouts.partials.feature-image')
   <!--/end: feature image section-->

   <!--begin: Process section-->
   @include('landing.layouts.partials.process')
   <!--/end: Process section-->

   <!--begin:Blog section-->
   @include('landing.layouts.partials.blog')
   <!--/end:Blog section-->

   <!--begin: Newsletter section-->
   @include('landing.layouts.partials.news-latter')
   <!--/end: Newsletter section-->
@endsection
@push('scripts')
@include('landing.layouts.partials.js.hero-slider')
<!--/end:Swiper slider-->
<!--Particles script-->
<script src="{{ asset('assets/landing/assan/assets/vendor/node_modules/js/particles.js') }}"></script>
<script>
    particlesJS("particles-js", {
        "particles": {
            "number": {
                "value": 16,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "color": {
                "value": "#fff"
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#fff"
                },
                "polygon": {
                    "nb_sides": 5
                },
            },
            "opacity": {
                "value": 0.6,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": true
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": true,
                    "speed": 60,
                    "size_min": 0.25,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false,
            },
            "move": {
                "enable": true,
                "speed": 4,
                "direction": "none",
                "random": true,
                "straight": false,
                "out_mode": "out",
                "bounce": true,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": false,
                    "mode": "grab"
                },
                "onclick": {
                    "enable": false,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 140,
                    "line_linked": {
                        "opacity": 0
                    }
                },
                "bubble": {
                    "distance": 200,
                    "size": 60,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 8
                },
                "repulse": {
                    "distance": 300,
                    "duration": 0.9
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });

</script>
@endpush