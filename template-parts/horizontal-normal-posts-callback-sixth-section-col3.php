<?php

$select_category = get_theme_mod('sixth_section_main_posts_col3_settings');
$args = new WP_Query(
    array(
        'post_type' => 'post',
        'posts_per_page' => 6,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $select_category,
            )
        )
    ),
);

if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
        get_template_part('template-parts/horizontal-posts-html');
    }
} else {
    echo esc_html__('No Category Choose', 'Echo News');
}
wp_reset_postdata();
