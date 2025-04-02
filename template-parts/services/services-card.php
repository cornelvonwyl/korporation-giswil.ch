<?php
$icon = get_field('icon');
$teaser = get_field('teaser_text');
?>

<li class="animation-on-scroll">
  <a href="<?php the_permalink(); ?>" class="full-element-link">
    <article class="service-card">

      <div>
        <?php if ($icon): ?>
          <div class="service-card__icon">
            <img src="<?php echo esc_url($icon['url']); ?>" alt="<?php echo esc_attr($icon['alt']); ?>" width="64" height="64">
          </div>
        <?php endif; ?>

        <h3 class="service-card__title"><?php the_title(); ?></h3>

        <?php if ($teaser): ?>
          <p class="service-card__teaser">
            <?php echo esc_html($teaser); ?>
          </p>
        <?php endif; ?>

      </div>
      <p class="service-card__link">
        Mehr
      </p>

    </article>
  </a>
</li>