/* گالری پرامپت: کپی، تب‌ها، نمایش کامل، تصاویر variant و لایت‌باکس */
(function () {
    'use strict';

    var cfg = window.echoNewsPrompt || {};

    function $(s, c) { return (c || document).querySelector(s); }
    function $$(s, c) { return Array.prototype.slice.call((c || document).querySelectorAll(s)); }

    /* ---------- toast ---------- */
    var toastEl, toastTimer;
    function toast(msg) {
        if (!toastEl) {
            toastEl = document.createElement('div');
            toastEl.className = 'ep-toast';
            toastEl.setAttribute('role', 'status');
            document.body.appendChild(toastEl);
        }
        toastEl.textContent = msg;
        toastEl.classList.add('is-show');
        clearTimeout(toastTimer);
        toastTimer = setTimeout(function () { toastEl.classList.remove('is-show'); }, 1800);
    }

    /* ---------- کپی ---------- */
    function writeClipboard(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        }
        return new Promise(function (resolve) {
            var ta = document.createElement('textarea');
            ta.value = text;
            ta.style.position = 'fixed';
            ta.style.opacity = '0';
            document.body.appendChild(ta);
            ta.select();
            try { document.execCommand('copy'); } catch (e) { /* ignore */ }
            ta.remove();
            resolve();
        });
    }

    // شمارنده کپی در سرور (بی‌صدا؛ خطا مهم نیست)
    function countCopy(postId) {
        if (!postId || !cfg.ajaxUrl || !window.fetch) { return; }
        var body = new URLSearchParams({ action: 'echo_news_prompt_copied', id: postId });
        fetch(cfg.ajaxUrl, { method: 'POST', body: body, credentials: 'same-origin' }).catch(function () { });
    }

    function flashButton(btn) {
        var icon = btn.querySelector('i');
        var span = btn.querySelector('span');
        var iconClass = icon ? icon.className : '';
        var label = span ? span.textContent : '';
        btn.classList.add('is-done');
        if (icon) { icon.className = 'fa-light fa-check'; }
        if (span) { span.textContent = 'کپی شد'; }
        setTimeout(function () {
            btn.classList.remove('is-done');
            if (icon) { icon.className = iconClass; }
            if (span) { span.textContent = label; }
        }, 1600);
    }

    // متنی که هر دکمه کپی می‌کند
    function textFor(btn) {
        // کارت و ردیف فشرده: متن کامل پرامپت روی خود دکمه
        if (btn.hasAttribute('data-copy-text')) { return btn.getAttribute('data-copy-text'); }

        var kind = btn.getAttribute('data-copy');
        if (kind === 'neg') {
            var neg = $('#epNeg');
            return neg ? neg.textContent.trim() : '';
        }
        if (kind === 'params') {
            return $$('.ep-param').map(function (p) { return p.textContent.trim(); }).join(' ');
        }
        // main: پرامپت تب فعال + پارامترها (فقط نسخه انگلیسی)
        var active = $('.ep-prompt__text:not([hidden])');
        if (!active) { return ''; }
        var text = active.textContent.trim();
        if (active.getAttribute('dir') === 'ltr') {
            var params = $$('.ep-param').map(function (p) { return p.textContent.trim(); }).join(' ');
            if (params) { text += ' ' + params; }
        }
        return text;
    }

    document.addEventListener('click', function (e) {
        var btn = e.target.closest('[data-copy], [data-copy-text]');
        if (!btn) { return; }
        e.preventDefault();

        var text = textFor(btn);
        if (!text) { return; }

        writeClipboard(text).then(function () {
            toast(cfg.copied || 'کپی شد ✓');
            if (btn.classList.contains('ep-card__copy')) {
                var icon = btn.querySelector('i');
                var cls = icon.className;
                btn.classList.add('is-done');
                icon.className = 'fa-light fa-check';
                setTimeout(function () { btn.classList.remove('is-done'); icon.className = cls; }, 1500);
            } else if (btn.getAttribute('data-copy') === 'main') {
                // دکمه بالای کارت و دکمه نوار موبایل هر دو فلش شوند
                $$('[data-copy="main"]').forEach(flashButton);
            } else {
                flashButton(btn);
            }
            // فقط کپی اصلی و کارت‌ها به شمارنده اضافه می‌شوند، نه Negative و پارامتر
            var kind = btn.getAttribute('data-copy');
            if (kind === 'neg' || kind === 'params') { return; }
            countCopy(btn.getAttribute('data-post-id'));
        });
    });

    /* ---------- تب English / فارسی ---------- */
    $$('.ep-tabs button').forEach(function (tab) {
        tab.addEventListener('click', function () {
            var lang = tab.getAttribute('data-lang');
            $$('.ep-tabs button').forEach(function (b) {
                var on = b === tab;
                b.classList.toggle('is-active', on);
                b.setAttribute('aria-selected', on ? 'true' : 'false');
            });
            $$('.ep-prompt__text').forEach(function (p) {
                p.hidden = p.getAttribute('data-lang') !== lang;
                p.classList.remove('is-open');
            });
            checkOverflow();
        });
    });

    /* ---------- نمایش کامل پرامپت طولانی ---------- */
    var body = $('#epPromptBody');
    var moreBtn = $('#epMore');

    function checkOverflow() {
        var el = $('.ep-prompt__text:not([hidden])');
        if (!body || !el) { return; }
        body.classList.toggle('no-overflow', el.scrollHeight <= el.clientHeight + 4);
        if (moreBtn) { moreBtn.innerHTML = 'نمایش کامل پرامپت <i class="fa-light fa-chevron-down"></i>'; }
    }
    checkOverflow();
    window.addEventListener('load', checkOverflow);

    if (moreBtn) {
        moreBtn.addEventListener('click', function () {
            var el = $('.ep-prompt__text:not([hidden])');
            var open = el.classList.toggle('is-open');
            moreBtn.innerHTML = open
                ? 'بستن <i class="fa-light fa-chevron-down" style="transform:rotate(180deg)"></i>'
                : 'نمایش کامل پرامپت <i class="fa-light fa-chevron-down"></i>';
        });
    }

    /* ---------- تصاویر variant ---------- */
    var mainImg = $('#epMainImg');
    var stageBg = $('#epStageBg');

    $$('.ep-variants button').forEach(function (btn) {
        btn.addEventListener('click', function () {
            if (!mainImg) { return; }
            $$('.ep-variants button').forEach(function (b) { b.classList.remove('is-active'); });
            btn.classList.add('is-active');

            mainImg.removeAttribute('srcset');
            mainImg.removeAttribute('sizes');
            mainImg.src = btn.getAttribute('data-large');
            mainImg.setAttribute('data-full', btn.getAttribute('data-full'));
            if (stageBg) { stageBg.style.backgroundImage = 'url("' + btn.getAttribute('data-thumb') + '")'; }
        });
    });

    /* ---------- لایت‌باکس ---------- */
    var lb = $('#epLightbox');
    if (lb && mainImg) {
        var lbImg = $('img', lb);
        var open = function () {
            lbImg.src = mainImg.getAttribute('data-full') || mainImg.currentSrc || mainImg.src;
            lbImg.alt = mainImg.alt;
            lb.classList.add('is-open');
        };
        var close = function () { lb.classList.remove('is-open'); };

        mainImg.addEventListener('click', open);
        var zoom = $('#epZoom');
        if (zoom) { zoom.addEventListener('click', open); }
        lb.addEventListener('click', close);
        document.addEventListener('keydown', function (e) { if (e.key === 'Escape') { close(); } });
    }
})();
