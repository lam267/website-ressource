<footer class="footer">
    <div class="container">
        <div class="footer-top">
            <p>
                <a href="<?php echo esc_url(get_theme_mod('footer_contact_link', '#')); ?>" class="text-pink text-underline">
                    <?php echo esc_html(get_theme_mod('footer_contact_title', 'Sprechen Sie uns an ')); ?>
                </a>
                <?php echo esc_html(get_theme_mod('footer_contact_span', ', um mehr über ressource zu erfahren.')); ?>
            </p>
            <div class="button-box button--secondary  d-inline-flex align-center button-hidden">
                <a href="<?php echo esc_url(get_theme_mod('footer_contact_link', '#')); ?>" class="button button--small button-footer">
                    Zum Kontakt
                </a>
                <div class="button-icon">
                    <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="#170049"
                            stroke-width="2" />
                        <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845" stroke="#170049"
                            stroke-width="2" />
                    </svg>
                </div>
            </div>
        </div>

        <div class="footer-center">
            <div class="footer-content">
                <div class="footer-info">
                    <p class="font-semi-bold"><?php echo esc_html(get_theme_mod('footer_title', 'Verbundprojekt ressource')); ?></p>
                    <p class="font-medium">
                        <a href="tel:<?php echo esc_attr(get_theme_mod('footer_address', '0421/218-61720')); ?>">
                            Tel.: <?php echo esc_html(get_theme_mod('footer_address', '0421/218-61720')); ?>
                        </a>
                    </p>
                    <p class="font-medium">
                    <a href="mailto:<?php echo esc_attr(get_theme_mod('footer_email', 'writter@uni-bremen.de')); ?>">
                        E-Mail: <?php echo esc_html(get_theme_mod('footer_email', 'writter@uni-bremen.de')); ?>
                    </a>
                </p>
                </div>
                <div class="footer-column1">
                    <div class="nav-left d-flex flex-column">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_column_1',
                            'container'      => false,
                            'menu_class'     => 'footer-menu footer-menu-column1',
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </div>
                </div>
                <div class="footer-column2">
                    <div class="nav-right d-flex flex-column">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'footer_column_2',
                            'container'      => false,
                            'menu_class'     => 'footer-menu footer-menu-column2',
                            'fallback_cb'    => false,
                        ]);
                        ?>
                    </div>
                </div>
                <div class="footer-column3">
                    <div class="d-flex flex-row align-center">
                        <span>Nach oben </span>
                        <div class="scroll-top">
                            <svg width="18" height="27" viewBox="0 0 18 27" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="8.9043" y1="26.5273" x2="8.9043" y2="1.36518" stroke="#170049"
                                    stroke-width="2" />
                                <path d="M0.634766 7.98828L8.58071 1.36666L16.5267 7.98828" stroke="#170049"
                                    stroke-width="2" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="social d-flex align-center justify-between">
                <div class="footer-logo">
                    <a href="/">
                        <img src="<?php echo esc_url(get_theme_mod('footer_logo', get_template_directory_uri() . '/assets/images/logo_footer.png')); ?>" alt="Footer Logo">
                    </a>
                </div>
                <div class="social-links d-flex justify-end align-center">
                    <span class="social-text">Folgen Sie uns auf LinkedIn</span>
                    <a href="<?php echo esc_url(get_theme_mod('footer_linkedin', '#')); ?>" class="linkedin-btn d-flex-align-justify-center">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon/linkedin.png" alt="LinkedIn">
                    </a>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="copyright">© 2024 Kompetenzzentrum RessourcE</p>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
