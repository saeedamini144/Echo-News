<?php

/**
 * متاباکس «اطلاعات پرامپت» برای پست تایپ ai_prompt (گالری پرامپت)
 *
 * فیلدها:
 *  _ep_prompt        پرامپت انگلیسی (اجباری)
 *  _ep_ratio         نسبت تصویر (اجباری)
 *  _ep_prompt_fa     ترجمه فارسی
 *  _ep_negative      Negative prompt
 *  _ep_params        پارامترها (هر خط یک پارامتر)
 *  _ep_version       نسخه مدل
 *  _ep_seed          Seed
 *  _ep_steps         Steps
 *  _ep_guidance      CFG / Guidance
 *  _ep_resolution    رزولوشن
 *  _ep_gallery       تصاویر دیگر (IDهای پیوست، با ویرگول)
 *  _ep_copies        تعداد کپی (فقط خواندنی؛ بعداً با AJAX زیاد می‌شود)
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ------------------------------------------------------------------
 * داده‌های پایه
 * ------------------------------------------------------------------ */

// نسبت‌های مجاز تصویر (کلید => برچسب)
function echo_news_prompt_ratios()
{
    return array(
        '1:1'  => '1:1 (مربع)',
        '4:5'  => '4:5 (پرتره)',
        '3:2'  => '3:2 (افقی کلاسیک)',
        '16:9' => '16:9 (عریض)',
        '2:3'  => '2:3 (عمودی کلاسیک)',
        '9:16' => '9:16 (عمودی / استوری)',
    );
}

/**
 * همه‌ی فیلدهای پرامپت را آماده‌ی نمایش در قالب برمی‌گرداند (هنوز escape نشده).
 * فیلد خالی = رشته‌ی خالی یا آرایه‌ی خالی؛ قالب باید بلوک مربوطه را حذف کند.
 */
function echo_news_get_prompt_data($post_id = 0)
{
    $post_id = $post_id ? (int) $post_id : get_the_ID();
    $get     = function ($key) use ($post_id) {
        return (string) get_post_meta($post_id, $key, true);
    };

    $params = array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', $get('_ep_params')))));
    $gallery = array_values(array_filter(array_map('absint', explode(',', $get('_ep_gallery')))));

    $ratio = $get('_ep_ratio');
    if (!isset(echo_news_prompt_ratios()[$ratio])) {
        $ratio = '';
    }

    return array(
        'prompt'     => $get('_ep_prompt'),
        'prompt_fa'  => $get('_ep_prompt_fa'),
        'negative'   => $get('_ep_negative'),
        'params'     => $params,
        'ratio'      => $ratio,
        'version'    => $get('_ep_version'),
        'seed'       => $get('_ep_seed'),
        'steps'      => $get('_ep_steps'),
        'guidance'   => $get('_ep_guidance'),
        'resolution' => $get('_ep_resolution'),
        'gallery'    => $gallery,
        'copies'     => (int) get_post_meta($post_id, '_ep_copies', true),
    );
}

/* ------------------------------------------------------------------
 * متاباکس
 * ------------------------------------------------------------------ */

