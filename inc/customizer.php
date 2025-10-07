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

        //light mode header logo
        kirki::add_field('light_mode_logo', [
            'label' => esc_html__('Light Mode Header Logo', 'Echo News'),
            'description' => esc_html__('Upload the logo for light mode header. Recommended size is 160x40px', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'light_mode_logo_settings',
            'transport' => 'auto',
            'type' => 'image',
            // 'default'=> get_template_directory_uri().'/assets/images/logo.png',
        ]);
        //light mode header logo Dimensions
        kirki::add_field('light_header_logo_dimensions', [
            'label' => esc_html__('Light Mode Header Logo Dimensions', 'Echo News'),
            'description' => esc_html__('Set the dimensions of the light mode header logo', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'light_header_logo_dimensions_settings',
            'transport' => 'auto',
            'type' => 'dimensions',
            'default' => [
                'width'  => '160px',
                'height' => '40px',
            ],
            'choices' => [
                'label' => [
                    'width' => esc_html__('Width', 'Echo News'),
                    'height' => esc_html__('height', 'Echo News'),
                ],
                'units' => ['px', '%', 'em'],
            ],
            'unitless'   => false,
            'output' => [
                [
                    'element'  => '.light-mode-logo',
                    'property' => 'width',
                    'choice'   => 'width',
                ],
                [
                    'element'  => '.light-mode-logo',
                    'property' => 'height',
                    'choices' => 'height',
                ],
            ],
        ]);

        //dark mode header logo
        kirki::add_field('dark_mode_logo', [
            'label' => esc_html__('dark Mode Header Logo', 'Echo News'),
            'description' => esc_html__('Upload the logo for dark mode header. Recommended size is 160x40px', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'dark_mode_logo_settings',
            'transport' => 'auto',
            'type' => 'image',
            // 'default'=> get_template_directory_uri().'/assets/images/logo.png',
        ]);
        //dark mode header logo Dimensions
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'type'        => 'dimensions',
            'settings'    => 'dark_header_logo_dimensions_settings',
            'label'       => esc_html__('Dark Mode Header Logo Dimensions', 'Echo News'),
            'description' => esc_html__('Set the dimensions of the dark mode header logo', 'Echo News'),
            'section'     => 'header_options',
            'default'     => [
                'width'  => '160px',
                'height' => '40px',
            ],
            'transport'   => 'auto',
            'choices'     => [
                'labels' => [
                    'width'  => esc_html__('Width', 'Echo News'),
                    'height' => esc_html__('Height', 'Echo News'),
                ],
                'units' => ['px', '%', 'em'],
            ],
            'output' => [
                [
                    'element'  => '.dark-mode-logo',
                    'property' => 'width',
                    'choice'   => 'width',
                ],
                [
                    'element'  => '.dark-mode-logo',
                    'property' => 'height',
                    'choice'   => 'height',
                ],
            ],
        ]);

        //Kirki social media icons and links
        kirki::add_field('add_social_media_icon', [
            'label' => esc_html__('add the social media icons', 'Echo News'),
            'description' => esc_html__('you can add the social media icons and links', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'add_social_media_icon_settings',
            'transport' => 'auto',
            'type' => 'repeater',
            'button_label' => esc_html__('Add Social Media', 'Echo News'),
            'row_label' => [
                'type'  => 'field',
                'value' => esc_html__('Social Media Icon', 'Echo News'),
                'field' => 'social_media_icon',
            ],
            'fields' => [
                'social_media_icon' => [
                    'type'        => 'text',
                    'label'       => esc_html__('Social Media Icon', 'Echo News'),
                    'description' => esc_html__('write the name of the fontawesome icon', 'Echo News'),
                    'default'     => 'fa-facebook-f',
                ],
                'social_media_link' => [
                    'type'        => 'url',
                    'label'       => esc_html__('Social Media Link', 'Echo News'),
                    'description' => esc_html__('write the link of the social media', 'Echo News'),
                    'default'     => '#',
                ],
            ],
            'default' => [
                [
                    'social_media_icon' => 'fa-facebook-f',
                    'social_media_link' => '#',
                ],
                [
                    'social_media_icon' => 'fa-twitter',
                    'social_media_link' => '#',
                ],
            ],
            'choices' => [
                'limit' => 6,
            ],
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
