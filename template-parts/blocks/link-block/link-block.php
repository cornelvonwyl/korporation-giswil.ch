<?php

/**
 * Testimonial Block Template with Flexible Content.
 *
 * @param   array  $block    The block settings and attributes.
 * @param   string $content  The block inner HTML (empty).
 * @param   bool   $is_preview True during backend preview render.
 * @param   int    $post_id  The post ID the block is rendering content against.
 *                           This is either the post ID currently being displayed inside a query loop,
 *                           or the post ID of the post hosting this block.
 * @param   array  $context  The context provided to the block by the post or its parent block.
 */

// Check if the Flexible Content field has rows.
if (have_rows('links')): ?>
  <div class="links-block">
    <?php while (have_rows('links')):
      the_row(); ?>
      <?php if (get_row_layout() == 'link'):
        $link = get_sub_field('link');
        if (!empty($link) && is_array($link)):
          $link_url = esc_url($link['url'] ?? '#');
          $link_target = esc_attr($link['target'] ?? '_self');
          $link_title = esc_html($link['title'] ?? 'Untitled Link');
          ?>
          <div class="links-block__link">
            <a class="arrow-link" href="<?php echo $link_url; ?>" target="<?php echo $link_target; ?>">
              <?php echo $link_title; ?>
              <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-up.svg'); ?>"
                alt="Pfeil nach rechts oben">
            </a>
          </div>
        <?php endif; ?>

      <?php elseif (get_row_layout() == 'download'):
        $file = get_sub_field('download');
        if (!empty($file) && is_array($file)):
          $file_url = esc_url($file['url'] ?? '#');
          $file_title = esc_html($file['title'] ?? 'Download File');
          ?>
          <div class="links-block__download">
            <a class="download-link" href="<?php echo $file_url; ?>" download>
              <?php echo $file_title; ?>

              <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/download.svg'); ?>"
                alt="Download Icon">
            </a>

          </div>
        <?php endif; ?>
      <?php endif; ?>
    <?php endwhile; ?>
  </div>
<?php else: ?>
  <p>No content available.</p>
<?php endif; ?>
