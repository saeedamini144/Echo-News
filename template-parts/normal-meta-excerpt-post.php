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
 <?php
        }
    } else {
        echo esc_html__('No posts found', 'Echo News');
    }
    wp_reset_postdata(); // reset the data base
    ?>