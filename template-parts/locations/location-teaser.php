<a href="<?php the_permalink(); ?>" class="location-teaser">
    <h3 class="location-teaser__title"><?php the_title(); ?></h3>

    <span class="location-teaser__arrow-container">
        <img class="location-teaser__arrow location-teaser__arrow--primary"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
            alt="Pfeil nach rechts">
        <img class="location-teaser__arrow location-teaser__arrow--secondary"
            src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
            alt="Pfeil nach rechts">
    </span>
</a>