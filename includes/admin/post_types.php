<?php
function xana_custom_post_types()
{
    register_post_type(
        'help',
        [
            'label' => __('راهنما تریدینگ پلتفرم', 'xana'),
            'description' => __('شرح', 'xana'),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'menu_position' => 4,
            'capability_type' => 'page',
            'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
            'can_export' => true,
            'rewrite' => ['slug' => 'XaniisTradingPlatformhelp'],
        ]
    );

    register_post_type(
        'xana_help',
        [
            'label' => __('راهنمای زانا', 'xana'),
            'description' => __('XanaHelp Description', 'xana'),
            'public' => true,
            'hierarchical' => true,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_admin_bar' => true,
            'show_in_nav_menus' => true,
            'show_in_rest' => true,
            'menu_position' => 5,
            'capability_type' => 'page',
            'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
            'rewrite' => ['slug' => 'XanaHelp'],
            'can_export' => true,
        ]
    );
    register_post_type('brocker', [
        'label' => __('کارگزاری', 'xana'),
        // 'labels' => [
        //     'name' => __('Brockers', 'xana'),
        //     'singular_name' => __('Brocker', 'xana'),
        //     'menu_name' => __('Brockers', 'xana'),
        //     'name_admin_bar' => __('Brocker', 'xana'),
        //     'add_new' => __('Add New', 'xana'),
        //     'add_new_item' => __('Add New Brocker', 'xana'),
        //     'new_item' => __('New Brocker', 'xana'),
        //     'edit_item' => __('Edit Brocker', 'xana'),
        //     'view_item' => __('View Brocker', 'xana'),
        //     'all_items' => __('All Brockers', 'xana'),
        //     'search_items' => __('Search Brockers', 'xana'),
        //     'parent_item_colon' => __('Parent Brockers:', 'xana'),
        //     'not_found' => __('No Brockers found.', 'xana'),
        //     'not_found_in_trash' => __('No Brockers found in Trash.', 'xana'),
        //     'featured_image' => __('Brocker Cover Image', 'xana'),
        //     'set_featured_image' => __('Set cover image', 'xana'),
        //     'remove_featured_image' => __('Remove cover image', 'xana'),
        //     'use_featured_image' => __('Use as cover image', 'xana'),
        //     'archives' => __('Brocker archives', 'xana'),
        //     'insert_into_item' => __('Insert into Brocker', 'xana'),
        //     'uploaded_to_this_item' => __('Uploaded to this Brocker', 'xana'),
        //     'filter_items_list' => __('Filter Brockers list', 'xana'),
        //     'items_list_navigation' => __('Brockers list navigation', 'xana'),
        //     'items_list' => __('Brockers list', 'xana'),

        // ],
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'query_var' => true,
        // 'rewrite' => ['slug' => 'book'],
        'capability_type' => 'post',
        'has_archive' => true,
        'hierarchical' => false,
        'menu_position' => 6,
        'supports' => ['title', 'editor', 'comments', 'revisions', 'trackbacks', 'author', 'excerpt', 'page-attributes', 'thumbnail', 'custom-fields', 'post-formats'],
    ]);
}
add_action('init', 'xana_custom_post_types', 0);