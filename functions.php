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
    require_once get_template_directory() . '/inc/prompt-metabox.php';
    require_once get_template_directory() . '/inc/prompt-frontend.php';
    require_once get_template_directory() . '/inc/prompt-importer.php';
    require_once get_template_directory() . '/inc/comment-ajax.php';
    require_once get_template_directory() . '/inc/class-breadcrumb.php';
    require_once get_template_directory() . '/inc/pagination.php';
    require_once get_template_directory() . '/inc/jdatetime.class.php';
}
add_action('after_setup_theme', 'register_incFile'); //note load the correct style in dashboard at least fix it up

//jalali date support
function display_jalali_date($format, $timestamp = null)
{
    if (is_null($timestamp)) {
        $timestamp = current_time('timestamp');
    }
    return jDateTime::date($format, $timestamp);
}

function echo_news_post_date($format = 'Y/m/d', $post_id = 0)
{
    $timestamp = get_post_timestamp($post_id);

    if (!$timestamp) {
        return '';
    }

    return display_jalali_date($format, $timestamp);
}

function show_date()
{
    echo esc_html(echo_news_post_date());
}

//jalali date support end

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
    add_theme_support('editor-styles'); // پشتیبانی از استایل‌های گوتنبرگ
    add_theme_support('wp-block-styles'); // پشتیبانی از استایل پیش‌فرض بلوک‌ها
    add_theme_support('responsive-embeds'); // پشتیبانی از جاسازی‌های ریسپانسیو
}
add_action('after_setup_theme', 'theme_support_EchoNews');

