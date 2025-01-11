<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="overlay" class="overlay hidden"></div>
    <header>
        <div class="header-pc header d-inline-flex align-center" style="background-color: <?php echo get_theme_mod('header_background_color', '#170049'); ?>;">
            <div class="header-left">
                <a href="/">
                    <?php if (has_custom_logo()) : ?>
                        <div class="logo">
                            <?php the_custom_logo(); ?>
                        </div>
                        <?php else : ?>
                        <div class="site-title">
                            <a href="<?php echo esc_url(home_url('/')); ?>">
                                <?php bloginfo('name'); ?>
                            </a>
                        </div>
                        <p class="site-description"><?php bloginfo('description'); ?></p>
                    <?php endif; ?>
                </a>
            </div>
            <div class="header-right d-inline-flex align-center">
                <?php
                require_once get_template_directory() . '/inc/class-walker-nav-menu.php';
                wp_nav_menu([
                    'theme_location' => 'primary', 
                    'container'      => 'ul',
                    'menu_class'     => 'nav-menu d-inline-flex', 
                    'walker'         => new Custom_Walker_Nav_Menu(), 
                    'fallback_cb'    => false,
                ]);
                ?>
                <div class="nav-tools d-inline-flex align-center">
                    <span class="icon-search nav-link d-inline-flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24">
                            <path fill="#ffff"
                                d="m19.485 20.154l-6.262-6.262q-.75.639-1.725.989t-1.96.35q-2.402 0-4.066-1.663T3.808 9.503T5.47 5.436t4.064-1.667t4.068 1.664T15.268 9.5q0 1.042-.369 2.017t-.97 1.668l6.262 6.261zM9.539 14.23q1.99 0 3.36-1.37t1.37-3.361t-1.37-3.36t-3.36-1.37t-3.361 1.37t-1.37 3.36t1.37 3.36t3.36 1.37" />
                        </svg>
                        &nbsp; <?php _e('Search', 'theme-lam'); ?>
                    </span>
                </div>
                <div class="gtranslate-wrapper">
                    <?php echo do_shortcode('[gtranslate lang="de"]'); ?>
                </div>
                <div class="user" id="user-icon">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/user.png" alt="user">
                </div>
            </div>
            <div class="header-search">
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <div class="form-search">
                        <input type="text" name="s" placeholder="Geben Sie Ihren Suchbegriff ein">
                        <button type="submit" class="button-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24">
                                <path fill="#ffff"
                                    d="m19.485 20.154l-6.262-6.262q-.75.639-1.725.989t-1.96.35q-2.402 0-4.066-1.663T3.808 9.503T5.47 5.436t4.064-1.667t4.068 1.664T15.268 9.5q0 1.042-.369 2.017t-.97 1.668l6.262 6.261zM9.539 14.23q1.99 0 3.36-1.37t1.37-3.361t-1.37-3.36t-3.36-1.37t-3.361 1.37t-1.37 3.36t1.37 3.36t3.36 1.37" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="header-mobile header d-inline-flex align-center">
            <div class="header-left">
                <?php if (has_custom_logo()) : ?>
                    <div class="logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <?php else : ?>
                    <div class="site-title">
                        <a href="<?php echo esc_url(home_url('/')); ?>">
                            <?php bloginfo('name'); ?>
                        </a>
                    </div>
                    <p class="site-description"><?php bloginfo('description'); ?></p>
                <?php endif; ?>
            </div>
            <div class="header-right d-inline-flex align-center">
                <div class="icon-search nav-tools d-inline-flex align-center">
                    <span class="nav-link d-inline-flex align-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24">
                            <path fill="#ffff"
                                d="m19.485 20.154l-6.262-6.262q-.75.639-1.725.989t-1.96.35q-2.402 0-4.066-1.663T3.808 9.503T5.47 5.436t4.064-1.667t4.068 1.664T15.268 9.5q0 1.042-.369 2.017t-.97 1.668l6.262 6.261zM9.539 14.23q1.99 0 3.36-1.37t1.37-3.361t-1.37-3.36t-3.36-1.37t-3.361 1.37t-1.37 3.36t1.37 3.36t3.36 1.37" />
                        </svg>
                        &nbsp; Suche
                    </span>
                    <span class="nav-link d-inline-flex align-center">
                        Menü </span>
                </div>
                <div class="menu-icon">
                    <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line y1="1" x2="17" y2="1" stroke="#170049" stroke-width="2" />
                        <line y1="8" x2="17" y2="8" stroke="#170049" stroke-width="2" />
                        <line y1="15" x2="17" y2="15" stroke="#170049" stroke-width="2" />
                    </svg>
                </div>
            </div>
            <div class="header-search header-mobile-search">
                <form action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <div class="form-search">
                        <input type="text" name="s" placeholder="Geben Sie Ihren Suchbegriff ein">
                        <button type="submit" class="button-submit">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="#ffff"
                                    d="m19.485 20.154l-6.262-6.262q-.75.639-1.725.989t-1.96.35q-2.402 0-4.066-1.663T3.808 9.503T5.47 5.436t4.064-1.667t4.068 1.664T15.268 9.5q0 1.042-.369 2.017t-.97 1.668l6.262 6.261zM9.539 14.23q1.99 0 3.36-1.37t1.37-3.361t-1.37-3.36t-3.36-1.37t-3.361 1.37t-1.37 3.36t1.37 3.36t3.36 1.37" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="header-mobile-menu">
            <?php
                require_once get_template_directory() . '/inc/class-walker-nav-menu.php';
                wp_nav_menu([
                    'theme_location' => 'primary', 
                    'container'      => 'ul',
                    'menu_class'     => 'menu-top d-inline-flex', 
                    'walker'         => new Custom_Walker_Nav_Menu(), 
                    'fallback_cb'    => false,
                ]);
                ?>
                <div class="menu-bottom d-inline-flex align-center justify-between">
                    <div class="gtranslate-wrapper">
                        <?php echo do_shortcode('[gtranslate lang="de"]'); ?>
                    </div>
                    <a href="#" class="d-inline-flex align-center">
                        <span> Barrierefreieheit </span> &nbsp;&nbsp;
                        &nbsp;&nbsp;
                        <svg width="44" height="43" viewBox="0 0 44 43" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="21.5579" cy="21.5" rx="21.5579" ry="21.5" fill="white" />
                            <path
                                d="M21.6621 16.3215C23.6015 16.3215 25.1797 14.748 25.1797 12.8138C25.1797 10.8796 23.6015 9.30566 21.6621 9.30566C19.7227 9.30566 18.1445 10.8796 18.1445 12.8138C18.1445 14.748 19.7227 16.3215 21.6621 16.3215ZM21.6621 10.5618C22.9074 10.5618 23.9202 11.5719 23.9202 12.8138C23.9202 14.0553 22.9074 15.0654 21.6621 15.0654C20.4168 15.0654 19.404 14.0553 19.404 12.8138C19.404 11.5719 20.4168 10.5618 21.6621 10.5618Z"
                                fill="#170049" />
                            <path
                                d="M22.2689 23.5943V20.8255L26.6584 19.3961C26.989 19.2884 27.1695 18.9338 27.0619 18.6041C26.9544 18.2739 26.5979 18.0926 26.2677 18.2016L21.6391 19.7086L17.0105 18.2016C16.6808 18.0926 16.3243 18.2739 16.2163 18.6041C16.1088 18.9338 16.2892 19.2884 16.6199 19.3961L21.0094 20.8255V23.64L16.1648 29.4595C15.9426 29.7263 15.9795 30.1226 16.247 30.3442C16.515 30.5654 16.9119 30.5295 17.1341 30.2618L21.6436 24.8456L25.7975 30.2431C25.922 30.4045 26.1086 30.4887 26.2975 30.4887C26.4313 30.4887 26.5664 30.4466 26.681 30.3588C26.957 30.1479 27.0086 29.7534 26.7966 29.4781L22.2689 23.5943Z"
                                fill="#170049" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <!-- popup user -->
        <div id="user-popup" class="popup popup-user hidden">
            <div class="popup-user-content">
                <div id="close-btn" class="close-icon">
                    <svg width="18" height="19" viewBox="0 0 18 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="17.0704" y1="1.52547" x2="0.707462" y2="17.8884" stroke="white" stroke-width="2" />
                        <line y1="-1" x2="23.1407" y2="-1"
                            transform="matrix(0.707107 0.707107 0.707107 -0.707107 1.63672 0.818359)" stroke="white"
                            stroke-width="2" />
                    </svg>
                </div>
                <div class="close-back">
                    <svg width="22" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="27.1621" y1="8.62207" x2="1.99995" y2="8.62207" stroke="#170049" stroke-width="2" />
                        <path d="M8.62305 16.8916L2.00143 8.94566L8.62305 0.999711" stroke="#170049" stroke-width="2" />
                    </svg> &nbsp;&nbsp;&nbsp;
                    <span>Schließen</span>
                </div>
                <h3>
                    <?php 
                        $team_description = get_field('team_description', 'option'); 
                        echo wp_trim_words($team_description, 15); 
                    ?>
                </h3>
                <div class="profile-cards">
                    <?php
                        $args = [
                            'post_type'      => 'team',
                            'posts_per_page' => 5,     
                            'order'          => 'DESC',
                        ];
                        $team_query = new WP_Query($args);

                        if ($team_query->have_posts()) :
                            while ($team_query->have_posts()) : $team_query->the_post();
                                $position = get_post_meta(get_the_ID(), 'team_position', true);
                                $linkedIn = get_post_meta(get_the_ID(), 'team_link', true);
                                ?>
                                <div class="profile-card profile-card-first">
                                    <div class="profile-info">
                                        <div class="profile-avatar">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', ['alt' => esc_attr(get_the_title())]); ?>
                                            <?php endif; ?>
                                            <h4><?php the_title(); ?></h4>
                                        </div>
                                        
                                        <p>
                                            <?php echo wp_kses_post($position); ?>
                                        </p>
                                        <p><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                        <a href="#" class="profile-more d-inline-flex align-center">Kontaktieren
                                            &nbsp;&nbsp; &nbsp;&nbsp;
                                            <svg width="27" height="18" viewBox="0 0 27 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line y1="9.26953" x2="25.1622" y2="9.26953" stroke="#170049" stroke-width="2" />
                                                <path d="M18.5391 1L25.1607 8.94595L18.5391 16.8919" stroke="#170049"
                                                    stroke-width="2" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="profile-linkedin">
                                        <?php if ($linkedIn) : ?>
                                            <a href="<?php echo esc_url($linkedIn); ?>" class="d-inline-flex align-center" target="_blank" rel="noopener noreferrer">
                                                LinkedIn  &nbsp;&nbsp;
                                                <svg width="36" height="36" viewBox="0 0 36 36" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="17.6455" cy="17.6455" r="17.6455" fill="#170049" />
                                                    <circle cx="17.6445" cy="16.9247" r="13.3242" fill="#170049" />
                                                    <rect x="9.89844" y="9.17773" width="15.4932" height="15.4932" fill="white" />
                                                    <path
                                                        d="M24.5905 22.6326H21.9275V18.462C21.9275 17.4675 21.9097 16.1872 20.5426 16.1872C19.1556 16.1872 18.9434 17.2708 18.9434 18.3896V22.6324H16.2805V14.0559H18.8369V15.228H18.8727C19.1286 14.7904 19.4982 14.4306 19.9424 14.1866C20.3865 13.9426 20.8885 13.8237 21.3949 13.8425C24.094 13.8425 24.5916 15.618 24.5916 17.9277L24.5905 22.6326ZM13.2759 12.8835C12.9702 12.8836 12.6714 12.793 12.4173 12.6232C12.1631 12.4534 11.965 12.2121 11.848 11.9297C11.731 11.6473 11.7003 11.3366 11.7599 11.0368C11.8195 10.737 11.9666 10.4616 12.1827 10.2454C12.3988 10.0293 12.6741 9.88202 12.9738 9.82233C13.2736 9.76264 13.5843 9.7932 13.8667 9.91011C14.1491 10.027 14.3905 10.2251 14.5603 10.4792C14.7302 10.7333 14.8208 11.0321 14.8209 11.3378C14.8209 11.5407 14.781 11.7417 14.7034 11.9292C14.6258 12.1167 14.512 12.2871 14.3685 12.4307C14.225 12.5742 14.0547 12.6881 13.8672 12.7658C13.6797 12.8435 13.4788 12.8835 13.2759 12.8835ZM14.6073 22.6326H11.9416V14.0559H14.6073V22.6326ZM25.918 7.31945H10.6035C10.2559 7.31553 9.921 7.44977 9.67232 7.69269C9.42365 7.93562 9.28159 8.26734 9.27734 8.61496V23.9945C9.28144 24.3422 9.42342 24.6742 9.67208 24.9173C9.92075 25.1606 10.2558 25.295 10.6035 25.2914H25.918C26.2665 25.2957 26.6024 25.1616 26.8521 24.9184C27.1017 24.6752 27.2447 24.3429 27.2495 23.9945V8.61385C27.2445 8.26554 27.1015 7.93344 26.8518 7.69053C26.6022 7.44761 26.2663 7.31485 25.918 7.31945Z"
                                                        fill="#170049" />
                                                </svg>
                                            </a>
                                        <?php endif; ?>
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
    </header>
    <?php
    echo do_shortcode('[message_button]');
    ?>