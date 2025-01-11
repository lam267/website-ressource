<?php get_header(); ?>
<main>
    <?php
        $download_title = get_field('download_title', 'option');
        $download_content = get_field('download_content', 'option');
    ?>
    <section class="banner">
        <div class="banner-content">
            <h1 class="banner-title">
                <?php echo $download_title; ?>
            </h1>
        </div>
    </section>
    <section class="info-content">
        <div class="info-box">
            <?php if ($download_content): ?>
                <?php echo wp_kses_post($download_content); ?>
            <?php endif; ?>
        </div>
    </section>
    <section class="downloads-section">
        <div class="downloads-container">
            <div class="category-section">
                <div class="category-filter">
                    <div class="button-filter active" data-id="filter-all">
                        <span>Alle</span>
                    </div>
                    <?php
                        $parent_categories = get_terms([
                            'taxonomy'   => 'download_category',
                            'hide_empty' => false,
                            'parent'     => 0,
                        ]);

                        if (!empty($parent_categories) && !is_wp_error($parent_categories)) :
                            foreach ($parent_categories as $parent_category) :
                    ?>
                   
                    <div class="button-filter"  data-id="<?php echo esc_attr($parent_category->term_id); ?>">
                        <span><?php echo esc_html($parent_category->name); ?></span>
                    </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
                <div class="category-list">
                    <div class="content-item">
                        <div class="downloads-list">
                        <?php
                            $query = new WP_Query([
                                'post_type'      => 'downloads',
                                'posts_per_page' => -1,
                            ]);

                            if ($query->have_posts()) :
                                while ($query->have_posts()) : $query->the_post();
                                        $downloads_link = get_post_meta(get_the_ID(), 'downloads_link', true);
                                        $downloads_description = get_post_meta(get_the_ID(), 'downloads_description', true);
                                    ?>
                                    <div class="download-card">
                                        <div class="card-image">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium'); ?>
                                            <?php else : ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download-item.png" alt="Default Download Image">
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-content">
                                            <span class="category-label">
                                                <?php
                                                if (!empty($category_terms) && !is_wp_error($category_terms)) {
                                                    echo esc_html($category_terms[0]->name);
                                                } 
                                                ?>
                                            </span>
                                            <h3 class="card-title"><?php the_title(); ?></h3>
                                            <p class="card-description">
                                                <?php echo !empty($downloads_description) ? esc_html($downloads_description) : ''; ?>
                                            </p>
                                            <div class="card-footer">
                                                <span class="last-update">Letzte Aktualisierung: <?php echo get_the_date('d.m.Y'); ?></span>
                                                <div class="download-button">
                                                    <span>Herunterladen</span>
                                                    <a href="<?php echo esc_url($downloads_link); ?>" target="_blank" rel="noopener noreferrer">
                                                        <svg width="51" height="51" viewBox="0 0 51 51" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="25.5" cy="25.5" r="25.5" transform="rotate(-180 25.5 25.5)"
                                                                fill="white" />
                                                            <path d="M25.5 12.5L25.5 32.5" stroke="#170049" stroke-width="2" />
                                                            <path d="M33.3672 26.0117L25.4212 32.6333L17.4753 26.0117"
                                                                stroke="#170049" stroke-width="2" />
                                                            <line x1="17" y1="39" x2="34" y2="39" stroke="#FE437D"
                                                                stroke-width="2" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <?php
                                    endwhile;
                                    wp_reset_postdata();
                                else :
                                    echo '<p>No team members found.</p>';
                                endif;
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>