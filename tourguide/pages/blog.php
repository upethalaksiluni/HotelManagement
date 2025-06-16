<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - TaxiCaller</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gray-50">
    <?php
require_once '../components/header.php';
?>

<main class="pt-16">
        <!-- Blog Header -->
        <section class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl lg:text-6xl font-bold mb-6">TaxiCaller Blog</h1>
                <p class="text-xl mb-8 max-w-3xl mx-auto">
                    Stay updated with the latest insights, tips, and news from the transportation industry.
                </p>
            </div>
        </section>

        <!-- Featured Article -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-8 mb-12">
                        <div class="flex items-center mb-4">
                            <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                            <span class="ml-4 text-gray-600">March 20, 2025</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">The Future of Urban Transportation: AI and Smart Cities</h2>
                        <p class="text-lg text-gray-700 mb-6">
                            Explore how artificial intelligence is revolutionizing urban transportation systems and what it means for taxi operators and passengers alike.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <div class="font-semibold">Sarah Johnson</div>
                                    <div class="text-sm text-gray-600">Technology Writer</div>
                                </div>
                            </div>
                            <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Read More
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog Categories -->
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="category-btn active bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">All</button>
                    <button class="category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Technology</button>
                    <button class="category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Business</button>
                    <button class="category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Industry News</button>
                    <button class="category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Tips & Guides</button>
                </div>
            </div>
        </section>

        <!-- Blog Posts Grid -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Blog Post 1 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/1595391/pexels-photo-1595391.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-blue-100 text-blue-600 px-2 py-1 rounded text-xs font-semibold">Technology</span>
                                <span class="ml-3 text-gray-500 text-sm">March 18, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                How GPS Tracking Improves Fleet Efficiency
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Discover the latest GPS tracking technologies and how they can help taxi operators optimize their fleet operations and reduce costs.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Mike Rodriguez</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 2 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-green-100 text-green-600 px-2 py-1 rounded text-xs font-semibold">Business</span>
                                <span class="ml-3 text-gray-500 text-sm">March 15, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                5 Ways to Increase Customer Satisfaction
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Learn proven strategies to improve customer experience and build loyalty in the competitive taxi and ride-sharing market.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Emma Davis</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 3 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/1366919/pexels-photo-1366919.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-purple-100 text-purple-600 px-2 py-1 rounded text-xs font-semibold">Industry News</span>
                                <span class="ml-3 text-gray-500 text-sm">March 12, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                Electric Vehicles in Taxi Fleets: A Growing Trend
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Explore the benefits and challenges of integrating electric vehicles into taxi fleets and the impact on operational costs.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Sarah Johnson</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 4 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/163398/taxi-cab-traffic-cab-163398.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-yellow-100 text-yellow-600 px-2 py-1 rounded text-xs font-semibold">Tips & Guides</span>
                                <span class="ml-3 text-gray-500 text-sm">March 10, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                Driver Safety Tips for Night Shifts
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Essential safety guidelines and best practices for taxi drivers working during night hours to ensure personal safety and security.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/1681010/pexels-photo-1681010.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Mike Rodriguez</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 5 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/358319/pexels-photo-358319.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-red-100 text-red-600 px-2 py-1 rounded text-xs font-semibold">Business</span>
                                <span class="ml-3 text-gray-500 text-sm">March 8, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                Dynamic Pricing Strategies for Taxi Operators
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Learn how to implement effective dynamic pricing strategies to maximize revenue while maintaining competitive rates for customers.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/774909/pexels-photo-774909.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Emma Davis</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>

                    <!-- Blog Post 6 -->
                    <article class="bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300">
                        <img src="https://images.pexels.com/photos/1534150/pexels-photo-1534150.jpeg?auto=compress&cs=tinysrgb&w=400" alt="Blog Post" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <div class="flex items-center mb-3">
                                <span class="bg-indigo-100 text-indigo-600 px-2 py-1 rounded text-xs font-semibold">Technology</span>
                                <span class="ml-3 text-gray-500 text-sm">March 5, 2025</span>
                            </div>
                            <h3 class="text-xl font-semibold mb-3 hover:text-blue-600 cursor-pointer">
                                Mobile App Features That Drive Customer Engagement
                            </h3>
                            <p class="text-gray-600 mb-4">
                                Discover the must-have mobile app features that keep customers engaged and increase repeat bookings in the taxi industry.
                            </p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Author" class="w-8 h-8 rounded-full mr-2">
                                    <span class="text-sm text-gray-600">Sarah Johnson</span>
                                </div>
                                <a href="#" class="text-blue-600 hover:text-blue-800 text-sm font-semibold">Read More →</a>
                            </div>
                        </div>
                    </article>
                </div>

                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <nav class="flex space-x-2">
                        <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition duration-300">Previous</button>
                        <button class="px-3 py-2 bg-blue-600 text-white rounded-lg">1</button>
                        <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition duration-300">2</button>
                        <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition duration-300">3</button>
                        <button class="px-3 py-2 bg-gray-200 text-gray-600 rounded-lg hover:bg-gray-300 transition duration-300">Next</button>
                    </nav>
                </div>
            </div>
        </section>

        <!-- Newsletter Signup -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-4">Stay Updated</h2>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Subscribe to our newsletter to receive the latest blog posts and industry insights directly in your inbox.
                </p>
                <form class="max-w-md mx-auto flex">
                    <input type="email" placeholder="Enter your email" class="flex-1 p-3 border border-gray-300 rounded-l-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-r-lg hover:bg-blue-700 transition duration-300">
                        Subscribe
                    </button>
                </form>
            </div>
        </section>
    </main>

    <?php
require_once '../components/footer.php';
?>
</body>
</html>