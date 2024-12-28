<?php
/*
Template Name: Event Categories
*/
get_header();
?>

<main>
    <h1><?php _e('All Event Categories', 'theme-lam'); ?></h1>

    <?php
    // Lấy danh sách tất cả các Term trong taxonomy event-category
    $terms = get_terms([
        'taxonomy'   => 'event-category',
        'hide_empty' => true, // Chỉ lấy các Term có bài viết
    ]);

    if (!empty($terms) && !is_wp_error($terms)) {
        echo '<ul>';
        foreach ($terms as $term) {
            echo '<li><a href="' . esc_url(get_term_link($term)) . '">' . esc_html($term->name) . '</a></li>';
        }
        echo '</ul>';
    } else {
        echo '<p>' . __('No categories found.', 'theme-lam') . '</p>';
    }
    ?>
</main>

<?php get_footer(); ?>
