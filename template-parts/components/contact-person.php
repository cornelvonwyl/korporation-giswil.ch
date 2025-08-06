<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

$persons = $args['persons'] ?? [];

if (empty($persons)) {
    return;
}
?>

<div class="contact-person">
    <h3>Ansprechpersonen</h3>
    <div class="contact-person__list">
        <?php foreach ($persons as $person): ?>
            <div class="contact-person__item">
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
                    echo wp_get_attachment_image($image_id, 'thumbnail', false, ['class' => 'contact-person__image']);
                    ?>
                <?php endif; ?>

                <div class="contact-person__info">
                    <p class="contact-person__name">
                        <?php echo esc_html(trim($person_first_name . ' ' . $person_last_name)); ?>
                    </p>
                    <?php if ($person_position): ?>
                        <p class="contact-person__position">
                            <?php echo esc_html($person_position); ?>
                        </p>
                    <?php endif; ?>

                    <?php if ($person_phone): ?>
                        <a class="contact-person__phone" href="tel:<?php echo esc_attr(str_replace(' ', '', $person_phone)); ?>">
                            <?php echo esc_html($person_phone); ?>
                        </a>
                    <?php endif; ?>

                    <?php if ($person_email): ?>
                        <a class="contact-person__email" href="mailto:<?php echo esc_attr($person_email); ?>">
                            <?php echo esc_html($person_email); ?>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>