<?php

/**
 * Footer template part
 */
?>
<footer class="footer animate-bg-yellow" role="contentinfo">
    <div class="footer__container">

        <h2 class="sr-only">Die Fusszeile</h2>
        <div class="footer__grid">
            <!-- Newsletter Section -->
            <div class="footer__section">
                <h4 class="footer__section-title" id="newsletter-title">Newsletter abonnieren</h4>
                <div class="footer__newsletter">

                    <form data-form-language="de" id="contact_form_2_de"
                        class="contact_form contact_form_de validate_type_all contact_form_cols_1"
                        action="//web.swissnewsletter.ch/e/3a6566480fd96137/form/de/anmeldeformular_elektrofurrer_ch.html"
                        method="post" novalidate="novalidate">
                        <ul class="field_errors"></ul>
                        <div class="col_0">

                            <div class="field_container contact_field_container"
                                id="contact_field_email_container">
                                <label for="data_contact_email" class="sr-only">E-Mail Adresse <span class="required">*</span></label>
                                <ul class="field_errors"></ul>
                                <input type="email" placeholder="name@mail.ch" id="data_contact_email" name="data[contact][email]" required="required">
                            </div>
                            <div class="submit_container">
                                <input class="submit_button animated-button" id="submit_button_11" type="submit" value="Abonnieren">
                            </div>
                        </div>
                        <input type="hidden" id="data_form_version" name="data[form_version]" value="5_0">
                        <input type="hidden" id="data_referrer" name="data[referrer]">
                        <input type="hidden" id="data_form_validate_data" name="form_validate_data"
                            value='{"data_contact_email":{"constrains":{"required":true}}}'>
                        <input type="hidden" id="data_form_id" name="data[form_id]" value="2">
                        <input type="hidden" id="data_form_language" name="data[form_language]" value="de">

                        <script>
                            document.addEventListener('DOMContentLoaded', function() {
                                var inputReferrer = document.getElementById('data_referrer');
                                const errorFields = inputReferrer.querySelectorAll('.field_errors li');

                                if (errorFields.length > 0) {
                                    form.scrollIntoView({
                                        behavior: 'smooth',
                                        block: 'start'
                                    });
                                }
                            });
                        </script>

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
                        <li><a href="mailto:info@elektrofurrer.ch" aria-label="Schreiben Sie uns eine E-Mail: info@elektrofurrer.ch">info@elektrofurrer.ch</a></li>
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
                                width="28"
                                height="28">
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
                                width="28"
                                height="28">
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
                                width="28"
                                height="28">
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
                                width="28"
                                height="28">
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