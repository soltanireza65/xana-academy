<?php
add_action('widgets_init', 'xana_sidebar');
function xana_sidebar() {
    $args = array(
        'name'          => 'Help Sidebar',
        'id'            => 'help-sidebar',
        'description'   => '',
        'class'         => '',
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>'
    );
    register_sidebar($args);
}
