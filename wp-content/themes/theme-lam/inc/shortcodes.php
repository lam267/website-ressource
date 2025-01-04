<?php
function display_copy_button($atts) {
    $atts = shortcode_atts([
        'post_id' => get_the_ID(),
    ], $atts);

    $post_id = intval($atts['post_id']);
    $copy_url = wp_nonce_url(
        admin_url('admin.php?action=duplicate_network_partner_post&post=' . $post_id),
        'duplicate_network_partner_post'
    );

    if (!current_user_can('edit_posts')) {
        return '';
    }

    return '<a href="' . esc_url($copy_url) . '" class="copy-post-button">' . __('Copy This Post', 'theme-lam') . '</a>';
}

add_shortcode('copy_post_button', 'display_copy_button');


function render_message_button_shortcode() {
    ob_start(); 
    ?>
    <div class="message-button d-flex justify-end align-center">
        <span class="message-text">Jetzt Kontakt aufnehmen</span>
        <span class="message-icon d-flex justify-center align-center">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/message_icon.png" alt="Message icon" />
        </span>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('message_button', 'render_message_button_shortcode');
