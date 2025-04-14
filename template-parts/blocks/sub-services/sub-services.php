<?php

/**
 * Sub Service Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'sub-services-' . $block['id'];
if (!empty($block['anchor'])) {
  $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'sub-services';
if (!empty($block['className'])) {
  $class_name .= ' ' . $block['className'];
}

// Load values and assign defaults.
$services = get_field('services');

// Group services by target group
$grouped_services = array();
$target_groups = array();

if (have_rows('services')):
  while (have_rows('services')): the_row();
    if (get_row_layout() == 'sub-service'):
      $target_group = get_sub_field('target_group') ?: 'none';
      if (!in_array($target_group, $target_groups)) {
        $target_groups[] = $target_group;
      }
      $grouped_services[$target_group][] = array(
        'icon' => get_sub_field('icon'),
        'title' => get_sub_field('title'),
        'content' => get_sub_field('text')
      );
    endif;
  endwhile;
endif;


?>

<div id="sub-services" class="<?php echo esc_attr($class_name); ?>">
  <h2 class="sr-only">Unsere Leistungen im Bereich <?php echo get_the_title(); ?></h2>
  <?php if (count($target_groups) > 1): ?>
    <div class="sub-services__tabs" role="tablist">
      <?php foreach ($target_groups as $index => $group): ?>
        <button
          class="sub-services__tab animated-button <?php echo $group === 'privat' ? 'is-active' : ''; ?>"
          role="tab"
          aria-selected="<?php echo $group === 'privat' ? 'true' : 'false'; ?>"
          data-target="<?php echo esc_attr($group); ?>">
          <?php
          switch ($group) {
            case 'privat':
              echo 'Privatkunden';
              break;
            case 'business':
              echo 'Geschäftskunden';
              break;
            default:
              echo 'Alle';
          }
          ?>
        </button>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>

  <?php foreach ($target_groups as $index => $group): ?>
    <div
      class="sub-services__panel <?php echo $group === 'privat' ? 'is-active' : ''; ?>"
      role="tabpanel"
      data-group="<?php echo esc_attr($group); ?>">
      <?php foreach ($grouped_services[$group] as $service): ?>
        <article class="sub-service animation-on-scroll">
          <?php if ($service['icon']): ?>
            <div class="sub-service__icon" aria-hidden="true">
              <?php echo wp_get_attachment_image($service['icon']['ID'], 'small', FALSE, array(
                'class' => 'sub-service__icon-img',
                'alt' => '',
              )); ?>
            </div>
          <?php endif; ?>

          <?php if ($service['title']): ?>
            <h3 class="sub-service__title"><?php echo esc_html($service['title']); ?></h3>
          <?php endif; ?>

          <?php if ($service['content']): ?>
            <div class="sub-service__content">
              <?php echo wp_kses_post($service['content']); ?>
            </div>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>
    </div>
  <?php endforeach; ?>
</div>