<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_filter( 'https_ssl_verify', '__return_false' );
add_filter( 'https_local_ssl_verify', '__return_false' );
add_filter( 'http_request_host_is_external', '__return_true' );
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');

add_action('wp_enqueue_scripts', function (){
	if(!is_singular('post')){
		wp_dequeue_style( 'wp-block-library' );
	}
    wp_dequeue_style( 'wp-block-library-theme' );
    wp_dequeue_style( 'wc-block-style' ); // Remove WooCommerce block CSS
    wp_deregister_script('wp-embed');
}, 200);


add_filter('wpcf7_form_elements', function( $tags ) {
    if(function_exists('wpcf7_enqueue_scripts')){
        wpcf7_enqueue_scripts();
        wpcf7_enqueue_styles();
    }
    return $tags;
});

add_filter('omens/filter/js_dependencies', function ($dependencies){

	return $dependencies;

    if(is_singular('page')){
        if (($key = array_search('omens-woo', $dependencies)) !== false) {
            unset($dependencies[$key]);
        }
        if (($key = array_search('pace', $dependencies)) !== false) {
            unset($dependencies[$key]);
        }
        if (($key = array_search('jquery-featherlight', $dependencies)) !== false) {
            unset($dependencies[$key]);
        }
        if (($key = array_search('jquery-slick', $dependencies)) !== false) {
            unset($dependencies[$key]);
        }
        if (($key = array_search('omens-product-swatches', $dependencies)) !== false) {
            unset($dependencies[$key]);
        }
    }

    return $dependencies;
});