//register menu
function eco_register_nav_menu()
{
    register_nav_menus(array(
        'Desktop_Menu' => __('Primary Menu', 'Echo-News'),
        'mobile_Menu'  => __('Mobile Menu', 'Echo-News'),
        'footer_Menu' => __('Footer Menu', 'Echo-News'),
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
    if (is_singular('post')) { // نه روی ai_prompt: آنجا TOC وجود ندارد
        wp_enqueue_script('single-post-EchoNews', get_template_directory_uri() . '/assets/js/post-scripts.js', array('jquery'), $version, true);
    }

    // ثبت نظر با AJAX و اعلان فارسی (موفقیت / خطا)
    if (is_singular(array('post', 'ai_prompt')) && comments_open()) {
        wp_enqueue_script('comment-notice-EchoNews', get_template_directory_uri() . '/assets/js/comment-notice.js', array(), $version, true);
        wp_localize_script('comment-notice-EchoNews', 'echoNewsComment', array('ajaxUrl' => admin_url('admin-ajax.php')));
    }

    // سایدبار چسبان (بدون اسکرول داخلی) در سینگل پست و سینگل پرامپت
    if (is_singular(array('post', 'ai_prompt'))) {
        wp_enqueue_script('sticky-sidebar-EchoNews', get_template_directory_uri() . '/assets/js/sticky-sidebar.js', array(), $version, true);
    }
}
add_action('wp_enqueue_scripts', 'register_scripts_EchoNews');

//add custom post type: گالری پرامپت (ai_prompt) + taxonomies (prompt_category, prompt_model)
function add_custom_post_type_prompts()
{
    $labels = array(
        'name'                  => _x('گالری پرامپت', 'Post type general name', 'Echo-News'),
        'singular_name'         => _x('پرامپت', 'Post type singular name', 'Echo-News'),
        'menu_name'             => _x('گالری پرامپت', 'Admin Menu text', 'Echo-News'),
        'name_admin_bar'        => _x('پرامپت', 'Add New on Toolbar', 'Echo-News'),
        'add_new'               => __('افزودن پرامپت', 'Echo-News'),
        'add_new_item'          => __('افزودن پرامپت جدید', 'Echo-News'),
        'new_item'              => __('پرامپت جدید', 'Echo-News'),
        'edit_item'             => __('ویرایش پرامپت', 'Echo-News'),
        'view_item'             => __('مشاهده پرامپت', 'Echo-News'),
        'view_items'            => __('مشاهده پرامپت‌ها', 'Echo-News'),
        'all_items'             => __('همه پرامپت‌ها', 'Echo-News'),
        'search_items'          => __('جست‌وجوی پرامپت', 'Echo-News'),
        'not_found'             => __('پرامپتی یافت نشد.', 'Echo-News'),
        'not_found_in_trash'    => __('پرامپتی در زباله‌دان یافت نشد.', 'Echo-News'),
        'featured_image'        => _x('تصویر پرامپت', 'Overrides the "Featured Image" phrase for this post type.', 'Echo-News'),
        'set_featured_image'    => _x('انتخاب تصویر پرامپت', 'Overrides the "Set featured image" phrase for this post type.', 'Echo-News'),
        'remove_featured_image' => _x('حذف تصویر پرامپت', 'Overrides the "Remove featured image" phrase for this post type.', 'Echo-News'),
        'use_featured_image'    => _x('استفاده به عنوان تصویر پرامپت', 'Overrides the "Use as featured image" phrase for this post type.', 'Echo-News'),
        'archives'              => _x('آرشیو گالری پرامپت', 'The post type archive label used in nav menus.', 'Echo-News'),
        'insert_into_item'      => _x('درج در پرامپت', 'Overrides the "Insert into post" phrase.', 'Echo-News'),
        'uploaded_to_this_item' => _x('آپلود شده در این پرامپت', 'Overrides the "Uploaded to this post" phrase.', 'Echo-News'),
        'filter_items_list'     => _x('فیلتر فهرست پرامپت‌ها', 'Screen reader text for the filter links heading.', 'Echo-News'),
        'items_list_navigation' => _x('ناوبری فهرست پرامپت‌ها', 'Screen reader text for the pagination heading.', 'Echo-News'),
        'items_list'            => _x('فهرست پرامپت‌ها', 'Screen reader text for the items list heading.', 'Echo-News'),
    );
    $args = array(
        'labels'             => $labels,
        'description'        => 'پرامپت‌های آماده تولید تصویر با هوش مصنوعی، همراه با تصویر نمونه.',
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'prompts', 'with_front' => false), // /prompts/post-slug/
        'capability_type'    => 'post',
        'has_archive'        => true, // /prompts/
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-format-image',
        'supports'           => array('title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments'),
        'taxonomies'         => array('prompt_category', 'prompt_model'), // نه category و post_tag پیش‌فرض (جلوگیری از صفحات کم‌محتوا)
    );
    // نکته: taxonomyها باید «قبل» از پست تایپ ثبت شوند؛ وگرنه قانون ضمیمه‌ی پست تایپ
    // (prompts/x/y) آدرس‌های prompts/category/... و prompts/model/... را می‌بلعد (۴۰۴).
    // موضوع تصویر (سلسله‌مراتبی): پرتره، لوگو، معماری ...  => /prompts/category/portrait/
    register_taxonomy('prompt_category', 'ai_prompt', array(
        'labels' => array(
            'name'          => _x('دسته‌بندی پرامپت', 'taxonomy general name', 'Echo-News'),
            'singular_name' => _x('دسته‌بندی پرامپت', 'taxonomy singular name', 'Echo-News'),
            'menu_name'     => __('دسته‌بندی‌ها', 'Echo-News'),
            'all_items'     => __('همه دسته‌بندی‌ها', 'Echo-News'),
            'edit_item'     => __('ویرایش دسته‌بندی', 'Echo-News'),
            'view_item'     => __('مشاهده دسته‌بندی', 'Echo-News'),
            'update_item'   => __('به‌روزرسانی دسته‌بندی', 'Echo-News'),
            'add_new_item'  => __('افزودن دسته‌بندی جدید', 'Echo-News'),
            'new_item_name' => __('نام دسته‌بندی جدید', 'Echo-News'),
            'parent_item'   => __('دسته‌بندی والد', 'Echo-News'),
            'search_items'  => __('جست‌وجوی دسته‌بندی', 'Echo-News'),
            'not_found'     => __('دسته‌بندی یافت نشد.', 'Echo-News'),
        ),
        'hierarchical'      => true,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'prompts/category', 'with_front' => false, 'hierarchical' => true),
    ));

    // ابزار/مدل: Midjourney، DALL·E، Stable Diffusion، Flux ...  => /prompts/model/midjourney/
    register_taxonomy('prompt_model', 'ai_prompt', array(
        'labels' => array(
            'name'                       => _x('مدل هوش مصنوعی', 'taxonomy general name', 'Echo-News'),
            'singular_name'              => _x('مدل هوش مصنوعی', 'taxonomy singular name', 'Echo-News'),
            'menu_name'                  => __('مدل‌ها', 'Echo-News'),
            'all_items'                  => __('همه مدل‌ها', 'Echo-News'),
            'edit_item'                  => __('ویرایش مدل', 'Echo-News'),
            'view_item'                  => __('مشاهده مدل', 'Echo-News'),
            'update_item'                => __('به‌روزرسانی مدل', 'Echo-News'),
            'add_new_item'               => __('افزودن مدل جدید', 'Echo-News'),
            'new_item_name'              => __('نام مدل جدید', 'Echo-News'),
            'search_items'               => __('جست‌وجوی مدل', 'Echo-News'),
            'popular_items'              => __('مدل‌های پرکاربرد', 'Echo-News'),
            'separate_items_with_commas' => __('مدل‌ها را با ویرگول جدا کنید', 'Echo-News'),
            'choose_from_most_used'      => __('انتخاب از پرکاربردترین مدل‌ها', 'Echo-News'),
            'not_found'                  => __('مدلی یافت نشد.', 'Echo-News'),
        ),
        'hierarchical'      => false,
        'public'            => true,
        'show_ui'           => true,
        'show_admin_column' => true,
        'show_in_rest'      => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'prompts/model', 'with_front' => false),
    ));

    register_post_type('ai_prompt', $args);
}
add_action('init', 'add_custom_post_type_prompts');

