<?php
$icon = get_field('icon');
$teaser = get_field('teaser_text');
?>

<a href="<?php the_permalink(); ?>" class="full-element-link">
    <div class="service-card">
        <?php if ($icon): ?>
          <div class="service-card__icon">
              <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>">
          </div>
        <?php endif; ?>

        <h3 class="service-card__title"><?php the_title(); ?></h3>

        <?php if ($teaser): ?>
          <div class="service-card__teaser">
              <?php echo esc_html($teaser); ?>
          </div>
        <?php endif; ?>


        <p class="service-card__link"> Mehr
        </p>

    </div>
</a>