<?php

/**
 * Template part for displaying a job teaser
 * 
 * @package vonweb
 */

// Get job fields
$location = get_field('location', get_the_ID());
$person = get_field('person', get_the_ID());
$workload = get_field('workload', get_the_ID());
?>

<a href="<?php the_permalink(); ?>" class="job-teaser">

  <div class="job-teaser__content">
    <h3 class="job-teaser__title"><?php the_title(); ?></h3>

    <div class="job-teaser__details">
      <?php if ($workload): ?>
        <div class="job-teaser__workload">
          <img class="job-teaser__location-icon"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/clock.svg'); ?>"
            alt="Symbol für Pensum"
            width="16"
            height="16">
          <p><?php echo esc_html($workload); ?></p>
        </div>
      <?php endif; ?>
      <?php if ($location): ?>
        <div class="job-teaser__location">
          <img class="job-teaser__location-icon"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/map.svg'); ?>"
            alt="Symbol für Standort"
            width="16"
            height="16">
          <p><?php echo get_the_title($location); ?></p>
        </div>
      <?php endif; ?>
    </div>
  </div>

  <div class="job-teaser__arrow-container">
    <img class="job-teaser__arrow job-teaser__arrow--primary"
      src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
      alt="Pfeil nach rechts"
      width="24"
      height="24">
    <img class="job-teaser__arrow job-teaser__arrow--secondary"
      src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
      alt="Pfeil nach rechts"
      width="24"
      height="24">
  </div>

</a>