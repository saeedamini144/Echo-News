<div class="echo-top-story">
    <div class="echo-story-picture img-transition-scale">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo" class="img-hover">
        </a>
    </div>
    <div class="echo-story-text">
        <h4><a href="<?php the_permalink(); ?>" class="title-hover"><?php echo Limited_title_characters(20); ?></a></h4>
        <i class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
    </div>
</div>