<?php get_header(); ?>

<!-- Start Hero Area First section -->
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
<!-- Start Latest News Slider (using Slick Slider version 1.8.1) Second section -->
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
<!-- Start Trending News Area Third section -->
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
<!-- Start Video Area Fourth section-->
<section class="echo-video-area">
    <div class="echo-video-content">
        <div class="container">
            <div class="echo-video-area-title-row text-center">
                <!-- change the title of the Fourth section -->
                <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fourth_section_settings', 'h2')) ?> class="fourth-title-tag-style">
                    <?php echo esc_html__(get_theme_mod('title_main_page_fourth_section_settings', 'Title')) ?>
                </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fourth_section_settings', 'h2')) ?>>
                <!-- must add the default tag to show correct style in first watch -->
            </div>
            <div class="echo-full-video-content">
                <div class="row gx-6">

                    <?php get_template_part('template-parts/two-design-meta-on-thumbnail-horizontal-white-title') ?>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Video Area -->
<!-- Start De-category Area Fifth section -->
<section class="echo-de-category-area">
    <div class="echo-de-category-area-content">
        <div class="container">
            <div class="echo-de-category-full-content">
                <div class="echo-de-category-title-btn">
                    <!-- change the title of the Fifth section -->
                    <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_settings', 'h2')) ?> class="fifth-title-tag-style">
                        <?php echo esc_html__(get_theme_mod('title_main_page_fifth_section_settings', 'Title')) ?>
                    </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_settings', 'h2')) ?>>
                    <!-- must add the default tag to show correct style in first watch -->
                    <a href="<?php echo esc_html__(get_theme_mod('fifth_section_button_link_settings')) ?>" class="text-capitalize echo-py-btn"><?php echo esc_html__(get_theme_mod('fifth_section_button_content_settings')) ?></a>
                </div>
                <div class="row gx-5">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content echo-responsive-wd">
                            <!-- change the title of the Fifth section col one -->
                            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col1_settings', 'h2')) ?> class="fifth-title-tag-style-col1">
                                <?php echo esc_html__(get_theme_mod('title_main_page_fifth_section_col1_settings', 'Title')) ?>
                            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col1_settings', 'h2')) ?>>
                            <hr>
                            <!-- call back the horizontal normal post card first column -->
                            <?php get_template_part('template-parts/horizontal-normal-posts-callback-col1') ?>

                            <div class="echo-de-category-show-more-btn" wp-no-export>
                                <a href="<?php echo esc_html__(get_theme_mod('fifth_section_col_one_button_link_settings')) ?>" class="text-capitalize echo-py-btn"><?php echo esc_html__(get_theme_mod('fifth_section_col_one_button_content_settings')) ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content">
                            <!-- change the title of the Fifth section col two -->
                            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col2_settings', 'h2')) ?> class="fifth-title-tag-style-col2">
                                <?php echo esc_html__(get_theme_mod('title_main_page_fifth_section_col2_settings', 'Title')) ?>
                            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col2_settings', 'h2')) ?>>
                            <hr>
                            <!-- call back the horizontal normal post card first column -->
                            <?php get_template_part('template-parts/horizontal-normal-posts-callback-col2') ?>
                            <div class="echo-de-category-show-more-btn">
                                <a href="<?php echo esc_html__(get_theme_mod('fifth_section_col_two_button_link_settings')) ?>" class="text-capitalize echo-py-btn"><?php echo esc_html__(get_theme_mod('fifth_section_col_two_button_content_settings')) ?></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="echo-de-category-content">
                            <!-- change the title of the Fifth section col three -->
                            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col3_settings', 'h2')) ?> class="fifth-title-tag-style-col3">
                                <?php echo esc_html__(get_theme_mod('title_main_page_fifth_section_col3_settings', 'Title')) ?>
                            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_fifth_section_col3_settings', 'h2')) ?>>
                            <hr>
                            <!-- call back the horizontal normal post card first column -->
                            <?php get_template_part('template-parts/horizontal-normal-posts-callback-col3') ?>
                            <div class="echo-de-category-show-more-btn">
                                <a href="<?php echo esc_html__(get_theme_mod('fifth_section_col_Three_button_link_settings')) ?>" class="text-capitalize echo-py-btn"><?php echo esc_html__(get_theme_mod('fifth_section_col_Three_button_content_settings')) ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Start Feature Area sixth -->
