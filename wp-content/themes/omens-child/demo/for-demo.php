<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

add_filter('lastudio-kit/prepare-do-location', function ( $documents_by_conditions, $location ){
    if(is_page(176)){
        if($location == 'header'){
            $documents_by_conditions = [
                13 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                365 => $location
            ];
        }
    }
    if(is_page(553)){
        if($location == 'header'){
            $documents_by_conditions = [
                478 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                378 => $location
            ];
        }
    }
    if(is_page(793)){
        if($location == 'header'){
            $documents_by_conditions = [
                13 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                365 => $location
            ];
        }
    }
    if(is_page(870)){
        if($location == 'header'){
            $documents_by_conditions = [
                383 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                1726 => $location
            ];
        }
    }
    if(is_page(1018)){
        if($location == 'header'){
            $documents_by_conditions = [
                507 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                1726 => $location
            ];
        }
    }
    if(is_page(1087)){
        if($location == 'header'){
            $documents_by_conditions = [
                436 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                1457 => $location
            ];
        }
    }
    if(is_page(1137)){
        if($location == 'header'){
            $documents_by_conditions = [
                13 => $location
            ];
        }
        elseif ($location == 'footer'){
            $documents_by_conditions = [
                365 => $location
            ];
        }
    }
    return $documents_by_conditions;
}, 10, 2);

function omens_child_change_logo_n($src){

    if(is_page('cake-shop-03')){
        $src =  get_theme_file_uri( '/images/logo-03.svg' );
    }
    elseif(is_page('cake-shop-05')){
        $src =  get_theme_file_uri( '/images/logo-05.svg' );
    }
    elseif(is_page('cake-shop-fullscreen')){
        $src =  get_theme_file_uri( '/images/logo-07.svg' );
    }

    return $src;
}
function omens_child_change_logo_t($src){
    if(is_page('cake-shop-03')){
        $src =  get_theme_file_uri( '/images/logo-03.svg' );
    }
    elseif(is_page('cake-shop-05')){
        $src =  get_theme_file_uri( '/images/logo-05-2.svg' );
    }
    elseif(is_page('cake-shop-fullscreen')){
        $src =  get_theme_file_uri( '/images/logo-07-2.svg' );
    }
    return $src;
}

add_action('elementor/theme/before_do_header', function (){
    add_filter('lastudio-kit/logo/attr/src', 'omens_child_change_logo_n', 20);
    add_filter('lastudio-kit/logo/attr/src2x', 'omens_child_change_logo_t', 20);
});
add_action('elementor/theme/after_do_header', function (){
    remove_filter('lastudio-kit/logo/attr/src', 'omens_child_change_logo_n', 20);
    remove_filter('lastudio-kit/logo/attr/src2x', 'omens_child_change_logo_t', 20);
});

add_action('elementor/theme/before_do_footer', function (){
    add_filter('lastudio-kit/logo/attr/src', 'omens_child_change_logo_n', 20);
    add_filter('lastudio-kit/logo/attr/src2x', 'omens_child_change_logo_t', 20);
});
add_action('elementor/theme/after_do_footer', function (){
    remove_filter('lastudio-kit/logo/attr/src', 'omens_child_change_logo_n', 20);
    remove_filter('lastudio-kit/logo/attr/src2x', 'omens_child_change_logo_t', 20);
});