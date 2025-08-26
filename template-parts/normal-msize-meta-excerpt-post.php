<div class="echo-trending-right-site-post">
    <div class="echo-trending-right-site-post-img img-transition-scale">
        <a href="<?php the_permalink(); ?>">
            <img class="img-hover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo">
        </a>
    </div>
    <div class="echo-trending-right-site-post-title">
        <h4 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h4>
    </div>
    <div class="echo-trending-right-site-like-comment-share-icons">
        <div class="echo-trending-right-like-comment-content">
            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
        </div>
        <div class="echo-trending-right-like-comment-content">
            <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
        </div>
        <div class="echo-trending-right-like-comment-content">
            <a href="#" class="pe-none"><i class="fa-light fa-comment-dots"></i><?php comments_number('No Comments', 'One Comment', '% Comments') ?></a>
        </div>
        <div class="echo-trending-right-like-comment-content">
            <a href="#" class="pe-none"><i class="fa-light fa-arrow-up-from-bracket"></i>
                1.5k Share</a>
        </div>
    </div>
</div>