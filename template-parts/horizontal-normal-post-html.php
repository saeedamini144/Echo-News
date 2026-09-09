<div class="echo-top-story">
    <div class="echo-story-picture img-transition-scale">
        <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('full', array('class' => 'img-hover', 'alt' => get_the_title())); ?>
        </a>
    </div>
    <div class="echo-story-text">
        <p><a href="<?php the_permalink(); ?>" class="title-hover"><?php echo Limited_title_characters(20); ?></a></p>
        <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
    </div>
</div>