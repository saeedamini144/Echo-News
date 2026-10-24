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
            'title' => esc_html__('تنظیمات قالب', 'Echo-News'),
            'description' => esc_html__('تنظیمات قالب را از اینجا مدیریت کنید.', 'Echo-News'),
            'priority' => 10,
        ]);

        //general options
        Kirki::add_section('general_options', [
            'title' => esc_html__('تنظیمات عمومی', 'Echo-News'),
            'description' => esc_html__('رنگ اصلی و تنظیمات کلی قالب را می توانید در این بخش انجام دهید', 'Echo-News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
            'priority' => 5,
        ]);

        //primary color of the theme
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('رنگ اصلی قالب', 'Echo-News'),
            'description' => esc_html__('رنگ دکمه ها، پیوندها، کارت پرامپت و بخش های رنگی قالب (پیش فرض #537FE7)', 'Echo-News'),
            'section' => 'general_options',
            'settings' => 'primary_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '#537FE7',
            'choices'     => [
                'allow_reset'  => true,
            ],
            'output' => [
                [
                    'element' => ':root',
                    'property' => '--color-primary',
                ]
            ]
        ]);

        //header options
        Kirki::add_section('header_options', [
            'title' => esc_html__('تنظیمات سربرگ', 'Echo-News'),
            'description' => esc_html__('تنظیمات سر برگ را می توانید در این بخش انجام دهید', 'Echo-News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
            'priority' => 10,
        ]);

        //footer options
        Kirki::add_section('footer_options', [
            'title' => esc_html__('تنظیمات پابرگ', 'Echo-News'),
            'description' => esc_html__('تنظیمات پابرگ را می توانید در این بخش انجام دهید', 'Echo-News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
            'priority' => 40,
        ]);

        //blog sidebar options
        Kirki::add_section('blog_sidebar_option', [
            'title' => esc_html__('تنظیمات نوار کناری وبلاگ', 'Echo-News'),
            'description' => esc_html__('تنظیمات نوار کناری وبلاگ را می توانید در این بخش انجام دهید', 'Echo-News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
            'priority' => 30,
        ]);

        //divider: اسلایدر عمودی سربرگ
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'header_options',
            'settings' => 'echo_cz_divider_header_vertical_slider',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">اسلایدر عمودی سربرگ</span><span class="echo-cz-divider__desc">دسته‌بندی‌های اسلایدر عمودی بالای سربرگ</span></div>',
        ]);

        //vertical header slider
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی‌های اسلایدر', 'Echo-News'),
            'description' => esc_html__('مطالب دسته‌بندی‌های انتخاب‌شده در اسلایدر عمودی سربرگ نمایش داده می‌شود', 'Echo-News'),
            'section' => 'header_options',
            'transport' => 'auto',
            // 'default'=>'',
            'type' => 'select',
            'multiple'    => true,
            'settings' => 'vertical_header_post_slider_settings',
            'choices' =>  EchoNews_get_all_category(),
        ]);

        //divider: دکمهٔ سربرگ
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'header_options',
            'settings' => 'echo_cz_divider_header_button',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">دکمهٔ سربرگ</span><span class="echo-cz-divider__desc">نام، آیکن و پیوند دکمهٔ سربرگ</span></div>',
        ]);

        //contact header button name
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نام دکمه سربرگ', 'Echo-News'),
            'description' => esc_html__('تغییر نام دکمه سر برگ', 'Echo-News'),
            'section' => 'header_options',
            'settings' => 'header_contact_button_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'تماس با ما',
        ]);

        //header button icon
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('انتخاب آیکن دکمه', 'Echo-News'),
            'description' => esc_html__('نام آیکن را از کتابخانه font awesome انتخاب و وارد کنید', 'Echo-News'),
            'section' => 'header_options',
            'transport' => 'auto',
            'settings' => 'header_button_icon_settings',
            'type' => 'text',
            'default' => 'fa-phone',
        ]);

        // header button link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند دکمه سربرگ', 'Echo-News'),
            'description' => esc_html__('پیوند دکمه سربرگ را وارد کنید', 'Echo-News'),
            'section' => 'header_options',
            'transport' => 'auto',
            'settings' => 'header_button_link_settings',
            'type' => 'url',
            'default' => '#',
        ]);

        //divider: لوگو — حالت روشن
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'header_options',
            'settings' => 'echo_cz_divider_header_logo_light',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">لوگو — حالت روشن</span><span class="echo-cz-divider__desc">تصویر و ابعاد لوگو در حالت روشن</span></div>',
        ]);

        //light mode header logo
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('لوگوی سربرگ در حالت روشن', 'Echo-News'),
            'description' => esc_html__('اندازه پیشنهادی لوگو 160*40px', 'Echo-News'),
            'section' => 'header_options',
            'settings' => 'light_mode_logo_settings',
            'transport' => 'auto',
            'type' => 'image',
            // 'default'=> get_template_directory_uri().'/assets/images/logo.png',
        ]);
        //light mode header logo Dimensions
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('ابعاد لوگوی سربرگ در حالت روشن', 'Echo-News'),
            'description' => esc_html__('ابعاد لوگو در حالت روشن', 'Echo-News'),
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
                    'width' => esc_html__('عرض', 'Echo-News'),
                    'height' => esc_html__('ارتفاع', 'Echo-News'),
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

        //divider: لوگو — حالت تاریک
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'header_options',
            'settings' => 'echo_cz_divider_header_logo_dark',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">لوگو — حالت تاریک</span><span class="echo-cz-divider__desc">تصویر و ابعاد لوگو در حالت تاریک</span></div>',
        ]);

        //dark mode header logo
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('لوگو هدر در حالت تاریک', 'Echo-News'),
            'description' => esc_html__('اندازه پیشنهادی لوگو 160*40px', 'Echo-News'),
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
            'label'       => esc_html__('ابعاد لوگوی سربرگ در حالت تاریک', 'Echo-News'),
            'description' => esc_html__('ابعاد لوگوی سربرگ در حالت تاریک', 'Echo-News'),
            'section'     => 'header_options',
            'default'     => [
                'width'  => '160px',
                'height' => '40px',
            ],
            'transport'   => 'auto',
            'choices'     => [
                'labels' => [
                    'width'  => esc_html__('عرض', 'Echo-News'),
                    'height' => esc_html__('ارتفاع', 'Echo-News'),
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

        //divider: شبکه‌های اجتماعی
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'header_options',
            'settings' => 'echo_cz_divider_header_social',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">شبکه‌های اجتماعی</span><span class="echo-cz-divider__desc">آیکن و پیوند شبکه‌ها (سربرگ و بخش ششم صفحه اصلی)</span></div>',
        ]);

        //Kirki social media icons and links
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('شبکه‌های اجتماعی', 'Echo-News'),
            'description' => esc_html__('پیوندهای شبکه های اجتماعی را اضافه کنید', 'Echo-News'),
            'section' => 'header_options',
            'settings' => 'add_social_media_icon_settings',
            'transport' => 'auto',
            'type' => 'repeater',
            'button_label' => esc_html__('افزودن شبکه اجتماعی', 'Echo-News'),
            'row_label' => [
                'type'  => 'field',
                'value' => esc_html__('آیکن شبکه اجتماعی', 'Echo-News'),
                'field' => 'social_media_icon',
            ],
            'fields' => [
                'social_media_icon' => [
                    'type'        => 'text',
                    'label'       => esc_html__('آیکن شبکه اجتماعی', 'Echo-News'),
                    'description' => esc_html__('نام آیکن را از کتابخانه font awesome انتخاب و وارد کنید', 'Echo-News'),
                    'default'     => 'fa-facebook-f',
                ],
                'social_media_link' => [
                    'type'        => 'url',
                    'label'       => esc_html__('پیوند شبکه اجتماعی', 'Echo-News'),
                    'description' => esc_html__('پیوند شبکه اجتماعی را وارد کنید', 'Echo-News'),
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
        Kirki::add_section('main_page_options', [
            'title' => esc_html__('تنظیمات صفحه اصلی', 'Echo-News'),
            'description' => esc_html__('تنظیمات بخش‌های صفحه اصلی را می توانید در این بخش انجام دهید', 'Echo-News'),
            'panel' => 'EchoNews_Theme_Options_Panel',
            'priority' => 20,
        ]);

        //divider: بخش اول — پست‌های شاخص
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s1',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش اول — پست‌های شاخص</span><span class="echo-cz-divider__desc">پست بزرگ اصلی و لیست کناری</span></div>',
        ]);

        //show or hide the main page section 1
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش اول', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش اول در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_1_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        // =======================First Section=======================
        //main page first sections options
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی پست بزرگ', 'Echo-News'),
            'description' => esc_html__('آخرین مطلب دسته‌بندی(های) انتخاب‌شده به‌صورت پست بزرگ نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'Big_post_main_page_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //change heading tag of the main page first section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_first_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page first section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //choose categories main page first sections options side part
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی لیست کناری', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده در لیست کناری نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'category_first_section_side_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (لیست کناری بخش اول)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در لیست کناری بخش اول (پیش‌فرض 5، از 1 تا 8)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_1_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'first_section_side_count_settings',
            'type' => 'number',
            'default' => 5,
            'choices' => [
                'min' => 1,
                'max' => 8,
                'step' => 1,
            ],
        ]);

        //divider: بخش دوم — اسلایدر مطالب
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s2',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش دوم — اسلایدر مطالب</span><span class="echo-cz-divider__desc">اسلایدر آخرین مطالب</span></div>',
        ]);

        //show or hide the main page section 2
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش دوم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش دوم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_2_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        // =======================Second Section=======================
        //change heading tag of the main page second section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_2_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_2_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_second_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page second section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_2_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'second_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.second-title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //choose categories main page second sections
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_2_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'slider_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (اسلایدر بخش دوم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در اسلایدر بخش دوم (پیش‌فرض 10، از 3 تا 20)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_2_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'second_section_count_settings',
            'type' => 'number',
            'default' => 10,
            'choices' => [
                'min' => 3,
                'max' => 20,
                'step' => 1,
            ],
        ]);

        //divider: بخش سوم — مطالب پرطرفدار
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s3',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش سوم — مطالب پرطرفدار</span><span class="echo-cz-divider__desc">دو ستون پست‌های دسته‌بندی انتخابی</span></div>',
        ]);

        //show or hide the main page section 3
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش سوم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش سوم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_3_settings',
            'type' => 'toggle',
            'default' => true,
        ]);
        // ======================= Third Section =======================
        //change heading tag of the main page third section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_3_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_3_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_third_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page third section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_3_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'third_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.third-title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //choose categories main page Third sections
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_3_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'third_section_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (بخش سوم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در بخش سوم (پیش‌فرض 6، از 2 تا 12)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_3_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'third_section_count_settings',
            'type' => 'number',
            'default' => 6,
            'choices' => [
                'min' => 2,
                'max' => 12,
                'step' => 1,
            ],
        ]);

        //divider: بخش پرامپت — گالری پرامپت
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_prompt',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش پرامپت — گالری پرامپت</span><span class="echo-cz-divider__desc">بین بخش سوم و چهارم نمایش داده می‌شود</span></div>',
        ]);

        // ======================= Prompt Section (بعد از بخش سوم) =======================
        //show or hide the prompt section of the main page
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش پرامپت', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش گالری پرامپت در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'prompt_section_show_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        //change heading tag of the main page prompt section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'tag_heading_main_page_prompt_section_settings',
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

        //write the title of the main page prompt section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_prompt_section_settings',
            'type' => 'text',
            'default' => 'پرامپت‌های آماده برای ساخت تصویر با هوش مصنوعی',
        ]);

        //change the typography of the prompt section title
        //note: font-family is not in the default on purpose (keeps the theme font, just size/line-height/color can change)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-size'      => '28px',
                'line-height'    => '1.6',
                'letter-spacing' => '0',
                'color'          => '#ffffff',
            ],
            'output' => [
                [
                    'element' => '.ep-home__title',
                    'suffix'   => ' !important',
                ],
            ],
        ]);

        //small label above the title
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('برچسب بالای عنوان', 'Echo-News'),
            'description' => esc_html__('متن کوتاه بالای عنوان بخش پرامپت (خالی بگذارید تا نمایش داده نشود)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_kicker_settings',
            'type' => 'text',
            'default' => 'گالری پرامپت',
        ]);

        //short description of the prompt section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('توضیح کوتاه', 'Echo-News'),
            'description' => esc_html__('توضیح کوتاه زیر عنوان بخش پرامپت', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_lead_settings',
            'type' => 'textarea',
            'default' => 'پرامپت را کپی کنید، در ChatGPT بفرستید و در چند ثانیه تصویر بگیرید. هر پرامپت با تصویر نمونه، ترجمه‌ی فارسی و نکات شخصی‌سازی.',
        ]);

        //show the numbers (prompts, categories, copies)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش آمار', 'Echo-News'),
            'description' => esc_html__('نمایش تعداد پرامپت ها، دسته بندی ها و تعداد کپی', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_show_stats_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        //show the category links
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش دسته بندی ها', 'Echo-News'),
            'description' => esc_html__('نمایش پیوند دسته بندی ها زیر توضیح (حداکثر ۵ دسته)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_show_chips_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        //choose categories main page prompt section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('انتخاب دسته بندی ها', 'Echo-News'),
            'description' => esc_html__('پرامپت های دسته بندی انتخاب شده نمایش داده می شود (خالی = همه دسته ها)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_categories_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_prompt_categories(),
        ]);

        //order of the prompts
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('مرتب سازی', 'Echo-News'),
            'description' => esc_html__('ترتیب نمایش پرامپت ها در بخش پرامپت', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_orderby_settings',
            'type' => 'select',
            'default' => 'date',
            'choices' => [
                'date' => esc_html__('جدیدترین', 'Echo-News'),
                'views' => esc_html__('پربازدیدترین', 'Echo-News'),
                'copies' => esc_html__('پرکپی ترین', 'Echo-News'),
                'rand' => esc_html__('تصادفی', 'Echo-News'),
            ],
        ]);

        //number of the prompt cards
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد پرامپت', 'Echo-News'),
            'description' => esc_html__('تعداد کارت های نمایش داده شده (۲ تا ۱۲)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_count_settings',
            'type' => 'number',
            'default' => 6,
            'choices' => [
                'min' => 2,
                'max' => 12,
                'step' => 1,
            ],
        ]);

        //button text
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن دکمه', 'Echo-News'),
            'description' => esc_html__('متن دکمه پیوند به آرشیو پرامپت ها (خالی = بدون دکمه)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_button_text_settings',
            'type' => 'text',
            'default' => 'مشاهده‌ی همه‌ی پرامپت‌ها',
        ]);

        //background color of the prompt section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('رنگ پس زمینه بخش پرامپت', 'Echo-News'),
            'description' => esc_html__('رنگ پس زمینه بخش پرامپت را انتخاب کنید (در حالت تاریک رنگ خود قالب استفاده می شود)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_background_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '#f9f9f9',
            'choices'     => [
                'alpha'        => true,
                'allow_reset'  => true,
            ],
            'output' => [
                [
                    'element' => '.home-one .ep-home',
                    'property' => 'background-color',
                ]
            ]
        ]);

        //start color of the intro panel gradient
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('رنگ اول پنل معرفی', 'Echo-News'),
            'description' => esc_html__('رنگ شروع گرادیانت پنل معرفی بخش پرامپت (خالی = رنگ اصلی قالب)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_panel_from_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '',
            'choices'     => [
                'allow_reset'  => true,
            ],
            'output' => [
                [
                    'element' => '.ep-home',
                    'property' => '--ep-home-from',
                ]
            ]
        ]);

        //end color of the intro panel gradient
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('رنگ دوم پنل معرفی', 'Echo-News'),
            'description' => esc_html__('رنگ پایان گرادیانت پنل معرفی بخش پرامپت', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'prompt_section_show_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'prompt_section_panel_to_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '#7817F2',
            'choices'     => [
                'allow_reset'  => true,
            ],
            'output' => [
                [
                    'element' => '.ep-home',
                    'property' => '--ep-home-to',
                ]
            ]
        ]);

        //divider: بخش چهارم — نوار رنگی
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s4',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش چهارم — نوار رنگی</span><span class="echo-cz-divider__desc">عنوان، مطالب و رنگ پس‌زمینه</span></div>',
        ]);

        //show or hide the main page section 4
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش چهارم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش چهارم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_4_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        // ======================= Fourth Section =======================
        //change heading tag of the main page Fourth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_fourth_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page fourth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fourth_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.fourth-title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //choose categories main page Fourth sections
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fourth_section_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (بخش چهارم (۱ پست بزرگ + بقیه کنار آن))
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در بخش چهارم (۱ پست بزرگ + بقیه کنار آن) (پیش‌فرض 5، از 2 تا 9)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fourth_section_count_settings',
            'type' => 'number',
            'default' => 5,
            'choices' => [
                'min' => 2,
                'max' => 9,
                'step' => 1,
            ],
        ]);
        //background color of the fourth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('رنگ پس زمینه بخش چهارم', 'Echo-News'),
            'description' => esc_html__('رنگ پس زمینه بخش چهارم را انتخاب کنید (خالی = رنگ اصلی قالب)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_4_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fourth_section_background_color_settings',
            'transport' => 'auto',
            'type' => 'color',
            'default' => '',
            'choices'     => [
                'alpha'        => true,   
                'allow_reset'  => true,   
            ],
            'output' => [
                [
                    'element' => '.home-one .echo-video-area',
                    'property' => 'background-color',
                ]
            ]

        ]);

        //divider: بخش پنجم — عنوان و دکمهٔ بالا
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s5',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش پنجم — عنوان و دکمهٔ بالا</span><span class="echo-cz-divider__desc">عنوان کلی بخش پنجم و دکمهٔ کنار آن</span></div>',
        ]);

        //show or hide the main page section 5
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش پنجم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش پنجم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_5_settings',
            'type' => 'toggle',
            'default' => true,
        ]);

        // ======================= Fifth Section =======================
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_fifth_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page fifth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        // button content of the fifth section title
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن دکمه', 'Echo-News'),
            'description' => esc_html__('متن دکمهٔ کنار عنوان بخش پنجم', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'نمایش بیشتر',

        ]);
        // button content of the fifth section link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند دکمه', 'Echo-News'),
            'description' => esc_html__('آدرس دکمهٔ کنار عنوان بخش پنجم', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //divider: بخش پنجم — ستون اول
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s5_c1',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش پنجم — ستون اول</span><span class="echo-cz-divider__desc">دسته‌بندی، عنوان و دکمهٔ ستون اول</span></div>',
        ]);

        //choose categories main page Fifth sections col one
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_posts_settings_one',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون اول بخش پنجم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون اول بخش پنجم (پیش‌فرض 5، از 1 تا 10)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col1_count_settings',
            'type' => 'number',
            'default' => 5,
            'choices' => [
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ],
        ]);
        //write the title of the main page fifth section col one
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_fifth_section_col1_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page fifth section col one
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_tag_heading_typography_col1_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col1',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //fifth section button col one content
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن دکمه', 'Echo-News'),
            'description' => esc_html__('متن دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_one_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'نمایش بیشتر',

        ]);
        //fifth section button col one link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند دکمه', 'Echo-News'),
            'description' => esc_html__('آدرس دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_one_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //divider: بخش پنجم — ستون دوم
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s5_c2',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش پنجم — ستون دوم</span><span class="echo-cz-divider__desc">دسته‌بندی، عنوان و دکمهٔ ستون دوم</span></div>',
        ]);

        //choose categories main page Fifth sections col two
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_posts_settings_two',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون دوم بخش پنجم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون دوم بخش پنجم (پیش‌فرض 4، از 1 تا 10)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col2_count_settings',
            'type' => 'number',
            'default' => 4,
            'choices' => [
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ],
        ]);
        //write the title of the main page fifth section col two
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_fifth_section_col2_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page fifth section col two
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_tag_heading_typography_col2_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col2',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //fifth section button col two content
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن دکمه', 'Echo-News'),
            'description' => esc_html__('متن دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_two_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'نمایش بیشتر',

        ]);
        //fifth section button col two link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند دکمه', 'Echo-News'),
            'description' => esc_html__('آدرس دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_two_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //divider: بخش پنجم — ستون سوم
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s5_c3',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش پنجم — ستون سوم</span><span class="echo-cz-divider__desc">دسته‌بندی، عنوان و دکمهٔ ستون سوم</span></div>',
        ]);

        //choose categories main page Fifth sections col three
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_posts_settings_three',
            'type' => 'select',
            'multiple' => false,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون سوم بخش پنجم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون سوم بخش پنجم (پیش‌فرض 4، از 1 تا 10)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col3_count_settings',
            'type' => 'number',
            'default' => 4,
            'choices' => [
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ],
        ]);
        //write the title of the main page fifth section col three
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_fifth_section_col3_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page fifth section col three
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_tag_heading_typography_col3_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.fifth-title-tag-style-col3',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //fifth section button col Three content
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن دکمه', 'Echo-News'),
            'description' => esc_html__('متن دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_Three_button_content_settings',
            'transport' => 'auto',
            'type' => 'text',
            'default' => 'نمایش بیشتر',

        ]);
        //fifth section button col Three link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند دکمه', 'Echo-News'),
            'description' => esc_html__('آدرس دکمهٔ پایین این ستون', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_5_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'fifth_section_col_Three_button_link_settings',
            'transport' => 'auto',
            'type' => 'url',
            'default' => '#',

        ]);

        //divider: بخش ششم — ستون اصلی
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s6',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش ششم — ستون اصلی</span><span class="echo-cz-divider__desc">عنوان و مطالب ستون اصلی</span></div>',
        ]);

        //show or hide the main page section 6
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش ششم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش ششم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_6_settings',
            'type' => 'toggle',
            'default' => true,
        ]);
        // ======================= Sixth Section =======================
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_sixth_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page sixth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.sixth-title-tag-style',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //choose the category of the main page sixth section
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_main_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون اصلی بخش ششم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون اصلی بخش ششم (پیش‌فرض 8، از 1 تا 12)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_count_settings',
            'type' => 'number',
            'default' => 8,
            'choices' => [
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ],
        ]);

        //divider: بخش ششم — ستون کناری ۱
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s6_c1',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش ششم — ستون کناری ۱</span><span class="echo-cz-divider__desc">عنوان «دنبال کنید» (شبکه‌های اجتماعی در بخش سربرگ تنظیم می‌شوند)</span></div>',
        ]);
        //sixth section sidebar column 1 title 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_sixth_col1_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page sixth section col1
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_tag_heading_col1_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.sixth-title-tag-style-col1',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);

        //divider: بخش ششم — ستون کناری ۲
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s6_c2',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش ششم — ستون کناری ۲</span><span class="echo-cz-divider__desc">فهرست شماره‌دار مطالب</span></div>',
        ]);
        //sixth section sidebar column 2 title 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_sixth_col2_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page sixth section col2
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_tag_heading_col2_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30],
                ],
            ],
            'output' => [
                [
                    'element' => '.sixth-title-tag-style-col2',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //choose the category of the main page sixth section sidebar column 2
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_main_posts_col2_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون کناری ۲ بخش ششم (حداکثر ۹ برای شماره‌گذاری))
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون کناری ۲ بخش ششم (حداکثر ۹ برای شماره‌گذاری) (پیش‌فرض 4، از 1 تا 9)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_col2_count_settings',
            'type' => 'number',
            'default' => 4,
            'choices' => [
                'min' => 1,
                'max' => 9,
                'step' => 1,
            ],
        ]);

        //divider: بخش ششم — ستون کناری ۳
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s6_c3',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش ششم — ستون کناری ۳</span><span class="echo-cz-divider__desc">عنوان و مطالب ستون سوم</span></div>',
        ]);
        //sixth section sidebar column 3 title 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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

        //write the title of the main page sixth section col3
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_sixth_col3_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page sixth section col3
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_tag_heading_col3_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.sixth-title-tag-style-col3',
                    'suffix'   => '!important', 
                ],
            ],
        ]);
        //choose the category of the main page sixth section sidebar column 3
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_main_posts_col3_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (ستون کناری ۳ بخش ششم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در ستون کناری ۳ بخش ششم (پیش‌فرض 6، از 1 تا 10)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_6_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'sixth_section_col3_count_settings',
            'type' => 'number',
            'default' => 6,
            'choices' => [
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ],
        ]);

        //divider: بخش هفتم — محبوب‌ترین مطالب
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'main_page_options',
            'settings' => 'echo_cz_divider_main_s7',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش هفتم — محبوب‌ترین مطالب</span><span class="echo-cz-divider__desc">عنوان و مطالب بخش هفتم</span></div>',
        ]);

        //show or hide the main page section 7
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('نمایش بخش هفتم', 'Echo-News'),
            'description' => esc_html__('در صورت غیرفعال بودن، بخش هفتم در صفحه اصلی نمایش داده نمی شود', 'Echo-News'),
            'section' => 'main_page_options',
            'settings' => 'show_main_page_section_7_settings',
            'type' => 'toggle',
            'default' => true,
        ]);
        //seventh section title 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_7_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_7_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'title_main_page_seventh_section_settings',
            'type' => 'text',
            'default' => 'عنوان',
        ]);

        //change the heading tag of the main page seventh section 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_7_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'seventh_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.seventh-title-tag-style',
                    'suffix'   => '!important', 
                ],
            ],
        ]);
        //choose the category of the main page seventh section 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_7_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'seventh_section_main_posts_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (بخش هفتم)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در بخش هفتم (پیش‌فرض 6، از 1 تا 12)', 'Echo-News'),
            'section' => 'main_page_options',
            'active_callback' => [
                [
                    'setting' => 'show_main_page_section_7_settings',
                    'operator' => '==',
                    'value' => true,
                ],
            ],
            'settings' => 'seventh_section_count_settings',
            'type' => 'number',
            'default' => 6,
            'choices' => [
                'min' => 1,
                'max' => 12,
                'step' => 1,
            ],
        ]);

        //divider: ستون اول
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'footer_options',
            'settings' => 'echo_cz_divider_footer_c1',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">ستون اول</span><span class="echo-cz-divider__desc">عنوان و پیوندهای ستون اول</span></div>',
        ]);

        //footer option settings
        //first footer column
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_first_col_settings',
            'type' => 'text',
            'default' => 'Footer Title',
        ]);

        //change the heading tag of the footer first col 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_first_col_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30],
                ],
            ],
            'output' => [
                [
                    'element' => '.footer-first-col',
                    'suffix'   => '!important', 
                ],
            ],
        ]);
        //repeatable content of the footer col1
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('محتوای تکرارپذیر ستون اول', 'Echo-News'),
            'description' => esc_html__('میتوانید محتوای تکرارپذیر را در ستون اول پابرگ اضافه کنید', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_first_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('افزودن محتوای جدید', 'Echo-News'),
            'fields' => [
                'footer_first_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('کلاس آیکن Font Awesome', 'Echo-News'),
                    'description' => esc_html__('شما می‌توانید کلاس نسخه 5 Font Awesome را وارد کنید. مثلاً: fas fa-check-circle', 'Echo-News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_first_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('متن محتوا', 'Echo-News'),
                    'default' => 'This is a footer first column content.',
                ],
                'footer_first_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('پیوند محتوا', 'Echo-News'),
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

        //divider: ستون دوم
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'footer_options',
            'settings' => 'echo_cz_divider_footer_c2',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">ستون دوم</span><span class="echo-cz-divider__desc">عنوان و پیوندهای ستون دوم</span></div>',
        ]);

        //second footer column
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_second_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 2',
        ]);

        //change the heading tag of the footer second col 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_second_col_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.footer-second-col',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //repeatable content of the footer col2
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('محتوای تکرارپذیر ستون دوم', 'Echo-News'),
            'description' => esc_html__('میتوانید محتوای تکرارپذیر را در ستون دوم پابرگ اضافه کنید', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_second_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('افزودن محتوای جدید', 'Echo-News'),
            'fields' => [
                'footer_second_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('کلاس آیکن Font Awesome', 'Echo-News'),
                    'description' => esc_html__('شما می‌توانید کلاس نسخه 5 Font Awesome را وارد کنید. مثلاً: fas fa-check-circle', 'Echo-News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_second_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('متن محتوا', 'Echo-News'),
                    'default' => 'This is a footer second column content.',
                ],
                'footer_second_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('پیوند محتوا', 'Echo-News'),
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

        //divider: ستون سوم
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'footer_options',
            'settings' => 'echo_cz_divider_footer_c3',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">ستون سوم</span><span class="echo-cz-divider__desc">عنوان و پیوندهای ستون سوم</span></div>',
        ]);

        //third footer column
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_third_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 3',
        ]);

        //change the heading tag of the footer third col 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_third_col_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30],
                ],
            ],
            'output' => [
                [
                    'element' => '.footer-third-col',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //repeatable content of the footer col3
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('محتوای تکرارپذیر ستون سوم', 'Echo-News'),
            'description' => esc_html__('میتوانید محتوای تکرارپذیر را در ستون سوم پابرگ اضافه کنید', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_third_col_repeatable_content_settings',
            'type' => 'repeater',
            'button_label' => esc_html__('افزودن محتوای جدید', 'Echo-News'),
            'fields' => [
                'footer_third_col_icon' => [
                    'type' => 'text',
                    'label' => esc_html__('کلاس آیکن Font Awesome', 'Echo-News'),
                    'description' => esc_html__('شما می‌توانید کلاس نسخه 5 Font Awesome را وارد کنید. مثلاً: fas fa-check-circle', 'Echo-News'),
                    'default' => 'fas fa-check-circle',
                ],
                'footer_third_col_text' => [
                    'type' => 'text',
                    'label' => esc_html__('متن محتوا', 'Echo-News'),
                    'default' => 'footer third column',
                ],
                'footer_third_col_link' => [
                    'type' => 'url',
                    'label' => esc_html__('پیوند محتوا', 'Echo-News'),
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

        //divider: ستون چهارم
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'footer_options',
            'settings' => 'echo_cz_divider_footer_c4',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">ستون چهارم</span><span class="echo-cz-divider__desc">عنوان و متن ستون چهارم</span></div>',
        ]);

        //fourth footer column
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'title_footer_fourth_col_settings',
            'type' => 'text',
            'default' => 'Footer Title 4',
        ]);

        //change the heading tag of the footer fourth col 
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_fourth_col_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.footer-fourth-col',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //textarea footer fourth col
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن ستون چهارم', 'Echo-News'),
            'description' => esc_html__('متن معرفی ستون چهارم پابرگ را بنویسید', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'textarea_footer_fourth_col_settings',
            'type' => 'editor',
            'default' => 'This is footer fourth column text.',
        ]);

        //divider: حق نشر
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'footer_options',
            'settings' => 'echo_cz_divider_footer_copy',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">حق نشر</span><span class="echo-cz-divider__desc">متن پایین‌ترین بخش پابرگ</span></div>',
        ]);

        //footer copyright
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن حق نشر پابرگ', 'Echo-News'),
            'description' => esc_html__('میتوانید متن حق نشر پابرگ را وارد کنید', 'Echo-News'),
            'section' => 'footer_options',
            'settings' => 'footer_copyright_text_settings',
            'type' => 'editor',
            'default' => 'Â© Copyright 2025 by Websemicolon',
            'output' => [
                'element' => '.copyright',

            ],
        ]);

        //divider: بخش اول نوار کناری
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'blog_sidebar_option',
            'settings' => 'echo_cz_divider_blog_part1',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش اول نوار کناری</span><span class="echo-cz-divider__desc">عنوان و دسته‌بندی‌های بخش اول</span></div>',
        ]);

        //blog sidebar 
        //blogsidebar first part title
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'title_blogsidebar1_settings',
            'type' => 'text',
            'default' => 'Blog sidebar part 1',
        ]);

        //change the heading tag of the blog sidebar first part
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blogsidebar1_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.blog_sidebar_first_part',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //choose the category of the blog sidebar first part
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_first_cats_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (بخش اول نوار کناری)
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در بخش اول نوار کناری (پیش‌فرض 5، از 1 تا 10)', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_first_count_settings',
            'type' => 'number',
            'default' => 5,
            'choices' => [
                'min' => 1,
                'max' => 10,
                'step' => 1,
            ],
        ]);

        //divider: بخش دوم نوار کناری
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'blog_sidebar_option',
            'settings' => 'echo_cz_divider_blog_part2',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بخش دوم نوار کناری</span><span class="echo-cz-divider__desc">عنوان و دسته‌بندی‌های بخش دوم</span></div>',
        ]);
        //blogsidebar second part title
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تگ عنوان', 'Echo-News'),
            'description' => esc_html__('تگ HTML عنوان این بخش؛ برای سئو بهتر است h2 یا h3 انتخاب شود', 'Echo-News'),
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
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('متن عنوان', 'Echo-News'),
            'description' => esc_html__('عنوانی که در این بخش نمایش داده می‌شود', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'title_blogsidebar2_settings',
            'type' => 'text',
            'default' => 'Blog sidebar part 2',
        ]);

        //change the heading tag of the blog sidebar second part
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تایپوگرافی عنوان', 'Echo-News'),
            'description' => esc_html__('اندازه، رنگ و ویژگی‌های ظاهری عنوان این بخش', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blogsidebar2_tag_heading_typography_settings',
            'transport' => 'auto',
            'type' => 'typography',
            'default' => [
                'font-family'    => '',
                'variant'        => '',
                'font-size'      => '',
                'line-height'    => '',
                'letter-spacing' => '',
                'text-transform' => '',
                'color'          => '',
            ],
            'choices'     => [
                'fonts' => [
                    'google' => ['popularity', 30], 
                ],
            ],
            'output' => [
                [
                    'element' => '.blog_sidebar_second_part',
                    'suffix'   => ' !important', 
                ],
            ],
        ]);
        //choose the category of the blog sidebar second part
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('دسته‌بندی مطالب', 'Echo-News'),
            'description' => esc_html__('آخرین مطالب دسته‌بندی(های) انتخاب‌شده نمایش داده می‌شود', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_second_cats_settings',
            'type' => 'select',
            'multiple' => true,
            'choices' => EchoNews_get_all_category(),
        ]);

        //number of the posts (بخش دوم نوار کناری (حداکثر ۹ برای شماره‌گذاری))
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('تعداد مطالب', 'Echo-News'),
            'description' => esc_html__('تعداد مطالب نمایش داده شده در بخش دوم نوار کناری (حداکثر ۹ برای شماره‌گذاری) (پیش‌فرض 4، از 1 تا 9)', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_second_count_settings',
            'type' => 'number',
            'default' => 4,
            'choices' => [
                'min' => 1,
                'max' => 9,
                'step' => 1,
            ],
        ]);

        //divider: بنر تبلیغاتی
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'section' => 'blog_sidebar_option',
            'settings' => 'echo_cz_divider_blog_banner',
            'type' => 'custom',
            'default' => '<div class="echo-cz-divider"><span class="echo-cz-divider__title">بنر تبلیغاتی</span><span class="echo-cz-divider__desc">تصویر، پیوند و ابعاد بنر</span></div>',
        ]);

        //add avertisment banner in the blog sidebar
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('بنر تبلیغاتی نوار کناری وبلاگ', 'Echo-News'),
            'description' => esc_html__('بنر تبلیغاتی را برای نمایش در نوار کناری وبلاگ انتخاب کنید', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_settings',
            'type' => 'image',
            'default' => ' ',
        ]);
        //add linke for advertisement banner
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('پیوند بنر تبلیغاتی نوار کناری وبلاگ', 'Echo-News'),
            'description' => esc_html__('پیوند را برای نمایش در نوار کناری وبلاگ انتخاب کنید', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_link_settings',
            'type' => 'url',
            'default' => '#',
        ]);
        //add the field for the alt title of the advertisement banner
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('عنوان جایگزین بنر تبلیغاتی', 'Echo-News'),
            'description' => esc_html__('عنوان جایگزین را برای نمایش در نوار کناری وبلاگ انتخاب کنید', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_alt_title_settings',
            'type' => 'text',
            'default' => 'advertisement Banner',
        ]);
        //add the no follow attribute to the advertisement banner link
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label' => esc_html__('Nofollow', 'Echo-News'),
            'description' => esc_html__('در صورت فعال بودن، پیوند بنر تبلیغاتی به عنوان nofollow تنظیم می‌شود', 'Echo-News'),
            'section' => 'blog_sidebar_option',
            'settings' => 'blog_sidebar_advertisement_banner_nofollow_settings',
            'type' => 'toggle',
            'default' => false,
        ]);

        //add the Dimensions for the blog banner adds
        Kirki::add_field('EchoNews_Theme_Options_Config', [
            'label'       => esc_html__('ابعاد بنر تبلیغاتی نوار کناری وبلاگ', 'Echo-News'),
            'description' => esc_html__('ابعاد بنر تبلیغاتی را برای نمایش در نوار کناری وبلاگ انتخاب کنید', 'Echo-News'),
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
                    'width'  => esc_html__('عرض', 'Echo-News'),
                    'height' => esc_html__('ارتفاع', 'Echo-News'),
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

        // style of the dividers (Kirki "custom" fields) in the customizer panel
        function EchoNews_customizer_divider_styles()
        {
            echo '<style id="echo-cz-divider-styles">
                .customize-control-kirki-custom .echo-cz-divider{display:block;margin:22px -12px 4px;padding:11px 14px 10px;background:#eef2fd;border-top:1px solid #d6e0fa;border-bottom:1px solid #d6e0fa;border-inline-start:4px solid #537FE7}
                .customize-control-kirki-custom .echo-cz-divider__title{display:block;font-size:13px;font-weight:700;line-height:1.7;color:#1d2a4d}
                .customize-control-kirki-custom .echo-cz-divider__desc{display:block;margin-top:2px;font-size:12px;line-height:1.7;color:#5b6480}
            </style>';
        }
        add_action('customize_controls_print_styles', 'EchoNews_customizer_divider_styles');
    } else {
        function EchoNews_notice_kirki_missing()
        {
            echo '<div class="error"><p>';
            echo esc_html__('برای تغییر تنظیمات قالب افزونه Kirki را نصب و فعال کنید.', 'Echo-News');
            echo '</p></div>';
        }
        add_action('admin_notices', 'EchoNews_notice_kirki_missing');
    }
    ?>