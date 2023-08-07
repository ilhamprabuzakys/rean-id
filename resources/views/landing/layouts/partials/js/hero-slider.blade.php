<script>
            //Main Hero Slider
            var sliderThumbs = new Swiper('.progress-swiper-thumbs', {
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                history: false,
                breakpoints: {
                    480: {
                        slidesPerView: 2,
                        spaceBetween: 16,
                    },
                    768: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 16,
                    },
                },
                on: {
                    'afterInit': function (swiper) {
                        swiper.el.querySelectorAll('.swiper-pagination-progress-inner')
                            .forEach($progress => $progress.style.transitionDuration =
                                `${swiper.params.autoplay.delay}ms`)
                    }
                }
            });
            var swiperClassic = new Swiper(".swiper-classic", {
                slidesPerView: 1,
                spaceBetween: 0,
                loop: true,
                grabCursor: true,
                autoplay: {
                    delay: 3000,
                    disableOnInteraction: false,
                },
                effect: "creative",
                creativeEffect: {
                    prev: {
                        shadow: true,
                        translate: ["-20%", 0, -1],
                    },
                    next: {
                        translate: ["100%", 0, 0],
                    },
                },
                thumbs: {
                    swiper: sliderThumbs
                },
            });

            //swiper partners
            var swiperPartners5 = new Swiper(".swiper-partners", {
                slidesPerView: 2,
                loop: true,
                spaceBetween: 16,
                autoplay: true,
                breakpoints: {
                    768: {
                        slidesPerView: 4
                    },
                    1024: {
                        slidesPerView: 5
                    }
                },
                pagination: {
                    el: ".swiper-partners-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-partners-button-next",
                    prevEl: ".swiper-partners-button-prev"
                }
            });

            //swiper Testimonials
            var swiperTestimonails = new Swiper(".swiper-testimonials", {
                autoHeight: true,
                spaceBetween: 16,
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                        spaceBetween: 16
                    },
                    768: {
                        slidesPerView: 2,
                        spaceBetween: 16
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 30
                    }
                },
                pagination: {
                    el: ".swiper-testimonials-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-testimonials-button-next",
                    prevEl: ".swiper-testimonials-button-prev"
                }
            });

        </script>