function echo_news_prompt_add_metabox()
{
    add_meta_box(
        'echo_news_prompt_details',
        'اطلاعات پرامپت',
        'echo_news_prompt_metabox_render',
        'ai_prompt',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'echo_news_prompt_add_metabox');

function echo_news_prompt_metabox_render($post)
{
    wp_nonce_field('echo_news_prompt_save', 'echo_news_prompt_nonce');

    $d     = echo_news_get_prompt_data($post->ID);
    $ratio = $d['ratio'];
?>
    <style>
        .ep-mb .ep-field {
            margin: 0 0 18px;
        }

        .ep-mb label.ep-label {
            display: block;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .ep-mb label.ep-label small {
            font-weight: 400;
            color: #646970;
        }

        .ep-mb .req {
            color: #d63638;
        }

        .ep-mb textarea,
        .ep-mb input[type=text],
        .ep-mb input[type=number],
        .ep-mb select {
            width: 100%;
            max-width: 100%;
        }

        .ep-mb .ltr {
            direction: ltr;
            text-align: left;
        }

        .ep-mb .ep-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            gap: 14px;
        }

        .ep-mb h4 {
            margin: 22px 0 10px;
            padding-top: 14px;
            border-top: 1px solid #dcdcde;
        }

        .ep-mb .ep-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 8px 0;
        }

        .ep-mb .ep-gallery li {
            position: relative;
            margin: 0;
            width: 84px;
            height: 84px;
            border: 1px solid #dcdcde;
            border-radius: 6px;
            overflow: hidden;
        }

        .ep-mb .ep-gallery img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .ep-mb .ep-gallery button {
            position: absolute;
            top: 2px;
            inset-inline-start: 2px;
            width: 22px;
            height: 22px;
            line-height: 18px;
            padding: 0;
            border: 0;
            border-radius: 50%;
            background: rgba(0, 0, 0, .7);
            color: #fff;
            cursor: pointer;
        }
    </style>

    <div class="ep-mb">

        <div class="ep-field">
            <label class="ep-label" for="ep_prompt">پرامپت (English) <span class="req">*</span> <small>— بخش‌های قابل تغییر را داخل [ ] بنویسید، مثل [a young woman]</small></label>
            <textarea id="ep_prompt" name="ep_prompt" class="ltr" rows="6"><?php echo esc_textarea($d['prompt']); ?></textarea>
        </div>

        <div class="ep-field" style="max-width:320px">
            <label class="ep-label" for="ep_ratio">نسبت تصویر <span class="req">*</span></label>
            <select id="ep_ratio" name="ep_ratio">
                <option value="">— انتخاب کنید —</option>
                <?php foreach (echo_news_prompt_ratios() as $value => $label) : ?>
                    <option value="<?php echo esc_attr($value); ?>" <?php selected($ratio, $value); ?>><?php echo esc_html($label); ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="ep-field">
            <label class="ep-label" for="ep_prompt_fa">ترجمه فارسی پرامپت <small>— اختیاری؛ تب «ترجمه فارسی» و متن قابل ایندکس</small></label>
            <textarea id="ep_prompt_fa" name="ep_prompt_fa" rows="4"><?php echo esc_textarea($d['prompt_fa']); ?></textarea>
        </div>

        <div class="ep-field">
            <label class="ep-label" for="ep_negative">Negative prompt <small>— اختیاری</small></label>
            <textarea id="ep_negative" name="ep_negative" class="ltr" rows="3"><?php echo esc_textarea($d['negative']); ?></textarea>
        </div>

        <div class="ep-field">
            <label class="ep-label" for="ep_params">پارامترها <small>— اختیاری؛ هر خط یک پارامتر، مثل <code>--ar 4:5</code> یا <code>steps 28</code></small></label>
            <textarea id="ep_params" name="ep_params" class="ltr" rows="3"><?php echo esc_textarea(implode("\n", $d['params'])); ?></textarea>
        </div>

        <h4>مشخصات تولید تصویر <small style="font-weight:400;color:#646970">(هر کدام خالی باشد در صفحه نمایش داده نمی‌شود)</small></h4>
        <div class="ep-grid">
            <div>
                <label class="ep-label" for="ep_version">نسخه مدل</label>
                <input type="text" id="ep_version" name="ep_version" class="ltr" placeholder="v6.1" value="<?php echo esc_attr($d['version']); ?>">
            </div>
            <div>
                <label class="ep-label" for="ep_seed">Seed</label>
                <input type="text" id="ep_seed" name="ep_seed" class="ltr" value="<?php echo esc_attr($d['seed']); ?>">
            </div>
            <div>
                <label class="ep-label" for="ep_steps">Steps</label>
                <input type="number" id="ep_steps" name="ep_steps" class="ltr" min="1" max="500" value="<?php echo esc_attr($d['steps']); ?>">
            </div>
            <div>
                <label class="ep-label" for="ep_guidance">CFG / Guidance</label>
                <input type="number" id="ep_guidance" name="ep_guidance" class="ltr" min="0" max="50" step="0.1" value="<?php echo esc_attr($d['guidance']); ?>">
            </div>
            <div>
                <label class="ep-label" for="ep_resolution">رزولوشن</label>
                <input type="text" id="ep_resolution" name="ep_resolution" class="ltr" placeholder="1920x1080" value="<?php echo esc_attr($d['resolution']); ?>">
            </div>
        </div>

        <h4>تصاویر دیگر این پرامپت <small style="font-weight:400;color:#646970">(اختیاری؛ حداکثر ۸ تصویر، علاوه بر تصویر شاخص)</small></h4>
        <input type="hidden" id="ep_gallery" name="ep_gallery" value="<?php echo esc_attr(implode(',', $d['gallery'])); ?>">
        <ul class="ep-gallery" id="ep_gallery_list">
            <?php foreach ($d['gallery'] as $id) : ?>
                <li data-id="<?php echo esc_attr($id); ?>">
                    <?php echo wp_get_attachment_image($id, 'thumbnail'); ?>
                    <button type="button" aria-label="حذف تصویر">&times;</button>
                </li>
            <?php endforeach; ?>
        </ul>
        <button type="button" class="button" id="ep_gallery_add">افزودن / ویرایش تصاویر</button>

        <?php if ($d['copies']) : ?>
            <p style="margin-top:20px;color:#646970">تعداد کپی ثبت‌شده: <strong><?php echo esc_html(number_format_i18n($d['copies'])); ?></strong></p>
        <?php endif; ?>
    </div>
<?php
}

