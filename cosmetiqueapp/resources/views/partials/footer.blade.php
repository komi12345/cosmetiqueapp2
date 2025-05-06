<footer class="footer">
    <div class="footer-container">
        <!-- À Propos de LuxGlam -->
        <div class="footer-column footer-about">
            <h3>À Propos de B - Univers Cosmétiques</h3>
            <p>B - Univers Cosmétiques est une marque de cosmétiques premium dédiée à la beauté naturelle. Nos produits ingrédients naturels contribuent à la beauté éclatante. Nos produits sont formulés avec soin pour sublimer votre beauté au quotidien.</p>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-pinterest"></i></a>
            </div>
        </div>

        <!-- Liens Rapides -->
        <div class="footer-column footer-links">
            <h3>Liens Rapides</h3>
            <ul>
                <li><a href="{{ url('/') }}"><i class="fas fa-chevron-right"></i> Accueil</a></li>
                <li><a href="{{ url('/#products-section') }}"><i class="fas fa-chevron-right"></i> Nos Produits</a></li>
                <li><a href="{{ url('/#collections-section') }}"><i class="fas fa-chevron-right"></i> Collections</a></li>
                <li><a href="{{ url('/#about-section') }}"><i class="fas fa-chevron-right"></i> Notre histoire</a></li>
                <li><a href="{{ url('/#testimonials-section') }}"><i class="fas fa-chevron-right"></i> Témoignages</a></li>
                <li><a href="{{ url('/#contact-section') }}"><i class="fas fa-chevron-right"></i> Contact</a></li>
                <li><a href="#"><i class="fas fa-chevron-right"></i> Conditions Générales</a></li>
            </ul>
        </div>

        <!-- Contact -->
        <div class="footer-column footer-contact">
            <h3>Contact</h3>
            <div class="footer-contact-item">
                <i class="fas fa-map-marker-alt"></i>
                <p>123 Avenue de la Beauté,<br>75001 Paris, France</p>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-phone-alt"></i>
                <p>+33 1 23 45 67 89</p>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-envelope"></i>
                <p>contact@lumea.com</p>
            </div>
            <div class="footer-contact-item">
                <i class="fas fa-clock"></i>
                <p>Lun-Ven: 9h-18h | Sam: 10h-16h</p>
            </div>
        </div>

        <!-- Newsletter -->
        <div class="footer-column footer-newsletter">
            <h3>Newsletter</h3>
            <p>Inscrivez-vous à notre newsletter pour recevoir nos offres spéciales, nouveautés et conseils beauté.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Votre email" required>
                <button type="submit"><i class="fas fa-paper-plane"></i></button>
            </form>
        </div>
    </div>

    <!-- Footer Bottom -->
    <div class="footer-bottom">
        <p>© 2023 Luméa. Tous droits réservés.</p>
        <div class="footer-bottom-links">
            <a href="#">Politique de confidentialité</a>
            <a href="#">Conditions d'utilisation</a>
            <a href="#">Mentions légales</a>
        </div>
    </div>
</footer>