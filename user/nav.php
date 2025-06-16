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

<nav class="bg-white text-gray-900">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <span class="text-xl font-bold">Hotel System</span>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="dashboard.php" 
                           class="px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('dashboard.php'); ?>">
                            Dashboard
                        </a>
                        <a href="book-room.php" 
                           class="px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('book-room.php'); ?>">
                            Book Room
                        </a>
                        <a href="book-taxi.php" 
                           class="px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('book-taxi.php'); ?>">
                            Book Taxi
                        </a>
                        <a href="bookings.php" 
                           class="px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('bookings.php'); ?>">
                            My Bookings
                        </a>
                        <a href="profile.php" 
                           class="px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('profile.php'); ?>">
                            Profile
                        </a>
                    </div>
                </div>
            </div>
            <div class="flex items-center">
                <span class="text-sm mr-4"><?php echo htmlspecialchars($currentUser['username']); ?></span>
                <a href="../logout.php" class="px-3 py-2 rounded-md text-sm font-medium hover:bg-navy-light">Logout</a>
            </div>

            <!-- Mobile menu button -->
            <div class="md:hidden">
                <button id="mobile-menu-button" class="text-gray-300 hover:text-white">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div class="md:hidden hidden" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="dashboard.php" 
               class="block px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('dashboard.php'); ?>">
                Dashboard
            </a>
            <a href="book-room.php" 
               class="block px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('book-room.php'); ?>">
                Book Room
            </a>
            <a href="book-taxi.php" 
               class="block px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('book-taxi.php'); ?>">
                Book Taxi
            </a>
            <a href="bookings.php" 
               class="block px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('bookings.php'); ?>">
                My Bookings
            </a>
            <a href="profile.php" 
               class="block px-3 py-2 rounded-md text-sm font-medium <?php echo isActive('profile.php'); ?>">
                Profile
            </a>
        </div>
    </div>
</nav>

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