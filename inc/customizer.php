<?php

require_once get_template_directory() . '/inc/post-callback-functions.php';

if (class_exists('Kirki')) {

    // Config
    Kirki::add_config('EchoNews_Theme_Options_Config', [
        'capability' => 'edit_theme_options',
        'option_type' => 'theme_mod',
    ]);

    //main panel
    Kirki::add_panel('EchoNews_Theme_Options_Panel', [
        'title' => esc_html__('Theme Options', 'textdomain'),
        'description' => esc_html__('Manage your Theme options from here.', 'textdomain'),
        'priority' => 10,
    ]);

    //header options
    Kirki::add_section('header_options', [
        'title' => esc_html__('Header Options', 'textdomain'),
        'description' => esc_html__('You can change the header options', 'textdomain'),
        'panel' => 'EchoNews_Theme_Options_Panel',
    ]);

    // header background color field
    // Kirki::add_field('EchoNews_Theme_Options_Config', [
    //     'type' => 'color',
    //     'settings' => 'header_color',
    //     'label' => esc_html__('Header Color', 'textdomain'),
    //     'section' => 'header_options',
    //     'default' => '#ffffff',
    //     'transport' => 'auto',
    //     'output' => [
    //         [
    //             'element' => '.echo-header-top',
    //             'property' => 'background-color',
    //         ],
    //     ]
    // ]);

    //vertical header slider
    kirki::add_field('vertical_header_post_slider', [
        'label' => esc_html__('Choose Category', 'textdomain'),
        'description' => esc_html__('Select the category for vertical header post slider', 'textdomain'),
        'section' => 'header_options',
        'transport' => 'auto',
        // 'default'=>'',
        'type' => 'select',
        'multiple'    => true,
        'settings' => 'vertical_header_post_slider',
        'choices' =>  EchoNews_get_all_category(),
    ]);
} else {
    function EchoNews_notice_kirki_missing()
    {
        echo '<div class="error"><p>';
        echo esc_html__('Please install and activate the Kirki plugin to change theme options.', 'textdomain');
        echo '</p></div>';
    }
    add_action('admin_notices', 'EchoNews_notice_kirki_missing');
}
