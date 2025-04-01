<?php

/**
 * Footer template part
 */
?>
<footer class="footer animate-bg-yellow" role="contentinfo">
    <div class="footer__container">
        <div class="footer__grid">
            <!-- Newsletter Section -->
            <div class="footer__section">
                <h4 class="footer__section-title" id="newsletter-title">Newsletter abonnieren</h4>
                <div class="footer__newsletter">
                    <form action="#" method="POST">
                        <input type="email" name="email" placeholder="name@mail.ch" required>
                        <button class="animated-button" type="submit">Abonnieren</button>
                    </form>
                </div>
            </div>

            <!-- Links Section -->
            <div class="footer__section">
                <h4 class="footer__section-title" id="footer-links">Links</h4>
                <nav class="footer__links" aria-labelledby="footer-links">
                    <ul>
                        <li><a href="/kontakt">Kontakt</a></li>
                        <li><a href="/impressum">Impressum</a></li>
                        <li><a href="/datenschutz">Datenschutz</a></li>
                    </ul>
                </nav>
            </div>

            <!-- Contact Section -->
            <div class="footer__section">
                <h4 class="footer__section-title" id="footer-contact">Kontakt</h4>
                <div class="footer__contact" aria-labelledby="footer-contact">
                    <ul class="contact-list">
                        <li><a href="tel:+41416620070" aria-label="Rufen Sie uns an: 041 662 00 70">041 662 00 70</a></li>
                        <li><a href="mailto:info@elektro-furrer.ch" aria-label="Schreiben Sie uns eine E-Mail: info@elektro-furrer.ch">info@elektro-furrer.ch</a></li>
                    </ul>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="footer__section">
                <h4 class="footer__section-title" id="footer-social">Social Media</h4>
                <ul class="footer__social" aria-labelledby="footer-social">
                    <li>
                        <a href="https://furrerag.rmmservice.eu/connect/#/4440936652"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Ninja Remote - Öffnet in neuem Tab">
                            <img class="footer__social-icon"
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/ninja-remote.png'); ?>"
                                alt="Ninja Remote Icon"
                                width="24"
                                height="24">
                        </a>
                    </li>

                    <li>
                        <a href="https://www.instagram.com/elektrofurrer/"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Instagram - Öffnet in neuem Tab">
                            <img class="footer__social-icon"
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/instagram.svg'); ?>"
                                alt="Instagram Icon"
                                width="24"
                                height="24">
                        </a>
                    </li>

                    <li>
                        <a href="https://www.facebook.com/ElektroFurrer"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="Facebook - Öffnet in neuem Tab">
                            <img class="footer__social-icon"
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/facebook.svg'); ?>"
                                alt="Facebook Icon"
                                width="24"
                                height="24">
                        </a>
                    </li>

                    <li>
                        <a href="https://www.linkedin.com/company/elektro-furrer-ag"
                            target="_blank"
                            rel="noopener noreferrer"
                            aria-label="LinkedIn - Öffnet in neuem Tab">
                            <img class="footer__social-icon"
                                src="<?php echo esc_url(get_template_directory_uri() . '/src/assets/icons/linkedin.svg'); ?>"
                                alt="LinkedIn Icon"
                                width="24"
                                height="24">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <p class="footer__typo">Eifach Furrer</p>
</footer>

<?php wp_footer(); ?>

</div>
</body>

</html>