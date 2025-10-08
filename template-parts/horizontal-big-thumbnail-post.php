 <div class="echo-trending-left-site-post">
     <div class="echo-trending-left-site-post-img img-transition-scale">
         <a href="<?php the_permalink(); ?>">
             <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo" class="img-hover">
         </a>
     </div>
     <div class="echo-trending-right-site-post-title">
         <h5><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover"><?php the_title(); ?></a></h5>
         <div class="echo-trending-post-bottom-icons">
             <i class="fa-light fa-clock"></span></i><span><?php EchoNews_time_to_read(); ?>
                 <i class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
         </div>
     </div>
 </div>