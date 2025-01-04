<?php get_header(); ?>
<main>
<?php get_template_part('template-parts/content-section'); ?>
<!-- start intro-section -->
<?php
    $title_intro = get_field('title_intro', 'option');
    $image_intro = get_field('image_intro', 'option');
?>
<section class="intro-section">
    <div class="d-flex intro-section-box">
        <div class="intro-illustrations">
            <img src="<?php echo esc_url($image_intro); ?>" alt="Service illustrations" class="intro-image" />
        </div>
        <div class="intro-content">
            <div class="intro-text">
                <h2 class="intro-title">
                    <?php if ($title_intro): ?>
                    <?php echo wp_kses_post($title_intro); ?>
                    <?php endif; ?>
                </h2>
            </div>
        </div>
    </div>
</section>
<!-- end intro-section -->
<!--  section resource -->
<?php
    $services = get_field('services', 'option');
    $services_link = get_field('services_link', 'option');
    $classes = ['pink-sc', 'pink-bg', 'mint-bg', 'purple-bg'];
    $index = 0;
?>
<section class="services-section">
    <div class="container">
        <?php if ($services): ?>
        <div class="services-grid">
            <div id="carousel2" class="services-owl-carousel owl-carousel owl-theme">
                <?php foreach ($services as $service): ?>
                <?php
                        $current_class = $classes[$index];
                        $index = ($index + 1) % count($classes); 
                    ?>
                <div class="service-card">
                    <div class="card-icon  <?php echo esc_attr($current_class); ?>">
                        <?php if ($service['svg_icon']) {
                            echo $service['svg_icon'];
                        } ?>
                    </div>
                    <p class="service-card-title">
                        <?php if ($service['services_text']) {
                            echo $service['services_text'];
                        } ?>
                    </p>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="services-bottom d-flex justify-between align-center">
            <div class="custom-nav">
                <button class="custom-prev prev2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="m2.707 8l3.147 3.146l-.708.707L.793 7.5l4.353-4.354l.708.708L2.707 7H14v1z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
                <button class="custom-next next2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15">
                        <path fill="currentColor" fill-rule="evenodd"
                            d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
            <div class="button-box button--primary d-inline-flex align-center">
                <a href="<?php echo esc_url($services_link); ?>" class="button button--small">
                    Mehr erfahren
                </a>
                <div class="button-icon">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="#ffffff"
                            stroke-width="2" />
                        <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="#ffffff"
                            stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
