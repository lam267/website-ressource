<?php

require_once get_template_directory() . '/inc/setup.php';
require_once get_template_directory() . '/inc/enqueue.php';
require_once get_template_directory() . '/inc/custom-post-type.php';
require_once get_template_directory() . '/inc/widgets.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/helpers.php';
require_once get_template_directory() . '/inc/theme-functions.php';
require_once get_template_directory() . '/inc/metabox.php'; 

// function theme_lam_event_category_rewrite() {
//     add_rewrite_rule(
//         '^event-category/?$',
//         'index.php?taxonomy=event-category',
//         'top'
//     );
// }
// add_action('init', 'theme_lam_event_category_rewrite');
