<?php
if ( ! defined( 'ABSPATH' ) ) exit;

class santoi_Lib_Activation {

  function __construct() {

    register_activation_hook( SANTOI_ROOT_FILE__,  [ $this, 'init' ] );
  }

  function init(){
    $remote = santoi_Lib_Library::$plugin_data["remote_site"];
    $end_point = santoi_Lib_Library::$plugin_data["all_endpoint"];
    $library_data = json_decode(wp_remote_retrieve_body(wp_remote_get($remote.'wp-json/wp/v2/'.$end_point)), true);
    update_option( 'santoi_lib_library', $library_data);
  }
}

new santoi_Lib_Activation();





