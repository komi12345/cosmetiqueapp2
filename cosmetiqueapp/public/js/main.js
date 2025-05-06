document.addEventListener('DOMContentLoaded', () => {
    // ... existing WhatsApp Order Button Logic ...

    // --- Automatic Testimonial Slider ---
    const testimonialsContainer = document.querySelector('.testimonials-container');
    const testimonialsGrid = document.querySelector('.testimonials-grid');
    const prevButton = document.querySelector('.testimonial-prev'); // Get prev button
    const nextButton = document.querySelector('.testimonial-next'); // Get next button
    let scrollInterval; // Variable to hold the interval ID

    // Function to calculate scroll amount (extracted for reuse)
    function getScrollAmount() {
        if (!testimonialsGrid) return 0;
        const firstCard = testimonialsGrid.querySelector('.testimonial-card');
        if (!firstCard) return 0;

        const cardStyle = window.getComputedStyle(firstCard);
        const cardWidth = firstCard.offsetWidth;
        const gridStyle = window.getComputedStyle(testimonialsGrid);
        const gap = parseFloat(gridStyle.gap) || 20;
        return cardWidth + gap;
    }

    function startAutoScroll() {
        // Clear any existing interval to prevent duplicates
        clearInterval(scrollInterval);

        scrollInterval = setInterval(() => {
            if (!testimonialsContainer || !testimonialsGrid) return; // Safety check

            const firstCard = testimonialsGrid.querySelector('.testimonial-card');
            if (!firstCard) return; // No cards found

            // Calculate scroll amount: card width + gap
            const cardStyle = window.getComputedStyle(firstCard);
            const cardWidth = firstCard.offsetWidth; // Includes padding and border
            const gridStyle = window.getComputedStyle(testimonialsGrid);
            const gap = parseFloat(gridStyle.gap) || 20; // Get gap or use fallback

            const scrollAmount = cardWidth + gap;

            // Check if scrolling would go past the end
            // scrollLeft: current scroll position
            // scrollWidth: total width of the scrollable content
            // clientWidth: visible width of the container
            if (testimonialsContainer.scrollLeft + testimonialsContainer.clientWidth + scrollAmount >= testimonialsContainer.scrollWidth) {
                // If near the end, scroll back to the beginning smoothly
                testimonialsContainer.scrollTo({ left: 0, behavior: 'smooth' });
            } else {
                // Otherwise, scroll by the calculated amount
                testimonialsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
            }
        }, 3000); // Scroll every 3000ms (3 seconds) - Adjust as needed
    }

    function stopAutoScroll() {
        clearInterval(scrollInterval);
    }

    if (testimonialsContainer && testimonialsGrid) {
        // Start scrolling initially
        startAutoScroll();

        // Pause/Resume on hover/touch
        testimonialsContainer.addEventListener('mouseenter', stopAutoScroll);
        testimonialsContainer.addEventListener('mouseleave', startAutoScroll);
        testimonialsContainer.addEventListener('touchstart', stopAutoScroll, { passive: true });

        // Add Arrow Button Listeners
        if (prevButton && nextButton) {
            prevButton.addEventListener('click', () => {
                stopAutoScroll(); // Stop auto-scroll on manual navigation
                const scrollAmount = getScrollAmount();
                testimonialsContainer.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
                // Optionally restart auto-scroll after a delay:
                // setTimeout(startAutoScroll, 5000); // Restart after 5 seconds
            });

            nextButton.addEventListener('click', () => {
                stopAutoScroll(); // Stop auto-scroll on manual navigation
                const scrollAmount = getScrollAmount();
                 // Check if already at the end before scrolling
                 if (testimonialsContainer.scrollLeft + testimonialsContainer.clientWidth < testimonialsContainer.scrollWidth - 5) {
                    testimonialsContainer.scrollBy({ left: scrollAmount, behavior: 'smooth' });
                 } else {
                     // Optional: Scroll to beginning if at the end and next is clicked
                     testimonialsContainer.scrollTo({ left: 0, behavior: 'smooth' });
                 }
                // Optionally restart auto-scroll after a delay:
                // setTimeout(startAutoScroll, 5000); // Restart after 5 seconds
            });
        }

    }
    // --- End Automatic Testimonial Slider ---


    // --- Scroll to Product or Collection from Search Results ---
    const searchResultsContainer = document.querySelector('#search-results-container');
    const productsSection = document.querySelector('#products-section');
    const collectionsSection = document.querySelector('#collections-section');

    if (searchResultsContainer) {
        searchResultsContainer.addEventListener('click', async (event) => {
            const clickedResult = event.target.closest('.search-result-item');
            if (!clickedResult) return;
            
            // Hide search results immediately
            const searchContainer = document.querySelector('.search-container');
            if (searchContainer) {
                searchContainer.classList.remove('active');
            }
            
            // Check if it's a collection result
            if (clickedResult.dataset.resultType === 'collection') {
                const collectionId = clickedResult.dataset.collectionId;
                const resultTitle = clickedResult.querySelector('h4')?.textContent;
                console.log(`Search: Clicked collection result: ${collectionId}, Title: ${resultTitle}`);
                
                if (collectionsSection) {
                    // First scroll to collections section
                    collectionsSection.scrollIntoView({ behavior: 'smooth' });
                    
                    // Wait a moment for the scroll to complete
                    await new Promise(resolve => setTimeout(resolve, 400));
                    
                    // Check if we need to expand hidden collections
                    let collectionCard = null;
                    
                    // First check if the collection is in the visible container
                    const visibleCollections = collectionsSection.querySelectorAll('.collections-container .collection-card');
                    for (const card of visibleCollections) {
                        const cardId = card.getAttribute('data-collection-id');
                        const cardTitle = card.querySelector('h3')?.textContent;
                        
                        if ((cardId && cardId === collectionId) || 
                            (resultTitle && cardTitle && cardTitle.trim() === resultTitle.trim())) {
                            collectionCard = card;
                            console.log("Search: Collection found in visible section");
                            break;
                        }
                    }
                    
                    // If not found in visible collections, check hidden collections
                    if (!collectionCard) {
                        console.log("Search: Collection not found in visible section, checking hidden section");
                        
                        // Check if there are hidden collections
                        const hiddenCollections = collectionsSection.querySelectorAll('.collections-hidden .collection-card');
                        
                        if (hiddenCollections.length > 0) {
                            // Look for our collection in the hidden section
                            for (const card of hiddenCollections) {
                                const cardId = card.getAttribute('data-collection-id');
                                const cardTitle = card.querySelector('h3')?.textContent;
                                
                                if ((cardId && cardId === collectionId) || 
                                    (resultTitle && cardTitle && cardTitle.trim() === resultTitle.trim())) {
                                    // Found the collection in hidden section
                                    console.log("Search: Collection found in hidden section, clicking 'Voir plus'");
                                    
                                    // Click the "Voir plus" button to reveal hidden collections
                                    const viewMoreBtn = collectionsSection.querySelector('.view-more-collections');
                                    if (viewMoreBtn) {
                                        viewMoreBtn.click();
                                        console.log("Search: Clicked 'Voir plus' button");
                                        
                                        // Wait for hidden collections to become visible
                                        await new Promise(resolve => setTimeout(resolve, 1000));
                                        
                                        // Now try to find the collection again
                                        collectionCard = card; // We already have the reference
                                        break;
                                    } else {
                                        console.log("Search: 'Voir plus' button not found");
                                    }
                                }
                            }
                        } else {
                            console.log("Search: No hidden collections found");
                        }
                    }
                    
                    // If we found the collection, scroll to it and highlight it
                    if (collectionCard) {
                        console.log("Search: Scrolling to collection");
                        
                        // Scroll to the specific collection
                        collectionCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        
                        // Highlight the collection
                        collectionCard.classList.add('highlighted-collection');
                        setTimeout(() => {
                            collectionCard.classList.remove('highlighted-collection');
                        }, 2500);
                    } else {
                        console.warn(`Search: Collection with ID ${collectionId} or title "${resultTitle}" not found`);
                    }
                }
            }
            // Handle product search results
            else if (clickedResult.dataset.productId) {
                const productId = clickedResult.dataset.productId;
                console.log(`Search: Clicked product result: ${productId}`);
                
                if (productsSection) {
                    // First scroll to products section
                    productsSection.scrollIntoView({ behavior: 'smooth' });
                    
                    // Wait a moment for the scroll to complete
                    await new Promise(resolve => setTimeout(resolve, 400));
                    
                    // Try to find the product in visible products first
                    let productCard = productsSection.querySelector(`.products-container .product-card[data-product-id='${productId}']`);
                    
                    // If not found in visible products, check if it's in hidden products
                    if (!productCard) {
                        const hiddenProductCard = productsSection.querySelector(`.products-hidden .product-card[data-product-id='${productId}']`);
                        
                        if (hiddenProductCard) {
                            console.log("Search: Product found in hidden section, clicking 'Voir plus'");
                            // Product is hidden, click "Voir plus" button
                            const viewMoreBtn = productsSection.querySelector('.view-more-btn'); // Corrected selector
                            if (viewMoreBtn && viewMoreBtn.textContent.toLowerCase().includes('plus')) {
                                viewMoreBtn.click();
                                // Wait for hidden products to become visible
                                await new Promise(resolve => setTimeout(resolve, 800));
                                
                                // Try to find the product again after expanding, ensure it's queried from the correct, possibly updated, DOM
                                productCard = productsSection.querySelector(`.product-card[data-product-id='${productId}']`);
                            }
                        }
                    }
                    
                    if (productCard) {
                        // Scroll to the specific product
                        productCard.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        
                        // Highlight the product
                        productCard.classList.add('highlighted-product');
                        setTimeout(() => {
                            productCard.classList.remove('highlighted-product');
                        }, 2500);
                    } else {
                        console.warn(`Search: Product with ID ${productId} not found after multiple attempts`);
                    }
                }
            }
        });
    }
    // --- End Scroll to Product or Collection from Search Results ---
});