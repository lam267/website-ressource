<?php get_header(); ?>

<main>
    <h1><?php the_archive_title(); ?></h1>
    <?php
        $args = [
            'post_type'      => 'page',
            'posts_per_page' => -1, 
            'orderby'        => 'menu_order', 
            'order'          => 'ASC', 
        ];

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post(); ?>
                <article>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <?php the_excerpt(); ?>
                </article>
            <?php endwhile;
            wp_reset_postdata();
        endif;
    ?>
</main>

<?php get_footer(); ?>

