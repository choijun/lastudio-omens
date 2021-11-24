<?php

// Do not allow directly accessing this file.
if ( ! defined( 'ABSPATH' ) ) {
    exit( 'Direct script access denied.' );
}

function la_omens_get_demo_array($dir_url, $dir_path){

    $demo_items = array(
        'pet-home-01' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-home-01/',
            'title'         => 'Pet Home 01',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-09' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-07' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-home-02' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-home-02/',
            'title'         => 'Pet Home 02',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-07' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-08' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-care' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-care/',
            'title'         => 'Pet Care',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_slider'   => 'pet_care_01.zip',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-01' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-01' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-rescue' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-rescue/',
            'title'         => 'Pet Rescue',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_slider'   => 'pet-rescue.zip',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-08' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-03' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-shop' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-shop/',
            'title'         => 'Pet Shop 01',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_slider'   => 'pet_shop.zip',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-02' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-02' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-shop-02' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-shop-02/',
            'title'         => 'Pet Shop 02',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-03' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-03' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'pet-shop-03' => array(
            'link'          => 'https://omens.la-studioweb.com/pet-shop-03/',
            'title'         => 'Pet Shop 01',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_slider'   => 'pet_shop_03.zip',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-04' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-04' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
        'veterinary' => array(
            'link'          => 'https://omens.la-studioweb.com/veterinary/',
            'title'         => 'Pet Shop 01',
            'data_sample'   => 'demo-data.json',
            'data_product'  => 'products.csv',
            'data_widget'   => 'widget-data.json',
            'data_slider'   => 'veterinary.zip',
            'data_elementor'=> [
                'header'       => [
                    'location' => 'header',
                    'value' => [
                        'omens-header-05' => 'include/general',
                    ],
                ],
                'footer'       => [
                    'location' => 'footer',
                    'value' => [
                        'omens-footer-05' => 'include/general',
                    ],
                ],
            ],
            'category'      => array(
                'Demo',
            )
        ),
    );

    $default_image_setting = array(
        'woocommerce_single_image_width' => 800,
        'woocommerce_thumbnail_image_width' => 400,
        'woocommerce_thumbnail_cropping' => 'custom',
        'woocommerce_thumbnail_cropping_custom_width' => 4,
        'woocommerce_thumbnail_cropping_custom_height' => 5,
        'thumbnail_size_w' => 370,
        'thumbnail_size_h' => 350,
        'medium_size_w' => 0,
        'medium_size_h' => 0,
        'medium_large_size_w' => 0,
        'medium_large_size_h' => 0,
        'large_size_w' => 0,
        'large_size_h' => 0,
    );

    $default_menu = array(
        'main-nav'              => 'Menu Primary'
    );

    $default_page = array(
        'page_for_posts' 	            => 'Blog',
        'woocommerce_shop_page_id'      => 'Shop',
        'woocommerce_cart_page_id'      => 'Cart',
        'woocommerce_checkout_page_id'  => 'Checkout',
        'woocommerce_myaccount_page_id' => 'My Account'
    );

    $slider = $dir_path . 'Slider/';
    $content = $dir_path . 'Content/';
    $product = $dir_path . 'Product/';
    $widget = $dir_path . 'Widget/';
    $setting = $dir_path . 'Setting/';
    $preview = $dir_url;

    $default_elementor = [
        'single-post'       => [
            'location' => 'single',
            'value' => [
                'omens-single-post-sidebar' => 'include/singular/post',
            ],
        ],
        'single-page'       => [
            'location' => 'single',
            'value' => [
                'omens-woocommerce-page' => [
                    'include/singular/page/wishlist',
                    'include/singular/page/compare',
                    'include/singular/page/cart',
                    'include/singular/page/checkout'
                ],
            ]
        ],
        'archive'           => [
            'location' => 'archive',
            'value' => [
                'omens-blog' => 'include/archive'
            ]
        ],
        'search-results'    => [
            'location' => 'archive',
            'value'    => '',
            'default' => [
                'name' => 'include/archive/search'
            ],
        ],
        'error-404'         => [
            'location' => 'single',
            'value' => [
                'omens-404-not-found' => 'include/singular/not_found404'
            ],
        ],
        'product'           => [
            'location' => 'single',
            'value' => [
                'omens-single-product-01' => 'include/product'
            ]
        ],
        'product-archive'   => [
            'location' => 'archive',
            'value' => [
                'omens-shop' => 'include/product_archive'
            ]
        ],
    ];

    $elementor_kit_settings = json_decode('{"page_title_selector":"h1.entry-title","active_breakpoints":["viewport_mobile","viewport_mobile_extra","viewport_tablet","viewport_laptop"],"viewport_mobile":767,"viewport_md":768,"viewport_mobile_extra":991,"viewport_tablet":1279,"viewport_lg":1280,"viewport_laptop":1699,"system_colors":[{"_id":"primary","title":"Primary"},{"_id":"secondary","title":"Secondary"},{"_id":"text","title":"Text"},{"_id":"accent","title":"Accent"}],"custom_colors":[{"_id":"edd5408","title":"OmenColor1","color":"#FD6363"},{"_id":"46ffe72","title":"OmenColor2","color":"#272727"},{"_id":"9b79526","title":"OmenColor3","color":"#4B04EA"},{"_id":"4c46972","title":"OmenColor4","color":"#0632FF"},{"_id":"596de31","title":"OmenColor5","color":"#FD7729"},{"_id":"4ca9ecb","title":"OmenColor6","color":"#FCB93A"},{"_id":"1a4dad5","title":"OmenColor7","color":"#A0A0A0"},{"_id":"995573b","title":"OmenColor8","color":"#676767"},{"_id":"00045e4","title":"OmenColor9","color":"#8966D8"},{"_id":"12bc70a","title":"OmenColor10","color":"#DE2440"},{"_id":"404b02c","title":"OmenColor11","color":"#C6FF6C"},{"_id":"386ba52","title":"OmenColor12","color":"#EFAD6B"},{"_id":"fbe1159","title":"OmenColor13","color":"#00284B"},{"_id":"1aaf7bb","title":"OmenColor14","color":"#49D6B0"},{"_id":"79949b3","title":"OmenColor15","color":"#D66449"},{"_id":"767f6b9","title":"OmenColor16","color":"#FEBB04"},{"_id":"65b8bb4","title":"OmenColor17","color":"#FD7729"}],"system_typography":[{"_id":"primary","title":"Primary"},{"_id":"secondary","title":"Secondary"},{"_id":"text","title":"Text"},{"_id":"accent","title":"Accent"}],"custom_typography":[{"_id":"d4432ad","title":"80Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":80,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":50,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":40,"sizes":[]}},{"_id":"dc9795a","title":"64Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":64,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.1,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-3,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":56,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":36,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":26,"sizes":[]},"typography_letter_spacing_laptop":{"unit":"px","size":-2,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":-1,"sizes":[]}},{"_id":"57d8cfa","title":"64Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":64,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.1,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-3,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":46,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":-2,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":36,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":28,"sizes":[]},"typography_letter_spacing_mobile_extra":{"unit":"px","size":-1,"sizes":[]}},{"_id":"375819f","title":"60Acrumin7","typography_typography":"custom","typography_font_size":{"unit":"px","size":60,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.3,"sizes":[]}},{"_id":"d850aa0","title":"54Acrumin7","typography_typography":"custom","typography_font_size":{"unit":"px","size":54,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.1,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-2,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":36,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":30,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":26,"sizes":[]},"typography_letter_spacing_mobile_extra":{"unit":"px","size":-1,"sizes":[]}},{"_id":"b80b31a","title":"52Acrumin4","typography_typography":"custom","typography_font_size":{"unit":"px","size":52,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-3,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":36,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":30,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":26,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":-2,"sizes":[]},"typography_letter_spacing_mobile_extra":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":46,"sizes":[]},"typography_letter_spacing_laptop":{"unit":"px","size":-2,"sizes":[]}},{"_id":"c8d712b","title":"46Acrumin4","typography_typography":"custom","typography_font_size":{"unit":"px","size":46,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-2,"sizes":[]}},{"_id":"53b9581","title":"44Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":44,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.35,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-2,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":32,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":26,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":24,"sizes":[]}},{"_id":"4eddf0b","title":"42Rubik5","typography_typography":"custom","typography_font_family":"Rubik","typography_font_size":{"unit":"px","size":42,"sizes":[]},"typography_font_weight":"500","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":36,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":30,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":24,"sizes":[]}},{"_id":"51099b0","title":"42Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":42,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":4,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":32,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":26,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":2,"sizes":[]}},{"_id":"cb0c481","title":"42Poppins7a","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":42,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.4,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":36,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":26,"sizes":[]},"typography_letter_spacing_mobile_extra":{"unit":"px","size":0,"sizes":[]}},{"_id":"37e6d70","title":"42Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":42,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.4,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-3,"sizes":[]}},{"_id":"db06c7c","title":"36Rubik5","typography_typography":"custom","typography_font_family":"Rubik","typography_font_size":{"unit":"px","size":36,"sizes":[]},"typography_font_weight":"500","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":32,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":28,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":23,"sizes":[]}},{"_id":"8ea618e","title":"32Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":32,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":26,"sizes":[]}},{"_id":"63370c4","title":"32Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":32,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.4,"sizes":[]}},{"_id":"3b8ec97","title":"32Acrumin7","typography_typography":"custom","typography_font_size":{"unit":"px","size":32,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.1,"sizes":[]}},{"_id":"bc4c881","title":"28Poppins7","typography_typography":"custom","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_font_family":"Poppins","typography_font_size_laptop":{"unit":"px","size":24,"sizes":[]}},{"_id":"991da23","title":"28Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":0,"sizes":[]}},{"_id":"0258988","title":"28Acrumin7","typography_typography":"custom","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.2,"sizes":[]}},{"_id":"8b48716","title":"28Acrumin4","typography_typography":"custom","typography_font_size":{"unit":"px","size":28,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":20,"sizes":[]}},{"_id":"a482cc6","title":"24Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]},"typography_letter_spacing_tablet":{"unit":"px","size":0,"sizes":[]}},{"_id":"54f1bc0","title":"24Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.3,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":20,"sizes":[]}},{"_id":"79c8a9b","title":"24Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.6,"sizes":[]}},{"_id":"c951b57","title":"24Poppins4a","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"normal","typography_letter_spacing":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":20,"sizes":[]}},{"_id":"6fd2a54","title":"24Merri","typography_typography":"custom","typography_font_family":"Merriweather","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"normal","typography_font_style":"italic","typography_line_height":{"unit":"em","size":1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]}},{"_id":"e9062ca","title":"24Acrumin5","typography_typography":"custom","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"500","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]}},{"_id":"b1d2bb8","title":"24Acrumin4","typography_typography":"custom","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.7,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":18,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":16,"sizes":[]}},{"_id":"8cda5c4","title":"24Acrumin4","typography_typography":"custom","typography_font_size":{"unit":"px","size":24,"sizes":[]},"typography_font_weight":"normal","typography_letter_spacing":{"unit":"px","size":-1,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":18,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":18,"sizes":[]},"typography_letter_spacing_mobile_extra":{"unit":"px","size":-0.5,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":22,"sizes":[]}},{"_id":"e8ff659","title":"20Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":20,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.35,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":16,"sizes":[]}},{"_id":"f5a1eed","title":"20Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":20,"sizes":[]},"typography_font_weight":"600","typography_line_height":{"unit":"em","size":1.4,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":15,"sizes":[]}},{"_id":"246fe88","title":"20Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":20,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.2,"sizes":[]}},{"_id":"4094577","title":"20Acrumin5","typography_typography":"custom","typography_font_family":"Acumin Pro","typography_font_size":{"unit":"px","size":20,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"em","size":1.2,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":16,"sizes":[]}},{"_id":"0d3f831","title":"20Acrumin4","typography_typography":"custom","typography_font_family":"Acumin Pro","typography_font_size":{"unit":"px","size":20,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.7,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":16,"sizes":[]}},{"_id":"5abadac","title":"18Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":18,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.7,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":16,"sizes":[]}},{"_id":"d566f38","title":"18Acrumin4","typography_typography":"custom","typography_font_family":"Acumin Pro","typography_font_size":{"unit":"px","size":18,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1.7,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":16,"sizes":[]}},{"_id":"6da5ac3","title":"16Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":16,"sizes":[]},"typography_font_style":"italic"},{"_id":"ccd61c6","title":"150Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":150,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":1,"sizes":[]},"typography_font_size_laptop":{"unit":"px","size":90,"sizes":[]},"typography_font_size_tablet":{"unit":"px","size":80,"sizes":[]},"typography_font_size_mobile_extra":{"unit":"px","size":60,"sizes":[]},"typography_font_size_mobile":{"unit":"px","size":50,"sizes":[]}},{"_id":"745fd33","title":"14Poppins6","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_font_weight":"600","typography_text_transform":"uppercase","typography_line_height":{"unit":"px","size":20,"sizes":[]},"typography_letter_spacing":{"unit":"px","size":1,"sizes":[]}},{"_id":"1440a41","title":"14Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":14,"sizes":[]},"typography_font_weight":"normal","typography_line_height":{"unit":"em","size":2,"sizes":[]}},{"_id":"e2fd926","title":"12Poppins7","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_font_weight":"bold","typography_line_height":{"unit":"px","size":18,"sizes":[]}},{"_id":"24f6f5f","title":"12Poppins4","typography_typography":"custom","typography_font_family":"Poppins","typography_font_size":{"unit":"px","size":12,"sizes":[]},"typography_font_weight":"normal"}],"default_generic_fonts":"Sans-serif","container_width":{"unit":"px","size":1300,"sizes":[]}}', true);

    $data_return = array();

    foreach ($demo_items as $demo_key => $demo_detail){
	    $value = array();

	    $value['title']             = $demo_detail['title'];
	    $value['category']          = !empty($demo_detail['category']) ? $demo_detail['category'] : array('Demo');
	    $value['demo_preset']       = $demo_key;
	    $value['demo_url']          = $demo_detail['link'];
	    $value['preview']           = !empty($demo_detail['preview']) ? $demo_detail['preview'] : ($preview . $demo_key . '.jpg');
	    $value['option']            = $setting . $demo_key . '.json';
	    $value['content']           = !empty($demo_detail['data_sample']) ? $content . $demo_detail['data_sample'] : $content . 'demo-data.json';
	    $value['product']           = !empty($demo_detail['data_product']) ? $product . $demo_detail['data_product'] : $product . 'products.csv';
	    $value['widget']            = !empty($demo_detail['data_widget']) ? $widget . $demo_detail['data_widget'] : $widget . 'widget-data.json';
	    $value['pages']             = array_merge( $default_page, array( 'page_on_front' => $demo_detail['title'] ));
	    $value['menu-locations']    = array_merge( $default_menu, isset($demo_detail['menu-locations']) ? $demo_detail['menu-locations'] : array());
	    $value['other_setting']     = array_merge( $default_image_setting, isset($demo_detail['other_setting']) ? $demo_detail['other_setting'] : array());
	    if(!empty($demo_detail['data_slider'])){
		    $value['slider'] = $slider . $demo_detail['data_slider'];
	    }
        $value['elementor']         = array_merge( $default_elementor, isset($demo_detail['data_elementor']) ? $demo_detail['data_elementor'] : array());
        $value['elementor_kit_settings']         = array_merge( $elementor_kit_settings, isset($demo_detail['elementor_kit_settings']) ? $demo_detail['elementor_kit_settings'] : array());
	    $data_return[$demo_key] = $value;
    }

    return $data_return;
}