/* ------------------------------------------------------------------
 * ذخیره‌سازی
 * ------------------------------------------------------------------ */

/**
 * پاک‌سازی و اعتبارسنجی فیلدهای پرامپت (مشترک بین متاباکس و Importer)
 *
 * @param array $in ورودی خام (بدون slash) با کلیدهای: prompt, prompt_fa, negative, params,
 *                  ratio, version, seed, steps, guidance, resolution, gallery (آرایه‌ی ID یا رشته‌ی ویرگولی)
 * @return array meta_key => مقدار تمیز ('' = خالی؛ نباید ذخیره شود)
 */
function echo_news_prompt_sanitize_meta(array $in)
{
    $get  = function ($key) use ($in) {
        return isset($in[$key]) ? (string) $in[$key] : '';
    };
    $text = function ($key) use ($get) {
        return sanitize_text_field($get($key));
    };
    $area = function ($key) use ($get) {
        return sanitize_textarea_field($get($key));
    };

    // نسبت تصویر فقط از لیست مجاز
    $ratio = $text('ratio');
    if (!isset(echo_news_prompt_ratios()[$ratio])) {
        $ratio = '';
    }

    // پارامترها: هر خط یک مورد
    $params = array_filter(array_map('sanitize_text_field', preg_split('/\r\n|\r|\n/', $area('params'))));

    // Steps: عدد صحیح مثبت | Guidance: عدد اعشاری
    $steps    = $text('steps');
    $steps    = ctype_digit($steps) && (int) $steps > 0 ? (string) (int) $steps : '';
    $guidance = $text('guidance');
    $guidance = is_numeric($guidance) ? (string) (float) $guidance : '';

    // گالری: فقط IDهای پیوست واقعی، بدون تکرار، حداکثر ۸ تا
    $raw_gallery = isset($in['gallery']) ? $in['gallery'] : array();
    if (!is_array($raw_gallery)) {
        $raw_gallery = explode(',', (string) $raw_gallery);
    }
    $gallery = array();
    foreach ($raw_gallery as $id) {
        $id = absint($id);
        if ($id && get_post_type($id) === 'attachment') {
            $gallery[] = $id;
        }
    }
    $gallery = array_slice(array_unique($gallery), 0, 8);

    return array(
        '_ep_prompt'     => $area('prompt'),
        '_ep_prompt_fa'  => $area('prompt_fa'),
        '_ep_negative'   => $area('negative'),
        '_ep_params'     => implode("\n", $params),
        '_ep_ratio'      => $ratio,
        '_ep_version'    => $text('version'),
        '_ep_seed'       => $text('seed'),
        '_ep_steps'      => $steps,
        '_ep_guidance'   => $guidance,
        '_ep_resolution' => $text('resolution'),
        '_ep_gallery'    => implode(',', $gallery),
    );
}

