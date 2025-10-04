<?php
if (!defined('ABSPATH')) exit; // Exit if accessed directly
define('SANTOI_ELEMENTOR_URL', plugins_url('/', __FILE__));
define('SANTOI_ELEMENTOR_PATH', plugin_dir_path(__FILE__));
define('SANTOI_ELEMENTOR_ROOT_URL', plugins_url(__FILE__));
define('SANTOI_ELEMENTOR_PL_ROOT_URL', plugin_dir_url(__FILE__));
define('SANTOI_ELEMENTOR_MODULES_PATH', SANTOI_ELEMENTOR_PATH . 'modules/');
define('SANTOI_PL_ASSETS', trailingslashit(SANTOI_ELEMENTOR_PL_ROOT_URL . 'assets'));
define('SANTOI_STICKY_ASSETS_URL', SANTOI_ELEMENTOR_URL . 'assets/');
define('SANTOI_HEADER_MODULES_URL', SANTOI_ELEMENTOR_URL . 'modules/');
define('SANTOI_ELEMENTOR_STICKY_TPL', SANTOI_ELEMENTOR_PATH . 'library/sticky-header/');

define('SANTOI_ROOT_FILE__', __FILE__);
define('SANTOI_TEMPLATES_FOR_ELEMENTOR_VERSION', '2.9');

require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi-elements-cat.php';

require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi_home_banner_widgets_functions.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi_blog_widgets_functions.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi_reviews_widgets_functions.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi-elementor-assets.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/sassplate-custom-bg.php';
require_once SANTOI_ELEMENTOR_PATH . 'library/template-library/index.php';

require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi-custom-icon.php';

require_once SANTOI_ELEMENTOR_PATH . 'inc/dividers.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi-elementor-functions.php';
require_once SANTOI_ELEMENTOR_PATH . 'inc/santoi-elementor-section.php';




require_once SANTOI_ELEMENTOR_PATH . 'widgets/widgets-function/hero-style.php';
require_once SANTOI_ELEMENTOR_PATH . 'widgets/widgets-function/blog-style.php';
require_once SANTOI_ELEMENTOR_PATH . 'widgets/widgets-function/portfolio-style.php';
$ps = new SantoiElemSection();

function santoi_register_new_controls($controls_manager) {

    require_once SANTOI_ELEMENTOR_PATH . 'inc/gradient-control.php';
    require_once SANTOI_ELEMENTOR_PATH . 'inc/image-select-control.php';

    $controls_manager->register(new \Elementor\CustomControl\ImgSelector_Control());
    $controls_manager->register(new \Elementor\CustomControl\CustomGradient_Control());
    



}
add_action('elementor/controls/register', 'santoi_register_new_controls');

function santoi_elementor_widget_categorie($elements_manager) {

    $categories = [];
    $categories['santoi-ele-widgets-cat'] =
        [
            'title' => 'Santoi Elements',
            'icon'  => 'eicon-plug'
        ];

    $old_categories = $elements_manager->get_categories();

    $categories = array_merge($categories, $old_categories);

    $set_categories = function ( $categories ) {
        $this->categories = $categories;
    };

    $set_categories->call( $elements_manager, $categories );


}
add_action('elementor/elements/categories_registered', 'santoi_elementor_widget_categorie');



function santoi_elementor_elements() {
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-hero-section.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-feature-section.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-button.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-counter.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-heading.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-image-grid.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-pricing.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-step.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-trial.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-award.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-feture-list.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-tabs.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-videos.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-testimonial.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-blog.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-image-slider-main.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-brand.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-counter-with-image.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-contact.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/timeline-slider.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-team.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-portfolio.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-text-slider.php';
    require_once SANTOI_ELEMENTOR_PATH . 'widgets/santoi-stylish-shape.php';
    




}
add_action('elementor/widgets/register', 'santoi_elementor_elements');


add_action('elementor/editor/after_enqueue_styles', 'santoi_widget_icon_style');
function santoi_widget_icon_style(){
    $cs_icon = plugins_url( 'widgets/t_icon.svg', __FILE__ );
    wp_add_inline_style( 'elementor-editor', '.elementor-element .icon .teconce-custom-icon{content: url( '.$cs_icon.');width: 28px;}' );
}