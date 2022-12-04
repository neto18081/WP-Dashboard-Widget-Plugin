<?php
/**
 * Plugin Name: WP Dashboard Widget
 * Author: Pedro Nunes
 * Author URI: https://github.com/neto18081
 * Version: 1.0
 * Description: Wordpress plugin created for the Rank Math Coding Challenge
 * Text-Domain: wp-dashboard-widget
 */

 if (!defined("ABSPATH")) : exit(); endif;

 define("WPDW_PATH", trailingslashit(plugin_dir_path(__FILE__)));
 define("WPDW_URL", trailingslashit(plugins_url("/", __FILE__)));

 add_action("admin_enqueue_scripts", "load_scripts");

 function load_scripts() {
    wp_enqueue_script( 
        "wp-dashboard-widget", 
        WPDW_URL . "dist/bundle.js", 
        ["jquery", "wp-element"], 
        "1.0", 
        true 
    );
   wp_localize_script( "wp-dashboard-widget", "appLocalizer", [
        "apiUrl" => home_url("/wp-json"),
        "nonce" => wp_create_nonce("wp_rest")
    ] );
};

 require_once WPDW_PATH . "classes/class-create-widget.php";
 require_once WPDW_PATH . "classes/class-create-routes.php";