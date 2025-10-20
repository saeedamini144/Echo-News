<div class="echo-feature-area-post">
    <div class="echo-feature-area-post-img img-transition-scale">
        <a href="<?php the_permalink(); ?>">
            <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover">
        </a>
    </div>
    <div class="echo-feature-area-post-hins">
        <h5 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h5>
    </div>
    <hr>
    <div class="echo-feature-area-read-view">
        <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
        <i id="card-icon" class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
    </div>
</div>