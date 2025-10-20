<?php get_header(); ?>

<!-- Start Hero Area -->
<section class="echo-hero-section">
    <div class="echo-hero">
        <div class="container">
            <div class="echo-full-hero-content">
                <div class="row gx-5">
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <!-- CALL BACK THE NORMAL META EXCERPT POST CARD -->
                        <?php get_template_part('template-parts/normal-meta-excerpt-post'); ?>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="echo-home-1-hero-area-top-story">
                            <!-- change the title of the first section -->
                            <<?php echo esc_html(get_theme_mod('tag_heading_main_page_settings', 'h2')); ?>
                                class="title-tag-style">
                                <?php echo esc_html(get_theme_mod('title_main_page_first_section_settings', 'Title')); ?>
                            </<?php echo esc_html(get_theme_mod('tag_heading_main_page_settings', 'h2')); ?>>
                            <!-- must add the default tag to show correct style in first watch -->
                            <!-- CALL BACK THE HORIZONTAL VERTICAL NORMAL POST CARD -->
                            <?php get_template_part('template-parts/horizonal-vertical-normal', 'post'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Hero Area -->
<!-- Start Latest News Slider (using Slick Slider version 1.8.1) -->
<section class="echo-latest-news-area">
    <div class="echo-latest-news-content">
        <div class="container">
            <div class="echo-be-slider-btn">
                <div class="echo-latest-nw-title">
                    <!-- change the title of the second section -->
                    <<?php echo esc_html(get_theme_mod('tag_heading_main_page_second_section_settings', 'h2')); ?>
                        class="second-title-tag-style">
                        <?php echo esc_html(get_theme_mod('title_main_page_second_section_settings', 'Title')); ?>
                    </<?php echo esc_html(get_theme_mod('tag_heading_main_page_second_section_settings', 'h2')); ?>>
                    <!-- must add the default tag to show correct style in first watch -->

                </div>
                <div class="echo-latest-news-next-prev-btn">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
            <div class="echo-latest-news-full-content">
                <div class="swiper mySwiper">
                    <div class="swiper-wrapper">
                        <!-- CALL THE SWIPER POST SLIDER -->
                        <?php get_template_part('template-parts/swiper-post-slider'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Latest News Slider (using Slick Slider version 1.8.1) -->
<!-- Start Trending News Area -->
<section class="echo-trending-area">
    <div class="echo-trending-content">
        <div class="container">
            <!-- change the title of the Third section -->
            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_third_section_settings', 'h2')) ?> class="third-title-tag-style">
                <?php echo esc_html__(get_theme_mod('title_main_page_third_section_settings', 'Title')) ?>
            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_third_section_settings', 'h2')) ?>>
            <!-- must add the default tag to show correct style in first watch -->
            <div class="echo-trending-full-content">
                <div class="row gx-6">

                    <?php get_template_part('template-parts/two-design-horizontal-big-normal-msize') ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Trending News Area -->
<!-- Start Video Area-->
<section class="echo-video-area">
    <div class="echo-video-content">
        <div class="container">
            <div class="echo-video-area-title-row text-center">
                <h6>Videos</h6>
            </div>
            <div class="echo-full-video-content">
                <div class="row gx-6">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <!-- CALL BACK THE META ON THUMBNAIL POST -->
                        <?php get_template_part("/template-parts/meta-on-thumbnail", "post") ?>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="echo-video-area-home-1-right-content-responsive">

                            <!-- CALL BACK THE HORIZONTAL WHITE TITLE POST -->
                            <!-- <?php get_template_part("/template-parts/horizontal-white-title", "post"); ?> -->

                            <div class="echo-video-right-site-content">
                                <div class="echo-video-right-site-content-text">
                                    <h5 class="text-capitalize"><a href="post-details.html" class="title-hover text-white">Baidu shares drop to 8-week lows after...</a> </h5>
                                    <hr>
                                    <a href="#" class="pe-none text-white"><i class="fa-light fa-clock"></i> 06 minute
                                        read</a>
                                </div>
                                <div class="echo-video-right-site-content-video">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/video-right/item-1.png" alt="Echo">
                                    </a>

                                </div>
                            </div>
                            <div class="echo-video-right-site-content">
                                <div class="echo-video-right-site-content-text">
                                    <h5 class="text-capitalize"><a href="post-details.html" class="title-hover text-white">Christchurch mosque attacks: Keeping...</a> </h5>
                                    <hr>
                                    <a href="#" class="pe-none text-white"><i class="fa-light fa-clock"></i> 06 minute
                                        read</a>
                                </div>
                                <div class="echo-video-right-site-content-video">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/video-right/item-2.png" alt="Echo">
                                    </a>

                                </div>
                            </div>
                            <div class="echo-video-right-site-content">
                                <div class="echo-video-right-site-content-text">
                                    <h5 class="text-capitalize"><a href="post-details.html" class="title-hover text-white">Microsoft’s new Copilot will change</a></h5>
                                    <hr>
                                    <a href="#" class="pe-none text-white"><i class="fa-light fa-clock"></i> 06 minute
                                        read</a>
                                </div>
                                <div class="echo-video-right-site-content-video">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/video-right/item-3.png" alt="Echo">
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Video Area -->
<!-- Start De-category Area -->
<section class="echo-de-category-area">
    <div class="echo-de-category-area-content">
        <div class="container">
            <div class="echo-de-category-full-content">
                <div class="echo-de-category-title-btn">
                    <h4 class="text-capitalize">Discover Categories</h4>
                    <a href="#" class="text-capitalize echo-py-btn">View all categories</a>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content echo-responsive-wd">
                            <h5 class="text-capitalize">Business</h5>
                            <hr>
                            <div class="echo-de-category-content-img-title" wp-no-export cms-post cms-post-type="blog" cms-post-type-count="3">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html" cms-post-link="not_singular">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-1.png" alt="Echo" class="img-hover" wp-featured-bck="thumnail">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover" cms-post-title cms-post-link="not_singular">Everyone’s talking about
                                            Credit Sui...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title" wp-no-export>
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-2.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">Treasury yields rise on
                                            Monday...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title" wp-no-export>
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-3.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">Treasury yields climb as
                                            bank...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-show-more-btn" wp-no-export>
                                <a href="post-details.html" class="text-capitalize echo-py-btn">Show more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content">
                            <h5 class="text-capitalize">Entertainment</h5>
                            <hr>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-4.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">From Miss Malaysia to
                                            first...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-5.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">Three men guilty of US
                                            rapper's...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-6.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">The Wire star's wife
                                            shares...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-show-more-btn">
                                <a href="post-details.html" class="text-capitalize echo-py-btn">Show more</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content">
                            <h5 class="text-capitalize">Travel</h5>
                            <hr>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-7.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">New Zealand-bound
                                            plane...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-8.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">Travellers arriving in
                                            England...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-content-img-title">
                                <div class="echo-de-category-content-img img-transition-scale">
                                    <a href="post-details.html">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/de-category/item-9.png" alt="Echo" class="img-hover">
                                    </a>
                                </div>
                                <div class="echo-de-category-content-title">
                                    <h6><a href="post-details.html" class="title-hover">Airport security rules on
                                            liquids...</a></h6>
                                    <div class="echo-de-category-read">
                                        <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                            read</a>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-de-category-show-more-btn">
                                <a href="post-details.html" class="text-capitalize echo-py-btn">Show more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Feature Area -->
<section class="echo-feature-area">
    <div class="echo-feature-area-content">
        <div class="container">
            <div class="echo-feature-full-content">
                <div class="row gx-6">
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="echo-feature-area-site-title">
                            <h4>Featured Post</h4>
                            <div class="row gx-5">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">

                                    <!-- CALL BACK THE NORMAL HRLINE POST CARD -->
                                    <!-- <?php echo get_template_part("/template-parts/noraml-hrline", "post"); ?> -->

                                    <div class="echo-feature-area-post">
                                        <div class="echo-feature-area-post-img img-transition-scale">
                                            <a href="post-details.html">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-left/item-1.png" alt="Echo" class="img-hover">
                                            </a>
                                        </div>
                                        <div class="echo-feature-area-post-hins">
                                            <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">Most drivers fear MOT rules relaxation will
                                                    risk lives</a></h5>
                                        </div>
                                        <hr>
                                        <div class="echo-feature-area-read-view">
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                                read</a>
                                            <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k
                                                Views</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                    <div class="echo-feature-area-post">
                                        <div class="echo-feature-area-post-img img-transition-scale">
                                            <a href="post-details.html">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-left/item-2.png" alt="Echo" class="img-hover">
                                            </a>
                                        </div>
                                        <div class="echo-feature-area-post-hins">
                                            <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">26% of world lacks clean drinking water
                                                    46%</a></h5>
                                        </div>
                                        <hr>
                                        <div class="echo-feature-area-read-view">
                                            <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute
                                                read</a>
                                            <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k
                                                Views</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-feature-area-option">
                                <div class="row gx-5 gy-5">
                                    <div class="col-xl-6 col-lg-6 col-md-6">

                                        <!-- CALL BACK THE HORIZONTAL NUMCOUNTER POST -->
                                        <!-- <?php get_template_part("/template-parts/horizontal-numcounter", "post") ?> -->

                                        <div class="echo-feature-area-option-content">
                                            <div class="echo-feature-area-option-number">
                                                <h3>01</h3>
                                            </div>
                                            <div class="echo-feature-area-option-content-text">
                                                <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">UK bans TikTok on government devices</a> </h5>
                                                <div class="echo-feature-area-option-read-more">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="echo-feature-area-option-content">
                                            <div class="echo-feature-area-option-number">
                                                <h3>02</h3>
                                            </div>
                                            <div class="echo-feature-area-option-content-text">
                                                <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">100m-high wall of sand towers above
                                                        China</a></h5>
                                                <div class="echo-feature-area-option-read-more">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="echo-feature-area-option-content">
                                            <div class="echo-feature-area-option-number">
                                                <h3>03</h3>
                                            </div>
                                            <div class="echo-feature-area-option-content-text">
                                                <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">Ed Sheeran reveals struggles with
                                                        drugs</a></h5>
                                                <div class="echo-feature-area-option-read-more">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="echo-feature-area-option-content">
                                            <div class="echo-feature-area-option-number">
                                                <h3>04</h3>
                                            </div>
                                            <div class="echo-feature-area-option-content-text">
                                                <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">Give peanut butter to babies to cut
                                                        allergy</a></h5>
                                                <div class="echo-feature-area-option-read-more">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-feature-area-last-news">
                                <div class="row gy-5">
                                    <div class="col-xl-12">
                                        <div class="echo-feature-area-last-content">
                                            <div class="echo-feature-area-last-content-img img-transition-scale">
                                                <a href="post-details.html">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-left/item-3.png" alt="Echo" class="img-hover">
                                                </a>
                                            </div>
                                            <div class="echo-feature-area-last-content-text">
                                                <h3 class="text-capitalize"><a href="post-details.html" class="title-hover">Avatar: The Way Of Water - how gaming
                                                        tech...</a></h3>
                                                <div class="echo-feature-area-last-content-read-view">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k
                                                        Views</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="echo-feature-area-last-content">
                                            <div class="echo-feature-area-last-content-img img-transition-scale">
                                                <a href="post-details.html">
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-left/item-4.png" alt="Echo" class="img-hover">
                                                </a>
                                            </div>
                                            <div class="echo-feature-area-last-content-text">
                                                <h3 class="text-capitalize"><a href="post-details.html" class="title-hover">Spotify's redesign isn't going down well
                                                        - why are...</a></h3>
                                                <div class="echo-feature-area-last-content-read-view">
                                                    <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06
                                                        minute read</a>
                                                    <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k
                                                        Views</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="echo-feature-area-right-site-flexing">
                            <div class="echo-feature-area-right-site-follower">
                                <h5>Follow Us</h5>
                                <ul class="list-unstyled">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook"></i>20K Fans</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i>10K Followers</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i>50K Followers</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin"></i>30K Followers</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest"></i>30K Followers</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-youtube"></i>04K Subscriber</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="echo-feature-area-right-site-full-content">
                                <div class="echo-feature-area-right-site-audio-title">
                                    <h5>New Podcasts</h5>
                                </div>
                                <div class="echo-audio-news-home-1-flexing">
                                    <div class="echo-feature-area-right-site-audio-news">
                                        <div class="echo-feature-area-right-img">
                                            <a href="post-details.html">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/item-1.png" alt="Echo">
                                            </a>
                                        </div>
                                        <div class="echo-feature-area-right-audio-text">
                                            <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">UN
                                                    chief warns a 'climate time bomb...</a></h5>
                                            <div class="echo-feature-area-right-site-audio-main-contetn">
                                                <!-- Start Audio Player -->
                                                <div class="wrappers">
                                                    <audio preload="auto" controls>
                                                        <source src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/my-audio.mp3" type="audio/mpeg">
                                                    </audio>
                                                </div>
                                                <!-- End Audio Player -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="echo-feature-area-right-site-audio-news">
                                        <div class="echo-feature-area-right-img">
                                            <a href="post-details.html">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/item-2.png" alt="Echo">
                                            </a>
                                        </div>
                                        <div class="echo-feature-area-right-audio-text">
                                            <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">UBS agrees 'emergency rescue'...</a></h5>
                                            <div class="echo-feature-area-right-site-audio-main-contetn">
                                                <!-- Start Audio Player -->
                                                <div class="wrappers">
                                                    <audio preload="auto" controls>
                                                        <source src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/my-audio.mp3" type="audio/mpeg">
                                                    </audio>
                                                </div>
                                                <!-- End Audio Player -->
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="echo-feature-area-right-site-audio-news">
                                        <div class="echo-feature-area-right-img">
                                            <a href="post-details.html">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/item-3.png" alt="Echo">
                                            </a>
                                        </div>
                                        <div class="echo-feature-area-right-audio-text">
                                            <h5 class="text-capitalize"><a href="post-details.html" class="title-hover">The Morning World happyness</a></h5>
                                            <div class="echo-feature-area-right-site-audio-main-contetn">
                                                <!-- Start Audio Player -->
                                                <div class="wrappers">
                                                    <audio preload="auto" controls>
                                                        <source src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/my-audio.mp3" type="audio/mpeg">
                                                    </audio>
                                                </div>
                                                <!-- End Audio Player -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="echo-feature-area-right-site-newsletter">
                                <div class="echo-feature-area-rigth-site-newsletter-title">
                                    <h5>Newsletter</h5>
                                </div>
                                <div class="echo-feature-area-right-site-newsletter-img">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/news-item-1.png" alt="Echo">
                                </div>
                                <div class="echo-feature-area-right-site-sub-title">
                                    <p>Stay Tuned With Updates</p>
                                </div>
                                <div class="echo-feature-area-right-site-news-subscribe">
                                    <form action="https://html.themewant.com/echo/POST">
                                        <div class="echo-feature-area-right-site-input-box">
                                            <input type="email" placeholder="Email Addresss.." required>
                                            <button type="submit">
                                                <i class="fa-regular fa-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Feature Area -->
<!-- Start popular News Area -->
<section class="echo-popular-news-area">
    <div class="echo-popular-news-area-content">
        <div class="container">
            <div class="echo-popular-news-area-full-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="echo-popular-area-title">
                            <h4 class="text-center text-capitalize">Popular of the Weeks</h4>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">

                        <!-- CALL BACK THE NORMAL TEXTCENTER POST CARD -->
                        <!-- <?php echo get_template_part("/template-parts/normal-textcenter", "post"); ?> -->

                        <div class="echo-popular-area-single-item">
                            <div class="echo-popular-area-img img-transition-scale">
                                <a href="post-details.html">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/popular/item-1.png" alt="Echo" class="img-hover">
                                </a>
                            </div>
                            <div class="echo-popular-area-item-title">
                                <h5 class="text-center text-capitalize"><a href="post-details.html" class="title-hover">UN warns against 'vampiric' global water use</a></h5>
                            </div>
                            <div class="echo-popular-area-read-view text-center">
                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="echo-popular-area-single-item">
                            <div class="echo-popular-area-img img-transition-scale">
                                <a href="post-details.html">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/popular/item-2.png" alt="Echo" class="img-hover">
                                </a>
                            </div>
                            <div class="echo-popular-area-item-title">
                                <h5 class="text-center text-capitalize"><a href="post-details.html" class="title-hover">Helen Glover: British Olympic champion hopes for
                                        place...</a></h5>
                            </div>
                            <div class="echo-popular-area-read-view text-center">
                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                        <div class="echo-popular-area-single-item echo-popular-news-responsive-home-1">
                            <div class="echo-popular-area-img img-transition-scale">
                                <a href="post-details.html">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/popular/item-3.png" alt="Echo" class="img-hover">
                                </a>
                            </div>
                            <div class="echo-popular-area-item-title">
                                <h5 class="text-center text-capitalize"><a href="post-details.html" class="title-hover">Why workplace drinking culture is fading fast</a></h5>
                            </div>
                            <div class="echo-popular-area-read-view text-center">
                                <a href="#" class="pe-none"><i class="fa-light fa-clock"></i> 06 minute read</a>
                                <a href="#" class="pe-none"><i class="fa-light fa-eye"></i> 3.5k Views</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular News Area -->
<!-- Start Our Software Download -->
<section class="echo-software-download-area">
    <div class="container">
        <div class="echo-software-download-full-content-bg">
            <div class="echo-software-download-img-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/our-android-app-download/item-1.png" alt="Echo">
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="echo-software-download-full-content">
                        <div class="echo-software-download-text-content">
                            <div class="echo-software-download-title">
                                <h2 class="text-capitalize">Download our apps for<br> stay update</h2>
                            </div>
                            <div class="echo-software-download-sub-title">
                                <p>Easy to update latest news, aily podcast and <br> everything in your hand</p>
                            </div>
                            <div class="echo-software-download-place">
                                <a href="#" class="echo-py-hover-white">
                                    <svg width="18" height="22" viewbox="0 0 18 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M16.4877 7.75092C16.3667 7.84543 14.2305 9.05726 14.2305 11.7518C14.2305 14.8685 16.9487 15.9711 17.0301 15.9984C17.0176 16.0657 16.5983 17.5085 15.5969 18.9786C14.7041 20.2724 13.7716 21.564 12.353 21.564C10.9344 21.564 10.5693 20.7344 8.93172 20.7344C7.33583 20.7344 6.7684 21.5913 5.47083 21.5913C4.17325 21.5913 3.26787 20.3942 2.22689 18.924C1.0211 17.1977 0.046875 14.5157 0.046875 11.9702C0.046875 7.88744 2.68375 5.72212 5.2789 5.72212C6.65784 5.72212 7.8073 6.63361 8.67304 6.63361C9.49707 6.63361 10.7821 5.66752 12.3509 5.66752C12.9454 5.66752 15.0817 5.72212 16.4877 7.75092ZM11.6061 3.93904C12.2549 3.16407 12.7139 2.08876 12.7139 1.01345C12.7139 0.864336 12.7014 0.713121 12.6742 0.591309C11.6187 0.631213 10.3628 1.29908 9.60555 2.18327C9.011 2.86374 8.45609 3.93904 8.45609 5.02905C8.45609 5.19287 8.48321 5.35668 8.49572 5.40919C8.56248 5.42179 8.67096 5.43649 8.77944 5.43649C9.72654 5.43649 10.9177 4.79803 11.6061 3.93904Z" fill="#fff" />
                                    </svg>
                                    Apple Store
                                </a>
                                <a href="#" class="echo-py-hover-white">
                                    <svg width="18" height="20" viewbox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.949986 0.589355L10.5561 10.0894L0.950929 19.5894C0.780128 19.5184 0.63437 19.399 0.531982 19.2464C0.429594 19.0937 0.375148 18.9145 0.37549 18.7313V1.4474C0.375562 1.26443 0.430067 1.08552 0.532218 0.932956C0.634369 0.780388 0.779655 0.660895 0.949986 0.589355ZM11.223 10.7487L13.3946 12.8957L3.07722 18.8022L11.223 10.7487ZM14.2407 7.76612L16.8887 9.28261C17.0317 9.3646 17.1503 9.48227 17.2328 9.62386C17.3153 9.76544 17.3587 9.92596 17.3587 10.0894C17.3587 10.2527 17.3153 10.4133 17.2328 10.5549C17.1503 10.6964 17.0317 10.8141 16.8887 10.8961L14.2398 12.4126L11.8899 10.0894L14.2407 7.76612ZM3.07722 1.37651L13.3955 7.28207L11.223 9.42997L3.07722 1.37651Z" fill="white" />
                                    </svg> Play Store
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Our Software Download -->
<?php get_footer(); ?>