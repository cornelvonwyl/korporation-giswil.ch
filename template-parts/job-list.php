<?php
/**
 * Template part for displaying job list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vonweb
 */
?>

<div class="job-list">
    <h2 class="job-list__title">Weitere Stellen</h2>
    <ul class="job-list__items">
        <?php
        $args = array(
          'post_type' => 'job',
          'post_status' => 'publish',
          'posts_per_page' => -1,
        );
        $jobs = new WP_Query($args);

        if ($jobs->have_posts()):
          while ($jobs->have_posts()):
            $jobs->the_post(); ?>
            <li class="job-list__item">
                <a href="<?php the_permalink(); ?>" class="job-list__link">
                    <?php the_title(); ?>

                    <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
                        alt="Pfeil nach rechts">

                </a>
            </li>
          <?php endwhile;
        else: ?>
          <li class="job-list__item--empty">Aktuell keine freien Stellen.</li>
        <?php endif;

        wp_reset_postdata();
        ?>
    </ul>
</div>