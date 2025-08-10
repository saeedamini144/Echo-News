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

                                            <?php echo get_template_part('template-parts/vertical-slider-post'); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-7 col-8">
                            <div class="echo-header-top-date">
                                <div class="echo-day-name">
                                    <span><i class="fa-regular fa-calendar"></i></span>
                                    <span id="echo-day" class="echo-home-day"></span>
                                    <span id="echo-date"></span>
                                </div>
                                <div class="echo-date-time">
                                    <span><i class="fa-regular fa-cloud"></i></span>
                                    <span><strong>31°C,</strong> New York </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-5 col-4 position-relative">
                            <div class="echo-header-top-subs-social-menu">
                                <div class="echo-header-top-subs-social">
                                    <div class="echo-header-top-subscribe-btn">
                                        <a href="#" class="echo-py-btn" onclick="document.getElementById('id01').style.display='inline'"><i class="fa-regular fa-envelope"></i> Subscribe</a>
                                    </div>
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
                                                        <input id="searchInput1" class="search-input" type="text" placeholder="Search by keyword or #">
                                                    </div>
                                                    <div class="search-close-icon">
                                                        <i class="fa-regular fa-xmark-large rt-xmark"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
        </div>
        <!-- Start Home-1 Menu & Site Logo & Social Media -->
        <div class="echo-home-1-menu">
            <div class="echo-site-main-logo-menu-social">
                <div class="container">
                    <div class="row align-items-center plr_md--30 plr_sm--30 plr--10">
                        <div class="col-xl-2 col-lg-2 col-md-7 col-sm-7 col-7">
                            <div class="echo-site-logo">
                                <a class="logo-light" href="index-2.html">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/site-logo/site-logo.svg" alt="Echo">
                                </a>
                                <a class="logo-dark" href="index-2.html">
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/site-logo/site-logo-dark.svg" alt="Echo">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-7 col-lg-7 d-none d-lg-block">
                            <nav>
                                <div class="echo-home-1-menu">
                                    <ul class="list-unstyled echo-desktop-menu">
                                        <li class="menu-item echo-has-dropdown">
                                            <a href="#" class="echo-dropdown-main-element active">Home</a>
                                            <!-- Start Dropdown Menu -->
                                            <ul class="echo-submenu list-unstyled menu-home">
                                                <li class="nav-item">
                                                    <a href="index-2.html">Home 01 - Main</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="index-two.html">Home 02 - Fashion</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="index-three.html">Home 03 - Technology</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-four.html">Home 04 - Gamming</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-five.html">Home 05 - Sports</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-six.html">Home 06 - Travel</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-seven.html">Home 07 - AI</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-eight.html">Home 08 - Politics</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-nine.html">Home 09 - Food</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="mobile-menu-link" href="index-ten.html">Home 10 - Photography</a>
                                                </li>
                                            </ul>
                                            <!-- End Dropdown Menu -->
                                        </li>
                                        <li class="menu-item echo-has-dropdown">
                                            <a href="#" class="echo-dropdown-main-element">Pages</a>
                                            <ul class="echo-submenu list-unstyled menu-pages">
                                                <li class="nav-item">
                                                    <a href="about.html">About</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="author.html">Author</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="team.html">Team</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="404.html">Error Page</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item echo-has-dropdown">
                                            <a href="#" class="echo-dropdown-main-element">Category</a>
                                            <ul class="echo-submenu list-unstyled menu-pages">
                                                <li class="nav-item">
                                                    <a href="category-style-1.html">Category Style 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="category-style-2.html">Category Style 2</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="category-style-3.html">Category Style 3</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item echo-has-dropdown">
                                            <a href="#" class="echo-dropdown-main-element">News</a>
                                            <ul class="mega-menu list-unstyled menu-pages">
                                                <li class="nav-item">
                                                    <a href="post-style-1.html">
                                                        <div class="mega-menu-item">
                                                            <div class="mega-menu-img img-transition-scales">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/latest-news/item-1.png" alt="Echo" class="img-hovers">
                                                            </div>
                                                            <div class="mega-menu-title">
                                                                <h5>Xi, Putin hail 'new era'....</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-style-2.html">
                                                        <div class="mega-menu-item">
                                                            <div class="mega-menu-img img-transition-scales">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/latest-news/item-2.png" alt="Echo" class="img-hovers">
                                                            </div>
                                                            <div class="mega-menu-title">
                                                                <h5>Elon Musk's global empire....</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-style-3.html">
                                                        <div class="mega-menu item">
                                                            <div class="mega-menu-img img-transition-scales">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/latest-news/item-3.png" alt="Echo" class="img-hovers">
                                                            </div>
                                                            <div class="mega-menu-title">
                                                                <h5>Sri Lanka to receive first ....</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-details.html">
                                                        <div class="mega-menu item">
                                                            <div class="mega-menu-img img-transition-scales">
                                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/latest-news/item-4.png" alt="Echo" class="img-hovers">
                                                            </div>
                                                            <div class="mega-menu-title">
                                                                <h5>Turkey earthquake prepare....</h5>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item echo-has-dropdown">
                                            <a href="#" class="echo-dropdown-main-element">Post</a>
                                            <ul class="echo-submenu list-unstyled menu-pages">
                                                <li class="nav-item">
                                                    <a href="post-style-1.html">Post Style 1</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-style-2.html">Post Style 2</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-style-3.html">Post Style 3</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a href="post-details.html">Post Details</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li class="menu-item">
                                            <a href="contact.html" class="echo-dropdown-main-element">Contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-5 col-sm-5 col-5">
                            <div class="echo-home-1-social-media-icons">
                                <ul class="list-unstyled social-area">
                                    <li>
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    </li>
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
                <!-- inner menu area desktop start -->
                <div class="inner-main-wrapper-desk d-none d-lg-block">
                    <div class="thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/sidemenu-logo.svg" alt="echo">
                    </div>
                    <div class="inner-content">
                        <div class="category-menu-area">
                            <ul class="category-area">
                                <li class="item">
                                    <div class="image-area">
                                        <a href="#">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-style-1/1.png" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="recent-post-title">
                                            <a href="#">The incident began as an argument among.</a>
                                        </div>
                                        <p class="desc"><a href="#"><i class="fa-light fa-user"></i>Asley Graham</a></p>
                                    </div>
                                </li>
                                <li class="item">
                                    <div class="image-area">
                                        <a href="#">
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/category-style-1/2.png" alt="">
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="recent-post-title">
                                            <a href="#">The incident began as an argument among.</a>
                                        </div>
                                        <p class="desc"><a href="#"><i class="fa-light fa-user"></i>Emily Dicingson</a></p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="newsletter-form">
                            <div class="form-inner">
                                <div class="content">
                                    <div class="newsletter-image">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/news-item-1.png" alt="">
                                    </div>
                                    <h3 class="title">Get Newsletter</h3>
                                    <p class="desc">Notification products, updates</p>
                                </div>
                                <form action="#">
                                    <div class="input-div">
                                        <input type="email" placeholder="Your email..." required>
                                    </div>
                                    <button type="submit" class="subscribe-btn">Subscribe Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- mobile menu area start -->
            <div class="mobile-menu d-block d-lg-none">
                <nav class="nav-main mainmenu-nav mt--30">
                    <ul class="mainmenu" id="mobile-menu-active">
                        <li class="has-droupdown">
                            <a href="#" class="main">Home</a>
                            <ul class="submenu">
                                <li>
                                    <a class="mobile-menu-link" href="index-2.html">Home 01 - Main</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-two.html">Home 02 - Fashion</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-three.html">Home 03 - Technology</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-four.html">Home 04 - Gamming</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-five.html">Home 05 - Sports</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-six.html">Home 06 - Travel</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-seven.html">Home 07 - AI</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-eight.html">Home 08 - Politics</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-nine.html">Home 09 - Food</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="index-ten.html">Home 10 - Photography</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="main mobile-menu-link" href="about.html">About</a>
                        </li>
                        <li class="has-droupdown">
                            <a href="#" class="main">Category</a>
                            <ul class="submenu">
                                <li>
                                    <a class="mobile-menu-link" href="category-style-1.html">Category Style 1</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="category-style-2.html">Category Style 2</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="category-style-3.html">Category Style 3</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-droupdown">
                            <a href="#" class="main">Features</a>
                            <ul class="submenu">
                                <li>
                                    <a class="mobile-menu-link" href="author.html">Author</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="team.html">Team</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="404.html">Error Page</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-droupdown">
                            <a href="#" class="main">Post</a>
                            <ul class="submenu">
                                <li>
                                    <a class="mobile-menu-link" href="post-style-1.html">Post Style 1</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="post-style-2.html">Post Style 2</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="post-style-3.html">Post Style 3</a>
                                </li>
                                <li>
                                    <a class="mobile-menu-link" href="post-details.html">Post Details</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item">
                            <a class="main mobile-menu-link" href="contact.html">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="social-wrapper-one">
                    <ul>
                        <li>
                            <a href="#"> <i class="fa-brands fa-facebook-f"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa-brands fa-twitter"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa-brands fa-youtube"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa-brands fa-instagram"></i> </a>
                        </li>
                        <li>
                            <a href="#"> <i class="fa-brands fa-linkedin-in"></i> </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- mobile menu area end -->
        </div>
        <!-- header style two End -->
        <!-- Start Subscribe Popup Box -->
        <div class="echo-popup-model" id="id01">
            <div class="echo-popup-transition">
                <div class="model-content animate-subscribe-popup">
                    <a href="javascript:void(0)" onclick="document.getElementById('id01').style.display='none'"><i class="fa-regular fa-xmark"></i></a>
                    <div class="echo-p-flexing">
                        <div class="echo-p-img">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home-1/feature-right/news-item-1.png" alt="Echo">
                        </div>
                        <div class="form">
                            <div class="echo-p-sub-heading">
                                <p>Weekly Updates</p>
                            </div>
                            <div class="echo-p-sub-heading">
                                <h3>Let's join our newsletter!</h3>
                            </div>
                            <form method="POST">
                                <input type="email" required placeholder="Enter Your Email..">
                                <button type="submit">Submit</button>
                            </form>
                            <div class="echo-bottom-popup">
                                <p>Do not worry we don't spam!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Subscribe Popup Box -->
        <!-- End Top Header Area -->
        <!-- Top To Scroll -->
        <!-- End Top scroll -->
    </header>
    <!-- End Top Header Area -->