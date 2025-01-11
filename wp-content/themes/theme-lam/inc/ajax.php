<?php
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}
function filter_team_members() {
    // Kiểm tra giá trị categories từ AJAX
    if (isset($_POST['categories']) && is_array($_POST['categories']) && !empty($_POST['categories'])) {
        $categories = array_map('intval', $_POST['categories']);

        // Truy vấn các bài viết thuộc category hoặc subcategory
        $query = new WP_Query([
            'post_type'      => 'team',
            'posts_per_page' => -1,
            'tax_query'      => [
                [
                    'taxonomy' => 'team_category',
                    'field'    => 'term_id',
                    'terms'    => $categories,
                    'include_children' => true,
                ],
            ],
        ]);
    } else {
        // Nếu không có category nào được chọn, lấy tất cả team members
        $query = new WP_Query([
            'post_type'      => 'team',
            'posts_per_page' => -1,
        ]);
    }

    // Hiển thị kết quả
    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            ?>
<?php
            $linkedIn = get_post_meta(get_the_ID(), 'team_link', true);
            $address = get_post_meta(get_the_ID(), 'team_address', true);
            $position = get_post_meta(get_the_ID(), 'team_position', true);
            $description = get_post_meta(get_the_ID(), 'team_description', true);
        ?>
<div class="team-item">
    <div class="team-item-top">
        <div class="quote">
            <svg width="31" height="22" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M19.2403 22L24.0977 12.9599H30.7912L25.9329 22H19.2403ZM1.8352 22L6.69356 12.9599H13.3871L8.52876 22H1.8352ZM17.7131 12.8607V0H31V12.8607H17.7131ZM0 12.8607V0H13.2869V12.8607H0Z"
                    fill="#5479F7" />
            </svg>
        </div>
        <div class="avatar">
            <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
            <?php endif; ?>
        </div>
    </div>
    <h3><?php the_title(); ?></h3>
    <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
    <div class="item-more">
        <span> Mehr erfahren</span>
        <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <line y1="7" x2="19" y2="7" stroke="#170049" stroke-width="2" />
            <path d="M14 1L19 7L14 13" stroke="#170049" stroke-width="2" />
        </svg>
    </div>
    <div class="popup-team-overlay"></div>
    <div class="popup-team">
        <div class="popup-team-box">
            <div class="popup-team-close">
                <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <line x1="21" y1="7" x2="2" y2="7" stroke="#170049" stroke-width="2" />
                    <path d="M7 13L2 7L7 1" stroke="#170049" stroke-width="2" />
                </svg>
                <span>Schließen</span>
            </div>
            <div class="popup-team-info">
                <div class="popup-top">
                    <div class="quote">
                        <svg width="31" height="22" viewBox="0 0 31 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M19.2403 22L24.0977 12.9599H30.7912L25.9329 22H19.2403ZM1.8352 22L6.69356 12.9599H13.3871L8.52876 22H1.8352ZM17.7131 12.8607V0H31V12.8607H17.7131ZM0 12.8607V0H13.2869V12.8607H0Z"
                                fill="#5479F7" />
                        </svg>
                    </div>
                    <?php if (has_post_thumbnail()) : ?>
                    <div class="popup-avatar">
                        <?php the_post_thumbnail('medium'); ?>
                    </div>
                    <?php endif; ?>
                </div>
                <h3><?php the_title(); ?></h3>
                <p>
                    <?php echo esc_html($position); ?>
                </p>
                <div class="linkedin">
                    <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24.5" cy="24.5" r="24.5" fill="#170049" />
                        <circle cx="24.5" cy="23.5" r="18.5" fill="#170049" />
                        <rect x="13.7461" y="12.7441" width="21.5116" height="21.5116" fill="white" />
                        <path
                            d="M34.1444 31.4248H30.447V25.6342C30.447 24.2533 30.4223 22.4757 28.5241 22.4757C26.5984 22.4757 26.3038 23.9802 26.3038 25.5336V31.4246H22.6064V19.5165H26.1559V21.1439H26.2055C26.5608 20.5364 27.074 20.0368 27.6908 19.698C28.3074 19.3593 29.0044 19.1941 29.7076 19.2203C33.455 19.2203 34.146 21.6854 34.146 24.8923L34.1444 31.4248ZM18.4346 17.8887C18.0102 17.8888 17.5954 17.763 17.2425 17.5273C16.8896 17.2916 16.6145 16.9565 16.4521 16.5644C16.2896 16.1723 16.247 15.7409 16.3297 15.3246C16.4125 14.9084 16.6167 14.526 16.9168 14.2258C17.2168 13.9257 17.599 13.7213 18.0152 13.6384C18.4314 13.5555 18.8628 13.5979 19.2549 13.7603C19.647 13.9226 19.9822 14.1976 20.218 14.5504C20.4538 14.9033 20.5797 15.3181 20.5798 15.7425C20.5799 16.0243 20.5244 16.3033 20.4166 16.5637C20.3088 16.8241 20.1508 17.0606 19.9516 17.2599C19.7524 17.4592 19.5159 17.6173 19.2556 17.7252C18.9953 17.8331 18.7163 17.8887 18.4346 17.8887ZM20.2832 31.4248H16.5821V19.5165H20.2832V31.4248ZM35.9877 10.1632H14.7242C14.2415 10.1578 13.7765 10.3442 13.4312 10.6815C13.0859 11.0188 12.8887 11.4793 12.8828 11.962V33.3158C12.8885 33.7986 13.0856 34.2596 13.4309 34.5971C13.7761 34.9348 14.2413 35.1216 14.7242 35.1164H35.9877C36.4715 35.1225 36.9378 34.9362 37.2846 34.5986C37.6311 34.2609 37.8296 33.7996 37.8363 33.3158V11.9605C37.8294 11.4769 37.6309 11.0157 37.2841 10.6785C36.9376 10.3412 36.4712 10.1569 35.9877 10.1632Z"
                            fill="#170049" />
                    </svg>
                    <a href="<?php echo esc_url($linkedIn); ?>" target="_blank" rel="noopener noreferrer">
                        LinkedIn
                    </a>
                </div>
                <div class="detail">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
        }
        wp_reset_postdata();
    } else {
        echo '<p>No team members found.</p>';
    }

    wp_die(); // Kết thúc xử lý PHP
}
add_action('wp_ajax_filter_team_members', 'filter_team_members');
add_action('wp_ajax_nopriv_filter_team_members', 'filter_team_members');



