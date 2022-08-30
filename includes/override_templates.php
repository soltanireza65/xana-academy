<?php
add_filter('woocommerce_locate_template', 'xana_woo_template', 1, 3);
function xana_woo_template($template, $template_name, $template_path) {
    global $woocommerce;
    $_template = $template;
    if (!$template_path)
        $template_path = $woocommerce->template_url;

    $woo_templates_path  = XANA__PLUGIN_DIR  . '/templates/woocommerce/';

    $template = locate_template(
        array(
            $template_path . $template_name,
            $template_name
        )
    );
    switch ($template_name) {
        case 'myaccount/downloads.php':
        case 'order/order-downloads.php':
        case 'checkout/thankyou.php':
            $template = $woo_templates_path . $template_name;
            break;
    }

    if (!$template)
        $template = $_template;

    return $template;
}


add_filter('single_template', 'load_help_template');
function load_help_template($template) {
    // echo $template;
    global $post;
    if ('help' === $post->post_type && locate_template(array('single-help.php')) !== $template) {
        return XANA__PLUGIN_DIR  . '/templates/single-help.php';
    }
    return $template;
}

add_filter('archive_template', 'load_help_archive_template');
function load_help_archive_template($archive_template) {
    global $post;
    if (is_archive() && get_post_type($post) == 'help') {
        return XANA__PLUGIN_DIR  . '/templates/archive-help.php';
    }
    return $archive_template;
}
