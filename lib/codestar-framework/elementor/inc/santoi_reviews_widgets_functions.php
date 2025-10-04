<?php
// Reviews function


function display_rating_star($rating)
{
    for ($i = 0; $i < $rating; $i++) {
        $rst = '<i class="fa-solid fa-star ratings-icon"></i>';
        echo $rst;
    }
}

if (!function_exists('santoi_client_reviews_one')) {
    function santoi_client_reviews_one($rev_list)
    { ?>

        <div class="santoi-reviews-one santoi-review-common-class">


            <div class="santoi_swiper_nav_style_one">
                <div class="santoi-button-prev"><i class="isax icon-spcial-arrow-left"></i></div>
                <div class="santoi-button-next"><i class="isax icon-spcial-arrow-right"></i></div>

            </div>
            <div class="swiper reviews-one swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review">
                            <div class="slider-one-content-rev">
                                <h4><?php echo $rev_item['rev_title']; ?></h4>
                                <p><?php echo $rev_item['rev_description']; ?></p>
                                <div class="reviewer-info-one">
                                    <div class="rev-img float-start">
                                        <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                    </div>
                                    <div class="rev-nem float-start">
                                        <h5><?php echo $rev_item['rev_name']; ?></h5>
                                        <p><?php echo $rev_item['rev_desig']; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>




        </div>


    <?php }
}

if (!function_exists('santoi_client_reviews_two')) {
    function santoi_client_reviews_two($rev_list)
    { ?>


        <div class="santoi-reviews-two santoi-review-common-class">
            <div class="swiper reviews-two">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review">
                            <div class="review-star-wraper">
                                <div class="before-rating">
                                    <?php display_rating_star(5); ?>
                                </div>

                                <div class="after-rating">
                                    <?php display_rating_star($rev_item['rating']); ?>
                                </div>
                            </div>
                            <p><?php echo $rev_item['rev_description']; ?></p>
                            <div class="reviewer-info">
                                <div class="rev-img">
                                    <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                </div>
                                <div class="rev-nem">
                                    <h5><?php echo $rev_item['rev_name']; ?></h5>
                                    <p><?php echo $rev_item['rev_desig']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>

            <div class="swiper-button-next"><i class="iconly-Arrow-Right icli"></i></div>
            <div class="swiper-button-prev"><i class="iconly-Arrow-Left icli"></i></div>


        </div>


    <?php }
}


