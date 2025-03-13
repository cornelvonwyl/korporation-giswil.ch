<?php
$thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
$categories = get_the_category();
?>

<a href="<?php the_permalink(); ?>" class="full-element-link">
  <article class="news-card">
    <?php if ($thumbnail): ?>
      <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
    <?php endif; ?>

    <div class="news-card__content">
      <?php if (!empty($categories)): ?>
        <div class="news-card__categories">
          <?php foreach ($categories as $category): ?>
            <p class="category-tag"><?php echo esc_html($category->name); ?></p>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

      <h3 class="news-card__title">
        <?php the_title(); ?>
      </h3>
      <div class="news-card__excerpt"><?php the_excerpt(); ?></div>

      <p class="news-card__link">
        Mehr
      </p>
    </div>
  </article>
</a>