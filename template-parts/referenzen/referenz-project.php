<?php
/**
 * Template part for displaying project insight type references
 */

// Get all field values at the beginning
$intro_text = get_field('intro_text');
$project_managers = get_field('project_manager');
$volume = get_field('volume');
$service_references = get_field('service_references');
$address = get_field('adress');
$time = get_field('time');
$location = get_field('location');

// Get the reference thumbnail with proper alt text
$reference_image = '';
if (has_post_thumbnail()) {
  $reference_image = get_the_post_thumbnail(
    get_the_ID(),
    'huge',
    array(
      'class' => 'referenz-project__thumbnail',
      'alt' => esc_attr(get_the_title())
    )
  );
}

// Get taxonomy terms with error handling
$terms = get_the_terms(get_the_ID(), 'referenz-type');
$primary_term = (!is_wp_error($terms) && !empty($terms)) ? array_shift($terms) : NULL;
?>

<article class="referenz-project">
  <?php if ($reference_image): ?>
    <div class="referenz-project__image">
      <?php echo $reference_image; ?>
    </div>
  <?php endif; ?>

  <?php get_template_part('template-parts/components/breadcrumb', NULL, [
    'items' => [
      ['title' => 'Referenzen', 'url' => '/referenzen'],
    ]
  ]); ?>

  <div class="referenz-project__header">
    <?php if ($primary_term): ?>
      <div class="referenz-project__type">
        <?php echo esc_html($primary_term->name); ?>
      </div>
    <?php endif; ?>

    <h1 class="referenz-project__title"><?php echo esc_html(get_the_title()); ?></h1>

    <?php if ($intro_text): ?>
      <div class="referenz-project__intro">
        <?php echo wp_kses_post($intro_text); ?>
      </div>
    <?php endif; ?>
  </div>

  <section class="referenz-project__facts">

    <div class="referenz-project__facts-wrapper">

      <div class="referenz-project__facts-title">
        <h2>Fakten</h2>
      </div>

      <div class="referenz-project__facts-details">
        <?php if (!empty($project_managers)): ?>
          <div class="referenz-project__project-manager referenz-project__facts-item">
            <h3>Projektleitung</h3>
            <div class="referenz-project__project-manager-list referenz-project__facts-content">
              <?php foreach ($project_managers as $manager):
                $portrait_id = get_field('portrait', $manager->ID);
                $manager_title = esc_html($manager->post_title);
                ?>
                <div class="referenz-project__project-manager-item">
                  <?php if ($portrait_id): ?>
                    <div class="referenz-project__project-manager-image">
                      <?php
                      echo wp_get_attachment_image(
                        $portrait_id,
                        'small',
                        FALSE,
                        array(
                          'class' => 'referenz-project__project-manager-portrait',
                          'alt' => esc_attr($manager_title),
                        )
                      );
                      ?>
                    </div>
                  <?php endif; ?>
                  <p class="referenz-project__project-manager-info">
                    <?php echo $manager_title; ?>
                  </p>
                </div>
              <?php endforeach; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (!empty($service_references)): ?>
          <div class="referenz-project__services referenz-project__facts-item">
            <h3>Leistung</h3>
            <ul class="referenz-project__services-list referenz-project__facts-content">
              <?php foreach ($service_references as $service):
                $service_link = get_permalink($service->ID);
                $service_title = get_the_title($service);
                ?>
                <li>
                  <a href="<?php echo esc_url($service_link); ?>">
                    <?php echo esc_html($service_title); ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
        <?php endif; ?>

        <?php if ($address): ?>
          <div class="referenz-project__address referenz-project__facts-item">
            <h3>Adresse</h3>
            <p class="referenz-project__facts-content">
              <?php echo esc_html($address); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if ($time): ?>
          <div class="referenz-project__time referenz-project__facts-item">
            <h3>Bauzeit</h3>
            <p class="referenz-project__facts-content">
              <?php echo esc_html($time); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if ($volume): ?>
          <div class="referenz-project__volume referenz-project__facts-item">
            <h3>Projektvolumen</h3>
            <p class="referenz-project__facts-content">
              <?php echo esc_html($volume); ?>
            </p>
          </div>
        <?php endif; ?>

        <?php if ($location): ?>
          <div class="referenz-project__location referenz-project__facts-item">
            <h3>Standort</h3>
            <p class="referenz-project__facts-content">
              <?php echo esc_html($location); ?>
            </p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="referenz-project__content prose">
    <div class="referenz-project__content-wrapper">

      <?php the_content(); ?>
    </div>
  </section>

  <?php
  $related_referenzen = [];

  if (!empty($service_references)) {
    $service_ids = array_map(function ($service) {
      return $service->ID;
    }, $service_references);

    $args = [
      'post_type' => 'referenz',
      'posts_per_page' => 3,
      'post__not_in' => [get_the_ID()],
      'meta_query' => [
        [
          'key' => 'service_references',
          'value' => $service_ids[0],
          'compare' => 'LIKE'
        ]
      ]
    ];

    $related_query = new WP_Query($args);

    if ($related_query->have_posts()) {
      $related_referenzen = $related_query->posts;
    }
  }
  ?>

  <?php get_template_part('template-parts/referenzen/referenzen-slider', NULL, [
    'referenzen' => $related_referenzen,
    'title' => 'Referenzen',
    'subtitle' => 'Weitere',
    'button' => FALSE
  ]); ?>
</article>