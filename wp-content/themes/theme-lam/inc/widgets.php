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