if (!function_exists('santoi_client_reviews_three')) {
    function santoi_client_reviews_three($rev_list)
    { ?>
        <div class="clearfix"></div>
        <div class="santoi-clreviews-three santoi-review-common-class">

            <div class="slide-bg-three-inner">
                <div class="saaplate--marquee__rev__container_alt santoi-marquee-stl3" id="santoi-marquee-stl3">

                    <?php
                    $countl = 0;
                    $classl = '';
                    foreach ($rev_list as $rev_item) {
                        $countl++;
                        if ($countl == 1) {
                            $classl = 'active';
                        }else{
                            $classl = '';
                        }
                        ?>
                        <div class="marquee--item <?php echo esc_html($classl);?> patinets-single-review patinets-single-review-st03">
                            <?php if($rev_item['rev_logo']['url']){?>
                                <div class="review-cl-logo-wraper">
                                    <img src="<?php echo $rev_item['rev_logo']['url'];?>" alt="rev logo">
                                </div>
                            <?php } ?>
                            <p><?php echo $rev_item['rev_description']; ?></p>
                            <div class="reviewer-info">
                                <div class="rev-img">
                                    <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                </div>
                                <div class="rev-nem">
                                    <h5><?php echo $rev_item['rev_name']; ?></h5>
                                    <p><?php echo $rev_item['rev_desig']; ?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                </div>
            </div>



        </div>



    <?php }
}


if (!function_exists('santoi_client_reviews_four')) {
    function santoi_client_reviews_four($rev_list)
    { ?>
        <div class="clearfix"></div>
        <div class="santoi-clreviews-four santoi-review-common-class">
            <div class="saaplate--marquee__rev__container_alt santoi-marquee-stl4" id="santoi-marquee-stl4">

                <?php
                $countf = 0;
                $classf = '';
                foreach ($rev_list as $rev_item) {
                    $countf++;
                    if ($countf == 1) {
                        $classf = 'active';
                    }else{
                        $classf = '';
                    }

                    ?>
                    <div class="marquee--item  <?php echo esc_html($classf);?> patinets-single-review patinets-single-review-st03">
                        <?php if($rev_item['rev_logo']['url']){?>
                            <div class="review-cl-logo-wraper">
                                <img src="<?php echo $rev_item['rev_logo']['url'];?>" alt="rev logo">
                            </div>
                        <?php } ?>
                        <p><?php echo $rev_item['rev_description']; ?></p>
                        <div class="reviewer-info">
                            <div class="rev-img">
                                <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                            </div>
                            <div class="rev-nem">
                                <h5><?php echo $rev_item['rev_name']; ?></h5>
                                <p><?php echo $rev_item['rev_desig']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>


            </div>




        </div>

    <?php }
}


if (!function_exists('santoi_client_reviews_five')) {
    function santoi_client_reviews_five($rev_list)
    { ?>

        <div class="santoi-reviews-five santoi-reviews-five santoi-review-common-class">
            <div class="swiper reviews-five swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review-5">
                            <div class="santoi-review-style-5">

                                <p><?php echo $rev_item['rev_description']; ?></p>
                                <div class="reviewer-info-one">
                                    <div class="rev-img float-start">
                                        <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                    </div>
                                    <div class="rev-nem float-start">
                                        <h5><?php echo $rev_item['rev_name']; ?></h5>
                                        <p><?php echo $rev_item['rev_desig']; ?></p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="santoi-rev-five-bottom-content row">
                    <div class="rev-5-scrolbar col-12 col-md-8">
                        <div class="swiper-scrollbar"></div>
                    </div>

                    <div class="rev-5-navigation col-12 col-md-4">


                        <div class="santoi-button-next-five"><svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.00004 15C7.19867 15.0012 7.39314 14.9432 7.55866 14.8334C7.72418 14.7236 7.85325 14.5669 7.92941 14.3835C8.00558 14.2001 8.02539 13.9981 7.98632 13.8033C7.94725 13.6086 7.85107 13.4299 7.71004 13.29L2.41004 8.00002L7.71004 2.71003C7.87387 2.51873 7.95948 2.27265 7.94975 2.02097C7.94003 1.7693 7.8357 1.53056 7.65761 1.35246C7.47951 1.17437 7.24077 1.07004 6.9891 1.06032C6.73742 1.05059 6.49135 1.1362 6.30004 1.30003L0.300043 7.30002C0.113791 7.48739 0.00925016 7.74084 0.00925016 8.00502C0.00925016 8.26921 0.113791 8.52266 0.300043 8.71002L6.30004 14.71C6.4863 14.8948 6.7377 14.9989 7.00004 15Z" fill="white"/>
                                <path d="M13 14.9999C13.1987 15.0011 13.3931 14.9431 13.5587 14.8333C13.7242 14.7235 13.8532 14.5669 13.9294 14.3834C14.0056 14.2 14.0254 13.998 13.9863 13.8033C13.9473 13.6085 13.8511 13.4298 13.71 13.2899L8.41004 7.99994L13.71 2.70994C13.8983 2.52164 14.0041 2.26624 14.0041 1.99994C14.0041 1.73364 13.8983 1.47824 13.71 1.28994C13.5217 1.10164 13.2663 0.99585 13 0.99585C12.7337 0.99585 12.4783 1.10164 12.29 1.28994L6.29003 7.28994C6.10378 7.4773 5.99924 7.73075 5.99924 7.99494C5.99924 8.25912 6.10378 8.51258 6.29003 8.69994L12.29 14.6999C12.3827 14.7944 12.4931 14.8696 12.615 14.9211C12.7369 14.9726 12.8677 14.9994 13 14.9999Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="santoi-button-prev-five"><svg width="15" height="15" viewBox="0 0 15 15" fill="none">
                                <path d="M7.99996 15C7.80133 15.0012 7.60686 14.9432 7.44134 14.8334C7.27582 14.7236 7.14675 14.5669 7.07059 14.3835C6.99442 14.2001 6.97461 13.9981 7.01368 13.8033C7.05275 13.6086 7.14893 13.4299 7.28996 13.29L12.59 8.00002L7.28996 2.71003C7.12613 2.51873 7.04052 2.27265 7.05025 2.02097C7.05997 1.7693 7.1643 1.53056 7.34239 1.35246C7.52049 1.17437 7.75923 1.07004 8.0109 1.06032C8.26258 1.05059 8.50865 1.1362 8.69996 1.30003L14.7 7.30002C14.8862 7.48739 14.9907 7.74084 14.9907 8.00502C14.9907 8.26921 14.8862 8.52266 14.7 8.71002L8.69996 14.71C8.5137 14.8948 8.2623 14.9989 7.99996 15Z" fill="white"/>
                                <path d="M1.99996 14.9999C1.80133 15.0011 1.60686 14.9431 1.44134 14.8333C1.27582 14.7235 1.14675 14.5669 1.07059 14.3834C0.994419 14.2 0.974607 13.998 1.01368 13.8033C1.05275 13.6085 1.14893 13.4298 1.28996 13.2899L6.58996 7.99994L1.28996 2.70994C1.10165 2.52164 0.995865 2.26624 0.995865 1.99994C0.995865 1.73364 1.10165 1.47824 1.28996 1.28994C1.47826 1.10164 1.73366 0.99585 1.99996 0.99585C2.26626 0.99585 2.52165 1.10164 2.70996 1.28994L8.70997 7.28994C8.89622 7.4773 9.00076 7.73075 9.00076 7.99494C9.00076 8.25912 8.89622 8.51258 8.70997 8.69994L2.70996 14.6999C2.61734 14.7944 2.5069 14.8696 2.38502 14.9211C2.26315 14.9726 2.13227 14.9994 1.99996 14.9999Z" fill="white"/>
                            </svg>
                        </div>
                    </div>

                </div>




            </div>




        </div>


    <?php }
}
if (!function_exists('santoi_client_reviews_six')) {
    function santoi_client_reviews_six($rev_list)
    { ?>
        <div class="santoi-reviews-six santoi-review-common-class">


            <div class="santoi_swiper_nav_style_six">
                <div class="santoi-button-prev"><i class="isax icon-arrow-left1"></i></div>
                <div class="santoi-button-next"><i class="isax icon-arrow-right1"></i></div>

            </div>
            <div class="swiper reviews-six swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review elementor-repeater-item-<?php echo esc_attr( $rev_item['_id']);?>">
                            <div class="slider-six-content-rev">
                                <?php if($rev_item['rev_logo']['url']){?>
                                    <div class="review-cl-logo-wraper">
                                        <img src="<?php echo $rev_item['rev_logo']['url'];?>" alt="rev logo">
                                    </div>
                                <?php } ?>
                                <h4><?php echo $rev_item['rev_title']; ?></h4>
                                <p><?php echo $rev_item['rev_description']; ?></p>
                                <div class="reviewer-info-one">
                                    <div class="rev-img float-start">
                                        <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                    </div>
                                    <div class="rev-nem float-start">
                                        <h5><?php echo $rev_item['rev_name']; ?></h5>
                                        <p><?php echo $rev_item['rev_desig']; ?></p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>




        </div>

    <?php }
}
if (!function_exists('santoi_client_reviews_seven')) {
    function santoi_client_reviews_seven($rev_list)
    { ?>

        <div class="santoi-reviews-seven santoi-reviews-seven santoi-review-common-class">
            <div class="swiper reviews-seven swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review-5">

                            <div class="swp-review-top-part">
                                <?php if($rev_item['rev_logo']['url']){?>
                                    <div class="review-cl-logo-wraper">
                                        <img src="<?php echo $rev_item['rev_logo']['url'];?>" alt="rev logo">
                                    </div>
                                <?php } ?>
                                <div class="swp-rating">
                                    <?php display_rating_star($rev_item['rating']); ?>
                                </div>
                            </div>


                            <div class="santoi-review-style-5">

                                <p><?php echo $rev_item['rev_description']; ?></p>


                            </div>

                            <div class="santoi-rev-six-bottom-content row">

                                <div class="rev-5-navigation col-6 col-md-4">


                                    <div class="santoi-button-next-five"><i class="isax icon-arrow-left-11"></i></div>
                                    <div class="santoi-button-prev-five"><i class="isax icon-arrow-right-11"></i></div>
                                </div>

                                <div class="rev-5-author-b col-6 col-md-8">
                                    <div class="reviewer-info-one">
                                        <div class="rev-img float-start">
                                            <img src="<?php echo $rev_item['rev_image']['url']; ?>" alt="">
                                        </div>
                                        <div class="rev-nem float-start">
                                            <h5><?php echo $rev_item['rev_name']; ?></h5>
                                            <p><?php echo $rev_item['rev_desig']; ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    <?php } ?>
                </div>





            </div>




        </div>


    <?php }
}


if (!function_exists('santoi_client_reviews_eight')) {
    function santoi_client_reviews_eight($rev_list)
    { ?>

        <div class="santoi-reviews-eight santoi-reviews-eight santoi-review-common-class">
            <div class="reviews-eight">
                <div class="reviews-eight-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="patinets-single-review-8">

                            <div class="swp-review-top-part">
                                <?php if($rev_item['rev_logo']['url']){?>
                                    <div class="review-cl-logo-wraper-8">
                                        <img src="<?php echo $rev_item['rev_logo']['url'];?>" alt="rev logo">
                                    </div>
                                <?php } ?>
                                <div class="swp-rating">
                                    <?php display_rating_star($rev_item['rating']); ?>
                                </div>
                                <div class="santoi-review-style-8">

                                    <p><?php echo $rev_item['rev_description']; ?></p>


                                </div>

                            </div>






                        </div>
                    <?php } ?>
                </div>





            </div>




        </div>


    <?php }
}
if (!function_exists('santoi_client_reviews_nine')) {
    function santoi_client_reviews_nine($rev_list)
    { ?>

        <div class="santoi-reviews-nine santoi-reviews-nine santoi-review-common-class">
            <div class="swiper reviews-nine swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="swiper-slide patinets-single-review">

                            <div class="swp-review-top-part">
                                <?php if($rev_item['rev_st_six_icon']['url']){?>
                                    <div class="review-cl-logo-wraper">
                                        <img src="<?php echo $rev_item['rev_st_six_icon']['url'];?>" alt="rev logo">
                                    </div>
                                <?php } ?>

                            </div>


                            <div class="santoi-review-style-5">

                                <p><?php echo $rev_item['rev_description']; ?></p>


                            </div>

                            <div class="santoi-rev-six-bottom-content row">



                                <div class="rev-9-author-b col-12 col-md-6">
                                    <div class="reviewer-info-one">
                                        <span><?php echo $rev_item['rev_name']; ?></span>

                                    </div>
                                </div>

                                <div class="rev-9-navigation col-12 col-md-6">


                                    <div class="swiper-pagination"></div>
                                </div>

                            </div>

                        </div>
                    <?php } ?>
                </div>





            </div>




        </div>


    <?php }
}


