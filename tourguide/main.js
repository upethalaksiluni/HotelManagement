// Main JavaScript functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', function() {
            mobileMenu.classList.toggle('hidden');
        });
    }
    
    // FAQ functionality
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        const answer = item.querySelector('.faq-answer');
        
        if (question && answer) {
            question.addEventListener('click', function() {
                const isActive = item.classList.contains('active');
                
                // Close all FAQ items
                faqItems.forEach(faqItem => {
                    faqItem.classList.remove('active');
                    const faqAnswer = faqItem.querySelector('.faq-answer');
                    if (faqAnswer) {
                        faqAnswer.classList.add('hidden');
                    }
                });
                
                // Toggle current item
                if (!isActive) {
                    item.classList.add('active');
                    answer.classList.remove('hidden');
                }
            });
        }
    });
    
    // Modal functionality
    const userLoginModal = document.getElementById('user-login-modal');
    const ownerLoginModal = document.getElementById('owner-login-modal');
    const modalCloseButtons = document.querySelectorAll('.modal-close');
    
    // Open modals
    document.addEventListener('click', function(e) {
        if (e.target.matches('a[href="#user-login"]')) {
            e.preventDefault();
            if (userLoginModal) {
                userLoginModal.classList.remove('hidden');
                userLoginModal.classList.add('flex');
            }
        }
        
        if (e.target.matches('a[href="#owner-login"]')) {
            e.preventDefault();
            if (ownerLoginModal) {
                ownerLoginModal.classList.remove('hidden');
                ownerLoginModal.classList.add('flex');
            }
        }
    });
    
    // Close modals
    modalCloseButtons.forEach(button => {
        button.addEventListener('click', function() {
            const modal = button.closest('.modal');
            if (modal) {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }
        });
    });
    
    // Close modal when clicking outside
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('modal')) {
            e.target.classList.add('hidden');
            e.target.classList.remove('flex');
        }
    });
    
    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                
                // Close mobile menu if open
                if (mobileMenu && !mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.add('hidden');
                }
            }
        });
    });
    
    // Form submissions
    const forms = document.querySelectorAll('form');
    forms.forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Get form data
            const formData = new FormData(form);
            const formType = form.closest('section')?.id || 'unknown';
            
            // Show loading state
            const submitButton = form.querySelector('button[type="submit"]');
            if (submitButton) {
                const originalText = submitButton.textContent;
                submitButton.innerHTML = '<span class="loading mr-2"></span>Processing...';
                submitButton.disabled = true;
                
                // Simulate form processing
                setTimeout(() => {
                    submitButton.textContent = originalText;
                    submitButton.disabled = false;
                    
                    // Show success message
                    showNotification('Form submitted successfully!', 'success');
                    
                    // Reset form
                    form.reset();
                    
                    // Close modal if in modal
                    const modal = form.closest('.modal');
                    if (modal) {
                        modal.classList.add('hidden');
                        modal.classList.remove('flex');
                    }
                }, 2000);
            }
        });
    });
    
    // Notification system
    function showNotification(message, type = 'info') {
        const notification = document.createElement('div');
        notification.className = `fixed top-4 right-4 z-50 p-4 rounded-lg shadow-lg text-white ${
            type === 'success' ? 'bg-green-500' : 
            type === 'error' ? 'bg-red-500' : 
            'bg-blue-500'
        }`;
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        // Fade in
        setTimeout(() => {
            notification.style.opacity = '1';
        }, 100);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.opacity = '0';
            setTimeout(() => {
                document.body.removeChild(notification);
            }, 300);
        }, 3000);
    }
    
    // Booking form functionality
    const bookingForm = document.querySelector('#online-booking form');
    if (bookingForm) {
        bookingForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const serviceType = bookingForm.querySelector('select').value;
            const pickupLocation = bookingForm.querySelector('input[placeholder*="pick-up"]').value;
            const destination = bookingForm.querySelector('input[placeholder*="destination"]').value;
            const datetime = bookingForm.querySelector('input[type="datetime-local"]').value;
            
            if (!pickupLocation || !destination || !datetime) {
                showNotification('Please fill in all required fields', 'error');
                return;
            }
            
            // Process booking
            const bookingData = {
                serviceType,
                pickupLocation,
                destination,
                datetime
            };
            
            console.log('Booking data:', bookingData);
            showNotification('Booking request submitted! You will receive confirmation shortly.', 'success');
        });
    }
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);
    
    // Observe elements for animation
    document.querySelectorAll('section').forEach(section => {
        observer.observe(section);
    });
    
    // Dynamic content loading simulation
    function loadDynamicContent() {
        // Simulate loading news articles
        const newsContainer = document.querySelector('#news .grid');
        if (newsContainer) {
            // Add loading state
            newsContainer.classList.add('opacity-50');
            
            setTimeout(() => {
                newsContainer.classList.remove('opacity-50');
            }, 1000);
        }
    }
    
    // Initialize dynamic content
    loadDynamicContent();
    
    // Add hover effects to cards
    const cards = document.querySelectorAll('.bg-gray-50, .bg-white');
    cards.forEach(card => {
        card.classList.add('card-hover');
    });
    
    // Search functionality (placeholder)
    function initializeSearch() {
        const searchInput = document.createElement('input');
        searchInput.type = 'text';
        searchInput.placeholder = 'Search...';
        searchInput.className = 'hidden';
        
        // Add search functionality when needed
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            // Implement search logic here
            console.log('Searching for:', searchTerm);
        });
    }
    
    // Initialize additional features
    initializeSearch();
    
    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        // ESC key closes modals
        if (e.key === 'Escape') {
            const openModal = document.querySelector('.modal:not(.hidden)');
            if (openModal) {
                openModal.classList.add('hidden');
                openModal.classList.remove('flex');
            }
        }
        
        // Enter key on mobile menu button
        if (e.key === 'Enter' && e.target === mobileMenuButton) {
            mobileMenuButton.click();
        }
    });
    
    // Analytics tracking (placeholder)
    function trackEvent(eventName, eventData) {
        console.log('Analytics Event:', eventName, eventData);
        // Integrate with your analytics service here
    }
    
    // Track page interactions
    document.addEventListener('click', function(e) {
        if (e.target.matches('button, .btn, a')) {
            trackEvent('click', {
                element: e.target.tagName,
                text: e.target.textContent,
                href: e.target.href || null
            });
        }
    });
    
    console.log('TaxiCaller website initialized successfully!');
});

// Additional utility functions
function formatCurrency(amount, currency = 'USD') {
    return new Intl.NumberFormat('en-US', {
        style: 'currency',
        currency: currency
    }).format(amount);
}

function formatDate(date) {
    return new Intl.DateTimeFormat('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    }).format(new Date(date));
}

function calculateDistance(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the Earth in kilometers
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLon = (lon2 - lon1) * Math.PI / 180;
    const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
              Math.sin(dLon/2) * Math.sin(dLon/2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
    return R * c;
}

// Export functions for use in other modules
window.TaxiCaller = {
    formatCurrency,
    formatDate,
    calculateDistance
};