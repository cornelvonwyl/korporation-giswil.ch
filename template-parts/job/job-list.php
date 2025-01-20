<?php
/**
 * Template part for displaying job list
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package vonweb
 */
?>
<?php
$current_post_id = get_the_ID();

$args = array(
  'post_type' => 'stelle',
  'post_status' => 'publish',
  'posts_per_page' => -1,
  'post__not_in' => array($current_post_id),
);

$jobs = new WP_Query($args);

if ($jobs->have_posts()):
  ?>
  <div class="job-list">
    <?php if (get_post_type() === 'stelle'): ?>
      <h2 class="job-list__title">Weitere Stellen</h2>
    <?php endif; ?>
    <ul class="job-list__items">
      <?php
      while ($jobs->have_posts()):
        $jobs->the_post(); ?>
        <li class="job-list__item">
          <a href="<?php the_permalink(); ?>" class="job-list__link">
            <?php the_title(); ?>
            <img src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/arrow-right.svg'); ?>"
              alt="Pfeil nach rechts">
          </a>
        </li>
      <?php endwhile; ?>
    </ul>
  </div>
  <?php
endif;

wp_reset_postdata();
?>
