// Variables globales pour le panier
let cartItems = [];

// Fonction de redirection vers WhatsApp
function redirectToWhatsAppCheckout(items) {
    if (!items || items.length === 0) {
        alert('Votre panier est vide. Veuillez ajouter des produits avant de commander.');
        return;
    }

    const phoneNumber = "22897447627";
    let message = "Bonjour ! Je souhaite commander les produits suivants :\n\n";
    let total = 0;

    items.forEach(item => {
        const itemTotal = item.price * item.quantity;
        message += `- ${item.name} (x${item.quantity}) : ${item.price.toFixed(2)} €\n`;
        total += itemTotal;
    });

    message += `\nTotal de la commande : ${total.toFixed(2)} €`;

    // Encode message for URL
    const encodedMessage = encodeURIComponent(message);

    // Construct WhatsApp URL
    const whatsappURL = `https://wa.me/${phoneNumber}?text=${encodedMessage}`;

    // Redirect user
    window.open(whatsappURL, '_blank');
}

// Mettre à jour le compteur du panier
function updateCartCount() {
    const cartCount = document.querySelector('.cart-count');
    if (!cartCount) return;
    
    const totalItems = cartItems.reduce((total, item) => total + item.quantity, 0);
    cartCount.textContent = totalItems;
    
    // Afficher le compteur seulement s'il y a des produits
    if (totalItems > 0) {
        cartCount.style.display = 'flex';
    } else {
        cartCount.style.display = 'none';
    }
}

// Mettre à jour l'affichage du panier
function updateCartDisplay() {
    const cartItemsContainer = document.querySelector('.cart-items');
    const totalPrice = document.querySelector('.total-price');
    
    if (!cartItemsContainer || !totalPrice) return;
    
    // Vider le conteneur
    cartItemsContainer.innerHTML = '';
    
    if (cartItems.length === 0) {
        cartItemsContainer.innerHTML = '<p class="empty-cart">Votre panier est vide</p>';
        totalPrice.textContent = '0.00 €';
        return;
    }
    
    // Calculer le total
    let total = 0;
    
    // Ajouter chaque produit au panier
    cartItems.forEach((item, index) => {
        const itemTotal = item.price * item.quantity;
        total += itemTotal;
        
        const cartItemElement = document.createElement('div');
        cartItemElement.classList.add('cart-item');
        cartItemElement.innerHTML = `
            <div class="cart-item-image">
                <img src="${item.image}" alt="${item.name}">
            </div>
            <div class="cart-item-details">
                <h4>${item.name}</h4>
                <div class="cart-item-price">${item.price.toFixed(2)} € × ${item.quantity}</div>
                <div class="cart-item-total">${itemTotal.toFixed(2)} €</div>
            </div>
            <button class="remove-item" data-index="${index}">
                <i class="fas fa-trash"></i>
            </button>
        `;
        
        cartItemsContainer.appendChild(cartItemElement);
    });
    
    // Mettre à jour le prix total
    totalPrice.textContent = `${total.toFixed(2)} €`;
    
    // Ajouter les écouteurs d'événements pour les boutons de suppression
    document.querySelectorAll('.remove-item').forEach(button => {
        button.addEventListener('click', function() {
            const index = parseInt(this.getAttribute('data-index'));
            removeCartItem(index);
        });
    });
}

// Supprimer un produit du panier
function removeCartItem(index) {
    cartItems.splice(index, 1);
    updateCartCount();
    updateCartDisplay();
}

// Animation de confirmation d'ajout au panier
function showAddToCartConfirmation() {
    const confirmation = document.createElement('div');
    confirmation.classList.add('add-to-cart-confirmation');
    confirmation.innerHTML = `
        <i class="fas fa-check-circle"></i>
        <p>Produit ajouté au panier</p>
    `;
    
    document.body.appendChild(confirmation);
    
    // Afficher l'animation
    setTimeout(() => {
        confirmation.classList.add('show');
    }, 10);
    
    // Supprimer l'animation après 2 secondes
    setTimeout(() => {
        confirmation.classList.remove('show');
        setTimeout(() => {
            document.body.removeChild(confirmation);
        }, 300);
    }, 2000);
}

document.addEventListener('DOMContentLoaded', function() {
    // Gestion du panier
    const cartIcon = document.querySelector('.cart-icon');
    const cartContainer = document.querySelector('.cart-container');
    const closeCartBtn = document.querySelector('.close-cart');
    const checkoutBtn = document.querySelector('.checkout-btn');
    
    // Boutons d'ajout au panier (produits ET collections)
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    
    // Ouvrir/fermer le panier
    if (cartIcon && cartContainer) {
        cartIcon.addEventListener('click', function(e) {
            e.preventDefault();
            cartContainer.classList.toggle('active');
            updateCartDisplay();
        });
    }
    
    if (closeCartBtn && cartContainer) {
        closeCartBtn.addEventListener('click', function() {
            cartContainer.classList.remove('active');
        });
    }
    
    // Ajouter un produit au panier
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Récupérer les informations du produit
            const productCard = this.closest('.product-card') || this.closest('.collection-card');
            const productName = productCard.querySelector('.product-title, h3').textContent;
            
            // Pour les collections, le prix est dans un format différent
            let productPrice;
            let price;
            
            if (productCard.classList.contains('collection-card')) {
                // Pour les collections, le prix est dans un span à l'intérieur de .collection-price
                productPrice = productCard.querySelector('.collection-price span').textContent;
                // Extraire le prix numérique
                price = parseFloat(productPrice.replace('€', '').trim());
            } else {
                // Pour les produits normaux
                productPrice = productCard.querySelector('.product-price').textContent.trim();
                // Extraire le prix numérique
                price = parseFloat(productPrice.replace('€', '').trim());
            }
            
            const productImage = productCard.querySelector('img').src;
            const quantity = productCard.querySelector('.quantity') ? 
                             parseInt(productCard.querySelector('.quantity').textContent) : 1;
            
            // Vérifier si le produit est déjà dans le panier
            const existingItemIndex = cartItems.findIndex(item => item.name === productName);
            
            if (existingItemIndex > -1) {
                // Mettre à jour la quantité si le produit existe déjà
                cartItems[existingItemIndex].quantity += quantity;
            } else {
                // Ajouter un nouveau produit
                cartItems.push({
                    name: productName,
                    price: price,
                    image: productImage,
                    quantity: quantity
                });
            }
            
            // Mettre à jour l'affichage du panier
            updateCartCount();
            
            // Animation de confirmation
            showAddToCartConfirmation();
        });
    });
    
    // Gestion du bouton Commander
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', function() {
            // Redirection WhatsApp
            redirectToWhatsAppCheckout(cartItems);
        });
    }
    
    // Initialiser l'affichage du panier
    updateCartCount();
});