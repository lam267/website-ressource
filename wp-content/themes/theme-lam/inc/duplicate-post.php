<?php
function duplicate_network_partner_post() {
    if (!current_user_can('edit_posts')) {
        wp_die(__('You do not have sufficient permissions to access this page.'));
    }

    if (!isset($_GET['_wpnonce']) || !wp_verify_nonce($_GET['_wpnonce'], 'duplicate_network_partner_post')) {
        wp_die(__('Nonce verification failed.'));
    }

    $post_id = isset($_GET['post']) ? intval($_GET['post']) : 0;
    $post = get_post($post_id);

    if (!$post || $post->post_type !== 'network_partners') {
        wp_die(__('Invalid post.'));
    }

    $new_post = [
        'post_title'   => $post->post_title . ' (Copy)',
        'post_content' => $post->post_content,
        'post_status'  => 'draft',
        'post_type'    => $post->post_type,
    ];

    $new_post_id = wp_insert_post($new_post);

    $meta_data = get_post_meta($post_id);
    foreach ($meta_data as $key => $value) {
        if (isset($value[0])) {
            update_post_meta($new_post_id, $key, maybe_unserialize($value[0]));
        }
    }

    $taxonomies = get_object_taxonomies($post->post_type, 'names');
    foreach ($taxonomies as $taxonomy) {
        $terms = wp_get_object_terms($post_id, $taxonomy, ['fields' => 'slugs']);
        wp_set_object_terms($new_post_id, $terms, $taxonomy);
    }

    wp_redirect(admin_url('post.php?action=edit&post=' . $new_post_id));
    exit;
}

add_action('admin_action_duplicate_network_partner_post', 'duplicate_network_partner_post');

function add_duplicate_link_to_network_partners($actions, $post) {
    if ($post->post_type === 'network_partners') {
        $duplicate_url = wp_nonce_url(
            admin_url('admin.php?action=duplicate_network_partner_post&post=' . $post->ID),
            'duplicate_network_partner_post'
        );
        $actions['s'] = '<a href="' . esc_url($duplicate_url) . '">' . __('Copy', 'theme-lam') . '</a>';
    }
    return $actions;
}

add_filter('post_row_actions', 'add_duplicate_link_to_network_partners', 10, 2);
