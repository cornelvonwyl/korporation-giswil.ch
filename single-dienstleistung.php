<?php

if (! defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

get_header(); ?>
<main>

    <div class="main-wrapper service">

        <?php if (have_posts()):
            while (have_posts()):
                the_post(); ?>

                <article class="main-content">
                    <?php
                    $image = get_field('image');
                    $text = get_field('content');
                    $persons = get_field('person');
                    $address = get_field('adress');
                    $accordions = get_field('accordions');
                    $products = get_field('products');
                    $gallery = get_field('gallery');
                    ?>

                    <?php get_template_part('template-parts/components/page-header', null, [
                        'title' => get_the_title(),
                        'image' => $image
                    ]); ?>

                    <div class="service__container">
                        <div class="service__wrapper">
                            <div class="service__content">
                                <?php if ($text): ?>
                                    <div class="service__text">
                                        <?php echo $text; ?>
                                    </div>
                                <?php endif; ?>

                                <?php if ($persons || $address): ?>
                                    <div class="service__sidebar">
                                        <?php if ($persons): ?>
                                            <?php get_template_part('template-parts/components/contact-person', null, [
                                                'persons' => $persons
                                            ]); ?>
                                        <?php endif; ?>

                                        <?php if ($address): ?>
                                            <div class="service__address">
                                                <h4>Adresse</h4>
                                                <div class="service__address-content">
                                                    <?php echo wp_kses($address, array('br' => array())); ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($accordions): ?>
                                <div class="service__accordions">
                                    <h2>Informationen</h2>
                                    <div class="service__accordions-container">
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

                            <?php if ($products): ?>
                                <div class="service__products">
                                    <h2>Produkte</h2>
                                    <div class="service__products-grid swiper">
                                        <ul class="swiper-wrapper">
                                            <?php foreach ($products as $product_item):
                                                if ($product_item['acf_fc_layout'] === 'product'): ?>
                                                    <li class="service__products-item swiper-slide">
                                                        <?php get_template_part('template-parts/components/card-with-image', null, [
                                                            'title' => $product_item['title'] ?? '',
                                                            'image' => $product_item['image']['ID'] ?? '',
                                                            'content' => $product_item['text'] ?? ''
                                                        ]); ?>
                                                    </li>
                                            <?php endif;
                                            endforeach; ?>
                                        </ul>

                                        <div class="swiper-pagination"></div>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php if ($gallery): ?>
                                <div class="service__gallery">
                                    <?php get_template_part('template-parts/components/gallery', null, [
                                        'images' => $gallery
                                    ]); ?>
                                </div>
                            <?php endif; ?>

                        </div>
                    </div>

                </article>

        <?php endwhile;
        endif; ?>

    </div>

</main>
<?php get_footer(); ?>