<section class="news-section">
    <div class="container">
        <?php
        $categories = get_categories([
            'orderby' => 'name',
            'order'   => 'ASC',
            'hide_empty' => false, 
        ]);

        if ($categories): ?>
        <div class="news-section-top">
            <h2 class="section-title">
                Entdecken Sie unsere <br>
                <a href="#" class="text-pink text-underline">News &
                    Stories</a>
            </h2>
            <!-- Category Tags -->
            <div class="category-tags">
                <div class="tags-row tabs">
                    <?php foreach ($categories as $index => $category): ?>
                    <a class="tab-pill tag-pill <?php echo $index === 0 ? 'active' : ''; ?>"
                        data-tab="tab-<?php echo $category->term_id; ?>">
                        <?php echo esc_html($category->name); ?>
                    </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="content-grid">
            <div class="latest-news">
                <h3 class="column-title">Neueste News</h3>
                <div class="tab-contents">
                    <?php foreach ($categories as $index => $category): ?>
                    <div class="tab-content <?php echo $index === 0 ? 'active' : ''; ?>"
                        id="tab-<?php echo $category->term_id; ?>">
                        <?php
                            $args_first_post = [
                                'cat'            => $category->term_id,
                                'posts_per_page' => 1,
                                'order'          => 'DESC',
                            ];

                            $query_first_post = new WP_Query($args_first_post);

                            if ($query_first_post->have_posts()) :
                                while ($query_first_post->have_posts()) : $query_first_post->the_post(); ?>
                        <article class="featured-article">
                            <div class="article-img">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                            </div>
                            <div class="article-content">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="article-title"><?php the_title(); ?></h3>
                                </a>
                                <div class="meta">
                                    <span class="date"><?php echo get_the_date(); ?></span>
                                    <div class="tags d-flex flex-row align-center">
                                        <?php foreach (get_the_category() as $cat): ?>
                                        <a href="<?php echo get_category_link($cat->term_id); ?>"
                                            class="mini-tag d-flex justify-center align-center">
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
                                </div>
                            </div>
                        </article>
                        <?php endwhile;
                            endif;
                            wp_reset_postdata();
                        ?>
                        <?php
                        $args_next_two_posts = [
                            'cat'            => $category->term_id,
                            'posts_per_page' => 2,
                            'offset'         => 1, 
                            'order'          => 'DESC',
                        ];
                        $query_next_two_posts = new WP_Query($args_next_two_posts);

                        if ($query_next_two_posts->have_posts()):
                            while ($query_next_two_posts->have_posts()): $query_next_two_posts->the_post(); ?>
                        <article class="news-card-box news-card-first">
                            <div class="news-card d-flex d-flex flex-row">
                                <div class="news-card-left">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium', ['class' => 'card-img']); ?>
                                    </a>
                                </div>
                                <div class="card-content">
                                    <a href="<?php the_permalink(); ?>">
                                        <h3 class="card-title"><?php the_title(); ?></h3>
                                    </a>
                                    <div class="meta d-flex flex-row">
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="tags d-flex flex-row align-center">
                                <?php foreach (get_the_category() as $cat): ?>
                                <a href="<?php echo get_category_link($cat->term_id); ?>"
                                    class="mini-tag d-flex justify-center align-center">
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
                        <?php endwhile;
                        wp_reset_postdata();
                        ?>
                        <div class="button-box  button--primary d-flex align-center justify-center">
                            <a href="<?php echo get_category_link($category->term_id); ?>"
                                class="button button--large">
                                <?php _e('Zum News-Blog', 'textdomain'); ?>
                            </a>
                            <div class="button-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 15 15">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="events-section">
                <h3 class="column-title">Veranstaltungen</h3>
                <div class="event-card d-flex align-center justify-center flex-column"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blur_box.png');">
                    <div class="event-content">
                        <p class="event-title">
                            World Health
                            Day 2024
                        </p>
                    </div>
                    <div class="event-bottom d-flex justify-around">
                        <p class="event-date">06. August 2024</p>
                        <a href="#" class="event-link d-flex align-center">
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
                    <?php
                    $sticky_posts = get_option('sticky_posts');

                    if (!empty($sticky_posts)) {
                        $args = [
                            'post__in'       => $sticky_posts, 
                            'posts_per_page' => -1,
                            'orderby'        => 'date',
                            'order'          => 'DESC',
                        ];

                        $query = new WP_Query($args);

                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post(); ?>
                    <article class="related-card related-card-first">
                        <div class="related-card-top d-flex flex-row align-center">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) {
                                                the_post_thumbnail('medium');
                                            } ?>
                            </a>
                            <div class="related-content">
                                <a href="<?php the_permalink(); ?>">
                                    <h3 class="related-title"><?php the_title(); ?></h3>
                                </a>
                            </div>
                        </div>
                        <div class="tags">
                            <?php foreach (get_the_category() as $cat): ?>
                            <a href="<?php echo get_category_link($cat->term_id); ?>"
                                class="mini-tag d-flex justify-center align-center">
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
                    <?php endwhile;
                        endif;
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>

        </div>
        <?php
            $all_categories_url = get_permalink(get_option('page_for_posts')); 

            if (!$all_categories_url) {
                $categories = get_categories(['hide_empty' => false]);
                if (!empty($categories)) {
                    $all_categories_url = get_category_link($categories[0]->term_id);
                }
            }
        ?>

        <div class="button-box  button--primary d-flex align-center justify-center">
            <a class="button button--large" href='<?php echo esc_url($all_categories_url); ?>'>
                Zum News-Blog
            </a>
            <div class="button-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 15 15">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        </div>
        <?php endif; ?>
    </div>
