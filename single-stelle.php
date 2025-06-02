<?php

/**
 * Template Name: Single Job Post
 * Description: Template for displaying individual job postings
 * @package vonweb
 */

if (! defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

get_header(); ?>
<main>
  <div class="main-wrapper job-single">
    <?php if (have_posts()):
      while (have_posts()):
        the_post(); ?>
        <article class="main-content">
          <?php if (has_post_thumbnail()): ?>
            <div class="job-single__image">
              <?php echo get_the_post_thumbnail(get_the_ID(), 'huge', [
                'class' => 'job-single__thumbnail',
                'sizes' => '(max-width: 768px) 150vw, 100vw',
                'loading' => 'eager',
                'decoding' => 'async'
              ]); ?>
            </div>
          <?php endif; ?>

          <?php get_template_part('template-parts/components/breadcrumb', NULL, [
            'items' => [
              ['title' => 'Jobs', 'url' => '/jobs'],
            ]
          ]); ?>

          <div class="job-single__container">
            <h1 class="job-single__title"><?php the_title(); ?></h1>

            <div class="job-single__details">
              <?php
              $workload = get_field('workload');
              if ($workload): ?>
                <div class="job-single__workload">
                  <img class="job-single__workload-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/clock.svg'); ?>"
                    alt="Symbol für Pensum"
                    width="16"
                    height="16">

                  <p class="job-single__workload-text"><?php echo esc_html($workload); ?></p>
                </div>
              <?php endif; ?>
              <?php
              $location = get_field('location');
              if ($location): ?>
                <div class="job-single__location">
                  <img class="job-single__location-icon"
                    src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/map.svg'); ?>"
                    alt="Symbol für Pensum"
                    width="16"
                    height="16">
                  <p class="job-single__location-text"><?php echo esc_html(get_the_title($location)); ?></p>
                </div>
              <?php endif; ?>
            </div>

            <div class="job-single__buttons">

              <a href="mailto:hr@elektrofurrer.ch" class="animated-button job-single__apply">Jetzt bewerben</a>


              <?php
              $pdf = get_field('pdf');
              if ($pdf): ?>
                <div class="job-single__pdf">
                  <a href="<?php echo esc_url($pdf['url']); ?>" target="_blank" class="animated-button job-single__pdf-button">
                    Inserat Download
                  </a>
                </div>
              <?php endif; ?>
            </div>

            <section class="job-single__content prose">
              <?php the_content(); ?>
            </section>


          </div>

          <section class="job-single__video">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/In6pXnTUtj0?si=LLeqWnMBl-osmEKO" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
          </section>


          <section class="job-single__benefits">
            <h3>Unsere Benefits</h3>

            <?php
            get_template_part('template-parts/components/accordion', NULL, [
              'items' => [
                [
                  'category' => esc_html__('Arbeiten und Leben', 'vonweb'),
                  'title' => esc_html__('Zeit für das, was zählt', 'vonweb'),
                  'content' => esc_html__('Job und Privatleben sollen sich nicht im Weg stehen, deshalb bieten wir flexible Arbeitszeiten, Teilzeitmöglichkeiten oder Mami-/Papi-Pausen. Mit unserer 40-Stunden-Woche und der Option auf unbezahlten Urlaub hast du noch mehr Freiraum. Unsere massgeschneiderten Arbeitsmodelle passen sich deinen Lebensumständen an.', 'vonweb')
                ],
                [
                  'category' => esc_html__('Team und Unternehmen', 'vonweb'),
                  'title' => esc_html__('Gemeinsam stark, gemeinsam erfolgreich', 'vonweb'),
                  'content' => esc_html__('Ist dir Teamspirit wichtig? Dann bist du bei uns genau richtig! Wir packen gemeinsam an und schaffen Grosses. Bei uns arbeitest du dort, wo du dich wohlfühlst, in einem familiären Umfeld mit flachen Hierarchien. Wir geben dir Raum, dich zu entfalten, eigene Ideen einzubringen und dich weiterzuentwickeln. Und weil ein starkes Team nicht nur bei der Arbeit zählt, gibt es bei uns regelmässig Mitarbeiterevents für gute Gespräche, viel Spass und noch mehr Zusammenhalt.', 'vonweb')
                ],
                [
                  'category' => esc_html__('Weiterbildung und Entwicklung', 'vonweb'),
                  'title' => esc_html__('Lernen, wachsen, weiterkommen', 'vonweb'),
                  'content' => esc_html__('Profitiere von diversen internen und externen Weiterbildungsmöglichkeiten, ganz nach deinen Interessen und Zielen. Wir begleiten dich auf dem Weg zu deiner Traumausbildung und bieten dir die Chance, dich fachlich und persönlich weiterzuentwickeln. Ob spezialisierte Schulungen, praxisnahe Kurse oder langfristige Karriereplanung, wir unterstützen dich dabei. So kannst du dein volles Potenzial ausschöpfen, denn dein Erfolg ist auch unserer.', 'vonweb')
                ],
                [
                  'category' => esc_html__('Arbeitssicherheit und Gesundheit', 'vonweb'),
                  'title' => esc_html__('Sicher arbeiten, gesund bleiben', 'vonweb'),
                  'content' => esc_html__('Sicheres Arbeiten hat bei uns oberste Priorität! Wir sorgen dafür, dass du bestmöglich geschützt bist – dank optimaler Ausrüstung, modernen Sicherheitsstandards und regelmässigen Schulungen. Durch kontinuierliche Weiterbildungen halten wir unser Team auf dem neusten Stand und minimieren Risiken. Denn deine Gesundheit ist uns wichtig, heute und in Zukunft.', 'vonweb')
                ],
                [
                  'category' => esc_html__('Innovation und spannende Projekte', 'vonweb'),
                  'title' => esc_html__('Immer am Puls der Zeit', 'vonweb'),
                  'content' => esc_html__('Neue Technologien, spannende Projekte und ein digitaler Workflow sorgen dafür, dass du bei uns immer am Puls der Zeit arbeitest. Unsere komplett digitalisierten Arbeitsabläufe erleichtern dir den Alltag und machen dein Arbeiten effizienter und moderner. Und Abwechslung? Die ist garantiert, denn wir machen alles inhouse!', 'vonweb')
                ]
              ],
              'class' => 'benefits-accordion'
            ]);
            ?>
          </section>



          <?php
          $person = get_field('person');

          if ($person):
            $email = get_field('mail', $person);
            $phone = get_field('phone', $person);
            $first_name = get_field('first_name', $person);
            $last_name = get_field('last_name', $person);
            $portrait = get_field('portrait', $person);
          ?>
            <div class="job-single__contact animate-bg" data-bg-color="#f0f0f0" data-threshold="25">
              <div class="job-single__contact-container">
                <div>
                  <div class="job-single__contact-header">
                    <p class="job-single__contact-subtitle">Fragen?</p>
                    <h2 class="job-single__contact-title">Melde dich bei <?php echo esc_html($first_name); ?> </h2>
                  </div>

                  <div class="job-single__contact-content">
                    <?php
                    get_template_part('template-parts/team/person', NULL, array(
                      'person' => $person,
                    ));
                    ?>
                  </div>
                </div>

                <div>
                  <div class="job-single__contact-header">
                    <p class="job-single__contact-subtitle">Alternative</p>
                    <h2 class="job-single__contact-title">Wir melden uns bei dir</h2>
                  </div>

                  <?php if (function_exists('gravity_form')): ?>
                    <?php gravity_form(4, false, false, false, '', true); ?>
                  <?php endif; ?>
                </div>
              </div>

              <div class="job-single__contact-cta">
                <div class="job-single__contact-cta-container">
                  <div class="job-single__contact-header">
                    <p class="job-single__contact-subtitle">Überzeugt?</p>
                    <h2>Bewirb dich jetzt</h2>
                  </div>

                  <div class="prose">
                    <p class="job-single__contact-text ">
                      Schick deine Bewerbung an <a href="mailto:hr@elektrofurrer.ch">hr@elektrofurrer.ch</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </article>
    <?php endwhile;
    endif; ?>
  </div>
</main>
<?php get_footer(); ?>