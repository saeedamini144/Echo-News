<div class="echo-video-right-site-content">
    <div class="echo-video-right-site-content-text">
        <h5 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover text-white"><?php echo Limited_title_characters(25); ?></a> </h5>
        <hr>
        <i id="card-icon" class="fa-light fa-clock text-white"></i> <span><?php echo EchoNews_time_to_read(); ?></span>
    </div>
    <div class="echo-video-right-site-content-video">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
        </a>

    </div>
</div>