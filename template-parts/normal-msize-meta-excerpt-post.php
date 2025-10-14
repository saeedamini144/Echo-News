<?php

$select_category = get_theme_mod('');
$args = new WP_Query(
    array(
        'post_type' => 'post',
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $select_category,
            ),
        ),
    )
);
if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
?>
        <div class="echo-trending-right-site-post">
            <div class="echo-trending-right-site-post-img img-transition-scale">
                <a href="<?php the_permalink(); ?>">
                    <img class="img-hover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
                </a>
            </div>
            <div class="echo-trending-right-site-post-title">
                <h4 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h4>
            </div>
            <div class="echo-trending-right-site-like-comment-share-icons">
                <div class="echo-trending-right-like-comment-content">
                    <i class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                </div>
                <div class="echo-trending-right-like-comment-content">
                    <i class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
                </div>
                <div class="echo-trending-right-like-comment-content">
                    <i class="fa-light fa-comment-dots"></i><span><?php comments_number('No Comments', 'One Comment', '% Comments') ?></span>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo esc_html__('No posts found', 'Echo News');
}
wp_reset_postdata(); // reset the data base
?>