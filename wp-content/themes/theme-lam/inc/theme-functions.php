<?php

function theme_lam_get_excerpt($limit = 20) {
    $excerpt = wp_trim_words(get_the_excerpt(), $limit, '...');
    return $excerpt;
}

function theme_lam_get_thumbnail_url($post_id) {
    if (has_post_thumbnail($post_id)) {
        return get_the_post_thumbnail_url($post_id, 'full');
    }
    return '';
}

function theme_lam_render_breadcrumbs() {
    if (!is_front_page()) {
        echo '<a href="' . home_url() . '">Home</a> &raquo; ';
        if (is_category() || is_single()) {
            the_category(' &raquo; ');
            if (is_single()) {
                echo ' &raquo; ' . get_the_title();
            }
        } elseif (is_page()) {
            echo the_title();
        }
    }
}
