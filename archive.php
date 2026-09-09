<?php get_header(); ?>

<div class="innerpage">
    <!-- rts breadcrumba area start -->
    <div class="echo-breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- bread crumb inner wrapper -->
                    <div class="breadcrumb-inner text-center">
                        <div class="meta">
                            <?php
                            breadcrumb();
                            ?>
                        </div>
                    </div>
                    <!-- bread crumb inner wrapper end -->
                </div>
                <div class="col-lg-12 text-center">
                    <!-- title -->
                    <?php
                    if (is_category()) {
                        echo '<h1>' . single_cat_title('', false) . '</h1>';
                    } elseif (is_tag()) {
                        echo '<h1>' . single_tag_title('', false) . '</h1>';
                        // } elseif (is_author()) {
                        //     echo '<h1>Author: ' . get_the_author() . '</h1>';
                    } elseif (is_year()) {
                        echo '<h1>Year: ' . esc_html(display_jalali_date('Y', strtotime(get_query_var('year') . '-01-01'))) . '</h1>';
                    } elseif (is_month()) {
                        echo '<h1>Month: ' . esc_html(display_jalali_date('F Y', strtotime(get_query_var('year') . '-' . get_query_var('monthnum') . '-01'))) . '</h1>';
                    } elseif (is_day()) {
                        echo '<h1>Day: ' . esc_html(display_jalali_date('F j, Y', strtotime(get_query_var('year') . '-' . get_query_var('monthnum') . '-' . get_query_var('day')))) . '</h1>';
                    } elseif (is_search()) {
                        echo '<h1>Search Results for: ' . get_search_query() . '</h1>';
                    } else {
                        echo '<h1>Archives</h1>';
                    }

                    ?>
                    <!-- title -->
                </div>
            </div>
        </div>
    </div>
    <!-- rts breadcrumba area end -->
    <!-- end breadcrumb area -->

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
                        echo '<h2 class="text-center">هیچ پستی یافت نشد</h2>';
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
                    //     'prev_text' => __('« Previous', 'Echo-News'),
                    //     'next_text' => __('Next »', 'Echo-News'),
                    // ));

                    ?>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer(); ?>