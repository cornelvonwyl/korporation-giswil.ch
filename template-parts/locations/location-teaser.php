<?php
$title = get_the_title();
$link = get_permalink();


get_template_part('template-parts/elements/cta-list-item', null, array(
    'title' => $title,
    'link' => $link
));
