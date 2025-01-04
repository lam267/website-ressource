<?php get_header(); ?>

<main>
<?php
$categories = get_categories([
    'orderby' => 'name',
    'order'   => 'ASC',
    'hide_empty' => true, // Chỉ lấy danh mục có bài viết
]);

if ($categories): ?>
    <div class="tabs-container">
        <!-- Tabs -->
        <ul class="tabs">
            <?php foreach ($categories as $index => $category): ?>
                <li class="tab <?php echo $index === 0 ? 'active' : ''; ?>" data-tab="tab-<?php echo $category->term_id; ?>">
                    <?php echo esc_html($category->name); ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <!-- Tab Contents -->
        <div class="tab-contents">
            <?php foreach ($categories as $index => $category): ?>
                <div class="tab-content <?php echo $index === 0 ? 'active' : ''; ?>" id="tab-<?php echo $category->term_id; ?>">
                    <?php
                    // Lấy bài viết thuộc danh mục hiện tại
                    $query = new WP_Query([
                        'cat'            => $category->term_id,
                        'posts_per_page' => 5, // Số lượng bài viết hiển thị
                    ]);

                    if ($query->have_posts()): ?>
                        <ul class="post-list">
                            <?php while ($query->have_posts()): $query->the_post(); ?>
                                <li>
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php else: ?>
                        <p><?php _e('No posts available in this category.', 'textdomain'); ?></p>
                    <?php endif; ?>

                    <?php wp_reset_postdata(); ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

</main>
<style>
    .featured-subtitle {
    font-size: 18px;
    font-weight: 400;
    color: #666;
    margin-top: 10px;
    margin-bottom: 20px;
    text-align: center;
}

</style>
<?php get_footer(); ?>