</section>
 <!-- Video section -->
 <?php
    $video_image = get_field('video_image', 'option');
    $video_description = get_field('video_description', 'option');
    $video_link = get_field('video_link', 'option');
    $link_video_more = get_field('link_video_more', 'option');
?>
 <section class="videos-section">
    <div class="container">
        <div class="video-box">
            <div class="video-description">
                <p>
                    <?php if ($video_description): ?>
                            <?php echo wp_kses_post($video_description); ?>
                    <?php endif; ?>
                </p>
                <div class="button-box button--primary d-inline-flex align-center">
                    <a href="<?php echo esc_url($link_video_more); ?>" class="button button--small">
                        Mehr erfahren
                    </a>
                    <div class="button-icon">
                        <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                stroke-width="2" />
                            <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="white"
                                stroke-width="2" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="video-play">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/button-play.png" >
            </div>
            <div class="video-thumb">
                <iframe width="1484" height="669"
                    src="<?php echo esc_url($video_link); ?>">
                </iframe>
                <?php if ($video_image): ?>
                    <img src="<?php echo esc_url($video_image); ?>" alt="Video play">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<!-- end Video section -->

<!-- Team Section -->
<?php
    $args = [
        'post_type'      => 'team',
        'posts_per_page' => 5, 
        'order'          => 'DESC',
    ];
    $teams_query = new WP_Query($args);
    $team_title = get_field('team_title', 'option');

if ($teams_query->have_posts()) : ?>
<section class="team-section">
    <div class="container">
        <div class="team-section-box">
            <h2 class="team-title">
                <?php echo wp_kses_post($team_title); ?>
            </h2>
            <div class="team-carousel">
                <div id="carousel3" class="team-cards team-cards-pc owl-carousel owl-theme">
                    <?php 
                        $i = 0; 
                        $classes = ['pink-bg', 'mint-bg', 'pink-sc', 'purple-bg']; 

                        while ($teams_query->have_posts()) : 
                            $teams_query->the_post(); 
                            $team_address = get_post_meta(get_the_ID(), 'team_address', true);
                            $team_position = get_post_meta(get_the_ID(), 'team_position', true);
                            $current_class = $classes[$i % count($classes)]; 
                    ?>   
                        <div class="team-card pink-bg <?php echo esc_attr($current_class); ?>">
                            <div class="quote-mark">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                        fill="#FF437D" />
                                </svg>
                            </div>
                            <div class="member-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="member-info d-flex flex-column">
                                <h3 class="member-name">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="member-role">
                                    <?php echo esc_html($team_address); ?>
                                    <?php echo esc_html($team_position); ?>
                                </p>
                            </div>
                        </div>
                    <?php 
                        $i++;
                        endwhile; 
                    ?>
                </div>
                <div class="team-cards-mobi team-cards">
                    <?php 
                        $i = 0; 
                        $classes = ['pink-bg', 'mint-bg', 'pink-sc', 'purple-bg']; 

                        while ($teams_query->have_posts()) : 
                            $teams_query->the_post(); 
                            $team_address = get_post_meta(get_the_ID(), 'team_address', true);
                            $team_position = get_post_meta(get_the_ID(), 'team_position', true);
                            $current_class = $classes[$i % count($classes)]; 
                    ?>   
                        <div class="team-card pink-bg <?php echo esc_attr($current_class); ?>">
                            <div class="quote-mark">
                                <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                        fill="#FF437D" />
                                </svg>
                            </div>
                            <div class="member-image">
                                <?php the_post_thumbnail('medium'); ?>
                            </div>
                            <div class="member-info d-flex flex-column">
                                <h3 class="member-name">
                                    <?php the_title(); ?>
                                </h3>
                                <p class="member-role">
                                    <?php echo esc_html($team_address); ?>
                                </p>
                                <p class="member-role">
                                    <?php echo esc_html($team_position); ?>
                                </p>
                            </div>
                        </div>
                    <?php 
                        $i++;
                        endwhile; 
                    ?>
                </div>
                <div class="more-team">
                    <a href="#">Weitere Teammitglieder anzeigen</a>
                    <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="6" y1="-4.37113e-08" x2="6" y2="12" stroke="white" stroke-width="2" />
                        <line x1="-8.74228e-08" y1="6" x2="12" y2="6" stroke="white" stroke-width="2" />
                    </svg>
                </div>
                <div class="team-bottom d-flex justify-between align-center">
                    <div class="custom-nav">
                        <button class="custom-prev prev3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15">
                                <path fill="#ffffff" fill-rule="evenodd"
                                    d="m2.707 8l3.147 3.146l-.708.707L.793 7.5l4.353-4.354l.708.708L2.707 7H14v1z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                        <button class="custom-next next3">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 15 15">
                                <path fill="#ffffff" fill-rule="evenodd"
                                    d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                    <div class="button-box button--secondary d-inline-flex align-center">
                        <button class="button button--small">
                            Mehr erfahren
                        </button>
                        <div class="button-icon">
                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="#170049"
                                    stroke-width="2" />
                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="#170049"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; 
    wp_reset_postdata();
