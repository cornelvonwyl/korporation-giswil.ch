<?php

/**
 * Template part for displaying breadcrumb navigation
 * 
 * @param array $items Optional. Array of breadcrumb items. Each item should have 'title' and 'url' (optional) keys.
 */

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

$items = isset($args['items']) ? $args['items'] : [];

// Always add Home as the first item
$breadcrumb_items = [
  ['title' => 'Home', 'url' => home_url('/')]
];

// Append any additional items
if (!empty($items)) {
  $breadcrumb_items = array_merge($breadcrumb_items, $items);
}
?>

<nav class="breadcrumb" aria-label="Breadcrumb">
  <ul>
    <?php foreach ($breadcrumb_items as $index => $item): ?>
      <li>
        <?php if (!empty($item['url'])): ?>
          <a href="<?php echo esc_url($item['url']); ?>"><?php echo esc_html($item['title']); ?></a>
        <?php else: ?>
          <span><?php echo esc_html($item['title']); ?></span>
        <?php endif; ?>
        <?php if ($index < count($breadcrumb_items) - 1): ?>
          <span class="breadcrumb-separator">→</span>
        <?php endif; ?>
      </li>
    <?php endforeach; ?>
  </ul>
</nav>