<?php
$select_category = get_theme_mod('category_first_section_side_settings');

$args = new WP_Query(array(
    'post_type'      => 'post',
    'posts_per_page' => 5,
    'orderby'        => 'date',
    'order'          => 'DESC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $select_category,
        )
    )
));

if ($args->have_posts()) {
    $counter = 0;
    while ($args->have_posts()) {
        $args->the_post();
        $counter++;

        if ($counter == 1) {
?>
            <div class="echo-top-story first">
                <div class="echo-story-picture img-transition-scale">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>" class="img-hover">
                    </a>
                </div>
                <div class="echo-story-text">
                    <h4><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h4>
                    <div class="echo-trending-post-bottom-icons">
                        <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                        <i id="card-icon" class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
                    </div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <div class="echo-top-story">
                <div class="echo-story-picture img-transition-scale">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="<?php the_title_attribute(); ?>" class="img-hover">
                    </a>
                </div>
                <div class="echo-story-text">
                    <h4><a href="<?php the_permalink(); ?>" class="title-hover"><?php echo Limited_title_characters(20); ?></a></h4>
                    <div class="echo-trending-post-bottom-icons">
                        <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                    </div>

                </div>
            </div>
<?php
        }
    }
} else {
    echo esc_html__('No post found', 'EchoNews');
}

wp_reset_postdata();
?>