<?php

/**
 * Template part for displaying referenzen overview
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package your-theme-name
 */

// Get referenzen from passed arguments
$referenzen = isset($args['referenzen']) ? $args['referenzen'] : array();
?>

<div class="referenzen-overview">
  <div class="referenzen-overview__container">
    <ul class="referenzen-overview__items">
      <?php if (!empty($referenzen)):
        foreach ($referenzen as $referenz):
          $service_references = get_field('service_references', $referenz->ID);
          $service_classes = '';

          if ($service_references):
            foreach ($service_references as $service):
              $service_classes .= ' service-' . esc_attr($service->post_name);
            endforeach;
          endif;
      ?>
          <li class="referenzen-overview__item<?php echo esc_attr($service_classes); ?>">
            <?php get_template_part('template-parts/referenzen/referenz-card', NULL, ['referenz' => $referenz]); ?>
          </li>
        <?php endforeach;
      else: ?>
        <li class="referenzen-overview__item--empty">Aktuell keine Referenzen verfügbar.</li>
      <?php endif; ?>
    </ul>
  </div>
</div>