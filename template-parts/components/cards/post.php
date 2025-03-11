<?php
$thumbnail = get_the_post_thumbnail_url(get_the_ID(), 'large');
$categories = get_the_category();
?>

<article class="card card--post">
    <?php if ($thumbnail): ?>
      <div class="card__image">
          <img src="<?php echo esc_url($thumbnail); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
      </div>
    <?php endif; ?>

    <div class="card__content">
        <?php if (!empty($categories)): ?>
          <div class="card__categories">
              <?php foreach ($categories as $category): ?>
                <span class="category-tag"><?php echo esc_html($category->name); ?></span>
              <?php endforeach; ?>
          </div>
        <?php endif; ?>

        <h3 class="card__title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>

        <div class="card__meta">
            <time datetime="<?php echo get_the_date('c'); ?>"><?php echo get_the_date(); ?></time>
        </div>

        <div class="card__excerpt">
            <?php the_excerpt(); ?>
        </div>

        <a href="<?php the_permalink(); ?>" class="card__link">
            Weiterlesen
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
            </svg>
        </a>
    </div>
</article>