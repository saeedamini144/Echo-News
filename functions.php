<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

//make force to install the plugins and not worked themes
// add_action('after_setup_theme', 'check_required_plugins');
// function check_required_plugins()
// {
//     if (!is_plugin_active('elementor/elementor.php') || !is_plugin_active('woocommerce/woocommerce.php')) {
//         wp_die('برای استفاده از این قالب، افزونه‌های ضروری باید نصب و فعال شوند.');
//     }
// }


//add include files
function register_incFile()
{
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
    require_once get_template_directory() . '/inc/plugins.php';
    require_once get_template_directory() . '/inc/class-custom-menu-walker.php';
    require_once get_template_directory() . '/inc/customizer.php';
    require_once get_template_directory() . '/inc/post-callback-functions.php';
    require_once get_template_directory() . '/inc/class-breadcrumb.php';
    require_once get_template_directory() . '/inc/pagination.php';
}
add_action('after_setup_theme', 'register_incFile'); //note load the correct style in dashboard at least fix it up

function theme_support_EchoNews()
{
    //add the support for title tag
    add_theme_support('title-tag');

    //add theme support or thepost thumbnails
    add_theme_support('post-thumbnails');

    //add theme support for custom logo
    add_theme_support('custom-logo', array(
        'height' => 200,
        'width' => 400,
        'flex-height' => true,
        'flex-width' => true,
    ));


    //add theme support for the custom background
    // add_theme_support('custon-backlground', array(
    //     'default-color' => 'ffffff',
    //     'default-image' => '',
    // ));

    //add theme support for the HTML5 support
    add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));

    //add theme support for the automatic feed links
    // add_theme_support('automatic-feed-links');

    //add theme support for selective refresh widgets(This feature enables Selective Refresh for Widgets being managed within the Customizer.)
    add_theme_support('customize-selective-refresh-widgets');
}
add_action('after_setup_theme', 'theme_support_EchoNews');

//register menu
function eco_register_nav_menu()
{
    register_nav_menus(array(
        'Desktop_Menu' => __('Primary Menu', 'echo'),
        'mobile_Menu'  => __('Mobile Menu', 'echo'),
        'footer_Menu' => __('Footer Menu', 'echo'),
    ));
}
add_action('init', 'eco_register_nav_menu');

//call back the breadcrumb class
function breadcrumb()
{
    $breadcrumb = new Breadcrumb();
    $breadcrumb->render();
}

// enqueue styles and scripts
function register_style_EchoNews()
{
    // wp_enqueue_style($handle, $src, $deps, $ver, $media);

    $version = wp_get_theme()->get('version');

    wp_enqueue_style('Fontawesome-EchoNews', get_template_directory_uri() . '/assets/css/plugins/fontawesome-5.css', array(), '6.1.1', 'all');
    wp_enqueue_style('Bootstrap-EchoNews', get_template_directory_uri() . '/assets/css/vendor/bootstrap.min.css', array(), '5.0.2', 'all');
    wp_enqueue_style('Swiper-EchoNews', get_template_directory_uri() . '/assets/css/vendor/swiper.css', array(), '9.3.2', 'all');
    wp_enqueue_style('Metismenu-EchoNews',  get_template_directory_uri() . '/assets/css/vendor/metismenu.css', array(), $version, 'all');
    wp_enqueue_style('magnificpopup-EchoNews', get_template_directory_uri() . '/assets/css/vendor/magnific-popup.css', array(), $version, 'all');
    // Only enqueue the main theme stylesheet on the frontend, not in the admin dashboard
    if (!is_admin()) {
        wp_enqueue_style('EchoNews-style', get_template_directory_uri() . '/style.css', array(), $version, 'all'); //not load in dashboard
    }
}
add_action('wp_enqueue_scripts', 'register_style_EchoNews');

function add_rtl_files()
{
    if (is_rtl()) {
        $version = wp_get_theme()->get('version');
        wp_enqueue_style('EchoNews-rtl-style', get_template_directory_uri() . '/assets/css/rtl.css', array(), $version, 'all');
    }
}
add_action('wp_enqueue_scripts', 'add_rtl_files', 11);

function register_scripts_EchoNews()
{
    // wp_enqueue_script($handle, $src, $deps, $ver, $in_footer);

    $version = wp_get_theme()->get('version');

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-EchoNews', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '5.0.2', true);
    wp_enqueue_script('swiper-EchoNews', get_template_directory_uri() . '/assets/js/vendor/swiper.js', array('jquery'), '9.3.2', true);
    wp_enqueue_script('metismenu-EchoNews', get_template_directory_uri() . '/assets/js/vendor/metisMenu.min.js', array('jquery'), $version, true);
    wp_enqueue_script('magnificpopup-EchoNews', get_template_directory_uri() . '/assets/js/plugins/magnific-popup.js', array('jquery'), $version, true);
    wp_enqueue_script('resize-sensor-EchoNews', get_template_directory_uri() . '/assets/js/plugins/resize-sensor.min.js', array('jquery'), $version, true);
    wp_enqueue_script('mainjs-EchoNews', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true);
    // wp_enqueue_script('anywhere-home-EchoNews', get_template_directory_uri() . '/assets/js/anywhere-home.js', array('jquery'), $version, true);

    // Localize script to pass data from PHP to JavaScript
    // wp_localize_script('mainjs-EchoNews', 'echoNewsData', array(
    //     'ajaxUrl' => admin_url('admin-ajax.php'),
    //     'nonce' => wp_create_nonce('echo_news_nonce'),
    // ));
    if (is_single()) {
        wp_enqueue_script('single-post-EchoNews', get_template_directory_uri() . '/assets/js/post-scripts.js', array('jquery'), $version, true);
    }
}
add_action('wp_enqueue_scripts', 'register_scripts_EchoNews');

