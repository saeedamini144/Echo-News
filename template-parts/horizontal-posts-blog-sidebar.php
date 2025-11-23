<?php
$select_category = get_theme_mod('blog_sidebar_first_cats_settings');
$args = new WP_Query(
    array(
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
    )
);

if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
        get_template_part('template-parts/horizontal-posts-html');
    }
} else {
    echo esc_html__('No post found', 'Echo News');
}
wp_reset_postdata();
