<?php

// Đăng ký Custom Post Type "Events"
function theme_lam_register_events_post_type() {
    register_post_type('events', [
        'labels' => [
            'name'               => __('Events', 'theme-lam'),
            'singular_name'      => __('Event', 'theme-lam'),
            'menu_name'          => __('Events', 'theme-lam'),
            'name_admin_bar'     => __('Event', 'theme-lam'),
            'add_new'            => __('Add New', 'theme-lam'),
            'add_new_item'       => __('Add New Event', 'theme-lam'),
            'edit_item'          => __('Edit Event', 'theme-lam'),
            'new_item'           => __('New Event', 'theme-lam'),
            'view_item'          => __('View Event', 'theme-lam'),
            'all_items'          => __('All Events', 'theme-lam'),
            'search_items'       => __('Search Events', 'theme-lam'),
            'not_found'          => __('No events found.', 'theme-lam'),
            'not_found_in_trash' => __('No events found in Trash.', 'theme-lam'),
        ],
        'public'             => true,
        'has_archive'        => true,
        'rewrite'            => ['slug' => 'events'], // URL slug cho CPT
        'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'],
        'menu_icon'          => 'dashicons-calendar',
        'taxonomies'         => ['event-category', 'event-tag'], // Gắn Taxonomy
    ]);
}
add_action('init', 'theme_lam_register_events_post_type');

// Đăng ký Taxonomy cho Events
function theme_lam_register_events_taxonomy() {
    // Event Categories
    register_taxonomy('event-category', 'events', [
        'labels' => [
            'name'          => __('Event Categories', 'theme-lam'),
            'singular_name' => __('Event Category', 'theme-lam'),
            'search_items'  => __('Search Event Categories', 'theme-lam'),
            'all_items'     => __('All Event Categories', 'theme-lam'),
            'edit_item'     => __('Edit Event Category', 'theme-lam'),
            'add_new_item'  => __('Add New Event Category', 'theme-lam'),
        ],
        'hierarchical'      => true, 
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => ['slug' => 'event-category'],
    ]);

    // Event Tags
    register_taxonomy('event-tag', 'events', [
        'labels' => [
            'name'          => __('Event Tags', 'theme-lam'),
            'singular_name' => __('Event Tag', 'theme-lam'),
            'search_items'  => __('Search Event Tags', 'theme-lam'),
            'all_items'     => __('All Event Tags', 'theme-lam'),
            'edit_item'     => __('Edit Event Tag', 'theme-lam'),
            'add_new_item'  => __('Add New Event Tag', 'theme-lam'),
        ],
        'hierarchical'      => false,
        'show_ui'           => true,
        'show_admin_column' => true,
        'rewrite'           => ['slug' => 'event-tag'],
    ]);
}

add_action('init', 'theme_lam_register_events_taxonomy');
