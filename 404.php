<?php get_header() ?>

<main class="echo-404-page">
    <section class="echo-404-area" aria-labelledby="echo-404-title">
        <div class="echo-container">
            <div class="echo-error-content">
                <div class="echo-error-copy">
                    <span class="echo-error-kicker"><i class="fa-solid fa-newspaper"></i> خبر در این صفحه نیست</span>
                    <div class="echo-error-heading">
                        <span class="echo-error-number">4</span><span class="echo-error-number">0</span><span class="echo-error-number echo-error-number-accent">4</span>
                    </div>
                    <div class="echo-error-sub-heading">
                        <h1 id="echo-404-title">صفحه‌ای که دنبالش بودید پیدا نشد</h1>
                    </div>
                    <div class="echo-error-pera">
                        <p>ممکن است خبر جابه‌جا شده باشد یا آدرس را اشتباه وارد کرده باشید. از جست‌وجو شروع کنید یا به خانه برگردید.</p>
                    </div>
                    <div class="echo-error-actions">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="echo-error-home"><i class="fa-solid fa-arrow-right"></i> بازگشت به صفحه اصلی</a>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="echo-error-all-news">مشاهده تازه‌ترین خبرها <i class="fa-solid fa-arrow-left"></i></a>
                    </div>
                </div>
                <div class="echo-error-search">
                    <span>دنبال چه چیزی می‌گردید؟</span>
                    <?php get_search_form(); ?>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer() ?>