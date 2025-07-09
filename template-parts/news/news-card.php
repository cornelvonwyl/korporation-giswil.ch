<?php

if (!defined('ABSPATH')) {
  exit;
}

$date = get_the_date('j. F Y');
$title = get_the_title();
$fields = get_field('fields', get_the_ID());
$link = get_permalink();

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
