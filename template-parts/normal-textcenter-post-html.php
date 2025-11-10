<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 mb-5">
    <div class="echo-popular-area-single-item">
        <div class="echo-popular-area-img img-transition-scale">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover">
            </a>
        </div>
        <div class="echo-popular-area-item-title">
            <h5 class="text-center text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h5>
        </div>
        <div class="echo-popular-area-read-view text-center">
            <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
            <i id="card-icon" class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
        </div>
    </div>
</div>