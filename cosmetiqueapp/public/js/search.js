document.addEventListener('DOMContentLoaded', function() {
    // Search functionality
    const searchIcon = document.querySelector('.search-icon');
    const searchContainer = document.querySelector('.search-container');
    const closeSearch = document.querySelector('.close-search');
    const searchInput = document.querySelector('.search-box input');
    const searchButton = document.querySelector('.search-box button[type="submit"]');
    
    if (searchIcon && searchContainer && closeSearch && searchInput) {
        // Create search results container
        const searchResultsContainer = document.createElement('div');
        searchResultsContainer.id = 'search-results-container'; // Add ID for main.js to find
        searchResultsContainer.classList.add('search-results');
        searchContainer.querySelector('.search-box').appendChild(searchResultsContainer);
        
        searchIcon.addEventListener('click', function(e) {
            e.preventDefault();
            searchContainer.classList.add('active');
            searchInput.focus();
        });
        
        closeSearch.addEventListener('click', function() {
            searchContainer.classList.remove('active');
            searchResultsContainer.innerHTML = '';
        });
        
        // Function to perform search
        function performSearch(query) {
            // Clear previous results
            searchResultsContainer.innerHTML = '';
            
            if (!query.trim()) {
                return;
            }
            
            query = query.toLowerCase();
            
            // Get all products and collections
            const productCards = document.querySelectorAll('.product-card');
            const collectionCards = document.querySelectorAll('.collection-card');
            
            let results = [];
            
            // Search in products
            productCards.forEach(card => {
                const title = card.querySelector('.product-title').textContent.toLowerCase();
                const description = card.querySelector('.product-description').textContent.toLowerCase();
                
                if (title.includes(query) || description.includes(query)) {
                    results.push({
                        type: 'product',
                        element: card
                    });
                }
            });
            
            // Search in collections
            collectionCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const description = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(query) || description.includes(query)) {
                    results.push({
                        type: 'collection',
                        element: card
                    });
                }
            });
            
            // Display results
            if (results.length === 0) {
                searchResultsContainer.innerHTML = '<p class="no-results">Aucun résultat trouvé</p>';
                return;
            }
            
            // Create results HTML
            results.forEach(result => {
                const card = result.element;
                const resultItem = document.createElement('div');
                resultItem.classList.add('search-result-item');
                
                // Add data attributes to search result item
                if (result.type === 'product') {
                    const productId = card.getAttribute('data-product-id');
                    if (productId) {
                        resultItem.setAttribute('data-product-id', productId);
                    }
                    resultItem.setAttribute('data-result-type', 'product');
                } else if (result.type === 'collection') {
                    // Add collection identifier
                    const collectionId = card.getAttribute('data-collection-id');
                    if (collectionId) {
                        resultItem.setAttribute('data-collection-id', collectionId);
                    } else {
                        // Fallback if no data-collection-id is present
                        resultItem.setAttribute('data-collection-id', `collection-${Math.random().toString(36).substr(2, 9)}`);
                    }
                    resultItem.setAttribute('data-result-type', 'collection');
                }
                
                let title, price, image, description;
                
                if (result.type === 'product') {
                    title = card.querySelector('.product-title').textContent;
                    price = card.querySelector('.product-price').textContent;
                    image = card.querySelector('.product-image img').src;
                    description = card.querySelector('.product-description').textContent;
                } else {
                    title = card.querySelector('h3').textContent;
                    price = card.querySelector('.collection-price span').textContent;
                    image = card.querySelector('.collection-image img').src;
                    description = card.querySelector('p').textContent;
                }
                
                // Create a shortened description
                const shortDescription = description.length > 60 ? 
                    description.substring(0, 60) + '...' : description;
                
                resultItem.innerHTML = `
                    <div class="result-image">
                        <img src="${image}" alt="${title}">
                    </div>
                    <div class="result-details">
                        <h4>${title}</h4>
                        <p>${shortDescription}</p>
                        <div class="result-price">${price}</div>
                    </div>
                    <div class="result-actions">
                        <button class="btn btn-primary add-to-cart-search"><i class="fas fa-shopping-cart"></i></button>
                        <button class="btn btn-secondary order-now-search">Commander</button>
                    </div>
                `;
                
                searchResultsContainer.appendChild(resultItem);
                
                // Make the entire result item clickable to navigate to the product
                resultItem.addEventListener('click', function(e) {
                    // Don't navigate if clicking on buttons
                    if (e.target.closest('.result-actions') || 
                        e.target.closest('.add-to-cart-search') || 
                        e.target.closest('.order-now-search')) {
                        return;
                    }
                    
                    // Close the search container
                    searchContainer.classList.remove('active');
                    
                    // The navigation to product is now handled by main.js
                    // We just need to ensure the data-product-id is set correctly
                });
                
                // Add event listener to the "Add to Cart" button
                const addToCartBtn = resultItem.querySelector('.add-to-cart-search');
                addToCartBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent the click from bubbling to the parent
                    
                    let productPrice;
                    let price;
                    
                    if (result.type === 'collection') {
                        productPrice = card.querySelector('.collection-price span').textContent;
                        price = parseFloat(productPrice.replace('€', '').trim());
                    } else {
                        productPrice = card.querySelector('.product-price').textContent.trim();
                        price = parseFloat(productPrice.replace('€', '').trim());
                    }
                    
                    // Add to cart logic
                    const existingItemIndex = cartItems.findIndex(item => item.name === title);
                    
                    if (existingItemIndex > -1) {
                        cartItems[existingItemIndex].quantity += 1;
                    } else {
                        cartItems.push({
                            name: title,
                            price: price,
                            image: image, // Make sure image is defined
                            quantity: 1
                        });
                    }
                    
                    updateCartCount();
                    showAddToCartConfirmation();
                });
                
                // Add event listener to the "Order" button
                const orderNowBtn = resultItem.querySelector('.order-now-search');
                orderNowBtn.addEventListener('click', function(e) {
                    e.stopPropagation(); // Prevent the click from bubbling to the parent
                    
                    let productPrice;
                    let price;
                    let title = result.type === 'product' ? card.querySelector('.product-title').textContent : card.querySelector('h3').textContent;
                    let image = result.type === 'product' ? card.querySelector('.product-image img').src : card.querySelector('.collection-image img').src;
                    
                    if (result.type === 'collection') {
                        productPrice = card.querySelector('.collection-price span').textContent;
                        price = parseFloat(productPrice.replace('€', '').trim());
                    } else {
                        productPrice = card.querySelector('.product-price').textContent.trim();
                        price = parseFloat(productPrice.replace('€', '').trim());
                    }
                    
                    // Add to cart logic (ensure item is added before redirecting)
                    const existingItemIndex = cartItems.findIndex(item => item.name === title);
                    
                    if (existingItemIndex > -1) {
                        cartItems[existingItemIndex].quantity += 1;
                    } else {
                        cartItems.push({
                            name: title,
                            price: price,
                            image: image, // Make sure image is defined
                            quantity: 1
                        });
                    }
                    
                    updateCartCount(); // Update cart count display
                    
                    // Redirect to WhatsApp checkout
                    redirectToWhatsAppCheckout(cartItems); // Call the new function
                });
            });
        }
        
        // Search on input
        searchInput.addEventListener('input', function() {
            performSearch(this.value);
        });
        
        // Search on button click
        searchButton.addEventListener('click', function(e) {
            e.preventDefault();
            performSearch(searchInput.value);
        });
        
        // Close search when clicking outside the search box
        searchContainer.addEventListener('click', function(e) {
            if (e.target === searchContainer) {
                searchContainer.classList.remove('active');
                searchResultsContainer.innerHTML = '';
            }
        });
        
        // Close search when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && searchContainer.classList.contains('active')) {
                searchContainer.classList.remove('active');
                searchResultsContainer.innerHTML = '';
            }
        });
    }
});