<?php

global $post;
$slug = get_queried_object()->slug;
$my_sanitized_slug = str_replace("-", "%20", $slug);
$my_site = get_site_url();
$target_url = $my_site . "/people/?search=" . $my_sanitized_slug;
wp_redirect( $target_url );
    exit();