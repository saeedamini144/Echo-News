<?php if (have_comments()) : // وقتی هنوز نظری ثبت نشده، بخش «نظرات» اصلاً نمایش داده نمی‌شود (فرم ثبت نظر می‌ماند) ?>
    <div class="echo-reply-area">
        <p class="title">نظرات <span class="comments-count">(<?php echo esc_html(number_format_i18n(get_comments_number())); ?>)</span></p>

        <ul class="comment-inner">
            <?php
            wp_list_comments([
                'callback' => 'echo_comment_template',
                'style'    => 'ul',
            ]);
            ?>
        </ul>
    </div>
<?php endif; ?>
<div class="echo-comment-box">
    <div class="comment-box-inner">
        <?php
        comment_form([
            'title_reply' => __('<p class="title">نظر بدهید</p>', 'Echo-News'),
            'fields' => [
                'author' =>
                '<p class="comment-form-author">
                    <input type="text" name="author" placeholder="نام و نام خانوادگی" required>
                </p>',
                'email' =>
                '<p class="comment-form-email">
                    <input type="email" name="email" placeholder="آدرس ایمیل" required>
                </p>',
            ],
            'comment_field' =>
            '
            <p class="comment-form-rating">
                <span class="rating-title">امتیاز شما</span>
                <span class="star-rating" role="radiogroup" aria-label="امتیاز شما">
                    <input type="radio" id="rating-5" name="rating" value="5" required><label for="rating-5" title="۵ از ۵ (عالی)">★</label>
                    <input type="radio" id="rating-4" name="rating" value="4"><label for="rating-4" title="۴ از ۵ (خوب)">★</label>
                    <input type="radio" id="rating-3" name="rating" value="3"><label for="rating-3" title="۳ از ۵ (متوسط)">★</label>
                    <input type="radio" id="rating-2" name="rating" value="2"><label for="rating-2" title="۲ از ۵ (ضعیف)">★</label>
                    <input type="radio" id="rating-1" name="rating" value="1"><label for="rating-1" title="۱ از ۵ (بد)">★</label>
                </span>
            </p>
            <p class="comment-form-comment">
                <textarea name="comment" placeholder="نظر خود را بنویسید" required></textarea>
            </p>',
            'submit_button' => __('<button type="submit" class="submit-btn">ارسال</button>', 'Echo-News'),
        ]);
        ?>
    </div>
</div>

<?php

function echo_comment_template($comment, $args, $depth)
{
    $rating = get_comment_meta($comment->comment_ID, 'rating', true);
    $rating = $rating ? intval($rating) : 0;

    $post       = get_post($comment->comment_post_ID);
    $is_author  = $post && $comment->user_id && (int) $comment->user_id === (int) $post->post_author;
    $is_pending = ((string) $comment->comment_approved === '0');
    $author     = get_comment_author($comment);
?>
    <li class="wrapper" id="comment-<?php comment_ID(); ?>">
        <div class="comment-body">
            <div class="image-area">
                <img src="<?php echo esc_url(get_avatar_url($comment, ['size' => 112])); ?>" alt="<?php echo esc_attr($author); ?>" width="56" height="56" loading="lazy">
            </div>

            <div class="content">
                <div class="comment-head">
                    <p class="title">
                        <?php echo esc_html($author); ?>
                        <?php if ($is_author) : ?><span class="comment-badge is-author">نویسنده</span><?php endif; ?>
                    </p>

                    <?php if ($rating > 0) : ?>
                        <div class="comment-rating" role="img" aria-label="<?php echo esc_attr('امتیاز ' . $rating . ' از ۵'); ?>">
                            <?php
                            for ($i = 1; $i <= 5; $i++) {
                                echo '<span class="star ' . ($i <= $rating ? 'filled' : 'empty') . '">★</span>';
                            }
                            ?>
                        </div>
                    <?php endif; ?>

                    <time class="comment-date" datetime="<?php echo esc_attr(get_comment_time('c')); ?>"><?php echo esc_html(display_jalali_date('Y/m/d', get_comment_time('U', true))); ?></time>
                </div>

                <?php if ($is_pending) : ?>
                    <p class="comment-pending"><i class="fa-regular fa-hourglass-half"></i> نظر شما در انتظار تأیید مدیر است و هنوز برای دیگران نمایش داده نمی‌شود.</p>
                <?php endif; ?>

                <div class="desc"><?php comment_text(); ?></div>

                <div class="reply">
                    <?php
                    comment_reply_link(array_merge($args, [
                        'depth'      => $depth,
                        'max_depth'  => $args['max_depth'],
                        'reply_text' => '<i class="fa-regular fa-reply"></i> پاسخ',
                    ]));
                    ?>
                </div>
            </div>
        </div>
    <?php
    // «</li>» را عمداً نمی‌بندیم: وردپرس بعد از پاسخ‌های تو‌درتو (ul.children) خودش می‌بندد.
}
