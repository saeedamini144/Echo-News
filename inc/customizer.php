 <?
    if (class_exists('Kirki')) {

        // کانفیگ قالب
        Kirki::add_config('my_theme_config', [
            'capability' => 'edit_theme_options',
            'option_type' => 'theme_mod',

        ]);

        // پنل
        Kirki::add_panel('theme_options', [
            'title' => esc_html__('تنظیمات قالب', 'textdomain'),
            'priority' => 10,
            'description' => esc_html__('تنظیمات مختلف قالب را از اینجا انجام دهید.', 'textdomain'),
        ]);

        // سکشن رنگ‌ها
        Kirki::add_section('colors_section', [
            'title' => esc_html__('رنگ‌ها', 'textdomain'),
            'panel' => 'theme_options',
            // 'priority' => 10,
            'description' => esc_html__('تنظیم رنگ‌های قالب از اینجا.', 'textdomain'),
        ]);

        // فیلد رنگ هدر
        Kirki::add_field('my_theme_config', [
            'type' => 'color',
            'settings' => 'header_bg_color',
            'label' => esc_html__('رنگ پس‌زمینه هدر', 'textdomain'),
            'section' => 'colors_section',
            'default' => '#ffffff',
            'transport' => 'auto',
        ]);
    } else {
        function EchoNews_notice_kirki_missing()
        {
            echo '<div class="error"><p>';
            echo esc_html__('Please for changing theme options install and acivate the kiki plugin.', 'textdomain');
            echo '</p></div>';
        }
        add_action('admin_notices', 'EchoNews_notice_kirki_missing');
    }
