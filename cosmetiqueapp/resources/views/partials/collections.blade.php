<!-- Nos Collections Section -->
<section id="collections-section" class="collections-section">
    <div class="section-header">
        <h2>Nos Collections</h2>
    </div>
    
    <div class="collections-container">
        <!-- Collection 1 -->
        <div class="collection-card" data-collection-id="collection-001">
            <div class="collection-image">
                <img src="{{ asset('images/collection-hydratation.jpg') }}" alt="Collection Hydratation">
                <div class="collection-overlay">
                    <h3>Collection Hydratation</h3>
                </div>
            </div>
            <div class="collection-info">
                <p>Notre collection hydratante offre des soins intensifs pour les peaux sèches et déshydratées. Formulés avec des ingrédients naturels comme l'acide hyaluronique et l'aloe vera.</p>
                <div class="collection-price">Prix de la collection: <span>79.99 €</span></div>
                <div class="collection-actions">
                    <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                    <button class="btn btn-secondary view-details">Voir détails</button>
                </div>
            </div>
        </div>

        <!-- Collection 2 -->
        <div class="collection-card" data-collection-id="collection-002">
            <div class="collection-image">
                <img src="{{ asset('images/collection-anti-age.jpg') }}" alt="Collection Anti-Âge">
                <div class="collection-overlay">
                    <h3>Collection Anti-Âge</h3>
                </div>
            </div>
            <div class="collection-info">
                <p>Des formules avancées pour lutter contre les signes visibles du vieillissement. Enrichies en peptides, vitamines et antioxydants pour une peau plus ferme et éclatante.</p>
                <div class="collection-price">Prix de la collection: <span>99.99 €</span></div>
                <div class="collection-actions">
                    <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                    <button class="btn btn-secondary view-details">Voir détails</button>
                </div>
            </div>
        </div>

        <!-- Collection 3 -->
        <div class="collection-card" data-collection-id="collection-003">
            <div class="collection-image">
                <img src="{{ asset('images/collection-purifiante.jpg') }}" alt="Collection Purifiante">
                <div class="collection-overlay">
                    <h3>Collection Purifiante</h3>
                </div>
            </div>
            <div class="collection-info">
                <p>Idéale pour les peaux mixtes à grasses, cette collection aide à réguler l'excès de sébum, purifier les pores et prévenir les imperfections pour une peau nette et équilibrée.</p>
                <div class="collection-price">Prix de la collection: <span>89.99 €</span></div>
                <div class="collection-actions">
                    <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                    <button class="btn btn-secondary view-details">Voir détails</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="collections-hidden">
        <!-- Collection 4 -->
        <div class="collection-card" data-collection-id="collection-004">
            <div class="collection-image">
                <img src="{{ asset('images/collection-naturelle.jpg') }}" alt="Collection Naturelle">
                <div class="collection-overlay">
                    <h3>Collection Naturelle</h3>
                </div>
            </div>
            <div class="collection-info">
                <p>Des produits 100% naturels et biologiques, sans parabènes ni produits chimiques nocifs. Parfaits pour les peaux sensibles et pour ceux qui privilégient une approche écologique.</p>
                <div class="collection-price">Prix de la collection: <span>69.99 €</span></div>
                <div class="collection-actions">
                    <button class="btn btn-primary add-to-cart"><i class="fas fa-shopping-cart"></i> Ajouter au panier</button>
                    <button class="btn btn-secondary view-details">Voir détails</button>
                </div>
            </div>
        </div>
    </div>
    
    <div class="view-more-container">
        <button class="btn btn-secondary view-more-collections">Voir plus</button>
    </div>
</section>
<!-- End Nos Collections Section -->