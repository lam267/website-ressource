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
    <section class="info-content">
        <div class="info-box">
            <?php the_content(); ?>
        </div>
    </section>
    <section class="partners">
        <div class="partners-box">
            <div class="container">
                <?php if( have_rows('partners') ): ?>
                    <?php while( have_rows('partners') ): the_row(); ?>
                        <?php 
                            $partners_title = get_sub_field('partners_title'); 
                        ?>
                        <div class="partner-type">
                            <?php if( $partners_title ): ?>
                                <h2><?php echo esc_html( $partners_title ); ?></h2>
                            <?php endif; ?>

                            <?php if( have_rows('partners_list') ): ?>
                                <div class="partner-lists">
                                    <?php while( have_rows('partners_list') ): the_row(); ?>
                                        <?php 
                                            $partner_link = get_sub_field('partner_link'); 
                                            $partner_image = get_sub_field('partner_image');
                                        ?>
                                        <div class="partner-item">
                                            <?php if(  $partner_image ): ?>
                                                <a href="<?php echo esc_url( $partner_link ); ?>" target="_blank">
                                                    <img src="<?php echo esc_url( $partner_image ); ?>">
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>