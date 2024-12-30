<?php
function theme_replace_jquery() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.4.min.js', [], null, true);
        wp_enqueue_script('jquery');
    }
}
add_action('wp_enqueue_scripts', 'theme_replace_jquery');

function theme_lam_enqueue_assets() {
    wp_enqueue_style('theme-local-fonts', get_template_directory_uri() . '/assets/fonts/stylesheet.css', [], null);
    wp_enqueue_style('owl-carousel-css', get_template_directory_uri() . '/assets/libs/owl.carousel/owl.carousel.min.css', [], '2.3.4');

    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/libs/owl.carousel/owl.carousel.min.js', ['jquery'], '2.3.4', true);
   
    wp_enqueue_script('theme-slider-init', get_template_directory_uri() . '/assets/js/slider-init.js', ['jquery', 'owl-carousel-js'], '1.0.0', true);

    wp_enqueue_style(
        'tailwind',
        'https://cdn.tailwindcss.com/3.4.16',
        [],
        '3.3.2',
        'all'
    );

    wp_enqueue_style(
        'font-awesome',
        'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
        [],
        '6.0.0',
        'all'
    );
    wp_enqueue_style(
        'theme-base-main-css',
        get_template_directory_uri() . '/assets/css/base/base.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_style(
        'theme-lam-main-css',
        get_template_directory_uri() . '/assets/css/main.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_style(
        'theme-lam-general-css',
        get_template_directory_uri() . '/assets/css/general.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_style(
        'theme-lam-style-css',
        get_template_directory_uri() . '/assets/css/style.css',
        [],
        '1.0.0',
        'all'
    );

    wp_enqueue_style(
        'theme-lam-custom-css',
        get_template_directory_uri() . '/assets/css/custom.css',
        ['tailwind', 'font-awesome', 'theme-lam-main-css'],
        '1.0.0',
        'all'
    );

    wp_enqueue_script(
        'theme-lam-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        ['jquery'],
        '1.0.0',
        true
    );

    wp_enqueue_script(
        'theme-lam-custom-js',
        get_template_directory_uri() . '/assets/js/custom.js',
        ['theme-lam-main-js'],
        '1.0.0',
        true
    );
}

add_action('wp_enqueue_scripts', 'theme_lam_enqueue_assets');

function theme_lam_enqueue_admin_assets($hook) {
    if ($hook === 'toplevel_page_theme_lam_settings') {
        wp_enqueue_style(
            'theme-lam-admin-css',
            get_template_directory_uri() . '/assets/css/admin.css',
            [],
            '1.0.0',
            'all'
        );

        wp_enqueue_script(
            'theme-lam-admin-js',
            get_template_directory_uri() . '/assets/js/admin.js',
            ['jquery'],
            '1.0.0',
            true
        );
    }
}

add_action('admin_enqueue_scripts', 'theme_lam_enqueue_admin_assets');

// Giải thích:
// wp_enqueue_style(
//     'bootstrap',
//     'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
//     [],
//     '5.3.0',
//     'all'
// );

// wp_enqueue_style(
//     'font-awesome',
//     'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
//     [],
//     '6.0.0',
//     'all'
// );

// wp_enqueue_style(
//     'theme-lam-custom-style',
//     get_template_directory_uri() . '/assets/css/custom.css',
//     ['bootstrap', 'font-awesome'], // Phụ thuộc vào Bootstrap và Font Awesome
//     '1.0.0',
//     'all'
// );
