<?php

// function get_orders_id_from_product_id($product_id, $args = array()) {
//     //first get all the order ids
//     $query = new WC_Order_Query($args);
//     $order_ids = $query->get_orders();
//     //iterate through order
//     $filtered_order_ids = array();
//     foreach ($order_ids as $order_id) {
//         $order = wc_get_order($order_id);
//         $order_items = $order->get_items();
//         //iterate through an order's items
//         foreach ($order_items as $item) {
//             //if one item has the product id, add it to the array and exit the loop
//             if ($item->get_product_id() == $product_id) {
//                 array_push($filtered_order_ids, $order_id);
//                 break;
//             }
//         }
//     }
//     return $filtered_order_ids;
// }


function get_orders_ids_by_product_id($product_id) {
    global $wpdb;
    $orders_statuses = "'wc-completed', 'wc-processing', 'wc-on-hold'";
    return $wpdb->get_col(
        "
        SELECT DISTINCT woi.order_id
        FROM {$wpdb->prefix}woocommerce_order_itemmeta as woim, 
             {$wpdb->prefix}woocommerce_order_items as woi, 
             {$wpdb->prefix}posts as p
        WHERE  woi.order_item_id = woim.order_item_id
        AND woi.order_id = p.ID
        AND p.post_status IN ( $orders_statuses )
        AND woim.meta_key IN ( '_product_id', '_variation_id' )
        AND woim.meta_value LIKE '$product_id'
        ORDER BY woi.order_item_id DESC"
    );
}


// if you don't add 3 as as 4th argument, this will not work as expected
add_action('save_post', 'xana_on_post_update', 10, 3);
function xana_on_post_update($post_id, $post, $update) {
    if ($post->post_type == 'product') {
        $orders_ids = get_orders_ids_by_product_id($post_id);
        foreach ($orders_ids as $order_id) {
            // xana_woo_downloadable_product_permissions($order_id);
            $data_store = WC_Data_Store::load('customer-download');
            $data_store->delete_by_order_id($order_id);
            wc_downloadable_product_permissions($order_id, true);
        }
    }
}


// function xana_woo_downloadable_product_permissions($order_id) {
//     $data_store = WC_Data_Store::load('customer-download');
//     $data_store->delete_by_order_id($order_id);
//     wc_downloadable_product_permissions($order_id, true);
// }

// add_action('wp_ajax_ccom_regenerate', function () {
//     $offset = empty($_POST['offset']) ? 0 : intval($_POST['offset']);
//     $args = [
//         'post_type' => 'shop_order',
//         'post_status' => 'wc-completed',
//         'posts_per_page' => 100,
//         'offset' => $offset,
//     ];
//     $posts = get_posts($args);

//     if (is_wp_error($posts) || !is_array($posts) || !$posts) {
//         wp_die();
//     }

//     foreach ($posts as $i => $post) {
//         // echo '.';
//         // $order = wc_get_order($post->ID);
//         // if (!$order->has_downloadable_item()) {
//         //     continue;
//         // }
//         xana_woo_downloadable_product_permissions($post->ID);
//         // $data_store = WC_Data_Store::load('customer-download');
//         // $data_store->delete_by_order_id($post->ID);
//         // wc_downloadable_product_permissions($post->ID, true);
//     }

//     wp_die();
// });


// add_action('wp_dashboard_setup', function () {
//     global $wp_meta_boxes;
//     wp_add_dashboard_widget('custom_help_widget', 'Xana Support', function () {
//         echo '
//         <div class="" id="ccom_regenerate">
//             <p>
//                 <a href="#" id="ccom_regenerate_button" class="wp-core-ui button">بروزرسانی درسترسی های دانلود برای تمام سفارشات</a>
//             </p>
//         </div>';
//     });
// });

// add_action('admin_enqueue_scripts', function () {

//     wp_enqueue_script('jquery');

//     wp_add_inline_script('jquery', '
//         var ccom_regenerate_offset = 0;
//         jQuery( document ).ready( function( $ ) {
//             $( "#ccom_regenerate_button" ).click( function() {
//                 ccom_regenerate( $ );
//             } );
//         } );

//         function ccom_regenerate( $ ) {

//             var data = {
//                 "action": "ccom_regenerate",
//                 "offset": ccom_regenerate_offset
//             };
//             $.post( ajaxurl, data, function( response ) {

//                 // Handle EOF Or Error
//                 if( response == "" ) { return; }

//                 // Display Page Processed
//                 $( "div#ccom_regenerate" )
//                     .append("<p>Page " + (ccom_regenerate_offset+1) + " processed</p>")
//                     // .append( " [offset:" + ccom_regenerate_offset + "] " );

//                 // Advance
//                 ccom_regenerate_offset += 100;
//                 ccom_regenerate( $ );

//             } );

//         }

//     ', 'after');
// });
