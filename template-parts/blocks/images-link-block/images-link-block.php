<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or its parent block.
 */

$link = get_field('link');
?>

<section class="images-link-block">

  <?php
  include get_template_directory() . '/template-parts/components/gallery.php';
  ?>

  <?php if (!empty($link) && is_array($link)): ?>
    <?php
    // Sanitize and define the link variables.
    $link_url = esc_url($link['url'] ?? '#');
    $link_target = esc_attr($link['target'] ?? '_self');
    $link_title = esc_html($link['title'] ?? 'Untitled Link');
    ?>

    <div class="links-block__link">
      <a class="arrow-link" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
        <?php echo $link_title; ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-up.svg'); ?>"
          alt="Arrow pointing upwards">
      </a>
    </div>
  <?php endif; ?>

</section>