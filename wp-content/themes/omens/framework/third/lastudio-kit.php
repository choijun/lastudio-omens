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
        return $icon;
    }
}