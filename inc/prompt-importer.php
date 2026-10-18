<?php

/**
 * ورود گروهی پرامپت‌ها از فایل CSV
 * مسیر: ادمین ← گالری پرامپت ← ورود گروهی
 *
 * مراحل: ۱) آپلود CSV  ۲) پیش‌نمایش و اعتبارسنجی  ۳) ورود  ۴) گزارش + امکان بازگردانی
 * ستون‌ها: echo_news_import_columns()
 */

if (!defined('ABSPATH')) {
    exit;
}

/* ------------------------------------------------------------------
 * ستون‌ها
 * ------------------------------------------------------------------ */
function echo_news_import_columns()
{
    return array(
        // ستون => [توضیح، اجباری؟]
        'title'      => array('عنوان پرامپت', true),
        'prompt'     => array('متن پرامپت (English)', true),
        'ratio'      => array('نسبت تصویر: 1:1 ، 4:5 ، 3:2 ، 2:3 ، 16:9 ، 9:16', true),
        'slug'       => array('نامک (آدرس) انگلیسی؛ اگر خالی باشد از عنوان ساخته می‌شود', false),
        'prompt_fa'  => array('ترجمه فارسی', false),
        'negative'   => array('Negative prompt', false),
        'params'     => array('پارامترها؛ چند مورد را با | جدا کنید', false),
        'version'    => array('نسخه مدل', false),
        'seed'       => array('Seed', false),
        'steps'      => array('Steps (عدد)', false),
        'guidance'   => array('CFG / Guidance (عدد)', false),
        'resolution' => array('رزولوشن، مثل 1024x1536', false),
        'model'      => array('مدل؛ مثل ChatGPT|chatgpt (نام|نامک)، چند مورد با ;', false),
        'category'   => array('دسته؛ مثل پرتره|portrait یا «پرتره > سینمایی»، چند مورد با ;', false),
        'excerpt'    => array('خلاصه (lead)', false),
        'content'    => array('توضیح یکتا (HTML مجاز)', false),
        'image'      => array('تصویر شاخص: نام فایل در کتابخانه‌ی رسانه (با/بدون پسوند) یا ID', false),
        'gallery'    => array('تصاویر دیگر؛ نام فایل‌ها با | جدا شوند', false),
        'image_alt'  => array('متن جایگزین (alt) تصویر', false),
        'status'     => array('draft (پیش‌فرض) ، publish ، pending', false),
        'code'       => array('کد شناسایی دلخواه (فقط برای گزارش)', false),
    );
}

/* ------------------------------------------------------------------
 * منو
 * ------------------------------------------------------------------ */
function echo_news_import_menu()
{
    add_submenu_page(
        'edit.php?post_type=ai_prompt',
        'ورود گروهی پرامپت',
        'ورود گروهی',
        'manage_options',
        'ep-import',
        'echo_news_import_page'
    );
}
add_action('admin_menu', 'echo_news_import_menu');

/* ------------------------------------------------------------------
 * فایل نمونه (دانلود)
 * ------------------------------------------------------------------ */
function echo_news_import_sample()
{
    if (!current_user_can('manage_options') || !check_admin_referer('ep_import_sample')) {
        wp_die('دسترسی غیرمجاز');
    }

    nocache_headers();
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="prompts-sample.csv"');

    $out = fopen('php://output', 'w');
    fwrite($out, "\xEF\xBB\xBF");
    fputcsv($out, array_keys(echo_news_import_columns()));
    fputcsv($out, array(
        'پرامپت چت‌جی‌پی‌تی برای ساخت پرتره سینمایی', 'cinematic-portrait-chatgpt-prompt', 'Create a cinematic portrait of [a young woman] at golden hour...',
        '2:3', 'cinematic-portrait', 'یک پرتره سینمایی از [یک زن جوان] ...', '', 'Size: 1024x1536', 'GPT Image', '', '', '', '1024x1536',
        'ChatGPT|chatgpt', 'پرتره|portrait', 'خلاصه‌ی کوتاه', '<h2>چرا خوب جواب می‌دهد؟</h2><p>توضیح...</p>', 'p001', '', 'پرتره سینمایی', 'draft', 'p001',
    ));
    fclose($out);
    exit;
}
add_action('admin_post_ep_import_sample', 'echo_news_import_sample');

