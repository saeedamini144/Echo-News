<?php
$args = new WP_Query(
    array(
        'post_type' => 'post',
        'posts_per_page' => 10,
        'orderby' => 'date',
        'order' => 'DESC',
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => array(), // Provide an array of term IDs or remove tax_query if not needed
            ),
        ),
    )
);

if ($args->have_posts()) {
    while ($args->have_posts()) {
        $args->the_post();
?>
        <div class="swiper-slide">
            <span>
                <?php
                echo Limited_title_characters(15);
                ?>
            </span>
        </div>

<?php
    }
} else {
    echo 'No Posts founds';
}
wp_reset_postdata(); // reset the data base 
?>


<!-- <?php

        if (have_posts()) {
            while (have_posts()) {
                the_post();
        ?>
        <div class="swiper-slide">
            <span>
                <?php
                echo Limited_title_characters(15);
                ?>
            </span>
        </div>

<?php
            }
        } else {
            echo 'No Posts founds';
        }
        wp_reset_postdata(); // reset the data base 
?> -->