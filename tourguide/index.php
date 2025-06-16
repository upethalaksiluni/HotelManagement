<?php
// Remove the DOCTYPE and html/head tags as they're in header.php
require_once 'components/header.php';
?>

<main class="pt-16">
    <!-- Home Section -->
    <section id="home" class="min-h-screen bg-gradient-to-br from-blue-600 to-purple-700 text-white">
        <div class="container mx-auto px-4 py-20">
            <div class="flex flex-col lg:flex-row items-center">
                <div class="lg:w-1/2 mb-10 lg:mb-0">
                    <h1 class="text-4xl lg:text-6xl font-bold mb-6 animate-fade-in">
                        Professional Taxi & Guide Booking Platform
                    </h1>
                    <p class="text-xl mb-8 opacity-90">
                        Connect passengers with drivers and tourists with local guides. The most reliable booking platform for transportation and tours.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                            Book Now
                        </button>
                        <button class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                            Learn More
                        </button>
                    </div>
                </div>
                <div class="lg:w-1/2">
                    <img src="https://images.pexels.com/photos/358319/pexels-photo-358319.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Taxi Service" class="rounded-lg shadow-2xl">
                </div>
            </div>
        </div>
    </section>

    <!-- Online Booking Section -->
    <section id="online-booking" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Online Booking System</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Book your taxi or tour guide instantly with our advanced online booking system. Available 24/7 with real-time tracking.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-taxi text-2xl text-blue-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Instant Taxi Booking</h3>
                    <p class="text-gray-600 mb-6">Book a taxi in seconds with our user-friendly interface. Real-time availability and instant confirmation.</p>
                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Book Taxi
                    </button>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marked-alt text-2xl text-green-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">Tour Guide Booking</h3>
                    <p class="text-gray-600 mb-6">Connect with local experts for personalized tours. Professional guides for unforgettable experiences.</p>
                    <button class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Book Guide
                    </button>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg text-center hover:shadow-lg transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-clock text-2xl text-purple-600"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-4">24/7 Availability</h3>
                    <p class="text-gray-600 mb-6">Our platform is available round the clock. Book anytime, anywhere with complete peace of mind.</p>
                    <button class="bg-purple-600 text-white px-6 py-2 rounded-lg hover:bg-purple-700 transition duration-300">
                        Learn More
                    </button>
                </div>
            </div>
            
            <!-- Booking Form -->
            <div class="mt-16 bg-gray-100 p-8 rounded-lg">
                <h3 class="text-2xl font-bold text-center mb-8">Quick Booking</h3>
                <form class="grid md:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Service Type</label>
                        <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                            <option>Taxi Service</option>
                            <option>Tour Guide</option>
                            <option>Airport Transfer</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Pick-up Location</label>
                        <input type="text" placeholder="Enter pick-up location" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Destination</label>
                        <input type="text" placeholder="Enter destination" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Date & Time</label>
                        <input type="datetime-local" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="md:col-span-2 lg:col-span-4">
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            Book Now
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Solutions Section -->
    <section id="solutions" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Taxi Solutions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Comprehensive solutions for taxi operators, drivers, and passengers. Everything you need to run a successful taxi business.
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-3xl font-bold mb-6">For Taxi Operators</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Fleet Management</h4>
                                <p class="text-gray-600">Manage your entire fleet with real-time tracking, maintenance schedules, and driver assignments.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Dispatch System</h4>
                                <p class="text-gray-600">Efficient dispatch system with automated job allocation and route optimization.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Analytics & Reporting</h4>
                                <p class="text-gray-600">Comprehensive analytics and reporting tools to track performance and revenue.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.pexels.com/photos/1534150/pexels-photo-1534150.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Taxi Fleet" class="rounded-lg shadow-lg">
                </div>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12 items-center mt-20">
                <div class="order-2 lg:order-1">
                    <img src="https://images.pexels.com/photos/163398/taxi-cab-traffic-cab-163398.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Driver App" class="rounded-lg shadow-lg">
                </div>
                <div class="order-1 lg:order-2">
                    <h3 class="text-3xl font-bold mb-6">For Drivers</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Driver Mobile App</h4>
                                <p class="text-gray-600">Easy-to-use mobile app for drivers with navigation, job alerts, and earnings tracking.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Payment Integration</h4>
                                <p class="text-gray-600">Seamless payment processing with multiple payment options and instant payouts.</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mr-4 flex-shrink-0 mt-1">
                                <i class="fas fa-check text-white text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg mb-2">Performance Metrics</h4>
                                <p class="text-gray-600">Track your performance, ratings, and earnings with detailed metrics and insights.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Simple, Transparent Pricing</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Choose the plan that works best for your business. No hidden fees, no surprises.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <div class="bg-white border-2 border-gray-200 rounded-lg p-8 text-center hover:border-blue-500 transition duration-300">
                    <h3 class="text-2xl font-bold mb-4">Starter</h3>
                    <div class="text-4xl font-bold text-blue-600 mb-2">$29</div>
                    <div class="text-gray-600 mb-6">per month</div>
                    <ul class="text-left space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Up to 5 drivers
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Basic dispatch system
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Mobile apps
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Email support
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Get Started
                    </button>
                </div>
                
                <div class="bg-white border-2 border-blue-500 rounded-lg p-8 text-center relative">
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2 bg-blue-500 text-white px-4 py-1 rounded-full text-sm">
                        Most Popular
                    </div>
                    <h3 class="text-2xl font-bold mb-4">Professional</h3>
                    <div class="text-4xl font-bold text-blue-600 mb-2">$79</div>
                    <div class="text-gray-600 mb-6">per month</div>
                    <ul class="text-left space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Up to 25 drivers
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Advanced dispatch system
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Mobile apps + Web portal
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Analytics & reporting
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            24/7 phone support
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Get Started
                    </button>
                </div>
                
                <div class="bg-white border-2 border-gray-200 rounded-lg p-8 text-center hover:border-blue-500 transition duration-300">
                    <h3 class="text-2xl font-bold mb-4">Enterprise</h3>
                    <div class="text-4xl font-bold text-blue-600 mb-2">$199</div>
                    <div class="text-gray-600 mb-6">per month</div>
                    <ul class="text-left space-y-3 mb-8">
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Unlimited drivers
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Full feature access
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            White-label solution
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Custom integrations
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check text-green-500 mr-3"></i>
                            Dedicated support
                        </li>
                    </ul>
                    <button class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Contact Sales
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">About TaxiCaller</h2>
                    <p class="text-lg text-gray-600 mb-6">
                        TaxiCaller has been revolutionizing the transportation industry for over a decade. We provide cutting-edge technology solutions that connect passengers with reliable transportation services.
                    </p>
                    <p class="text-lg text-gray-600 mb-8">
                        Our platform serves millions of users worldwide, facilitating seamless connections between passengers, drivers, and tour guides. We're committed to making transportation accessible, efficient, and safe for everyone.
                    </p>
                    <div class="grid grid-cols-2 gap-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">10M+</div>
                            <div class="text-gray-600">Happy Customers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">50K+</div>
                            <div class="text-gray-600">Active Drivers</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">100+</div>
                            <div class="text-gray-600">Cities Worldwide</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-blue-600 mb-2">99.9%</div>
                            <div class="text-gray-600">Uptime</div>
                        </div>
                    </div>
                </div>
                <div>
                    <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=600" alt="Team" class="rounded-lg shadow-lg">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section id="testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">What Our Customers Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Don't just take our word for it. Here's what real customers say about our service.
                </p>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-8 rounded-lg">
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
                        "TaxiCaller has transformed our taxi business. The booking system is intuitive and our customers love the real-time tracking feature."
                    </p>
                    <div class="flex items-center">
                        <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-semibold">Sarah Johnson</div>
                            <div class="text-gray-600 text-sm">Fleet Manager</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg">
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
                        "As a driver, I appreciate how easy it is to manage my rides and track my earnings. The app is user-friendly and reliable."
                    </p>
                    <div class="flex items-center">
                        <img src="https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-semibold">Mike Rodriguez</div>
                            <div class="text-gray-600 text-sm">Taxi Driver</div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 p-8 rounded-lg">
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
                        "The tour guide booking feature is fantastic! I've discovered amazing local experiences and the guides are always professional."
                    </p>
                    <div class="flex items-center">
                        <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Customer" class="w-12 h-12 rounded-full mr-4">
                        <div>
                            <div class="font-semibold">Emma Davis</div>
                            <div class="text-gray-600 text-sm">Tourist</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Latest News & Updates</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Stay updated with the latest news, features, and announcements from TaxiCaller.
                </p>
            </div>
            
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.pexels.com/photos/1595391/pexels-photo-1595391.jpeg?auto=compress&cs=tinysrgb&w=400" alt="News" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 mb-2">March 15, 2025</div>
                        <h3 class="text-xl font-semibold mb-3">New AI-Powered Route Optimization</h3>
                        <p class="text-gray-600 mb-4">We're excited to announce our new AI-powered route optimization feature that reduces travel time by up to 30%.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-800">Read More →</a>
                    </div>
                </article>
                
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&w=400" alt="News" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 mb-2">March 10, 2025</div>
                        <h3 class="text-xl font-semibold mb-3">Partnership with EcoCar Initiative</h3>
                        <p class="text-gray-600 mb-4">TaxiCaller partners with EcoCar to promote sustainable transportation solutions across major cities.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-800">Read More →</a>
                    </div>
                </article>
                
                <article class="bg-white rounded-lg shadow-lg overflow-hidden hover:shadow-xl transition duration-300">
                    <img src="https://images.pexels.com/photos/1366919/pexels-photo-1366919.jpeg?auto=compress&cs=tinysrgb&w=400" alt="News" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <div class="text-sm text-blue-600 mb-2">March 5, 2025</div>
                        <h3 class="text-xl font-semibold mb-3">Mobile App Version 3.0 Released</h3>
                        <p class="text-gray-600 mb-4">Our latest mobile app update includes enhanced security features and improved user interface design.</p>
                        <a href="#" class="text-blue-600 font-semibold hover:text-blue-800">Read More →</a>
                    </div>
                </article>
            </div>
            
            <div class="text-center mt-12">
                <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    View All News
                </button>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Frequently Asked Questions</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Find answers to common questions about our platform and services.
                </p>
            </div>
            
            <div class="max-w-4xl mx-auto">
                <div class="space-y-4">
                    <div class="faq-item border border-gray-200 rounded-lg">
                        <button class="faq-question w-full text-left p-6 font-semibold text-lg hover:bg-gray-50 focus:outline-none">
                            How does the online booking system work?
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div class="faq-answer hidden p-6 pt-0 text-gray-600">
                            Our online booking system allows customers to book rides instantly through our website or mobile app. Simply enter your pickup location, destination, and preferred time, and we'll match you with the nearest available driver.
                        </div>
                    </div>
                    
                    <div class="faq-item border border-gray-200 rounded-lg">
                        <button class="faq-question w-full text-left p-6 font-semibold text-lg hover:bg-gray-50 focus:outline-none">
                            What payment methods do you accept?
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div class="faq-answer hidden p-6 pt-0 text-gray-600">
                            We accept all major credit cards, debit cards, PayPal, and cash payments. Our secure payment system ensures your financial information is always protected.
                        </div>
                    </div>
                    
                    <div class="faq-item border border-gray-200 rounded-lg">
                        <button class="faq-question w-full text-left p-6 font-semibold text-lg hover:bg-gray-50 focus:outline-none">
                            Can I track my ride in real-time?
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div class="faq-answer hidden p-6 pt-0 text-gray-600">
                            Yes! All rides can be tracked in real-time through our mobile app or website. You'll receive live updates on your driver's location and estimated arrival time.
                        </div>
                    </div>
                    
                    <div class="faq-item border border-gray-200 rounded-lg">
                        <button class="faq-question w-full text-left p-6 font-semibold text-lg hover:bg-gray-50 focus:outline-none">
                            How do I become a driver?
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div class="faq-answer hidden p-6 pt-0 text-gray-600">
                            To become a driver, you need a valid driver's license, vehicle insurance, and a clean driving record. Apply through our website and complete our verification process to get started.
                        </div>
                    </div>
                    
                    <div class="faq-item border border-gray-200 rounded-lg">
                        <button class="faq-question w-full text-left p-6 font-semibold text-lg hover:bg-gray-50 focus:outline-none">
                            Is the tour guide booking feature available in all cities?
                            <i class="fas fa-chevron-down float-right mt-1"></i>
                        </button>
                        <div class="faq-answer hidden p-6 pt-0 text-gray-600">
                            Our tour guide booking feature is currently available in major tourist destinations. We're constantly expanding to new cities based on demand and availability of qualified guides.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-20 bg-gray-100">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Get in Touch</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Have questions or need support? We're here to help. Contact us through any of the following methods.
                </p>
            </div>
            
            <div class="grid lg:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-8">Contact Information</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-map-marker-alt text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Address</h4>
                                <p class="text-gray-600">123 Business Street, Suite 100<br>New York, NY 10001</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-phone text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Phone</h4>
                                <p class="text-gray-600">+1 (555) 123-4567</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-envelope text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Email</h4>
                                <p class="text-gray-600">info@taxicaller.com</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                                <i class="fas fa-clock text-blue-600"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">Business Hours</h4>
                                <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday - Sunday: 10:00 AM - 4:00 PM</p>
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
                                <input type="text" id="first-name" name="first-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                            <div>
                                <label for="last-name" class="block text-sm font-medium text-gray-700 mb-2">Last Name</label>
                                <input type="text" id="last-name" name="last-name" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>
                        </div>
                        
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Message</label>
                            <textarea id="message" name="message" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                        </div>
                        
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Login Modals -->
    <div id="user-login-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">User Login</h3>
                <button class="modal-close text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    Login
                </button>
                <div class="text-center">
                    <a href="#" class="text-blue-600 hover:text-blue-800">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <span class="text-gray-600">Don't have an account? </span>
                    <a href="#" class="text-blue-600 hover:text-blue-800">Sign up</a>
                </div>
            </form>
        </div>
    </div>

    <div id="owner-login-modal" class="modal fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg p-8 max-w-md w-full mx-4">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold">Owner Login</h3>
                <button class="modal-close text-gray-500 hover:text-gray-700">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <form class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Business Email</label>
                    <input type="email" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                    <input type="password" class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                    Login
                </button>
                <div class="text-center">
                    <a href="#" class="text-blue-600 hover:text-blue-800">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <span class="text-gray-600">New business owner? </span>
                    <a href="#" class="text-blue-600 hover:text-blue-800">Register now</a>
                </div>
            </form>
        </div>
    </div>
</main>

<?php
require_once 'components/footer.php';
?>