<?php
$select_category = get_theme_mod('blog_sidebar_second_cats_settings');

$args = new WP_Query(
    array(
        'post_type' => 'post',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $select_category,
            )
        ),
    )
);

if ($args->have_posts()) {
    $counter = 0;
    while ($args->have_posts()) {
        $counter++;
        $args->the_post();
?>

        <div class="echo-top-story">
            <div class="echo-story-picture img-transition-scale">
                <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover"></a>
            </div>
            <div class="echo-story-text">
                <p class="number ps-2">0<?php echo $counter; ?></p>
                <div class="content">
                    <h6><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h6>
                    <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                </div>
            </div>
        </div>

<?php
    }
} else {
    echo esc_html__('No post found', 'Echo News');
}
wp_reset_postdata();
?>