(function ($) {
    "use strict";

    /*----- ELEMENTOR LOAD FUNCTION CALL ---*/

    $(window).on("elementor/frontend/init", function () {

        var santoiDataBackground = function () {
            $('[data-background]').each(function () {
                $(this).css('background-image', 'url(' + $(this).attr('data-background') + ')');
            });
        };


        // Testimonial slider
        var SantoiTestimonial = function () {

            var testimonialSliderHomeThree = new Swiper(".st3-testimonial-slider-init", {
                loop: true,
                loopedSlides: 6,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                }
            });

            var testimonialSliderHomeTwo = new Swiper(".st2-customer-carousel", {
                direction: "vertical",
                slidesPerView: 3,
                spaceBetween: 40,
                mousewheel: true,
                breakpoints: {
                    320: {
                        slidesPerView: 1,
                        spaceBetween: 20,
                    },
                    640: {
                        slidesPerView: 2,
                        spaceBetween: 20,
                    },
                    1024: {
                        slidesPerView: 3,
                        spaceBetween: 40,
                    },
                },
            });


            // el hero section slider
            if ($('.st1-testimonial-slider').length){
                var st1_testimonial_slider = new Swiper('.st1-testimonial-slider', {
                    slidesPerView: 1,
                    centeredSlides: true,
                    loop: true,
                    loopedSlides: 6,

                });


                var st1_testimonial_thumbs = new Swiper('.st1-testimonial-thumbs', {
                    slidesPerView: 3,
                    spaceBetween: 30,
                    centeredSlides: false,
                    loop: true,
                    slideToClickedSlide: true,
                    pagination: {
                        el: ".snp-pagination",
                        clickable: true,
                        dot: false,

                        /*Return bullets as numbers*/
                        renderBullet: function (index, className) {
                            return '<span class="' + className + '">' + (index + 1) + "</span>";
                        },

                    },

                });

                st1_testimonial_slider.controller.control = st1_testimonial_thumbs;
                st1_testimonial_thumbs.controller.control = st1_testimonial_slider;
            }








        }


        // Text slider
        var SantoiTextSlider = function () {
            // Text Slider

            let SwiperTop = new Swiper('.santoi_text_slider', {
                spaceBetween: 0,
                centeredSlides: true,
                speed: 6000,
                autoplay: {
                    delay: 1,
                },
                loop: true,
                slidesPerView: 'auto',
                allowTouchMove: false,
                disableOnInteraction: true
            });

        }


        // hero slider
        var santoiHeroSlider = function () {
            // el hero section slider
            $(".el-hero-section-slider").slick({
                slidesToShow: 1,
                autoplay: false,
                speed: 2000,
                arrows: false,
                pauseOnHover: false,
                fade: true,
                dots: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            dots: false,
                        },
                    }
                ],
            });
        }

        var santoiCatSlidethree = function () {
            // home 3 category box
            $(".el-home-3-fea-slider").slick({
                slidesToShow: 3,
                autoplay: false,
                arrows: true,
                centerPadding: '50px',
                prevArrow: '<button class="prev-btn slider-btn"><i class="fa-solid fa-arrow-left" ></i ></button>',
                nextArrow: '<button class="next-btn slider-btn"><i class="fa-solid fa-arrow-right" ></i ></button>',
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        },
                    }
                ],
            });

        }

        // Brand Slider
        var santoiBrandSlider = function () {
            $(".hm2-brand-slider").slick({
                slidesToShow: 5,
                autoplay: true,
                arrows: false,
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 400,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            $(".hm3-brand-slider").slick({
                slidesToShow: 6,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 5000,
                cssEase: 'linear',
                responsive: [
                    {
                        breakpoint: 1400,
                        setttings: {
                            slidesToShow: 5,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        //gallery slider
        var santoiGallerySlider = function () {
            $(".hm2-gallery-slide-1").slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 6000,
                pauseOnHover: true,
                cssEase: 'linear',
                loop: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });

            $(".hm2-gallery-slide-2").slick({
                slidesToShow: 5,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 0,
                speed: 6000,
                pauseOnHover: true,
                cssEase: 'linear',
                loop: true,
                rtl: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 500,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
        }

        var santoiBlogSlider = function () {
            $(".hm3-blog-slider").slick({
                slidesToShow: 3,
                autoplay: true,
                speed: 600,
                prevArrow: '<button class="prev-arrow"><i class="me-3 fas fa-arrow-left"></i>Prev</button>',
                nextArrow: '<button class="next-arrow">Next<i class="ms-3 fas fa-arrow-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 670,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        var santoiProductSlider = function () {
            $(".vr5-collection-slider").slick({
                slidesToShow: 4,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1400,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });

            $(".cmd-slider").slick({
                slidesToShow: 1,
                arrows: false,
                dots: true,
            });

            //arival slider
            $(".arrival-slider").slick({
                slidesToShow: 4,
                autoplay: true,
                loop: true,
                prevArrow: '<button class="prev-arrow"><i class="fas fa-arrow-left"></i>Prev</button>',
                nextArrow: '<button class="next-arrow">Next<i class="fas fa-arrow-right"></i></button>',
                responsive: [
                    {
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3,
                        }
                    },
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 575,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        // Santoi Marquee
        var santoiMarque = function () {
            $('.santoi-marquee-wrapper').marquee({
                speed: 50,
                gap: 0,
                delayBeforeStart: 0,
                direction: 'left',
                duplicated: true,
                pauseOnHover: false,
                startVisible: true,
            });
        }

        var santoiProductslide = function () {
            $(".vr5-filter-slider").slick({
                slidesToShow: 3,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1100,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }
        var santoiProductfeedback = function () {
            //sidebar-customer-feedback-slider
            $(".sidebar-customer-feedback-slider").slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: true,
                speed: 1000,
                arrows: false,
                dots: true,
            });
        }
        var santoiimageslider = function () {
            // slick carousel
            $('.slider-info-slider').slick({
                dots: false,
                arrows: false,
                slidesToShow: 5,
                slidesToScroll: 3,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1,
                        }
                    }
                ]
            });
        }

        var santoitimelineslider = function () {
            $('.slidersa').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: false,
                asNavFor: '.slider-nav-thumbnails',
            });

            $('.slider-nav-thumbnails').slick({
                slidesToShow: 4,
                slidesToScroll: 1,
                asNavFor: '.slidersa',
                dots: false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 900,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 4,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            arrows: false,
                            centerMode: true,
                            centerPadding: '40px',
                            slidesToShow: 1,
                        }
                    }
                ]
            });

            // Remove active class from all thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

            // Set active class to first thumbnail slides
            $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

            // On before slide change match active thumbnail to current slide
            $('.slidersa').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
                var mySlideNumber = nextSlide;
                $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
                $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
            });
        }


        //Portfolio Carousel
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_testimonial.default", function ($scope, $) {
            SantoiTestimonial()
        });


        //Text Slider
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_text_slider.default", function ($scope, $) {
            SantoiTextSlider()
        });


        //Team Carousel
        elementorFrontend.hooks.addAction("frontend/element_ready/global", function ($scope, $) {
            santoiDataBackground()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi-hero-section.default", function ($scope, $) {
            santoiHeroSlider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_marquee.default", function ($scope, $) {
            santoiMarque()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_brand_logo.default", function ($scope, $) {
            santoiBrandSlider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_gallery.default", function ($scope, $) {
            santoiGallerySlider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_blog.default", function ($scope, $) {
            santoiBlogSlider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_product_slider.default", function ($scope, $) {
            santoiProductSlider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/Santoi_product_tabs.default", function ($scope, $) {
            santoiProductslide()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi-category-section.default", function ($scope, $) {
            santoiCatSlidethree()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi-feedback-section.default", function ($scope, $) {
            santoiProductfeedback()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_timeline.default", function ($scope, $) {
            santoitimelineslider()
        });
        elementorFrontend.hooks.addAction("frontend/element_ready/santoi_image_slider.default", function ($scope, $) {
            santoiimageslider()
        });
    });

    $(".st2-awards-info:first-child").css("margin-top", "80px");
    $(".st2-awards-info:last-child").css("margin-top", "-80px");
    // $(".st2-awards-info:first-child").css("background", "red;");

})(jQuery);