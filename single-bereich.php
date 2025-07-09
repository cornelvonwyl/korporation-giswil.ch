<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

    <div class="main-wrapper department">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="main-content">

                    <?php
                    $image = get_field('image');
                    $text = get_field('Text');
                    $persons = get_field('person');
                    $address = get_field('adress');
                    ?>



                    <div class="department__hero">
                        <div class="department__hero-container">
                            <?php if ($image): ?>
                                <?php echo wp_get_attachment_image($image['id'], 'large', false, ['class' => 'department__image-element']); ?>
                            <?php endif; ?>
                            <div class="department__hero-content">


                                <h1 class="department__title">
                                    <?php the_title(); ?>
                                </h1>


                                <nav class="department__navigation">
                                    <ul>
                                        <li><a href="#">Übersicht</a></li>
                                        <li><a href="#">Veranstaltungen</a></li>
                                        <li><a href="#">Kontakt</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <div class="department__container">
                        <div class="department__wrapper">
                            <div class="department__content">
                                <?php if ($text): ?>
                                    <div class="department__text prose">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($persons || $address): ?>
                                    <div class="department__sidebar">
                                        <?php if ($persons): ?>
                                            <div class="department__contact">
                                                <h4>Ansprechpersonen</h4>
                                                <div class="department__persons">
                                                    <?php foreach ($persons as $person): ?>
                                                        <div class="department__person">
                                                            <?php
                                                            $person_image = get_field('portrait', $person->ID);
                                                            $person_first_name = get_field('first_name', $person->ID);
                                                            $person_last_name = get_field('last_name', $person->ID);
                                                            $person_position = get_field('function', $person->ID);
                                                            $person_phone = get_field('phone', $person->ID);
                                                            $person_email = get_field('mail', $person->ID);
                                                            ?>

                                                            <?php if ($person_image): ?>
                                                                <?php
                                                                $image_id = is_array($person_image) ? $person_image['id'] : $person_image;
                                                                echo wp_get_attachment_image($image_id, 'thumbnail', false, ['class' => 'department__person-image']);
                                                                ?>
                                                            <?php endif; ?>

                                                            <div class="department__person-info">
                                                                <p class="department__person-name">
                                                                    <?php echo esc_html(trim($person_first_name . ' ' . $person_last_name)); ?>
                                                                </p>
                                                                <?php if ($person_position): ?>
                                                                    <p class="department__person-position">
                                                                        <?php echo esc_html($person_position); ?>
                                                                    </p>
                                                                <?php endif; ?>

                                                                <?php if ($person_phone): ?>
                                                                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $person_phone)); ?>">
                                                                        <?php echo esc_html($person_phone); ?>
                                                                    </a>
                                                                <?php endif; ?>

                                                                <?php if ($person_email): ?>
                                                                    <a href="mailto:<?php echo esc_attr($person_email); ?>">
                                                                        <?php echo esc_html($person_email); ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($address): ?>


                                            <div class="department__address">
                                                <h4> Adresse</h4>
                                                <div class="department__address-content">
                                                    <?php echo wp_kses($address, array('br' => array())); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>


                            <?php
                            $accordions = get_field('accordions');
                            if ($accordions): ?>
                                <div class="department__accordions">
                                    <h2>Informationen</h2>
                                    <div class="department__accordions-container">
                                        <?php foreach ($accordions as $accordion_item):
                                            if ($accordion_item['acf_fc_layout'] === 'accordion'):
                                                get_template_part('template-parts/components/accordion', null, [
                                                    'title' => $accordion_item['title'],
                                                    'text' => $accordion_item['text']
                                                ]);
                                            endif;
                                        endforeach; ?>
                                    </div>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                    <?php get_template_part('template-parts/services/service-by'); ?>

                </article>

        <?php endwhile;
        endif; ?>

    </div>

</main>
<?php get_footer(); ?>