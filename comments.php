<div class="echo-reply-area">
    <p class="title">Comment</p>

    <ul class="comment-inner">
        <?php
        wp_list_comments([
            'callback' => 'echo_comment_template',
            'style'    => 'ul',
        ]);
        ?>
    </ul>
</div>
<div class="echo-comment-box">
    <div class="comment-box-inner">
        <?php
        comment_form([
            'title_reply' => __('<p class="title">Leave a Comment</p>', 'Echo News'),
            'fields' => [
                'author' =>
                '<p class="comment-form-author">
                    <input type="text" name="author" placeholder="Full Name" required>
                </p>',
                'email' =>
                '<p class="comment-form-email">
                    <input type="email" name="email" placeholder="Email Address" required>
                </p>',
            ],
            'comment_field' =>
            '
            <p class="comment-form-rating">
                <label>Your rating</label>
                <select name="rating" id="rating" required>
                    <option value="">Choose</option>
                    <option value="1">⭐</option>
                     <option value="2">⭐⭐</option>
                     <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5"> ⭐⭐⭐⭐⭐</option>

                </select>
            </p>
            <p class="comment-form-comment">
                <textarea name="comment" placeholder="Write Your Comment Here" required></textarea>
            </p>',
            'submit_button' => __('<button type="submit" class="submit-btn">Submit Now</button>', 'Echo News'),
        ]);
        ?>
    </div>
</div>

<?php

function echo_comment_template($comment, $args, $depth)
{

    $rating = get_comment_meta($comment->comment_ID, 'rating', true);
    $rating = $rating ? intval($rating) : 0;
?>
    <li class="wrapper" id="comment-<?php comment_ID(); ?>">
        <div class="image-area">
            <img src="<?php echo get_avatar_url($comment, ['size' => 60]); ?>" alt="author">
        </div>

        <div class="content">
            <p class="title"><?php comment_author(); ?></p>
            <a class="pe-none"><?php echo get_comment_date(); ?></a>

            <div class="comment-rating">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    if ($i <= $rating) {
                        echo '<span class="star filled">★</span>';
                    } else {
                        echo '<span class="star empty">★</span>';
                    }
                }
                ?>
            </div>

            <p class="desc"><?php comment_text(); ?></p>
        </div>

        <div class="reply">
            <?php
            comment_reply_link(array_merge($args, [
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'reply_text' => '<i class="fa-regular fa-share"></i> Reply'
            ]));
            ?>
        </div>
    </li>
<?php
}


?>