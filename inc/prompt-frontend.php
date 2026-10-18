<?php

/**
 * فرانت‌اند گالری پرامپت (ai_prompt)
 * - بارگذاری CSS/JS فقط روی صفحات پرامپت
 * - شمارنده کپی (AJAX)
 * - توابع کمکی قالب‌ها (ترم، عدد کوتاه، هایلایت [ ]، کوئری مشابه/محبوب)
 * - meta description / Open Graph / schema (ImageObject) برای صفحه تکی
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ------------------------------------------------------------------
 * تشخیص صفحات پرامپت
 * ------------------------------------------------------------------ */
function echo_news_is_prompt_page()
{
    return is_singular('ai_prompt')
        || is_post_type_archive('ai_prompt')
        || is_tax(array('prompt_category', 'prompt_model'));
}

/* ------------------------------------------------------------------
 * CSS / JS
 * ------------------------------------------------------------------ */
function echo_news_prompt_assets()
{
    if (!echo_news_is_prompt_page()) {
        return;
    }

    $version = wp_get_theme()->get('version');

    wp_enqueue_style('EchoNews-prompt', get_template_directory_uri() . '/assets/css/prompt.css', array('EchoNews-style'), $version, 'all');
    wp_enqueue_script('EchoNews-prompt', get_template_directory_uri() . '/assets/js/prompt.js', array(), $version, true);
    wp_localize_script('EchoNews-prompt', 'echoNewsPrompt', array(
        'ajaxUrl' => admin_url('admin-ajax.php'),
        'copied'  => 'کپی شد ✓',
    ));
}
add_action('wp_enqueue_scripts', 'echo_news_prompt_assets', 20);

// کلاس body برای فاصله‌ی نوار چسبان موبایل
function echo_news_prompt_body_class($classes)
{
    if (is_singular('ai_prompt')) {
        $classes[] = 'ep-has-mbar';
    }
    return $classes;
}
add_filter('body_class', 'echo_news_prompt_body_class');

/* ------------------------------------------------------------------
 * شمارنده کپی (AJAX)
 * هر IP در هر ساعت برای هر پرامپت فقط یک بار شمرده می‌شود.
 * ------------------------------------------------------------------ */
function echo_news_prompt_ajax_copied()
{
    $id = isset($_POST['id']) ? absint($_POST['id']) : 0;

    if (!$id || get_post_type($id) !== 'ai_prompt' || get_post_status($id) !== 'publish') {
        wp_send_json_error(null, 400);
    }

    $ip  = isset($_SERVER['REMOTE_ADDR']) ? sanitize_text_field(wp_unslash($_SERVER['REMOTE_ADDR'])) : '';
    $key = 'ep_copy_' . md5($id . '|' . $ip);

    if (!get_transient($key)) {
        set_transient($key, 1, HOUR_IN_SECONDS);
        update_post_meta($id, '_ep_copies', (int) get_post_meta($id, '_ep_copies', true) + 1);
    }

    wp_send_json_success(array('copies' => (int) get_post_meta($id, '_ep_copies', true)));
}
add_action('wp_ajax_echo_news_prompt_copied', 'echo_news_prompt_ajax_copied');
add_action('wp_ajax_nopriv_echo_news_prompt_copied', 'echo_news_prompt_ajax_copied');

/* ------------------------------------------------------------------
 * توابع کمکی قالب‌ها
 * ------------------------------------------------------------------ */

// اولین ترم یک taxonomy برای یک پست (یا null)
function echo_news_first_term($post_id, $taxonomy)
{
    $terms = get_the_terms($post_id, $taxonomy);
    if (empty($terms) || is_wp_error($terms)) {
        return null;
    }
    return reset($terms);
}

// عدد کوتاه: 1250 => 1.3k
function echo_news_short_number($n)
{
    $n = (int) $n;
    if ($n >= 1000) {
        return number_format_i18n($n / 1000, 1) . 'k';
    }
    return number_format_i18n($n);
}

// متن پرامپت امن + هایلایت بخش‌های قابل تغییر [ ... ]
function echo_news_prompt_highlight($text)
{
    return preg_replace('/\[([^\]]+)\]/u', '<span class="ep-var">[$1]</span>', esc_html($text));
}

// alt تصویر شاخص؛ اگر خالی بود عنوان پرامپت
function echo_news_prompt_image_alt($post_id)
{
    $alt = trim((string) get_post_meta(get_post_thumbnail_id($post_id), '_wp_attachment_image_alt', true));
    return $alt !== '' ? $alt : get_the_title($post_id);
}

// نسبت تصویر برای CSS: "4:5" => "4/5"
function echo_news_prompt_ratio_css($ratio)
{
    return isset(echo_news_prompt_ratios()[$ratio]) ? str_replace(':', '/', $ratio) : '4/5';
}

// پرامپت‌های مشابه: هم‌دسته یا هم‌مدل
function echo_news_get_related_prompts($post_id, $limit = 6)
{
    $tax_query = array('relation' => 'OR');
    foreach (array('prompt_category', 'prompt_model') as $taxonomy) {
        $ids = wp_get_post_terms($post_id, $taxonomy, array('fields' => 'ids'));
        if (!empty($ids) && !is_wp_error($ids)) {
            $tax_query[] = array('taxonomy' => $taxonomy, 'field' => 'term_id', 'terms' => $ids);
        }
    }

    $args = array(
        'post_type'           => 'ai_prompt',
        'post__not_in'        => array($post_id),
        'posts_per_page'      => $limit,
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    );
    if (count($tax_query) > 1) {
        $args['tax_query'] = $tax_query;
    }

    return new WP_Query($args);
}

