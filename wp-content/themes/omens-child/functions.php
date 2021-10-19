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


/**   OVERRIDE Widget Base  **/
add_action('elementor/element/section/section_layout/before_section_end', function ( $stack ){
    $stack->update_control(
        'html_tag',
        [
            'default' => 'div'
        ]
    );
});

//add_filter('get_post_metadata', function ( $check, $object_id, $meta_key, $single, $meta_type ){
//    if($single && $meta_key == '_wp_attachment_image_alt'){
//        return 'Omens - Multipurpose Creative Theme';
//    }
//    return $check;
//}, 10, 5);


add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);

function posts_columns($defaults){
	$defaults['lakit_post_thumbs'] = __('Thumbs');
	return $defaults;
}

function posts_custom_columns($column_name, $id){
	if($column_name === 'lakit_post_thumbs'){
		echo '<span>';
		the_post_thumbnail( 'featured-thumbnail' );
		echo '</span>';
	}
}

add_action('admin_head', function (){
	?>
	<style>
        .lakit_post_thumbs img {
            width: 80px;
            height: auto;
        }
	</style>
	<?php
});
//add_action('woocommerce_after_shop_loop_item_title','woocommerce_template_loop_price', 10);

//require_once 'demo/disable-emoji.php';
//require_once 'demo/disable-resource.php';
//require_once 'demo/for-demo.php';
//require_once 'demo/wp-rocket.php';