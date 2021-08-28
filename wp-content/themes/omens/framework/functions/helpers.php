<?php
/**
 * This file includes helper functions used throughout the theme.
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Return theme settings
 */

if ( ! function_exists( 'omens_get_option' ) ) {

    function omens_get_option( $key = '', $default = '' ) {
        $theme_options = get_option('omens_options', array());

        if(empty($theme_options) || $key == ''){
            $value = $default;
        }
        else{
            $value = !empty($theme_options[$key]) ? $theme_options[$key] : $default;
        }

        return apply_filters( 'omens/filter/get_option', $value, $key, $default, $theme_options);
    }

}

if ( ! function_exists( 'omens_get_post_meta' ) ) {
    function omens_get_post_meta( $object_id, $sub_key = '', $meta_key = '', $single = true ) {

        if (!is_numeric($object_id)) {
            return false;
        }

        if (empty($meta_key)) {
            $meta_key = '_omens_post_options';
        }

        $object_value = get_post_meta($object_id, $meta_key, $single);

        if(!empty($sub_key)){
            if( $single ) {
                if(isset($object_value[$sub_key])){
                    return $object_value[$sub_key];
                }
                else{
                    return false;
                }
            }
            else{
                $tmp = array();
                if( ! empty( $object_value ) ) {
                    foreach( $object_value as $k => $v ){
                        $tmp[] = (isset($v[$sub_key])) ? $v[$sub_key] : '';
                    }
                }
                return $tmp;
            }
        }
        else{
            return $object_value;
        }
    }
}

if ( ! function_exists( 'omens_get_term_meta' ) ) {
    function omens_get_term_meta( $object_id, $sub_key = '', $meta_key = '', $single = true ) {

        if (!is_numeric($object_id)) {
            return false;
        }

        if (empty($meta_key)) {
            $meta_key = '_omens_term_options';
        }

        $object_value = get_term_meta($object_id, $meta_key, $single);

        if(!empty($sub_key)){
            if( $single ) {
                if(isset($object_value[$sub_key])){
                    return $object_value[$sub_key];
                }
                else{
                    return false;
                }
            }
            else{
                $tmp = array();
                if(!empty($object_value)){
                    foreach( $object_value as $k => $v ){
                        $tmp[] = (isset($v[$sub_key])) ? $v[$sub_key] : '';
                    }
                }
                return $tmp;
            }
        }
        else{
            return $object_value;
        }
        
    }
}

