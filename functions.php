<?php
if ( ! function_exists( 'echonews_setup' ) ) :

function echonews_setup() {

    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    /* Pinegrow generated Load Text Domain Begin */
    load_theme_textdomain( 'echonews', get_template_directory() . '/languages' );
    /* Pinegrow generated Load Text Domain End */

    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    /*
     * Let WordPress manage the document title.
     */
    add_theme_support( 'title-tag' );
    
    /*
     * Enable support for Post Thumbnails on posts and pages.
     */
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 825, 510, true );

    // Add menus.
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'echonews' ),
        'social'  => __( 'Social Links Menu', 'echonews' ),
    ) );

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support( 'html5', array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ) );

    /*
     * Enable support for Post Formats.
     */
    add_theme_support( 'post-formats', array(
        'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
    ) );
}
endif; // echonews_setup

add_action( 'after_setup_theme', 'echonews_setup' );


if ( ! function_exists( 'echonews_init' ) ) :

function echonews_init() {

    
    // Use categories and tags with attachments
    register_taxonomy_for_object_type( 'category', 'attachment' );
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );

    /*
     * Register custom post types. You can also move this code to a plugin.
     */
    /* Pinegrow generated Custom Post Types Begin */

    /* Pinegrow generated Custom Post Types End */
    
    /*
     * Register custom taxonomies. You can also move this code to a plugin.
     */
    /* Pinegrow generated Taxonomies Begin */

    /* Pinegrow generated Taxonomies End */

}
endif; // echonews_setup

add_action( 'init', 'echonews_init' );


if ( ! function_exists( 'echonews_widgets_init' ) ) :

function echonews_widgets_init() {

    /*
     * Register widget areas.
     */
    /* Pinegrow generated Register Sidebars Begin */

    /* Pinegrow generated Register Sidebars End */
}
add_action( 'widgets_init', 'echonews_widgets_init' );
endif;// echonews_widgets_init



if ( ! function_exists( 'echonews_customize_register' ) ) :

function echonews_customize_register( $wp_customize ) {
    // Do stuff with $wp_customize, the WP_Customize_Manager object.

    /* Pinegrow generated Customizer Controls Begin */

    /* Pinegrow generated Customizer Controls End */

}
add_action( 'customize_register', 'echonews_customize_register' );
endif;// echonews_customize_register


if ( ! function_exists( 'echonews_enqueue_scripts' ) ) :
    function echonews_enqueue_scripts() {

        /* Pinegrow generated Enqueue Scripts Begin */

    wp_deregister_script( 'jquery' );
    wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/vendor/jquery.min.js', false, null, true);

    wp_deregister_script( 'audio' );
    wp_enqueue_script( 'audio', get_template_directory_uri() . '/assets/js/plugins/audio.js', false, null, true);

    wp_deregister_script( 'bootstrap' );
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/vendor/bootstrap.min.js', false, null, true);

    wp_deregister_script( 'swiper' );
    wp_enqueue_script( 'swiper', get_template_directory_uri() . '/assets/js/vendor/swiper.js', false, null, true);

    wp_deregister_script( 'metismenu' );
    wp_enqueue_script( 'metismenu', get_template_directory_uri() . '/assets/js/vendor/metisMenu.min.js', false, null, true);

    wp_deregister_script( 'magnificpopup' );
    wp_enqueue_script( 'magnificpopup', get_template_directory_uri() . '/assets/js/plugins/magnific-popup.js', false, null, true);

    wp_deregister_script( 'contactform' );
    wp_enqueue_script( 'contactform', get_template_directory_uri() . '/assets/js/plugins/contact-form.js', false, null, true);

    wp_deregister_script( 'resizesensor' );
    wp_enqueue_script( 'resizesensor', get_template_directory_uri() . '/assets/js/plugins/resize-sensor.min.js', false, null, true);

    wp_deregister_script( 'theiastickysidebar' );
    wp_enqueue_script( 'theiastickysidebar', get_template_directory_uri() . '/assets/js/plugins/theia-sticky-sidebar.min.js', false, null, true);

    wp_deregister_script( 'main' );
    wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', false, null, true);

    /* Pinegrow generated Enqueue Scripts End */

        /* Pinegrow generated Enqueue Styles Begin */

    /* Pinegrow generated Enqueue Styles End */

    }
    add_action( 'wp_enqueue_scripts', 'echonews_enqueue_scripts' );
endif;

function pgwp_sanitize_placeholder($input) { return $input; }
/*
 * Resource files included by Pinegrow.
 */
/* Pinegrow generated Include Resources Begin */

    /* Pinegrow generated Include Resources End */
?>