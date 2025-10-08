 <div class="echo-hero-baner">
     <div class="echo-hero-banner-main-img  img-transition-scale">
         <a href="<?php the_permalink(); ?>">
             <img class="banner-image-one img-hover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
         </a>
     </div>
     <h1 class="echo-hero-title text-capitalize font-weight-bold"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h1>
     <hr>
     <p class="echo-hero-discription"><?php echo the_excerpt(); ?></p>
     <div class="echo-hero-area-titlepost-post-like-comment-share">
         <div class="echo-hero-area-like-read-comment-share">
             <li class="fa-light fa-clock"></li> <span><?php echo EchoNews_time_to_read(); ?></span>
         </div>
         <div class="echo-hero-area-like-read-comment-share">
             <i class="fa-light fa-eye pe-none"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
         </div>
         <div class="echo-hero-area-like-read-comment-share">
             <i class="fa-light fa-comment-dots"></i><span><?php comments_number(' No Comments', ' One Comment', ' % Comments'); ?></span>
         </div>
     </div>
 </div>