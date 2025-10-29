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
        kirki::add_field('EchoNews_Theme_Options_Config', [
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
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Name of the Header button', 'Echo News'),
            'description' => esc_html__('You can write the button name', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'header_contact_button_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'Contact',
        ]);

        //header button icon
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose the button icon', 'Echo News'),
            'description' => esc_html__('write the name of the font awesome icon', 'Echo News'),
            'section' => 'header_options',
            'transport' => 'auto',
            'settings' => 'header_button_icon_settings',
            'type' => 'text',
            'default' => 'fa-phone',
        ]);

        // header button link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Header button link', 'Echo News'),
            'description' => esc_html__('write the link of the button', 'Echo News'),
            'section' => 'header_options',
            'transport' => 'auto',
            'settings' => 'header_button_link_settings',
            'type' => 'url',
            'default' => '#',
        ]);

        //light mode header logo
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Light Mode Header Logo', 'Echo News'),
            'description' => esc_html__('Upload the logo for light mode header. Recommended size is 160x40px', 'Echo News'),
            'section' => 'header_options',
            'settings' => 'light_mode_logo_settings',
            'transport' => 'auto',
            'type' => 'image',
            // 'default'=> get_template_directory_uri().'/assets/images/logo.png',
        ]);
        //light mode header logo Dimensions
        kirki::add_field('EchoNews_Theme_Options_Config', [
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
                'labels' => [
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
                    'choice' => 'height',
                ],
            ],
        ]);

        //dark mode header logo
        kirki::add_field('EchoNews_Theme_Options_Config', [
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
        kirki::add_field('EchoNews_Theme_Options_Config', [
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

        //main page section
        kirki::add_section('main_page_options', [
            'title' => esc_html__('Main Page Options', 'Echo News'),
            'descriptions' => esc_html__('You can change the main page options', 'Echo News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
        ]);

        // =======================First Section=======================
        //main page first sections options
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the last posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'Big_post_main_page_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //change heading tag of the main page first section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page second section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page first section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page first section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_first_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page first section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page first section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //choose categories main page first sections options side part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the last posts in the side part', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'category_first_section_side_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        // =======================Second Section=======================
        //change heading tag of the main page second section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page second section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_second_section_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page second section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page second section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_second_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page second section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page first section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'second_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.second-title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //choose categories main page second sections
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the slider posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'slider_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        // ======================= Third Section =======================
        //change heading tag of the main page third section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page third section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_third_section_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page third section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page third section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_third_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page third section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page third section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'third_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.third-title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose categories main page Third sections
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the third section posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'third_section_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        // ======================= Fourth Section =======================
        //change heading tag of the main page Fourth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page fourth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_fourth_section_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page fourth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page fourth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_fourth_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page fourth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page fourth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fourth_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.fourth-title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //choose categories main page Fourth sections
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the fourth section posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fourth_section_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        //background color of the fourth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fourth sectionBackground Color', 'Echo News'),
            'description' => esc_html__('You can change the background color of the fourth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fourth_section_background_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '#537FE7',
            'choices'     => [
                'alpha'        => true,   // ✅ امکان انتخاب شفافیت (اختیاری)
                'allow_reset'  => true,   // ✅ دکمه "بازگرداندن به رنگ پیش‌فرض"
            ],
            'output' => [
                [
                    'element' => '.home-one .echo-video-area',
                    'property' => 'background-color',
                ]
            ]

        ]);

        // ======================= Fifth Section =======================
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page fifth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_fifth_section_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page fifth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page fifth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_fifth_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page fifth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page fifth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        // button content of the fifth section title
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Button Content', 'Echo News'),
            'description' => esc_html__('You can write the button content of the fifth section title', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'Load More',

        ]);
        // button content of the fifth section link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Button Link', 'Echo News'),
            'description' => esc_html__('You can write the button link of the fifth section title', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //choose categories main page Fifth sections col one
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the fifth section posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_posts_settings_one',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);
        //write the title of the main page fifth section col one
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page fifth section col one', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_fifth_section_col1_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page fifth section col one
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page fifth section col one', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_fifth_section_col1_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page fifth section col one
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page fifth section col one', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_tag_heading_typography_col1_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col1',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //fifth section button col one content
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col One Button Content', 'Echo News'),
            'description' => esc_html__('You can write the button content of the fifth section col one', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_one_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'Load More',

        ]);
        //fifth section button col one link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col One Button Link', 'Echo News'),
            'description' => esc_html__('You can write the button link of the fifth section col one', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_one_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //choose categories main page Fifth sections col two
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the fifth section posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_posts_settings_two',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);

        //choose categories main page Fifth sections col two
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the fifth section posts col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_posts_settings_two',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);
        //write the title of the main page fifth section col two
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page fifth section col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_fifth_section_col2_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page fifth section col two
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page fifth section col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_fifth_section_col2_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page fifth section col two
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page fifth section col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_tag_heading_typography_col2_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col2',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //fifth section button col two content
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col two Button Content', 'Echo News'),
            'description' => esc_html__('You can write the button content of the fifth section col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_two_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'Load More',

        ]);
        //fifth section button col two link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col two Button Link', 'Echo News'),
            'description' => esc_html__('You can write the button link of the fifth section col two', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_two_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //choose categories main page Fifth sections col three
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the fifth section posts col three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_posts_settings_three',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);
        //write the title of the main page fifth section col three
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page fifth section col three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_fifth_section_col3_settings',
            'type' => 'select',
            'default' => 'h2',
            'choices' => [
                'p' => 'p',
                'h1' => 'h1',
                'h2' => 'h2',
                'h3' => 'h3',
                'h4' => 'h4',
                'h5' => 'h5',
                'h6' => 'h6',
            ],
        ]);

        //write the title of the main page fifth section col three
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page fifth section col three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_fifth_section_col3_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page fifth section col three
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page fifth section col three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_tag_heading_typography_col3_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => 'Roboto',
                'variant'        => '700',
                'font-size'      => '20px',
                'line-height'    => '1.5',
                'letter-spacing' => '0',
                'text-transform' => 'none',
                'color'          => '#333333',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], // لود کردن فونت‌های گوگل (پیش‌فرض)
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col3',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //fifth section button col Three content
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col Three Button Content', 'Echo News'),
            'description' => esc_html__('You can write the button content of the fifth section col Three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_Three_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'Load More',

        ]);
        //fifth section button col Three link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Fifth Section Col Three Button Link', 'Echo News'),
            'description' => esc_html__('You can write the button link of the fifth section col Three', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'fifth_section_col_Three_button_link_settings',
            'transport' => 'auto',
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
    ?>