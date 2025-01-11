<?php

function display_copy_button($atts) {
    $atts = shortcode_atts([
        'post_id' => get_the_ID(),
    ], $atts);

    $post_id = intval($atts['post_id']);
    $post = get_post($post_id);

    if (!$post) {
        return '';
    }

    if (!current_user_can('edit_posts')) {
        return '';
    }

    $post_type = $post->post_type;
    $copy_url = wp_nonce_url(
        admin_url('admin.php?action=duplicate_custom_post&post=' . $post_id),
        'duplicate_custom_post'
    );

    return '<a href="' . esc_url($copy_url) . '" class="copy-post-button">' . __('Copy This ' . ucfirst($post_type), 'theme-lam') . '</a>';
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


function team_member_shortcode($atts) {
    $atts = shortcode_atts([
        'name' => '', 
    ], $atts);

    if (empty($atts['name'])) {
        return '<p>' . __('No team member name provided.', 'theme-lam') . '</p>';
    }

    $args = [
        'name'           => sanitize_title($atts['name']),
        'post_type'      => 'team',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
    ];
    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        return '<p>' . __('Team member not found.', 'theme-lam') . '</p>';
    }

    $query->the_post();
    $post_id = get_the_ID();

    $position = get_post_meta($post_id, 'team_position', true); 
    $team_description = get_post_meta($post_id, 'team_description', true); 
    $image_url = get_the_post_thumbnail_url($post_id, 'medium'); 
    $content = apply_filters('the_content', get_the_content()); 

    ob_start();
    ?>
    <div class="expert-box">
        <blockquote>
            <div class="blockquote-title">
                <div class="quote-mark">
                    <svg width="46" height="32" viewBox="0 0 46 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                            fill="#FF437D" />
                    </svg>
                </div>
                <p><?php echo esc_html($team_description); ?></p>
            </div>
            <div class="blockquocte-author">
                <?php if ($image_url): ?>
                    <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                <?php endif; ?>
                <div>
                    <h4><?php echo esc_html(get_the_title()); ?></h4>
                    <?php if ($position): ?>
                        <p><?php echo esc_html($position); ?></p>
                    <?php endif; ?>
                </div>
            </div>
        </blockquote>
    </div>
    <?php
    wp_reset_postdata(); 

    return ob_get_clean();
}
add_shortcode('team_member', 'team_member_shortcode');

function downloads_single_shortcode($atts) {
    $atts = shortcode_atts([
        'id' => null, 
        'name' => null, 
    ], $atts);

    $post = null;
    if (!empty($atts['id'])) {
        $post = get_post($atts['id']);
    } elseif (!empty($atts['name'])) {
        $post = get_page_by_path($atts['name'], OBJECT, 'downloads');
    }

    if (!$post || $post->post_type !== 'downloads') {
        return '<p>' . __('Download not found.', 'theme-lam') . '</p>';
    }
    $categories = wp_get_post_terms($post->ID, 'download_category');
    $category_label = !empty($categories) ? $categories[0]->name : 'Uncategorized';
    $last_update = get_the_modified_date('d.m.Y', $post);
    $download_link = get_post_meta($post->ID, 'download_link', true);

    $thumbnail = get_the_post_thumbnail_url($post->ID, 'medium') ?: get_template_directory_uri() . '/assets/images/download-item.png';

    ob_start();
    ?>
    <section class="download">
        <div class="download-block">
            <p>Download</p>
            <div class="download-card">
                <div class="card-image">
                    <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr($post->post_title); ?>">
                </div>
                <div class="card-content">
                    <span class="category-label"><?php echo esc_html($category_label); ?></span>
                    <h3 class="card-title"><?php echo esc_html($post->post_title); ?></h3>
                    <p class="card-description"><?php echo esc_html(wp_trim_words($post->post_content, 20)); ?></p>
                    <div class="card-footer">
                        <span class="last-update">Letzte Aktualisierung: <?php echo esc_html($last_update); ?></span>
                        <div class="download-button">
                            <a href="<?php echo esc_url($download_link ?: '#'); ?>" target="_blank">
                                <span>Herunterladen</span>
                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="25.5" cy="25.5" r="25.5" transform="rotate(-180 25.5 25.5)" fill="white" />
                                    <path d="M25.5 12.5L25.5 32.5" stroke="#170049" stroke-width="2" />
                                    <path d="M33.3672 26.0117L25.4212 32.6333L17.4753 26.0117" stroke="#170049" stroke-width="2" />
                                    <line x1="17" y1="39" x2="34" y2="39" stroke="#FE437D" stroke-width="2" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    return ob_get_clean();
}
add_shortcode('download', 'downloads_single_shortcode');
