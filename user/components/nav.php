<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<nav class="bg-white shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo & Brand -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-2xl font-serif font-bold text-gray-900">The Royal Grand Hotel</span>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8 ml-10">
                    <?php
                    $nav_items = [
                        'dashboard.php' => 'Dashboard',
                        'book-room.php' => 'Book Room',
                        'book-taxi.php' => 'Book Taxi',
                        'bookings.php' => 'My Bookings',
                        'profile.php' => 'Profile'
                    ];

                    foreach ($nav_items as $url => $title) {
                        $active = $current_page === $url;
                        $classes = $active 
                            ? 'px-3 py-2 rounded-md text-sm font-medium bg-navy text-gray-900'
                            : 'px-3 py-2 rounded-md text-sm font-medium text-gray-900 hover:bg-gray-100 transition-colors';
                        echo "<a href='$url' class='$classes'>$title</a>";
                    }
                    ?>
                </div>
            </div>

            <!-- User Menu & Mobile Button -->
            <div class="flex items-center">
                <div class="hidden md:flex items-center space-x-4">
                    <span class="text-sm text-gray-900"><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="../logout.php" 
                       class="px-4 py-2 text-sm font-medium text-white bg-red-600 rounded hover:bg-red-700 transition-colors">
                        Logout
                    </a>
                </div>

                <!-- Mobile menu button -->
                <button id="mobile-menu-button" class="md:hidden p-2 rounded-md hover:bg-gray-100 focus:outline-none">
                    <svg class="h-6 w-6 text-gray-900" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="md:hidden hidden transition-all duration-300 ease-in-out">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <?php
                foreach ($nav_items as $url => $title) {
                    $active = $current_page === $url;
                    $classes = $active 
                        ? 'block px-3 py-2 rounded-md text-base font-medium bg-navy text-white'
                        : 'block px-3 py-2 rounded-md text-base font-medium text-gray-900 hover:bg-gray-100 transition-colors';
                    echo "<a href='$url' class='$classes'>$title</a>";
                }
                ?>
                <a href="../logout.php" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-white bg-red-600 hover:bg-red-700 transition-colors">
                    Logout
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
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