/**
 * Blog Section JavaScript
 */

document.addEventListener('DOMContentLoaded', function() {
    // Sélectionner tous les articles du blog
    const blogCards = document.querySelectorAll('.blog-card');
    
    // Ajouter des animations et des interactions aux cartes de blog
    blogCards.forEach(card => {
        // Animation au survol
        card.addEventListener('mouseenter', function() {
            this.style.transition = 'transform 0.3s ease, box-shadow 0.3s ease';
        });
        
        // Gérer les clics sur "Lire l'article"
        const readMoreBtn = card.querySelector('.read-more');
        if (readMoreBtn) {
            readMoreBtn.addEventListener('click', function(e) {
                e.preventDefault();
                // Ici, vous pourriez rediriger vers la page de l'article complet
                // ou ouvrir un modal avec le contenu complet
                alert('Fonctionnalité à venir : affichage de l\'article complet');
            });
        }
    });
    
    // Gérer le clic sur "Voir tous les articles"
    const viewAllBtn = document.querySelector('.blog-view-all .btn');
    if (viewAllBtn) {
        viewAllBtn.addEventListener('click', function(e) {
            e.preventDefault();
            // Redirection vers la page du blog ou affichage de plus d'articles
            alert('Fonctionnalité à venir : page complète du blog');
        });
    }
});