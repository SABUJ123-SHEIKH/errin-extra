<?php
if (!function_exists('santoi_home_banner_one')) {
    function santoi_home_banner_one($settings)
    { ?>

    <div class="santoi-home-banner1">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner1-content-area">
                    <div class="banner1-inner-content">
                        <h1 class="medianimated medianimatedFadeInUp medi-fadein-up-one"><?php echo $settings['banner_title']; ?></h1>
                        <p class="medianimated2 medianimatedFadeInUp medi-fadein-up-one"><?php echo $settings['banner_description']; ?></p>
                        <a class="medianimated3 medianimatedFadeInUp medi-fadein-up-one banner-btn" data-wow-delay=".6s" href="<?php echo esc_url( $settings['banner_btn_url']['url']); ?>"><?php echo $settings['banner_btn_label']; ?></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner1-image">
                    <img src="<?php echo $settings['banner_image']['url']; ?>" alt="">
                </div>
            </div>
        </div>
    </div>



<?php } }