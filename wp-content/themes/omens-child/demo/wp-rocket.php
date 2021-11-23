<?php

add_filter('omens/filter/js_path', 'omens_child_get_cdn_url_js_path');
add_filter('omens/filter/theme_path', 'omens_child_get_cdn_url_theme_path');

function omens_child_get_cdn_url_js_path(){
    return omens_child_get_cdn_url() . 'wp-content/themes/omens/assets/js/lib/';
}
function omens_child_get_cdn_url_theme_path(){
    return omens_child_get_cdn_url() . 'wp-content/themes/omens/';
}

function omens_child_get_cdn_url(){
    //return 'https://omens-lastudio.b-cdn.net/';
    return 'https://omens.la-studioweb.com/';
}

add_filter('pre_get_rocket_option_minify_google_fonts', function (){
    return 0;
});

add_action('init', function (){
    ob_start('omens_child_find_gfonts');
}, -4);

function omens_child_find_gfonts($buffer){
    $pattern1 = '<link(?:\s+(?:(?!href\s*=\s*)[^>])+)?(?:\s+href\s*=\s*([\'"])(?<url>(?:https?:)?\/\/fonts\.googleapis\.com\/css2(?:(?!\1).)+)\1)(?:\s+[^>]*)?>';
    $pattern = '<link(?:\s+(?:(?!href\s*=\s*)[^>])+)?(?:\s+href\s*=\s*([\'"])(?<url>(?:https?:)?\/\/fonts\.googleapis\.com\/css[^\d](?:(?!\1).)+)\1)(?:\s+[^>]*)?>';
    preg_match_all( '/' . $pattern . '/Umsi', $buffer, $matches, PREG_SET_ORDER );
    if ( empty( $matches ) ) {
        return $buffer;
    }
    else{
        $fonts = [];
        foreach ($matches as $match){
            $url   = html_entity_decode( $match[2] );
            $query = wp_parse_url( $url, PHP_URL_QUERY );
            if ( empty( $query ) ) {
                return;
            }
            $buffer = str_replace( $match[0], '', $buffer );
            $font = wp_parse_args( $query );
            if ( !empty( $font['family'] ) ) {
                $tmp = explode('|', $font['family']);
                foreach ($tmp as $item){
                    $tmp2 = explode(':', $item);
                    $fonts[$tmp2[0]] = isset($tmp2[1]) ? $tmp2[1] : '';
                }
            }
        }
        if(!empty($fonts)){
            $fonts = array_keys($fonts);
            $new_arr = [];
            foreach ($fonts as $font){
                $new_arr[] = $font . ':300,300italic,n,i,500,500italic,600,600italic,700,700italic';
            }
            $font_url = join('%7C' , $new_arr);
            $font_url = htmlentities($font_url);
            $tag = sprintf(
                '<link rel="preload" href="%1$s" as="style"/><link rel="stylesheet" href="%1$s" />',
                esc_url( "https://fonts.googleapis.com/css?family={$font_url}&display=swap" )
            );
            $buffer = str_replace('</head>', $tag . '</head>', $buffer);
        }
    }
    return $buffer;
}

add_action('script_loader_src', function ($src, $handler){
    if($handler == 'wc-cart-fragments'){
        $theme_version = defined('WP_DEBUG') && WP_DEBUG ? time() : OMENS_THEME_VERSION;
        $src = get_theme_file_uri( '/assets/js/lib/cart-fragments.min.js' ) . '?ver=' . esc_attr($theme_version);
    }
    return $src;
}, 10, 2);