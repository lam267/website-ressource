<?php get_header(); ?>

<main>
    <?php get_template_part('template-parts/content-section'); ?>
    <!-- start intro-section -->
    <?php
        $title_intro = get_field('title_intro', 'option');
        $image_intro = get_field('image_intro', 'option');
    ?>
    <div class="message-button d-flex justify-end align-center">
        <span class="message-text"><a href="">Jetzt Kontakt
                aufnehmen</a></span>
        <span class="message-icon d-flex justify-center align-center">
            <img src="./assets/images/icon/message_icon.png" alt="Message icon" />
        </span>
    </div>
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
    <div class="content-background" style="background-image: url('<?php echo esc_url($background_banner); ?>');">
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
        <!-- News & Stories Section -->
        <section class="news-section">
            <div class="container">
                <div class="news-section-top">
                    <h2 class="section-title">
                        Entdecken Sie unsere <br>
                        <a href="#" class="text-pink text-underline">News &
                            Stories</a>
                    </h2>
                    <!-- Category Tags -->
                    <div class="category-tags">
                        <div class="tags-row">
                            <a href="#" class="tag-pill active">Alle</a>
                            <a href="#" class="tag-pill">Pflege</a>
                            <a href="#" class="tag-pill">Logistik</a>
                            <a href="#" class="tag-pill">Diversity</a>
                            <a href="#" class="tag-pill">Soziales</a>
                            <a href="#" class="tag-pill">Gesundheit</a>
                            <a href="#" class="tag-pill">Veranstaltungen</a>
                        </div>
                        <div class="tags-row">
                            <a href="#" class="tag-pill">Kompetenzentwicklung</a>
                            <a href="#" class="tag-pill">Führung</a>
                            <a href="#" class="tag-pill">Gesundheitsförderliche
                                Arbeit</a>
                        </div>
                    </div>
                </div>
                <div class="content-grid">
                    <div class="latest-news">
                        <h3 class="column-title">Neueste News</h3>
                        <article class="featured-article">
                            <div class="article-img">
                                <a href="#">
                                    <img src="./assets/images/first_image_blog.png" alt="Nurse with patient" />
                                </a>
                            </div>
                            <div class="article-content">
                                <a href="#">
                                    <h3 class="article-title">
                                        Psychische Herausforderungen
                                        im Arbeitskontext
                                    </h3>
                                </a>
                                <div class="meta">
                                    <span class="date">06. August 2024</span>
                                    <div class="tags d-flex flex-row align-center">
                                        <a href="#" class="mini-tag d-flex justify-center align-center">News</a>
                                        <a href="#" class="mini-tag d-flex justify-center align-center">Logistik</a>
                                        <a href="#" class="mini-tag d-flex justify-center align-center">Pflege</a>
                                        <a href="#" class="mini-tag">
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
                        <article class="news-card-box news-card-first">
                            <div class="news-card d-flex d-flex flex-row">
                                <div class="news-card-left">
                                    <a href="#">
                                        <img src="./assets/images/Erstes.png" alt="Meeting" class="card-img" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <a href>
                                        <h3 class="card-title">
                                            Erstes Zusammenkommen
                                            des Runden Tisch Digitale
                                            Ungleichheit – Fortsetzung
                                            geplant!
                                        </h3>
                                    </a>
                                    <div class="meta d-flex flex-row">
                                        <span class="date">06. August
                                            2024</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tags d-flex flex-row align-center">
                                <a href="#" class="mini-tag">News</a>
                                <a href="#" class="mini-tag">Logistik</a>
                                <a href="#" class="mini-tag">Pflege</a>
                                <a href="#" class="mini-tag">
                                    <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                        <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                        <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                        <article class="news-card-box news-card-second">
                            <div class="news-card d-flex d-flex flex-row">
                                <div class="news-card-left">
                                    <a href="#">
                                        <img src="./assets/images/Sensibilisierung.png" alt="Meeting"
                                            class="card-img" />
                                    </a>
                                </div>
                                <div class="card-content">
                                    <a href>
                                        <h3 class="card-title">
                                            Sensibilisierung für
                                            Diskriminierung
                                        </h3>
                                    </a>
                                    <div class="meta d-flex flex-row">
                                        <span class="date">06. August
                                            2024</span>
                                    </div>
                                </div>
                            </div>
                            <div class="tags d-flex flex-row align-center">
                                <a href="#" class="mini-tag">News</a>
                                <a href="#" class="mini-tag">Logistik</a>
                                <a href="#" class="mini-tag">Pflege</a>
                                <a href="#" class="mini-tag">
                                    <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                        <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                        <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                    </svg>
                                </a>
                            </div>
                        </article>
                        <div class="button-box  button--primary d-flex align-center justify-center">
                            <button class="button button--large">
                                Zum News-Blog
                            </button>
                            <div class="button-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 15 15">
                                    <path fill="currentColor" fill-rule="evenodd"
                                        d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="events-section">
                        <h3 class="column-title">Veranstaltungen</h3>
                        <div class="event-card d-flex align-center justify-center flex-column">
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
                            <article class="related-card related-card-first">
                                <div class="related-card-top d-flex flex-row align-center">
                                    <a href="#">
                                        <img src="./assets/images/image-first-small.png" alt="Meeting"
                                            class="related-img" />
                                    </a>
                                    <div class="related-content">
                                        <h4 class="related-title">
                                            Erstes Zusammenkommen des Runden
                                            Tisch Digitale
                                            Ungleichheit – Fortsetzung geplant!
                                        </h4>
                                    </div>
                                </div>
                                <div class="tags">
                                    <a href="#" class="mini-tag">News</a>
                                    <a href="#" class="mini-tag">Logistik</a>
                                    <a href="#" class="mini-tag">Pflege</a>
                                    <a href="#" class="mini-tag">
                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                            <article class="related-card related-card-second">
                                <div class="related-card-top d-flex flex-row align-center">
                                    <a href="#">
                                        <img src="./assets/images/Mask group.png" alt="Diversity at work"
                                            class="related-img" />
                                    </a>
                                    <div class="related-content">
                                        <h4 class="related-title">
                                            Diversity – Vielfalt als
                                            RessourcE
                                        </h4>
                                    </div>
                                </div>
                                <div class="tags">
                                    <a href="#" class="mini-tag">News</a>
                                    <a href="#" class="mini-tag">Logistik</a>
                                    <a href="#" class="mini-tag">Pflege</a>
                                    <a href="#" class="mini-tag">
                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                            <article class="related-card related-card-three">
                                <div class="related-card-top d-flex flex-row align-center">
                                    <a href="#">
                                        <img src="./assets/images/post_smartes.png" alt="Diversity at work"
                                            class="related-img" />
                                    </a>
                                    <div class="related-content">
                                        <h4 class="related-title">
                                            Smartes Lernen in der Logistik
                                        </h4>
                                    </div>
                                </div>
                                <div class="tags">
                                    <a href="#" class="mini-tag">News</a>
                                    <a href="#" class="mini-tag">Logistik</a>
                                    <a href="#" class="mini-tag">Pflege</a>
                                    <a href="#" class="mini-tag">
                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                            <article class="related-card related-card-four">
                                <div class="related-card-top d-flex flex-row align-center">
                                    <a href="#">
                                        <img src="./assets/images/resourcen.png" alt="Diversity at work"
                                            class="related-img" />
                                    </a>
                                    <div class="related-content">
                                        <h4 class="related-title">
                                            RessourcEn im Logistik- und
                                            Gesundheitssektor
                                        </h4>
                                    </div>
                                </div>
                                <div class="tags">
                                    <a href="#" class="mini-tag">News</a>
                                    <a href="#" class="mini-tag">Logistik</a>
                                    <a href="#" class="mini-tag">Pflege</a>
                                    <a href="#" class="mini-tag">
                                        <svg width="13" height="3" viewBox="0 0 13 3" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle cx="1.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="6.5" cy="1.5" r="1.5" fill="#170049" />
                                            <circle cx="11.5" cy="1.5" r="1.5" fill="#170049" />
                                        </svg>
                                    </a>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="button-box  button--primary d-flex align-center justify-center">
                    <button class="button button--large">
                        Zum News-Blog
                    </button>
                    <div class="button-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 15 15">
                            <path fill="currentColor" fill-rule="evenodd"
                                d="M9.854 3.146L14.207 7.5l-4.353 4.354l-.708-.708L12.293 8H1V7h11.293L9.146 3.854z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </div>
            </div>
        </section>
        <!-- Video section -->
        <section class="videos-section">
            <div class="container">
                <div class="video-box">
                    <div class="video-description">
                        <p>
                            Einfacharbeit sind Tätigkeiten, die <br> <a href="#" class="text-pink">ohne formale
                                Berufs-qualifikationen</a>
                            zugänglich sind
                        </p>
                        <div class="button-box button--primary d-inline-flex align-center">
                            <button class="button button--small">
                                Mehr erfahren
                            </button>
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
                        <img src="./assets/images/button-play.png" alt="Button play" />
                    </div>
                    <div class="video-thumb">
                        <iframe width="1484" height="669"
                            src="https://www.youtube.com/embed/tgbNymZ7vqY?playlist=tgbNymZ7vqY&loop=1">
                        </iframe>
                        <img src="./assets/images/Einfacharbeit.png" alt="Video play" />
                    </div>
                </div>
            </div>
        </section>
        <!-- end Video section -->
        <!-- Team Section -->
        <section class="team-section">
            <div class="container">
                <div class="team-section-box">
                    <h2 class="team-title">
                        Das <a href="#" class="text-pink text-underline">Team</a>
                        hinter
                        ressource
                    </h2>
                    <div class="team-carousel">
                        <div id="carousel3" class="team-cards team-cards-pc owl-carousel owl-theme">
                            <div class="team-card pink-bg">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user1.png" alt="Dr. Gesa Friederichs-Büttner" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">
                                        Dr. Gesa Friederichs-Büttner
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>

                            <div class="team-card blue-mc">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#5978E9" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user2.png" alt="Dr. Peter Bleses" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">Dr. Peter Bleses
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>

                            <div class="team-card mint-bg">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#00BF99" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user3.png" alt="Dr. Wolfgang Ritter" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">Dr. Wolfgang Ritter
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="team-cards-mobi team-cards">
                            <div class="team-card pink-bg">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user1.png" alt="Dr. Gesa Friederichs-Büttner" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">
                                        Dr. Gesa Friederichs-Büttner
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>

                            <div class="team-card blue-mc">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#5978E9" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user2.png" alt="Dr. Peter Bleses" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">Dr. Peter Bleses
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>

                            <div class="team-card mint-bg">
                                <div class="quote-mark">
                                    <svg width="20" height="14" viewBox="0 0 20 14" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M12.4131 14L15.5469 8.24721H19.8653L16.7309 14H12.4131ZM1.184 14L4.31843 8.24721H8.63685L5.50242 14H1.184ZM11.4278 8.18409V0H20V8.18409H11.4278ZM0 8.18409V0H8.5722V8.18409H0Z"
                                            fill="#00BF99" />
                                    </svg>
                                </div>
                                <div class="member-image">
                                    <img src="./assets/images/user3.png" alt="Dr. Wolfgang Ritter" />
                                </div>
                                <div class="member-info d-flex flex-column">
                                    <h3 class="member-name">Dr. Wolfgang Ritter
                                    </h3>
                                    <p class="member-role">
                                        Wirtschafts- und Sozialakademie der Arbeitnehmerkammer Bremen gGmbH (wisoak)
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="more-team">
                            <a href="#">Weitere Teammitglieder anzeigen</a>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <line x1="6" y1="-4.37113e-08" x2="6" y2="12" stroke="white" stroke-width="2" />
                                <line x1="-8.74228e-08" y1="6" x2="12" y2="6" stroke="white" stroke-width="2" />
                            </svg>
                        </div>
                        <div class="team-bottom d-flex justify-between align-center">
                            <div class="custom-nav">
                                <button class="custom-prev prev3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 15 15">
                                        <path fill="#ffffff" fill-rule="evenodd"
                                            d="m2.707 8l3.147 3.146l-.708.707L.793 7.5l4.353-4.354l.708.708L2.707 7H14v1z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <button class="custom-next next3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em"
                                        viewBox="0 0 15 15">
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
        <!-- end team seation -->
        <!-- Network Section -->
        <section class="network-section">
            <div class="container">
                <div class="network-section-box">
                    <h2 class="network-title">
                        Das ressource <a href="#" class="text-pink text-underline">Netzwerk</a>
                    </h2>

                    <div class="category-tags d-flex align-center flex-row justify-center">
                        <a href="#" class="tag active d-flex align-center justify-center"
                            data-category="Praxispartner">Praxispartner</a>
                        <a href="#" class="tag d-flex align-center justify-center"
                            data-category="Forschungs">Forschungs-
                            und Entwicklungspartner</a>
                        <a href="#" class="tag d-flex align-center justify-center"
                            data-category="Kompetenzbeirat">Kompetenzbeirat</a>
                    </div>
                    <div class="list-tags active" id="Praxispartner">
                        <div class="network-content network-content-pc">
                            <div class="network-box">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="company-card ">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/awo1.png" alt="AWO" />
                                                    </div>
                                                    <span>AWO Bezirksverband
                                                        Weser-Ems e.V.</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/blg.png" alt="BLG Logo" />
                                                    </div>
                                                    <span>BLG Logistics</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/muller.png" alt="muller logo" />
                                                    </div>
                                                    <span>J.Müller</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/MensenGmbH.png"
                                                            alt="Mensen Logo" />
                                                    </div>
                                                    <span>Mensen GmbH</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/MensenGmbH.png"
                                                            alt="Mensen Logo" />
                                                    </div>
                                                    <span>Mensen GmbH</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/MensenGmbH.png"
                                                            alt="Mensen Logo" />
                                                    </div>
                                                    <span>Mensen GmbH</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/MensenGmbH.png"
                                                            alt="Mensen Logo" />
                                                    </div>
                                                    <span>BTS GmbH</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navigation-buttons ">
                                    <div class="button--primary">
                                        <div class="button-icon button-icon-small prev-slide">
                                            <svg width="15" height="22" viewBox="0 0 15 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="7.1875" y1="4.37114e-08" x2="7.1875" y2="19.7104"
                                                    stroke="white" stroke-width="2" />
                                                <path d="M13.4492 14.5225L7.22489 19.7094L1.00057 14.5225"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="button--primary">
                                        <div class="button-icon button-icon-small  next-slide">
                                            <svg width="14" height="22" viewBox="0 0 14 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="7.12695" y1="21.1797" x2="7.12695" y2="1.46933" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M0.865234 6.65723L7.08956 1.47029L13.3139 6.65723"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="partner-detail">
                                <div class="partner-item active">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item ">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">BLC Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item ">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">Mensen GmbH</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">1 AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">2 AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">3 AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="list-tags" id="Forschungs">
                        <div class="network-content network-content-pc">
                            <div class="network-box">
                                <div class="swiper">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide swiper-slide-active">
                                            <div class="company-card ">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/awo1.png" alt="AWO" />
                                                    </div>
                                                    <span>AWO Bezirksverband
                                                        Weser-Ems e.V.</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/blg.png" alt="BLG Logo" />
                                                    </div>
                                                    <span>BLG Logistics</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="company-card">
                                                <div class="company-info">
                                                    <div class="company-logo">
                                                        <img src="./assets/images/band/muller.png" alt="muller logo" />
                                                    </div>
                                                    <span>J.Müller</span>
                                                    <span class="arrow">
                                                        <svg width="15" height="11" viewBox="0 0 15 11" fill="none"
                                                            xmlns="http://www.w3.org/2000/svg">
                                                            <line x1="8.74228e-08" y1="5.68652" x2="14.0788"
                                                                y2="5.68653" stroke="#170049" />
                                                            <path d="M10.373 1L14.078 5.44595L10.373 9.89189"
                                                                stroke="#170049" />
                                                        </svg>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="navigation-buttons ">
                                    <div class="button--primary">
                                        <div class="button-icon button-icon-small prev-slide">
                                            <svg width="15" height="22" viewBox="0 0 15 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="7.1875" y1="4.37114e-08" x2="7.1875" y2="19.7104"
                                                    stroke="white" stroke-width="2" />
                                                <path d="M13.4492 14.5225L7.22489 19.7094L1.00057 14.5225"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="button--primary">
                                        <div class="button-icon button-icon-small  next-slide">
                                            <svg width="14" height="22" viewBox="0 0 14 22" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="7.12695" y1="21.1797" x2="7.12695" y2="1.46933" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M0.865234 6.65723L7.08956 1.47029L13.3139 6.65723"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="partner-detail">
                                <div class="partner-item active">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item ">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">BLC Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur ridiculus
                                            mus. Donec quam felis, ultricies nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="partner-item ">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">Mensen GmbH</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet, consectetuer
                                            adipiscing elit.
                                        </p>
                                    </div>
                                    <div class="button-box button--primary d-inline-flex align-center">
                                        <button class="button button--large ">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="network-content network-content-mobi">
                        <div class="network-box">
                            <div class="company-box active">
                                <div class="company-card">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>AWO Bezirksverband <br>Weser-Ems e.V.</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="company-box">
                                <div class="company-card ">
                                    <div class="company-info">
                                        <div class="company-logo">
                                            <img src="./assets/images/band/awo1.png" alt="AWO" />
                                        </div>
                                        <span>BLG Logistics</span>
                                        <span class="arrow">
                                            <svg width="11" height="15" viewBox="0 0 11 15" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="5.20508" y1="2.18557e-08" x2="5.20508" y2="14.0788"
                                                    stroke="#170049" />
                                                <path d="M9.89258 10.373L5.44663 14.078L1.00068 10.373"
                                                    stroke="#170049" />
                                            </svg>
                                        </span>
                                    </div>
                                </div>
                                <div class="partner-item">
                                    <div class="detail-image">
                                        <img src="./assets/images/awo_bezi8rksverband.png" alt="AWO Building" />
                                    </div>
                                    <div class="partner-description">
                                        <h3 class="detail-title">AWO
                                            Bezirksverband
                                            Weser-Ems e.V.</h3>
                                        <p class="detail-text">
                                            Lorem ipsum dolor sit amet,
                                            consectetuer
                                            adipiscing elit.
                                            Aenean commodo ligula eget dolor.
                                            Aenean massa. Cum sociis natoque
                                            penatibus
                                            et magnis dis
                                            parturient montes, nascetur
                                            ridiculus
                                            mus. Donec quam felis, ultricies
                                            nec,
                                            pellentesque eu, pretium
                                            quis, sem.
                                        </p>
                                    </div>
                                    <div class="button-box  button--primary d-inline-flex align-center">
                                        <button class="button button--large">
                                            Mitglieder ansehen
                                        </button>
                                        <div class="button-icon">
                                            <svg width="28" height="18" viewBox="0 0 28 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <line x1="0.59375" y1="9.16211" x2="25.7559" y2="9.16211" stroke="white"
                                                    stroke-width="2" />
                                                <path d="M19.1328 0.892578L25.7544 8.83852L19.1328 16.7845"
                                                    stroke="white" stroke-width="2" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end network -->
        <!-- testimonial-section -->
        <section class="testimonial-section">
            <div class="testimonial-box">
                <div id="carousel4" class="testimonial-list owl-carousel owl-theme">
                    <div class="testimonial-card testimonial-content d-flex flex-row">
                        <div class="testimonial-quote mint-bg d-flex">
                            <div class="icon-quote">
                                <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                        fill="#00BF99" />
                                </svg>
                            </div>
                            <p class="quote-text">
                                Der Fachkräftemangel in Dienstleistungen
                                fordert die
                                Entwicklungsfähigkeit der Region NordWest
                                heraus. Er rückt die
                                Suche nach Lösungen in den Fokus. In den
                                Blick gerät dabei der
                                oft vernach-lässigte Bereich der
                                Einfacharbeit.
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <img src="./assets/images/user3.png" alt="Dr. Wolfgang Ritter" class="author-image" />
                            <div class="author-info">
                                <h3 class="author-name">Dr. Wolfgang
                                    Ritter</h3>
                                <p class="author-description">
                                    Universität Bremen <br> Institut Arbeit
                                    und Wirtschaft
                                    (iaw) der Universität und
                                    Arbeitnehmerkammer

                                    Bremen
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial-card testimonial-content d-flex flex-row">
                        <div class="testimonial-quote pink-bg d-flex">
                            <div class="icon-quote">
                                <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                        fill="#00BF99" />
                                </svg>
                            </div>
                            <p class="quote-text">
                                Der Fachkräftemangel in Dienstleistungen
                                fordert die
                                Entwicklungsfähigkeit der Region NordWest
                                heraus. Er rückt die
                                Suche nach Lösungen in den Fokus. In den
                                Blick gerät dabei der
                                oft vernach-lässigte Bereich der
                                Einfacharbeit.
                            </p>
                        </div>
                        <div class="testimonial-author">
                            <img src="./assets/images/user2.png" alt="Dr. Wolfgang Ritter" class="author-image" />
                            <div class="author-info">
                                <h3 class="author-name">Dr. Wolfgang
                                    Ritter</h3>
                                <p class="author-description">
                                    Universität Bremen Institut Arbeit
                                    und Wirtschaft
                                    (iaw) der Universität und
                                    Arbeitnehmerkammer

                                    Bremen
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="custom-nav d-flex">
                    <button class="custom-prev prev4">
                        <svg width="28" height="18" viewBox="0 0 28 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <line x1="27.1621" y1="8.62305" x2="1.99995" y2="8.62305" stroke="#170049"
                                stroke-width="2" />
                            <path d="M8.62305 16.8926L2.00142 8.94663L8.62305 1.00069" stroke="#170049"
                                stroke-width="2" />
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
        <!-- end testimonial section -->
        <!-- download section -->
        <section class="download-section">
            <div class="container">
                <div class="download-content d-flex flex-row align-center">
                    <div class="download-icon">
                        <svg width="99" height="125" viewBox="0 0 99 125" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <rect x="1" y="1" width="77.1241" height="110.568" rx="7" stroke="white" stroke-width="2" />
                            <circle cx="75.8614" cy="101.964" r="21.8399" fill="#FF437D" stroke="#170049"
                                stroke-width="2" />
                            <line x1="76.2695" y1="88.125" x2="76.2695" y2="112.939" stroke="white" stroke-width="2" />
                            <path d="M84.6016 105.75L75.789 112.8L66.9764 105.75" stroke="white" stroke-width="2" />
                            <path d="M17.9453 24.4717H61.9938" stroke="white" stroke-width="2" stroke-linecap="round" />
                            <path d="M17.9453 40.7852H61.9938" stroke="white" stroke-width="2" stroke-linecap="round" />
                            <path d="M17.9453 57.916H61.9938" stroke="white" stroke-width="2" stroke-linecap="round" />
                            <path d="M17.9453 75.8613H39.1538" stroke="white" stroke-width="2" stroke-linecap="round" />
                        </svg>
                    </div>
                    <p class="download-text">
                        Hier finden Sie
                        <a href="#" class="text-pink text-underline">alle
                            Dokumente</a> über
                        unser Projekt
                    </p>
                    <div class="button-box  button--secondary d-inline-flex align-center">
                        <button class="button button--large">
                            Zu den Downloads
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
        </section>
        <!-- end download -->
        <!-- start social media posts -->
        <section class="social-media-posts">
            <div class="container">
                <div class="d-flex align-center justify-start">
                    <div class="heading-icon d-flex align-center justify-center">
                        <img src="./assets/images/icon/icon_user.png" alt="icon user" />
                    </div>
                    <h2>
                        Folgen Sie uns auf
                        <a href="#" class="text-pink text-underline">LinkedIn</a>
                    </h2>
                </div>
                <div class="post-cards d-flex align-center">
                    <div class="post-card">
                        <a href="#">
                            <div class="post-image">
                                <img src="./assets/images/post_linkedin.png" alt="Post Image" />
                                <div class="icon">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="19.5" cy="19.5" r="19.5" fill="#170049" />
                                        <path
                                            d="M25.7329 17.0532C25.4193 16.4935 25.0448 15.9952 24.6101 15.557C23.5658 17.184 21.7415 18.2656 19.6684 18.2656C17.4795 18.2656 15.5675 17.0595 14.5588 15.2783C13.8924 15.8283 13.3327 16.478 12.8848 17.2333C12.2144 18.3636 11.8789 19.6499 11.8789 21.0905C11.8789 22.5517 12.2247 23.8524 12.9146 24.993C13.6051 26.1336 14.5404 27.0294 15.7212 27.6797C16.902 28.33 18.2531 28.6552 19.774 28.6552C20.9547 28.6552 22.0501 28.4453 23.0611 28.025C24.0716 27.6046 24.9272 26.9847 25.628 26.1635L23.3163 23.8524C22.8759 24.353 22.3558 24.728 21.7553 24.9781C21.1549 25.2281 20.4839 25.3531 19.7441 25.3531C18.9235 25.3531 18.2026 25.1782 17.5827 24.8278C16.9622 24.478 16.4868 23.9774 16.157 23.3271C16.0257 23.069 15.9219 22.792 15.8427 22.4978L26.4383 22.4714C26.5181 22.1314 26.5737 21.8257 26.6035 21.5562C26.6333 21.2855 26.6488 21.0205 26.6488 20.7602C26.6488 19.3792 26.3431 18.144 25.7329 17.0532Z"
                                            fill="#FF437D" />
                                        <path
                                            d="M15.6328 12.3889C15.6328 10.1552 17.4433 8.34473 19.677 8.34473C21.9101 8.34473 23.7206 10.1552 23.7206 12.3889C23.7206 14.6226 21.9101 16.433 19.677 16.433C17.4433 16.433 15.6328 14.6226 15.6328 12.3889Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="post-card__content">
                            <a href="#">
                                <p class="post-cart-title">
                                    Am 31. Mai hatten wir die Möglichkeit,
                                    unseren Praxispartner
                                    PTS im Neustädter Hafen in Bremen
                                    aufzusuchen…
                                </p>
                            </a>
                        </div>
                        <div class="post-cart__bottom d-flex flex-row justify-between">
                            <p class="likes">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.4246 6.16284C14.0412 5.83557 13.5612 5.65792 13.075 5.65792H12.5825H10.8091H9.79922V3.29226C9.79922 2.298 9.50936 1.58114 8.93587 1.16037C8.02888 0.493377 6.77904 0.873627 6.72606 0.892326C6.57022 0.942196 6.46425 1.08557 6.46425 1.24764V3.89381C6.46425 4.75716 6.05283 5.48961 5.23934 6.07245C4.63157 6.5088 4.01132 6.69893 3.94587 6.72075L3.85548 6.74256C3.72146 6.51504 3.47523 6.36231 3.1916 6.36231H0.76985C0.345965 6.36231 0 6.70828 0 7.13216V14.2509C0 14.6748 0.345965 15.0208 0.76985 15.0208H3.19784C3.43471 15.0208 3.64977 14.9117 3.79003 14.7434C4.17963 15.1579 4.7313 15.4166 5.32973 15.4166H7.3837H7.59564H11.8064C13.2371 15.4166 14.1503 14.6686 14.3123 13.3595L15.1508 8.15759C15.2661 7.40956 14.9887 6.64282 14.4246 6.16284ZM3.21654 14.2509C3.21654 14.2634 3.20719 14.2728 3.19472 14.2728H0.76985C0.757383 14.2728 0.748032 14.2634 0.748032 14.2509V7.13216C0.748032 7.1197 0.757383 7.11034 0.76985 7.11034H3.19784C3.21031 7.11034 3.21966 7.1197 3.21966 7.13216V14.2509H3.21654ZM14.4059 8.03915L13.5706 13.2504C13.5706 13.2536 13.5706 13.2598 13.5674 13.266C13.4521 14.198 12.8599 14.6717 11.8033 14.6717H7.59253H7.38058H5.32661C4.66273 14.6717 4.08613 14.1761 3.98327 13.5216C3.98015 13.4998 3.97392 13.478 3.96769 13.4562V7.48436L4.12976 7.44696C4.13599 7.44696 4.13911 7.44384 4.14535 7.44384C4.17651 7.43449 4.91519 7.22567 5.66011 6.69581C6.6793 5.97271 7.21539 5.00339 7.21539 3.89381V1.54685C7.53954 1.49387 8.09433 1.46582 8.4964 1.76503C8.86418 2.03619 9.05119 2.55046 9.05119 3.29226V6.02881C9.05119 6.23452 9.2195 6.40283 9.42521 6.40283H10.8091H12.5825H13.075C13.3835 6.40283 13.6921 6.51815 13.9383 6.73009C14.3061 7.04489 14.4869 7.5467 14.4059 8.03915Z"
                                        fill="black" />
                                </svg>
                                &nbsp;
                                <span>15</span>
                            </p>
                            <p class="date">06. Juni 2024</p>
                        </div>
                    </div>
                    <div class="post-card">
                        <a href="#">
                            <div class="post-image">
                                <img src="./assets/images/post_linkedin1.png" alt="Post Image" />
                                <div class="icon">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="19.5" cy="19.5" r="19.5" fill="#170049" />
                                        <path
                                            d="M25.7329 17.0532C25.4193 16.4935 25.0448 15.9952 24.6101 15.557C23.5658 17.184 21.7415 18.2656 19.6684 18.2656C17.4795 18.2656 15.5675 17.0595 14.5588 15.2783C13.8924 15.8283 13.3327 16.478 12.8848 17.2333C12.2144 18.3636 11.8789 19.6499 11.8789 21.0905C11.8789 22.5517 12.2247 23.8524 12.9146 24.993C13.6051 26.1336 14.5404 27.0294 15.7212 27.6797C16.902 28.33 18.2531 28.6552 19.774 28.6552C20.9547 28.6552 22.0501 28.4453 23.0611 28.025C24.0716 27.6046 24.9272 26.9847 25.628 26.1635L23.3163 23.8524C22.8759 24.353 22.3558 24.728 21.7553 24.9781C21.1549 25.2281 20.4839 25.3531 19.7441 25.3531C18.9235 25.3531 18.2026 25.1782 17.5827 24.8278C16.9622 24.478 16.4868 23.9774 16.157 23.3271C16.0257 23.069 15.9219 22.792 15.8427 22.4978L26.4383 22.4714C26.5181 22.1314 26.5737 21.8257 26.6035 21.5562C26.6333 21.2855 26.6488 21.0205 26.6488 20.7602C26.6488 19.3792 26.3431 18.144 25.7329 17.0532Z"
                                            fill="#FF437D" />
                                        <path
                                            d="M15.6328 12.3889C15.6328 10.1552 17.4433 8.34473 19.677 8.34473C21.9101 8.34473 23.7206 10.1552 23.7206 12.3889C23.7206 14.6226 21.9101 16.433 19.677 16.433C17.4433 16.433 15.6328 14.6226 15.6328 12.3889Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="post-card__content">
                            <a href="#">
                                <p class="post-cart-title">
                                    Am 31. Mai hatten wir die Möglichkeit,
                                    unseren Praxispartner
                                    PTS im Neustädter Hafen in Bremen
                                    aufzusuchen…
                                </p>
                            </a>
                        </div>
                        <div class="post-cart__bottom d-flex flex-row justify-between">
                            <p class="likes">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.4246 6.16284C14.0412 5.83557 13.5612 5.65792 13.075 5.65792H12.5825H10.8091H9.79922V3.29226C9.79922 2.298 9.50936 1.58114 8.93587 1.16037C8.02888 0.493377 6.77904 0.873627 6.72606 0.892326C6.57022 0.942196 6.46425 1.08557 6.46425 1.24764V3.89381C6.46425 4.75716 6.05283 5.48961 5.23934 6.07245C4.63157 6.5088 4.01132 6.69893 3.94587 6.72075L3.85548 6.74256C3.72146 6.51504 3.47523 6.36231 3.1916 6.36231H0.76985C0.345965 6.36231 0 6.70828 0 7.13216V14.2509C0 14.6748 0.345965 15.0208 0.76985 15.0208H3.19784C3.43471 15.0208 3.64977 14.9117 3.79003 14.7434C4.17963 15.1579 4.7313 15.4166 5.32973 15.4166H7.3837H7.59564H11.8064C13.2371 15.4166 14.1503 14.6686 14.3123 13.3595L15.1508 8.15759C15.2661 7.40956 14.9887 6.64282 14.4246 6.16284ZM3.21654 14.2509C3.21654 14.2634 3.20719 14.2728 3.19472 14.2728H0.76985C0.757383 14.2728 0.748032 14.2634 0.748032 14.2509V7.13216C0.748032 7.1197 0.757383 7.11034 0.76985 7.11034H3.19784C3.21031 7.11034 3.21966 7.1197 3.21966 7.13216V14.2509H3.21654ZM14.4059 8.03915L13.5706 13.2504C13.5706 13.2536 13.5706 13.2598 13.5674 13.266C13.4521 14.198 12.8599 14.6717 11.8033 14.6717H7.59253H7.38058H5.32661C4.66273 14.6717 4.08613 14.1761 3.98327 13.5216C3.98015 13.4998 3.97392 13.478 3.96769 13.4562V7.48436L4.12976 7.44696C4.13599 7.44696 4.13911 7.44384 4.14535 7.44384C4.17651 7.43449 4.91519 7.22567 5.66011 6.69581C6.6793 5.97271 7.21539 5.00339 7.21539 3.89381V1.54685C7.53954 1.49387 8.09433 1.46582 8.4964 1.76503C8.86418 2.03619 9.05119 2.55046 9.05119 3.29226V6.02881C9.05119 6.23452 9.2195 6.40283 9.42521 6.40283H10.8091H12.5825H13.075C13.3835 6.40283 13.6921 6.51815 13.9383 6.73009C14.3061 7.04489 14.4869 7.5467 14.4059 8.03915Z"
                                        fill="black" />
                                </svg>
                                &nbsp;
                                <span>15</span>
                            </p>
                            <p class="date">06. Juni 2024</p>
                        </div>
                    </div>
                    <div class="post-card">
                        <a href="#">
                            <div class="post-image">
                                <img src="./assets/images/post_linkedin2.png" alt="Post Image" />
                                <div class="icon">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="19.5" cy="19.5" r="19.5" fill="#170049" />
                                        <path
                                            d="M25.7329 17.0532C25.4193 16.4935 25.0448 15.9952 24.6101 15.557C23.5658 17.184 21.7415 18.2656 19.6684 18.2656C17.4795 18.2656 15.5675 17.0595 14.5588 15.2783C13.8924 15.8283 13.3327 16.478 12.8848 17.2333C12.2144 18.3636 11.8789 19.6499 11.8789 21.0905C11.8789 22.5517 12.2247 23.8524 12.9146 24.993C13.6051 26.1336 14.5404 27.0294 15.7212 27.6797C16.902 28.33 18.2531 28.6552 19.774 28.6552C20.9547 28.6552 22.0501 28.4453 23.0611 28.025C24.0716 27.6046 24.9272 26.9847 25.628 26.1635L23.3163 23.8524C22.8759 24.353 22.3558 24.728 21.7553 24.9781C21.1549 25.2281 20.4839 25.3531 19.7441 25.3531C18.9235 25.3531 18.2026 25.1782 17.5827 24.8278C16.9622 24.478 16.4868 23.9774 16.157 23.3271C16.0257 23.069 15.9219 22.792 15.8427 22.4978L26.4383 22.4714C26.5181 22.1314 26.5737 21.8257 26.6035 21.5562C26.6333 21.2855 26.6488 21.0205 26.6488 20.7602C26.6488 19.3792 26.3431 18.144 25.7329 17.0532Z"
                                            fill="#FF437D" />
                                        <path
                                            d="M15.6328 12.3889C15.6328 10.1552 17.4433 8.34473 19.677 8.34473C21.9101 8.34473 23.7206 10.1552 23.7206 12.3889C23.7206 14.6226 21.9101 16.433 19.677 16.433C17.4433 16.433 15.6328 14.6226 15.6328 12.3889Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="post-card__content">
                            <a href="#">
                                <p class="post-cart-title">
                                    Am 31. Mai hatten wir die Möglichkeit,
                                    unseren Praxispartner
                                    PTS im Neustädter Hafen in Bremen
                                    aufzusuchen…
                                </p>
                            </a>
                        </div>
                        <div class="post-cart__bottom d-flex flex-row justify-between">
                            <p class="likes">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.4246 6.16284C14.0412 5.83557 13.5612 5.65792 13.075 5.65792H12.5825H10.8091H9.79922V3.29226C9.79922 2.298 9.50936 1.58114 8.93587 1.16037C8.02888 0.493377 6.77904 0.873627 6.72606 0.892326C6.57022 0.942196 6.46425 1.08557 6.46425 1.24764V3.89381C6.46425 4.75716 6.05283 5.48961 5.23934 6.07245C4.63157 6.5088 4.01132 6.69893 3.94587 6.72075L3.85548 6.74256C3.72146 6.51504 3.47523 6.36231 3.1916 6.36231H0.76985C0.345965 6.36231 0 6.70828 0 7.13216V14.2509C0 14.6748 0.345965 15.0208 0.76985 15.0208H3.19784C3.43471 15.0208 3.64977 14.9117 3.79003 14.7434C4.17963 15.1579 4.7313 15.4166 5.32973 15.4166H7.3837H7.59564H11.8064C13.2371 15.4166 14.1503 14.6686 14.3123 13.3595L15.1508 8.15759C15.2661 7.40956 14.9887 6.64282 14.4246 6.16284ZM3.21654 14.2509C3.21654 14.2634 3.20719 14.2728 3.19472 14.2728H0.76985C0.757383 14.2728 0.748032 14.2634 0.748032 14.2509V7.13216C0.748032 7.1197 0.757383 7.11034 0.76985 7.11034H3.19784C3.21031 7.11034 3.21966 7.1197 3.21966 7.13216V14.2509H3.21654ZM14.4059 8.03915L13.5706 13.2504C13.5706 13.2536 13.5706 13.2598 13.5674 13.266C13.4521 14.198 12.8599 14.6717 11.8033 14.6717H7.59253H7.38058H5.32661C4.66273 14.6717 4.08613 14.1761 3.98327 13.5216C3.98015 13.4998 3.97392 13.478 3.96769 13.4562V7.48436L4.12976 7.44696C4.13599 7.44696 4.13911 7.44384 4.14535 7.44384C4.17651 7.43449 4.91519 7.22567 5.66011 6.69581C6.6793 5.97271 7.21539 5.00339 7.21539 3.89381V1.54685C7.53954 1.49387 8.09433 1.46582 8.4964 1.76503C8.86418 2.03619 9.05119 2.55046 9.05119 3.29226V6.02881C9.05119 6.23452 9.2195 6.40283 9.42521 6.40283H10.8091H12.5825H13.075C13.3835 6.40283 13.6921 6.51815 13.9383 6.73009C14.3061 7.04489 14.4869 7.5467 14.4059 8.03915Z"
                                        fill="black" />
                                </svg>
                                &nbsp;
                                <span>15</span>
                            </p>
                            <p class="date">06. Juni 2024</p>
                        </div>
                    </div>
                    <div class="post-card">
                        <a href="#">
                            <div class="post-image">
                                <img src="./assets/images/post_linkedin3.png" alt="Post Image" />
                                <div class="icon">
                                    <svg width="39" height="39" viewBox="0 0 39 39" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="19.5" cy="19.5" r="19.5" fill="#170049" />
                                        <path
                                            d="M25.7329 17.0532C25.4193 16.4935 25.0448 15.9952 24.6101 15.557C23.5658 17.184 21.7415 18.2656 19.6684 18.2656C17.4795 18.2656 15.5675 17.0595 14.5588 15.2783C13.8924 15.8283 13.3327 16.478 12.8848 17.2333C12.2144 18.3636 11.8789 19.6499 11.8789 21.0905C11.8789 22.5517 12.2247 23.8524 12.9146 24.993C13.6051 26.1336 14.5404 27.0294 15.7212 27.6797C16.902 28.33 18.2531 28.6552 19.774 28.6552C20.9547 28.6552 22.0501 28.4453 23.0611 28.025C24.0716 27.6046 24.9272 26.9847 25.628 26.1635L23.3163 23.8524C22.8759 24.353 22.3558 24.728 21.7553 24.9781C21.1549 25.2281 20.4839 25.3531 19.7441 25.3531C18.9235 25.3531 18.2026 25.1782 17.5827 24.8278C16.9622 24.478 16.4868 23.9774 16.157 23.3271C16.0257 23.069 15.9219 22.792 15.8427 22.4978L26.4383 22.4714C26.5181 22.1314 26.5737 21.8257 26.6035 21.5562C26.6333 21.2855 26.6488 21.0205 26.6488 20.7602C26.6488 19.3792 26.3431 18.144 25.7329 17.0532Z"
                                            fill="#FF437D" />
                                        <path
                                            d="M15.6328 12.3889C15.6328 10.1552 17.4433 8.34473 19.677 8.34473C21.9101 8.34473 23.7206 10.1552 23.7206 12.3889C23.7206 14.6226 21.9101 16.433 19.677 16.433C17.4433 16.433 15.6328 14.6226 15.6328 12.3889Z"
                                            fill="#FF437D" />
                                    </svg>
                                </div>
                            </div>
                        </a>
                        <div class="post-card__content">
                            <a href="#">
                                <p class="post-cart-title">
                                    Am 31. Mai hatten wir die Möglichkeit,
                                    unseren Praxispartner
                                    PTS im Neustädter Hafen in Bremen
                                    aufzusuchen…
                                </p>
                            </a>
                        </div>
                        <div class="post-cart__bottom d-flex flex-row justify-between">
                            <p class="likes">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M14.4246 6.16284C14.0412 5.83557 13.5612 5.65792 13.075 5.65792H12.5825H10.8091H9.79922V3.29226C9.79922 2.298 9.50936 1.58114 8.93587 1.16037C8.02888 0.493377 6.77904 0.873627 6.72606 0.892326C6.57022 0.942196 6.46425 1.08557 6.46425 1.24764V3.89381C6.46425 4.75716 6.05283 5.48961 5.23934 6.07245C4.63157 6.5088 4.01132 6.69893 3.94587 6.72075L3.85548 6.74256C3.72146 6.51504 3.47523 6.36231 3.1916 6.36231H0.76985C0.345965 6.36231 0 6.70828 0 7.13216V14.2509C0 14.6748 0.345965 15.0208 0.76985 15.0208H3.19784C3.43471 15.0208 3.64977 14.9117 3.79003 14.7434C4.17963 15.1579 4.7313 15.4166 5.32973 15.4166H7.3837H7.59564H11.8064C13.2371 15.4166 14.1503 14.6686 14.3123 13.3595L15.1508 8.15759C15.2661 7.40956 14.9887 6.64282 14.4246 6.16284ZM3.21654 14.2509C3.21654 14.2634 3.20719 14.2728 3.19472 14.2728H0.76985C0.757383 14.2728 0.748032 14.2634 0.748032 14.2509V7.13216C0.748032 7.1197 0.757383 7.11034 0.76985 7.11034H3.19784C3.21031 7.11034 3.21966 7.1197 3.21966 7.13216V14.2509H3.21654ZM14.4059 8.03915L13.5706 13.2504C13.5706 13.2536 13.5706 13.2598 13.5674 13.266C13.4521 14.198 12.8599 14.6717 11.8033 14.6717H7.59253H7.38058H5.32661C4.66273 14.6717 4.08613 14.1761 3.98327 13.5216C3.98015 13.4998 3.97392 13.478 3.96769 13.4562V7.48436L4.12976 7.44696C4.13599 7.44696 4.13911 7.44384 4.14535 7.44384C4.17651 7.43449 4.91519 7.22567 5.66011 6.69581C6.6793 5.97271 7.21539 5.00339 7.21539 3.89381V1.54685C7.53954 1.49387 8.09433 1.46582 8.4964 1.76503C8.86418 2.03619 9.05119 2.55046 9.05119 3.29226V6.02881C9.05119 6.23452 9.2195 6.40283 9.42521 6.40283H10.8091H12.5825H13.075C13.3835 6.40283 13.6921 6.51815 13.9383 6.73009C14.3061 7.04489 14.4869 7.5467 14.4059 8.03915Z"
                                        fill="black" />
                                </svg>
                                &nbsp;
                                <span>15</span>
                            </p>
                            <p class="date">06. Juni 2024</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end social media posts -->
        <!-- information banner -->
        <section class="information-banner">
            <div class="container">
                <div class="button-box  button--primary d-inline-flex justify-end">
                    <a href="#" class="button button--large d-flex justify-center align-center">Gehe
                        zu LinkedIn</a>
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
            <div class="information-box d-flex  justify-between">
                <div class="information-illustrations">
                    <picture>
                        <source srcset="./assets/images/pp-working-mb.png" media="(max-width: 460px)">
                        <img src="./assets/images/illustrations.png" alt="Service illustrations">
                    </picture>
                </div>
                <div class="information-content d-flex flex-column">
                    <p class="support-text">
                        Einfacharbeit ist für
                        Menschen ohne Abschlüsse
                        <a href="#" class="text-pink text-underline">leicht
                            zugänglich</a>
                    </p>
                    <div class="information-image d-flex align-center">
                        <img src="./assets/images/info_right.png" alt="Info image" />
                        <img src="./assets/images/info_left.png" alt="Info image" />
                    </div>
                    <div class="information-description">
                        <p>
                            Das Verbundprojekt „RessourcenEntwicklung in
                            Dienstleistungsarbeit – ressource“ wird vom

                            Bundesministerium für Bildung und Forschung im
                            Rahmen der
                            Förderlinie „Regionale
                            Kompetenzzentren der Arbeits¬forschung (ReKodA)“
                            (FKZ: 02L22C150
                            ff.) gefördert
                        </p>
                    </div>
                </div>
            </div>
        </section>
        <!-- end information banner -->

</main>

<?php get_footer(); ?>