<?php
add_action("init", "xana_menus");
function xana_menus() {

    register_nav_menus([
        'help-menu' => esc_html__('منوی راهنمای تریدینگ پلتفرم', 'studiare'),
        'xana-help-menu' => esc_html__('منوی راهنمای زانا', 'studiare'),
    ]);
}
