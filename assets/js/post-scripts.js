// table of the content
document.addEventListener("DOMContentLoaded", function () {
    const postContent = document.querySelector('.post-content');
    const tocList = document.getElementById('toc-list');
    const headings = postContent.querySelectorAll('h2, h3, h4, h5, h6');

    if (headings.length > 0) {
        headings.forEach((heading, index) => {
            const id = `heading-${index}`;
            heading.id = id;

            const li = document.createElement('li');
            // تنظیم فاصله به‌طور داینامیک براساس سطح هدینگ
            li.style.marginLeft = `${(parseInt(heading.tagName.slice(1)) - 2) * 20}px`;

            const link = document.createElement('a');
            link.href = `#${id}`; // لازم برای دسترسی بهتر
            link.textContent = heading.textContent;

            // جلوگیری از نمایش ID در URL
            link.addEventListener('click', function (event) {
                event.preventDefault();
                document.getElementById(id).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            });

            li.appendChild(link);
            tocList.appendChild(li);
        });
    } else {
        document.getElementById('table-of-contents').style.display = 'none';
    }
});
// table of the content