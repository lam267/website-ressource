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
            <?php if( have_rows('project_news') ): ?>
            <?php $counter = 0;  ?>
            <?php while( have_rows('project_news') ): the_row(); ?>
            <?php 
                $project_image_1 = get_sub_field('project_image_1'); 
                $project_image_2 = get_sub_field('project_image_2'); 
                $project_description = get_sub_field('project_descrption'); 
                $project_content = get_sub_field('project_content'); 
            ?>
            <div class="project-box <?php echo ($counter % 2 == 0) ? 'project-large-left' : 'project-large-right'; ?>">
                <div class="project-thumbnails d-flex align-start justify-between">
                    <div class="thumbnails-description">
                        <?php if($project_image_1): ?>
                        <img src="<?php echo esc_url($project_image_1); ?>" alt="Project Image 1">
                        <?php endif; ?>
                        <div class="description">
                            <div class="quote-mark">
                                <svg width="46" height="32" viewBox="0 0 46 32" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M28.5502 32L36.0676 18.7065H46L38.481 32H28.5502ZM2.7232 32L9.85803 18.7065H19.7904L12.6556 32H2.7232ZM26.2839 18.7065V0H46V18.7065H26.2839ZM0 18.7065V0H19.7161V18.7065H9.85803H0Z"
                                        fill="#277DFF" />
                                </svg>
                            </div>
                            <?php if($project_description): ?>
                            <h3><?php echo $project_description; ?></h3>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="thumbnails">
                        <?php if($project_image_2): ?>
                        <img src="<?php echo esc_url($project_image_2); ?>" alt="Project Image 2">
                        <?php endif; ?>
                    </div>
                </div>
                <div class="project-detail d-flex">
                    <div class="w-39 d-flex justify-end flex-column">
                        <?php if($project_content): ?>
                        <p class="project-text"><?php echo $project_content; ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $counter++;  ?>
            <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </section>
</main>
<?php get_footer(); ?>