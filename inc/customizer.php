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

        //footer options
        kirki::add_section('footer_options', [
            'title' => esc_html__('Footer Options', 'Echo News'),
            'description' => esc_html__('You can change the footer options', 'Echo News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
        ]);

        //blog sidebar options
        kirki::add_section('blog_sidebar_option', [
            'title' => esc_html__('Blog Sidebar Options', 'Echo News'),
            'description' => esc_html__('You can change the blog sidebar options', 'Echo News'),
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
                    'suffix'   => ' !important', // ✅ اضافه کردن important
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
        // ======================= Sixth Section =======================
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page sixth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_sixth_section_settings',
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

        //write the title of the main page sixth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page sixth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_sixth_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page sixth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page sixth section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_tag_heading_typography_settings',
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
                    'element' => '.sixth-title-tag-style',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);

        //choose the category of the main page sixth section
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the sixth section main posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_section_main_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        //sixth section sidebar column 1 title 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page sixth section col1', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_sixth_section_col1_settings',
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

        //write the title of the main page sixth section col1
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page sixth section col1', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_sixth_col1_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page sixth section col1
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_tag_heading_col1_typography_settings',
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
                    'element' => '.sixth-title-tag-style-col1',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //sixth section sidebar column 2 title 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_sixth_section_col2_settings',
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

        //write the title of the main page sixth section col2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_sixth_col2_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page sixth section col2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_tag_heading_col2_typography_settings',
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
                    'element' => '.sixth-title-tag-style-col2',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the main page sixth section sidebar column 2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the sixth section main posts in col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_section_main_posts_col2_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        //sixth section sidebar column 3 title 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page sixth section col3', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_sixth_section_col3_settings',
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
        //sixth section sidebar column 2 title 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_sixth_section_col2_settings',
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

        //write the title of the main page sixth section col2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_sixth_col2_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page sixth section col2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_tag_heading_col2_typography_settings',
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
                    'element' => '.sixth-title-tag-style-col2',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the main page sixth section sidebar column 2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the sixth section main posts in col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_section_main_posts_col2_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //write the title of the main page sixth section col3
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page sixth section col3', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_sixth_col3_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page sixth section col3
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page sixth section col2', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_tag_heading_col3_typography_settings',
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
                    'element' => '.sixth-title-tag-style-col3',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the main page sixth section sidebar column 3
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the sixth section main posts in col3', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'sixth_section_main_posts_col3_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        //seventh section title 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the main page seventh section ', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'tag_heading_main_page_seventh_section_settings',
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

        //write the title of the main page seventh section 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the main page seventh section', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'title_main_page_seventh_section_settings',
            'type' => 'text',
            'default' => 'Title',
        ]);

        //change the heading tag of the main page seventh section 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the main page seventh section ', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'seventh_tag_heading_typography_settings',
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
                    'element' => '.seventh-title-tag-style',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the main page seventh section 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the seventh section main posts', 'Echo News'),
            'section' => 'main_page_options',
            'settings' => 'seventh_section_main_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //footer option settings
        //first footer column
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the footer first col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'tag_heading_footer_first_col_settings',
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

        //write the title of the footer first col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the footer first col', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_first_col_settings',
            'type' => 'text',
            'default' => 'Footer Title',
        ]);

        //change the heading tag of the footer first col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the footer first col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_first_col_tag_heading_typography_settings',
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
                    'element' => '.footer-first-col',
                    'suffix'   => '!important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //repeatable content of the footer col1
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Footer First Column Repeatable Content', 'Echo News'),
            'description' => esc_html__('You can add repeatable content in the footer first column', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_first_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('Add New Content', 'Echo News'),
            'fields' => [
                'footer_first_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('Font Awesome Icon Class', 'Echo News'),
                    'description' => esc_html__('You can enter font awesome icon version 5 class. Example: fas fa-check-circle', 'Echo News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_first_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('Content Text', 'Echo News'),
                    'default' => 'This is a footer first column content.',
                ],
                'footer_first_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('Content Link', 'Echo News'),
                    'default' => '#',
                ],
            ],
            'default' => [
                [
                    'footer_first_col_icon' => 'fas fa-check-circle',
                    'footer_first_col_text' => 'This is a footer first column content.',
                    'footer_first_col_link' => '#',
                ],
            ],
            'choices' => [
                'limit' => 10,
            ],
        ]);

        //second footer column
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the footer second col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'tag_heading_footer_second_col_settings',
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

        //write the title of the footer second col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the footer second col', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_second_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 2',
        ]);

        //change the heading tag of the footer second col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the footer second col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_second_col_tag_heading_typography_settings',
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
                    'element' => '.footer-second-col',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //repeatable content of the footer col2
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Footer second Column Repeatable Content', 'Echo News'),
            'description' => esc_html__('You can add repeatable content in the footer second column', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_second_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('Add New Content', 'Echo News'),
            'fields' => [
                'footer_second_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('Font Awesome Icon Class', 'Echo News'),
                    'description' => esc_html__('You can enter font awesome icon version 5 class. Example: fas fa-check-circle', 'Echo News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_second_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('Content Text', 'Echo News'),
                    'default' => 'This is a footer second column content.',
                ],
                'footer_second_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('Content Link', 'Echo News'),
                    'default' => '#',
                ],
            ],
            'default' => [
                [
                    'footer_second_col_icon' => 'fas fa-check-circle',
                    'footer_second_col_text' => 'This is content',
                    'footer_second_col_link' => '#',
                ],
            ],
            'choices' => [
                'limit' => 10,
            ],
        ]);

        //third footer column
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the footer third col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'tag_heading_footer_third_col_settings',
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

        //write the title of the footer third col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the footer third col', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_third_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 3',
        ]);

        //change the heading tag of the footer third col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the footer third col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_third_col_tag_heading_typography_settings',
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
                    'element' => '.footer-third-col',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //repeatable content of the footer col3
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Footer third Column Repeatable Content', 'Echo News'),
            'description' => esc_html__('You can add repeatable content in the footer third column', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_third_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('Add New Content', 'Echo News'),
            'fields' => [
                'footer_third_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('Font Awesome Icon Class', 'Echo News'),
                    'description' => esc_html__('You can enter font awesome icon version 5 class. Example: fas fa-check-circle', 'Echo News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_third_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('Content Text', 'Echo News'),
                    'default' => 'footer third column',
                ],
                'footer_third_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('Content Link', 'Echo News'),
                    'default' => '#',
                ],
            ],
            'default' => [
                [
                    'footer_third_col_icon' => 'fas fa-check-circle',
                    'footer_third_col_text' => 'This is content',
                    'footer_third_col_link' => '#',
                ],
            ],
            'choices' => [
                'limit' => 10,
            ],
        ]);

        //fourth footer column
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the footer fourth col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'tag_heading_footer_fourth_col_settings',
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

        //write the title of the footer fourth col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of the footer fourth col', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_fourth_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 4',
        ]);

        //change the heading tag of the footer fourth col 
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the footer fourth col ', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_fourth_col_tag_heading_typography_settings',
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
                    'element' => '.footer-fourth-col',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //textarea footer fourth col
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('write the text', 'Echo News'),
            'description' => esc_html__('You can write the text of the footer fourth col', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'textarea_footer_fourth_col_settings',
            'type' => 'editor',
            'default' => 'This is footer fourth column text.',
        ]);

        //footer copyright
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Footer Copyright Text', 'Echo News'),
            'description' => esc_html__('You can change the footer copyright text', 'Echo News'),
            'section' => 'footer_options',
            'settings' => 'footer_copyright_text_settings',
            'type' => 'editor',
            'default' => '© Copyright 2025 by Websemicolon',
            'output' => [
                'element' => '.copyright',

            ],
        ]);

        //blog sidebar 
        //blogsidebar first part title
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the blog sidebar first part ', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'tag_heading_blogsidebar1_settings',
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

        //write the title of the blog sidebar first part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of theblog sidebar first part', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'title_blogsidebar1_settings',
            'type' => 'text',
            'default' => 'Blog sidebar part 1',
        ]);

        //change the heading tag of the blog sidebar first part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the blog sidebar first part ', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blogsidebar1_tag_heading_typography_settings',
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
                    'element' => '.blog_sidebar_first_part',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the blog sidebar first part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the blog sidebar first part', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_first_cats_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);
        //blogsidebar second part title
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose Tag Heading', 'Echo News'),
            'description' => esc_html__('can change the heading tag in the blog sidebar second part ', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'tag_heading_blogsidebar2_settings',
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

        //write the title of the blog sidebar second part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Write the title', 'Echo News'),
            'description' => esc_html__('You can write the title of theblog sidebar second part', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'title_blogsidebar2_settings',
            'type' => 'text',
            'default' => 'Blog sidebar part 2',
        ]);

        //change the heading tag of the blog sidebar second part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Tag Heading Typography', 'Echo News'),
            'description' => esc_html__('You can change the typography of the heading tag of the blog sidebar second part ', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blogsidebar2_tag_heading_typography_settings',
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
                    'element' => '.blog_sidebar_second_part',
                    'suffix'   => ' !important', // ✅ اضافه کردن important
                ],
            ],
        ]);
        //choose the category of the blog sidebar second part
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Choose categories', 'Echo News'),
            'description' => esc_html__('Choose category to show the blog sidebar second part', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_second_cats_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //add avertisment banner in the blog sidebar
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Blog Sidebar Advertisment Banner', 'Echo News'),
            'description' => esc_html__('You can add an advertisement banner in the blog sidebar', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_settings',
            'type' => 'image',
            'default' => ' ',
        ]);
        //add linke for advertisement banner
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Blog Sidebar Advertisement Banner Link', 'Echo News'),
            'description' => esc_html__('You can add link for advertisement banner in the blog sidebar', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_link_settings',
            'type' => 'url',
            'default' => '#',
        ]);
        //add the field for the alt title of the advertisement banner
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Blog Sidebar Advertisement Banner Alt Title', 'Echo News'),
            'description' => esc_html__('You can add alt title for advertisement banner in the blog sidebar', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_alt_title_settings',
            'type' => 'text',
            'default' => 'advertisement Banner',
        ]);
        //add the no follow attribute to the advertisement banner link
        kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Blog Sidebar Advertisement Banner Link Nofollow', 'Echo News'),
            'description' => esc_html__('if is on you have follow add banner', 'Echo News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_nofollow_settings',
            'type' => 'toggle',
            'default' => false,
        ]);

        //add the Dimensions for the blog banner adds
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label'       => esc_html__('Blog Sidebar Advertisement Banner Dimensions', 'Echo News'),
            'description' => esc_html__('You can set the dimensions of the advertisement banner in the blog sidebar', 'Echo News'),
            'section'     => 'blog_sidebar_option',
            'settings'    => 'blog_sidebar_advertisement_banner_dimensions_settings',
            'type'        => 'dimensions',
            'default'     => [
                'width'  => '300px',
                'height' => '250px',
            ],
            'transport' => 'auto',
            'choices' => [
                'labels' => [
                    'width'  => esc_html__('Width', 'Echo News'),
                    'height' => esc_html__('Height', 'Echo News'),
                ],
                'units' => ['px', '%', 'em'],
            ],
            'output' => [
                [
                    'element'  => '.blog-sidebar-advertisement-banner img',
                    'property' => 'width',
                    'choice'   => 'width',
                ],
                [
                    'element'  => '.blog-sidebar-advertisement-banner img',
                    'property' => 'height',
                    'choice'   => 'height',
                ],
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
    ?>