<?php get_header(); ?>
<main>
        <section class="banner">
            <div class="banner-content">
                <h1 class="banner-title">
                    <?php the_content(); ?>
                </h1>
            </div>
        </section>
        <section class="info-content">
            <div class="info-box">
                <h3>
                    <?php if (get_field('info_detail', 'option')) {
                            echo get_field('info_detail', 'option');
                    } ?>
                </h3>
                <?php
                    $info_lists = get_field('info_lists', 'option'); 
                    if ($info_lists): ?>
                    <div class="info-lists">
                        <?php foreach ($info_lists as $info_list): ?>
                            <div class="info-item">
                                <div class="item-icon">
                                    <?php 
                                    if (!empty($info_list['info_item_svg'])) {
                                        echo $info_list['info_item_svg'];
                                    } 
                                    ?>
                                </div>
                                <p>
                                    <?php 
                                    if (!empty($info_list['info_item_title'])) {
                                        echo esc_html($info_list['info_item_title']);
                                    } 
                                    ?>
                                </p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

            </div>
        </section>
        <?php
            echo do_shortcode('[contact-form-7 id="557a8e4" title="Form đăng kí"]');
        ?>
        <section class="team-section">
            <div class="teams">
                <div class="container">
                    <div class="cards-profile">
                        <?php if (have_rows('teams','option')) : ?>
                            <?php while (have_rows('teams','option')) : the_row(); ?>
                                <div class="card-profile">
                                    <div class="card-profile-header">
                                        <img src="<?php echo esc_url(get_sub_field('team_image')); ?>" alt="<?php echo esc_attr(get_sub_field('team_name')); ?>" class="profile-image">
                                    </div>
                                    <div class="card-profile-body">
                                        <h3><?php echo esc_html(get_sub_field('team_name')); ?></h3>
                                        <div>
                                            <?php echo get_sub_field('team_description'); ?>
                                        </div>
                                    </div>
                                    <div class="card-profile-footer">
                                        <a href="mailto:<?php echo esc_url(get_sub_field('team_email')); ?>">E-Mail schreiben
                                            <svg width="21" height="14" viewBox="0 0 21 14" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <line y1="7" x2="19" y2="7" stroke="#170049" stroke-width="2"/>
                                                <path d="M14 1L19 7L14 13" stroke="#170049" stroke-width="2"/>
                                            </svg>
                                        </a>
                                        <a href="<?php echo esc_url(get_sub_field('team_linkedin')); ?>" class="linkedin-icon">LinkedIn
                                            <svg width="49" height="49" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="24.5" cy="24.5" r="24.5" fill="#170049"/>
                                                <rect x="13.7422" y="12.7441" width="21.5116" height="21.5116" fill="white"/>
                                                <path d="M34.1444 31.4239H30.447V25.6333C30.447 24.2524 30.4223 22.4747 28.5241 22.4747C26.5984 22.4747 26.3038 23.9793 26.3038 25.5326V31.4236H22.6064V19.5155H26.1559V21.1429H26.2055C26.5608 20.5354 27.074 20.0358 27.6908 19.697C28.3074 19.3583 29.0044 19.1932 29.7076 19.2193C33.455 19.2193 34.146 21.6844 34.146 24.8913L34.1444 31.4239ZM18.4346 17.8877C18.0102 17.8878 17.5954 17.762 17.2425 17.5263C16.8896 17.2906 16.6145 16.9555 16.4521 16.5634C16.2896 16.1714 16.247 15.7399 16.3297 15.3237C16.4125 14.9074 16.6167 14.525 16.9168 14.2249C17.2168 13.9247 17.599 13.7203 18.0152 13.6374C18.4314 13.5545 18.8628 13.597 19.2549 13.7593C19.647 13.9216 19.9822 14.1966 20.218 14.5494C20.4538 14.9023 20.5797 15.3171 20.5798 15.7415C20.5799 16.0233 20.5244 16.3024 20.4166 16.5627C20.3088 16.8231 20.1508 17.0597 19.9516 17.259C19.7524 17.4583 19.5159 17.6163 19.2556 17.7242C18.9953 17.8321 18.7163 17.8877 18.4346 17.8877ZM20.2832 31.4239H16.5821V19.5155H20.2832V31.4239ZM35.9877 10.1623H14.7242C14.2415 10.1568 13.7765 10.3432 13.4312 10.6805C13.0859 11.0178 12.8887 11.4784 12.8828 11.961V33.3148C12.8885 33.7976 13.0856 34.2586 13.4309 34.5961C13.7761 34.9338 14.2413 35.1206 14.7242 35.1155H35.9877C36.4715 35.1216 36.9378 34.9352 37.2846 34.5977C37.6311 34.26 37.8296 33.7986 37.8363 33.3148V11.9595C37.8294 11.4759 37.6309 11.0148 37.2841 10.6775C36.9376 10.3402 36.4712 10.1559 35.9877 10.1623Z" fill="#170049"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
       

    </main>
<?php get_footer(); ?>