/* ------------------------------------------------------------------
 * کمکی‌ها: تصویر، ترم، تکراری
 * ------------------------------------------------------------------ */

// نام فایل (با/بدون پسوند) یا ID => ID پیوست (۰ = پیدا نشد)
function echo_news_import_find_attachment($ref)
{
    global $wpdb;
    static $cache = array();

    $ref = trim((string) $ref);
    if ($ref === '') {
        return 0;
    }
    if (isset($cache[$ref])) {
        return $cache[$ref];
    }

    if (ctype_digit($ref)) {
        $id = (int) $ref;
        return $cache[$ref] = (get_post_type($id) === 'attachment' ? $id : 0);
    }

    $info = pathinfo($ref);
    $base = $info['filename'];
    $ext  = isset($info['extension']) ? strtolower($info['extension']) : '';
    $esc  = $wpdb->esc_like($base);

    if (in_array($ext, array('jpg', 'jpeg', 'png', 'webp', 'gif', 'avif'), true)) {
        $patterns = array('%/' . $esc . '.' . $ext, $esc . '.' . $ext, '%/' . $esc . '-scaled.' . $ext);
    } else {
        $patterns = array('%/' . $esc . '.%', $esc . '.%', '%/' . $esc . '-scaled.%');
    }

    $id = (int) $wpdb->get_var($wpdb->prepare(
        "SELECT post_id FROM {$wpdb->postmeta} WHERE meta_key = '_wp_attached_file' AND (meta_value LIKE %s OR meta_value LIKE %s OR meta_value LIKE %s) ORDER BY post_id DESC LIMIT 1",
        $patterns[0],
        $patterns[1],
        $patterns[2]
    ));

    return $cache[$ref] = $id;
}

// "A|slug > B|slug" => ID ترم نهایی (ساخت خودکار در صورت نبودن)
function echo_news_import_ensure_term_chain($taxonomy, $chain)
{
    $parent  = 0;
    $term_id = 0;

    foreach (array_filter(array_map('trim', explode('>', $chain))) as $segment) {
        $parts = array_map('trim', explode('|', $segment, 2));
        $name  = sanitize_text_field($parts[0]);
        $slug  = isset($parts[1]) ? sanitize_title($parts[1]) : '';
        if ($name === '') {
            continue;
        }

        $term = $slug ? get_term_by('slug', $slug, $taxonomy) : false;
        if (!$term) {
            $found = term_exists($name, $taxonomy, is_taxonomy_hierarchical($taxonomy) ? $parent : null);
            $term  = $found ? get_term(is_array($found) ? $found['term_id'] : $found, $taxonomy) : false;
        }

        if ($term && !is_wp_error($term)) {
            $term_id = (int) $term->term_id;
        } else {
            $args = $slug ? array('slug' => $slug) : array();
            if (is_taxonomy_hierarchical($taxonomy) && $parent) {
                $args['parent'] = $parent;
            }
            $res = wp_insert_term($name, $taxonomy, $args);
            if (is_wp_error($res)) {
                return 0;
            }
            $term_id = (int) $res['term_id'];
        }
        $parent = $term_id;
    }

    return $term_id;
}

// پرامپت موجود با همان نامک یا عنوان
function echo_news_import_find_existing($slug, $title)
{
    global $wpdb;

    if ($slug !== '') {
        $id = (int) $wpdb->get_var($wpdb->prepare(
            "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'ai_prompt' AND post_status NOT IN ('trash','auto-draft') AND post_name = %s LIMIT 1",
            sanitize_title($slug)
        ));
        if ($id) {
            return $id;
        }
    }

    return (int) $wpdb->get_var($wpdb->prepare(
        "SELECT ID FROM {$wpdb->posts} WHERE post_type = 'ai_prompt' AND post_status NOT IN ('trash','auto-draft') AND post_title = %s LIMIT 1",
        $title
    ));
}

/* ------------------------------------------------------------------
 * خواندن و اعتبارسنجی CSV
 * ------------------------------------------------------------------ */
