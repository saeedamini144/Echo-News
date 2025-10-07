<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="home-one">
    <!-- Start Top Header Area -->
    <!-- Start Top Header Area -->
    <header class="echo-header-area">
        <div class="echo-header-top">
            <div class="container">
                <div class="echo-full-header-top">
                    <div class="row align-items-center plr_md--30">
                        <div class="col-xl-4 col-lg-4 d-none d-lg-block">
                            <div class="echo-meta-total-jobs">
                                <div class="echo-meta-jobs-icons">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/header-top/home-1-header-top.png" alt="Echo">
                                </div>
                                <div class="echo-meta-jobs-text">
                                    <div class="swiper rt-treding-slider10">
                                        <div class="swiper-wrapper">
                                            <!-- call back the vertical slider post -->
                                            <?php echo get_template_part('template-parts/vertical-slider-post'); ?>
                                            <!-- call back the vertical slider post -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- show date in header -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-8">
                            <div class="echo-header-top-date">
                                <div class="echo-day-name">
                                    <span><i class="fa-regular fa-calendar"></i></span>
                                    <span id="echo-day" class="echo-home-day"></span>
                                    <span id="echo-date"><?php echo date('j F , Y'); ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-5 col-4 position-relative">
                            <div class="echo-header-top-subs-social-menu">
                                <div class="echo-header-top-subs-social">
                                    <!-- call and contact us header button -->
                                    <div class="echo-header-top-subscribe-btn">
                                        <a href="<?php echo esc_html(get_theme_mod('header_button_link_settings')) ?>" class="echo-py-btn"><i class="fa-solid <?php echo esc_attr(get_theme_mod('header_button_icon_settings')) ?>"></i><?php echo esc_attr__(get_theme_mod('header_contact_button_settings')) ?></a>
                                    </div>
                                    <!-- call and contact us header button -->
                                    <div class="echo-header-top-social-media">
                                        <div class="rts-darkmode">
                                            <a id="rts-data-toggle" class="rts-dark-light"> <i class="rts-go-dark fal fa-moon"></i> <i class="rts-go-light far fa-sun"></i> </a>
                                        </div>
                                        <a href="#" id="search" class="echo-header-top-search-btn search-icon action-item icon">
                                            <svg width="19" height="19" viewbox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9.11544 16.961C13.3484 16.961 16.7798 13.5296 16.7798 9.29665C16.7798 5.06373 13.3484 1.63226 9.11544 1.63226C4.88251 1.63226 1.45105 5.06373 1.45105 9.29665C1.45105 13.5296 4.88251 16.961 9.11544 16.961Z" stroke="#5E5E5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                                <path d="M14.4461 15.0254L17.451 18.0225" stroke="#5E5E5E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                        <div class="search-input-area">
                                            <div class="container">
                                                <div class="search-input-inner">
                                                    <div class="input-div">
                                                        <!-- search input -->
                                                        <?php echo get_search_form('search.php'); ?>
                                                        <!-- search input -->
                                                    </div>
                                                    <div class="search-close-icon">
                                                        <i class="fa-regular fa-xmark-large rt-xmark"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Home-1 Menu & Site Logo & Social Media -->
        <div class="echo-home-1-menu">
            <div class="echo-site-main-logo-menu-social">
                <div class="container">
                    <div class="row align-items-center plr_md--30 plr_sm--30 plr--10">
                        <div class="col-xl-2 col-lg-2 col-md-7 col-sm-7 col-7">
                            <div class="echo-site-logo">
                                <a class="logo-light" href="<?php echo esc_html(home_url('/')); ?>">
                                    <img class="light-mode-logo" src="<?php echo get_theme_mod('light_mode_logo_settings'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                </a>
                                <a class="logo-dark" href="<?php echo esc_html(home_url('/')); ?>">
                                    <img class="dark-mode-logo" src="<?php echo get_theme_mod('dark_mode_logo_settings'); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 d-none d-lg-block">

                            <!-- dynamic desktop menu -->
                            <nav>
                                <div class="echo-home-1-menu">
                                    <?php
                                    wp_nav_menu(array(
                                        'theme_location' => 'Desktop_Menu',
                                        'menu_class'     => 'list-unstyled echo-desktop-menu',
                                        'container'      => false,
                                        'depth'          => 3,
                                        'walker'         => new Echo_Navwalker(),
                                    ));
                                    ?>
                                </div>
                            </nav>

                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-5">
                            <div class="echo-home-1-social-media-icons">
                                <ul class="list-unstyled social-area">

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
                                <div class="echo-header-top-menu-bar menu-btn">
                                    <a href="javascript:void(0)">
                                        <svg width="20" height="19" viewbox="0 0 20 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M0.526001 0.953461H20V3.11724H0.526001V0.953461ZM7.01733 8.52668H20V10.6905H7.01733V8.52668ZM0.526001 16.0999H20V18.2637H0.526001V16.0999Z" fill="#5E5E5E" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Home-1 Menu & Site Logo & Social Media -->

        <!-- side bar for desktop -->
        <div id="side-bar" class="side-bar header-one">
            <div class="inner">
                <button class="close-icon-menu">
                    <i class="far fa-times"></i>
                </button>
            </div>
            <!-- mobile menu area start -->
            <div class="mobile-menu d-block d-lg-none">

                <!-- Dynamic Mobile menu -->
                <nav class="nav-main mainmenu-nav mt--30">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'mobile_Menu',
                        'menu_class'     => 'mainmenu',
                        'menu_id'        => 'mobile-menu-active',
                        'container'      => false,
                        'depth'          => 3,
                        'walker'         => new Echo_Mobile_Navwalker(),
                    ));
                    ?>
                </nav>

                <div class="social-wrapper-one">
                    <ul>
                        <!-- call back the social icon for offcanvas mobile -->
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
            </div>
            <!-- mobile menu area end -->
        </div>
        <!-- header style two End -->
    </header>
    <!-- End Top Header Area -->