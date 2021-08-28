<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_filter('lastudio-kit/branding/name', 'omens_lakit_branding_name');
if(!function_exists('omens_lakit_branding_name')){
    function omens_lakit_branding_name( $name ){
        $name = esc_html__('Theme Options', 'omens');
        return $name;
    }
}

add_filter('lastudio-kit/branding/logo', 'omens_lakit_branding_logo');
if(!function_exists('omens_lakit_branding_logo')){
    function omens_lakit_branding_logo( $logo ){
        $logo = '';
        return $logo;
    }
}

add_filter('lastudio-kit/logo/attr/src', 'omens_lakit_logo_attr_src');
if(!function_exists('omens_lakit_logo_attr_src')){
    function omens_lakit_logo_attr_src( $src ){
        if(!$src){
            $src = get_theme_file_uri('/assets/images/logo.svg');
        }
        return $src;
    }
}

add_filter('lastudio-kit/logo/attr/width', 'omens_lakit_logo_attr_width');
if(!function_exists('omens_lakit_logo_attr_width')){
    function omens_lakit_logo_attr_width( $value ){
        if(!$value){
            $value = 102;
        }
        return $value;
    }
}

add_filter('lastudio-kit/logo/attr/height', 'omens_lakit_logo_attr_height');
if(!function_exists('omens_lakit_logo_attr_height')){
    function omens_lakit_logo_attr_height( $value ){
        if(!$value){
            $value = 22;
        }
        return $value;
    }
}

add_action('elementor/frontend/widget/before_render', 'omens_lakit_add_class_into_sidebar_widget');
if(!function_exists('omens_lakit_add_class_into_sidebar_widget')){
    function omens_lakit_add_class_into_sidebar_widget( $widget ){
        if('sidebar' == $widget->get_name()){
            $widget->add_render_attribute('_wrapper', 'class' , 'widget-area');
        }

    }
}

add_filter('lastudio-kit/products/control/grid_style', 'omens_lakit_add_product_grid_style');
if(!function_exists('omens_lakit_add_product_grid_style')){
    function omens_lakit_add_product_grid_style(){
        return [
            '1' => esc_html__('Type 1', 'omens'),
            '2' => esc_html__('Type 2', 'omens'),
            '3' => esc_html__('Type 3', 'omens'),
            '4' => esc_html__('Type 4', 'omens'),
            '5' => esc_html__('Type 5', 'omens'),
            '6' => esc_html__('Type 6', 'omens'),
            '7' => esc_html__('Type 7', 'omens'),
            '8' => esc_html__('Type 8', 'omens'),
        ];
    }
}
add_filter('lastudio-kit/products/control/list_style', 'omens_lakit_add_product_list_style');
if(!function_exists('omens_lakit_add_product_list_style')){
    function omens_lakit_add_product_list_style(){
        return [
            '1' => esc_html__('Type 1', 'omens'),
            'mini' => esc_html__('Mini', 'omens'),
        ];
    }
}

add_filter('lastudio-kit/products/box_selector', 'omens_lakit_product_change_box_selector');
if(!function_exists('omens_lakit_product_change_box_selector')){
    function omens_lakit_product_change_box_selector(){
        return '{{WRAPPER}} ul.products .product_item--inner';
    }
}

add_filter('lastudio-kit/posts/format-icon', 'bakerfreh_lakit_change_postformat_icon', 10, 2);
if(!function_exists('bakerfreh_lakit_change_postformat_icon')){
    function bakerfreh_lakit_change_postformat_icon( $icon, $type ){
        if($type == 'standard'){
            $icon = '<svg width="50" height="50" viewBox="0 0 50 50" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M24.99 4.98c-1.924 0-3.197 1.352-3.92 2.567-.734 1.233-1.124 2.676-1.177 3.606-.102 1.85.175 3.47 1.098 4.64.96 1.22 2.4 1.687 4 1.687 1.622 0 3.057-.523 4.012-1.742.923-1.18 1.22-2.788 1.1-4.598-.057-.88-.452-2.315-1.185-3.553-.717-1.212-1.99-2.607-3.925-2.607h-.002zm-2.6 6.31c.026-.507.29-1.56.828-2.465.55-.92 1.163-1.345 1.775-1.345.598 0 1.213.43 1.775 1.377.543.925.813 1.983.843 2.446.097 1.5-.185 2.394-.575 2.894-.358.456-.963.783-2.045.783-1.125 0-1.705-.313-2.035-.735-.375-.475-.655-1.36-.568-2.955h.003zM12.5 20a5 5 0 00-5 5v15H6.25a1.25 1.25 0 000 2.5h37.5a1.25 1.25 0 000-2.5H42.5V25a5 5 0 00-5-5h-25zM40 40H10v-9.705l3.863 3.45a5.002 5.002 0 007.07-.405l2.2-2.475a2.502 2.502 0 013.737 0l2.197 2.475a5 5 0 007.073.407L40 30.296V40zm0-13.06l-5.528 4.942a2.5 2.5 0 01-3.535-.202l-2.2-2.475a5 5 0 00-7.474 0l-2.2 2.475a2.5 2.5 0 01-3.535.203L10 26.94V25a2.5 2.5 0 012.5-2.5h25A2.5 2.5 0 0140 25v1.94z" fill="currentColor"/></svg>';
        }
        return $icon;
    }
}