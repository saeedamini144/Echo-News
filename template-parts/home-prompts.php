<?php

/**
 * سکشن «گالری پرامپت» صفحه‌ی اصلی (بعد از بخش سوم)
 * تنظیمات: کاستومایزر > تنظیمات قالب > تنظیمات صفحه اصلی > بخش پرامپت
 * پیش‌نمایش طراحی: prompt-section.html
 */

if (!defined('ABSPATH')) {
    exit;
}

if (!post_type_exists('ai_prompt') || !get_theme_mod('prompt_section_show_settings', true)) {
    return;
}

$tag        = echo_news_heading_tag('tag_heading_main_page_prompt_section_settings');
$title      = get_theme_mod('title_main_page_prompt_section_settings', 'پرامپت‌های آماده برای ساخت تصویر با هوش مصنوعی');
$kicker     = get_theme_mod('prompt_section_kicker_settings', 'گالری پرامپت');
$lead       = get_theme_mod('prompt_section_lead_settings', 'پرامپت را کپی کنید، در ChatGPT بفرستید و در چند ثانیه تصویر بگیرید. هر پرامپت با تصویر نمونه، ترجمه‌ی فارسی و نکات شخصی‌سازی.');
$cta_text   = get_theme_mod('prompt_section_button_text_settings', 'مشاهده‌ی همه‌ی پرامپت‌ها');
$show_stats = (bool) get_theme_mod('prompt_section_show_stats_settings', true);
$show_chips = (bool) get_theme_mod('prompt_section_show_chips_settings', true);
$cats       = array_filter(array_map('intval', (array) get_theme_mod('prompt_section_categories_settings')));
$order      = get_theme_mod('prompt_section_orderby_settings', 'date');
$count      = max(2, min(12, (int) get_theme_mod('prompt_section_count_settings', 6)));
$archive    = get_post_type_archive_link('ai_prompt');

// کوئری کارت‌ها
$args = array(
    'post_type'           => 'ai_prompt',
    'posts_per_page'      => $count,
    'no_found_rows'       => true,
    'ignore_sticky_posts' => true,
);

if ($cats) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'prompt_category',
            'field'    => 'term_id',
            'terms'    => $cats,
        ),
    );
}

$meta_keys = array('views' => 'post_views_count', 'copies' => '_ep_copies');
if (isset($meta_keys[$order])) {
    // پرامپت‌هایی که هنوز آن meta را ندارند هم بیایند (آخر لیست)
    $args['meta_query'] = array(
        'relation'       => 'OR',
        'ep_sort_clause' => array('key' => $meta_keys[$order], 'type' => 'NUMERIC', 'compare' => 'EXISTS'),
        array('key' => $meta_keys[$order], 'compare' => 'NOT EXISTS'),
    );
    $args['orderby'] = array('ep_sort_clause' => 'DESC', 'date' => 'DESC');
} elseif ($order === 'rand') {
    $args['orderby'] = 'rand';
} else {
    $args['orderby'] = 'date';
    $args['order']   = 'DESC';
}

$prompts = new WP_Query($args);

if (!$prompts->have_posts()) {
    return;
}

// آمار (کش ۶ ساعته؛ جمع کپی‌ها یک کوئری مستقیم است)
$stats = false;
if ($show_stats) {
    $stats = get_transient('echo_news_prompt_home_stats');
    if ($stats === false) {
        global $wpdb;
        $copies = (int) $wpdb->get_var("SELECT SUM(pm.meta_value) FROM {$wpdb->postmeta} pm INNER JOIN {$wpdb->posts} p ON p.ID = pm.post_id WHERE pm.meta_key = '_ep_copies' AND p.post_type = 'ai_prompt' AND p.post_status = 'publish'");
        $terms  = wp_count_terms(array('taxonomy' => 'prompt_category', 'hide_empty' => true));
        $stats  = array(
            'prompts' => (int) wp_count_posts('ai_prompt')->publish,
            'cats'    => is_wp_error($terms) ? 0 : (int) $terms,
            'copies'  => $copies,
        );
        set_transient('echo_news_prompt_home_stats', $stats, 6 * HOUR_IN_SECONDS);
    }
}

// چیپ‌ها: دسته‌های انتخاب‌شده، وگرنه پرتعدادترین دسته‌ها
$chips = array();
if ($show_chips) {
    $chips = get_terms(array(
        'taxonomy'   => 'prompt_category',
        'hide_empty' => true,
        'number'     => 5,
        'orderby'    => $cats ? 'include' : 'count',
        'order'      => 'DESC',
        'include'    => $cats ? $cats : array(),
    ));
    $chips = is_wp_error($chips) ? array() : $chips;
}
?>
<!-- Start Prompt Gallery Section (after the third section) -->
<section class="ep ep-home" id="prompt-section" aria-labelledby="ep-home-title">
    <div class="container">
        <div class="ep-home__grid">

            <!-- پنل معرفی -->
            <div class="ep-home__intro">
                <?php if ($kicker) : ?>
                    <span class="ep-home__kicker"><i class="fa-light fa-wand-magic-sparkles"></i> <?php echo esc_html($kicker); ?></span>
                <?php endif; ?>

                <<?php echo esc_html($tag); ?> class="ep-home__title" id="ep-home-title"><?php echo esc_html($title); ?></<?php echo esc_html($tag); ?>>

                <?php if ($lead) : ?>
                    <p class="ep-home__lead"><?php echo esc_html($lead); ?></p>
                <?php endif; ?>

                <?php if ($stats) : ?>
                    <ul class="ep-home__stats">
                        <li><b><?php echo esc_html(echo_news_short_number($stats['prompts'])); ?></b><span>پرامپت</span></li>
                        <li><b><?php echo esc_html(echo_news_short_number($stats['cats'])); ?></b><span>دسته‌بندی</span></li>
                        <li><b><?php echo esc_html(echo_news_short_number($stats['copies'])); ?></b><span>بار کپی</span></li>
                    </ul>
                <?php endif; ?>

                <?php if ($chips) : ?>
                    <nav class="ep-home__chips" aria-label="دسته‌بندی پرامپت‌ها">
                        <?php foreach ($chips as $chip) : ?>
                            <a href="<?php echo esc_url(get_term_link($chip)); ?>"><?php echo esc_html($chip->name); ?></a>
                        <?php endforeach; ?>
                    </nav>
                <?php endif; ?>

                <?php if ($archive && $cta_text) : ?>
                    <a class="ep-home__cta" href="<?php echo esc_url($archive); ?>"><?php echo esc_html($cta_text); ?> <i class="fa-light fa-arrow-left"></i></a>
                <?php endif; ?>
            </div>

            <!-- کارت‌ها -->
            <div class="ep-home__cards<?php echo $prompts->post_count <= 4 ? " ep-home__cards--few" : ""; ?>">
                <?php
                while ($prompts->have_posts()) {
                    $prompts->the_post();
                    get_template_part('template-parts/prompt-card');
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>

        <?php if ($archive && $cta_text) : ?>
            <div class="ep-home__more"><a href="<?php echo esc_url($archive); ?>"><?php echo esc_html($cta_text); ?> <i class="fa-light fa-arrow-left"></i></a></div>
        <?php endif; ?>
    </div>
</section>
<!-- End Prompt Gallery Section -->
