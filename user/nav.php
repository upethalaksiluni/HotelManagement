<?php
// Add required includes at the top
require_once '../includes/config.php';
require_once '../includes/db.php';

$currentUser = $db->query("SELECT * FROM Users WHERE user_id = '{$_SESSION['user_id']}'")->fetch_assoc();
$current_page = basename($_SERVER['PHP_SELF']);

// Function to set active class
function isActive($page) {
    global $current_page;
    return $current_page === $page ? 'bg-navy-light' : 'hover:bg-navy-light';
}
?>

<!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-serif font-bold text-navy">
                    The Royal Grand Hotel
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="index.html" class="text-navy hover:text-gold transition-colors duration-300">Home</a>
                    <a href="accommodation.html" class="text-navy hover:text-gold transition-colors duration-300">Accommodation</a>
                    <a href="dining.html" class="text-navy hover:text-gold transition-colors duration-300">Dining</a>
                    <a href="offers.html" class="text-navy hover:text-gold transition-colors duration-300">Offers</a>
                    <a href="contact.html" class="text-navy hover:text-gold transition-colors duration-300">Contact</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-btn" class="md:hidden text-navy">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
            
            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="hidden md:hidden mt-4 pb-4">
                <div class="flex flex-col space-y-3">
                    <a href="index.html" class="text-navy hover:text-gold transition-colors duration-300">Home</a>
                    <a href="accommodation.html" class="text-navy hover:text-gold transition-colors duration-300">Accommodation</a>
                    <a href="dining.html" class="text-navy hover:text-gold transition-colors duration-300">Dining</a>
                    <a href="offers.html" class="text-navy hover:text-gold transition-colors duration-300">Offers</a>
                    <a href="contact.html" class="text-navy hover:text-gold transition-colors duration-300">Contact</a>
                </div>
            </div>
        </nav>
    </header>

<script>
    // Mobile menu toggle
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    mobileMenuButton.addEventListener('click', () => {
        mobileMenu.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuButton.contains(e.target) && !mobileMenu.contains(e.target)) {
            mobileMenu.classList.add('hidden');
        }
    });
</script>