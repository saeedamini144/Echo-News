<?php
get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();
?>
        <?php
        the_content();
        ?>
    <?php
    }
} else {
    echo esc_html__('No content found', 'EchoNews');
}
get_footer();
