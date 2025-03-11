<?php
$title = get_field('furrer_power_title');
$text = get_field('furrer_power_text');
$images = get_field('furrer_power_images');
$cta = get_field('furrer_power_cta');
?>

<section class="section section--furrer-power">
  <div class="container">
    <div class="furrer-power-grid">
      <div class="furrer-power-content">
        <?php if ($title): ?>
          <h2 class="furrer-power-content__title"><?php echo wp_kses_post($title); ?></h2>
        <?php endif; ?>

        <?php if ($text): ?>
          <div class="furrer-power-content__text">
            <?php echo wp_kses_post($text); ?>
          </div>
        <?php endif; ?>

        <?php if ($cta): ?>
          <a href="<?php echo esc_url($cta['url']); ?>" class="button button--secondary">
            <?php echo esc_html($cta['title']); ?>
          </a>
        <?php endif; ?>
      </div>

      <?php if ($images): ?>
        <div class="furrer-power-images">
          <?php foreach ($images as $image): ?>
            <div class="furrer-power-images__item">
              <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>