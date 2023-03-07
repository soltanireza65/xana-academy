<?php
function getCustomerDLs() {
    if (!check_ajax_referer("ajax_nonce", "ajax_nonce", false)) {
        wp_send_json_error("Invalid nonce");
        wp_die("false", "Invalid nonce");
    }
    $woo_downloads     = WC()->customer->get_downloadable_products();

    wp_send_json($woo_downloads);
}
add_action(("wp_ajax_getCustomerDLs"), "getCustomerDLs");
// add_action(("wp_ajax_nopriv_getCustomerDLs"), "getCustomerDLs");
