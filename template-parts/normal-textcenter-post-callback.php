<?php

$select_category = get_theme_mod('seventh_section_main_posts_settings');

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
    )
);
//footer

if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
        get_template_part('template-parts/normal-textcenter-post-html');
    }
} else {
    echo esc_html__('No posts found', 'Echo News');
}
wp_reset_postdata();
