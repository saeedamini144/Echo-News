<?php

/**
 * قالب صفحه تکی «گالری پرامپت» (ai_prompt)
 * پیش‌نمایش طراحی: single-ai_prompt.html
 * فیلدها: inc/prompt-metabox.php (echo_news_get_prompt_data)
 * استایل: assets/css/prompt.css | اسکریپت: assets/js/prompt.js
 */

get_header();

while (have_posts()) :
    the_post();

    $post_id  = get_the_ID();
    $title    = get_the_title();
    $d        = echo_news_get_prompt_data($post_id);
    $model    = echo_news_first_term($post_id, 'prompt_model');
    $cat      = echo_news_first_term($post_id, 'prompt_category');
    $views    = (int) get_post_meta($post_id, 'post_views_count', true);
    $ratio    = $d['ratio'];
    $alt      = echo_news_prompt_image_alt($post_id);

    // «Midjourney v6.1»
    $model_label = $model ? trim($model->name . ' ' . $d['version']) : '';

    // مشخصات: [برچسب, مقدار, آیکون, مقدار LTR؟, لینک]
    $specs = array();
    if ($model) {
        $specs[] = array('مدل', $model->name, 'cube', false, get_term_link($model));
    }
    if ($d['version'] !== '') {
        $specs[] = array('نسخه', $d['version'], 'layer-group', true, '');
    }
    if ($ratio !== '') {
        $specs[] = array('نسبت تصویر', $ratio, 'ruler-combined', true, '');
    }
    if ($d['seed'] !== '') {
        $specs[] = array('Seed', $d['seed'], 'hashtag', true, '');
    }
    if ($d['steps'] !== '') {
        $specs[] = array('Steps', $d['steps'], 'sliders', true, '');
    }
    if ($d['guidance'] !== '') {
        $specs[] = array('CFG / Guidance', $d['guidance'], 'sliders', true, '');
    }
    if ($d['resolution'] !== '') {
        $specs[] = array('رزولوشن', $d['resolution'], 'image', true, '');
    }

    $tool = $model ? $model->name : 'ابزار تولید تصویر';

    // پرامپت «ویرایش عکس» (دسته‌ی photo-editing یا زیرمجموعه‌اش): کاربر اول باید عکس ورودی بدهد
    $is_edit = false;
    if ($cat) {
        foreach (array_merge(array($cat->term_id), get_ancestors($cat->term_id, 'prompt_category', 'taxonomy')) as $term_id) {
            $t = get_term($term_id, 'prompt_category');
            if ($t && !is_wp_error($t) && $t->slug === 'photo-editing') {
                $is_edit = true;
                break;
            }
        }
    }
    $has_content = trim(wp_strip_all_tags(get_the_content())) !== '';