if (!function_exists('santoi_client_reviews_ten')) {
    function santoi_client_reviews_ten($rev_list)
    { ?>

        <div class="santoi-reviews-ten santoi-reviews-ten reviews-ten-wrapper santoi-review-common-class">
            <div class="reviews-ten">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="patinets-single-review-10 swiper-slide">

                            <div class="swp-review-top-part row">
                                <?php if($rev_item['rev_image']['url']){?>
                                    <div class="review-cl-logo-wraper-10 col-12 col-md-4">
                                        <img src="<?php echo $rev_item['rev_image']['url'];?>" alt="rev logo">
                                    </div>
                                <?php } ?>
                                <div class="review-content-ten col-12 col-md-8">
                                    <div class="swp-rating">
                                        <?php display_rating_star($rev_item['rating']); ?>
                                    </div>
                                    <div class="santoi-review-style-ten">

                                        <p><?php echo $rev_item['rev_description']; ?></p>
                                        <h4><?php echo $rev_item['rev_name'];?></h4>
                                        <span><?php echo $rev_item['rev_desig'];?></span>


                                    </div>

                                    <svg width="86" height="86" viewBox="0 0 86 86">
                                        <g opacity="0.12">
                                            <path d="M34.904 12.0938H2.51953C1.12788 12.0938 0 13.2216 0 14.6133V46.9978C0 48.3894 1.12788 49.5173 2.51953 49.5173H16.1919V71.2863C16.1919 72.6773 17.3198 73.8059 18.7115 73.8059H26.8081C27.8927 73.8059 28.8552 73.1117 29.1977 72.0829L37.2937 47.7943C37.3796 47.5378 37.4236 47.2688 37.4236 46.9978V14.6133C37.4236 13.2216 36.2957 12.0938 34.904 12.0938V12.0938Z" fill="white"/>
                                            <path d="M83.4807 12.0938H51.0962C49.7045 12.0938 48.5767 13.2216 48.5767 14.6133V46.9978C48.5767 48.3894 49.7045 49.5173 51.0962 49.5173H64.7692V71.2863C64.7692 72.6773 65.8971 73.8059 67.2888 73.8059H75.3847C76.4693 73.8059 77.4319 73.1117 77.775 72.0829L85.871 47.7943C85.9563 47.5378 86.0002 47.2688 86.0002 46.9978V14.6133C86.0002 13.2216 84.8723 12.0938 83.4807 12.0938V12.0938Z" fill="white"/>
                                        </g>
                                    </svg>
                                </div>

                            </div>







                        </div>
                    <?php } ?>
                </div>





            </div>




        </div>


    <?php }
}

