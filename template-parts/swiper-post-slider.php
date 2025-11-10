 <?php
    $select_category = get_theme_mod('slider_posts_settings');
    $args = new WP_Query(
        array(
            'post_type' => 'post',
            'posts_per_page' => 10,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $select_category,
                )
            )

        ),
    );

    if ($args->have_posts()) {
        while ($args->have_posts()) {
            $args->the_post();
    ?>
         <div class="swiper-slide">
             <div class="echo-latest-news-main-content">
                 <div class="echo-latest-news-img img-transition-scale">
                     <a href="<?php the_permalink(); ?>">
                         <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" class="img-hover" wp-the-post-thumbnail="thumnail">
                     </a>
                 </div>
                 <div class="echo-latest-news-single-title">
                     <h5><a href="<?php the_permalink(); ?>" class="text-capitalize title-hover" wp-the-post-thumbnail="thumnail"><?php echo Limited_title_characters(35); ?></a></h5>
                 </div>
                 <div class="echo-latest-news-time-views" wp-the-post-thumbnail="thumnail">
                     <i id="card-icon" class="fa-light fa-clock"></i><span><?php echo EchoNews_time_to_read(); ?></span>
                     <i id="card-icon" class="fa-light fa-eye"></i><span><?php echo EchoNews_post_views_count_display(); ?></span>
                 </div>
             </div>
         </div>
 <?php
        }
    } else {
        echo esc_html__('No content found', 'Echo News');
    }
    wp_reset_postdata();
    ?>