function echo_news_import_parse_csv($path)
{
    $columns = echo_news_import_columns();
    $fh      = fopen($path, 'r');
    if (!$fh) {
        return new WP_Error('read', 'فایل خوانده نشد.');
    }

    // حذف BOM
    $bom = fread($fh, 3);
    if ($bom !== "\xEF\xBB\xBF") {
        rewind($fh);
    }

    $header = fgetcsv($fh);
    if (!$header) {
        fclose($fh);
        return new WP_Error('empty', 'فایل خالی است.');
    }
    $header = array_map(function ($h) {
        return strtolower(trim((string) $h));
    }, $header);

    foreach ($columns as $name => $info) {
        if ($info[1] && !in_array($name, $header, true)) {
            fclose($fh);
            return new WP_Error('header', 'ستون اجباری «' . $name . '» در فایل نیست.');
        }
    }

    $rows = array();
    $line = 1;
    while (($cells = fgetcsv($fh)) !== false) {
        $line++;
        if (count($cells) === 1 && trim((string) $cells[0]) === '') {
            continue; // ردیف خالی
        }
        if (count($rows) >= 500) {
            break;
        }
        $row = array();
        foreach ($header as $i => $name) {
            if (isset($columns[$name])) {
                $row[$name] = isset($cells[$i]) ? trim((string) $cells[$i]) : '';
            }
        }
        $row['_line'] = $line;
        $rows[]       = $row;
    }
    fclose($fh);

    return $rows;
}

// اعتبارسنجی یک ردیف => [errors[], warnings[]]
function echo_news_import_validate_row(array $row, array &$seen_slugs)
{
    $errors   = array();
    $warnings = array();

    $row = array_merge(array_fill_keys(array_keys(echo_news_import_columns()), ''), $row);

    if ($row['title'] === '') {
        $errors[] = 'عنوان خالی است';
    }
    if ($row['prompt'] === '') {
        $errors[] = 'پرامپت خالی است';
    }
    if (!isset(echo_news_prompt_ratios()[$row['ratio']])) {
        $errors[] = 'نسبت تصویر «' . $row['ratio'] . '» معتبر نیست';
    }
    if ($row['status'] !== '' && !in_array($row['status'], array('draft', 'publish', 'pending'), true)) {
        $errors[] = 'وضعیت «' . $row['status'] . '» معتبر نیست';
    }
    if ($row['steps'] !== '' && !ctype_digit($row['steps'])) {
        $warnings[] = 'Steps عدد صحیح نیست و نادیده گرفته می‌شود';
    }
    if ($row['guidance'] !== '' && !is_numeric($row['guidance'])) {
        $warnings[] = 'Guidance عدد نیست و نادیده گرفته می‌شود';
    }

    if ($row['slug'] === '') {
        $warnings[] = 'نامک خالی است؛ از عنوان ساخته می‌شود';
    } elseif (isset($seen_slugs[$row['slug']])) {
        $errors[] = 'نامک «' . $row['slug'] . '» در فایل تکراری است';
    } else {
        $seen_slugs[$row['slug']] = true;
    }

    if ($row['image'] === '') {
        $warnings[] = 'تصویر شاخص مشخص نشده';
    } elseif (!echo_news_import_find_attachment($row['image'])) {
        $warnings[] = 'تصویر «' . $row['image'] . '» در کتابخانه‌ی رسانه پیدا نشد';
    }
    if ($row['gallery'] !== '') {
        foreach (array_filter(array_map('trim', explode('|', $row['gallery']))) as $g) {
            if (!echo_news_import_find_attachment($g)) {
                $warnings[] = 'تصویر گالری «' . $g . '» پیدا نشد';
            }
        }
    }

    return array($errors, $warnings);
}

/* ------------------------------------------------------------------
 * ورود یک ردیف
 * ------------------------------------------------------------------ */