if (!function_exists('santoi_client_reviews_eleven')) {
    function santoi_client_reviews_eleven($rev_list)
    { ?>

        <div class="santoi-reviews-eleven santoi-reviews-eleven reviews-eleven-wrapper santoi-review-common-class">
            <div class="reviews-eleven">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="patinets-single-review-11 swiper-slide">

                            <div class="swp-review-top-part">

                                <div class="review-content-eleven">
                                    <div class="swp-rating">
                                        <?php display_rating_star($rev_item['rating']); ?>
                                    </div>
                                    <div class="santoi-review-style-eleven">

                                        <p><?php echo $rev_item['rev_description']; ?></p>
                                        <h4><?php echo $rev_item['rev_name'];?></h4>
                                        <span><?php echo $rev_item['rev_desig'];?></span>


                                    </div>


                                </div>

                            </div>







                        </div>
                    <?php } ?>
                </div>





            </div>




        </div>


    <?php }
}


if (!function_exists('santoi_client_reviews_twelve')) {
    function santoi_client_reviews_twelve($rev_list)
    { ?>

        <div class="santoi-reviews-eleven santoi-reviews-twelve reviews-eleven-wrapper santoi-review-common-class">
            <div class="reviews-eleven">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="patinets-single-review-11 swiper-slide">

                            <div class="swp-review-top-part">

                                <div class="review-content-eleven">
                                    
                                    <div class="santoi-review-style-eleven">

                                        <p><?php echo $rev_item['rev_description']; ?></p>
                                        
                                    
                                    <div class="row santoi-review-12-contents">
                                        <div class="col-12 col-md-8">
                                            <h4><?php echo $rev_item['rev_name'];?></h4>
                                        <span class="santoi-rev-desg2"><?php echo $rev_item['rev_desig'];?></span>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="swp-rating">
                                        <?php display_rating_star($rev_item['rating']); ?>
                                    </div>
                                        </div>
                                    </div>

                                    </div>


                                </div>

                            </div>







                        </div>
                    <?php } ?>
                    
                     
                </div>

<div class="es-12-pag-number">
    <div class="swiper-pagination"></div>
</div>



            </div>




        </div>


    <?php }
}

