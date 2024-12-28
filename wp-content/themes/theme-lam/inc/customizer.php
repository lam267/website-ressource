<?php

function theme_lam_customize_register($wp_customize) {
    $wp_customize->add_section('theme_lam_colors', [
        'title'       => __('Theme Colors', 'theme-lam'),
        'description' => __('Customize the theme colors', 'theme-lam'),
        'priority'    => 30,
    ]);

    $wp_customize->add_setting('header_color', [
        'default'   => '#000000',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_color', [
        'label'    => __('Header Color', 'theme-lam'),
        'section'  => 'theme_lam_colors',
        'settings' => 'header_color',
    ]));
}

add_action('customize_register', 'theme_lam_customize_register');
