<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              teconce.com
 * @since             1.0
 * @package           Santoi-core
 *
 * @wordpress-plugin
 * Plugin Name:       Santoi Core
 * Plugin URI:        teconce.com/santoi-core
 * Description:       Santoi theme core plugin.
 * Version:           1.2
 * Author:            Teconce
 * Author URI:        teconce.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       santoi-core
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SANTOI_CORE_VERSION', '1.2' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-santoi-core-activator.php
 */
function activate_santoi_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-santoi-core-activator.php';
	Santoi_Core_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-santoi-core-deactivator.php
 */
function deactivate_santoi_core() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-santoi-core-deactivator.php';
	Santoi_Core_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_santoi_core' );
register_deactivation_hook( __FILE__, 'deactivate_santoi_core' );

 $santoi_options = get_option( 'santoi_options' );
$maintenancemode = (! empty( $santoi_options['maintenance_mode'] ) ) ? $santoi_options['maintenance_mode'] : '';
$nightmodeebl = (! empty( $santoi_options['sp_night_mode_ebl'] ) ) ? $santoi_options['sp_night_mode_ebl'] : '';
$woo_plugin_path = trailingslashit( WP_PLUGIN_DIR ) . 'woocommerce/woocommerce.php';
/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-santoi-core.php';
require plugin_dir_path( __FILE__ ) . 'elementor/class-elementor-main.php';
require plugin_dir_path( __FILE__ ) . 'library/santoi-cpt.php';
require plugin_dir_path( __FILE__ ) . 'library/codestar/codestar-framework.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/theme-panels.php';
require plugin_dir_path( __FILE__ ) . 'library/santoi-helper.php';
require plugin_dir_path( __FILE__ ) . 'library/santoi-nav-options.php';
require plugin_dir_path( __FILE__ ) . 'library/santoi-rating.php';
require plugin_dir_path( __FILE__ ) . 'library/santoi-custom-css.php';
require plugin_dir_path( __FILE__ ) . 'library/license/Santoi.php';

require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-gradient-options.php';
require plugin_dir_path( __FILE__ ) . 'library/theme-options/extends/custom-color-group.php';

require plugin_dir_path( __FILE__ ) . 'library/metabox/page-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/pricing-table-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/user-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/team-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/case-study-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/product-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/post-meta.php';
require plugin_dir_path( __FILE__ ) . 'library/metabox/blog-single-meta.php';



require plugin_dir_path( __FILE__ ) . 'library/custom-options-helper.php';

require plugin_dir_path( __FILE__ ) . 'library/custom-fonts/custom-font-functions.php';
if($nightmodeebl){
require plugin_dir_path( __FILE__ ) . 'library/extension/sp-night-mode/sp-night-mode.php';
}

if($maintenancemode){
require plugin_dir_path( __FILE__ ) . 'library/maintenance/maintenance.php';
}

require plugin_dir_path( __FILE__ ) . 'library/widgets/about.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/search.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/tags.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/category.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/recent-post.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/custom-widget.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/product.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-useful-link.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/sidebar-newsletter.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/featured-post.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-style-two-newsletter.php';
require plugin_dir_path( __FILE__ ) . 'library/widgets/footer-instagram-gallery.php';
if( is_multisite() ){
    $plugins_network = wp_get_active_network_plugins();
} else {
    $plugins_network = array();
}
if (
    in_array( $woo_plugin_path, wp_get_active_and_valid_plugins() ) || in_array( $woo_plugin_path, $plugins_network )
) {

require plugin_dir_path( __FILE__ ) . 'library/extension/santoi-live-search/product-search.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/wishlist.php';

require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/login.php';
require plugin_dir_path( __FILE__ ) . 'library/extension/woo-stuffs/register.php';
//require plugin_dir_path( __FILE__ ) . 'library/extension/woo-quick-view/init.php';
//require plugin_dir_path( __FILE__ ) . 'library/extension/ttc-ajax-filter/ttc-ajax-filter.php';

//require plugin_dir_path( __FILE__ ) . 'library/extension/woo-sale-countdown/woo-sale-countdown.php';


}




/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_santoi_core() {

	$plugin = new Santoi_Core();
	$plugin->run();

}
run_santoi_core();
