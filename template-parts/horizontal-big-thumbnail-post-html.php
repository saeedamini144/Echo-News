   <div class="echo-trending-left-site-post">
       <div class="echo-trending-left-site-post-img img-transition-scale">
           <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail('full', array('class' => 'img-hover', 'alt' => get_the_title())); ?>
           </a>
       </div>
       <div class="echo-trending-right-site-post-title">
           <p><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover"><?php the_title(); ?></a></p>
           <div class="echo-trending-post-bottom-icons">
               <i id="card-icon" class="fa-light fa-clock"></span></i><span><?php echo EchoNews_time_to_read(); ?>
                   <i id="card-icon" class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
           </div>
       </div>
   </div>