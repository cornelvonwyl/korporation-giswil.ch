<?php

if (!defined('ABSPATH')) {
  exit;
}

// Get post object from args or use global post
$post_item = isset($args['post']) ? $args['post'] : get_post();

if (!$post_item) {
  return;
}

$date = get_the_date('j. F Y', $post_item);
$title = get_the_title($post_item);
$fields = get_field('fields', $post_item->ID);
$link = get_permalink($post_item);

// Get field titles if fields exist
$category = null;

if (!empty($fields)) {
  $field_titles = [];
  foreach ($fields as $field) {
    $field_titles[] = get_the_title($field);
  }
  // Create a mock category object to match the card component's expected structure
  $category = (object) ['name' => implode(', ', $field_titles)];
} else {
  // Set default category when no fields are available
  $category = (object) ['name' => 'Allgemein'];
}

get_template_part('template-parts/components/card', null, [
  'date' => $date,
  'title' => $title,
  'category' => $category,
  'link' => $link
]);
