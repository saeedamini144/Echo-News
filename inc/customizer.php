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
    ]);

    // سکشن رنگ‌ها
    Kirki::add_section('colors_section', [
        'title' => esc_html__('رنگ‌ها', 'textdomain'),
        'panel' => 'theme_options',
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
}
