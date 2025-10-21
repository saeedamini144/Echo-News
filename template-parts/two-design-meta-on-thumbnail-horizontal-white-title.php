<?php
$select_category = (array) get_theme_mod('fourth_section_posts_settings');
$args = new WP_Query(array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC',
    'tax_query' => array(
        array(
            'taxonomy' => 'category',
            'field' => 'term_id',
            'terms' => $select_category,
        )
    ),
));

if ($args->have_posts()) {
    $counter = 0;
    echo '<div class="col-lg-8 col-md-12">';
    while ($args->have_posts()) {
        $args->the_post();
        $counter++;
        if ($counter == 1) {
            get_template_part('template-parts/meta-on-thumbnail-post');
            echo '</div>';
            echo '<div class="col-lg-4 col-md-12">';
            echo ' <div class="echo-video-area-home-1-right-content-responsive">';
        } elseif ($counter > 1) {
            get_template_part('template-parts/horizontal-white-title-post');
        }
    }
    echo ' </div>';
    echo '</div>';
} else {
    echo esc_html__('No post found', 'Echo News');
}
wp_reset_postdata();
