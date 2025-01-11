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

// Đăng ký Custom Post Type "Team"
function add_team_meta_boxes() {
    add_meta_box(
        'team_meta_box', 
        __('Team Details', 'textdomain'), 
        'render_team_meta_box', 
        'team',
        'normal', 
        'high' 
    );
}
add_action('add_meta_boxes', 'add_team_meta_boxes');

function render_team_meta_box($post) {
    $linkedIn = get_post_meta($post->ID, 'team_link', true);
    $address = get_post_meta($post->ID, 'team_address', true);
    $position = get_post_meta($post->ID, 'team_position', true);
    $description = get_post_meta($post->ID, 'team_description', true);

    ?>
     <p>
        <label for="team_link"><?php _e('link:', 'textdomain'); ?></label>
        <input type="text" id="team_link" name="team_link" value="<?php echo esc_attr($linkedIn); ?>" style="width:100%;">
    </p>
    <p>
        <label for="team_address"><?php _e('Address:', 'textdomain'); ?></label>
        <input type="text" id="team_address" name="team_address" value="<?php echo esc_attr($address); ?>" style="width:100%;">
    </p>
    <p>
        <label for="team_position"><?php _e('Position:', 'textdomain'); ?></label>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr($position); ?>" style="width:100%;">
    </p>
    <p>
        <label for="team_description"><?php _e('Description:', 'textdomain'); ?></label>
        <textarea id="team_description" name="team_description" rows="5" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

function save_team_meta_box($post_id) {
    if (!isset($_POST['team_address']) || !current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta($post_id, 'team_link', sanitize_text_field($_POST['team_link']));
    update_post_meta($post_id, 'team_address', sanitize_text_field($_POST['team_address']));
    update_post_meta($post_id, 'team_position', sanitize_text_field($_POST['team_position']));
    update_post_meta($post_id, 'team_description', sanitize_textarea_field($_POST['team_description']));
}
add_action('save_post', 'save_team_meta_box');

// Đăng ký Custom Post Type "Network Partners"
function add_network_description_meta_box() {
    add_meta_box(
        'network_description_meta', 
        __('Partner Description', 'textdomain'), 
        'render_network_description_meta_box', 
        'network_partners', 
        'normal', 
        'high'
    );
}
add_action('add_meta_boxes', 'add_network_description_meta_box');

function render_network_description_meta_box($post) {
    $description = get_post_meta($post->ID, '_network_description', true);

    ?>
    <p>
        <label for="network_description"><?php _e('Description:', 'textdomain'); ?></label>
        <textarea id="network_description" name="network_description" rows="5" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

function save_network_description_meta_box($post_id) {
    if (!isset($_POST['network_description']) || !current_user_can('edit_post', $post_id)) {
        return;
    }

    update_post_meta($post_id, '_network_description', sanitize_textarea_field($_POST['network_description']));
}
add_action('save_post', 'save_network_description_meta_box');

// Đăng ký Custom Post Type "Reviews"

function add_review_meta_box() {
    add_meta_box(
        'review_details',
        __('Reviewer Details', 'textdomain'),
        'render_review_meta_box',
        'reviews',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'add_review_meta_box');

function render_review_meta_box($post) {
    $position = get_post_meta($post->ID, 'reviewer_position', true);

    ?>
    <p>
        <label for="reviewer_position"><?php _e('Position:', 'textdomain'); ?></label>
        <input type="text" id="reviewer_position" name="reviewer_position" value="<?php echo esc_attr($position); ?>" style="width:100%;">
    </p>
    <?php
}

function save_review_meta_box($post_id) {
    if (isset($_POST['reviewer_position'])) {
        update_post_meta($post_id, 'reviewer_position', sanitize_text_field($_POST['reviewer_position']));
    }
}
add_action('save_post', 'save_review_meta_box');

function add_downloads_meta_boxes() {
    add_meta_box(
        'downloads_meta_box', // ID của metabox
        __('Download Details', 'textdomain'), // Tiêu đề metabox
        'render_downloads_meta_box', // Hàm hiển thị metabox
        'downloads', // Post type áp dụng
        'normal', // Vị trí
        'high' // Độ ưu tiên
    );
}
add_action('add_meta_boxes', 'add_downloads_meta_boxes');

function render_downloads_meta_box($post) {
    // Lấy giá trị các meta field
    $link = get_post_meta($post->ID, 'downloads_link', true);
    $description = get_post_meta($post->ID, 'downloads_description', true);
    ?>
    <p>
        <label for="downloads_link"><?php _e('File Link:', 'textdomain'); ?></label>
        <input type="url" id="downloads_link" name="downloads_link" value="<?php echo esc_attr($link); ?>" style="width:100%;">
    </p>
    <p>
        <label for="downloads_description"><?php _e('Description:', 'textdomain'); ?></label>
        <textarea id="downloads_description" name="downloads_description" rows="5" style="width:100%;"><?php echo esc_textarea($description); ?></textarea>
    </p>
    <?php
}

function save_downloads_meta_box($post_id) {
    if (!isset($_POST['downloads_link']) || !current_user_can('edit_post', $post_id)) {
        return;
    }

    // Lưu dữ liệu
    update_post_meta($post_id, 'downloads_link', esc_url_raw($_POST['downloads_link']));
    update_post_meta($post_id, 'downloads_description', sanitize_textarea_field($_POST['downloads_description']));
}
add_action('save_post', 'save_downloads_meta_box');
