 <?php

    $select_category = get_theme_mod('Big_post_main_page_settings');
    // $category_array =  array(
    //     'post_type' => 'post',
    //     'posts_pr_page' => 1,
    //     'orderby' => 'date',
    //     'order' => 'rand',
    //     'tax_query' => array(
    //         array(
    //             'taxonomy' => 'category',
    //             'field' => 'term_id',
    //             'terms' => $select_category,
    //         ),
    //     ),
    // );
    // $args = new WP_Query($category_array);
    $args = new WP_Query(
        array(
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'rand',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $select_category,
                ),
            ),
        )
    );
    if ($args->have_posts()) {
        while ($args->have_posts()) {
            $args->the_post();
    ?>
         <div class="echo-hero-baner">
             <div class="echo-hero-banner-main-img  img-transition-scale">
                 <a href="<?php the_permalink(); ?>">
                     <?php the_post_thumbnail('full', array('class' => 'img-hover banner-image-one', 'alt' => get_the_title())); ?>

                 </a>
             </div>
             <p class="echo-hero-title text-capitalize font-weight-bold"><a href="<?php the_permalink(); ?>" class="title-hover"><?php the_title(); ?></a></p>
             <hr>
             <p class="echo-hero-discription"><?php the_excerpt(); ?></p>
             <div class="echo-hero-area-titlepost-post-like-comment-share">
                 <div class="echo-hero-area-like-read-comment-share">
                     <li id="card-icon" class="fa-light fa-clock"></li> <span><?php echo EchoNews_time_to_read(); ?></span>
                 </div>
                 <div class="echo-hero-area-like-read-comment-share">
                     <i id="card-icon" class="fa-light fa-eye pe-none"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
                 </div>
                 <div class="echo-hero-area-like-read-comment-share">
                     <i id="card-icon" class="fa-light fa-comment-dots"></i><span><?php comments_number(' بدون دیدگاه', ' یک دیدگاه', ' % دیدگاه'); ?></span>
                 </div>
             </div>
         </div>
 <?php
        }
    } else {
        echo esc_html__('هیچ پستی یافت نشد', 'Echo-News');
    }
    wp_reset_postdata(); // reset the data base
    ?>