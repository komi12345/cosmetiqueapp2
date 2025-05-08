<!-- Nos Produits Section -->
<section id="products-section" class="products-section">
    <div class="section-header">
        <h2>Nos Produits</h2>
    </div>
    
    <div class="product-filters">
        <button class="filter-btn active" data-filter="all">Tous les produits</button>
        <button class="filter-btn" data-filter="savons">Savons</button>
        <button class="filter-btn" data-filter="huiles">Huiles essentielles</button>
        <button class="filter-btn" data-filter="gommages">Gommages</button>
        <button class="filter-btn" data-filter="cremes">Crèmes</button>
        <button class="filter-btn" data-filter="parfums">Parfums</button>
    </div>
    
    <div class="products-container">
        <!-- Produit 1 - Savon -->
        <div class="product-card" data-category="savons" data-product-id="savon-naturel-001">
            <div class="product-image">
                <img src="{{ asset('images/savon-naturel.jpg') }}" alt="Savon Naturel">
            </div>
            <h3 class="product-title">Savon Naturel</h3>
            <p class="product-description">Un savon doux et hydratant fabriqué à partir d'ingrédients naturels pour une peau douce et équilibrée.</p>
            <div class="product-price">19.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>

        <!-- Produit 2 - Crème -->
        <div class="product-card" data-category="cremes" data-product-id="creme-hydratante-002">
            <div class="product-image">
                <img src="{{ asset('images/creme-hydratante.jpg') }}" alt="Crème Hydratante">
            </div>
            <h3 class="product-title">Crème Hydratante</h3>
            <p class="product-description">Idéale pour tous les types de peaux, cette crème contient des éléments riches en vitamines pour nourrir votre peau.</p>
            <div class="product-price">29.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>

        <!-- Produit 3 - Parfum -->
        <div class="product-card" data-category="parfums" data-product-id="parfum-elegance-003">
            <div class="product-image">
                <img src="{{ asset('images/parfum-elegance.jpg') }}" alt="Parfum Élégance">
            </div>
            <h3 class="product-title">Parfum Élégance</h3>
            <p class="product-description">Un parfum complet pour nourrir toute votre sensualité avec des notes variées et équilibrées pour une journée entière.</p>
            <div class="product-price">49.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
    </div>
    
    <div class="products-hidden">
        <!-- Produit 4 - Gommage -->
        <div class="product-card" data-category="gommages" data-product-id="gommage-visage-004">
            <div class="product-image">
                <img src="{{ asset('images/gommage-visage.jpg') }}" alt="Gommage Visage">
            </div>
            <h3 class="product-title">Gommage Visage</h3>
            <p class="product-description">Une sélection de grains fins et de vitamines pour faire la peau visible et éliminer les cellules mortes.</p>
            <div class="product-price">24.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>

        <!-- Huile Essentielle -->
        <div class="product-card" data-category="huiles" data-product-id="huile-lavande-005">
            <div class="product-image">
                <img src="{{ asset('images/huile-lavande.jpg') }}" alt="Huile Essentielle de Lavande">
            </div>
            <h3 class="product-title">Huile Essentielle de Lavande</h3>
            <p class="product-description">Une huile essentielle de lavande pure et apaisante, idéale pour favoriser la détente et améliorer le sommeil.</p>
            <div class="product-price">18.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <!-- Autres produits cachés -->
        <div class="product-card" data-category="savons" data-product-id="savon-argile-006">
            <div class="product-image">
                <img src="{{ asset('images/savon-argile.jpg') }}" alt="Savon à l'Argile">
            </div>
            <h3 class="product-title">Savon à l'Argile</h3>
            <p class="product-description">Un savon purifiant à l'argile verte qui nettoie en profondeur et resserre les pores pour une peau nette.</p>
            <div class="product-price">21.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <!-- Nouveaux produits pour Huiles Essentielles -->
        <div class="product-card" data-category="huiles" data-product-id="huile-tea-tree-007">
            <div class="product-image">
                <img src="{{ asset('images/huile-tea-tree.jpg') }}" alt="Huile Essentielle de Tea Tree">
            </div>
            <h3 class="product-title">Huile Essentielle de Tea Tree</h3>
            <p class="product-description">Huile purifiante aux propriétés antibactériennes, idéale pour les peaux à problèmes et les imperfections.</p>
            <div class="product-price">22.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <div class="product-card" data-category="huiles" data-product-id="huile-eucalyptus-008">
            <div class="product-image">
                <img src="{{ asset('images/huile-eucalyptus.jpg') }}" alt="Huile Essentielle d'Eucalyptus">
            </div>
            <h3 class="product-title">Huile Essentielle d'Eucalyptus</h3>
            <p class="product-description">Rafraîchissante et revigorante, cette huile aide à dégager les voies respiratoires et stimule l'esprit.</p>
            <div class="product-price">20.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <div class="product-card" data-category="huiles" data-product-id="huile-ylang-009">
            <div class="product-image">
                <img src="{{ asset('images/huile-ylang.jpg') }}" alt="Huile Essentielle d'Ylang-Ylang">
            </div>
            <h3 class="product-title">Huile Essentielle d'Ylang-Ylang</h3>
            <p class="product-description">Parfum floral exotique aux propriétés relaxantes, idéale pour réduire le stress et équilibrer les émotions.</p>
            <div class="product-price">25.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <!-- Nouveaux produits pour Gommages -->
        <div class="product-card" data-category="gommages" data-product-id="gommage-cafe-010">
            <div class="product-image">
                <img src="{{ asset('images/gommage-cafe.jpg') }}" alt="Gommage au Café">
            </div>
            <h3 class="product-title">Gommage au Café</h3>
            <p class="product-description">Un gommage énergisant au café qui élimine les cellules mortes et stimule la circulation pour une peau éclatante.</p>
            <div class="product-price">26.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <div class="product-card" data-category="gommages" data-product-id="gommage-sucre-011">
            <div class="product-image">
                <img src="{{ asset('images/gommage-sucre.jpg') }}" alt="Gommage au Sucre">
            </div>
            <h3 class="product-title">Gommage au Sucre</h3>
            <p class="product-description">Un gommage doux au sucre et à la vanille qui exfolie en douceur et laisse la peau douce et parfumée.</p>
            <div class="product-price">22.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
        
        <div class="product-card" data-category="gommages" data-product-id="gommage-sel-012">
            <div class="product-image">
                <img src="{{ asset('images/gommage-sel.jpg') }}" alt="Gommage au Sel de Mer">
            </div>
            <h3 class="product-title">Gommage au Sel de Mer</h3>
            <p class="product-description">Un gommage revitalisant au sel de mer qui purifie la peau et apporte des minéraux essentiels pour une peau rayonnante.</p>
            <div class="product-price">23.99 €</div>
            <div class="product-quantity">
                <button class="quantity-btn minus"><i class="fas fa-minus"></i></button>
                <span class="quantity">1</span>
                <button class="quantity-btn plus"><i class="fas fa-plus"></i></button>
            </div>
            <div class="product-actions">
                <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                <button class="btn btn-secondary order-now">Commander</button>
            </div>
            <a href="#" class="product-view"><i class="fas fa-eye"></i></a>
        </div>
    </div>
    
    <div class="view-more-container">
        <button class="btn btn-secondary view-more">Voir plus</button>
    </div>
</section>
<!-- End Nos Produits Section -->