<div class="echo-hero-baner">
    <div class="echo-inner-img-ct-1  img-transition-scale">
        <a href="<?php the_permalink(); ?>"><img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>"></a>
        <div class="echo-ct-style-3-shep">
            <p><?php echo get_the_category()[0]->name; ?></p>
        </div>
    </div>
    <div class="echo-banner-texting">
        <div class="echo-hero-area-titlepost-post-like-comment-share text-center justify-content-center">
            <div class="echo-hero-area-like-read-comment-share">
                <i id="card-icon" class="fa-light fa-clock"></span></i><span><?php echo EchoNews_time_to_read(); ?>
            </div>
            <div class="echo-hero-area-like-read-comment-share">
                <span id="card-icon" class="fa-light fa-eye"></span></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
            </div>
        </div>
        <h4 class="echo-hero-title text-capitalize font-weight-bold text-center"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h4>
        <hr>
        <p class="echo-hero-discription text-center"><?php echo wp_trim_words(get_the_excerpt(), 30); ?></p>
    </div>
</div>