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


//add TGM
function register_TGM()
{
    require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';
    require_once get_template_directory() . '/inc/plugins.php';
}
add_action('after_setup_theme', 'register_TGM'); //note load the correct style in dashboard at least fix it up

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
    wp_enqueue_script('audio-EchoNews', get_template_directory_uri() . '/assets/js/plugins/audio.js', array('jquery'), $version, true);
    wp_enqueue_script('bootstrap-EchoNews', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', array('jquery'), '5.0.2', true);
    wp_enqueue_script('swiper-EchoNews', get_template_directory_uri() . '/assets/js/vendor/swiper.js', array('jquery'), '9.3.2', true);
    wp_enqueue_script('metismenu-EchoNews', get_template_directory_uri() . '/assets/js/vendor/metisMenu.min.js', array('jquery'), $version, true);
    wp_enqueue_script('magnificpopup-EchoNews', get_template_directory_uri() . '/assets/js/plugins/magnific-popup.js', array('jquery'), $version, true);
    wp_enqueue_script('contactform-EchoNews', get_template_directory_uri() . '/assets/js/plugins/contact-form.js', array('jquery'), $version, true);
    wp_enqueue_script('resize-sensor-EchoNews', get_template_directory_uri() . '/assets/js/plugins/resize-sensor.min.js', array('jquery'), $version, true);
    wp_enqueue_script('theia-sticky-sidebar-EchoNews', get_template_directory_uri() . '/assets/js/plugins/theia-sticky-sidebar.min.js', array('jquery'), $version, true);
    wp_enqueue_script('mainjs-EchoNews', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $version, true);
    // wp_enqueue_script('anywhere-home-EchoNews', get_template_directory_uri() . '/assets/js/anywhere-home.js', array('jquery'), $version, true);

    // Localize script to pass data from PHP to JavaScript
    // wp_localize_script('mainjs-EchoNews', 'echoNewsData', array(
    //     'ajaxUrl' => admin_url('admin-ajax.php'),
    //     'nonce' => wp_create_nonce('echo_news_nonce'),
    // ));
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
