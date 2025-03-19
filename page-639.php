<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="jobs-overview">
        <div class="jobs-overview__container">
          <div class="jobs-overview__header">
            <p class="jobs-overview__subtitle">Wills zämä passt!</p>
            <h1 class="h2">Offene Stellen</h1>
          </div>
        </div>

        <?php
        // Query arguments for all jobs
        $args = array(
          'post_type' => 'stelle',
          'posts_per_page' => -1,
          'orderby' => 'menu_order',
          'order' => 'ASC'
        );

        $jobs_query = new WP_Query($args);

        if (is_wp_error($jobs_query)) {
          return;
        }

        // Collect all unique locations from jobs
        $available_locations = [];
        if ($jobs_query->have_posts()) {
          while ($jobs_query->have_posts()) {
            $jobs_query->the_post();
            $location = get_field('location', get_the_ID());
            if ($location && !in_array($location->ID, $available_locations)) {
              $available_locations[] = $location->ID;
            }
          }
          wp_reset_postdata();
        }
        ?>

        <!-- Jobs Filter -->
        <?php get_template_part('template-parts/jobs/jobs-filter', null, array(
          'available_locations' => $available_locations
        )); ?>

        <!-- Jobs Overview -->
        <?php get_template_part('template-parts/jobs/jobs-overview', null, array(
          'jobs_query' => $jobs_query
        )); ?>

      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>