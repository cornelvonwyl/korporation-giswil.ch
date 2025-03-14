<?php
/**
 * Template part for displaying impression type references
 */
?>

<article class="referenz referenz--impression">
    <div class="referenz__header">
        <h1 class="referenz__title"><?php the_title(); ?></h1>
        <?php if ($intro_text = get_field('intro_text')): ?>
          <div class="referenz__intro">
              <?php echo $intro_text; ?>
          </div>
        <?php endif; ?>
    </div>

    <div class="referenz__content">
        <?php if ($service_references = get_field('service_references')): ?>
          <div class="referenz__services">
              <h2>Leistungen</h2>
              <?php echo $service_references; ?>
          </div>
        <?php endif; ?>

        <?php if ($adress = get_field('adress')): ?>
          <div class="referenz__address">
              <h2>Adresse</h2>
              <?php echo $adress; ?>
          </div>
        <?php endif; ?>

        <?php if ($time = get_field('time')): ?>
          <div class="referenz__time">
              <h2>Bauzeit</h2>
              <?php echo $time; ?>
          </div>
        <?php endif; ?>

        <?php if ($location = get_field('location')): ?>
          <div class="referenz__location">
              <h2>Ortschaft</h2>
              <?php echo $location; ?>
          </div>
        <?php endif; ?>

        <?php the_content(); ?>
    </div>
</article>