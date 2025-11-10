<?php
$select_category = get_theme_mod('sixth_section_main_posts_settings');
$args = new WP_Query(
    array(
        'post_type' => 'post',
        'posts_per_page' => 8,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $select_category,
            )
        ),
    ),
);

if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
?>
        <div class="col-lg-6 pb-5">
            <div class="echo-feature-area-post">
                <div class="echo-feature-area-post-img img-transition-scale">
                    <a href="<?php the_permalink(); ?>">
                        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover">
                    </a>
                </div>
                <div class="echo-feature-area-post-hins">
                    <h5 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h5>
                </div>
                <hr>
                <div class="echo-feature-area-read-view">
                    <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                    <i id="card-icon" class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
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