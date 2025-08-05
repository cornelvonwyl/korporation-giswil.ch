<?php

/**
 * Template Name: People List Block
 * 
 * A block template that displays a list of people with their names, functions, and contact information.
 * The editor can choose multiple people to display in a structured list format.
 *
 * Required ACF Fields:
 * - title (Text) - Block title
 * - content (WYSIWYG Editor) - Optional content above the people list
 * - show_portrait (Boolean) - Whether to show portraits in a grid layout
 * - members (Flexible Content) - List of member layouts with person_reference and function_overwrite
 *
 * Member Layout Fields:
 * - person_reference (Post Object) - The person post
 * - function_overwrite (Text) - Optional function override
 *
 * Person Post Fields:
 * - portrait (Image) - Person's portrait
 * - first_name (Text) - Person's first name
 * - last_name (Text) - Person's last name
 * - function (Text) - Person's function/role
 * - phone (Text) - Person's phone number (optional)
 * - mail (Email) - Person's email address (optional)
 * - departments (Text) - Person's departments (optional)
 *
 * @package vonweb
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Create id attribute allowing for custom "anchor" value
$id = 'people-list-' . $block['id'];
if (!empty($block['anchor'])) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values
$class_name = 'people-list';
if (!empty($block['className'])) {
    $class_name .= ' ' . $block['className'];
}

// Get field values
$title = get_field('title');
$content = get_field('content');
$show_portrait = get_field('show_portrait');
$members = get_field('members');

?>

<section id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($class_name); ?> animation-on-scroll">
    <div class="people-list__container">
        <?php if ($title): ?>
            <div class="people-list__header">
                <h2 class="people-list__title"><?php echo esc_html($title); ?></h2>
            </div>
        <?php endif; ?>

        <?php if ($content): ?>
            <div class="people-list__content">
                <?php echo wp_kses_post($content); ?>
            </div>
        <?php endif; ?>

        <?php if ($members && is_array($members)): ?>
            <?php if ($show_portrait): ?>
                <!-- Grid Layout with Portraits -->
                <div class="people-list__grid">
                    <?php foreach ($members as $member): ?>
                        <?php
                        // Check if this is a member layout
                        if ($member['acf_fc_layout'] === 'member') {
                            $person_reference = $member['person_reference'];

                            if ($person_reference) {
                                // Use the person.php template for each person
                                get_template_part('template-parts/team/person', null, array(
                                    'person' => $person_reference
                                ));
                            }
                        }
                        ?>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <!-- Table Layout -->
                <div class="people-list__table">
                    <div class="people-list__table-header">
                        <div class="people-list__table-cell people-list__table-cell--name">
                            <span class="people-list__table-header-text">Name</span>
                        </div>
                        <div class="people-list__table-cell people-list__table-cell--function">
                            <span class="people-list__table-header-text">Funktion</span>
                        </div>
                        <div class="people-list__table-cell people-list__table-cell--contact">
                            <span class="people-list__table-header-text">Kontakt</span>
                        </div>
                    </div>

                    <div class="people-list__table-body">
                        <?php foreach ($members as $member): ?>
                            <?php
                            // Check if this is a member layout
                            if ($member['acf_fc_layout'] === 'member') {
                                $person_reference = $member['person_reference'];
                                $function_overwrite = $member['function_overwrite'];

                                if ($person_reference) {
                                    $first_name = get_field('first_name', $person_reference->ID);
                                    $last_name = get_field('last_name', $person_reference->ID);
                                    $function = get_field('function', $person_reference->ID);
                                    $phone = get_field('phone', $person_reference->ID);
                                    $mail = get_field('mail', $person_reference->ID);
                                    $departments = get_field('departments', $person_reference->ID);

                                    // Use function override if provided, otherwise use the person's function
                                    $display_function = $function_overwrite ? $function_overwrite : $function;

                                    // Combine first and last name
                                    $full_name = trim($first_name . ' ' . $last_name);
                            ?>

                                    <?php if ($full_name || $display_function || $phone || $mail): ?>
                                        <div class="people-list__table-row">
                                            <div class="people-list__table-cell people-list__table-cell--name">
                                                <?php if ($full_name): ?>
                                                    <span class="people-list__name"><?php echo esc_html($full_name); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="people-list__table-cell people-list__table-cell--function">
                                                <?php if ($display_function): ?>
                                                    <span class="people-list__function"><?php echo esc_html($display_function); ?></span>
                                                <?php endif; ?>
                                            </div>
                                            <div class="people-list__table-cell people-list__table-cell--contact">
                                                <?php if ($mail): ?>
                                                    <a href="mailto:<?php echo esc_attr($mail); ?>" class="people-list__contact">
                                                        <?php echo esc_html($mail); ?>
                                                    </a>
                                                <?php else: ?>
                                                    <span class="people-list__contact-empty">—</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                            <?php
                                }
                            }
                            ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <div class="people-list__empty">
                <p class="people-list__empty-text">Keine Personen verfügbar</p>
            </div>
        <?php endif; ?>
    </div>
</section>