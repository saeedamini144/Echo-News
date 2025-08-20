 <div class="swiper-slide">
     <div class="echo-latest-news-main-content">
         <div class="echo-latest-news-img img-transition-scale">
             <a href="post-details.html">
                 <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="Echo" class="img-hover" wp-the-post-thumbnail="thumnail">
             </a>
         </div>
         <div class="echo-latest-news-single-title">
             <h5><a href="post-details.html" class="text-capitalize title-hover" wp-single-post-title><?php Limited_title_characters(15); ?></a></h5>
         </div>
         <div class="echo-latest-news-time-views" wp-the-post-thumbnail>
             <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
             <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
         </div>
     </div>
 </div>