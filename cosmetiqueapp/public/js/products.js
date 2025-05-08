document.addEventListener('DOMContentLoaded', function() {
    // Gestion des boutons de filtre
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productCards = document.querySelectorAll('.product-card');
    const productsContainer = document.querySelector('.products-container');
    const hiddenProducts = document.querySelector('.products-hidden');
    const viewMoreBtn = document.querySelector('.view-more');
    
    // Fonction pour filtrer les produits
    function filterProducts(category) {
        if (!productsContainer || !hiddenProducts) return;
        
        // Masquer d'abord tous les produits
        productCards.forEach(card => {
            card.style.display = 'none';
        });
        
        // Vider les conteneurs avant d'ajouter les produits filtrés
        while (productsContainer.firstChild) {
            productsContainer.removeChild(productsContainer.firstChild);
        }
        
        while (hiddenProducts.firstChild) {
            hiddenProducts.removeChild(hiddenProducts.firstChild);
        }
        
        // Collecter tous les produits de la catégorie sélectionnée
        const categoryProducts = Array.from(productCards).filter(card => 
            category === 'all' || card.getAttribute('data-category') === category
        );
        
        // Afficher les 3 premiers produits dans le conteneur principal
        const visibleProducts = categoryProducts.slice(0, 3);
        visibleProducts.forEach(product => {
            productsContainer.appendChild(product);
            product.style.display = 'block';
        });
        
        // Déplacer les produits restants dans le conteneur caché
        const hiddenProductsList = categoryProducts.slice(3);
        hiddenProductsList.forEach(product => {
            hiddenProducts.appendChild(product);
        });
        
        // Afficher ou masquer le bouton "Voir plus" selon le nombre de produits
        if (viewMoreBtn) {
            if (categoryProducts.length > 3) {
                viewMoreBtn.style.display = 'block';
                viewMoreBtn.textContent = 'Voir plus';
                hiddenProducts.classList.remove('active');
            } else {
                viewMoreBtn.style.display = 'none';
            }
        }
    }
    
    // Initialiser l'affichage avec "Tous les produits" si les éléments existent
    if (productsContainer && hiddenProducts) {
        filterProducts('all');
    }
    
    // Gestion des clics sur les boutons de filtre
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Retirer la classe active de tous les boutons
            filterBtns.forEach(b => b.classList.remove('active'));
            // Ajouter la classe active au bouton cliqué
            this.classList.add('active');
            
            // Récupérer la catégorie à filtrer
            const filterValue = this.getAttribute('data-filter');
            
            // Filtrer les produits
            filterProducts(filterValue);
        });
    });
    
    // Fonctionnalité pour le bouton "Voir plus/Voir moins"
    if (viewMoreBtn) {
        viewMoreBtn.addEventListener('click', function() {
            if (this.textContent === 'Voir plus') {
                // Afficher tous les produits cachés
                hiddenProducts.classList.add('active');
                
                // Rendre tous les produits dans le conteneur caché visibles
                const hiddenProductCards = hiddenProducts.querySelectorAll('.product-card');
                hiddenProductCards.forEach(card => {
                    card.style.display = 'block';
                });
                
                this.textContent = 'Voir moins';
            } else {
                hiddenProducts.classList.remove('active');
                this.textContent = 'Voir plus';
            }
        });
    }
    
    // Gestion des boutons de quantité
    const minusBtns = document.querySelectorAll('.quantity-btn.minus');
    const plusBtns = document.querySelectorAll('.quantity-btn.plus');
    
    minusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityEl = this.nextElementSibling;
            let quantity = parseInt(quantityEl.textContent);
            if (quantity > 1) {
                quantity--;
                quantityEl.textContent = quantity;
            }
        });
    });
    
    plusBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const quantityEl = this.previousElementSibling;
            let quantity = parseInt(quantityEl.textContent);
            quantity++;
            quantityEl.textContent = quantity;
        });
    });
    
    // Permettre à l'utilisateur de saisir directement une quantité
    document.querySelectorAll('.quantity').forEach(quantityEl => {
        quantityEl.addEventListener('click', function() {
            const currentValue = this.textContent;
            const input = document.createElement('input');
            input.type = 'number';
            input.min = '1';
            input.value = currentValue;
            input.style.width = '40px';
            input.style.textAlign = 'center';
            
            this.textContent = '';
            this.appendChild(input);
            input.focus();
            
            input.addEventListener('blur', function() {
                let newValue = parseInt(this.value);
                if (isNaN(newValue) || newValue < 1) {
                    newValue = 1;
                }
                this.parentNode.textContent = newValue;
            });
            
            input.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    this.blur();
                }
            });
        });
    });
    
    // Gestion des clics sur l'icône "voir"
    document.querySelectorAll('.product-view').forEach(viewBtn => {
        viewBtn.addEventListener('click', function(e) {
            e.preventDefault();
            const productCard = this.closest('.product-card');
            const productTitle = productCard.querySelector('.product-title').textContent;
            const productDescription = productCard.querySelector('.product-description').textContent;
            const productPrice = productCard.querySelector('.product-price').textContent;
            const productImage = productCard.querySelector('.product-image img').src;
            
            // Ici vous pouvez implémenter l'affichage des détails du produit
            // Par exemple, dans une modal ou une nouvelle page
            alert(`Détails du produit: ${productTitle}\nPrix: ${productPrice}\nDescription: ${productDescription}`);
        });
    });
    
    // Ajouter des écouteurs d'événements pour les boutons "Commander" dans la section produits
    document.querySelectorAll('.order-now').forEach(orderBtn => {
        orderBtn.addEventListener('click', function(e) {
            e.preventDefault();
            
            const productCard = this.closest('.product-card') || this.closest('.collection-card');
            const productName = productCard.querySelector('.product-title, h3').textContent;
            
            let productPrice;
            let price;

            if (productCard.classList.contains('collection-card')) {
                productPrice = productCard.querySelector('.collection-price span').textContent;
                price = parseFloat(productPrice.replace('€', '').trim());
            } else {
                productPrice = productCard.querySelector('.product-price').textContent.trim();
                price = parseFloat(productPrice.replace('€', '').trim());
            }

            const productImage = productCard.querySelector('img').src;
            const quantity = productCard.querySelector('.quantity') ?
                parseInt(productCard.querySelector('.quantity').textContent) : 1;

            // On crée un tableau avec uniquement ce produit
            const singleItemOrder = [{
                name: productName,
                price: price,
                image: productImage,
                quantity: quantity
            }];

            // Redirection WhatsApp avec ce produit uniquement
            redirectToWhatsAppCheckout(singleItemOrder);
        });
    });
    
    // Fonctionnalité pour le bouton "Voir plus" des collections
    const viewMoreCollectionsBtn = document.querySelector('.view-more-collections');
    const collectionsHidden = document.querySelector('.collections-hidden');
    
    if (viewMoreCollectionsBtn && collectionsHidden) {
        viewMoreCollectionsBtn.addEventListener('click', function() {
            collectionsHidden.classList.toggle('active');
            
            if (collectionsHidden.classList.contains('active')) {
                viewMoreCollectionsBtn.textContent = 'Voir moins';
            } else {
                viewMoreCollectionsBtn.textContent = 'Voir plus';
            }
        });
    }
});