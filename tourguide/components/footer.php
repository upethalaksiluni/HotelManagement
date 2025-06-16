<!-- Footer -->
    <footer class="bg-navy text-white py-16">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <!-- Column 1 - Hotel Info -->
                <div>
                    <h3 class="text-xl text-gray-900 font-serif font-bold mb-4">The Royal Grand Hotel</h3>
                    <p class="text-gray-900 mb-4">Experience luxury redefined in the heart of the city.</p>
                    <div class="flex space-x-4">
                        <!-- Social Icons -->
                        <a href="#" class="text-gold hover:text-gold-light transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="text-gold hover:text-gold-light transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="text-gold hover:text-gold-light transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>

                <!-- Column 2 - Quick Links -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="/hotelMana/project/accommodation.html" class="text-gray-900 hover:text-gold transition-colors">Accommodation</a></li>
                        <li><a href="/hotelMana/project/dining.html" class="text-gray-900 hover:text-gold transition-colors">Dining</a></li>
                        <li><a href="/hotelMana/project/offers.html" class="text-gray-900 hover:text-gold transition-colors">Offers</a></li>
                        <li><a href="/hotelMana/project/contact.html" class="text-gray-900 hover:text-gold transition-colors">Contact</a></li>
                    </ul>
                </div>

                <!-- Column 3 - Services -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Our Services</h4>
                    <ul class="space-y-2">
                        <li><a href="pages/guidebooker.php" class="text-gray-900 hover:text-gold transition-colors">Tour Guides</a></li>
                        <li><a href="index.php" class="text-gray-900 hover:text-gold transition-colors">Taxi Service</a></li>
                        <li><a href="#" class="text-gray-900 hover:text-gold transition-colors">Spa & Wellness</a></li>
                        <li><a href="#" class="text-gray-900 hover:text-gold transition-colors">Airport Transfer</a></li>
                    </ul>
                </div>

                <!-- Column 4 - Contact Info -->
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-900">
                        <p><i class="fas fa-map-marker-alt mr-2 text-gold"></i> KN 4 Ave, Kigali, Rwanda</p>
                        <p><i class="fas fa-phone mr-2 text-gold"></i> +250 788 123 456</p>
                        <p><i class="fas fa-envelope mr-2 text-gold"></i> info@The Royal Grandhotel.com</p>
                    </div>
                </div>
            </div>

            <div class="border-t border-gray-800 mt-12 pt-8 text-center text-gray-900">
                <p>&copy; 2024 The Royal Grand Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
    // Mobile menu toggle
    document.getElementById('mobile-menu-button')?.addEventListener('click', () => {
        document.getElementById('mobile-menu')?.classList.toggle('hidden');
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#mobile-menu') && !e.target.closest('#mobile-menu-button')) {
            document.getElementById('mobile-menu')?.classList.add('hidden');
        }
    });
    </script>
</body>
</html>