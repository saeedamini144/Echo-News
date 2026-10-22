/* ثبت نظر با AJAX و نمایش اعلان (موفقیت / خطا) بالای فرم */
(function () {
    'use strict';

    var cfg = window.echoNewsComment || {};
    var form = document.getElementById('commentform');
    if (!form || !cfg.ajaxUrl || !window.fetch) { return; } // بدون JS یا fetch: ارسال عادی وردپرس

    var button = form.querySelector('[type="submit"]');

    // جعبه‌ی اعلان، دقیقاً بالای فرم
    var box = document.createElement('div');
    box.className = 'comment-notice';
    box.setAttribute('role', 'alert');
    box.setAttribute('aria-live', 'polite');
    box.hidden = true;
    form.parentNode.insertBefore(box, form);

    // با JS فعال، اعتبارسنجی را خودمان انجام می‌دهیم (بدون JS همان required مرورگر کار می‌کند)
    form.noValidate = true;

    var FIELD_MESSAGES = {
        author: 'لطفاً نام خود را وارد کنید.',
        email: 'لطفاً یک ایمیل معتبر وارد کنید.',
        comment: 'لطفاً متن نظر خود را بنویسید.'
    };
    var ICONS = { success: 'fa-circle-check', error: 'fa-circle-exclamation', info: 'fa-hourglass-half' };

    function notify(type, message, link) {
        box.className = 'comment-notice is-' + type;
        box.textContent = '';

        var icon = document.createElement('i');
        icon.className = 'fa-regular ' + (ICONS[type] || ICONS.info);
        box.appendChild(icon);

        var text = document.createElement('span');
        text.textContent = message;
        box.appendChild(text);

        if (link) {
            var a = document.createElement('a');
            a.href = link;
            a.textContent = 'مشاهده‌ی نظر';
            box.appendChild(a);
        }

        box.hidden = false;
        box.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    function setBusy(busy) {
        if (!button) { return; }
        if (busy) {
            button.dataset.label = button.textContent;
            button.textContent = 'در حال ارسال…';
        } else if (button.dataset.label) {
            button.textContent = button.dataset.label;
        }
        button.disabled = busy;
    }

    form.addEventListener('submit', function (e) {
        e.preventDefault();

        // امتیاز: پیام فارسی در اعلان (به‌جای حباب مرورگر روی رادیوی نامرئی)
        if (form.querySelector('input[name="rating"]') && !form.querySelector('input[name="rating"]:checked')) {
            notify('error', 'لطفاً امتیاز خود را (۱ تا ۵ ستاره) انتخاب کنید.');
            return;
        }

        // بقیه‌ی فیلدهای الزامی: همان اعلان یکدست (به‌جای حباب انگلیسی/ناهماهنگ مرورگر)
        if (!form.checkValidity()) {
            var bad = form.querySelector(':invalid');
            var name = bad ? bad.getAttribute('name') : '';
            notify('error', FIELD_MESSAGES[name] || 'لطفاً همه‌ی فیلدهای الزامی را کامل کنید.');
            if (bad) { bad.focus(); }
            return;
        }

        var data = new FormData(form);
        data.append('action', 'echo_news_submit_comment');

        setBusy(true);
        fetch(cfg.ajaxUrl, { method: 'POST', body: data, credentials: 'same-origin' })
            .then(function (res) { return res.json(); })
            .then(function (res) {
                if (res && res.success) {
                    notify(res.data.approved ? 'success' : 'info', res.data.message, res.data.comment_url);
                    form.reset();
                    // حلقه‌ی فوکوس روی ستاره‌ی آخر بعد از ارسال باقی نماند
                    if (document.activeElement && form.contains(document.activeElement)) { document.activeElement.blur(); }
                } else {
                    notify('error', (res && res.data && res.data.message) || 'ثبت نظر انجام نشد. دوباره تلاش کنید.');
                }
            })
            .catch(function () {
                notify('error', 'ارتباط با سرور برقرار نشد. اینترنت خود را بررسی کنید و دوباره تلاش کنید.');
            })
            .then(function () { setBusy(false); });
    });
})();