?>
<!-- end team seation -->
<!-- Network Section -->
<?php
$partner_types = get_terms([
    'taxonomy' => 'partner_type',
    'hide_empty' => false, 
]);
if (!empty($partner_types) && !is_wp_error($partner_types)) : ?>
<section class="network-section">
<div class="container">
    <div class="network-section-box">
        <h2 class="network-title">
            Das ressource <a href="#" class="text-pink text-underline">Netzwerk</a>
        </h2>
        <div class="category-tags d-flex align-center flex-row justify-center">
            <?php foreach ($partner_types as $index => $term) : ?>
                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="tag <?php echo $index === 0 ? 'active' : ''; ?> d-flex align-center justify-center"
                   data-category="<?php echo esc_attr($term->slug); ?>">
                    <?php echo wp_kses_post($term->name); ?>
                </a>
            <?php endforeach; ?>
        </div>
        <?php foreach ($partner_types  as $index => $partner_type) : ?>
            <div class="list-tags <?php echo $index === 0 ? 'active' : ''; ?>" id="<?php echo esc_attr($partner_type->slug); ?>">
                <div class="network-content network-content-pc">
                    <div class="network-box">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <?php
                                    $query = new WP_Query([
                                        'post_type' => 'network_partners',
                                        'tax_query' => [
                                            [
                                                'taxonomy' => 'partner_type',
                                                'field'    => 'slug',
                                                'terms'    => $partner_type->slug,
                                            ],
                                        ],
                                    ]);
                                if ($query->have_posts()) :
                                    $is_first = true;
                                    while ($query->have_posts()) : $query->the_post();
                                        ?>
                                        <div class="swiper-slide ">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full') ?: './assets/images/default-logo.png'); ?>"
                                                        alt="<?php the_title_attribute(); ?>"/>
                                                    </div>
                                                    <span><?php the_title(); ?></span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788" y2="5.68653"
                                                                stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                        wp_reset_postdata();
                                    ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="navigation-buttons ">
                            <div class="button--primary">
                                <div class="button-icon button-icon-small prev-slide">
                                    <svg width="15" height="22" viewBox="0 0 15 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="7.1875" y1="4.37114e-08" x2="7.1875" y2="19.7104" stroke="white"
                                            stroke-width="2" />
                                        <path d="M13.4492 14.5225L7.22489 19.7094L1.00057 14.5225" stroke="white"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                            <div class="button--primary">
                                <div class="button-icon button-icon-small next-slide">
                                    <svg width="14" height="22" viewBox="0 0 14 22" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="7.12695" y1="21.1797" x2="7.12695" y2="1.46933" stroke="white"
                                            stroke-width="2" />
                                        <path d="M0.865234 6.65723L7.08956 1.47029L13.3139 6.65723" stroke="white"
                                            stroke-width="2" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="partner-detail">
                        <?php
                            if ($query->have_posts()) :
                                $is_first = true;
                                while ($query->have_posts()) : $query->the_post(); ?>
                                <div class="partner-item">
                                    <div class="content">
                                        <?php the_content(); ?>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <a href="<?php the_permalink(); ?>" class="button button--large"><?php _e('Mitglieder ansehen', 'theme-lam'); ?></a>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="white"
                                                    stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            <?php 
                                $is_first = false;
                                endwhile;
                                wp_reset_postdata();
                            endif;
                        ?>
                    </div>
                </div>
                <div class="network-content network-content-mobi">
                    <div class="network-box">
                    <?php
                        $query = new WP_Query([
                            'post_type' => 'network_partners',
                            'tax_query' => [
                                [
                                    'taxonomy' => 'partner_type',
                                    'field'    => 'slug',
                                    'terms'    => $partner_type->slug,
                                ],
                            ],
                        ]);
                    if ($query->have_posts()) :
                        $is_first = true;
                        while ($query->have_posts()) : $query->the_post();
                            ?>
                        <div class="company-box <?php echo $is_first ? 'active' : ''; ?>">
                            <div class="company-card">
                                <div class="company-info">
                                    <div class="company-logo">
                                        <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full') ?: './assets/images/default-logo.png'); ?>"
                                        alt="<?php the_title_attribute(); ?>"/>
                                    </div>
                                    <span><?php the_title(); ?></span>
                                    <span class="arrow">
                                        <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                stroke="#170049" />
                                            <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373" stroke="#170049" />
                                        </svg>
                                    </span>
                                </div>
                            </div>
                            <div class="partner-item">
                                <div class="content">
                                    <?php the_content(); ?>
                                </div>
                                <div class="button-box  button--primary d-inline-flex align-center">
                                    <button class="button button--large"><?php _e('Mitglieder ansehen', 'theme-lam'); ?></button>
                                    <div class="button-icon">
                                        <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                stroke-width="2" />
                                            <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="white"
                                                stroke-width="2" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php 
                            $is_first = false;
                            endwhile;
                            wp_reset_postdata();
                        ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
