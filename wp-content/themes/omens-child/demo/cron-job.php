<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/** Cron Job for Sale */
add_filter('cron_schedules', function( $schedules ){
    $schedules['every_10_hours'] = array(
        'interval' => 60 * 60 * 10,
        'display' => __( 'Every 10 hours', 'omens-child' )
    );
    return $schedules;
});

// create a scheduled event (if it does not exist already)
function omens_child_kickoff_cronjob() {
    if( ! wp_next_scheduled( 'omens_child_hooked_for_cronjob' ) ) {
        la_log('kickoff cron job `omens_child_hooked_for_cronjob`');
        wp_schedule_event( time(), 'every_10_hours', 'omens_child_hooked_for_cronjob' );
    }
}
// and make sure it's called whenever WordPress loads
//add_action('wp', 'omens_child_kickoff_cronjob');

// Stop Cron Jobs
//wp_clear_scheduled_hook('omens_child_kickoff_cronjob');

add_action('omens_child_hooked_for_cronjob', function(){

    $_now = strtotime('now');
    $_next_1 = strtotime('+18 hours');
    $_next_2 = strtotime('+17 hours');
    $_next_3 = strtotime('+16 hours');
    $_next_4 = strtotime('+15 hours');

    $product_ids = array(
        64 => array(
            '_regular_price' => '14.99',
            '_sale_price' => '9.99',
            'total_sales' => '11',
            '_stock' => '40',
            '_stock_status' => 'instock',
            '_sale_price_dates_from' => $_now,
            '_sale_price_dates_to' => $_next_1
        ),
        61 => array(
            '_regular_price' => '14.99',
            '_sale_price' => '9.99',
            'total_sales' => '8',
            '_stock' => '30',
            '_stock_status' => 'instock',
            '_sale_price_dates_from' => $_now,
            '_sale_price_dates_to' => $_next_2
        ),
        59 => array(
            '_regular_price' => '14.99',
            '_sale_price' => '9.99',
            'total_sales' => '20',
            '_stock' => '40',
            '_stock_status' => 'instock',
            '_sale_price_dates_from' => $_now,
            '_sale_price_dates_to' => $_next_3
        ),
        57 => array(
            '_regular_price' => '14.99',
            '_sale_price' => '9.99',
            'total_sales' => '30',
            '_stock' => '40',
            '_stock_status' => 'instock',
            '_sale_price_dates_from' => $_now,
            '_sale_price_dates_to' => $_next_4
        )
    );

    foreach( $product_ids as $id => $meta ){
        foreach($meta as $k => $v){
            update_post_meta($id, $k, $v);
        }
    }

});