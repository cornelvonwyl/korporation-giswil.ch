<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

    <div class="main-wrapper bereich-single">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>
                <article class="main-content">

                    <?php get_template_part('template-parts/components/breadcrumb', NULL, [
                        'items' => [
                            ['title' => 'Bereiche', 'url' => '/bereiche'],
                        ]
                    ]); ?>

                    <div class="bereich-single__container">

                        <div class="bereich-single__header">
                            <div class="bereich-single__header-content">
                                <h1 class="bereich-single__title">
                                    <?php the_title(); ?>
                                </h1>

                                <?php
                                $image = get_field('image');
                                $text = get_field('Text');
                                $persons = get_field('person');
                                $address = get_field('adress');
                                ?>

                                <?php if ($image): ?>
                                    <div class="bereich-single__image">
                                        <?php echo wp_get_attachment_image($image['id'], 'large', false, ['class' => 'bereich-single__image-element']); ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($text): ?>
                                    <div class="bereich-single__text prose">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($persons || $address): ?>
                                <div class="bereich-single__sidebar">
                                    <?php if ($persons): ?>
                                        <div class="bereich-single__contact">
                                            <h3 class="bereich-single__contact-title">Ansprechpersonen</h3>
                                            <div class="bereich-single__persons">
                                                <?php foreach ($persons as $person): ?>
                                                    <div class="bereich-single__person">
                                                        <?php
                                                        $person_image = get_field('image', $person->ID);
                                                        $person_position = get_field('position', $person->ID);
                                                        $person_phone = get_field('phone', $person->ID);
                                                        $person_email = get_field('email', $person->ID);
                                                        ?>

                                                        <?php if ($person_image): ?>
                                                            <div class="bereich-single__person-image">
                                                                <?php echo wp_get_attachment_image($person_image['id'], 'thumbnail', false, ['class' => 'bereich-single__person-image-element']); ?>
                                                            </div>
                                                        <?php endif; ?>

                                                        <div class="bereich-single__person-info">
                                                            <h4 class="bereich-single__person-name">
                                                                <?php echo esc_html($person->post_title); ?>
                                                            </h4>
                                                            <?php if ($person_position): ?>
                                                                <p class="bereich-single__person-position">
                                                                    <?php echo esc_html($person_position); ?>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($person_phone): ?>
                                                                <p class="bereich-single__person-phone">
                                                                    <a href="tel:<?php echo esc_attr(str_replace(' ', '', $person_phone)); ?>">
                                                                        <?php echo esc_html($person_phone); ?>
                                                                    </a>
                                                                </p>
                                                            <?php endif; ?>
                                                            <?php if ($person_email): ?>
                                                                <p class="bereich-single__person-email">
                                                                    <a href="mailto:<?php echo esc_attr($person_email); ?>">
                                                                        <?php echo esc_html($person_email); ?>
                                                                    </a>
                                                                </p>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if ($address): ?>
                                        <div class="bereich-single__address">
                                            <h3 class="bereich-single__address-title">Adresse</h3>
                                            <div class="bereich-single__address-content">
                                                <?php echo wp_kses($address, array('br' => array())); ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Accordions Section -->
                        <?php
                        $accordions = get_field('accordions');
                        if ($accordions): ?>
                            <div class="bereich-single__accordions">
                                <h2 class="bereich-single__accordions-title">Informationen</h2>
                                <div class="bereich-single__accordions-container">
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
                </article>

        <?php endwhile;
        endif; ?>

    </div>

</main>
<?php get_footer(); ?>