<?php
function theme_customize_css_variables($wp_customize) {
    // Section for CSS Variables
    $wp_customize->add_section('css_variables', [
        'title'    => __('CSS Variables', 'theme'),
        'priority' => 30,
    ]);

    // Primary Color
    $wp_customize->add_setting('color_primary', [
        'default'   => '#170049',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_primary',
        [
            'label'    => __('Primary Color', 'theme'),
            'section'  => 'css_variables',
            'settings' => 'color_primary',
        ]
    ));

    // Accent Color
    $wp_customize->add_setting('color_accent', [
        'default'   => '#FF437D',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_accent',
        [
            'label'    => __('Accent Color', 'theme'),
            'section'  => 'css_variables',
            'settings' => 'color_accent',
        ]
    ));

    // Background Color
    $wp_customize->add_setting('color_bg', [
        'default'   => '#FFFFFF',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'color_bg',
        [
            'label'    => __('Background Color', 'theme'),
            'section'  => 'css_variables',
            'settings' => 'color_bg',
        ]
    ));

    // Font Family Base
    $wp_customize->add_setting('font_family_base', [
        'default'   => "'Outfit', sans-serif",
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('font_family_base', [
        'label'   => __('Base Font Family', 'theme'),
        'section' => 'css_variables',
        'type'    => 'select',
        'choices' => [
            "'Outfit', sans-serif"      => 'Outfit',
            "'Roboto', sans-serif"      => 'Roboto',
            "'Arial', sans-serif"       => 'Arial',
            "'Times New Roman', serif"  => 'Times New Roman',
            "'Lora', serif"             => 'Lora',
            "'Montserrat', sans-serif"  => 'Montserrat',
        ],
    ]);

    // Font Size Base
    $wp_customize->add_setting('font_size_base', [
        'default'   => '16px',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('font_size_base', [
        'label'   => __('Base Font Size', 'theme'),
        'section' => 'css_variables',
        'type'    => 'text',
    ]);
}
add_action('customize_register', 'theme_customize_css_variables');

function theme_output_dynamic_css() {
    $color_primary    = get_theme_mod('color_primary', '#170049');
    $color_accent     = get_theme_mod('color_accent', '#FF437D');
    $color_bg         = get_theme_mod('color_bg', '#FFFFFF');
    $font_family_base = get_theme_mod('font_family_base', "'Outfit', sans-serif");
    $font_size_base   = get_theme_mod('font_size_base', '16px');

    echo "<style>
        :root {
            --color-primary: {$color_primary};
            --color-accent: {$color_accent};
            --color-bg: {$color_bg};
            --font-family-base: {$font_family_base};
            --font-size-base: {$font_size_base};
        }
    </style>";
}

add_action('wp_head', 'theme_output_dynamic_css');

function theme_lam_customize_register($wp_customize) {
    $wp_customize->add_setting('header_background_color', [
        'default'   => '#170049',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'header_background_color',
        [
            'label'    => __('Header Background Color', 'theme-lam'),
            'section'  => 'header_image',
            'settings' => 'header_background_color',
        ]
    ));

    $wp_customize->add_setting('header_width', [
        'default'   => '1489',
        'transport' => 'refresh',
    ]);
 
    $wp_customize->add_control('header_width', [
        'label'    => __('Header Width (px)', 'theme-lam'),
        'section'  => 'header_image',
        'settings' => 'header_width',
        'type'     => 'number',
    ]);

    $wp_customize->add_setting('header_height', [
        'default'   => '70',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('header_height', [
        'label'    => __('Header Height (px)', 'theme-lam'),
        'section'  => 'header_image',
        'settings' => 'header_height',
        'type'     => 'number',
    ]);

    //  section Footer Settings
    $wp_customize->add_section('footer_settings', [
        'title'    => __('Footer Settings', 'theme-lam'),
        'priority' => 130,
    ]);

    $wp_customize->add_setting('footer_contact_title', [
        'default'   => __('Sprechen Sie uns an', 'theme-lam'),
        'transport' => 'refresh',
    ]);
    
    $wp_customize->add_control('footer_contact_title', [
        'label'    => __('Footer Contact Title 1', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ]);

    $wp_customize->add_setting('footer_contact_link', [
        'default'   => '#',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('footer_contact_link', [
        'label'    => __('Footer Contact Link', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'url',
    ]);

    $wp_customize->add_setting('footer_contact_span', [
        'default'   => __('um mehr über ressource zu erfahren.', 'theme-lam'),
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('footer_contact_span', [
        'label'    => __('Footer Contact Title 2', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ]);

    $wp_customize->add_setting('footer_title', [
        'default'   => __('Verbundprojekt ressource', 'theme-lam'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('footer_title', [
        'label'    => __('Footer Title', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ]);

    $wp_customize->add_setting('footer_address', [
        'default'   => __('Tel.: 0421/218-61720', 'theme-lam'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('footer_address', [
        'label'    => __('Footer Address', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'text',
    ]);

    $wp_customize->add_setting('footer_email', [
        'default'   => __('writter@uni-bremen.de', 'theme-lam'),
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control('footer_email', [
        'label'    => __('Footer Email', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'email',
    ]);

    $wp_customize->add_setting('footer_logo', [
        'default'   => '',
        'transport' => 'refresh',
    ]);
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'footer_logo',
        [
            'label'    => __('Footer Logo', 'theme-lam'),
            'section'  => 'footer_settings',
            'settings' => 'footer_logo',
        ]
    ));

    $wp_customize->add_setting('footer_linkedin', [
        'default'   => '#',
        'transport' => 'refresh',
    ]);

    $wp_customize->add_control('footer_linkedin', [
        'label'    => __('Footer LinkedIn URL', 'theme-lam'),
        'section'  => 'footer_settings',
        'type'     => 'url',
    ]);
    // section Slider Settings customizer
    $wp_customize->add_section('slider_settings', [
        'title'    => __('Homepage Slider', 'theme-lam'),
        'priority' => 120,
    ]);

    for ($i = 1; $i <= 5; $i++) {
        $wp_customize->add_setting("slider_title_$i", [
            'default'   => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("slider_title_$i", [
            'label'    => __("Slide $i Title", 'theme-lam'),
            'section'  => 'slider_settings',
            'type'     => 'text',
        ]);

        $wp_customize->add_setting("slider_image_$i", [
            'default'   => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control(new WP_Customize_Image_Control(
            $wp_customize,
            "slider_image_$i",
            [
                'label'    => __("Slide $i Image", 'theme-lam'),
                'section'  => 'slider_settings',
                'settings' => "slider_image_$i",
            ]
        ));

        $wp_customize->add_setting("slider_link_$i", [
            'default'   => '',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control("slider_link_$i", [
            'label'    => __("Slide $i Link", 'theme-lam'),
            'section'  => 'slider_settings',
            'type'     => 'url',
        ]);
    }
}
add_action('customize_register', 'theme_lam_customize_register');

function theme_lam_custom_header_setup() {
    add_theme_support('custom-header', [
        'default-image'      => '', 
        'width'              => 1489, 
        'height'             => 70, 
        'flex-height'        => true, 
        'flex-width'         => true, 
        'header-text'        => true, 
        'default-text-color' => '000000',
        'wp-head-callback'   => 'theme_lam_header_style',
    ]);

}
add_action('after_setup_theme', 'theme_lam_custom_header_setup');

function theme_lam_header_style() {
    $header_width = get_theme_mod('header_width', '1489'); 
    $header_height = get_theme_mod('header_height', '70'); 
    ?>
<style type="text/css">
.header {
    max-width: <?php echo esc_attr($header_width);
    ?>px;
    height: <?php echo esc_attr($header_height);
    ?>px;
}
</style>
<?php
}
