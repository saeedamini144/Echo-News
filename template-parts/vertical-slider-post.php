<?php
$select_category = get_theme_mod('vertical_header_post_slider');
$args = new WP_Query(
    array(
        'post_type' => 'post',
        // 'posts_per_page' => 10,
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
        <div class="swiper-slide">
            <a href="<?php the_permalink(); ?>">
                <?php
                echo Limited_title_characters(30);
                ?>
            </a>
        </div>

<?php
    }
} else {
    echo 'No Posts founds';
}
wp_reset_postdata(); // reset the data base 
?>