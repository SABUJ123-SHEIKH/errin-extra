<?php
function santoi_hero_style_1($settings) {
    ?>
    <!-- hero section start -->
    <section class="el-hero-section-slider overflow-hidden">
        <?php foreach ($settings['list'] as $item) { ?>
            <div class="el-hero-section bg-blue">
                <div class="container container-xxxl custom_container_width">
                    <div class="row align-items-center">
                        <div class="col-lg-7 col-xl-6 col-xxl-6 overflow-hidden">
                            <?php if ($item['offer_badge']) { ?>
                                <span class="hero-badge"><?php echo $item['offer_badge']; ?></span>
                            <?php } ?>
                            <?php if ($item['title']) { ?>
                                <h1 class="hero-title"><?php echo $item['title']; ?></h1>
                            <?php } ?>
                            <div class="hero-content-wrapper">
                                <?php if ($item['content_img']['url']) { ?>
                                    <img class="content-img" src="<?php echo $item['content_img']['url']; ?>" alt="img">
                                <?php } ?>
                                <?php if ($item['content_text']) { ?>
                                    <span class="content-txt">
                                    <?php echo $item['content_text']; ?>
                                </span>
                                <?php } ?>
                            </div>

                            <div class="btn-wrapper">
                                <?php if ($item['btn_one_text']) { ?>
                                    <a class="btn-yellow el-btn me-4" href="<?php echo $item['btn_one_link']['url']; ?>">
                                        <?php echo $item['btn_one_text']; ?>
                                        <?php \Elementor\Icons_Manager::render_icon($item['btn_one_icon'], ['aria-hidden' => 'true']); ?>
                                    </a>
                                <?php } ?>
                                <?php if ($item['btn_two_text']) { ?>
                                    <a class="el-btn btn-light-underline" href="<?php echo $item['btn_two_link']['url']; ?>">
                                        <?php echo $item['btn_two_text']; ?>
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="offset-xxl-1 col-lg-5 col-xl-6 col-xxl-5 position-relative mt-60 mt-lg-0">
                            <?php if ($item['banner_shape']['url']) { ?>
                                <img class="hero-banner-shape" src="<?php echo $item['banner_shape']['url']; ?>" alt="img">
                            <?php } ?>
                            <?php if ($item['banner_img']['url']) { ?>
                                <img class="hero-banner-img img-fluid" src="<?php echo $item['banner_img']['url']; ?>" alt="img">
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </section>
    <!-- hero section end -->
    <?php
}

function santoi_hero_style_2($settings) {
    ?>
    <!-- hero section start -->
    <section class="el-hero-section-3" data-background="<?php echo $settings['section_bg']['url']; ?>">
        <div class="inner-box">
            <?php if ($settings['offer_text_style_two']) { ?>
                <h4 class="tag-line wow animate__fadeInLeft" data-wow-delay=".1s">
                    <?php echo $settings['offer_text_style_two']; ?>
                </h4>
            <?php } ?>
            <?php if ($settings['title_style_two']) { ?>
                <h2 class="title wow animate__fadeInLeft" data-wow-delay=".2s">
                    <?php echo $settings['title_style_two']; ?>
                </h2>
            <?php } ?>
            <div class="price-wrapper mt-20">
                <?php if ($settings['sell_price']) { ?>
                    <span class="current-price wow animate__fadeInLeft" data-wow-delay=".3s"><?php echo $settings['sell_price']; ?></span>
                <?php } ?>
                <?php if ($settings['regular_price']) { ?>
                    <span class="old-price wow animate__fadeInLeft" data-wow-delay=".4s"><del><?php echo $settings['regular_price']; ?></del></span>
                <?php } ?>
            </div>
            <?php if ($settings['button_text']) { ?>
                <a class="btn-yellow el-btn me-4 mt-30 wow animate__fadeInLeft" data-wow-delay=".5s"
                   href="<?php echo $settings['button_link']; ?>"><?php echo $settings['button_text']; ?>
                    <?php \Elementor\Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']); ?>
                </a>
            <?php } ?>
        </div>
    </section>
    <!-- hero section end -->
    <?php
}





