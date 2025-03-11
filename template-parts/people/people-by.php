<?php
/**
 * Template part for displaying related references by service
 */

$referenced_people = get_field('people');

if ($referenced_people && !empty($referenced_people)): ?>
  <section class="people-by">
    <div class="people-by__container">
      <div class="people-by__header">
        <p class="people-by__subtitle subtitle">Unsere Profis</p>
        <h2>Ansprechpersonen</h2>
      </div>

      <div class="people-by__grid">
        <?php foreach ($referenced_people as $person): ?>
          <?php get_template_part('template-parts/people/person', NULL, ['person' => $person]); ?>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
<?php endif; ?>
