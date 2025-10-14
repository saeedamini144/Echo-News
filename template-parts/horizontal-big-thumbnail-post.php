 <?php

    $select_category = get_theme_mod('');
    $args = new WP_Query(
        array(
            'post_type' => 'post',
            'orderby' => 'date',
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

         <div class="echo-trending-left-site-post">
             <div class="echo-trending-left-site-post-img img-transition-scale">
                 <a href="<?php the_permalink(); ?>">
                     <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover">
                 </a>
             </div>
             <div class="echo-trending-right-site-post-title">
                 <h5><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover"><?php the_title(); ?></a></h5>
                 <div class="echo-trending-post-bottom-icons">
                     <i class="fa-light fa-clock"></span></i><span><?php echo EchoNews_time_to_read(); ?>
                         <i class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
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