 <div class="swiper-slide">
     <div class="echo-latest-news-main-content">
         <div class="echo-latest-news-img img-transition-scale">
             <a href="<?php the_permalink(); ?>">
                 <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover" wp-the-post-thumbnail="thumnail">
             </a>
         </div>
         <div class="echo-latest-news-single-title">
             <h5><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover" wp-the-post-thumbnail="thumnail"><?php Limited_title_characters(15); ?></a></h5>
         </div>
         <div class="echo-latest-news-time-views" wp-the-post-thumbnail="thumnail">
             <i class="fa-light fa-clock"><span><?php echo EchoNews_time_to_read(); ?></span>
                 <i class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
         </div>
     </div>
 </div>