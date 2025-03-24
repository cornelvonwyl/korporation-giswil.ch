<?php

/**
 * Footer template part
 */
?>

<footer class="footer">
    <div class="footer__container">
        <div class="footer__grid">
            <!-- Newsletter Section -->
            <div class="footer__section">
                <h4 class="footer__section-title">Newsletter abonnieren</h4>
                <div class="footer__newsletter">
                    <form action="#" method="POST">
                        <input type="email" name="email" placeholder="name@mail.ch" required>
                        <button class="animated-button" type="submit">Abonnieren</button>
                    </form>
                </div>
            </div>

            <!-- Links Section -->
            <div class="footer__section">
                <h4 class="footer__section-title">Links</h4>
                <nav class="footer__links">
                    <a href="/dienstleistungen">Dienstleistungen</a>
                    <a href="/uber-uns">Über uns</a>
                    <a href="/karriere">Karriere</a>
                    <a href="/kontakt">Kontakt</a>
                </nav>
            </div>

            <!-- Contact Section -->
            <div class="footer__section">
                <h4 class="footer__section-title">Kontakt</h4>
                <div class="footer__contact">
                    <p><a href="tel:+41449054242">+41 44 905 42 42</a></p>
                    <p><a href="mailto:info@elektro-furrer.ch">info@elektro-furrer.ch</a></p>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="footer__section">
                <h4 class="footer__section-title">Social Media</h4>
                <div class="footer__social">
                    <a href="https://www.linkedin.com/company/elektro-furrer-ag" target="_blank"
                        rel="noopener noreferrer">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a href="https://www.instagram.com/elektrofurrer" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://www.pinterest.ch/elektrofurrer" target="_blank" rel="noopener noreferrer">
                        <i class="fab fa-pinterest-p"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <p class="footer__typo">Eifach Furrer</p>
</footer>

<?php wp_footer(); ?>
</body>

</html>