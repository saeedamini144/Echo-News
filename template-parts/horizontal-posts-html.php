 <div class="echo-de-category-content-img-title">
     <div class="echo-de-category-content-img img-transition-scale">
         <a href="<?php the_permalink(); ?>">
             <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover">
         </a>
     </div>
     <div class="echo-de-category-content-title">
         <h6><a href="<?php the_permalink(); ?>" class="title-hover"><?php echo Limited_title_characters(30) ?></a></h6>
         <div class="echo-de-category-read">
             <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
         </div>
     </div>
 </div>