</section>
<?php endif; ?>
<!-- end network -->
<!-- testimonial-section -->
<?php
    $args = [
        'post_type'      => 'reviews',
        'posts_per_page' => 5, 
        'order'          => 'DESC',
    ];
        $reviews_query = new WP_Query($args);
if ($reviews_query->have_posts()) : ?>
<section class="testimonial-section">
    <div class="testimonial-box">
        <div id="carousel4" class="testimonial-list owl-carousel owl-theme">
            <?php 
                $i = 0; 
                $classes = ['pink-bg', 'mint-bg', 'pink-sc', 'purple-bg']; 

                while ($reviews_query->have_posts()) : 
                    $reviews_query->the_post(); 
                    $description = get_post_meta(get_the_ID(), 'reviewer_position', true);
                    $current_class = $classes[$i % count($classes)]; 
            ?>   
            <div class="testimonial-card testimonial-content d-flex flex-row">
                <div class="testimonial-quote <?php echo esc_attr($current_class); ?> d-flex">
                    <div class="icon-quote">
                        <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                fill="#00BF99" />
                        </svg>
                    </div>
                    <div class="quote-text">
                        <?php the_content(); ?>
                    </div>
                </div>
                <div class="testimonial-author">
                    <?php the_post_thumbnail('medium', ['class' => 'author-image']); ?>
                    <div class="author-info">
                        <h3 class="author-name"><?php the_title(); ?></h3>
                        <p class="author-description">
                            <?php echo esc_html($description); ?>
                        </p>
                    </div>
                </div>
            </div>
            <?php 
                $i++;
                endwhile; 
            ?>
        </div>
        <div class="custom-nav d-flex">
            <button class="custom-prev prev4">
                <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="27.1621" y1="8.62305" x2="1.99995" y2="8.62305" stroke="#170049" stroke-width="2" />
                    <path d="M8.62305 16.8926L2.00142 8.94663L8.62305 1.00069" stroke="#170049" stroke-width="2" />
                </svg>

            </button>
            <button class="custom-next next4">
                <svg width="27" height="18" viewBox="0 0 27 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="1.74846e-07" y1="9.26953" x2="25.1622" y2="9.26954" stroke="#170049"
                        stroke-width="2" />
                    <path d="M18.5391 1L25.1607 8.94595L18.5391 16.8919" stroke="#170049" stroke-width="2" />
                </svg>

            </button>
        </div>
    </div>
