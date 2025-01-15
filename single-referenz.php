<?php
use FileBird\Classes\Helpers as Helpers;

get_header();
?>
<main>
  <div class="main-wrapper">

    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>

        <article class="main-content">
          <h1><?php the_title(); ?></h1>

          <p> At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus
            est
            Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod
            tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo
            dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem
            ipsum dolor sit amet, consetetur sadipscing elitr, At accusam aliquyam diam diam dolore dolores duo eirmod eos
            erat, et nonumy sed tempor et et invidunt justo labore Stet clita ea et gubergren, kasd magna no rebum. sanctus
            sea sed takimata ut vero voluptua. est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur
            sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat.</p>


          <!-- Images -->
          <?php
          $image_folder = get_field('image_folder');
          if ($image_folder[0]):
            $attachment_ids = Helpers::getAttachmentIdsByFolderId($image_folder[0]);

            if (!empty($attachment_ids)): ?>
              <div class="image-folder">
                <div class="image-gallery">
                  <?php foreach ($attachment_ids as $attachment_id): ?>
                    <div class="image-item">
                      <?php
                      echo wp_get_attachment_image($attachment_id, 'huge');
                      ?>
                    </div>
                  <?php endforeach; ?>
                </div>
              </div>
            <?php else: ?>
              <p>Keine Bilder wurden gefunden.</p>
            <?php endif; ?>
          <?php else: ?>
            <p>Ordner ID ist falsch.</p>
          <?php endif; ?>

          <!-- Content -->
          <div class="post-content">
            <?php the_content(); ?>
          </div>

          <!-- Taxonomy: Architektur -->
          <?php
          $architektur_terms = get_the_terms(get_the_ID(), 'architektur');
          if ($architektur_terms && !is_wp_error($architektur_terms)): ?>
            <div class="taxonomie-architektur">
              <h2>Architektur:</h2>
              <ul>
                <?php foreach ($architektur_terms as $term): ?>
                  <li><?php echo esc_html($term->name); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>

          <!-- Taxonomy: Fotografie -->
          <?php
          $fotografie_terms = get_the_terms(get_the_ID(), 'fotografie');
          if ($fotografie_terms && !is_wp_error($fotografie_terms)): ?>
            <div class="taxonomie-fotografie">
              <h2>Fotografie:</h2>
              <ul>
                <?php foreach ($fotografie_terms as $term): ?>
                  <li><?php echo esc_html($term->name); ?></li>
                <?php endforeach; ?>
              </ul>
            </div>
          <?php endif; ?>
        </article>

      <?php endwhile; endif; ?>

  </div>
</main>
<?php get_footer(); ?>
