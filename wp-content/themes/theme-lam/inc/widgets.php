<?php

function theme_lam_register_widgets() {
    register_sidebar([
        'name'          => __('Sidebar', 'theme-lam'),
        'id'            => 'sidebar-1',
        'description'   => __('Main sidebar area', 'theme-lam'),
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}

add_action('widgets_init', 'theme_lam_register_widgets');

// Đăng ký các khu vực widget (Widget Areas)
function register_footer_widget_areas() {
    // Cột 1: Liên kết nhanh
    register_sidebar([
        'name'          => __('Footer Column 1', 'text_domain'),
        'id'            => 'footer-column-1',
        'description'   => __('Khu vực hiển thị liên kết nhanh trong footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget footer-column-1 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);

    // Cột 2: Thông tin liên hệ
    register_sidebar([
        'name'          => __('Footer Column 2', 'text_domain'),
        'id'            => 'footer-column-2',
        'description'   => __('Khu vực hiển thị thông tin liên hệ trong footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget footer-column-2 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);

    // Cột 3: Các thông tin khác
    register_sidebar([
        'name'          => __('Footer Column 3', 'text_domain'),
        'id'            => 'footer-column-3',
        'description'   => __('Khu vực hiển thị các thông tin khác trong footer.', 'text_domain'),
        'before_widget' => '<div class="footer-widget footer-column-3 %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h4 class="footer-widget-title">',
        'after_title'   => '</h4>',
    ]);
}
add_action('widgets_init', 'register_footer_widget_areas');