// Xử lý AJAX cho lọc downloads
function ajax_filter_downloads() {
    check_ajax_referer('downloads_nonce', 'security');

    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    $args = [
        'post_type'      => 'downloads',
        'posts_per_page' => -1,
    ];

    if ($category_id) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'download_category',
                'field'    => 'term_id',
                'terms'    => $category_id,
            ],
        ];
    }

    $query = new WP_Query($args);

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
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/download-item.png"
                        alt="Default Download Image">
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
                                <svg width="51" height="51" viewBox="0 0 51 51" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="25.5" cy="25.5" r="25.5" transform="rotate(-180 25.5 25.5)" fill="white" />
                                    <path d="M25.5 12.5L25.5 32.5" stroke="#170049" stroke-width="2" />
                                    <path d="M33.3672 26.0117L25.4212 32.6333L17.4753 26.0117" stroke="#170049" stroke-width="2" />
                                    <line x1="17" y1="39" x2="34" y2="39" stroke="#FE437D" stroke-width="2" />
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
            echo '<p>No downloads found.</p>';
        endif;
    wp_die();
}
add_action('wp_ajax_filter_downloads', 'ajax_filter_downloads');
add_action('wp_ajax_nopriv_filter_downloads', 'ajax_filter_downloads');


// AJAX Handler
function filter_posts_by_category() {
    $category_id = isset($_POST['category_id']) ? intval($_POST['category_id']) : 0;

    $args = [
        'post_type'      => 'post',
        'posts_per_page' => -1,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];

    if ($category_id > 0) {
        $args['cat'] = $category_id;
    }

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) : $query->the_post();
            ?>
            <article class="news-card-box">
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
    else :
        echo '<p>No posts found.</p>';
    endif;

    wp_reset_postdata();

    wp_die();
}
add_action('wp_ajax_filter_posts', 'filter_posts_by_category');
add_action('wp_ajax_nopriv_filter_posts', 'filter_posts_by_category');
