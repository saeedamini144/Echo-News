<?php

/**
 * کارت پرامپت (گالری، آرشیو دسته/مدل، مشابه‌ها)
 * داخل حلقه‌ی وردپرس استفاده شود؛ پست جاری = پرامپت.
 * پیش‌نمایش طراحی: single-ai_prompt_card.html
 */

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();
$d       = echo_news_get_prompt_data($post_id);
$title   = get_the_title();
$model   = echo_news_first_term($post_id, 'prompt_model');
$cat     = echo_news_first_term($post_id, 'prompt_category');
$views   = (int) get_post_meta($post_id, 'post_views_count', true);

// ریبون: پرطرفدار > جدید
$flag = '';
if (get_post_timestamp($post_id) > strtotime('-7 days')) {
    $flag = 'جدید';
}
if ($views >= (int) apply_filters('echo_news_prompt_popular_threshold', 1000)) {
    $flag = 'پرطرفدار';
}

$images  = $d['gallery'] ? count($d['gallery']) + 1 : 0;
$snippet = wp_trim_words(str_replace(array('[', ']'), '', $d['prompt']), 22, '…');
?>
<article class="ep-card" style="--r: <?php echo esc_attr(echo_news_prompt_ratio_css($d['ratio'])); ?>">
    <div class="ep-card__media">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('medium_large', array(
                'alt'      => echo_news_prompt_image_alt($post_id),
                'loading'  => 'lazy',
                'decoding' => 'async',
            ));
        }
        ?>

        <?php if ($model) : ?>
            <span class="ep-card__model"><?php echo esc_html($model->name); ?></span>
        <?php endif; ?>

        <?php if ($flag) : ?>
            <span class="ep-card__flag"><?php echo esc_html($flag); ?></span>
        <?php endif; ?>

        <?php if ($d['prompt']) : ?>
            <button class="ep-card__copy" type="button"
                data-copy-text="<?php echo esc_attr($d['prompt']); ?>"
                data-post-id="<?php echo esc_attr($post_id); ?>"
                aria-label="<?php echo esc_attr('کپی پرامپت: ' . $title); ?>" title="کپی پرامپت">
                <i class="fa-light fa-copy"></i>
            </button>
        <?php endif; ?>

        <?php if ($images) : ?>
            <span class="ep-card__count"><i class="fa-light fa-layer-group"></i><?php echo esc_html(number_format_i18n($images)); ?> تصویر</span>
        <?php endif; ?>

        <?php if ($snippet) : ?>
            <p class="ep-card__snippet" aria-hidden="true"><?php echo esc_html($snippet); ?></p>
        <?php endif; ?>
    </div>

    <div class="ep-card__body">
        <?php if ($cat) : ?>
            <a class="ep-card__cat" href="<?php echo esc_url(get_term_link($cat)); ?>"><?php echo esc_html($cat->name); ?></a>
        <?php endif; ?>

        <h3 class="ep-card__title"><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h3>

        <div class="ep-card__meta">
            <span title="تعداد کپی"><i class="fa-light fa-copy"></i><?php echo esc_html(echo_news_short_number($d['copies'])); ?></span>
            <span title="بازدید"><i class="fa-light fa-eye"></i><?php echo esc_html(echo_news_short_number($views)); ?></span>
            <span><?php echo esc_html(echo_news_post_date('j F', $post_id)); ?></span>
        </div>
    </div>
</article>
