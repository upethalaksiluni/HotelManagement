<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <header class="fixed w-full top-0 z-50 bg-white shadow-md">
        <nav class="container mx-auto px-4 py-4">
            <div class="flex justify-between items-center">
                <div class="text-2xl font-serif font-bold text-navy">
                    The Royal Grand Hotel
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex space-x-8">
                    <a href="/hotelMana/project/indexroot.html" class="text-gray-900 hover:text-gold transition-colors">Home</a>
                    <a href="index.php" class="text-gray-900 hover:text-gold transition-colors">Taxi Service</a>
                    <a href="pages/guidebooker.php" class="text-gray-900 hover:text-gold transition-colors">Tour Guides</a>
                    <a href="pages/blog.php" class="text-gray-900 hover:text-gold transition-colors">Blog</a>
                    <a href="pages/videos.php" class="text-gray-900 hover:text-gold transition-colors">Videos</a>
                    <a href="#contact" class="text-gray-900 hover:text-gold transition-colors">Contact</a>
                </div>
                
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="md:hidden text-gray-900">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </button>
            </div>

            <!-- Mobile Menu -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="/hotelMana/project/indexroot.html" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Home</a>
                    <a href="index.php" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Taxi Service</a>
                    <a href="pages/guidebooker.php" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Tour Guides</a>
                    <a href="pages/blog.php" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Blog</a>
                    <a href="pages/videos.php" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Videos</a>
                    <a href="#contact" class="block px-3 py-2 text-gray-900 hover:text-gold transition-colors">Contact</a>
                </div>
            </div>
        </nav>
    </header>
</body>
</html>