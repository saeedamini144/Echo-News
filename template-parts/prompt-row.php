<?php

/**
 * کارت فشرده‌ی پرامپت (سایدبار، نتایج جست‌وجو)
 * داخل حلقه‌ی وردپرس استفاده شود. پیش‌نمایش: single-ai_prompt_card.html (بخش «نسخه فشرده»)
 */

if (!defined('ABSPATH')) {
    exit;
}

$post_id = get_the_ID();
$d       = echo_news_get_prompt_data($post_id);
$title   = get_the_title();
$model   = echo_news_first_term($post_id, 'prompt_model');
$cat     = echo_news_first_term($post_id, 'prompt_category');
$label   = array_filter(array($cat ? $cat->name : '', $model ? $model->name : ''));
?>
<article class="ep-row">
    <div class="ep-row__img">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail('thumbnail', array(
                'alt'     => echo_news_prompt_image_alt($post_id),
                'loading' => 'lazy',
            ));
        }
        ?>
    </div>

    <div class="ep-row__txt">
        <?php if ($label) : ?>
            <small><?php echo esc_html(implode(' · ', $label)); ?></small>
        <?php endif; ?>
        <h4><a href="<?php the_permalink(); ?>"><?php echo esc_html($title); ?></a></h4>
    </div>

    <?php if ($d['prompt']) : ?>
        <button class="ep-card__copy" type="button"
            data-copy-text="<?php echo esc_attr($d['prompt']); ?>"
            data-post-id="<?php echo esc_attr($post_id); ?>"
            aria-label="<?php echo esc_attr('کپی پرامپت: ' . $title); ?>" title="کپی پرامپت">
            <i class="fa-light fa-copy"></i>
        </button>
    <?php endif; ?>
</article>
