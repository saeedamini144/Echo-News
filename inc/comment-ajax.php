<?php

/**
 * ثبت نظر با AJAX و اعلان فارسی (موفقیت / خطا) بالای فرم
 * جاوااسکریپت: assets/js/comment-notice.js | استایل: «اعلان فرم نظر» در style.css
 * اگر JS غیرفعال باشد، فرم مثل قبل مستقیم به wp-comments-post.php ارسال می‌شود.
 */

if (!defined('ABSPATH')) {
    exit;
}

// پیام فارسی برای خطاهای رایج ثبت نظر (کلید = کد خطای وردپرس)
function echo_news_comment_error_messages()
{
    return array(
        'require_name_email'                  => 'نام و یک ایمیل معتبر را وارد کنید.',
        'require_valid_email'                 => 'لطفاً یک نشانی ایمیل معتبر وارد کنید.',
        'require_valid_comment'               => 'متن نظر را بنویسید.',
        'comment_content_column_length'       => 'متن نظر بیش از حد طولانی است.',
        'comment_author_column_length'        => 'نام وارد‌شده بیش از حد طولانی است.',
        'comment_author_email_column_length'  => 'ایمیل وارد‌شده بیش از حد طولانی است.',
        'comment_author_url_column_length'    => 'نشانی وب‌سایت بیش از حد طولانی است.',
        'comment_duplicate'                   => 'این نظر قبلاً ثبت شده است (نظر تکراری).',
        'comment_flood'                       => 'شما خیلی سریع نظر می‌دهید. کمی صبر کنید و دوباره تلاش کنید.',
        'comment_closed'                      => 'ثبت نظر برای این مطلب بسته شده است.',
        'comment_on_draft'                    => 'امکان ثبت نظر برای این مطلب وجود ندارد.',
        'comment_on_trash'                    => 'امکان ثبت نظر برای این مطلب وجود ندارد.',
        'comment_on_password_protected'       => 'امکان ثبت نظر برای این مطلب وجود ندارد.',
        'comment_id_not_found'                => 'مطلب مورد نظر پیدا نشد.',
        'not_logged_in'                       => 'برای ثبت نظر باید وارد حساب کاربری شوید.',
    );
}

function echo_news_ajax_submit_comment()
{
    // امتیاز ۱ تا ۵ الزامی است (HTML هم required دارد؛ این بررسی سمت سرور است)
    $rating = isset($_POST['rating']) ? absint($_POST['rating']) : 0;
    if ($rating < 1 || $rating > 5) {
        wp_send_json_error(array('message' => 'لطفاً امتیاز خود را (۱ تا ۵ ستاره) انتخاب کنید.', 'code' => 'require_rating'), 400);
    }

    // همان اعتبارسنجی و ذخیره‌ی استاندارد وردپرس (بررسی بسته بودن نظر، تکراری، سیل، اعتدال، ایمیل و ...)
    $comment = wp_handle_comment_submission(wp_unslash($_POST));

    if (is_wp_error($comment)) {
        $code     = $comment->get_error_code();
        $messages = echo_news_comment_error_messages();
        $message  = isset($messages[$code])
            ? $messages[$code]
            : trim(preg_replace('/^\s*(خطا|Error)\s*[:：]\s*/u', '', wp_strip_all_tags($comment->get_error_message())));
        wp_send_json_error(array('message' => $message, 'code' => $code), 400);
    }

    // ذخیره‌ی کوکی «نام و ایمیل من را به خاطر بسپار» (مثل wp-comments-post.php)
    $user    = wp_get_current_user();
    $consent = !empty($_POST['wp-comment-cookies-consent']);
    do_action('set_comment_cookies', $comment, $user, $consent);

    $approved = ((string) $comment->comment_approved === '1');

    wp_send_json_success(array(
        'approved'    => $approved,
        'message'     => $approved
            ? 'نظر شما با موفقیت ثبت شد. ممنون از همراهی شما!'
            : 'نظر شما ثبت شد و پس از تأیید مدیر سایت نمایش داده می‌شود.',
        'comment_url' => $approved ? get_comment_link($comment) : '',
    ));
}
add_action('wp_ajax_echo_news_submit_comment', 'echo_news_ajax_submit_comment');
add_action('wp_ajax_nopriv_echo_news_submit_comment', 'echo_news_ajax_submit_comment');
