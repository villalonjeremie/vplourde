<?php
/*
Plugin Name: Redux
Plugin URI: http://accountant.azelab.com
Description: Declares a plugin that will create a redux options.
Version: 1.0
Author: Azelab
Author URI: http://azelab.com
*/

function include_redux() {
    if ( !class_exists( 'ReduxFramework' ) ) {
        require_once(  plugin_dir_path( __FILE__ ) . '/options/framework.php' );
    }
    if ( !isset( $redux_demo ) ) {
    	//echo "11111111111";
        require_once( plugin_dir_path( __FILE__ ) . '/options-config.php' );
       // var_dump($redux_demo);
    }
}
add_action( 'init', 'include_redux' );
?>
