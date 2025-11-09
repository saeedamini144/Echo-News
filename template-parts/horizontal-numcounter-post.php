<?php

$select_category = get_theme_mod('sixth_section_main_posts_col2_settings');

$args = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 4,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
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
?>
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="echo-feature-area-option-content">
                <div class="echo-feature-area-option-number">
                    <p>0<?php echo $counter; ?></p>
                </div>
                <div class="echo-feature-area-option-content-text">
                    <h5 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a> </h5>
                    <div class="echo-feature-area-option-read-more">
                        <i id="card-icon" class="fa-light fa-clock"></i> <span><?php echo EchoNews_time_to_read(); ?></span>
                    </div>
                </div>
            </div>
        </div>
<?php
    }
} else {
    echo esc_html__('No post found', 'EchoNews');
}
wp_reset_postdata();
?>