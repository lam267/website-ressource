<?php get_header(); ?>

<main>
    <h1><?php post_type_archive_title(); ?></h1>

    <?php if (have_posts()) : ?>
        <div class="events-list">
            <?php while (have_posts()) : the_post(); ?>
                <article class="event-item">
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
    <?php else : ?>
        <p>No events found.</p>
    <?php endif; ?>
</main>

<?php get_footer(); ?>
