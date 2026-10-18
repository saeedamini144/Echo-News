<?php

/**
 * بدنه‌ی مشترک آرشیو گالری پرامپت
 * استفاده در: archive-ai_prompt.php، taxonomy-prompt_category.php، taxonomy-prompt_model.php
 * کارت‌ها: template-parts/prompt-card.php | پیش‌نمایش: single-ai_prompt_card.html
 */

if (!defined('ABSPATH')) {
    exit;
}

global $wp_query;

$is_tax   = is_tax(array('prompt_category', 'prompt_model'));
$term     = $is_tax ? get_queried_object() : null;
$base_url = $is_tax ? get_term_link($term) : get_post_type_archive_link('ai_prompt');

// عنوان و توضیح (توضیح ترم = متن سئویی لندینگ)
if ($term) {
    $h1    = 'پرامپت‌های ' . $term->name;
    $intro = term_description($term);
} else {
    $post_type = get_post_type_object('ai_prompt');
    $h1        = 'گالری پرامپت هوش مصنوعی';
    $intro     = $post_type && $post_type->description ? '<p>' . esc_html($post_type->description) . '</p>' : '';
}

// ترم‌های فعال (خود ترم و والدهایش) برای هایلایت چیپ‌ها
$active_ids = array();
if ($term) {
    $active_ids = array_merge(array($term->term_id), get_ancestors($term->term_id, $term->taxonomy, 'taxonomy'));
}

// مرتب‌سازی
$sorts = array(
    ''       => 'جدیدترین',
    'views'  => 'پربازدیدترین',
    'copies' => 'پرکپی‌ترین',
);
$current_sort = isset($_GET['ep_sort']) ? sanitize_key(wp_unslash($_GET['ep_sort'])) : '';
if (!isset($sorts[$current_sort])) {
    $current_sort = '';
}

$categories = get_terms(array('taxonomy' => 'prompt_category', 'hide_empty' => true, 'parent' => 0, 'orderby' => 'count', 'order' => 'DESC'));
$models     = get_terms(array('taxonomy' => 'prompt_model', 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC'));
?>

<div class="innerpage ep">

    <!-- breadcrumb + عنوان -->
    <div class="echo-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-inner text-center">
                        <div class="meta"><?php breadcrumb(); ?></div>
                    </div>
                </div>
                <div class="col-lg-12 text-center">
                    <h1><?php echo esc_html($h1); ?></h1>
                    <?php if ($intro) : ?>
                        <div class="ep-intro"><?php echo wp_kses_post($intro); ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <section class="echo-hero-section inner inner-2 inner-3">
        <div class="echo-hero">
            <div class="container">

                <!-- فیلتر و مرتب‌سازی (همه لینک واقعی‌اند، قابل خزش) -->
                <div class="ep-bar">
                    <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                        <div class="ep-bar__row">
                            <span class="ep-bar__label">دسته:</span>
                            <a class="ep-chip<?php echo (!$term) ? ' is-active' : ''; ?>" href="<?php echo esc_url(get_post_type_archive_link('ai_prompt')); ?>">همه</a>
                            <?php foreach ($categories as $c) : ?>
                                <a class="ep-chip<?php echo in_array($c->term_id, $active_ids, true) ? ' is-active' : ''; ?>" href="<?php echo esc_url(get_term_link($c)); ?>"><?php echo esc_html($c->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($models) && !is_wp_error($models)) : ?>
                        <div class="ep-bar__row">
                            <span class="ep-bar__label">مدل:</span>
                            <?php foreach ($models as $m) : ?>
                                <a class="ep-chip<?php echo in_array($m->term_id, $active_ids, true) ? ' is-active' : ''; ?>" href="<?php echo esc_url(get_term_link($m)); ?>"><?php echo esc_html($m->name); ?></a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>

                    <div class="ep-bar__row ep-bar__meta">
                        <span class="ep-count"><?php echo esc_html(number_format_i18n($wp_query->found_posts)); ?> پرامپت</span>
                        <span class="ep-sort">
                            <?php foreach ($sorts as $key => $label) : ?>
                                <a class="<?php echo $current_sort === $key ? 'is-active' : ''; ?>" href="<?php echo esc_url($key ? add_query_arg('ep_sort', $key, $base_url) : $base_url); ?>" <?php echo $key ? 'rel="nofollow"' : ''; ?>><?php echo esc_html($label); ?></a>
                            <?php endforeach; ?>
                        </span>
                    </div>
                </div>

                <!-- شبکه کارت‌ها -->
                <?php if (have_posts()) : ?>
                    <div class="ep-grid">
                        <?php
                        while (have_posts()) {
                            the_post();
                            get_template_part('template-parts/prompt-card');
                        }
                        ?>
                    </div>

                    <div class="ep-pager">
                        <?php Echo_pagination(); ?>
                    </div>
                <?php else : ?>
                    <div class="ep-empty">
                        <p>هنوز پرامپتی در این بخش ثبت نشده است.</p>
                        <?php if ($term) : ?>
                            <a class="ep-btn" href="<?php echo esc_url(get_post_type_archive_link('ai_prompt')); ?>">مشاهده همه پرامپت‌ها</a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </section>
</div>
