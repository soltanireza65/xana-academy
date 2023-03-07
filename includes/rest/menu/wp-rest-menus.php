<?php

if (!defined('WPINC')) {
    die;
}

require plugin_dir_path(__FILE__) . '/includes/class-webfiou-wp-rest-menus-controller.php';

function webfiou_wp_rest_menus_init() {
    \Webfiou\WP_REST_Menus_Controller::instance()
        ->register_routes();
}

add_action('rest_api_init', 'webfiou_wp_rest_menus_init');
