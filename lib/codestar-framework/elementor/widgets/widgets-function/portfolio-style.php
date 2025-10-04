<?php
function santoi_portfolio_style_1($settings, $the_query)
{
    global $post;
    ?>
    <!-- latest blog section start -->
    <div class="santoi-portfolio-section">
        <div class="container">
            <div class="st1-portfolio-contain">
                <h4 class="has_text_reveal_anim">
                    <?php echo $settings['title']; ?>
                </h4>
                <div class="has_text_move_anim">
                <p>
                    <?php echo $settings['decription_title']; ?>
                </p>
                </div>
            </div>
            <div class="row st1-portfolio-item">
                <?php
                if ($the_query->have_posts()) {
                    $i = 1;

                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        $i++;
                        
                         $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
                        ?>
                        <div class="col-12 col-md-3 has_fade_anim portfolio-style-one">
                            <div class="st1-portfolio-contain-box">
                                <div class="st1-portfolio-contain-box-img">
                                    <?php if ( has_post_thumbnail() ) : ?>
                                    		<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                    	<img src="<?php echo $featured_img_url;?>" class="tilt-effect" alt="grid02"  data-tilt-options='{ "movement": { "perspective" : 700, "translateX" : -15, "translateY" : -15, "translateZ" : 10, "rotateX" : 2, "rotateY" : 10 } }' />
				
                                     </a>
                                    <?php endif; ?>
                                </div>
                                <div class="portfolio-style-one-meta">
                                <h4>
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_title(); ?>
                                    </a>

                                </h4>
                                 <p>by <?php echo get_the_author_meta('display_name'); ?></p>
                                 </div>
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