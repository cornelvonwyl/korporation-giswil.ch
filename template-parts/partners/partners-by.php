<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

if (have_rows('partners')): ?>
  <section class="partners-by">
    <div class="partners-by__container">
      <div class="partners-by__header">
        <p class="partners-by__subtitle subtitle">Unsere Partner</p>
      </div>

      <div class="partners-by__grid">
        <?php while (have_rows('partners')):
          the_row();
          if (get_row_layout() == 'partner'):
            $partner = get_sub_field('partner');

            if ($partner && !empty($partner)): ?>
              <div class="partners-by__item">
                <?php if (!empty($partner['logo']) && !empty($partner['link'])): ?>
                  <a href="<?php echo esc_url($partner['link']); ?>" target="_blank" rel="noopener noreferrer"
                    class="partners-by__link">
                    <div class="partners-by__image">
                      <?php echo wp_get_attachment_image($partner['logo']['ID'], 'small'); ?>
                    </div>
                  </a>
                <?php endif; ?>
              </div>
            <?php endif; ?>
          <?php endif; ?>
        <?php endwhile; ?>
      </div>
    </div>
  </section>
<?php endif; ?>