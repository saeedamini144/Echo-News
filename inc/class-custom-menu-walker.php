<?php
class Echo_Navwalker extends Walker_Nav_Menu
{

    // شروع UL
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);

        // کلاس برای سطح اول و بعدی‌ها
        if ($depth === 0) {
            $submenu_class = 'echo-submenu list-unstyled menu-pages';
        } else {
            $submenu_class = 'echo-submenu list-unstyled';
        }

        $output .= "\n$indent<ul class=\"$submenu_class\">\n";
    }

    // شروع LI
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // کلاس‌های li
        $classes   = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'nav-item';

        if (in_array('menu-item-has-children', $classes) && $depth === 0) {
            $classes[] = 'menu-item echo-has-dropdown';
        }

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args, $depth));
        $class_names = ' class="' . esc_attr($class_names) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        // attributes لینک
        $atts           = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        // کلاس لینک برای سطح‌ها
        if ($depth === 0) {
            $atts['class'] = 'echo-dropdown-main-element';
        } else {
            $atts['class'] = 'mobile-menu-link';
        }

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args, $depth);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value       = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // متن لینک
        $title = apply_filters('the_title', $item->title, $item->ID);

        // خروجی آیتم
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // بستن LI
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    // بستن UL
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent  = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}

//mobile menu

class Echo_Mobile_Navwalker extends Walker_Nav_Menu
{

    // شروع UL
    function start_lvl(&$output, $depth = 0, $args = null)
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"submenu\">\n";
    }

    // شروع LI
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
    {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        // کلاس‌های li
        $classes   = empty($item->classes) ? [] : (array) $item->classes;
        $has_children = in_array('menu-item-has-children', $classes);

        $li_classes = ['menu-item'];
        if ($has_children) {
            $li_classes[] = 'has-droupdown'; // فقط وقتی زیرمنو داره
        }

        $class_names = ' class="' . esc_attr(implode(' ', $li_classes)) . '"';

        $output .= $indent . '<li' . $class_names . '>';

        // attributes لینک
        $atts           = [];
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        // کلاس لینک‌ها
        $atts['class'] = $depth === 0 ? 'main' : 'mobile-menu-link';

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value       = ($attr === 'href') ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        // متن لینک
        $title = apply_filters('the_title', $item->title, $item->ID);

        // خروجی لینک
        $item_output  = $args->before;
        $item_output .= '<a' . $attributes . '>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // بستن LI
    function end_el(&$output, $item, $depth = 0, $args = null)
    {
        $output .= "</li>\n";
    }

    // بستن UL
    function end_lvl(&$output, $depth = 0, $args = null)
    {
        $indent  = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }
}