if (!function_exists('santoi_client_reviews_thirteen')) {
    function santoi_client_reviews_thirteen($rev_list)
    { ?>

        <div class="santoi-reviews-thirteen santoi-reviews-thirteen reviews-thirteen-wrapper santoi-review-common-class">
            <div class="reviews-thirteen swiper-container">
                <div class="swiper-wrapper">
                    <?php foreach ($rev_list as $rev_item) { ?>
                        <div class="patinets-single-review-11 swiper-slide">

                            <div class="swp-review-top-part">

                                <div class="review-content-thirteen">
                                    
                                    <div class="santoi-review-style-thirteen">
                                        
                                         <div class="col-12">
                                            <div class="swp-rating">
                                        <?php display_rating_star($rev_item['rating']); ?>
                                    </div>
                                        </div>

                                        <p><?php echo $rev_item['rev_description']; ?></p>
                                        
                                    
                                    <div class="row santoi-review-13-contents">
                                        <div class="col-12">
                                            <h4><?php echo $rev_item['rev_name'];?></h4>
                                        <span class="santoi-rev-desg2"><?php echo $rev_item['rev_desig'];?></span>
                                        </div>
                                       
                                    </div>

                                    </div>


                                </div>

                            </div>







                        </div>
                    <?php } ?>
                    
                     
                </div>





            </div>
            
            
            
            <div class="swiper-container thirteen-gallery-thumbs">
        <div class="swiper-wrapper">
            <?php foreach ($rev_list as $rev_item) { ?>
            <div class="swiper-slide"><img src="<?php echo $rev_item['rev_image']['url'];?>" alt="rev logo"></div>
            <?php } ?>
        </div>
    </div>




        </div>


    <?php }
}

