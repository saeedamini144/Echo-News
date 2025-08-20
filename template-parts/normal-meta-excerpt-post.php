 <div class="echo-hero-baner">
     <div class="echo-hero-banner-main-img  img-transition-scale">
         <a href="post-details.html">
             <img class="banner-image-one img-hover" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo">
         </a>
     </div>
     <h1 class="echo-hero-title text-capitalize font-weight-bold"><a href="post-details.html" class="title-hover"><?php the_title(); ?></a></h1>
     <hr>
     <p class="echo-hero-discription"><?php echo the_excerpt(); ?></p>
     <div class="echo-hero-area-titlepost-post-like-comment-share">
         <div class="echo-hero-area-like-read-comment-share">
             <a href="#"><i class="fa-light fa-clock"></i> 06 minute read</a>
         </div>
         <div class="echo-hero-area-like-read-comment-share">
             <a href="#"><i class="fa-light fa-eye"></i> 3.5k Views</a>
         </div>
         <div class="echo-hero-area-like-read-comment-share">
             <a href="#"><i class="fa-light fa-comment-dots"></i><?php comments_number('No Comments', 'One Comment', '% Comments'); ?></a>
         </div>
         <div class="echo-hero-area-like-read-comment-share">
             <a href="#"><i class="fa-light fa-arrow-up-from-bracket"></i> 1.5k Share</a>
         </div>
     </div>
 </div>