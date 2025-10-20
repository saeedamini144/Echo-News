       <div class="echo-trending-right-site-post">
           <div class="echo-trending-right-site-post-img img-transition-scale">
               <a href="<?php the_permalink(); ?>">
                   <img class="img-hover echo-trending-right-image" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>">
               </a>
           </div>
           <div class="echo-trending-right-site-post-title">
               <h4 class="text-capitalize"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></h4>
           </div>
           <div class="echo-trending-right-site-like-comment-share-icons">
               <div class="echo-trending-right-like-comment-content">
                   <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
               </div>
               <div class="echo-trending-right-like-comment-content">
                   <i id="card-icon" class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
               </div>
               <div class="echo-trending-right-like-comment-content">
                   <i id="card-icon" class="fa-light fa-comment-dots"></i><span><?php comments_number('No Comments', 'One Comment', '% Comments') ?></span>
               </div>
           </div>
       </div>