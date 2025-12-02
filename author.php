<?php get_header(); ?>
<!-- start breadcrumb area -->
<!-- rts breadcrumba area start -->
<div class="echo-breadcrumb-area-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="echo-author-content">
                    <div class="echo-author-picture">
                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>">
                    </div>
                    <div class="echo-author-info">
                        <h5 class="text-capitalize"><?php the_author(); ?></h5>
                        <p><?php the_author_meta('description'); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="echo-hero-section inner inner-2 inner-3">
    <div class="echo-hero">
        <div class="container">
            <div class="row">
                <?php
                if (have_posts()) {
                    while (have_posts()) {
                        the_post();
                        get_template_part('template-parts/Archive-post-card-html');
                    }
                } else {
                    echo '<h2 class="text-center">No posts found.</h2>';
                }
                wp_reset_postdata();
                ?>
            </div>
            <!-- pagination -->
            <div class="row">
                <?php
                Echo_pagination();
                // Pagination
                // the_posts_pagination(array(
                //     'mid_size' => 2,
                //     'prev_text' => __('« Previous', 'Echo News'),
                //     'next_text' => __('Next »', 'Echo News'),
                // ));

                ?>
            </div>
        </div>
    </div>
</section>
<!-- rts breadcrumba area end -->
<!-- end breadcrumb area -->

<?php get_footer(); ?>