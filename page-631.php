<?php get_header(); ?>
<main>
  <div class="main-wrapper">
    <article class="main-content">
      <div class="team-overview">
        <div class="team-overview__container">
          <div class="team-overview__header">
            <p class="team-overview__subtitle">Gemeinsam stark</p>
            <h1 class="h2">Team</h1>
          </div>
        </div>

        <?php get_template_part('template-parts/team/team-filter'); ?>

        <!-- News List -->
        <?php get_template_part('template-parts/team/team-overview'); ?>


      </div>
    </article>
  </div>
</main>
<?php get_footer(); ?>