// محبوب‌ترین پرامپت‌ها (بر اساس بازدید)؛ اگر بازدیدی ثبت نشده بود جدیدترین‌ها
function echo_news_get_popular_prompts($limit = 4, $exclude = 0)
{
    $args = array(
        'post_type'           => 'ai_prompt',
        'posts_per_page'      => $limit,
        'post__not_in'        => $exclude ? array($exclude) : array(),
        'meta_key'            => 'post_views_count',
        'orderby'             => 'meta_value_num',
        'order'               => 'DESC',
        'no_found_rows'       => true,
        'ignore_sticky_posts' => true,
    );
    $query = new WP_Query($args);

    if (!$query->have_posts()) {
        unset($args['meta_key']);
        $args['orderby'] = 'date';
        $query = new WP_Query($args);
    }
    return $query;
}

/* ------------------------------------------------------------------
 * meta description / Open Graph / schema (فقط صفحه تکی پرامپت)
 * ------------------------------------------------------------------ */
function echo_news_prompt_head()
{
    if (!is_singular('ai_prompt')) {
        return;
    }

    $post_id = get_queried_object_id();
    $d       = echo_news_get_prompt_data($post_id);
    $title   = get_the_title($post_id);
    $url     = get_permalink($post_id);
    $image   = get_the_post_thumbnail_url($post_id, 'full');

    $desc = has_excerpt($post_id) ? get_the_excerpt($post_id) : wp_trim_words($d['prompt'], 30, '…');
    $desc = trim(wp_strip_all_tags($desc));

    // اگر افزونه سئو فعال است، meta و OG را خودش می‌سازد
    $seo_plugin = defined('WPSEO_VERSION') || class_exists('RankMath');

    if (!$seo_plugin) {
        echo '<meta name="description" content="' . esc_attr($desc) . '">' . "\n";
        echo '<meta property="og:type" content="article">' . "\n";
        echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
        echo '<meta property="og:description" content="' . esc_attr($desc) . '">' . "\n";
        echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
        echo '<meta property="og:site_name" content="' . esc_attr(get_bloginfo('name')) . '">' . "\n";
        if ($image) {
            echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
            echo '<meta name="twitter:card" content="summary_large_image">' . "\n";
            echo '<meta name="twitter:image" content="' . esc_url($image) . '">' . "\n";
        }
    }

    // schema: ImageObject (برای Google Images)
    if (!$image) {
        return;
    }

    $keywords = array();
    foreach (array('prompt_category', 'prompt_model') as $taxonomy) {
        $terms = get_the_terms($post_id, $taxonomy);
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                $keywords[] = $term->name;
            }
        }
    }

    $thumb_id = get_post_thumbnail_id($post_id);
    $meta     = wp_get_attachment_metadata($thumb_id);

    $schema = array(
        '@context'         => 'https://schema.org',
        '@type'            => 'ImageObject',
        'name'             => $title,
        'description'      => $desc,
        'contentUrl'       => $image,
        'thumbnailUrl'     => get_the_post_thumbnail_url($post_id, 'medium'),
        'datePublished'    => get_the_date('c', $post_id),
        'dateModified'     => get_the_modified_date('c', $post_id),
        'inLanguage'       => 'fa-IR',
        'creditText'       => get_bloginfo('name'),
        'representativeOfPage' => true,
        'mainEntityOfPage' => $url,
        'author'           => array(
            '@type' => 'Person',
            'name'  => get_the_author_meta('display_name', get_post_field('post_author', $post_id)),
        ),
    );
    if (!empty($meta['width']) && !empty($meta['height'])) {
        $schema['width']  = (int) $meta['width'];
        $schema['height'] = (int) $meta['height'];
    }
    if ($keywords) {
        $schema['keywords'] = implode(', ', $keywords);
    }

    echo '<script type="application/ld+json">' . wp_json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>' . "\n";
}
add_action('wp_head', 'echo_news_prompt_head', 5);

/* ------------------------------------------------------------------
 * آرشیوها: تعداد در صفحه و مرتب‌سازی (?ep_sort=views|copies)
 * ------------------------------------------------------------------ */
function echo_news_prompt_pre_get_posts($query)
{
    if (is_admin() || !$query->is_main_query()) {
        return;
    }
    if (!$query->is_post_type_archive('ai_prompt') && !$query->is_tax(array('prompt_category', 'prompt_model'))) {
        return;
    }

    $query->set('posts_per_page', (int) apply_filters('echo_news_prompt_per_page', 12));

    $sort = isset($_GET['ep_sort']) ? sanitize_key(wp_unslash($_GET['ep_sort'])) : '';
    $keys = array('views' => 'post_views_count', 'copies' => '_ep_copies');

    if (isset($keys[$sort])) {
        // پست‌هایی که هنوز آن meta را ندارند هم بیایند (آخر لیست)
        $query->set('meta_query', array(
            'relation'      => 'OR',
            'ep_sort_clause' => array('key' => $keys[$sort], 'type' => 'NUMERIC', 'compare' => 'EXISTS'),
            array('key' => $keys[$sort], 'compare' => 'NOT EXISTS'),
        ));
        $query->set('orderby', array('ep_sort_clause' => 'DESC', 'date' => 'DESC'));
    }
}
add_action('pre_get_posts', 'echo_news_prompt_pre_get_posts');

// نسخه‌های مرتب‌شده محتوای تکراری‌اند؛ ایندکس نشوند
function echo_news_prompt_robots($robots)
{
    if (isset($_GET['ep_sort']) && echo_news_is_prompt_page()) {
        $robots['noindex'] = true;
        $robots['follow']  = true;
        unset($robots['max-image-preview']);
    }
    return $robots;
}
add_filter('wp_robots', 'echo_news_prompt_robots');
