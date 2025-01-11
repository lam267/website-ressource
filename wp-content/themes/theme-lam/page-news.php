<?php get_header(); ?>
<main>
    <section class="banner">
        <div class="banner-content">
            <h1 class="banner-title">
                <?php if (get_field('new_title')) {
                    echo get_field('new_title');
                } ?>
            </h1>
        </div>
    </section>
    <section class="news-top">
        <div class="news-backgound">
            <div class="news-pin">
                <?php
                $latest_post = get_posts([
                    'post_type'      => 'post',
                    'posts_per_page' => 1,
                    'orderby'        => 'date',
                    'order'          => 'DESC',
                ]);

                if (!empty($latest_post)) :
                    $post = $latest_post[0];
                    setup_postdata($post);
                ?>
                    <div class="new-item">
                        <div class="new-image">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('medium', ['alt' => get_the_title()]); ?>
                                <?php endif; ?>
                            </a>
                        </div>
                        <div class="new-content">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            <div class="meta">
                                <span class="date"><?php echo get_the_date('d. F Y'); ?></span>
                                <div class="tags d-flex flex-row align-center">
                                    <?php
                                    $post_categorys = get_the_category();
                                    if ($post_categorys) :
                                        foreach ($post_categorys as $cat) :
                                    ?>
                                            <a href="<?php echo get_tag_link($cat->term_id); ?>" class="mini-tag d-flex justify-center align-center">
                                                <?php echo esc_html($cat->name); ?>
                                            </a>
                                    <?php
                                        endforeach;
                                    endif;
                                    ?>
                                    <a  class="mini-tag etc" href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>">
                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    wp_reset_postdata();
                endif;
                ?>
            </div>
        </div>
    </section>

    <!-- News & Stories Section -->
    <section class="news-section">
        <div class="news-background">
            <div class="news-container">
                <div class="content-grid">
                    <div class="latest-news">
                        <!-- Category Tags -->
                        <div class="category-tags">
                            <div class="tags-row">
                                <div class="tag-pill active" data-id="all">Alle</div>
                                <?php
                                $categories = get_categories([
                                    'taxonomy'   => 'category',
                                    'hide_empty' => true,
                                ]);

                                foreach ($categories as $category) {
                                    echo '<div class="tag-pill" data-id="' . esc_attr($category->term_id) . '">' . esc_html($category->name) . '</div>';
                                }
                                ?>
                            </div>
                        </div>
                        <div id="news-card-box">
                        <?php
                            $args = [
                                'post_type'      => 'post',
                                'posts_per_page' => -1,
                                'orderby'        => 'date',
                                'order'          => 'DESC',
                            ];
                                $query = new WP_Query($args);

                                if ($query->have_posts()) :
                                    while ($query->have_posts()) : $query->the_post();
                                ?>
                                <article class="news-card-box" >
                                    <div class="news-card d-flex d-flex flex-row">
                                        <div class="news-card-left">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) : ?>
                                                    <?php the_post_thumbnail('medium', ['class' => 'card-img', 'alt' => get_the_title()]); ?>
                                                <?php else : ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="No image available">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="card-content">
                                            <a href="<?php the_permalink(); ?>">
                                                <h3 class="card-title"><?php the_title(); ?></h3>
                                            </a>
                                            <div class="meta d-flex flex-row">
                                                <span class="date"><?php echo get_the_date('d. F Y'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tags d-flex flex-row align-center">
                                        <?php foreach (get_the_category() as $cat): ?>
                                        <a href="<?php echo get_category_link($cat->term_id); ?>"
                                            class="mini-tag">
                                            <?php echo esc_html($cat->name); ?>
                                        </a>
                                        <?php endforeach; ?>
                                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                                            class="mini-tag">
                                            <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                                <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                                <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                            </svg>
                                        </a>
                                    </div>
                                </article>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<p>No posts found.</p>';
                            endif;
                            ?>
                        </div>
                    </div>
                    
                    <div class="events-section">
                        <h3 class="column-title">Veranstaltungen</h3>
                        <div class="event-card d-flex align-center justify-center flex-column">
                            <div class="event-content">
                                <p class="event-title">
                                    <?php if (get_field('event_title')) {
                                        echo get_field('event_title');
                                    } ?>
                                </p>
                            </div>
                            <div class="event-bottom d-flex justify-around">
                                <p class="event-date">
                                    <?php if (get_field('event_date')) {
                                        echo get_field('event_date');
                                    } ?>
                                </p>
                                <a href="<?php echo esc_url(get_field('event_link')); ?>" class="event-link d-flex align-center">
                                    Zum Event &nbsp; &nbsp;
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 15 15">
                                        <path fill="currentColor" fill-rule="evenodd"
                                            d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <!-- Related Posts -->
                        <div class="related-posts">
                            <h3 class="column-title">Beliebte Beiträge</h3>
                            <div class="related-list" id="related-posts">
                                <?php
                                $sticky_posts = get_option('sticky_posts');

                                if (!empty($sticky_posts)) {
                                    $args = [
                                        'post_type'      => 'post',
                                        'post__in'       => $sticky_posts,
                                        'posts_per_page' => 5,           
                                        'orderby'        => 'date',
                                        'order'          => 'DESC',
                                    ];

                                    $sticky_query = new WP_Query($args);

                                    if ($sticky_query->have_posts()) :
                                        while ($sticky_query->have_posts()) : $sticky_query->the_post();
                                            ?>
                                            <article class="related-card">
                                                <div class="related-card-top d-flex flex-row align-center">
                                                    <div class="related-img">
                                                        <a href="<?php the_permalink(); ?>">
                                                            <?php if (has_post_thumbnail()) : ?>
                                                                <?php the_post_thumbnail('thumbnail', ['alt' => get_the_title()]); ?>
                                                            <?php else : ?>
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/placeholder.png" alt="No image available">
                                                            <?php endif; ?>
                                                        </a>
                                                    </div>
                                                    <div class="related-content">
                                                        <h4 class="related-title">
                                                            <a href="<?php the_permalink(); ?>">
                                                                <?php echo wp_trim_words(get_the_title(), 10, '...'); ?>
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                                <div class="tags">
                                                    <?php foreach (get_the_category() as $cat): ?>
                                                    <a href="<?php echo get_category_link($cat->term_id); ?>"
                                                        class="mini-tag">
                                                        <?php echo esc_html($cat->name); ?>
                                                    </a>
                                                    <?php endforeach; ?>
                                                    <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>"
                                                        class="mini-tag">
                                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </article>
                                            <?php
                                        endwhile;
                                        wp_reset_postdata();
                                    else :
                                        echo '<p>Keine beliebten Beiträge gefunden.</p>';
                                    endif;
                                } else {
                                    echo '<p>Keine beliebten Beiträge gefunden.</p>';
                                }
                                ?>
                            </div>
                            <div class="custom-nav is-mobile">
                                <button class="custom-prev prev2">
                                    <svg width="22" height="15" viewBox="0 0 22 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="21.9492" y1="7.1875" x2="2.23886" y2="7.1875" stroke="white" stroke-width="2" />
                                        <path d="M7.42578 13.4482L2.23884 7.22392L7.42578 0.999594" stroke="white" stroke-width="2" />
                                    </svg>
                                </button>
                                <button class=" custom-next next2">
                                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="#ffffff" stroke-width="2" />
                                        <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="#ffffff" stroke-width="2" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>