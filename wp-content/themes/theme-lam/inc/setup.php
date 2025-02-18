<?php

function theme_lam_setup() {
    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    register_nav_menus([
        'primary' => __('Primary Menu', 'theme-lam'),
        'footer_column_1' => __('Footer Column 1 Menu', 'theme-lam'),
        'footer_column_2' => __('Footer Column 2 Menu', 'theme-lam'),
    ]);

    add_theme_support('post-formats', [
        'aside',
        'gallery',
        'quote',
        'image',
        'video',
    ]);

    // Hỗ trợ logo tùy chỉnh
    add_theme_support('custom-logo', [
        'height'      => 100,
        'width'       => 300,
        'flex-height' => true,
        'flex-width'  => true,
    ]);

    // Hỗ trợ HTML5 cho form và caption
    add_theme_support('html5', [
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ]);

    // Hỗ trợ editor style
    add_editor_style('assets/css/editor-style.css');
}

// Hook vào after_setup_theme
add_action('after_setup_theme', 'theme_lam_setup');