if ( ! function_exists( 'omens_get_theme_option_by_context') ) {

    function omens_get_theme_option_by_context( $key = '', $default = '' ){
        if( $key == '' ){
            return $default;
        }

        $value = $value_default = omens_get_option( $key, $default );

        if( is_home() ) {
            $_value = omens_get_option("{$key}_blog");
            if(!empty($_value)){
                if(is_array($_value)){
                    if(omens_array_filter_recursive($_value)){
                        $value = $_value;
                    }
                }
                else{
                    if($_value !== 'inherit'){
                        $value = $_value;
                    }
                }
            }
        }

        if( is_home() || is_front_page() ) {

            if( ($key == 'main_space' || $key == 'main_full_width' || $key == 'container_width' || $key == 'custom_sidebar_width' || $key == 'custom_sidebar_space') && ( is_home() && !is_front_page() ) ) {
                $_value = omens_get_option("{$key}_archive_post");
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }

            if ( $current_object_id = get_queried_object_id() ) {
                $_value = omens_get_post_meta( $current_object_id, $key );
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }
        }
        elseif ( is_singular() ) {

            $post_type = get_query_var('post_type') ? get_query_var('post_type') : ( is_singular('post') ? 'post' : 'page' );

            if(is_array($post_type)){
                $post_type = $post_type[0];
            }

            $post_type = str_replace('la_', '', $post_type);

            /*
             * get {$key} is layout from blog
             */

            if(is_singular('post') && $key == 'layout'){
                $_value = omens_get_option('layout_blog');
                if(!empty($_value) && $_value !== 'inherit'){
                    $value = $_value;
                }
            }

            $_value = omens_get_option("{$key}_single_{$post_type}", $value_default );
            
            if(!empty($_value)){
                if( is_array($_value) ) {
                    if(omens_array_filter_recursive($_value)){
                        $value = $_value;
                    }
                }
                else{
                    if($_value !== 'inherit'){
                        $value = $_value;
                    }
                }
            }
            
            $_value = omens_get_post_meta( get_queried_object_id(), $key );

            if(!empty($_value)){
                if( is_array($_value) ) {
                    if( omens_array_filter_recursive($_value) ){
                        $value = $_value;
                    }
                }
                else{
                    if($_value !== 'inherit'){
                        $value = $_value;
                    }
                }
            }

            if(is_singular('elementor_library')){
                if( $key == 'layout' ) {
                    $value = 'col-1c';
                }
                if( $key == 'page_title_bar_layout'){
                    $value = 'hide';
                }
                if( $key == 'hide_header'){
                    $value = 'yes';
                }
                if( $key == 'hide_footer'){
                    $value = 'yes';
                }
            }
        }

        elseif( is_archive() ) {

            if( function_exists('is_shop') && (is_shop()) ){

                $_value = omens_get_option("{$key}_archive_product", $value_default );
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
                if( $shop_page_id = wc_get_page_id('shop') ){
                    $_value = omens_get_post_meta( $shop_page_id, $key );
                    if(!empty($_value)){
                        if(is_array($_value)){
                            if(omens_array_filter_recursive($_value)){
                                $value = $_value;
                            }
                        }
                        else{
                            if($_value !== 'inherit'){
                                $value = $_value;
                            }
                        }
                    }
                }
            }
            elseif( function_exists('is_product_taxonomy') && is_product_taxonomy() ){
                $_value = omens_get_option("{$key}_archive_product", $value_default);
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
                $_value = omens_get_term_meta( get_queried_object_id(), $key);
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }
            elseif( is_post_type_archive('la_portfolio') ) {
                $_value = omens_get_option("{$key}_archive_portfolio", $value_default);
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }
            elseif( is_tax() && !empty(get_object_taxonomies( 'la_portfolio' )) && is_tax(get_object_taxonomies( 'la_portfolio' ))){
                $_value = omens_get_option("{$key}_archive_portfolio", $value_default);
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
                $_value = omens_get_term_meta( get_queried_object_id(), $key );
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }
            else{
                if($key == 'layout'){
                    if( omens_is_blog() ){
                        $_value = omens_get_option("layout_blog");
                        if(!empty($_value) && $_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
                else{
                    $_value = omens_get_option("{$key}_archive_post", $value_default);
                    if(!empty($_value)){
                        if(is_array($_value)){
                            if(omens_array_filter_recursive($_value)){
                                $value = $_value;
                            }
                        }
                        else{
                            if($_value !== 'inherit'){
                                $value = $_value;
                            }
                        }
                    }
                }

                $_value = omens_get_term_meta( get_queried_object_id(), $key );

                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
            }
        }

        else{
            /*
             * check if is dokan store page
             */
            if(function_exists('dokan_is_store_page') && dokan_is_store_page()){
                $_value = omens_get_option("{$key}_archive_product", $value_default );
                if(!empty($_value)){
                    if(is_array($_value)){
                        if(omens_array_filter_recursive($_value)){
                            $value = $_value;
                        }
                    }
                    else{
                        if($_value !== 'inherit'){
                            $value = $_value;
                        }
                    }
                }
                else{

                    $value = $value_default;
                }
            }
            else{
                /*
                * For search & 404 page
                */
                $value = $value_default;
            }
        }


        return apply_filters('omens/filter/get_theme_option_by_context', $value, $key );

    }

}

/**
 * Return correct schema markup
 */

if ( ! function_exists( 'omens_get_schema_markup' ) ) {

    function omens_get_schema_markup( $location, $original_render = false ) {

        // Return if disable
        if ( ! omens_get_option( 'schema_markup', false ) ) {
            return null;
        }

        // Default
        $schema = $itemprop = $itemtype = '';

        // HTML
        if ( 'html' == $location ) {
            $schema = 'itemscope itemtype="//schema.org/WebPage"';
        }

        // Header
        elseif ( 'header' == $location ) {
            $schema = 'itemscope="itemscope" itemtype="//schema.org/WPHeader"';
        }

        // Logo
        elseif ( 'logo' == $location ) {
            $schema = 'itemscope itemtype="//schema.org/Brand"';
        }

        // Navigation
        elseif ( 'site_navigation' == $location ) {
            $schema = 'itemscope="itemscope" itemtype="//schema.org/SiteNavigationElement"';
        }

        // Main
        elseif ( 'main' == $location ) {
            $itemtype = '//schema.org/WebPageElement';
            $itemprop = 'mainContentOfPage';
            if ( is_singular( 'post' ) ) {
                $itemprop = '';
                $itemtype = '//schema.org/Blog';
            }
        }

        // Breadcrumb
        elseif ( 'breadcrumb' == $location ) {
            $schema = 'itemscope itemtype="//schema.org/BreadcrumbList"';
        }

        // Breadcrumb list
        elseif ( 'breadcrumb_list' == $location ) {
            $schema = 'itemprop="itemListElement" itemscope itemtype="//schema.org/ListItem"';
        }

        // Breadcrumb itemprop
        elseif ( 'breadcrumb_itemprop' == $location ) {
            $schema = 'itemprop="breadcrumb"';
        }

        // Sidebar
        elseif ( 'sidebar' == $location ) {
            $schema = 'itemscope="itemscope" itemtype="//schema.org/WPSideBar"';
        }

        // Footer widgets
        elseif ( 'footer' == $location ) {
            $schema = 'itemscope="itemscope" itemtype="//schema.org/WPFooter"';
        }

        // Headings
        elseif ( 'headline' == $location ) {
            $schema = 'itemprop="headline"';
        }

        // Posts
        elseif ( 'entry_content' == $location ) {
            $schema = 'itemprop="text"';
        }

        // Publish date
        elseif ( 'publish_date' == $location ) {
            $schema = 'itemprop="datePublished"';
        }

        // Author name
        elseif ( 'author_name' == $location ) {
            $schema = 'itemprop="name"';
        }

        // Author link
        elseif ( 'author_link' == $location ) {
            $schema = 'itemprop="author" itemscope="itemscope" itemtype="//schema.org/Person"';
        }

        // Item
        elseif ( 'item' == $location ) {
            $schema = 'itemprop="item"';
        }

        // Url
        elseif ( 'url' == $location ) {
            $schema = 'itemprop="url"';
        }

        // Position
        elseif ( 'position' == $location ) {
            $schema = 'itemprop="position"';
        }

        // Image
        elseif ( 'image' == $location ) {
            $schema = 'itemprop="image"';
        }

        // Name
        elseif ( 'name' == $location ) {
            $schema = 'itemprop="name"';
        }
        else{
            if($original_render){
                $schema = $location;
            }
        }
        return ' ' . apply_filters( 'omens_schema_markup', $schema, $location );

    }

}

if ( ! function_exists( 'omens_schema_markup' ) ) {

    function omens_schema_markup( $location ) {

        echo omens_get_schema_markup( $location );

    }

}



/**
 * Sanitize HTML output
 * @since 1.0.0
 */

if( !function_exists('omens_render_variable') ) {
    function omens_render_variable( $variable ) {
        return $variable;
    }
}

if ( ! function_exists( 'omens_array_filter_recursive' ) ) {

    function omens_array_filter_recursive($array, $callback = null, $remove_empty_arrays = true) {
        if(!is_scalar($array)){
            foreach ($array as $key => & $value) { // mind the reference
                if (is_array($value)) {
                    $value = omens_array_filter_recursive($value, $callback, $remove_empty_arrays);
                    if ($remove_empty_arrays && !(bool) $value) {
                        unset($array[$key]);
                    }
                }
                else {
                    if (!is_null($callback) && !call_user_func($callback, $value, $key)) {
                        unset($array[$key]);
                    }
                    elseif ($value == '' || $key == 'unit') {
                        unset($array[$key]);
                    }
                }
            }
            unset($value); // kill the reference
        }
        return $array;
    }

}

/**
 * @param $content
 * @param bool $autop
 * @return string
 */

if ( ! function_exists( 'omens_transfer_text_to_format' ) ) {
    function omens_transfer_text_to_format ( $content, $autop = false ) {
        if ( $autop ) {
            $content = preg_replace( '/<\/?p\>/', "\n", $content );
            $content = preg_replace( '/<p[^>]*><\\/p[^>]*>/', "", $content );
            $content = wpautop( $content . "\n" );
        }
        return do_shortcode( shortcode_unautop( $content ) );
    }
}

/**
 * Comments and pingbacks
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'omens_comment' ) ) {

    function omens_comment( $comment, $args, $depth ) {

        switch ( $comment->comment_type ) :
            case 'pingback' :
            case 'trackback' :
                // Display trackbacks differently than normal comments.
                ?>

                <div <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">

                <div id="comment-<?php comment_ID(); ?>" class="comment-container">
                    <p><?php esc_html_e( 'Pingback:', 'omens' ); ?> <span><span<?php omens_schema_markup( 'author_name' ); ?>><?php comment_author_link(); ?></span></span> <?php edit_comment_link( esc_html__( '(Edit)', 'omens' ), '<span class="edit-link">', '</span>' ); ?></p>
                </div>

                <?php
                break;
            default :
                // Proceed with normal comments.
                global $post;
                ?>

            <div id="comment-<?php comment_ID(); ?>" class="comment-container">

                <div <?php comment_class( 'comment-body' ); ?>>

                    <?php echo get_avatar( $comment, apply_filters( 'omens_comment_avatar_size', 150 ) ); ?>

                    <div class="comment-content-outer">

                        <div class="comment-author">
                            <h3 class="comment-link"><?php printf( esc_html__( '%s ', 'omens' ), sprintf( '%s', get_comment_author_link() ) ); ?></h3>
                            <span class="comment-meta commentmetadata">
		                    	<span class="comment-date"><?php comment_date('j M Y'); ?></span>
		                    </span>
                        </div>

                        <div class="comment-entry">
                            <?php if ( '0' == $comment->comment_approved ) : ?>
                                <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'omens' ); ?></p>
                            <?php endif; ?>

                            <div class="comment-content">
                                <?php comment_text(); ?>
                            </div>

                        </div>
                        <span class="comment-meta commentmetadata">
                            <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                            <?php edit_comment_link(__('edit', 'omens' )); ?>
                        </span>
                    </div>

                </div><!-- #comment-## -->

                <?php
                break;
        endswitch; // end comment_type check
    }

}

/**
 * Comment fields
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'omens_modify_comment_form_fields' ) ) {

    function omens_modify_comment_form_fields( $fields ) {

        $commenter = wp_get_current_commenter();
        $req       = get_option( 'require_name_email' );

        $fields['author'] 	= '<div class="comment-form-author"><input type="text" name="author" id="author" value="'. esc_attr( $commenter['comment_author'] ) .'" placeholder="'. esc_attr__( 'Name (required)', 'omens' ) .'" size="22" tabindex="101"'. ( $req ? ' aria-required="true"' : '' ) .' class="input-name" /></div>';

        $fields['email'] 	= '<div class="comment-form-email"><input type="text" name="email" id="email" value="'. esc_attr( $commenter['comment_author_email'] ) .'" placeholder="'. esc_attr__( 'Email', 'omens' ) .'" size="22" tabindex="102"'. ( $req ? ' aria-required="true"' : '' ) .' class="input-email" /></div>';

        $fields['url'] 		= '<div class="comment-form-url"><input type="text" name="url" id="url" value="'. esc_attr( $commenter['comment_author_url'] ) .'" placeholder="'. esc_attr__( 'Website', 'omens' ) .'" size="22" tabindex="103" class="input-website" /></div>';

        return $fields;

    }

    add_filter( 'comment_form_default_fields', 'omens_modify_comment_form_fields' );

}

/**
 * String to boolean
 */
if(!function_exists('omens_string_to_bool')){
    function omens_string_to_bool( $string ){
        return is_bool( $string ) ? $string : ( 'yes' === $string || 'on' === $string || 1 === $string || 'true' === $string || '1' === $string );
    }
}

if(!function_exists('omens_entry_meta_item_category_list')){
    function omens_entry_meta_item_category_list($before = '', $after = '', $separator = ', ', $parents = '', $post_id = false){
        add_filter('get_the_terms', 'omens_exclude_demo_term_in_category');
        $categories_list = get_the_category_list('{{_}}', $parents, $post_id );
        omens_deactive_filter('get_the_terms', 'omens_exclude_demo_term_in_category');
        if ( $categories_list ) {
            printf(
                '%3$s<span class="screen-reader-text">%1$s </span><span>%2$s</span>%4$s',
                esc_html_x('Posted in', 'front-view', 'omens'),
                str_replace('{{_}}', $separator, $categories_list),
                $before,
                $after
            );
        }
    }
}

if(!function_exists('omens_exclude_demo_term_in_category')){
    function omens_exclude_demo_term_in_category( $term ){
        return apply_filters('omens/post_category_excluded', $term);
    }
}

if(!function_exists('omens_deactive_filter')){
    function omens_deactive_filter( $tag, $function_to_remove, $priority = 10) {
        return call_user_func('remove_filter', $tag, $function_to_remove, $priority );
    }
}



/**
 * Store current post ID
 *
 * @since 1.0.0
 */
if ( ! function_exists( 'omens_post_id' ) ) {

    function omens_post_id() {

        // Default value
        $id = '';

        // If singular get_the_ID
        if ( is_singular() ) {
            $id = get_the_ID();
        }

        // Get ID of WooCommerce product archive
        elseif ( function_exists('is_shop') && is_shop() ) {
            $shop_id = wc_get_page_id( 'shop' );
            if ( isset( $shop_id ) ) {
                $id = $shop_id;
            }
        }

        // Posts page
        elseif ( is_home() && $page_for_posts = get_option( 'page_for_posts' ) ) {
            $id = $page_for_posts;
        }

        // Apply filters
        $id = apply_filters( 'omens/filter/current_post_id', $id );

        // Sanitize
        $id = $id ? $id : '';

        // Return ID
        return $id;

    }

}



if (!function_exists('omens_wpml_object_id')) {
    function omens_wpml_object_id( $element_id, $element_type = 'post', $return_original_if_missing = false, $ulanguage_code = null ) {
        if ( function_exists( 'wpml_object_id_filter' ) ) {
            return wpml_object_id_filter( $element_id, $element_type, $return_original_if_missing, $ulanguage_code );
        }
        elseif ( function_exists( 'icl_object_id' ) ) {
            return icl_object_id( $element_id, $element_type, $return_original_if_missing, $ulanguage_code );
        }
        else {
            return $element_id;
        }
    }
}

if(!function_exists('omens_is_blog')){
    function omens_is_blog(){
        return (is_home() || is_tag() || is_category() || is_date() || is_year() || is_month() || is_author()) ? true : false;
    }
}

if(!function_exists('omens_get_wishlist_url')){
    function omens_get_wishlist_url(){
        $wishlist_page_id = omens_get_option('wishlist_page', 0);
        return (!empty($wishlist_page_id) ? get_the_permalink($wishlist_page_id) : esc_url(home_url('/wishlist/')));
    }
}

if(!function_exists('omens_get_compare_url')){
    function omens_get_compare_url(){
        $compare_page_id = omens_get_option('compare_page', 0);
        return (!empty($compare_page_id) ? get_the_permalink($compare_page_id) : esc_url(home_url('/compare/')));
    }
}


if(!function_exists('omens_get_custom_breakpoints')){
    function omens_get_custom_breakpoints(){
        if(function_exists('la_get_custom_breakpoints')){
            return la_get_custom_breakpoints();
        }
        else{
	        $custom_breakpoints = get_option('la_custom_breakpoints');
	        $sm = !empty($custom_breakpoints['sm']) ? absint($custom_breakpoints['sm']) : 576;
	        $md = !empty($custom_breakpoints['md']) ? absint($custom_breakpoints['md']) : 992;
	        $lg = !empty($custom_breakpoints['lg']) ? absint($custom_breakpoints['lg']) : 1280;
	        $xl = !empty($custom_breakpoints['xl']) ? absint($custom_breakpoints['xl']) : 1700;

	        if( $sm <= 380 || $sm >= 992 ){
		        $sm = 576;
	        }
	        if( $md <= 992 || $md >= 1280 ){
		        $md = 992;
	        }
	        if( $lg <= 1280 || $lg >= 1700 ){
		        $lg = 1280;
	        }
	        if($lg > $xl){
		        $xl = $lg + 2;
	        }
	        if($xl > 2000){
		        $xl = 1700;
	        }
	        return [
		        'xs' => 0,
		        'sm' => $sm,
		        'md' => $md,
		        'lg' => $lg,
		        'xl' => $xl,
		        'xxl' => 2000
	        ];
        }
    }
}

if(!function_exists('omens_callback_func_to_show_custom_block')){
    function omens_callback_func_to_show_custom_block( $block = array(), $hook_name = '', $priority = 10 ){
        if(!empty($block['content']) && !empty($hook_name)){
            echo '<div class="la-custom-block '. (!empty($block['el_class']) ? esc_attr($block['el_class']) : '') .'">';
            echo omens_transfer_text_to_format($block['content'], true);
            echo '</div>';
        }
    }
}