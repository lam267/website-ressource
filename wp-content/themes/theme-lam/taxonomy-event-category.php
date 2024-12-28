<?php get_header(); ?>

<main>
    <h1>
        <?php
        if (is_tax('event-category')) {
            single_term_title(__('All Categories: ', 'theme-lam'));
        } else {
            _e('Events Archive', 'theme-lam');
        }
        ?>
    </h1>
    <p><?php echo term_description(); ?></p>
    <?php
    if (!is_tax('event-category') || !get_queried_object_id()) {
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
    } else {?>
        <?php
        $current_term = get_queried_object_id(); // Lấy ID của term (danh mục hiện tại)
        $args = [
            'post_type'      => 'events', // Custom Post Type là "events"
            'tax_query'      => [
                [
                    'taxonomy' => 'event-category', // Taxonomy của sự kiện
                    'field'    => 'term_id',
                    'terms'    => $current_term,
                ],
            ],
            'posts_per_page' => 10,
            'paged'          => get_query_var('paged') ? get_query_var('paged') : 1,
            'orderby'        => 'meta_value', // Sắp xếp theo giá trị meta
            'order'          => 'ASC', // Thứ tự tăng dần
            'meta_key'       => '_event_date', // Sắp xếp theo meta key là ngày sự kiện
            'meta_type'      => 'DATE',
        ];
        $query = new WP_Query($args);
        ?>

    <?php if ($query->have_posts()) : ?>
        <div class="event-list">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <article>
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('medium'); ?>
                        </a>
                    <?php endif; ?>

                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

                    <?php
                    $event_date = get_post_meta(get_the_ID(), '_event_date', true);
                    $event_location = get_post_meta(get_the_ID(), '_event_location', true);
                    ?>

                    <?php if ($event_date) : ?>
                        <p><strong>Date:</strong> <?php echo esc_html($event_date); ?></p>
                    <?php endif; ?>

                    <?php if ($event_location) : ?>
                        <p><strong>Location:</strong> <?php echo esc_html($event_location); ?></p>
                    <?php endif; ?>

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
        <p><?php _e('No events found in this category.', 'theme-lam'); ?></p>
    <?php endif; ?>
    <?php wp_reset_postdata(); 
    }
    ?>
</main>

<?php get_footer(); ?>
