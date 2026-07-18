<?php

/*
Template Name: Redirect to 1st child page
*/

$children =
    get_children([
        "post_parent" => get_post()->ID,
        "post_type" => "page",
        "numberposts" => 1,
        "orderby" => "menu_order",
        "order" => "ASC",
        "post_status" => "publish",
    ]) ?:
    [];

if (!empty($children)) {
    nocache_headers();

    foreach ($children as $child) {
        if (wp_safe_redirect(get_permalink($child), 301)) {
            exit();
        }
    }
}

require_once "page.php";
?>