// خروجی: [نتیجه: created|updated|skipped|failed, post_id, پیام]
function echo_news_import_row(array $row, $mode, $batch)
{
    $row      = array_merge(array_fill_keys(array_keys(echo_news_import_columns()), ''), $row);
    $existing = echo_news_import_find_existing($row['slug'], $row['title']);

    if ($existing && $mode !== 'update') {
        return array('skipped', $existing, 'قبلاً وجود دارد');
    }

    $status = $row['status'] !== '' ? $row['status'] : 'draft';
    $post   = array(
        'post_type'    => 'ai_prompt',
        'post_title'   => sanitize_text_field($row['title']),
        'post_status'  => $status,
        'post_content' => wp_kses_post($row['content']),
        'post_excerpt' => sanitize_textarea_field($row['excerpt']),
    );
    if ($row['slug'] !== '') {
        $post['post_name'] = sanitize_title($row['slug']);
    }

    if ($existing) {
        $post['ID'] = $existing;
        $post_id    = wp_update_post(wp_slash($post), true);
    } else {
        $post['post_author'] = get_current_user_id();
        $post_id             = wp_insert_post(wp_slash($post), true);
    }
    if (is_wp_error($post_id) || !$post_id) {
        return array('failed', 0, is_wp_error($post_id) ? $post_id->get_error_message() : 'ساخت پست ناموفق بود');
    }

    // تصاویر
    $thumb_id = echo_news_import_find_attachment($row['image']);
    if ($thumb_id) {
        set_post_thumbnail($post_id, $thumb_id);
        if ($row['image_alt'] !== '' && !get_post_meta($thumb_id, '_wp_attachment_image_alt', true)) {
            update_post_meta($thumb_id, '_wp_attachment_image_alt', sanitize_text_field($row['image_alt']));
        }
    }
    $gallery = array();
    foreach (array_filter(array_map('trim', explode('|', $row['gallery']))) as $g) {
        if ($att = echo_news_import_find_attachment($g)) {
            $gallery[] = $att;
        }
    }

    // فیلدها (با همان قوانین متاباکس)
    $fields = echo_news_prompt_sanitize_meta(array(
        'prompt'     => $row['prompt'],
        'prompt_fa'  => $row['prompt_fa'],
        'negative'   => $row['negative'],
        'params'     => str_replace('|', "\n", $row['params']),
        'ratio'      => $row['ratio'],
        'version'    => $row['version'],
        'seed'       => $row['seed'],
        'steps'      => $row['steps'],
        'guidance'   => $row['guidance'],
        'resolution' => $row['resolution'],
        'gallery'    => $gallery,
    ));
    echo_news_prompt_store_meta($post_id, $fields);

    // ترم‌ها
    foreach (array('prompt_model' => 'model', 'prompt_category' => 'category') as $taxonomy => $column) {
        $ids = array();
        foreach (array_filter(array_map('trim', explode(';', $row[$column]))) as $chain) {
            if ($id = echo_news_import_ensure_term_chain($taxonomy, $chain)) {
                $ids[] = $id;
            }
        }
        if ($ids) {
            wp_set_object_terms($post_id, $ids, $taxonomy);
        }
    }

    update_post_meta($post_id, '_ep_import_batch', $batch);
    if ($row['code'] !== '') {
        update_post_meta($post_id, '_ep_import_code', sanitize_text_field($row['code']));
    }

    return array($existing ? 'updated' : 'created', $post_id, '');
}

/* ------------------------------------------------------------------
 * بازگردانی یک ورود (حذف پرامپت‌های همان دسته‌ی ورود؛ ترم‌ها و تصاویر دست‌نخورده)
 * ------------------------------------------------------------------ */
function echo_news_import_undo()
{
    if (!current_user_can('manage_options')) {
        wp_die('دسترسی غیرمجاز');
    }
    $batch = isset($_GET['batch']) ? sanitize_key(wp_unslash($_GET['batch'])) : '';
    check_admin_referer('ep_import_undo_' . $batch);

    $ids = $batch ? get_posts(array(
        'post_type'      => 'ai_prompt',
        'post_status'    => 'any',
        'posts_per_page' => -1,
        'fields'         => 'ids',
        'meta_key'       => '_ep_import_batch',
        'meta_value'     => $batch,
    )) : array();

    foreach ($ids as $id) {
        wp_delete_post($id, true);
    }

    wp_safe_redirect(add_query_arg(array('post_type' => 'ai_prompt', 'page' => 'ep-import', 'undone' => count($ids)), admin_url('edit.php')));
    exit;
}
add_action('admin_post_ep_import_undo', 'echo_news_import_undo');

