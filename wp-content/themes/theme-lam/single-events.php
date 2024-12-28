<?php get_header(); ?>

<main>
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="event-detail">
            <h1><?php the_title(); ?></h1>

            <?php if (has_post_thumbnail()) : ?>
                <div class="event-thumbnail">
                    <?php the_post_thumbnail('large'); ?>
                </div>
            <?php endif; ?>

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

            <div class="event-content">
                <?php the_content(); ?>
            </div>
        </article>
    <?php endwhile; endif; ?>
</main>

<?php get_footer(); ?>
