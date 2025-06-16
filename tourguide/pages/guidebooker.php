<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GuideBooker - Professional Tour Guide Platform</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gray-50">
    <?php include '../components/header.php'; ?>

    <main class="pt-16">
        <!-- Hero Section -->
        <section id="home" class="min-h-screen bg-gradient-to-br from-green-600 to-blue-700 text-white">
            <div class="container mx-auto px-4 py-20">
                <div class="flex flex-col lg:flex-row items-center">
                    <div class="lg:w-1/2 mb-10 lg:mb-0">
                        <h1 class="text-4xl lg:text-6xl font-bold mb-6 animate-fade-in">
                            Discover Amazing Tours with Local Experts
                        </h1>
                        <p class="text-xl mb-8 opacity-90">
                            Connect with certified local guides for unforgettable experiences. From walking tours to adventure expeditions, find the perfect guide for your journey.
                        </p>
                        <div class="flex flex-col sm:flex-row gap-4">
                            <button class="bg-white text-green-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                                Find a Guide
                            </button>
                            <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-green-600 transition duration-300">
                                Become a Guide
                            </button>
                        </div>
                    </div>
                    <div class="lg:w-1/2">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Tour Guide" class="rounded-lg shadow-2xl">
                    </div>
                </div>
            </div>
        </section>

        <!-- Search Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <h2 class="text-3xl font-bold text-center mb-8">Find Your Perfect Guide</h2>
                    <div class="bg-gray-100 p-8 rounded-lg">
                        <form class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Destination</label>
                                <input type="text" placeholder="Where do you want to go?" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Tour Type</label>
                                <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                                    <option>Walking Tours</option>
                                    <option>Cultural Tours</option>
                                    <option>Food Tours</option>
                                    <option>Adventure Tours</option>
                                    <option>Historical Tours</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                                <input type="date" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Group Size</label>
                                <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500">
                                    <option>1-2 people</option>
                                    <option>3-5 people</option>
                                    <option>6-10 people</option>
                                    <option>10+ people</option>
                                </select>
                            </div>
                            <div class="md:col-span-2 lg:col-span-4">
                                <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                                    Search Guides
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Guides Section -->
        <section id="guides" class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Featured Local Guides</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Meet our top-rated guides who are passionate about sharing their local knowledge and creating memorable experiences.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Guide 1 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Guide" class="w-full h-64 object-cover">
                            <div class="absolute top-4 right-4 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                                <i class="fas fa-star mr-1"></i>4.9
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Maria Santos</h3>
                            <p class="text-gray-600 mb-3">Lisbon Walking Tours Expert</p>
                            <p class="text-sm text-gray-500 mb-4">
                                Passionate about Lisbon's history and culture. Specializes in historical walking tours through the old neighborhoods.
                            </p>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-green-600 font-semibold">€35/hour</span>
                                <span class="text-sm text-gray-500">127 reviews</span>
                            </div>
                            <div class="flex gap-2 mb-4">
                                <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs">Walking Tours</span>
                                <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded text-xs">History</span>
                            </div>
                            <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                View Profile
                            </button>
                        </div>
                    </div>

                    <!-- Guide 2 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Guide" class="w-full h-64 object-cover">
                            <div class="absolute top-4 right-4 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                                <i class="fas fa-star mr-1"></i>4.8
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">João Silva</h3>
                            <p class="text-gray-600 mb-3">Food & Culture Specialist</p>
                            <p class="text-sm text-gray-500 mb-4">
                                Local foodie who knows all the best hidden gems. Perfect for culinary adventures and authentic experiences.
                            </p>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-green-600 font-semibold">€45/hour</span>
                                <span class="text-sm text-gray-500">89 reviews</span>
                            </div>
                            <div class="flex gap-2 mb-4">
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs">Food Tours</span>
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded text-xs">Culture</span>
                            </div>
                            <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                View Profile
                            </button>
                        </div>
                    </div>

                    <!-- Guide 3 -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Guide" class="w-full h-64 object-cover">
                            <div class="absolute top-4 right-4 bg-green-600 text-white px-2 py-1 rounded-full text-sm">
                                <i class="fas fa-star mr-1"></i>5.0
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Ana Costa</h3>
                            <p class="text-gray-600 mb-3">Adventure & Nature Guide</p>
                            <p class="text-sm text-gray-500 mb-4">
                                Outdoor enthusiast specializing in hiking, nature walks, and adventure tours around Lisbon's natural areas.
                            </p>
                            <div class="flex items-center justify-between mb-4">
                                <span class="text-green-600 font-semibold">€40/hour</span>
                                <span class="text-sm text-gray-500">156 reviews</span>
                            </div>
                            <div class="flex gap-2 mb-4">
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs">Adventure</span>
                                <span class="bg-teal-100 text-teal-600 px-2 py-1 rounded text-xs">Nature</span>
                            </div>
                            <button class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                                View Profile
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="text-center mt-12">
                    <button class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                        View All Guides
                    </button>
                </div>
            </div>
        </section>

        <!-- Popular Destinations -->
        <section id="destinations" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Popular Destinations</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Explore the most sought-after destinations with our expert local guides.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <!-- Destination 1 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=300&h=400" alt="Lisbon" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-semibold mb-1">Lisbon</h3>
                            <p class="text-sm opacity-90">45 guides available</p>
                        </div>
                    </div>

                    <!-- Destination 2 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=300&h=400" alt="Porto" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-semibold mb-1">Porto</h3>
                            <p class="text-sm opacity-90">32 guides available</p>
                        </div>
                    </div>

                    <!-- Destination 3 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=300&h=400" alt="Sintra" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-semibold mb-1">Sintra</h3>
                            <p class="text-sm opacity-90">18 guides available</p>
                        </div>
                    </div>

                    <!-- Destination 4 -->
                    <div class="relative group overflow-hidden rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                        <img src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=300&h=400" alt="Cascais" class="w-full h-64 object-cover group-hover:scale-110 transition duration-300">
                        <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
                        <div class="absolute bottom-4 left-4 text-white">
                            <h3 class="text-xl font-semibold mb-1">Cascais</h3>
                            <p class="text-sm opacity-90">24 guides available</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Become a Guide Section -->
        <section id="become-guide" class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-2 gap-12 items-center">
                    <div>
                        <h2 class="text-4xl font-bold text-gray-900 mb-6">Become a Local Guide</h2>
                        <p class="text-lg text-gray-600 mb-8">
                            Share your passion for your city and earn money by showing visitors the best of your local area. Join our community of expert guides.
                        </p>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-2">Flexible Schedule</h4>
                                    <p class="text-gray-600">Work when you want, set your own hours and availability.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-2">Competitive Earnings</h4>
                                    <p class="text-gray-600">Earn competitive rates and keep 85% of your tour fees.</p>
                                </div>
                            </div>
                            <div class="flex items-start">
                                <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                    <i class="fas fa-check text-white text-sm"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg mb-2">Marketing Support</h4>
                                    <p class="text-gray-600">We handle marketing and bookings, you focus on great tours.</p>
                                </div>
                            </div>
                        </div>
                        <div class="mt-8">
                            <button class="bg-green-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                                Apply to Become a Guide
                            </button>
                        </div>
                    </div>
                    <div>
                        <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Guide Teaching" class="rounded-lg shadow-lg">
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works -->
        <section class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Booking your perfect tour guide is simple and straightforward.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-search text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">1. Search & Browse</h3>
                        <p class="text-gray-600">
                            Search for guides in your destination and browse their profiles, reviews, and specialties.
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-calendar-check text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">2. Book & Pay</h3>
                        <p class="text-gray-600">
                            Select your preferred guide, choose your date and time, and make a secure payment online.
                        </p>
                    </div>
                    
                    <div class="text-center">
                        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                            <i class="fas fa-map-marked-alt text-2xl text-green-600"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-4">3. Enjoy Your Tour</h3>
                        <p class="text-gray-600">
                            Meet your guide and enjoy a personalized, unforgettable experience in your destination.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Testimonials -->
        <section class="py-20 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">What Travelers Say</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Read reviews from travelers who discovered amazing experiences with our local guides.
                    </p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "Maria was an incredible guide! She showed us hidden gems in Lisbon that we never would have found on our own. Highly recommended!"
                        </p>
                        <div class="flex items-center">
                            <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <div class="font-semibold">Emily Johnson</div>
                                <div class="text-gray-600 text-sm">Tourist from USA</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "The food tour with João was amazing! We tried authentic Portuguese dishes and learned so much about the local culture."
                        </p>
                        <div class="flex items-center">
                            <img src="https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <div class="font-semibold">Marco Rossi</div>
                                <div class="text-gray-600 text-sm">Tourist from Italy</div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white p-8 rounded-lg shadow-lg">
                        <div class="flex items-center mb-4">
                            <div class="flex text-yellow-400">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </div>
                        </div>
                        <p class="text-gray-700 mb-6 italic">
                            "Ana's nature tour was the highlight of our trip! She's so knowledgeable about the local flora and fauna. Perfect for nature lovers."
                        </p>
                        <div class="flex items-center">
                            <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <div class="font-semibold">Sophie Martin</div>
                                <div class="text-gray-600 text-sm">Tourist from France</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Section -->
        <section id="contact" class="py-20 bg-white">
            <div class="container mx-auto px-4">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        Have questions about our platform or need help finding the perfect guide? We're here to help.
                    </p>
                </div>
                
                <div class="grid lg:grid-cols-2 gap-12">
                    <div>
                        <h3 class="text-2xl font-bold mb-8">Contact Information</h3>
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-map-marker-alt text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg">Address</h4>
                                    <p class="text-gray-600">Rua Augusta 123, 1100-048<br>Lisbon, Portugal</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-phone text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg">Phone</h4>
                                    <p class="text-gray-600">+351 21 123 4567</p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                    <i class="fas fa-envelope text-green-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-lg">Email</h4>
                                    <p class="text-gray-600">info@guidebooker.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h3 class="text-2xl font-bold mb-8">Send us a Message</h3>
                        <form class="space-y-6">
                            <div class="grid md:grid-cols-2 gap-6">
                                <div>
                                    <label for="first-name" class="block text-sm font-medium text-gray-700 mb-2">First Name</label>
                                    <input type="text" id="first-name" name="first-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                </div>
                                <div>
                                    <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                    <input type="text" id="last-name" name="last-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                </div>
                            </div>
                            
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                            </div>
                            
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                                <select id="subject" name="subject" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent">
                                    <option>General Inquiry</option>
                                    <option>Booking Support</option>
                                    <option>Become a Guide</option>
                                    <option>Technical Support</option>
                                </select>
                            </div>
                            
                            <div>
                                <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                                <textarea id="message" name="message" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent"></textarea>
                            </div>
                            
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700 transition duration-300">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
</body>
</html>