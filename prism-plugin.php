<?php
/*
Plugin Name: Prism Syntax Plugin 
Plugin URI: http://rezasm.ir
Description: This plugin uses beautiful prism.js syntax Highlighter
Author: rezasm
Version: 1.0.0
Author URI: https://rezasm.ir/
*/

defined('ABSPATH') || exit('Access id Denied');

define("PS_DIR", trailingslashit(plugin_dir_path(__FILE__)));
define("PS_URI", plugin_dir_url(__FILE__));
define("PS_CSS", trailingslashit(PS_URI . "assets/css"));
define("PS_JS", trailingslashit(PS_URI . "assets/js"));




//add prismJs files to theme

 
function load_prism_assets(){
    if (!is_admin()) {
        wp_enqueue_style('r-prismcss', PS_CSS . "prism.css");
        wp_enqueue_style('r-ppcss', PS_CSS . "pp-style.css");
        wp_enqueue_script('r-prismjs', PS_JS . "prism.js");
    }
}
 
add_action('wp_enqueue_scripts','load_prism_assets');


function pp_fix_ltr($code){

    $pattern = '/wp-block-code/';
    $code = preg_replace($pattern,'wp-block-code fix-ltr',$code);


    return $code;


}


add_filter('the_content','pp_fix_ltr',10,1);
apply_filters('the_content',$code);
 


