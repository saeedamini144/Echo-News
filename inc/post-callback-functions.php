<?php


function EchoNews_get_all_category()
{
    $categories = get_categories();
    $cat_options = array();
    foreach ($categories as $category) {
        $cat_options[$category->term_id] = $category->name;
    }
    return $cat_options;
}
