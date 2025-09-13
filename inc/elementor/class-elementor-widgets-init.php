<?php
/**
 * All Elementor widget init
 * @package Errin
 * @since 1.0.0
 */

if ( !defined('ABSPATH') ){
	exit(); // exit if access directly
}


if ( !class_exists('Errin_Elementor_Widget_Init') ){

	class Errin_Elementor_Widget_Init{
		/*
			* $instance
			* @since 1.0.0
			* */
		private static $instance;
		/*
		* construct()
		* @since 1.0.0
		* */
		public function __construct() {
			add_action( 'elementor/elements/categories_registered', array($this,'_widget_categories') );
			//elementor widget registered
			add_action('elementor/widgets/widgets_registered',array($this,'_widget_registered'));
			// elementor editor css
			
			add_action( 'elementor/editor/after_enqueue_styles', array($this,'load_assets_for_elementor'));
			
			//add_action( 'elementor/editor/after_enqueue_scripts', array($this,'load_assets_for_elementor'));
			
			add_action( 'elementor/controls/controls_registered', array($this,'modify_controls'), 10, 1 );
		}
		/*
	   * getInstance()
	   * @since 1.0.0
	   * */
		public static function getInstance(){
			if ( null == self::$instance ){
				self::$instance = new self();
			}
			return self::$instance;
		}
		/**
		 * _widget_categories()
		 * @since 1.0.0
		 * */
		public function _widget_categories($elements_manager){
			$elements_manager->add_category(
				'errin_widgets',
				[
					'title' => __( 'Errin Widgets', 'errin-extra' ),
					'icon' => 'fa fa-plug',
				]
			);
		}

		/**
		 * _widget_registered()
		 * @since 1.0.0
		 * */
		public function _widget_registered(){
			if( !class_exists('Elementor\Widget_Base') ){
				return;
			}
			$elementor_widgets = array(
				'home-top-post-block',
				'post-home-slider',
				'post-list-tabs',
				'post-list-carousel',
				'large-block-with-list',
				'featured-img-with-vertical-list',
				'post-list-sidebar-widget',
				'post-list-n-grid',
				'featured-post-block',
				'latest-posts-block',
				'widget-block-slider',
			);
			
			$elementor_widgets = apply_filters('errin_elementor_widget',$elementor_widgets);

			if ( is_array($elementor_widgets) && !empty($elementor_widgets) ) {
				foreach ( $elementor_widgets as $widget ){
					$widget_file = 'plugins/elementor/widget/'.$widget.'.php';
					$template_file = locate_template($widget_file);
					if ( !$template_file || !is_readable( $template_file ) ) {
						$template_file = ERRIN_EXTRA_ELEMENTOR.'/widgets/class-'.$widget.'-elementor-widget.php';
					}
					if ( $template_file && is_readable( $template_file ) ) {
						include_once $template_file;
					}
				}
			}

		}


		/**
		 * Adding custom icon to icon control in Elementor
		*/
		
		public function modify_controls( $controls_registry ) {
			// Get existing icons
			$icons = $controls_registry->get_control( 'icon' )->get_settings( 'options' );

			// Append new icons
			$new_icons = array_merge(
				array(

					'flaticon-star' => esc_html__('Star','errin-extra'),

				),
				$icons
			);

			// Then we set a new list of icons as the options of the icon control
			$controls_registry->get_control( 'icon' )->set_settings( 'options', $new_icons );
		}

		/**
		 * load custom assets for elementor
		 * @since 1.0.0
		 * */
		public function load_assets_for_elementor(){
			wp_enqueue_style( 'flaticon-css', ERRIN_EXTRA_CSS.'/flaticon.css');
			
			//wp_enqueue_script( 'errin-elementor-scripts', ERRIN_EXTRA_JS.'/scripts.js', array( 'jquery' ),  '1.0', true );
		}

	}

	if ( class_exists('Errin_Elementor_Widget_Init') ){
		Errin_Elementor_Widget_Init::getInstance();
	}

}//end if



if( ! function_exists( 'errin_enqueue_fa5' ) ) {
	function errin_enqueue_fa5() {
	  wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
	  wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'errin_enqueue_fa5' );
  }



// AJAX Load More Posts

add_action('wp_ajax_errin_load_more_posts', 'errin_load_more_posts');
add_action('wp_ajax_nopriv_errin_load_more_posts', 'errin_load_more_posts');

function errin_load_more_posts() {
    // Security check
    if( !isset($_POST['nonce']) || !wp_verify_nonce($_POST['nonce'], 'errin_load_more_nonce') ){
        wp_send_json_error(['html' => '', 'message' => 'Invalid nonce']);
        wp_die();
    }

    $settings = isset($_POST['settings']) ? $_POST['settings'] : [];
    $page = isset($_POST['page']) ? intval($_POST['page']) : 1;

    $args = [
        'post_type'      => 'post',
        'post_status'    => 'publish',
        'posts_per_page' => isset($settings['posts_per_page']) ? intval($settings['posts_per_page']) : 5,
        'paged'          => $page,
        'order'          => isset($settings['order']) ? $settings['order'] : 'DESC',
        'tag__in'        => isset($settings['tags']) ? $settings['tags'] : [],
    ];

    if(!empty($settings['terms'])){
        $args['tax_query'] = [
            [
                'taxonomy' => 'category',
                'field'    => 'id',
                'terms'    => $settings['terms'],
                'include_children' => true,
                'operator' => 'IN'
            ]
        ];
    }

    switch($settings['post_sortby']){
        case 'mostdiscussed': $args['orderby'] = 'comment_count'; break;
        case 'title': $args['orderby'] = 'title'; break;
        case 'ID': $args['orderby'] = 'ID'; break;
        case 'rand': $args['orderby'] = 'rand'; break;
        case 'name': $args['orderby'] = 'name'; break;
        default: $args['orderby'] = 'date'; break;
    }

    $query = new WP_Query($args);

    $html = '';

    if($query->have_posts()){
        while($query->have_posts()): $query->the_post();
            // Start output buffering
            ob_start();
            ?>
            <div class="latest_post_block_items">
                <div class="latest_post_block_item_wrap">
                    <div class="latest-post-block-img">
                        <?php
                        $post_format = get_post_format();
                        if ($post_format === 'video') {
                            require ERRIN_THEME_DIR . '/template-parts/single/post-video.php';
                        } elseif ($post_format === 'audio') {
                            require ERRIN_THEME_DIR . '/template-parts/single/post-audio.php';
                        } else { ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url(null, 'full')); ?>"
                                     alt="<?php the_title_attribute(); ?>">
                            </a>
                        <?php } ?>
                    </div>
                    <div class="latest_post_block_contnt">
                        <?php if('yes' === $settings['show_cat']){ ?>
                            <div class="htbc_category"><?php require ERRIN_THEME_DIR . '/template-parts/cat-color.php'; ?></div>
                        <?php } ?>
                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                        <?php if('yes' === $settings['show_desc']){ ?>
                            <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), $settings['desc_limit'], '')); ?></p>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <?php
            $html .= ob_get_clean(); // Append buffered HTML
        endwhile;
        wp_reset_postdata();
    } else {
        $html = '<div class="no-more-posts" style="text-align:center; padding:20px; font-weight:bold;">No Post Here</div>';
    }

    wp_send_json_success(['html' => $html]);
    wp_die();
}