// ذخیره‌ی فیلدهای تمیز: فیلد خالی ذخیره نمی‌شود و meta قبلی‌اش حذف می‌شود
function echo_news_prompt_store_meta($post_id, array $fields)
{
    foreach ($fields as $key => $value) {
        if ($value === '') {
            delete_post_meta($post_id, $key);
        } else {
            update_post_meta($post_id, $key, $value);
        }
    }
}

function echo_news_prompt_save_metabox($post_id)
{
    if (!isset($_POST['echo_news_prompt_nonce']) || !wp_verify_nonce(wp_unslash($_POST['echo_news_prompt_nonce']), 'echo_news_prompt_save')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    $in = array();
    foreach (array('prompt', 'prompt_fa', 'negative', 'params', 'ratio', 'version', 'seed', 'steps', 'guidance', 'resolution', 'gallery') as $key) {
        $in[$key] = isset($_POST['ep_' . $key]) ? wp_unslash($_POST['ep_' . $key]) : '';
    }

    echo_news_prompt_store_meta($post_id, echo_news_prompt_sanitize_meta($in));
}
add_action('save_post_ai_prompt', 'echo_news_prompt_save_metabox');

/* ------------------------------------------------------------------
 * هشدار فیلدهای اجباری (پرامپت و نسبت تصویر)
 * ------------------------------------------------------------------ */

function echo_news_prompt_required_notice()
{
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'ai_prompt' || $screen->base !== 'post') {
        return;
    }
    $post_id = isset($_GET['post']) ? absint($_GET['post']) : 0;
    if (!$post_id || get_post_status($post_id) === 'auto-draft') {
        return;
    }

    $missing = array();
    if (!get_post_meta($post_id, '_ep_prompt', true)) {
        $missing[] = 'پرامپت';
    }
    if (!get_post_meta($post_id, '_ep_ratio', true)) {
        $missing[] = 'نسبت تصویر';
    }
    if (!has_post_thumbnail($post_id)) {
        $missing[] = 'تصویر شاخص';
    }
    if ($missing) {
        echo '<div class="notice notice-warning"><p>برای نمایش کامل صفحه، این موارد را تکمیل کنید: <strong>' . esc_html(implode('، ', $missing)) . '</strong></p></div>';
    }
}
add_action('admin_notices', 'echo_news_prompt_required_notice');

/* ------------------------------------------------------------------
 * اسکریپت انتخاب تصاویر (فقط در صفحه ویرایش ai_prompt)
 * ------------------------------------------------------------------ */

function echo_news_prompt_admin_scripts($hook)
{
    if (!in_array($hook, array('post.php', 'post-new.php'), true)) {
        return;
    }
    $screen = get_current_screen();
    if (!$screen || $screen->post_type !== 'ai_prompt') {
        return;
    }

    wp_enqueue_media();
    wp_enqueue_script(
        'echo-news-prompt-metabox',
        get_template_directory_uri() . '/assets/js/admin-prompt-metabox.js',
        array('jquery', 'jquery-ui-sortable'),
        wp_get_theme()->get('version'),
        true
    );
}
add_action('admin_enqueue_scripts', 'echo_news_prompt_admin_scripts');