// فقط هنگام فعال‌سازی قالب، آدرس‌ها (rewrite rules) بازسازی شوند
function echo_news_prompts_flush_rewrite()
{
    add_custom_post_type_prompts();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'echo_news_prompts_flush_rewrite');

// اگر ساختار آدرس‌های پرامپت عوض شد، عدد نسخه را بالا ببرید تا یک بار خودکار بازسازی شود
function echo_news_prompts_maybe_flush_rewrite()
{
    $version = '3'; // 1: پست تایپ | 2: + taxonomyها | 3: ترتیب ثبت (taxonomy قبل از پست تایپ)
    if (get_option('echo_news_prompts_rewrite') !== $version) {
        flush_rewrite_rules(false);
        update_option('echo_news_prompts_rewrite', $version);
    }
}
add_action('init', 'echo_news_prompts_maybe_flush_rewrite', 99);
//limited post title
function Limited_title_characters($limited)
{
    $title =  get_the_title();
    if (mb_strlen($title, 'UTF-8') > $limited) {
        $title = mb_substr($title, 0, $limited, 'UTF-8') . '...'; //substr(string,start,length)
    }
    return $title;
}
//time to read the post

// تگ عنوان (p, h1..h6) از تنظیمات سفارشی‌ساز؛ همیشه معتبر برمی‌گردد تا تگ باز و بسته خراب نشود
function echo_news_heading_tag($mod, $default = 'h2')
{
    $tag = get_theme_mod($mod, $default);
    return in_array($tag, array('p', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'), true) ? $tag : $default;
}

function EchoNews_time_to_read()
{
    $content = get_post_field('post_content', get_the_id());

    // str_word_count فقط حروف لاتین را کلمه می‌شمارد و روی متن فارسی ۰ برمی‌گرداند؛
    // پس متن را تمیز می‌کنیم و با فاصله (یونیکد) می‌شکنیم. نیم‌فاصله (می‌شود) کلمه‌ی جدا حساب نمی‌شود.
    $text = html_entity_decode(wp_strip_all_tags(strip_shortcodes($content)), ENT_QUOTES, 'UTF-8');
    $words = preg_split('/\s+/u', trim($text), -1, PREG_SPLIT_NO_EMPTY);
    $word_count = $words ? count($words) : 0;
    if (empty($word_count)) {
        return esc_html__('محتوایی یافت نشد', 'Echo-News');
    }
    $reading_time = max(1, (int) ceil($word_count / 200)); //assuming average reading speed is 200 words per minute
    $total_reading_time = $reading_time . ' ' . esc_html__('دقیقه مطالعه', 'Echo-News');
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
    return $views . ' ' . esc_html__('بازدید', 'Echo-News');
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
        echo esc_html__('پست مرتبطی یافت نشد', 'Echo-News');
    }
    // بدون این خط، پست جاری (global $post) همان آخرین پست مرتبط می‌ماند و فرم و لیست نظرات به پست اشتباه وصل می‌شود
    wp_reset_postdata();
    return;
}

//google preferrd button functions

function preferred_source_script() {
    wp_enqueue_script(
        'google-preferred-source',
        'https://news.google.com/swg/js/v1/publisher.js',
        array(),
        null,
        true
    );
}
add_action('wp_enqueue_scripts', 'preferred_source_script');
