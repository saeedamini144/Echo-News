<div class="echo-video-left-site">
    <a href="<?php the_permalink(); ?>">
        <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
    </a>
    <div class="echo-video-left-site-text-box">
        <h5><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h5>
        <hr>
        <div class="echo-video-left-site-read-views">
            <i class="fa-light fa-clock"></i> <?php echo EchoNews_time_to_read(); ?></span>
            <i class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
        </div>
    </div>
</div>