?>

    <div class="innerpage ep">

        <!-- breadcrumb -->
        <div class="echo-breadcrumb-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-inner text-center">
                            <div class="meta">
                                <?php breadcrumb(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- breadcrumb end -->

        <section class="echo-hero-section inner inner-post inner-post-2">
            <div class="echo-hero">
                <div class="container">
                    <div class="echo-full-hero-content">
                        <div class="row gx-5 sticky-coloum-wrap">

                            <!-- ============ ستون اصلی ============ -->
                            <div class="col-xl-8 col-lg-8">
                                <article class="echo-hero-baner">

                                    <!-- دسته، مدل، نسبت -->
                                    <div class="ep-chips">
                                        <?php if ($cat) : ?>
                                            <span class="content-catagory-tag"><a href="<?php echo esc_url(get_term_link($cat)); ?>" style="color:inherit"><?php echo esc_html($cat->name); ?></a></span>
                                        <?php endif; ?>
                                        <?php if ($model) : ?>
                                            <a class="ep-chip is-model" href="<?php echo esc_url(get_term_link($model)); ?>"><i class="fa-light fa-wand-magic-sparkles"></i><?php echo esc_html($model->name); ?></a>
                                        <?php endif; ?>
                                        <?php if ($ratio) : ?>
                                            <span class="ep-chip"><i class="fa-light fa-ruler-combined"></i> <?php echo esc_html($ratio); ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <h1 class="echo-hero-title text-capitalize font-weight-bold"><?php echo esc_html($title); ?></h1>

                                    <!-- meta -->
                                    <div class="echo-hero-area-titlepost-post-like-comment-share">
                                        <div class="echo-hero-area-like-read-comment-share"><span><i class="fa-light fa-calendar"></i> <?php show_date(); ?></span></div>
                                        <div class="echo-hero-area-like-read-comment-share"><span><i class="fa-light fa-eye"></i> <?php echo esc_html(number_format_i18n($views)); ?> بازدید</span></div>
                                        <?php if ($d['copies'] > 0) : ?>
                                            <div class="echo-hero-area-like-read-comment-share"><span><i class="fa-light fa-copy"></i> <span id="epCopies"><?php echo esc_html(number_format_i18n($d['copies'])); ?></span> بار کپی شد</span></div>
                                        <?php endif; ?>
                                    </div>

                                    <?php if (has_excerpt()) : ?>
                                        <p class="ep-lead"><?php echo esc_html(get_the_excerpt()); ?></p>
                                    <?php endif; ?>

                                    <!-- ===== تصویر ===== -->
                                    <?php if (has_post_thumbnail()) : ?>
                                        <figure class="ep-stage" id="epStage">
                                            <div class="ep-stage__bg" id="epStageBg" style="background-image:url('<?php echo esc_url(get_the_post_thumbnail_url($post_id, 'thumbnail')); ?>')"></div>
                                            <div class="ep-stage__frame">
                                                <?php
                                                the_post_thumbnail('large', array(
                                                    'class'         => 'ep-stage__img',
                                                    'id'            => 'epMainImg',
                                                    'alt'           => $alt,
                                                    'loading'       => 'eager',
                                                    'fetchpriority' => 'high',
                                                    'decoding'      => 'async',
                                                    'data-full'     => get_the_post_thumbnail_url($post_id, 'full'),
                                                ));
                                                ?>
                                            </div>
                                            <?php if ($model_label || $ratio) : ?>
                                                <div class="ep-stage__badges">
                                                    <?php if ($model_label) : ?><span class="ep-badge"><?php echo esc_html($model_label); ?></span><?php endif; ?>
                                                    <?php if ($ratio) : ?><span class="ep-badge"><?php echo esc_html($ratio); ?></span><?php endif; ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="ep-stage__actions">
                                                <button class="ep-icon-btn" id="epZoom" type="button" aria-label="نمایش تصویر بزرگ" title="نمایش بزرگ"><i class="fa-light fa-expand"></i></button>
                                            </div>
                                        </figure>

                                        <?php if ($model_label) : ?>
                                            <p class="ep-caption">
                                                تصویر ساخته‌شده با <?php echo esc_html($model_label); ?> و پرامپت زیر<?php echo $ratio ? '؛ نسبت ' . esc_html($ratio) : ''; ?>.
                                            </p>
                                        <?php endif; ?>

                                        <?php if ($d['gallery']) : ?>
                                            <div class="ep-variants" aria-label="نتیجه‌های دیگر این پرامپت">
                                                <?php
                                                // اول خود تصویر شاخص، بعد بقیه
                                                $variant_ids = array_merge(array(get_post_thumbnail_id($post_id)), $d['gallery']);
                                                foreach ($variant_ids as $i => $img_id) :
                                                ?>
                                                    <button type="button" class="<?php echo $i === 0 ? 'is-active' : ''; ?>"
                                                        aria-label="<?php echo esc_attr('نتیجه ' . ($i + 1)); ?>"
                                                        data-large="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'large')); ?>"
                                                        data-full="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'full')); ?>"
                                                        data-thumb="<?php echo esc_url(wp_get_attachment_image_url($img_id, 'thumbnail')); ?>">
                                                        <?php echo wp_get_attachment_image($img_id, 'thumbnail', false, array('alt' => '', 'loading' => 'lazy')); ?>
                                                    </button>
                                                <?php endforeach; ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php endif; ?>

                                    <!-- ===== پرامپت ===== -->
                                    <?php if ($d['prompt'] !== '') : ?>
                                        <section class="ep-block" id="prompt">
                                            <h2 class="ep-section-title"><i class="fa-light fa-wand-magic-sparkles"></i> پرامپت آماده کپی</h2>

                                            <div class="ep-prompt">
                                                <div class="ep-prompt__head">
                                                    <?php if ($d['prompt_fa'] !== '') : ?>
                                                        <div class="ep-tabs" role="tablist">
                                                            <button class="is-active" type="button" data-lang="en" role="tab" aria-selected="true">English</button>
                                                            <button type="button" data-lang="fa" role="tab" aria-selected="false">ترجمه فارسی</button>
                                                        </div>
                                                    <?php else : ?>
                                                        <strong>English</strong>
                                                    <?php endif; ?>
                                                    <button class="ep-btn" type="button" data-copy="main" data-post-id="<?php echo esc_attr($post_id); ?>"><i class="fa-light fa-copy"></i><span>کپی پرامپت</span></button>
                                                </div>

                                                <div class="ep-prompt__body" id="epPromptBody">
                                                    <p class="ep-prompt__text" dir="ltr" lang="en" data-lang="en"><?php echo echo_news_prompt_highlight($d['prompt']); ?></p>
                                                    <?php if ($d['prompt_fa'] !== '') : ?>
                                                        <p class="ep-prompt__text" dir="rtl" lang="fa" data-lang="fa" hidden><?php echo echo_news_prompt_highlight($d['prompt_fa']); ?></p>
                                                    <?php endif; ?>
                                                    <div class="ep-fade"></div>
                                                    <div class="ep-expand"><button type="button" id="epMore">نمایش کامل پرامپت <i class="fa-light fa-chevron-down"></i></button></div>
                                                </div>

                                                <?php if ($d['params']) : ?>
                                                    <div class="ep-params">
                                                        <span class="ep-params__label">پارامترها:</span>
                                                        <?php foreach ($d['params'] as $param) : ?>
                                                            <span class="ep-param"><?php echo esc_html($param); ?></span>
                                                        <?php endforeach; ?>
                                                        <button class="ep-btn is-ghost is-sm" type="button" data-copy="params"><i class="fa-light fa-copy"></i> کپی پارامترها</button>
                                                    </div>
                                                <?php endif; ?>

                                                <?php if ($d['negative'] !== '') : ?>
                                                    <details class="ep-negative">
                                                        <summary><i class="fa-light fa-ban"></i> Negative Prompt <small style="font-weight:400;color:var(--ep-muted)">(چه چیزی نباشد)</small><i class="fa-light fa-chevron-down ep-caret"></i></summary>
                                                        <div class="ep-negative__body">
                                                            <p id="epNeg"><?php echo esc_html($d['negative']); ?></p>
                                                            <button class="ep-btn is-ghost is-sm" type="button" data-copy="neg"><i class="fa-light fa-copy"></i> کپی</button>
                                                        </div>
                                                    </details>
                                                <?php endif; ?>
                                            </div>
                                        </section>
                                    <?php endif; ?>

                                    <!-- ===== مشخصات ===== -->
                                    <?php if ($specs) : ?>
                                        <section class="ep-block">
                                            <h2 class="ep-section-title"><i class="fa-light fa-sliders"></i> مشخصات تولید تصویر</h2>
                                            <dl class="ep-specs">
                                                <?php foreach ($specs as $spec) : ?>
                                                    <div class="ep-spec">
                                                        <dt><i class="fa-light fa-<?php echo esc_attr($spec[2]); ?>"></i><?php echo esc_html($spec[0]); ?></dt>
                                                        <dd<?php echo $spec[3] ? ' class="is-ltr"' : ''; ?>>
                                                            <?php if ($spec[4] && !is_wp_error($spec[4])) : ?>
                                                                <a href="<?php echo esc_url($spec[4]); ?>"><?php echo esc_html($spec[1]); ?></a>
                                                            <?php else : ?>
                                                                <?php echo esc_html($spec[1]); ?>
                                                            <?php endif; ?>
                                                            </dd>
                                                    </div>
                                                <?php endforeach; ?>
                                            </dl>
                                        </section>
                                    <?php endif; ?>

                                    <!-- ===== روش استفاده ===== -->
                                    <?php if ($d['prompt'] !== '') : ?>
                                        <section class="ep-block">
                                            <h2 class="ep-section-title"><i class="fa-light fa-bolt"></i> چطور از این پرامپت استفاده کنم؟</h2>
                                            <ol class="ep-steps">
                                                <?php if ($is_edit) : ?>
                                                    <li>یک عکس مناسب را (طبق بخش «عکس ورودی مناسب» پایین همین صفحه) در <b><?php echo esc_html($tool); ?></b> آپلود کنید.</li>
                                                <?php else : ?>
                                                    <li>پرامپت را با دکمه «کپی پرامپت» کپی کنید<?php echo preg_match('/\[[^\]]+\]/', $d['prompt']) ? ('؛ بخش‌های رنگی داخل [ ] را با موضوع خودتان عوض کنید') : ''; ?>.</li>
                                                <?php endif; ?>
                                                <li>
                                                    <?php if ($is_edit) : ?>
                                                        پرامپت را با دکمه‌ی «کپی پرامپت» کپی کنید و زیر همان عکس در <b><?php echo esc_html($tool); ?></b> بفرستید.
                                                    <?php elseif ($d['params']) : ?>
                                                        پارامترها را کنار پرامپت در <b><?php echo esc_html($tool); ?></b> وارد کنید.
                                                    <?php else : ?>
                                                        پرامپت را در <b><?php echo esc_html($tool); ?></b> وارد کنید.
                                                    <?php endif; ?>
                                                </li>
                                                <li>
                                                    <?php if ($d['seed'] !== '') : ?>
                                                        اگر نتیجه دقیقاً شبیه نمونه نشد، چند بار تولید کنید یا seed را ثابت نگه دارید.
                                                    <?php else : ?>
                                                        اگر نتیجه دقیقاً شبیه نمونه نشد، چند بار تولید کنید و جزئیات پرامپت را کمی تغییر دهید.
                                                    <?php endif; ?>
                                                </li>
                                            </ol>
                                        </section>
                                    <?php endif; ?>

                                    <!-- ===== توضیح یکتا (the_content) ===== -->
                                    <?php if ($has_content) : ?>
                                        <section class="ep-block">
                                            <div class="ep-content post-content">
                                                <?php the_content(); ?>
                                            </div>
                                        </section>
                                    <?php endif; ?>

                                    <!-- نویسنده -->
                                    <div class="echo-author-area" style="margin-top:32px">
                                        <div class="image-area">
                                            <img src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>" alt="<?php echo esc_attr(get_the_author()); ?>">
                                        </div>
                                        <div class="content">
                                            <p class="title"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php the_author(); ?></a></p>
                                            <p class="desc"><?php the_author_meta('description'); ?></p>
                                        </div>
                                    </div>

                                    <!-- ===== پرامپت‌های مشابه ===== -->
                                    <?php
                                    $related = echo_news_get_related_prompts($post_id, 6);
                                    if ($related->have_posts()) :
                                    ?>
                                        <section class="ep-block">
                                            <h2 class="ep-section-title"><i class="fa-light fa-images"></i> پرامپت‌های مشابه</h2>
                                            <div class="ep-grid">
                                                <?php
                                                while ($related->have_posts()) {
                                                    $related->the_post();
                                                    get_template_part('template-parts/prompt-card');
                                                }
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                        </section>
                                    <?php endif; ?>

                                    <!-- نظرات -->
                                    <?php
                                    if (comments_open() || get_comments_number()) {
                                        comments_template('/comments.php');
                                    }
                                    ?>

                                </article>
                            </div>

                            <!-- ============ سایدبار ============ -->
                            <aside class="col-xl-4 col-lg-4 sticky-coloum-item">
                                <div class="ep-side">

                                    <?php
                                    $models = get_terms(array('taxonomy' => 'prompt_model', 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 8));
                                    if (!empty($models) && !is_wp_error($models)) :
                                    ?>
                                        <div class="ep-widget">
                                            <h3>مرور بر اساس مدل</h3>
                                            <ul class="ep-list">
                                                <?php foreach ($models as $term) : ?>
                                                    <li><a href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?> <small><?php echo esc_html(number_format_i18n($term->count)); ?></small></a></li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    $cats = get_terms(array('taxonomy' => 'prompt_category', 'hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 12));
                                    if (!empty($cats) && !is_wp_error($cats)) :
                                    ?>
                                        <div class="ep-widget">
                                            <h3>دسته‌بندی‌ها</h3>
                                            <div class="ep-tags" style="margin:0">
                                                <?php foreach ($cats as $term) : ?>
                                                    <a class="ep-chip" href="<?php echo esc_url(get_term_link($term)); ?>"><?php echo esc_html($term->name); ?></a>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    $popular = echo_news_get_popular_prompts(4, $post_id);
                                    if ($popular->have_posts()) :
                                    ?>
                                        <div class="ep-widget">
                                            <h3>محبوب‌ترین پرامپت‌ها</h3>
                                            <div class="ep-popular">
                                                <?php
                                                while ($popular->have_posts()) {
                                                    $popular->the_post();
                                                    get_template_part('template-parts/prompt-row');
                                                }
                                                wp_reset_postdata();
                                                ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    // بنر تبلیغاتی (همان تنظیمات سایدبار وبلاگ)
                                    $banner = get_theme_mod('blog_sidebar_advertisement_banner_settings');
                                    if ($banner) :
                                        $rel = get_theme_mod('blog_sidebar_advertisement_banner_nofollow_settings', true) ? 'follow' : 'nofollow';
                                    ?>
                                        <div class="echo-ct-1-add">
                                            <div class="echo-ct-add-img">
                                                <a class="blog-sidebar-advertisement-banner" rel="<?php echo esc_attr($rel); ?>" href="<?php echo esc_url(get_theme_mod('blog_sidebar_advertisement_banner_link_settings')); ?>">
                                                    <img src="<?php echo esc_url($banner); ?>" alt="<?php echo esc_attr(get_theme_mod('blog_sidebar_advertisement_banner_alt_title_settings')); ?>">
                                                </a>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </aside>

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- نوار چسبان موبایل: کپی سریع بدون اسکرول -->
        <?php if ($d['prompt'] !== '') : ?>
            <div class="ep-mbar">
                <button class="ep-btn" type="button" data-copy="main" data-post-id="<?php echo esc_attr($post_id); ?>"><i class="fa-light fa-copy"></i> <span>کپی پرامپت</span></button>
                <a class="ep-btn is-ghost" href="#prompt" aria-label="رفتن به پرامپت"><i class="fa-light fa-arrow-down"></i></a>
            </div>
        <?php endif; ?>
    </div>

    <!-- لایت‌باکس تصویر -->
    <div class="ep-lb" id="epLightbox"><button class="ep-icon-btn" type="button" aria-label="بستن"><i class="fa-light fa-xmark"></i></button><img alt=""></div>

<?php
endwhile;

get_footer();
