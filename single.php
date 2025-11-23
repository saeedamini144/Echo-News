<?php
get_header();
?>

<body class="innerpage">
    <!-- rts breadcrumba area start -->
    <div class="echo-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <div class="meta">
                            <a href="#" class="prev">ECHO /</a>
                            <a href="#" class="next">Single News</a>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumba area end -->
    <!-- end breadcrumb area -->
    <section class="echo-hero-section inner inner-post inner-post-2">
        <div class="echo-hero">
            <div class="container">
                <div class="echo-full-hero-content">
                    <div class="row gx-5 sticky-coloum-wrap">
                        <div class="col-xl-8 col-lg-8">
                            <div class="echo-hero-baner">
                                <span class="content-catagory-tag"><a href="<? echo get_category_link(get_the_category()[0]->term_id) ?>"><?php echo get_the_category()[0]->name; ?></a></span>
                                <!-- post title -->
                                <h1 class="echo-hero-title text-capitalize font-weight-bold"><?php echo get_the_title(); ?></h1>

                                <div class="echo-inner-img-ct-1  img-transition-scale">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php echo get_the_title(); ?>" class="echo-post-style-3-hero-banner">
                                </div>

                                <!-- post meta -->
                                <div class="echo-hero-area-titlepost-post-like-comment-share">
                                    <div class="echo-hero-area-like-read-comment-share">
                                        <span><i id="card-icon" class="fa-light fa-clock"></i><?php echo EchoNews_time_to_read(); ?></span>
                                    </div>
                                    <div class="echo-hero-area-like-read-comment-share">
                                        <span><i id="card-icon" class="fa-light fa-eye"></i><?php echo EchoNews_post_views_count_display(); ?></span>
                                    </div>
                                    <div class="echo-hero-area-like-read-comment-share">
                                        <span><i id="card-icon" class="fa-light fa-comment-dots"></i><?php comments_number(' No Comments', ' One Comment', ' % Comments') ?></span>
                                    </div>
                                    <div class="echo-hero-area-like-read-comment-share">
                                        <span><i id="card-icon"><?php display_average_rating(get_the_ID()); ?></i></span>
                                    </div>

                                </div>
                                <!-- the post excerpt -->
                                <?php
                                if (!empty(the_excerpt())) {
                                    the_excerpt();
                                }
                                ?>
                                <!-- Table of Contents -->
                                <div id="table-of-contents" class=" mb-3 bg-light p-3 toc ">

                                    <details>
                                        <summary class="mb-2">
                                            <?php
                                            echo esc_html__('Table of Contents', 'Echo News');
                                            ?>
                                        </summary>
                                        <ul id="toc-list"></ul>
                                    </details>

                                </div>
                                <!-- Table of Contents -->
                                <div class="echo-financial-area">
                                    <div class="content post-content">

                                        <?php
                                        if (have_posts()) {
                                            while (have_posts()) {
                                                the_post();
                                                the_content();
                                            }
                                        } else {
                                            echo 'No content';
                                        }
                                        ?>

                                    </div>
                                </div>
                                <!-- show the author section -->
                                <div class="echo-author-area">
                                    <div class="image-area">
                                        <img src="<?php echo get_avatar_url(get_the_author_meta('ID')); ?>" alt="<?php the_author(); ?>">
                                    </div>
                                    <div class="content">
                                        <p class="title"><?php the_author(); ?></p>
                                        <p class="desc"><?php the_author_meta('description'); ?></p>
                                    </div>
                                </div>
                                <!-- end the author section -->

                                <!-- might like section -->
                                <div class="echo-more-news-area">
                                    <p class="title"><?php echo esc_html__('You Might Also Like', 'Echo News'); ?></p>
                                    <div class="inner">
                                        <div class="row">
                                            <?php
                                            get_related_posts_by_category();
                                            ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- might like section -->

                                <!-- Comments -->
                                <?php comments_template('/comments.php'); ?>
                                <!-- Comments -->

                            </div>

                        </div>
                        <!-- post side bar -->
                        <div class="col-xl-4 col-lg-4 sticky-coloum-item">
                            <div class="echo-right-ct-1">
                                <div class="echo-home-1-hero-area-top-story">
                                    <h5 class="text-center">Our Picks</h5>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-6.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h6><a href="#" class="title-hover">The Google Pixel Fold looks...</a></h6>
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                        </div>
                                    </div>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-7.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h6><a href="#" class="title-hover">ChatGPT returns to Italy after ban</a></h6>
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                        </div>
                                    </div>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-8.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h6><a href="#" class="title-hover">Avatar: The Way Of Water - how...</a></h6>
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                        </div>
                                    </div>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-9.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h6><a href="#" class="title-hover">14 Tight Samurai Games You...</a></h6>
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="echo-home-1-hero-area-top-story story-review">
                                    <h5 class="text-center">Top Reviews</h5>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-15.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h3 class="number">01</h3>
                                            <div class="content">
                                                <h6><a href="#" class="title-hover">Top Rated Products in Wireless...</a></h6>
                                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-16.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h3 class="number">02</h3>
                                            <div class="content">
                                                <h6><a href="#" class="title-hover">ChatGPT returns to Italy after ban</a></h6>
                                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="echo-top-story">
                                        <div class="echo-story-picture img-transition-scale">
                                            <a href="post-details.html"><img src="assets/images/category-style-1/item-17.png" alt="Echo" class="img-hover"></a>
                                        </div>
                                        <div class="echo-story-text">
                                            <h3 class="number">03</h3>
                                            <div class="content">
                                                <h6><a href="#" class="title-hover">Top 10 Best Portable Bluetooth Speakers..</a></h6>
                                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- advertisement banner -->
                                <div class="echo-ct-1-add">
                                    <div class="echo-ct-add-img">
                                        <a rel="nofollow" href="#"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-style-1/item-10.png" alt="Echo"></a>
                                    </div>
                                </div>
                                <!-- advertisement banner -->

                            </div>
                        </div>
                        <!-- post side bar end -->
                    </div>
                </div>
            </div>
    </section>
</body>
<?php

get_footer();
?>