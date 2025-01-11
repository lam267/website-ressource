<?php
function duplicate_custom_post() {
    if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'duplicate_custom_post')) {
        wp_die(__('Unauthorized request.', 'theme-lam'));
    }

    $post_id = isset($_GET['post']) ? intval($_GET['post']) : 0;
    $post = get_post($post_id);

    if (!$post || !current_user_can('edit_posts')) {
        wp_die(__('You do not have permission to copy this post.', 'theme-lam'));
    }

    $new_post_id = wp_insert_post([
        'post_title'   => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_excerpt' => $post->post_excerpt,
        'post_status'  => 'draft',
        'post_type'    => $post->post_type,
        'post_author'  => get_current_user_id(),
    ]);

    $meta_data = get_post_meta($post_id);
    foreach ($meta_data as $key => $values) {
        foreach ($values as $value) {
            add_post_meta($new_post_id, $key, $value);
        }
    }

    $taxonomies = get_object_taxonomies($post->post_type);
    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_post_terms($post_id, $taxonomy, ['fields' => 'ids']);
        wp_set_object_terms($new_post_id, $terms, $taxonomy);
    }

    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}
add_action('admin_action_duplicate_custom_post', 'duplicate_custom_post');

function add_duplicate_link_to_post_actions($actions, $post) {
    if (current_user_can('edit_posts')) {
        $duplicate_url = wp_nonce_url(
            admin_url('admin.php?action=duplicate_custom_post&post=' . $post->ID),
            'duplicate_custom_post'
        );

        $actions['duplicate'] = '<a href="' . esc_url($duplicate_url) . '">' . __('Duplicate', 'theme-lam') . '</a>';
    }

    return $actions;
}

// Áp dụng cho tất cả các post type
add_filter('post_row_actions', 'add_duplicate_link_to_post_actions', 10, 2);
add_filter('page_row_actions', 'add_duplicate_link_to_post_actions', 10, 2);
