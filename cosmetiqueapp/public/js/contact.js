document.addEventListener('DOMContentLoaded', function() {
    // Gestion du formulaire de contact
    const contactForm = document.getElementById('contactForm');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Récupération des valeurs du formulaire
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const phone = document.getElementById('phone').value;
            const subject = document.getElementById('subject').value;
            const message = document.getElementById('message').value;
            
            // Ici, vous pourriez envoyer les données à un serveur
            // Pour l'instant, nous affichons simplement une alerte
            alert(`Merci ${name} pour votre message. Nous vous contacterons bientôt!`);
            
            // Réinitialisation du formulaire
            contactForm.reset();
        });
    }
});