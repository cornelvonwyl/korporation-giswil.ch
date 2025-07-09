<?php

/**
 * The header template file
 *
 * This template displays the site header including navigation and logo
 *
 * @package vonweb
 */

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', TRUE, 'right'); ?></title>
    <?php wp_head(); ?>

    <script charset="UTF-8" type="text/javascript" src="//web.swissnewsletter.ch/bundles/mailxpertcore/form/5_0/validation.js"></script>
</head>

<body <?php body_class(); ?>>
    <div class="layout">
        <header class="header">

            <div class="header__container">

                <div class="header__wrapper">
                    <div class="header__logo">
                        <a href="/">
                            <img src="<?php echo get_template_directory_uri(); ?>/src/assets/images/logo.svg" width="240"
                                height="32" alt="Logo Elektro Furrer AG">
                        </a>
                    </div>

                    <button class="header__hamburger" aria-label="Menü öffnen" aria-expanded="false">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>


                    <nav class="header__nav header__nav--mobile">
                        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>

                        <div class="header__contact">
                            <a class="primary-button" href="/kontakt">Kontakt</a>
                        </div>
                    </nav>

                    <nav class="header__nav header__nav--desktop">
                        <?php wp_nav_menu(array('theme_location' => 'primary')); ?>
                        <a class="primary-button" href="/kontakt">Kontakt</a>
                    </nav>
                </div>
            </div>
        </header>