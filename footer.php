<!-- Start Footer Area -->
<!-- Start Footer Area -->
<footer class="echo-footer-area" id="footer">
    <div class="container">
        <div class="echo-row">
            <div class="echo-footer-content-1">
                <div class="echo-get-in-tuch">
                    <!-- change the title of the footer col1 -->
                    <<?php echo esc_html(get_theme_mod('tag_heading_footer_first_col_settings')) ?> class="footer-first-col">
                        <?php echo esc_html(get_theme_mod('title_footer_first_col_settings')) ?>
                    </<?php echo esc_html(get_theme_mod('tag_heading_footer_first_col_settings')) ?>>
                </div>
                <div class="echo-footer-address">

                    <!-- call back the repeatable footer first column settings from customizer -->
                    <?php
                    $footer_col1_content = get_theme_mod('footer_first_col_repeatable_content_settings');
                    if (!empty($footer_col1_content) && is_array($footer_col1_content)) {
                        foreach ($footer_col1_content as $key => $values) {
                    ?>
                            <a href="<?php echo esc_attr($values['footer_first_col_link']) ?>"> <span class="text-capitalize"><i class=" <?php echo esc_attr($values['footer_first_col_icon']) ?>"></i><?php echo esc_attr($values['footer_first_col_text']) ?></span>
                            </a>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="echo-footer-content-2">
                <div class="echo-get-in-tuch">
                    <!-- change the title of the footer col2 -->
                    <<?php echo esc_html(get_theme_mod('tag_heading_footer_second_col_settings', 'h2')); ?>>
                        <?php echo esc_html(get_theme_mod('title_footer_second_col_settings')); ?>
                    </<?php echo esc_html(get_theme_mod('tag_heading_footer_second_col_settings')); ?>>
                </div>
                <div class="echo-footer-most-popular">
                    <!-- call back the repeatable footer second column settings from customizer -->
                    <?php
                    $footer_col2_content = get_theme_mod('footer_second_col_repeatable_content_settings');
                    if (!empty($footer_col2_content) && is_array($footer_col2_content)) {
                        foreach ($footer_col2_content as $key => $values) {
                    ?>
                            <a href="<?php echo esc_attr($values['footer_second_col_link']) ?>"> <span class="text-capitalize"><i class=" <?php echo esc_attr($values['footer_second_col_icon']) ?>"></i><?php echo esc_attr($values['footer_second_col_text']) ?></span></a>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="echo-footer-content-3">
                <div class="echo-get-in-tuch">
                    <!-- change the title of the footer col3 -->
                    <<?php echo esc_html(get_theme_mod('tag_heading_footer_third_col_settings', 'h2')); ?>>
                        <?php echo esc_html(get_theme_mod('title_footer_third_col_settings')); ?>
                    </<?php echo esc_html(get_theme_mod('tag_heading_footer_third_col_settings')); ?>>
                </div>
                <div class="echo-footer-help">
                    <!-- call back the repeatable footer third column settings from customizer -->
                    <?php
                    $footer_col3_content = get_theme_mod('footer_third_col_repeatable_content_settings');
                    if (!empty($footer_col3_content) && is_array($footer_col2_content)) {
                        foreach ($footer_col3_content as $key => $values) {
                    ?>
                            <a href="<?php echo esc_attr($values['footer_third_col_link']) ?>"> <span class="text-capitalize"><i class=" <?php echo esc_attr($values['footer_third_col_icon']) ?>"></i><?php echo esc_attr($values['footer_third_col_text']) ?></span></a>
                    <?php
                        }
                    }

                    ?>
                </div>
            </div>
            <div class="echo-footer-content-4">
                <div class="echo-get-in-tuch">
                    <!-- change the title of the footer col4 -->
                    <<?php echo esc_html(get_theme_mod('tag_heading_footer_fourth_col_settings', 'h2')); ?>>
                        <?php echo esc_html(get_theme_mod('title_footer_fourth_col_settings')); ?>
                    </<?php echo esc_html(get_theme_mod('tag_heading_footer_fourth_col_settings')); ?>>
                </div>
                <div class="echo-footer-news-text">
                    <!-- call back the textarea footer fourth column settings from customizer -->
                    <?php
                    $footer_text =  get_theme_mod('textarea_footer_fourth_col_settings');
                    echo wp_kses_post($footer_text);
                    ?>
                </div>
            </div>
        </div>
        <div class="echo-footer-copyright-area">
            <div class="copyright-area-inner">
                <div class="copyright-content">
                    <!-- call back the footer copyright text from customizer -->
                    <?php
                    $footer_copyright = get_theme_mod('footer_copyright_text_settings');
                    echo wp_kses_post($footer_copyright);
                    ?>
                </div>
            </div>
        </div>
</footer>
<!-- End Footer Area -->
<!--scroll top button-->
<button class="scroll-top-btn">
    <i class="fa-regular fa-angles-up"></i>
</button>
<!-- End Footer Area -->
</body>

<?php wp_footer(); ?>

</html>