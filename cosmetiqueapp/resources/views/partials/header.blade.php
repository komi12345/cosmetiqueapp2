<header>
    <nav class="navbar">
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="Logo Luméa">
            <span>B - Univers Cosmétiques</span>
        </div>
        <div class="nav-links">
            <ul>
                <li><a href="#" class="active">Accueil</a></li>
                <li><a href="#products-section">Produits</a></li>
                <li><a href="#collections-section">Collections</a></li>
                <li><a href="#blog-section">Blog</a></li>
                <li><a href="#about-section">Notre Histoire</a></li>
                <li><a href="#contact-section">Contact</a></li>
            </ul>
        </div>
        <div class="nav-icons">
            <a href="#" class="search-icon"><i class="fas fa-search"></i></a>
            <a href="#" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="cart-count">0</span></a>
            <a href="#" class="login-icon"><i class="fas fa-user"></i></a>
        </div>
        <div class="hamburger">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </div>
    </nav>
    
    <div class="search-container">
        <div class="search-box">
            <input type="text" placeholder="Rechercher un produit...">
            <button type="submit"><i class="fas fa-search"></i></button>
            <button class="close-search"><i class="fas fa-times"></i></button>
        </div>
    </div>
    
    <!-- Fenêtre du panier -->
    <div class="cart-container">
        <div class="cart-box">
            <div class="cart-header">
                <h3>Votre Panier</h3>
                <button class="close-cart"><i class="fas fa-times"></i></button>
            </div>
            <div class="cart-items">
                <!-- Les produits du panier seront ajoutés ici dynamiquement -->
            </div>
            <div class="cart-footer">
                <div class="cart-total">
                    <span>Total:</span>
                    <span class="total-price">0.00 €</span>
                </div>
                <button class="btn btn-primary checkout-btn">Commander</button>
            </div>
        </div>
    </div>
</header>