<section class="echo-feature-area">
    <div class="echo-feature-area-content">
        <div class="container">
            <div class="echo-feature-full-content">
                <div class="row gx-6">
                    <div class="col-xl-8 col-lg-7 col-md-12">
                        <div class="echo-feature-area-site-title">
                            <!-- change the title of the sixth section -->
                            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_settings', 'h2')) ?> class="sixth-title-tag-style">
                                <?php echo esc_html__(get_theme_mod('title_main_page_sixth_section_settings', 'Title')) ?>
                            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_settings', 'h2')) ?>>
                            <!-- must add the default tag to show correct style in first watch -->
                            <div class="row gx-5">
                                <!-- CALL BACK THE NORMAL HRLINE POST CARD -->
                                <?php get_template_part('template-parts/noraml-hrline-post'); ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5 col-md-12">
                        <div class="echo-feature-area-right-site-flexing">
                            <div class="echo-feature-area-right-site-follower">
                                <!-- change the title of the sixth section col1 -->
                                <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col1_settings', 'h2')) ?> class="sixth-title-tag-style-col1">
                                    <?php echo esc_html__(get_theme_mod('title_main_page_sixth_col1_section_settings', 'Follow Us')) ?>
                                </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col1_settings', 'h2')) ?>>
                                <ul class="list-unstyled">
                                    <!-- call back the social icon -->
                                    <?php
                                    $social_media = get_theme_mod('add_social_media_icon_settings');
                                    foreach ($social_media as $key => $values) {
                                        echo '<li>';
                                        echo '<a aria-label="' . esc_attr($values['social_media_icon']) . '" href="' . $values['social_media_link'] . '"><i class="fa-brands ' . esc_attr($values['social_media_icon']) . '"></i></a>';
                                        echo '</li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                            <div class="echo-feature-area-right-site-full-content">
                                <div class="echo-feature-area-right-site-audio-title">
                                    <!-- change the title of the sixth section col2 -->
                                    <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col2_settings', 'h2')) ?> class="sixth-title-tag-style-col2">
                                        <?php echo esc_html__(get_theme_mod('title_main_page_sixth_col2_section_settings', 'title')) ?>
                                    </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col2_settings', 'h2')) ?>>
                                </div>
                                <!-- CALL BACK THE horizontal numcounter post -->
                                <?php get_template_part('template-parts/horizontal-numcounter-post'); ?>

                            </div>
                            <div class="echo-feature-area-right-site-newsletter">
                                <div class="echo-feature-area-rigth-site-newsletter-title">
                                    <!-- change the title of the sixth section col3 -->
                                    <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col3_settings', 'h2')) ?> class="sixth-title-tag-style-col3">
                                        <?php echo esc_html__(get_theme_mod('title_main_page_sixth_col3_section_settings', 'title')) ?>
                                    </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_sixth_section_col3_settings', 'h2')) ?>>
                                </div>
                                <!-- horizontal-normal-posts-callback-col3 -->
                                <?php get_template_part('template-parts/horizontal-normal-posts-callback-sixth-section-col3'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Feature Area sixth -->
<!-- Start popular News Area Seventh Section -->
<section class="echo-popular-news-area">
    <div class="echo-popular-news-area-content">
        <div class="container">
            <div class="echo-popular-news-area-full-content">
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="echo-popular-area-title">
                            <!-- change the title of the seventh section -->
                            <<?php echo esc_html__(get_theme_mod('tag_heading_main_page_seventh_section_settings', 'h2')) ?> class="text-center seventh-title-tag-style">
                                <?php echo esc_html__(get_theme_mod('title_main_page_seventh_section_settings', 'Title')) ?>
                            </<?php echo esc_html__(get_theme_mod('tag_heading_main_page_seventh_section_settings', 'h2')) ?>>
                        </div>
                    </div>
                </div>
                <div class="row gx-5">
                    <!-- CALL BACK THE  NORMAL text center POST CARD seventh section -->
                    <?php get_template_part('template-parts/normal-textcenter-post-callback'); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular News Area Seventh Section -->
<!-- End Our Software Download seventh -->
<?php get_footer(); ?>