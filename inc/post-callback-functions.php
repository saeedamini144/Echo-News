<?php

//call back the all post taxonomies to choose
function EchoNews_get_all_category()
{
    $categories = get_categories();
    $cat_options = array();
    foreach ($categories as $category) {
        $cat_options[$category->term_id] = $category->name;
    }
    return $cat_options;
}

// دسته‌بندی‌های پرامپت برای کاستومایزر
// این فایل قبل از init لود می‌شود و taxonomy هنوز ثبت نشده؛ پس مستقیم از دیتابیس می‌خوانیم (فقط در پیشخوان/پیش‌نمایش).
function EchoNews_get_prompt_categories()
{
    $options = array();
    if (!is_admin() && !is_customize_preview()) {
        return $options;
    }

    global $wpdb;
    $rows = $wpdb->get_results($wpdb->prepare(
        "SELECT t.term_id, t.name FROM {$wpdb->terms} t INNER JOIN {$wpdb->term_taxonomy} tt ON tt.term_id = t.term_id WHERE tt.taxonomy = %s ORDER BY t.name ASC",
        'prompt_category'
    ));
    foreach ((array) $rows as $row) {
        $options[$row->term_id] = $row->name;
    }
    return $options;
}
