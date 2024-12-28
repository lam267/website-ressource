<?php

function theme_lam_add_event_metabox() {
    add_meta_box(
        'event_details',
        __('Event Details', 'theme-lam'),
        'theme_lam_render_event_metabox',
        'events',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'theme_lam_add_event_metabox');

function theme_lam_render_event_metabox($post) {
    wp_nonce_field('theme_lam_event_nonce_action', 'theme_lam_event_nonce');

    $event_date = get_post_meta($post->ID, '_event_date', true);
    $event_location = get_post_meta($post->ID, '_event_location', true);

    echo '<p><label for="event_date">' . __('Event Date:', 'theme-lam') . '</label>';
    echo '<input type="date" id="event_date" name="event_date" value="' . esc_attr($event_date) . '" /></p>';

    echo '<p><label for="event_location">' . __('Event Location:', 'theme-lam') . '</label>';
    echo '<input type="text" id="event_location" name="event_location" value="' . esc_attr($event_location) . '" /></p>';
}

function theme_lam_save_event_metabox($post_id) {
    if (!isset($_POST['theme_lam_event_nonce']) || !wp_verify_nonce($_POST['theme_lam_event_nonce'], 'theme_lam_event_nonce_action')) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (isset($_POST['event_date'])) {
        update_post_meta($post_id, '_event_date', sanitize_text_field($_POST['event_date']));
    }

    if (isset($_POST['event_location'])) {
        update_post_meta($post_id, '_event_location', sanitize_text_field($_POST['event_location']));
    }
}
add_action('save_post', 'theme_lam_save_event_metabox');