/* ------------------------------------------------------------------
 * صفحه‌ی ادمین
 * ------------------------------------------------------------------ */
function echo_news_import_page()
{
    if (!current_user_can('manage_options')) {
        wp_die('دسترسی غیرمجاز');
    }

    $page_url = admin_url('edit.php?post_type=ai_prompt&page=ep-import');

    echo '<div class="wrap"><h1>ورود گروهی پرامپت</h1>';
    echo '<style>
        .ep-imp table.widefat td, .ep-imp table.widefat th { vertical-align: middle; }
        .ep-imp .ok { color:#00a32a; } .ep-imp .bad { color:#d63638; } .ep-imp .warn { color:#b26200; }
        .ep-imp img.th { width:44px; height:44px; object-fit:cover; border-radius:4px; display:block; }
        .ep-imp .box { background:#fff; border:1px solid #dcdcde; padding:16px 20px; margin:16px 0; max-width:1100px; }
        .ep-imp code { direction:ltr; unicode-bidi:embed; }
        .ep-imp .scroll { max-height:560px; overflow:auto; }
    </style><div class="ep-imp">';

    if (isset($_GET['undone'])) {
        echo '<div class="notice notice-success"><p>' . esc_html(number_format_i18n((int) $_GET['undone'])) . ' پرامپت آن ورود حذف شد.</p></div>';
    }

    $step = 'upload';

    // مرحله ۲: آپلود فایل و پیش‌نمایش
    if (isset($_POST['ep_import_upload'])) {
        check_admin_referer('ep_import_upload');

        $file = isset($_FILES['ep_csv']) ? $_FILES['ep_csv'] : null;
        if (!$file || $file['error'] !== UPLOAD_ERR_OK || strtolower(pathinfo($file['name'], PATHINFO_EXTENSION)) !== 'csv') {
            echo '<div class="notice notice-error"><p>یک فایل با پسوند .csv انتخاب کنید.</p></div>';
        } elseif ($file['size'] > 5 * MB_IN_BYTES) {
            echo '<div class="notice notice-error"><p>حجم فایل بیش از ۵ مگابایت است.</p></div>';
        } else {
            $rows = echo_news_import_parse_csv($file['tmp_name']);
            if (is_wp_error($rows)) {
                echo '<div class="notice notice-error"><p>' . esc_html($rows->get_error_message()) . '</p></div>';
            } elseif (!$rows) {
                echo '<div class="notice notice-error"><p>ردیفی در فایل پیدا نشد.</p></div>';
            } else {
                $token = wp_generate_password(20, false, false);
                set_transient('ep_import_' . $token, array('user' => get_current_user_id(), 'rows' => $rows), HOUR_IN_SECONDS);
                echo_news_import_render_preview($rows, $token, $page_url);
                $step = 'preview';
            }
        }
    }

    // مرحله ۳: ورود
    if (isset($_POST['ep_import_run'])) {
        check_admin_referer('ep_import_run');
        $token = isset($_POST['token']) ? sanitize_key(wp_unslash($_POST['token'])) : '';
        $data  = get_transient('ep_import_' . $token);

        if (!$data || (int) $data['user'] !== get_current_user_id()) {
            echo '<div class="notice notice-error"><p>نشست پیش‌نمایش منقضی شده؛ دوباره فایل را آپلود کنید.</p></div>';
        } else {
            $mode = (isset($_POST['mode']) && $_POST['mode'] === 'update') ? 'update' : 'skip';
            echo_news_import_run($data['rows'], $mode, $page_url);
            delete_transient('ep_import_' . $token);
            $step = 'done';
        }
    }

    if ($step === 'upload') {
        echo_news_import_render_upload();
    }

    echo '</div></div>';
}

function echo_news_import_render_upload()
{
    $sample = wp_nonce_url(admin_url('admin-post.php?action=ep_import_sample'), 'ep_import_sample');
    ?>
    <div class="box">
        <h2>۱) فایل CSV را آپلود کنید</h2>
        <p>قبل از شروع، تصاویر را در <strong>رسانه ← افزودن</strong> آپلود کنید و نام فایل هر تصویر را در ستون <code>image</code> بنویسید (مثلاً <code>p001</code>).</p>
        <form method="post" enctype="multipart/form-data">
            <?php wp_nonce_field('ep_import_upload'); ?>
            <input type="file" name="ep_csv" accept=".csv" required>
            <?php submit_button('بررسی و پیش‌نمایش', 'primary', 'ep_import_upload', false); ?>
            <a class="button" href="<?php echo esc_url($sample); ?>">دانلود فایل نمونه</a>
        </form>
    </div>

    <div class="box">
        <h2>ستون‌های فایل</h2>
        <p>فایل را با Excel یا Google Sheets بسازید و به‌صورت <strong>CSV (UTF-8)</strong> ذخیره کنید. ردیف اول، نام ستون‌هاست.</p>
        <table class="widefat striped">
            <thead><tr><th>ستون</th><th>توضیح</th><th>اجباری؟</th></tr></thead>
            <tbody>
            <?php foreach (echo_news_import_columns() as $name => $info) : ?>
                <tr><td><code><?php echo esc_html($name); ?></code></td><td><?php echo esc_html($info[0]); ?></td><td><?php echo $info[1] ? '<span class="bad">بله</span>' : '—'; ?></td></tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <p>مدل‌ها و دسته‌هایی که وجود نداشته باشند خودکار ساخته می‌شوند. وضعیت پیش‌فرض همه‌ی پرامپت‌ها «پیش‌نویس» است.</p>
    </div>
    <?php
}

function echo_news_import_render_preview(array $rows, $token, $page_url)
{
    $seen   = array();
    $report = array();
    $ok     = 0;
    $bad    = 0;
    $warn   = 0;
    $dups   = 0;

    foreach ($rows as $i => $row) {
        list($errors, $warnings) = echo_news_import_validate_row($row, $seen);
        $exists = !$errors ? echo_news_import_find_existing(isset($row['slug']) ? $row['slug'] : '', isset($row['title']) ? $row['title'] : '') : 0;
        if ($errors) {
            $bad++;
        } else {
            $ok++;
            $warn += $warnings ? 1 : 0;
            $dups += $exists ? 1 : 0;
        }
        $report[$i] = array($errors, $warnings, $exists);
    }
    ?>
    <div class="box">
        <h2>۲) پیش‌نمایش و اعتبارسنجی</h2>
        <p>
            <strong><?php echo esc_html(number_format_i18n(count($rows))); ?></strong> ردیف خوانده شد:
            <span class="ok"><?php echo esc_html($ok); ?> قابل ورود</span> ·
            <span class="bad"><?php echo esc_html($bad); ?> دارای خطا (وارد نمی‌شوند)</span> ·
            <span class="warn"><?php echo esc_html($warn); ?> دارای هشدار</span> ·
            <?php echo esc_html($dups); ?> تکراری (موجود در سایت)
        </p>

        <div class="scroll">
            <table class="widefat striped">
                <thead><tr><th>#</th><th>تصویر</th><th>عنوان</th><th>دسته</th><th>مدل</th><th>نسبت</th><th>وضعیت بررسی</th></tr></thead>
                <tbody>
                <?php foreach ($rows as $i => $row) :
                    list($errors, $warnings, $exists) = $report[$i];
                    $img = echo_news_import_find_attachment(isset($row['image']) ? $row['image'] : '');
                    ?>
                    <tr>
                        <td><?php echo esc_html($row['_line']); ?></td>
                        <td><?php echo $img ? '<img class="th" src="' . esc_url(wp_get_attachment_image_url($img, 'thumbnail')) . '" alt="">' : '—'; ?></td>
                        <td><?php echo esc_html(isset($row['title']) ? $row['title'] : ''); ?></td>
                        <td><?php echo esc_html(isset($row['category']) ? preg_replace('/\|[a-z0-9\-]+/i', '', $row['category']) : ''); ?></td>
                        <td><?php echo esc_html(isset($row['model']) ? preg_replace('/\|[a-z0-9\-]+/i', '', $row['model']) : ''); ?></td>
                        <td><code><?php echo esc_html(isset($row['ratio']) ? $row['ratio'] : ''); ?></code></td>
                        <td>
                            <?php if ($errors) : ?>
                                <span class="bad">✖ <?php echo esc_html(implode('، ', $errors)); ?></span>
                            <?php else : ?>
                                <span class="ok">✔</span>
                                <?php if ($exists) : ?><span class="warn"> موجود است</span><?php endif; ?>
                                <?php if ($warnings) : ?><br><span class="warn"><?php echo esc_html(implode('، ', $warnings)); ?></span><?php endif; ?>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php if ($ok) : ?>
        <div class="box">
            <h2>۳) ورود</h2>
            <form method="post">
                <?php wp_nonce_field('ep_import_run'); ?>
                <input type="hidden" name="token" value="<?php echo esc_attr($token); ?>">
                <p>
                    <label><input type="radio" name="mode" value="skip" checked> پرامپت‌های تکراری را <strong>رد کن</strong></label><br>
                    <label><input type="radio" name="mode" value="update"> پرامپت‌های تکراری را <strong>به‌روزرسانی کن</strong></label>
                </p>
                <?php submit_button('ورود ' . number_format_i18n($ok) . ' پرامپت', 'primary', 'ep_import_run', false); ?>
                <a class="button" href="<?php echo esc_url($page_url); ?>">انصراف</a>
            </form>
        </div>
    <?php endif;
}

