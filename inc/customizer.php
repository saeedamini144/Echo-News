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
        'title' => esc_html__('Theme Options', 'Echo News'),
        'description' => esc_html__('Manage your Theme options from here.', 'Echo News'),
        'priority' => 10,
    ]);

    //header options
    Kirki::add_section('header_options', [
        'title' => esc_html__('Header Options', 'Echo News'),
        'description' => esc_html__('You can change the header options', 'Echo News'),
        'panel' => 'EchoNews_Theme_Options_Panel',
    ]);

    //vertical header slider
    kirki::add_field('vertical_header_post_slider', [
        'label' => esc_html__('Choose Category', 'Echo News'),
        'description' => esc_html__('Select the category for vertical header post slider', 'Echo News'),
        'section' => 'header_options',
        'transport' => 'auto',
        // 'default'=>'',
        'type' => 'select',
        'multiple'    => true,
        'settings' => 'vertical_header_post_slider_settings',
        'choices' =>  EchoNews_get_all_category(),
    ]);
    //contact header button name
    kirki::add_field('Header_Contact_button', [
        'label' => esc_html__('Name of the Header button', 'Echo News'),
        'description' => esc_html__('You can write the button name', 'Echo News'),
        'section' => 'header_options',
        'settings' => 'header_contact_button_settings',
        'transport' => 'auto',
        'type' => 'text',
        'default' => 'Contact',
    ]);
    //header button icon
    kirki::add_field('header_button_icon', [
        'label' => esc_html__('Choose the button icon', 'Echo News'),
        'description' => esc_html__('write the name of the fontawesome icon', 'Echo News'),
        'section' => 'header_options',
        'transport' => 'auto',
        'settings' => 'header_button_icon_settings',
        'type' => 'text',
        'default' => 'fa-phone',
    ]);
    // header button link
    kirki::add_field('header_button_link', [
        'label' => esc_html__('Header button link', 'Echo News'),
        'description' => esc_html__('write the link of the button', 'Echo News'),
        'section' => 'header_options',
        'transport' => 'auto',
        'settings' => 'header_button_link_settings',
        'type' => 'url',
        'default' => '#',
    ]);
} else {
    function EchoNews_notice_kirki_missing()
    {
        echo '<div class="error"><p>';
        echo esc_html__('Please install and activate the Kirki plugin to change theme options.', 'Echo News');
        echo '</p></div>';
    }
    add_action('admin_notices', 'EchoNews_notice_kirki_missing');
}
