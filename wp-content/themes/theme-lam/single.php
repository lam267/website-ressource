<?php get_header(); ?>
<main>
    <section class="detail">
        <div class="detail-content">
            <h1><?php the_title(); ?></h1>
            <p>
                <?php echo get_the_date('d. F Y'); ?>
            </p>
            <div class="detail-info">
                <div class="detail-tags">
                    <?php
                        $categories = get_the_category();
                        if (!empty($categories)) {
                            foreach ($categories as $category) {
                                echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="mini-tag d-flex justify-center align-center">' . esc_html($category->name) . '</a>';
                            }
                        }
                    ?>
                    <a href="#" class="mini-tag etc">
                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                        </svg>
                    </a>
                </div>
                <div class="detail-link">
                    <span>Teilen</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>" target="_blank" rel="noopener noreferrer">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24.5" cy="24.5" r="24.5" fill="white" />
                            <rect x="13.7422" y="12.7441" width="21.5116" height="21.5116" fill="#170049" />
                            <path
                                d="M34.1444 31.4239H30.447V25.6333C30.447 24.2524 30.4223 22.4747 28.5241 22.4747C26.5984 22.4747 26.3038 23.9793 26.3038 25.5326V31.4236H22.6064V19.5155H26.1559V21.1429H26.2055C26.5608 20.5354 27.074 20.0358 27.6908 19.697C28.3074 19.3583 29.0044 19.1932 29.7076 19.2193C33.455 19.2193 34.146 21.6844 34.146 24.8913L34.1444 31.4239ZM18.4346 17.8877C18.0102 17.8878 17.5954 17.762 17.2425 17.5263C16.8896 17.2906 16.6145 16.9555 16.4521 16.5634C16.2896 16.1714 16.247 15.7399 16.3297 15.3237C16.4125 14.9074 16.6167 14.525 16.9168 14.2249C17.2168 13.9247 17.599 13.7203 18.0152 13.6374C18.4314 13.5545 18.8628 13.597 19.2549 13.7593C19.647 13.9216 19.9822 14.1966 20.218 14.5494C20.4538 14.9023 20.5797 15.3171 20.5798 15.7415C20.5799 16.0233 20.5244 16.3024 20.4166 16.5627C20.3088 16.8231 20.1508 17.0597 19.9516 17.259C19.7524 17.4583 19.5159 17.6163 19.2556 17.7242C18.9953 17.8321 18.7163 17.8877 18.4346 17.8877ZM20.2832 31.4239H16.5821V19.5155H20.2832V31.4239ZM35.9877 10.1623H14.7242C14.2415 10.1568 13.7765 10.3432 13.4312 10.6805C13.0859 11.0178 12.8887 11.4784 12.8828 11.961V33.3148C12.8885 33.7976 13.0856 34.2586 13.4309 34.5961C13.7761 34.9338 14.2413 35.1206 14.7242 35.1155H35.9877C36.4715 35.1216 36.9378 34.9352 37.2846 34.5977C37.6311 34.26 37.8296 33.7986 37.8363 33.3148V11.9595C37.8294 11.4759 37.6309 11.0148 37.2841 10.6775C36.9376 10.3402 36.4712 10.1559 35.9877 10.1623Z"
                                fill="white" />
                        </svg>
                    </a>
                    <a href="mailto:?subject=<?php echo urlencode(get_the_title()); ?>&body=<?php echo urlencode(get_permalink()); ?>">
                        <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="24.5" cy="24.5" r="24.5" fill="white" />
                            <g clip-path="url(#clip0_243_15228)">
                                <path
                                    d="M24.9516 27.3885L34.6007 18.111C34.3886 18.0408 34.1624 18 33.9244 18H15.0786C14.8406 18 14.6144 18.0408 14.4023 18.111L24.0515 27.3907C24.2989 27.6287 24.7042 27.6287 24.9516 27.3907V27.3885Z"
                                    fill="#170049" />
                                <path
                                    d="M26.3674 28.7527C25.8513 29.2467 25.1751 29.496 24.4988 29.496C23.8226 29.496 23.1463 29.249 22.6326 28.7527L13.0566 19.541C13.0212 19.6883 13 19.8401 13 19.9965V29.9991C13 31.1027 13.9307 31.9978 15.0783 31.9978H33.9241C35.0716 31.9978 36.0024 31.1027 36.0024 29.9991V19.9988C36.0024 19.8424 35.9811 19.6883 35.9458 19.5433L26.3697 28.7527H26.3674Z"
                                    fill="#170049" />
                            </g>
                            <defs>
                                <clipPath id="clip0_243_15228">
                                    <rect width="23" height="14" fill="white" transform="translate(13 18)" />
                                </clipPath>
                            </defs>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="detail-image">
                <a href="<?php the_permalink(); ?>"> 
                    <?php 
                    if (has_post_thumbnail()) {
                        the_post_thumbnail('full', ['alt' => get_the_title()]);
                    } else {
                        echo '<img src="' . esc_url(get_template_directory_uri() . '/assets/images/default-image.png') . '" alt="Default Image">';
                    }
                    ?>
                </a>
            </div>
            <div class="detail-tags is-mobile">
                <?php
                    if (!empty($categories)) {
                        foreach ($categories as $category) {
                            echo '<a href="' . esc_url(get_category_link($category->term_id)) . '" class="mini-tag d-flex justify-center align-center">' . esc_html($category->name) . '</a>';
                        }
                    }
                    ?>
                <a href="#" class="mini-tag etc">
                    <svg width="13" height="3" viewBox="0 0 13 3" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                        <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                        <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="content-block">
            <h2>
                <?php echo get_the_excerpt();?>
            </h2>
        </div>
        <?php the_content(); ?>
    </section>
    <section class="expert">
        <div class="expert-thumbnail">
            <?php
            $image_1 = get_field('image_1'); 
            $image_2 = get_field('image_2'); 
            if ($image_1): ?>
                <div class="expert-image">
                    <img src="<?php echo esc_url($image_1);?>" >
                </div>
            <?php endif; ?>

            <?php if ($image_2): ?>
                <div class="expert-image">
                    <img src="<?php echo esc_url($image_2);?>">
                </div>
            <?php endif; ?>
        </div>
    </section>

    <?php if (get_field('video_url') || get_field('play_image') || get_field('content_detail')): ?>
    <section class="videos-section">
        <div class="video">
            <div class="video-box">
                <div class="video-play">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/button-play.png" alt="Button play" />
                </div>
                <iframe src="<?php echo esc_url(get_field('video_url')); ?>" frameborder="0"
                    allowfullscreen title="Video Title" width="100%" height="315">
                </iframe>
            </div>
        </div>
        <div class="content-detail">
            <p><?php echo esc_html(get_field('content_detail')); ?></p>
        </div>
    </section>
    <?php endif; ?>
    <section class="contact-info">
        <div class="contact-block">
            <div>
                <span>Teilen</span>
                <a href="<?php echo esc_url(get_field('share_link_1')); ?>" target="_blank" rel="noopener">
                    <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24.5" cy="24.5" r="24.5" fill="#170049" />
                        <rect x="13.7422" y="12.7441" width="21.5116" height="21.5116" fill="white" />
                        <path
                            d="M34.1444 31.4239H30.447V25.6333C30.447 24.2524 30.4223 22.4747 28.5241 22.4747C26.5984 22.4747 26.3038 23.9793 26.3038 25.5326V31.4236H22.6064V19.5155H26.1559V21.1429H26.2055C26.5608 20.5354 27.074 20.0358 27.6908 19.697C28.3074 19.3583 29.0044 19.1932 29.7076 19.2193C33.455 19.2193 34.146 21.6844 34.146 24.8913L34.1444 31.4239ZM18.4346 17.8877C18.0102 17.8878 17.5954 17.762 17.2425 17.5263C16.8896 17.2906 16.6145 16.9555 16.4521 16.5634C16.2896 16.1714 16.247 15.7399 16.3297 15.3237C16.4125 14.9074 16.6167 14.525 16.9168 14.2249C17.2168 13.9247 17.599 13.7203 18.0152 13.6374C18.4314 13.5545 18.8628 13.597 19.2549 13.7593C19.647 13.9216 19.9822 14.1966 20.218 14.5494C20.4538 14.9023 20.5797 15.3171 20.5798 15.7415C20.5799 16.0233 20.5244 16.3024 20.4166 16.5627C20.3088 16.8231 20.1508 17.0597 19.9516 17.259C19.7524 17.4583 19.5159 17.6163 19.2556 17.7242C18.9953 17.8321 18.7163 17.8877 18.4346 17.8877ZM20.2832 31.4239H16.5821V19.5155H20.2832V31.4239ZM35.9877 10.1623H14.7242C14.2415 10.1568 13.7765 10.3432 13.4312 10.6805C13.0859 11.0178 12.8887 11.4784 12.8828 11.961V33.3148C12.8885 33.7976 13.0856 34.2586 13.4309 34.5961C13.7761 34.9338 14.2413 35.1206 14.7242 35.1155H35.9877C36.4715 35.1216 36.9378 34.9352 37.2846 34.5977C37.6311 34.26 37.8296 33.7986 37.8363 33.3148V11.9595C37.8294 11.4759 37.6309 11.0148 37.2841 10.6775C36.9376 10.3402 36.4712 10.1559 35.9877 10.1623Z"
                            fill="#170049" />
                    </svg>
                </a>
                <a href="<?php echo esc_url(get_field('share_link_2')); ?>" target="_blank" rel="noopener">
                    <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24.5" cy="24.5" r="24.5" fill="#170049"/>
                        <g clip-path="url(#clip0_243_15216)">
                        <path d="M24.9516 27.3885L34.6007 18.111C34.3886 18.0408 34.1624 18 33.9244 18H15.0786C14.8406 18 14.6144 18.0408 14.4023 18.111L24.0515 27.3907C24.2989 27.6287 24.7042 27.6287 24.9516 27.3907V27.3885Z" fill="white"/>
                        <path d="M26.3674 28.7527C25.8513 29.2467 25.1751 29.496 24.4988 29.496C23.8226 29.496 23.1463 29.249 22.6326 28.7527L13.0566 19.541C13.0212 19.6883 13 19.8401 13 19.9965V29.9991C13 31.1027 13.9307 31.9978 15.0783 31.9978H33.9241C35.0716 31.9978 36.0024 31.1027 36.0024 29.9991V19.9988C36.0024 19.8424 35.9811 19.6883 35.9458 19.5433L26.3697 28.7527H26.3674Z" fill="white"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_243_15216">
                        <rect width="23" height="14" fill="white" transform="translate(13 18)"/>
                        </clipPath>
                        </defs>
                    </svg>
                </a>
            </div>
            <div>
                <span>Fehler melden</span>
                <a href="<?php echo esc_url(get_field('error_report_link')); ?>" target="_blank" rel="noopener">
                    <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <circle cx="24.5" cy="24.5" r="24.5" fill="#170049" />
                        <path d="M17.8594 11.5L17.8594 38.9999" stroke="white" stroke-width="2"
                            stroke-linecap="round" />
                        <circle cx="17.8582" cy="10.8582" r="1.35819" fill="white" stroke="white" />
                        <path
                            d="M18 16C18 15.4477 18.4477 15 19 15H31.0609C31.3873 15 31.6932 15.1593 31.8803 15.4267L35.3135 20.3339C35.57 20.7005 35.5518 21.1929 35.2688 21.5395L31.9281 25.6323C31.7382 25.865 31.4537 26 31.1534 26H19C18.4477 26 18 25.5523 18 25V16Z"
                            fill="white" stroke="white" stroke-width="2" />
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <section class="navigation-section">
        <div class="navigation-background">
            <div class="navigation-container">
                <?php 
                    $previous_post = get_previous_post();
                    $next_post = get_next_post();
                ?>

                <?php if ($previous_post): ?>
                    <div class="article previous-article <?php echo !$next_post ? 'justify-center' : ''; ?>" >
                        <div class="arrow-icon">
                            <svg width="50" height="49" viewBox="0 0 50 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="24.6341" cy="24.5" rx="24.5495" ry="24.5" transform="rotate(-180 24.6341 24.5)"
                                    fill="#170049" />
                                <line x1="38.5703" y1="24.8379" x2="13.3574" y2="24.8379" stroke="white" stroke-width="2" />
                                <path d="M19.9922 33.1074L13.3572 25.1615L19.9922 17.2155" stroke="white"
                                    stroke-width="2" />
                            </svg>
                        </div>
                        <div class="article-content">
                            <h3>Vorheriger Artikel</h3>
                            <p>
                                <a href="<?php echo get_permalink($previous_post->ID); ?>">
                                    <?php echo esc_html($previous_post->post_title); ?>
                                </a>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($next_post): ?>
                    <div class="article next-article <?php echo !$previous_post ? 'justify-center' : ''; ?>">
                        <div class="article-content">
                            <h3>Nächster Artikel</h3>
                            <p>
                                <a href="<?php echo get_permalink($next_post->ID); ?>">
                                    <?php echo esc_html($next_post->post_title); ?>
                                </a>
                            </p>
                        </div>
                        <div class="arrow-icon">
                            <svg width="50" height="49" viewBox="0 0 50 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <ellipse cx="25.3737" cy="24.5" rx="24.5495" ry="24.5" fill="#170049" />
                                <line x1="11.4375" y1="24.1621" x2="36.6505" y2="24.1621" stroke="white" stroke-width="2" />
                                <path d="M30.0156 15.8926L36.6506 23.8385L30.0156 31.7845" stroke="white"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>