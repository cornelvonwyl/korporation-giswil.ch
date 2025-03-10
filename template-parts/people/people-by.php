<?php
/**
 * Template part for displaying related references by service
 */

$referenced_people = get_field('people');

if ($referenced_people && !empty($referenced_people)): ?>
  <section class="people-by ">
    <div class="people-by__container">
      <div class="people-by__header">
        <p class="people-by__subtitle subtitle">Unsere Profis</p>
        <h2>Ansprechpersonen</h2>
      </div>

      <div class="people-by__grid">
        <div>
          <?php foreach ($referenced_people as $person): ?>
            <div class="people-by__image">

              <?php if (get_field('portrait', $person->ID)): ?>
                <?php echo wp_get_attachment_image(get_field('portrait', $person->ID), 'medium'); ?>
              <?php endif; ?>

            </div>

            <h4><?php echo get_the_title($person->ID); ?></h4>
            <?php if (get_field('function', $person->ID)): ?>
              <p class="people-by__location"><?php echo get_field('function', $person->ID); ?></p>
            <?php endif; ?>



            <?php if (get_field('mail', $person->ID)): ?>
              <p class="people-by__email">
                <a href="mailto:<?php echo get_field('mail', $person->ID); ?>">
                  <?php echo get_field('mail', $person->ID); ?>
                </a>
              </p>
            <?php endif; ?>

            <?php if (get_field('phone', $person->ID)): ?>
              <p class="people-by__phone">
                <a href="tel:<?php echo get_field('phone', $person->ID); ?>">
                  <?php echo get_field('phone', $person->ID); ?>
                </a>
              </p>
            <?php endif; ?>

          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