function echo_news_import_run(array $rows, $mode, $page_url)
{
    @set_time_limit(300);

    $batch   = strtolower(wp_generate_password(10, false, false));
    $seen    = array();
    $counts  = array('created' => 0, 'updated' => 0, 'skipped' => 0, 'failed' => 0);
    $details = array();

    foreach ($rows as $row) {
        list($errors) = echo_news_import_validate_row($row, $seen);
        $title = isset($row['title']) ? $row['title'] : '';

        if ($errors) {
            $counts['failed']++;
            $details[] = array($row['_line'], $title, 'failed', implode('، ', $errors), 0);
            continue;
        }

        list($result, $post_id, $message) = echo_news_import_row($row, $mode, $batch);
        $counts[$result]++;
        $details[] = array($row['_line'], $title, $result, $message, $post_id);
    }

    $labels = array('created' => 'ساخته شد', 'updated' => 'به‌روزرسانی شد', 'skipped' => 'رد شد', 'failed' => 'ناموفق');
    $undo   = wp_nonce_url(admin_url('admin-post.php?action=ep_import_undo&batch=' . $batch), 'ep_import_undo_' . $batch);
    ?>
    <div class="box">
        <h2>۴) گزارش ورود</h2>
        <p>
            <span class="ok"><?php echo esc_html($counts['created']); ?> ساخته شد</span> ·
            <?php echo esc_html($counts['updated']); ?> به‌روزرسانی ·
            <?php echo esc_html($counts['skipped']); ?> رد شد ·
            <span class="bad"><?php echo esc_html($counts['failed']); ?> ناموفق</span>
        </p>
        <p>
            <a class="button button-primary" href="<?php echo esc_url(admin_url('edit.php?post_type=ai_prompt')); ?>">مشاهده‌ی پرامپت‌ها</a>
            <a class="button" href="<?php echo esc_url($undo); ?>" onclick="return confirm('همه‌ی پرامپت‌هایی که در همین ورود ساخته شدند حذف شوند؟ (دسته‌ها و تصاویر حذف نمی‌شوند)');">بازگردانی همین ورود (حذف پرامپت‌های ساخته‌شده)</a>
            <a class="button" href="<?php echo esc_url($page_url); ?>">ورود دیگر</a>
        </p>
        <div class="scroll">
            <table class="widefat striped">
                <thead><tr><th>ردیف</th><th>عنوان</th><th>نتیجه</th><th>توضیح</th></tr></thead>
                <tbody>
                <?php foreach ($details as $d) : ?>
                    <tr>
                        <td><?php echo esc_html($d[0]); ?></td>
                        <td><?php echo $d[4] ? '<a href="' . esc_url(get_edit_post_link($d[4])) . '">' . esc_html($d[1]) . '</a>' : esc_html($d[1]); ?></td>
                        <td class="<?php echo $d[2] === 'failed' ? 'bad' : ($d[2] === 'created' ? 'ok' : 'warn'); ?>"><?php echo esc_html($labels[$d[2]]); ?></td>
                        <td><?php echo esc_html($d[3]); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
}
