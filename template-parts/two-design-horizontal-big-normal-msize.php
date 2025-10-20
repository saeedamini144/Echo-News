<?php
$select_category = (array) get_theme_mod('third_section_posts_settings');

$args = new WP_Query(array(
    'post_type'      => 'post',
    'orderby'        => 'date',
    'posts_per_page' => 6,
    'order'          => 'DESC',
    'tax_query'      => array(
        array(
            'taxonomy' => 'category',
            'field'    => 'term_id',
            'terms'    => $select_category,
        ),
    ),
));

if ($args->have_posts()) {
    $counter = 0;

    // باز کردن ستون چپ
    echo '<div class="col-xl-6 col-lg-6 col-md-12">';
    echo '<div class="row">';

    while ($args->have_posts()) {
        $args->the_post();
        $counter++;

        // پست‌های ۱ تا ۳ => ستون چپ
        if ($counter <= 4) {
            get_template_part('template-parts/horizontal-big-thumbnail-post-html');
        }

        // وقتی رسیدیم به پست ۴ => ستون چپ بسته میشه و ستون راست باز میشه
        if ($counter == 4) {
            echo '</div>'; // بستن row چپ
            echo '</div>'; // بستن col چپ

            echo '<div class="col-xl-6 col-lg-6 col-md-12">';
            echo '<div class="row">';
        }

        // پست‌های ۴ و بعد از آن => ستون راست
        if ($counter > 4) {
            get_template_part('template-parts/normal-msize-meta-excerpt-post-html');
        }
    }

    // بستن div های باز برای ستون راست
    echo '</div>'; // بستن row راست
    echo '</div>'; // بستن col راست
} else {
    echo esc_html__('No post found', 'Echo News');
}

wp_reset_postdata();
