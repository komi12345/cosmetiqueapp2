// Smooth scrolling for navigation links and footer quick links
document.addEventListener('DOMContentLoaded', function() {
    // Select all navigation links and footer quick links that have hash (#) in their href
    const allLinks = document.querySelectorAll('.nav-links a[href^="#"], .footer-links a[href^="#"]');
    
    allLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            // Prevent default anchor behavior
            e.preventDefault();
            
            // Get the target section id from the href attribute
            const targetId = this.getAttribute('href');
            
            // Skip if the href is just "#" (home link)
            if (targetId === '#') {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
                return;
            }
            
            // Find the target element
            const targetElement = document.querySelector(targetId);
            
            // If target element exists, scroll to it smoothly
            if (targetElement) {
                // Get the height of the navbar to offset the scroll position
                const navbarHeight = document.querySelector('.navbar').offsetHeight;
                
                // Calculate the position to scroll to (element position - navbar height)
                const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - navbarHeight;
                
                // Scroll to the target position
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
                
                // Update active class in navigation
                document.querySelectorAll('.nav-links a').forEach(navLink => {
                    navLink.classList.remove('active');
                });
                this.classList.add('active');
            }
        });
    });
});