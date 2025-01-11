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

// custom team post type
function register_team_post_type() {
    register_post_type('team', [
        'labels' => [
            'name' => __('Team Members', 'theme-lam'),
            'singular_name' => __('Team Member', 'theme-lam'),
            'add_new'            => __('Add Team Member', 'theme-lam'),
            'add_new_item'       => __('Add New Team Member', 'theme-lam'),
            'edit_item'          => __('Edit Team Member', 'theme-lam'),
            'new_item'           => __('New Team Member', 'theme-lam'),
            'view_item'          => __('View Team Member', 'theme-lam'),
            'not_found'          => __('No Team Members found', 'theme-lam'),
            'menu_name' => __('Team Members'), 
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'team'],
        'supports' => ['title', 'editor', 'thumbnail'],
    ]);
    register_taxonomy('team_category', 'team', [
        'hierarchical' => true,
        'labels' => [
            'name'              => __('Team Categories', 'theme-lam'),
            'singular_name'     => __('Team Category', 'theme-lam'),
            'search_items'      => __('Search Team Categories', 'theme-lam'),
            'all_items'         => __('All Team Categories', 'theme-lam'),
            'parent_item'       => __('Parent Team Category', 'theme-lam'),
            'parent_item_colon' => __('Parent Team Category:', 'theme-lam'),
            'edit_item'         => __('Edit Team Category', 'theme-lam'),
            'update_item'       => __('Update Team Category', 'theme-lam'),
            'add_new_item'      => __('Add New Team Category', 'theme-lam'),
            'new_item_name'     => __('New Team Category Name', 'theme-lam'),
            'menu_name'         => __('Team Categories', 'theme-lam'),
        ],
        'show_ui'       => true, 
        'show_admin_column' => true, 
        'rewrite'       => ['slug' => 'team'],
    ]);
}

add_action('init', 'register_team_post_type');

function create_downloads_post_type() {
    register_post_type('downloads', array(
        'labels' => array(
            'name' => __('Downloads', 'theme-lam'),
            'singular_name' => __('Download', 'theme-lam'),
            'menu_name' => __('Downloads', 'theme-lam'),
            'all_items' => __('All Downloads', 'theme-lam'),
            'add_new' => __('Add New', 'theme-lam'),
            'add_new_item' => __('Add New Download', 'theme-lam'),
            'edit_item' => __('Edit Download', 'theme-lam'),
            'new_item' => __('New Download', 'theme-lam'),
            'view_item' => __('View Download', 'theme-lam'),
            'search_items' => __('Search Downloads', 'theme-lam'),
            'not_found' => __('No downloads found', 'theme-lam'),
            'not_found_in_trash' => __('No downloads found in trash', 'theme-lam'),
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'downloads', 'with_front' => false),
        'supports' => array('title', 'editor', 'thumbnail'),
        'show_in_rest' => true,
        'menu_icon' => 'dashicons-download',
    ));

    register_taxonomy('download_category', 'downloads', array(
        'labels' => array(
            'name' => __('Download Categories', 'theme-lam'),
            'singular_name' => __('Download Category', 'theme-lam'),
            'search_items' => __('Search Categories', 'theme-lam'),
            'all_items' => __('All Categories', 'theme-lam'),
            'parent_item' => __('Parent Category', 'theme-lam'),
            'parent_item_colon' => __('Parent Category:', 'theme-lam'),
            'edit_item' => __('Edit Category', 'theme-lam'),
            'update_item' => __('Update Category', 'theme-lam'),
            'add_new_item' => __('Add New Category', 'theme-lam'),
            'new_item_name' => __('New Category Name', 'theme-lam'),
        ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array('slug' => 'download-category', 'with_front' => false),
    ));
}
add_action('init', 'create_downloads_post_type');


function register_network_partners_post_type() {
    register_post_type('network_partners', [
        'labels' => [
            'name' => __('Network Partners', 'theme-lam'),
            'singular_name' => __('Network Partner', 'theme-lam'),
            'add_new'            => __('Add Network', 'theme-lam'),
            'add_new_item'       => __('Add New Network', 'theme-lam'),
            'edit_item'          => __('Edit Network', 'theme-lam'),
            'new_item'           => __('New Network', 'theme-lam'),
            'view_item'          => __('View Network', 'theme-lam'),
            'not_found'          => __('No networks found', 'theme-lam'),
            'menu_name' => __('Network Partners'),
        ],
        'public' => true,
        'has_archive' => true,
        'rewrite' => ['slug' => 'network-partners'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'menu_icon' => 'dashicons-networking',
        'show_in_rest' => true, 
    ]);

    register_taxonomy('partner_type', 'network_partners', [
        'labels' => [
            'name' => __('Partner Types', 'theme-lam'),
            'singular_name' => __('Partner Type', 'theme-lam'),
        ],
        'public' => true,
        'hierarchical' => true,
        'rewrite' => ['slug' => 'partner-type'],
        'show_in_rest' => true, 
    ]);
}

add_action('init', 'register_network_partners_post_type');
// reviews
function register_review_post_type() {
    register_post_type('reviews', [
        'labels' => [
            'name'               => __('Reviews', 'theme-lam'),
            'singular_name'      => __('Review', 'theme-lam'),
            'add_new'            => __('Add Review', 'theme-lam'),
            'add_new_item'       => __('Add New Review', 'theme-lam'),
        ],
        'public'        => true,
        'rewrite'       => ['slug' => 'reviews'],
        'supports'      => ['title', 'editor', 'thumbnail'],
        'menu_icon'     => 'dashicons-testimonial',
    ]);
}

add_action('init', 'register_review_post_type');

