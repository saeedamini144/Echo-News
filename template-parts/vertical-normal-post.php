<?php
/*$args = new WP_Query(
    array(
        'post_type' => 'post',
        // 'posts_per_page' => 10,
        'orderby=> date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => array(), // Provide an array of term IDs or remove tax_query if not needed
            ),
        ),

    ),
);
if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
?>
        <div class="echo-top-story first">
            <div class="echo-story-picture img-transition-scale">
                <a href="<?php the_permalink(); ?>">
                    <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="Echo" class="img-hover">
                </a>
            </div>
            <div class="echo-story-text">
                <h4><a href="#" class="title-hover"><?php the_title(); ?></a></h4>
                <div class="echo-trending-post-bottom-icons">
                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
                </div>
            </div>
        </div>
<?php
    }

    echo ' No category choose';
}
wp_reset_postdata(); // reset the data base
*/
?>
<div class="echo-top-story first">
    <div class="echo-story-picture img-transition-scale">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="<?php the_title(); ?>" class="img-hover">
        </a>
    </div>
    <div class="echo-story-text">
        <h4><a href="#" class="title-hover"><?php the_title(); ?></a></h4>
        <div class="echo-trending-post-bottom-icons">
            <i class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
            <i class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
        </div>
    </div>
</div>