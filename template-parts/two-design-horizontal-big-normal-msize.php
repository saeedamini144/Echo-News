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

    // اگر ۴ پست یا کمتر داریم، دو ستون را متعادل کن (وگرنه نیمی از بخش خالی می‌ماند)
    $total = (int) $args->post_count;
    $few   = $total <= 4;
    $split = $few ? (int) ceil($total / 2) : 4; // تعداد پست‌های ستون اول

    // باز کردن ستون چپ
    echo '<div class="col-xl-6 col-lg-6 col-md-12">';
    echo '<div class="row">';

    while ($args->have_posts()) {
        $args->the_post();
        $counter++;

        // پست‌های ستون اول (کارت افقی با تصویر بزرگ)
        if ($counter <= $split) {
            get_template_part('template-parts/horizontal-big-thumbnail-post-html');
        }

        // وقتی رسیدیم به آخرین پست ستون اول => ستون اول بسته میشه و ستون دوم باز میشه
        if ($counter == $split) {
            echo '</div>'; // بستن row چپ
            echo '</div>'; // بستن col چپ

            echo '<div class="col-xl-6 col-lg-6 col-md-12">';
            echo '<div class="row">';
        }

        // پست‌های بعد از آن => ستون دوم (با کمتر از ۵ پست، همان کارت افقی؛ وگرنه کارت عمودی)
        if ($counter > $split) {
            get_template_part('template-parts/' . ($few ? 'horizontal-big-thumbnail-post-html' : 'normal-msize-meta-excerpt-post-html'));
        }
    }

    // بستن div های باز برای ستون راست
    echo '</div>'; // بستن row راست
    echo '</div>'; // بستن col راست
} else {
    echo esc_html__('هیچ پستی یافت نشد', 'Echo-News');
}

wp_reset_postdata();
