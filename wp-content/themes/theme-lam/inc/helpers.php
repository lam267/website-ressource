<?php

function theme_lam_format_date($date) {
    return date_i18n(get_option('date_format'), strtotime($date));
}

function theme_lam_get_category_list($post_id) {
    $categories = get_the_category($post_id);
    $output = [];
    foreach ($categories as $category) {
        $output[] = $category->name;
    }
    return implode(', ', $output);
}
