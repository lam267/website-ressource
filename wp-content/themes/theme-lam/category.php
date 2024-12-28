<?php get_header(); ?>

<main>
    <h1><?php single_cat_title(); ?></h1>
    <p><?php echo category_description(); ?></p>

    <?php
    $current_category = get_queried_object_id(); // Lấy ID danh mục hiện tại
    $args = [
        'cat'            => $current_category,
        'posts_per_page' => 10,
        'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
        'orderby'        => 'date', // Sắp xếp theo ngày xuất bản
        'order'          => 'DESC', // Mới nhất lên đầu
    ];
    $query = new WP_Query($args);
    ?>

    <?php if ($query->have_posts()) : ?>
        <div class="post-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <p><?php the_excerpt(); ?></p>
                </article>
            <?php endwhile; ?>
        </div>

        <div class="pagination">
            <?php
            echo paginate_links([
                'total'   => $query->max_num_pages,
                'current' => max(1, get_query_var('paged')),
                'format'  => '?paged=%#%',
                'prev_text' => __('&laquo; Previous', 'theme-lam'),
                'next_text' => __('Next &raquo;', 'theme-lam'),
            ]);
            ?>
        </div>
    <?php else : ?>
        <p><?php _e('No posts found in this category.', 'theme-lam'); ?></p>
    <?php endif; ?>

    <?php wp_reset_postdata(); ?>
</main>

<?php get_footer(); ?>
