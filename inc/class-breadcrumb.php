<?php

if (!defined('ABSPATH')) exit;

include_once ABSPATH . 'wp-admin/includes/plugin.php';

class Breadcrumb
{

    public function render()
    {

        // Yoast
        if (is_plugin_active('wordpress-seo/wp-seo.php') && function_exists('yoast_breadcrumb')) {
            yoast_breadcrumb('<nav class="breadcrumbs" aria-label="breadcrumb">', '</nav>');
            return;
        }

        // RankMath
        if (is_plugin_active('rank-math/rank-math.php') && function_exists('rank_math_the_breadcrumbs')) {
            rank_math_the_breadcrumbs();
            return;
        }

        // Custom fallback
        $breadcrumbs = $this->build_items();
        $this->render_html($breadcrumbs);
        $this->render_jsonld($breadcrumbs);
    }

    private function build_items()
    {

        $items   = [];
        $items[] = ['url' => home_url('/'), 'label' => 'Home'];

        // --- Single Post ---
        if (is_singular('post')) {

            $cats = get_the_category();
            if (!empty($cats)) {
                $cat = $this->get_primary_category($cats[0]);

                // Add parents
                $items = array_merge($items, $this->get_category_hierarchy($cat));

                // Add post
                $items[] = [
                    'url'   => get_permalink(),
                    'label' => get_the_title()
                ];
            }
        }

        // --- Page (hierarchical) ---
        elseif (is_page()) {
            global $post;

            if ($post->post_parent) {
                $parents = array_reverse(get_post_ancestors($post->ID));
                foreach ($parents as $parent_id) {
                    $items[] = [
                        'url'   => get_permalink($parent_id),
                        'label' => get_the_title($parent_id)
                    ];
                }
            }

            $items[] = [
                'url'   => get_permalink(),
                'label' => get_the_title()
            ];
        }

        // --- Category Archive ---
        elseif (is_category()) {

            $cat = get_queried_object();
            $items = array_merge($items, $this->get_category_hierarchy($cat));
        }

        // --- Search ---
        elseif (is_search()) {
            $items[] = ['url' => '', 'label' => 'Searching for : ' . get_search_query()];
        }

        // --- 404 ---
        elseif (is_404()) {
            $items[] = ['url' => '', 'label' => 'Page Not Found'];
        }

        return $items;
    }

    private function get_primary_category($cat)
    {
        return get_category($cat->term_id);
    }

    private function get_category_hierarchy($category)
    {

        $chain = [];

        if ($category->parent != 0) {
            $parents = array_reverse(get_ancestors($category->term_id, 'category'));
            foreach ($parents as $parent_id) {
                $chain[] = [
                    'url'   => get_category_link($parent_id),
                    'label' => get_cat_name($parent_id)
                ];
            }
        }

        // add current category
        $chain[] = [
            'url'   => get_category_link($category->term_id),
            'label' => $category->name
        ];

        return $chain;
    }

    private function render_html($items)
    {

        echo '<nav class="breadcrumbs" aria-label="breadcrumb"><ul>';

        $last_index = count($items) - 1;

        foreach ($items as $i => $it) {

            // اگر آخرین آیتم است → لینک نباشد
            if ($i === $last_index) {
                echo '<li class="current">' . esc_html($it['label']) . '</li>';
                continue;
            }

            // بقیه آیتم‌ها لینک‌دار
            echo '<li><a href="' . esc_url($it['url']) . '">' . esc_html($it['label']) . '</a></li>';
        }

        echo '</ul></nav>';
    }


    private function render_jsonld($items)
    {

        $json = [
            "@context"        => "https://schema.org",
            "@type"           => "BreadcrumbList",
            "itemListElement" => []
        ];

        foreach ($items as $i => $item) {
            $json["itemListElement"][] = [
                "@type"    => "ListItem",
                "position" => $i + 1,
                "name"     => $item['label'],
                "item"     => $item['url']
            ];
        }

        echo '<script type="application/ld+json">' . wp_json_encode($json, JSON_UNESCAPED_UNICODE) . '</script>';
    }
}

// call back in functions.php or template files like this:
// require_once get_template_directory() . '/inc/class-breadcrumb.php';

// function breadcrumb()
// {
//     $breadcrumb = new Breadcrumb();
//     $breadcrumb->render();
// }

// call back where ever you want show breadcrumb
// <?php breadcrumb(); 
