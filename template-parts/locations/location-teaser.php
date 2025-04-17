<?php
// Get arguments if provided, otherwise use current post data
$title = isset($args['title']) ? $args['title'] : get_the_title();
$link = isset($args['link']) ? $args['link'] : get_permalink();

get_template_part('template-parts/elements/cta-list-item', null, array(
    'title' => $title,
    'link' => $link
));
