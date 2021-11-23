<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
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


add_action('elementor/widget/before_render_content', function ( $instance ){
	if( is_admin() && class_exists('\WC_Query') && is_null( WC_Query::get_main_query() ) && is_woocommerce() ){
		global $wp_query;
		WC()->query->product_query($wp_query);
	}
});


add_filter('get_post_metadata', function ( $check, $object_id, $meta_key, $single, $meta_type ){
	if($single && $meta_key == '_wp_attachment_image_alt'){
		return 'Omens - Multipurpose Creative Theme';
	}
	return $check;
}, 10, 5);

add_filter('lakit_breadcrumbs/page_title', function ( $title ){
	if(is_singular('post')){
		$post_format = get_post_format();
		if(!empty($post_format) && $post_format !== 'standard'){
			$title = sprintf('<h6 class="lakit-breadcrumbs__title">%s Post</h6>', ucfirst($post_format));
		}
		elseif (is_single('standard-post')) {
			$title = '<h6 class="lakit-breadcrumbs__title">Standard Post</h6>';
		}
	}
	return $title;
}, 20, 1);

add_filter('get_post_metadata', function ( $check, $object_id, $meta_key, $single, $meta_type ){

	if( $single && $meta_key == '_la_product_badges' ) {
		if( in_array($object_id, [5091,3087, 3076]) ){
			$check = array(
				array(
					array(
						'text' => 'hot',
						'bg' => '#DE2440',
					)
				)
			);
		}
		if( in_array($object_id, [2160, 3553, 3547]) ){
			$check = array(
				array(
					array(
						'text' => 'hot',
						'bg' => '#DE2440',
					)
				)
			);
		}
	}

	return $check;
}, 10, 5);
