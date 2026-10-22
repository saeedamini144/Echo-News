/*
 * سایدبار چسبان (سینگل پست و سینگل پرامپت) بدون اسکرول داخلی
 *
 * - سایدبار کوتاه‌تر از صفحه: به فاصله‌ی TOP_MAX از بالا می‌چسبد.
 * - سایدبار بلندتر از صفحه: با اسکرول بالا می‌رود تا «پایین» آن دیده شود و بعد از پایین می‌چسبد
 *   (top منفی)، پس همه‌ی محتوایش بدون اسکرول داخلی قابل‌دیدن است.
 * فقط از ۹۹۲ پیکسل به بالا (زیر آن سایدبار زیر محتوا می‌آید).
 */
(function () {
    'use strict';

    var el = document.querySelector('.sticky-coloum-item');
    if (!el) { return; }

    var TOP_MAX = 100; // فاصله از بالا برای سایدبار کوتاه
    var GAP = 20;      // فاصله از پایین برای سایدبار بلند
    var desktop = window.matchMedia('(min-width: 992px)');

    function update() {
        if (!desktop.matches) {
            el.style.top = '';
            return;
        }
        var top = Math.min(TOP_MAX, window.innerHeight - el.offsetHeight - GAP);
        el.style.top = top + 'px';
    }

    update();
    window.addEventListener('resize', update);
    window.addEventListener('load', update);

    // محتوای سایدبار (تصاویر، ویجت‌ها) بعداً لود می‌شود و ارتفاع عوض می‌شود
    if (window.ResizeObserver) {
        new ResizeObserver(update).observe(el);
    }
})();
