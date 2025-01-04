<?php get_header(); ?>
<main>
    <section class="banner">
        <div class="banner-content">
            <h1 class="banner-title">
                <?php the_title(); ?>
            </h1>
        </div>
        <?php if (has_post_thumbnail()) : ?>
        <div class="banner-thumbnails">
            <?php the_post_thumbnail('large'); ?>
        </div>
        <?php endif; ?>
    </section>
    <?php
        $image_content = get_field('image_content');
    ?>
    <section class="info-section">
        <div class="info-content">
            <div class="info-detail d-flex">
                <div class="info-description">
                    <?php the_content(); ?>
                </div>
                <div class="info-thumbnails">
                    <?php if ($image_content): ?>
                    <picture>
                        <source srcset="<?php echo esc_url($image_content); ?>" media="(max-width: 577px)">
                        <img src="<?php echo esc_url($image_content); ?>" alt="Image description">
                    </picture>
                    <?php endif; ?>
                </div>
            </div>
            <div class="container">
                <div class="info-cards d-flex justify-center">
                    <?php 
                        $cards = get_field('info_cards'); 
                        if ($cards && have_rows('info_cards')):?>
                        <?php while (have_rows('info_cards')) : the_row(); ?>
                            <div class="info-card-item d-flex align-start justify-between flex-column">
                                <span class="icon icon-pink d-flex justify-center align-center">
                                    <?php echo get_sub_field('card_svg');  ?>
                                </span>
                                <div class="card-content">
                                    <?php echo get_sub_field('card_content');?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
    <section class="project-news">
        <div class="container">
            <div class="project-box project-large-left">
                <div class="project-thumbnails d-flex align-start justify-between">
                    <div class="thumbnails-description">
                        <img src="./assets/images/projeckt-work.png" alt="working image">
                        <div class="description">
                            <div class="quote-mark">
                                <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                        fill="#FF437D" />
                                </svg>
                            </div>
                            <h3>
                                Einfacharbeit sind Tätigkeiten, die <a href="#"> ohne formale Berufsqualifikationen </a>
                                zugänglich sind
                            </h3>
                        </div>
                    </div>
                    <div class="thumbnails">
                        <img src="./assets/images/image_work.png" alt="working image">
                    </div>
                </div>
                <div class="project-detail d-flex">
                    <div class="w-39 d-flex justify-end flex-column">
                        <p class="project-text">
                            Das Verbundprojekt ressource wird für den Aufbau des Kompetenzzentrums
                        </p>
                        <ul class="project-line">
                            <li>Lösungen guter Arbeitsgestaltung im Feld Einfacharbeit gemeinsam mit Praxispartnern
                                in der Logistik und den gesundheitsbezogenen Dienstleistungen entwickeln und erproben
                            </li>
                            <li>die Diversität verschiedener Beschäftigtengruppen für die Entwicklung bedarfsgerechter
                                Lösungen berücksichtigen</li>
                            <li>die Kompetenzen der Führungskräfte und der betrieblichen Interessenvertretungen für
                                die Unterstützung von Einfacharbeitenden weiterentwickeln</li>
                            <li>neben der Beratung in Präsenz eine Internetplattform aufbauen, die leicht zugängliche
                                Informationen, Beratungsdienste und Gestaltungslösungen für
                                Interessierte anbietet</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="project-box project-large-right">
                <div class="project-thumbnails d-flex align-start justify-between">
                    <div class="thumbnails-description">
                        <img src="./assets/images/projeckt-work.png" alt="working image">
                        <div class="description">
                            <div class="quote-mark">
                                <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                        fill="#5479F7" />
                                </svg>
                            </div>
                            <h3>
                                Einfacharbeit heißt <a href="#" class="text-pink"> nicht </a> , dass die Arbeit einfach
                                auszuführen ist
                            </h3>
                        </div>
                    </div>
                    <div class="thumbnails">
                        <img src="./assets/images/image_work.png" alt="working image">
                    </div>
                </div>
                <div class="project-detail d-flex">
                    <div class="w-39 d-flex justify-end flex-column">
                        <p class="project-text">
                            Gesundheitsförderliche Arbeitsgestaltung
                        </p>
                        <ul class="project-line">
                            <li>Technische Assistenzsysteme und sensorbasierte,
                                KI-gestützte Exoskelette</li>
                            <li>Konzepte ganzheitlichen Gesundheitsmanagements und
                                betrieblicher Präventionskulturen</li>
                            <li>Gesundheitssensible Führungskonzepte und gesundheitsförderliche Maßnahmen der
                                Kompetenzentwicklung</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>