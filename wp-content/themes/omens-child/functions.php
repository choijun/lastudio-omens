<?php

/**
 * Child Theme Function
 *
 */

add_action( 'after_setup_theme', 'omens_child_theme_setup' );
add_action( 'wp_enqueue_scripts', 'omens_child_enqueue_styles', 100);

if( !function_exists('omens_child_enqueue_styles') ) {
    function omens_child_enqueue_styles() {
        $version = defined('OMENS_THEME_VERSION') ? OMENS_THEME_VERSION : wp_get_theme()->get('Version');
        wp_enqueue_style( 'omens-child-style', get_stylesheet_directory_uri() . '/style.css', null, $version );
    }
}


if( !function_exists('omens_child_theme_setup') ) {
    function omens_child_theme_setup() {
        load_child_theme_textdomain( 'omens-child', get_stylesheet_directory() . '/languages' );
    }
}


require_once 'demo/disable-emoji.php';
require_once 'demo/disable-resource.php';
require_once 'demo/for-demo.php';
require_once 'demo/wp-rocket.php';
