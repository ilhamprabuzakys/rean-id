@extends('landing.layouts.template')
@section('header-class', 'navbar-link-white')
@push('particle')
<div class="position-fixed start-0 top-0 bottom-0 end-0 z-fixed pe-none w-100 h-100 start-0 top-0" id="particles-js">
</div>
@endpush
@section('content')
@include('landing.components.sidebar')
<!--begin:Partners section-->
{{-- @include('landing.layouts.partials.partners') --}}
<!--/end:Partners section-->

<!--begin: Highlighted Content section-->
@include('landing.layouts.partials.highlighted-content')
<!--/end: Highlighted Content section-->

<!--begin: Event section-->
@include('landing.layouts.partials.event')
<!--/end: Event section-->

<!--begin:About section-->
@include('landing.layouts.partials.about')
<!--end/:About section-->

<!--begin: quote parallax section-->
{{-- @include('landing.layouts.partials.quote') --}}
<!--/end: quote parallax section-->

<!--begin: feature image section-->
{{-- @include('landing.layouts.partials.feature-image') --}}
<!--/end: feature image section-->

<!--begin: Process section-->
@include('landing.layouts.partials.process')
<!--/end: Process section-->

<!--begin:Blog section-->
@include('landing.layouts.partials.blog')
<!--/end:Blog section-->

<!--begin: Newsletter section-->
@include('landing.layouts.partials.contact')
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
@push('scripts')
<script>
    //Classic
      var swiperClassic = new Swiper(".swiper-classic", {
         effect: "fade",
         slidesPerView: 1,
         spaceBetween: 0,
         loop: true,
         autoplay: {
            delay: 2500
         },
         pagination: {
            el: ".swiperClassic-pagination",
            clickable: true
         },
         navigation: {
            nextEl: ".swiperClassic-button-next",
            prevEl: ".swiperClassic-button-prev"
         }
      });
</script>
<script>
    Splitting();
      //Splitting text

      //Swiper Slider
      var swiper3 = new Swiper(".event-saat-ini", {
         autoHeight: true,
         spaceBetween: 16,
         slidesPerView: 1,
         spaceBetween: 16,
         pagination: {
            el: ".swiper3-pagination",
            clickable: true
         },
         navigation: {
            nextEl: ".swiper3-button-next",
            prevEl: ".swiper3-button-prev"
         }
      });

      //swiper-testimonials
      var swiperAuto = new Swiper(".swiper-testimonials", {
        effect: "fade",
        autoHeight: true,
        spaceBetween: 16,
        slidesPerView: 1,
        grabCursor: false,
        pagination: {
          el: ".swiperAuto-pagination",
          clickable: true,
        },
        navigation: {
          nextEl: ".swiperAuto-button-next",
          prevEl: ".swiperAuto-button-prev",
        }
      });

       //Swiper Slider
       var swiper5 = new Swiper(".data-master", {
         autoHeight: true,
         spaceBetween: 16,
         breakpoints: {
            640: {
               slidesPerView: 2,
               spaceBetween: 16
            },
            768: {
               slidesPerView: 3,
               spaceBetween: 16
            },
            1024: {
               slidesPerView: 4,
               spaceBetween: 20
            }
         },
         pagination: {
            el: ".swiper-master-pagination",
            clickable: true
         },
         navigation: {
            nextEl: ".swiper-master-button-next",
            prevEl: ".swiper-master-button-prev"
         }
      });
</script>

@endpush
@section('hero')
@include('landing.layouts.partials.hero-agency')
@endsection