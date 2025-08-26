 <div class="echo-trending-left-site-post">
     <div class="echo-trending-left-site-post-img img-transition-scale">
         <a href="<?php the_permalink(); ?>">
             <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo" class="img-hover">
         </a>
     </div>
     <div class="echo-trending-right-site-post-title">
         <h5><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover"><?php the_title(); ?></a></h5>
         <div class="echo-trending-post-bottom-icons">
             <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
             <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
         </div>
     </div>
 </div>