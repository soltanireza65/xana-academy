<?php
function xana_custom_post_types()
{
    register_post_type(
        'help',
        [
            'label' => __('Help', 'xana'),
            'labels' => [
                //     'name'                  => _x('Helps', 'Helps', 'xana'),
                //     'singular_name'         => _x('Help', 'Help', 'xana'),
                //     'menu_name'             => __('Helps', 'xana'),
                //     'name_admin_bar'        => __('Help', 'xana'),
                //     'archives'              => __('Help Archives', 'xana'),
                //     'attributes'            => __('Help Attributes', 'xana'),
                //     'parent_item_colon'     => __('Parent Help:', 'xana'),
                //     'all_items'             => __('All Helps', 'xana'),
                //     'add_new_item'          => __('Add New Help', 'xana'),
                //     'add_new'               => __('Add New', 'xana'),
                //     'new_item'              => __('New Help', 'xana'),
                //     'edit_item'             => __('Edit Help', 'xana'),
                //     'update_item'           => __('Update Help', 'xana'),
                //     'view_item'             => __('View Help', 'xana'),
                //     'view_items'            => __('View Helps', 'xana'),
                //     'search_items'          => __('Search Help', 'xana'),
                //     'not_found'             => __('Not found', 'xana'),
                //     'not_found_in_trash'    => __('Not found in Trash', 'xana'),
                //     'featured_image'        => __('Featured Image', 'xana'),
                //     'set_featured_image'    => __('Set featured image', 'xana'),
                //     'remove_featured_image' => __('Remove featured image', 'xana'),
                //     'use_featured_image'    => __('Use as featured image', 'xana'),
                //     'insert_into_item'      => __('Insert into Help', 'xana'),
                //     'uploaded_to_this_item' => __('Uploaded to this Help', 'xana'),
                //     'items_list'            => __('Helps list', 'xana'),
                //     'items_list_navigation' => __('Helps list navigation', 'xana'),
                //     'filter_items_list'     => __('Filter Helps list', 'xana'),

            ],
            'description' => __('Help Description', 'xana'),
            'public' => true,
            'hierarchical' => true,
            // 'exclude_from_search'   => false,
            // 'publicly_queryable'    => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            // 'rest_base' => "",
            // 'rest_namespace' => "",
            // 'rest_controller_class' => "",
            'menu_position' => 5,
            // 'menu_icon' => "",
            'capability_type' => 'page',
            // 'capabilities'       => [],
            // 'menu_icon'       => '',
            // 'map_meta_cap'       => '',
            'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
            // 'register_meta_box_cb' => cb,
            // 'taxonomies'            => array('group'),
            'can_export' => true,
            // 'has_archive'           => true,
            'rewrite' => [
                'slug' => 'XaniisTradingPlatformhelp'
            ],
        ]
    );

    register_post_type(
        'xana_help',
        [
            'label' => __('راهنمای زانا', 'xana'),
            'description' => __('XanaHelp Description', 'xana'),
            'public' => true,
            'hierarchical' => true,
            // 'exclude_from_search'   => false,
            // 'publicly_queryable'    => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            // 'rest_base' => "",
            // 'rest_namespace' => "",
            // 'rest_controller_class' => "",
            'menu_position' => 5,
            // 'menu_icon' => "",
            'capability_type' => 'page',
            // 'capabilities'       => [],
            // 'menu_icon'       => '',
            // 'map_meta_cap'       => '',
            'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
            // 'register_meta_box_cb' => cb,
            // 'taxonomies'            => array('group'),
            'can_export' => true,
            // 'has_archive'           => true,
            'rewrite' => [
                'slug' => 'XanaHelp'
            ],
        ]
    );
}
add_action('init', 'xana_custom_post_types', 0);