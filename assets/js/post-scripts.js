// table of the content
// ساخت فهرست مطالب از تیترهای متن مقاله (فقط جاوااسکریپت ساده، بدون کتابخانه)
document.addEventListener("DOMContentLoaded", function () {
    const postContent = document.querySelector('.post-content');
    const toc = document.getElementById('table-of-contents');
    const tocList = document.getElementById('toc-list');
    if (!postContent || !toc || !tocList) {
        return;
    }

    const headings = postContent.querySelectorAll('h2, h3, h4, h5, h6');
    if (headings.length === 0) {
        toc.style.display = 'none';
        return;
    }

    // عمق تیترها نسبت به بالاترین سطح موجود (اگر مقاله h2 ندارد، h3 سطح اول می‌شود)
    let minLevel = 6;
    headings.forEach(function (heading) {
        minLevel = Math.min(minLevel, parseInt(heading.tagName.slice(1), 10));
    });

    const items = [];

    headings.forEach(function (heading, index) {
        const id = heading.id || `heading-${index}`;
        heading.id = id;

        const depth = parseInt(heading.tagName.slice(1), 10) - minLevel;

        const li = document.createElement('li');
        li.className = `toc-depth-${depth}`;

        const link = document.createElement('a');
        link.href = `#${id}`; // لازم برای دسترسی بهتر
        link.textContent = heading.textContent.trim();

        // جلوگیری از نمایش ID در URL
        link.addEventListener('click', function (event) {
            event.preventDefault();
            heading.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        });

        li.appendChild(link);
        tocList.appendChild(li);
        items.push({ heading: heading, li: li });
    });

    // تعداد بخش‌ها کنار عنوان فهرست
    const summary = toc.querySelector('summary');
    if (summary) {
        const count = document.createElement('span');
        count.className = 'toc-count';
        count.textContent = `${headings.length.toLocaleString('fa-IR')} بخش`;
        summary.appendChild(count);
    }

    // هایلایت بخشی که الان در حال خواندن آن هستید (وقتی فهرست باز است دیده می‌شود)
    if ('IntersectionObserver' in window) {
        let activeLi = null;
        const observer = new IntersectionObserver(function (entries) {
            entries.forEach(function (entry) {
                if (!entry.isIntersecting) {
                    return;
                }
                const item = items.find(function (i) { return i.heading === entry.target; });
                if (!item) {
                    return;
                }
                if (activeLi) {
                    activeLi.classList.remove('is-active');
                }
                activeLi = item.li;
                activeLi.classList.add('is-active');
            });
        }, { rootMargin: '-15% 0px -75% 0px' }); // فقط تیترهایی که نزدیک بالای صفحه‌اند

        items.forEach(function (i) { observer.observe(i.heading); });
    }
});
// table of the content