</section>
<?php endif; 
    wp_reset_postdata();
?>
<!-- end testimonial section -->
<?php
    $download_link = esc_url(get_field('download_link', 'option'));
    $document_text = get_field('download_text', 'option');
    echo do_shortcode("[download_section download_link='$download_link' document_text='$document_text']");
?>
<section class="information-banner">
    <div class="container">
        <div class="button-box button--primary d-inline-flex justify-end">
            <a href="<?php echo esc_url(get_field('linkedin', 'option')); ?>" class="button button--large d-flex justify-center align-center">Gehe zu LinkedIn</a>
            <div class="button-icon">
                <svg width="17" height="18" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" fill="#FFFFFF" height="64px" width="64px"
                    id="Layer_1" viewBox="0 0 310 310" xml:space="preserve" stroke="#FFFFFF">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g id="XMLID_801_">
                            <path id="XMLID_802_"
                                d="M72.16,99.73H9.927c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5H72.16c2.762,0,5-2.238,5-5V104.73 C77.16,101.969,74.922,99.73,72.16,99.73z">
                            </path>
                            <path id="XMLID_803_"
                                d="M41.066,0.341C18.422,0.341,0,18.743,0,41.362C0,63.991,18.422,82.4,41.066,82.4 c22.626,0,41.033-18.41,41.033-41.038C82.1,18.743,63.692,0.341,41.066,0.341z">
                            </path>
                            <path id="XMLID_804_"
                                d="M230.454,94.761c-24.995,0-43.472,10.745-54.679,22.954V104.73c0-2.761-2.238-5-5-5h-59.599 c-2.762,0-5,2.239-5,5v199.928c0,2.762,2.238,5,5,5h62.097c2.762,0,5-2.238,5-5v-98.918c0-33.333,9.054-46.319,32.29-46.319 c25.306,0,27.317,20.818,27.317,48.034v97.204c0,2.762,2.238,5,5,5H305c2.762,0,5-2.238,5-5V194.995 C310,145.43,300.549,94.761,230.454,94.761z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <div class="information-box d-flex justify-between">
        <div class="information-illustrations">
            <picture>
                <?php if (get_field('banner_information_image_right','option')): ?>
                    <img src="<?php echo esc_url(get_field('banner_information_image_right','option')); ?>" alt="Service illustrations">
                <?php endif; ?>
            </picture>
        </div>
        <div class="information-content d-flex flex-column">
            <div class="support-text">
                <?php echo wp_kses_post(get_field('support_text','option')); ?>
            </div>
            
            <div class="information-image d-flex align-center">
                <?php if (get_field('banner_information_image_1','option')): ?>
                    <img src="<?php echo esc_url(get_field('banner_information_image_1','option')); ?>" alt="Info image">
                <?php endif; ?>
                <?php if (get_field('banner_information_image_2','option')): ?>
                    <img src="<?php echo esc_url(get_field('banner_information_image_2','option')); ?>" alt="Info image">
                <?php endif; ?>
            </div>
            <div class="information-description">
                <p>
                    <?php echo wp_kses_post(get_field('banner_information_description','option')); ?>
                </p>
            </div>
        </div>
    </div>
</section>
</main>
<?php get_footer(); ?>
