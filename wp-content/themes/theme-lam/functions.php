<?php

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/custom-post-type.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/theme-functions.php';
require_once get_template_directory() . '/inc/metabox.php'; 
require_once get_template_directory() . '/inc/duplicate-post.php';
require_once get_template_directory() . '/inc/shortcodes.php';

// Add theme support 2 cách thêm option page ( thêm trực tiếp hoặc thêm theo function)
if (function_exists('acf_add_options_page')) {
    acf_add_options_page([
        'page_title' => __('Theme Options', 'theme-lam'),
        'menu_title' => __('Theme Options', 'theme-lam'),
        'menu_slug'  => 'theme-options',
        'capability' => 'edit_posts',
        'redirect'   => false,
    ]);
}

function add_custom_meta_box() {
    add_meta_box(
        'custom_meta_box_id',               // ID của meta box
        __('Custom Meta Box', 'textdomain'), // Tiêu đề
        'render_custom_meta_box',           // Hàm callback để hiển thị nội dung
        'page',                             // Post type (post, page, hoặc custom post type)
        'normal',                           // Vị trí (normal, side, advanced)
        'default'                           // Ưu tiên (default, high, low)
    );
}
add_action('add_meta_boxes', 'add_custom_meta_box');

function render_custom_meta_box($post) {
    // Lấy dữ liệu meta đã lưu (nếu có)
    $meta_value = get_post_meta($post->ID, '_custom_meta_key', true);

    // Nonce field để bảo mật
    wp_nonce_field('custom_meta_box_nonce_action', 'custom_meta_box_nonce');

    // Nội dung Meta Box
    echo '<label for="custom_meta_field">';
    echo __('Enter custom value:', 'textdomain');
    echo '</label> ';
    echo '<input type="text" id="custom_meta_field" name="custom_meta_field" value="' . esc_attr($meta_value) . '" size="25" />';
}
function save_custom_meta_box($post_id) {
    // Kiểm tra Nonce
    if (!isset($_POST['custom_meta_box_nonce']) || !wp_verify_nonce($_POST['custom_meta_box_nonce'], 'custom_meta_box_nonce_action')) {
        return $post_id;
    }

    // Kiểm tra quyền chỉnh sửa
    if (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Lưu dữ liệu meta
    $new_meta_value = isset($_POST['custom_meta_field']) ? sanitize_text_field($_POST['custom_meta_field']) : '';
    update_post_meta($post_id, '_custom_meta_key', $new_meta_value);
}
add_action('save_post', 'save_custom_meta_box');