//limited post title
function Limited_title_characters($limited)
{
    $title =  get_the_title();
    if (strlen($title) > $limited) {
        $title = substr($title, 0, $limited) . '...'; //substr(string,start,length)
    }
    return $title;
}
//time to read the post

function EchoNews_time_to_read()
{
    $content = get_post_field('post_content', get_the_id());
    $word_count = str_word_count(strip_tags($content)); //str_word_count counts the number of words in a string and strip_tags removes HTML tags
    if (empty($word_count)) {
        return esc_html__('no content', 'Echo News');
    }
    $reading_time = ceil($word_count / 200); //assuming average reading speed is 200 words per minute
    $total_reading_time = $reading_time . ' ' . esc_html__('min read', 'Echo News');
    return $total_reading_time;
}
//post view count
/**
 * تابع شمارش بازدید پست‌ها
 * این تابع در صفحه‌ی تک‌پست (single) اجرا می‌شود
 * و تعداد بازدیدها را در متادیتای پست ذخیره می‌کند.
 */
function EchoNews_post_views()
{
    // بررسی می‌کند آیا در صفحه‌ی نمایش یک پست تکی هستیم یا نه
    if (is_single()) {

        // گرفتن شناسه (ID) پست فعلی
        $post_id = get_the_ID();

        // خواندن مقدار فعلی متای 'post_views_count'
        $views = get_post_meta($post_id, 'post_views_count', true);

        // اگر هنوز هیچ مقداری برای بازدید ثبت نشده باشد
        if ($views == '') {
            // مقدار اولیه را صفر قرار می‌دهیم
            $views = 0;

            // حذف متای قدیمی در صورت وجود (برای اطمینان)
            delete_post_meta($post_id, 'post_views_count');

            // افزودن متای جدید با مقدار 0
            add_post_meta($post_id, 'post_views_count', '0');
        } else {
            // اگر متا وجود دارد، مقدار آن را یکی افزایش می‌دهیم
            $views++;

            // مقدار جدید را در متادیتای پست ذخیره می‌کنیم
            update_post_meta($post_id, 'post_views_count', $views);
        }
    }
}

// اجرای تابع بالا در زمان بارگذاری تگ <head> در صفحات سایت
// به این ترتیب، هنگام باز شدن صفحه‌ی پست تکی، شمارنده افزایش می‌یابد.
add_action('wp_head', 'EchoNews_post_views');
// نمایش تعداد بازدیدها
function EchoNews_post_views_count_display()
{
    $post_id = get_the_id();
    $views = get_post_meta($post_id, 'post_views_count', true);
    return $views . ' ' . esc_html__('Views', 'Echo News');
}

// comments rating save in data base
add_action('comment_post', function ($comment_id) {
    if (isset($_POST['rating']) && $_POST['rating'] !== '') {
        add_comment_meta($comment_id, 'rating', intval($_POST['rating']));
    }
});
function display_average_rating($post_id)
{
    $comments = get_comments(array('post_id' => $post_id, 'status' => 'approve'));
    $total_rating = 0;
    $total_comments = 0;

    foreach ($comments as $comment) {
        $rating = get_comment_meta($comment->comment_ID, 'rating', true);
        if ($rating) {
            $total_rating += $rating;
            $total_comments++;
        }
    }

    $average_rating = $total_comments > 0 ? round($total_rating / $total_comments, 1) : 0;

    // تولید HTML برای نمایش ستاره‌ها
    echo '<div class="average-rating">';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $average_rating) {
            echo '<span class="star text-warning">★</span>'; // ستاره طلایی
        } else {
            echo '<span class="star text-muted">★</span>'; // ستاره توسی
        }
    }
    echo '</div>';

    // اضافه کردن JSON-LD Schema
    if ($total_comments > 0) {
        $item_reviewed = array(
            '@type' => 'WebPage', // تغییر نوع داده به WebPage یا Article
            'name' => get_the_title($post_id),
            'url' => get_permalink($post_id),
        );

        $schema = array(
            '@context' => 'https://schema.org',
            '@type' => 'AggregateRating',
            'itemReviewed' => $item_reviewed,
            'ratingValue' => $average_rating,
            'reviewCount' => $total_comments,
            'bestRating' => 5,
            'worstRating' => 1,
        );

        echo '<script type="application/ld+json">' . json_encode($schema, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) . '</script>';
    }
}

//related posts by category
function get_related_posts_by_category()
{
    $categories = wp_get_post_categories(get_post_field('ID'));
    // var_dump($categories);
    $args = new WP_Query(
        array(
            'category__in' => $categories,
            'post__not_in' => array(get_post_field('ID')),
            'posts_per_page' => 4,
            'orderby' => 'date',
            'order' => 'DESC',
        )
    );

    if ($args->have_posts()) {
        while ($args->have_posts()) {
            $args->the_post();
            echo '<div class="col-lg-6 col-md-6">';
            get_template_part('template-parts/horizontal-posts-html');
            echo '</div>';
        }
    } else {
        echo esc_html__('No related posts found', 'Echo News');
    }
    return;
}
