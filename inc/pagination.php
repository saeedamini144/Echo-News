<?php

/**
 * Pagination Function - Echo News Style
 * ایجاد پیجینیشن استاندارد و قابل استایل‌دهی
 *
 * @param WP_Query|null $query اگر کوئری سفارشی باشد از آن استفاده می‌کند
 * اگر چیزی ارسال نشود از $wp_query اصلی استفاده می‌شود
 */
function Echo_pagination($query = null)
{

    // اگر کوئری ارسال نشده از کوئری اصلی استفاده می‌کنیم
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    // تعداد کل صفحات
    $total_pages = $query->max_num_pages;

    // اگر فقط یک صفحه داریم، پیجینیشن لازم نیست
    if ($total_pages <= 1) return;

    // عدد بزرگ لازم برای ساخت base URL
    $big = 999999999;

    /**
     * paginate_links یک آرایه از لینک‌های صفحه‌بندی ایجاد می‌کند
     * ما type=> array گذاشتیم تا LIs رو خودمون بسازیم
     */
    $pages = paginate_links([
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), // ساخت ساختار URL
        'format' => '?paged=%#%', // فرمت شماره صفحه
        'current' => max(1, get_query_var('paged')), // صفحه فعلی
        'total' => $total_pages, // تعداد کل صفحات
        'type' => 'array', // خروجی به صورت آرایه برای کنترل بهتر
        'prev_text' => '‹', // متن صفحه قبل
        'next_text' => '›', // متن صفحه بعد
    ]);

    // اگر خروجی لینک‌ها آرایه بود → HTML بساز
    if (is_array($pages)) {

        echo '<nav class="pagination">
        <ul>';

        foreach ($pages as $page) {
            // خروجی paginate_links قبلاً شامل <a> و <span> هست
            echo '<li>' . $page . '</li>';
        }

        echo '</ul>
    </nav>';
    }
}
