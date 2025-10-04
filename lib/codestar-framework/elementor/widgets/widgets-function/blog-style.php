<?php
function santoi_blog_style_1($settings, $the_query) {
    global $post;
    ?>
    <!-- latest blog section start -->
    <div class="santoi-blog-section">
        <div class="container">
            <div class="st1-footer-contain st1-blog-sc-title-box">
                <h4 class="has_text_reveal_anim">
                    <?php echo $settings['title']; ?>
                </h4>
                <div class="has_text_move_anim">
                    <p>
                        <?php echo $settings['decription_title']; ?>
                    </p>
                </div>
            </div>
            <div class="row st1-footer-contain-box-row">
                <?php
                if ($the_query->have_posts()) {
                    $i = 1;

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        ?>
                        <div class="col-12 col-md-4 has_fade_anim">
                            <div class="st1-footer-contain-box">
                                <div class="st1-footer-contain-box-img">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                            <?php the_post_thumbnail('santoi-blog-style-one-thumbnail'); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                <p>
                                    by- <?php echo get_the_author_meta('display_name'); ?>
                                    <span>
                               <?php echo get_the_date('d'); ?>
                                <br>
                              <?php echo get_the_date('M'); ?>
                            </span>
                                </p>
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>

                                </h4>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>


    <!-- latest blog section end -->
    <?php
}

function santoi_blog_style_2($settings, $the_query) {
    global $post;
    ?>
    <!-- st2-news-area Start -->
    <section class="st2-news-area">
        <div class="container">

            <div class="st2-news-contain">
                <h4  class="has_text_reveal_anim">
                    <?php echo $settings['title']; ?>
                </h4>
                <div class="has_text_move_anim">
                <p>
                    <?php echo $settings['decription_title']; ?>
                </p>
                </div>
            </div>

            <div class="row st2-995-row">
                <?php
                if ($the_query->have_posts()) {
                    $i = 1;

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        ?>
                        <div class="col-12 col-md-4">
                            <div class="st2-news-box has_fade_anim">
                                <div class="st2-img" style="background: url(<?php if (has_post_thumbnail()) {
                                    the_post_thumbnail_url();
                                } ?>);">
                                </div>
                                <span class="st2-news-box-info">
                                    <?php echo get_the_author_meta('display_name'); ?>
                                </span>
                                <span>
                                    <?php echo get_the_date('d, M , Y'); ?>
                                </span>
                                <h4>
                                    <a href=" <?php the_permalink(); ?> "> <?php echo wp_trim_excerpt(get_the_title(), 1); ?></a>

                                </h4>
                                <p>
                                    <?php echo wp_trim_words(get_the_content(), 17); ?>
                                </p>

                                <a href="#" class="st__blog_two_btn">
                                    <?php echo $settings['button_text']; ?>
                                </a>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>

            </div>
        </div>
    </section>
    <!-- st2-news-area End -->
    <?php
}









