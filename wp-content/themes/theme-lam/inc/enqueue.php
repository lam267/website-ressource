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
    wp_enqueue_style('tailwind', 'https://cdn.jsdelivr.net/npm/tailwindcss@3.4.16/dist/tailwind.min.css', [], '3.4.16', 'all');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css', [], '6.0.0', 'all');
    wp_enqueue_style('theme-base-main-css', get_template_directory_uri() . '/assets/css/base/base.css', [], '1.0.0', 'all');
    wp_enqueue_style('theme-lam-general-css', get_template_directory_uri() . '/assets/css/general.css', [], '1.0.0', 'all');
    wp_enqueue_style('theme-lam-style-css', get_template_directory_uri() . '/assets/css/style.css', [], '1.0.0', 'all');
    wp_enqueue_style('theme-lam-responsize-css', get_template_directory_uri() . '/assets/css/responsize.css', [], '1.0.0', 'all');

    if (is_page('home') || is_front_page()) {
        wp_enqueue_style('theme-lam-home-css', get_template_directory_uri() . '/assets/css/home.css', [], '1.0.0', 'all');
    }

    // CSS chỉ dành cho trang Project
    if (is_page('project')) {
        wp_enqueue_style('theme-lam-project-css', get_template_directory_uri() . '/assets/css/project.css', [], '1.0.0', 'all');
    }
    if (is_page('network')) {
        wp_enqueue_style('theme-lam-network-css', get_template_directory_uri() . '/assets/css/network.css', [], '1.0.0', 'all');
    }
    if (is_page('kontakt')) {
        wp_enqueue_style('theme-lam-kontakt-css', get_template_directory_uri() . '/assets/css/contact.css', [], '1.0.0', 'all');
    }
   
    
    if (is_post_type_archive('team')) {
        wp_enqueue_style('theme-lam-team-archive-css', get_template_directory_uri() . '/assets/css/team.css', [], '1.0.0', 'all');
        wp_enqueue_script('theme-lam-team-js', get_template_directory_uri() . '/assets/js/team.js', ['jquery'], '1.0.0', true);
        wp_localize_script('theme-lam-team-js', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('team_nonce'),
        ]);
    }
    if (is_post_type_archive('downloads')) {
        wp_enqueue_style('theme-lam-download-css', get_template_directory_uri() . '/assets/css/download.css', [], '1.0.0', 'all');
        wp_enqueue_script('theme-lam-download-js', get_template_directory_uri() . '/assets/js/download.js', ['jquery'], '1.0.0', true);
        wp_localize_script('theme-lam-download-js', 'ajax_object', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('downloads_nonce'),
        ]);
    }
    if (is_page('news') || is_search()) {
        wp_enqueue_style('theme-lam-news-css', get_template_directory_uri() . '/assets/css/news.css', [], '1.0.0', 'all');
        wp_enqueue_script('theme-lam-news-js', get_template_directory_uri() . '/assets/js/new.js', ['jquery'], '1.0.0', true);
   
        wp_localize_script('theme-lam-news-js', 'ajax_objects', [
            'ajax_url' => admin_url('admin-ajax.php'),
        ]);
    }
    if (is_single()) {
        wp_enqueue_style('theme-lam-detail-css', get_template_directory_uri() . '/assets/css/details.css', [], '1.0.0', 'all');
    }
  
    add_action('wp_enqueue_scripts', 'theme_lam_enqueue_styles');
    
    // Thư viện JS chung
    wp_enqueue_script('swiper-js', 'https://cdnjs.cloudflare.com/ajax/libs/Swiper/11.0.5/swiper-bundle.min.js', ['jquery'], '11.0.5', true);
    wp_enqueue_script('owl-carousel-js', get_template_directory_uri() . '/assets/libs/owl.carousel/owl.carousel.min.js', ['jquery'], '2.3.4', true);
    wp_enqueue_script('theme-slider-init', get_template_directory_uri() . '/assets/js/slider-init.js', ['jquery', 'owl-carousel-js'], '1.0.0', true);
    wp_enqueue_script('theme-lam-main-js', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], '1.0.0', true);
    wp_enqueue_script('theme-lam-custom-js', get_template_directory_uri() . '/assets/js/custom.js', ['theme-lam-main-js'], '1.0.0', true);
  
}
function enqueue_ajax_script() {
}
add_action('wp_enqueue_scripts', 'enqueue_ajax_script');

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
