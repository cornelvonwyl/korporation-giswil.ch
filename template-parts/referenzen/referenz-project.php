<?php
/**
 * Template part for displaying project insight type references
 */

// Get all field values at the beginning
$intro_text = get_field('intro_text');
$project_managers = get_field('project_manager');
$volume = get_field('volume');
$service_references = get_field('service_references');
$adress = get_field('adress');
$time = get_field('time');
$location = get_field('location');

// Get the reference thumbnail
$reference_image = get_the_post_thumbnail(get_the_ID(), 'huge', array(
  'class' => 'referenz__thumbnail',
  'alt' => get_the_title()
));

$terms = get_the_terms(get_the_ID(), 'referenz-type');
?>

<article class="referenz referenz--project">

  <?php if ($reference_image): ?>
    <?php echo $reference_image; ?>
  <?php endif; ?>

  <div class="referenz__header">
    <?php if ($terms && !is_wp_error($terms)):
      $term = array_shift($terms); ?>
      <div class="referenz__type">
        <?php echo esc_html($term->name); ?>
      </div>
    <?php endif; ?>
    <h1 class="referenz__title"><?php echo get_the_title(); ?></h1>
    <?php if ($intro_text): ?>
      <div class="referenz__intro">
        <?php echo $intro_text; ?>
      </div>
    <?php endif; ?>
  </div>

  <div class="referenz__content">
    <div class="referenz__main-info">
      <?php if ($project_managers && !empty($project_managers)): ?>
        <div class="referenz__project-manager">
          <h2>Projektleiter</h2>
          <div class="referenz__project-manager-list">
            <?php foreach ($project_managers as $manager):
              $portrait = get_field('portrait', $manager->ID); ?>
              <div class="referenz__project-manager-item">
                <?php if ($portrait): ?>
                  <div class="referenz__project-manager-image">
                    <?php echo wp_get_attachment_image($portrait, 'small', FALSE, array(
                      'class' => 'referenz__project-manager-portrait',
                      'alt' => esc_attr($manager->post_title)
                    )); ?>
                  </div>
                <?php endif; ?>
                <div class="referenz__project-manager-info">
                  <h3><?php echo $manager->post_title; ?></h3>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>

      <?php if ($volume): ?>
        <div class="referenz__volume">
          <h2>Projektvolumen</h2>
          <?php echo $volume; ?>
        </div>
      <?php endif; ?>
    </div>

    <?php if ($service_references && is_array($service_references)): ?>
      <div class="referenz__services">
        <h2>Leistungen</h2>
        <ul class="referenz__services-list">
          <?php foreach ($service_references as $service): ?>
            <li>
              <a href="<?php echo get_permalink($service->ID); ?>">
                <?php echo get_the_title($service); ?>
              </a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    <?php endif; ?>

    <?php if ($adress): ?>
      <div class="referenz__address">
        <h2>Adresse</h2>
        <?php echo $adress; ?>
      </div>
    <?php endif; ?>

    <?php if ($time): ?>
      <div class="referenz__time">
        <h2>Bauzeit</h2>
        <?php echo $time; ?>
      </div>
    <?php endif; ?>

    <?php if ($location): ?>
      <div class="referenz__location">
        <h2>Ortschaft</h2>
        <?php echo $location; ?>
      </div>
    <?php endif; ?>

    <?php the_content(); ?>
  </div>
</article>