<?php

?>

<a href="<?php the_permalink(); ?>" class="location-teaser">
    <h3 class="location-teaser__title"><?php the_title(); ?></h3>

    <img class="location-teaser__icon"
        src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
        alt="Pfeil nach rechts">
</a>