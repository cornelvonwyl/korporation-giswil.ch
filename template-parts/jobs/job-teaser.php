<?php

/**
 * Template part for displaying a job teaser
 * 
 * @package vonweb
 */

// Get job fields
$location = get_field('location');
$person = get_field('person');
$workload = get_field('workload');
?>

<a href="<?php the_permalink(); ?>" class="job-teaser">

  <div class="job-teaser__content">
    <h3 class="job-teaser__title"><?php the_title(); ?></h3>

    <div class="job-teaser__details">
      <?php if ($workload): ?>
        <div class="job-teaser__workload">
          <img class="job-teaser__location-icon"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/clock.svg'); ?>"
            alt="Symbol für Pensum">
          <p><?php echo esc_html($workload); ?></p>
        </div>
      <?php endif; ?>
      <?php if ($location): ?>
        <div class="job-teaser__location">
          <img class="job-teaser__location-icon"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/map.svg'); ?>"
            alt="Symbol für Standort">
          <p><?php echo get_the_title($location); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <span class="job-teaser__arrow-container">
    <img class="job-teaser__arrow job-teaser__arrow--primary"
      src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
      alt="Pfeil nach rechts">
    <img class="job-teaser__arrow job-teaser__arrow--secondary"
      src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
      alt="Pfeil nach rechts">
  </span>

</a>