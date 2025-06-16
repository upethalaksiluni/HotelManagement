<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Videos - TaxiCaller</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-gray-50">
    <?php include '../components/header.php'; ?>

    <main class="pt-16">
        <!-- Videos Header -->
        <section class="bg-gradient-to-r from-blue-600 to-purple-700 text-white py-20">
            <div class="container mx-auto px-4 text-center">
                <h1 class="text-4xl lg:text-6xl font-bold mb-6">Video Library</h1>
                <p class="text-xl mb-8 max-w-3xl mx-auto">
                    Watch tutorials, product demos, and customer success stories to learn more about TaxiCaller.
                </p>
            </div>
        </section>

        <!-- Featured Video -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="max-w-4xl mx-auto">
                    <div class="bg-gradient-to-r from-blue-50 to-purple-50 rounded-lg p-8 mb-12">
                        <div class="flex items-center mb-4">
                            <span class="bg-red-600 text-white px-3 py-1 rounded-full text-sm font-semibold">Featured</span>
                            <span class="ml-4 text-gray-600">Latest Video</span>
                        </div>
                        <h2 class="text-3xl font-bold mb-4">Getting Started with TaxiCaller - Complete Setup Guide</h2>
                        <div class="aspect-video bg-gray-200 rounded-lg mb-6 relative overflow-hidden">
                            <img src="https://images.pexels.com/photos/1595391/pexels-photo-1595391.jpeg?auto=compress&cs=tinysrgb&w=800&h=450" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center">
                                <button class="bg-white bg-opacity-90 rounded-full w-20 h-20 flex items-center justify-center hover:bg-opacity-100 transition duration-300">
                                    <i class="fas fa-play text-2xl text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-4 right-4 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm">
                                12:45
                            </div>
                        </div>
                        <p class="text-lg text-gray-700 mb-6">
                            Learn how to set up your TaxiCaller account from scratch, configure your fleet, and start accepting bookings in just 15 minutes.
                        </p>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <img src="https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=100&h=100" alt="Presenter" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <div class="font-semibold">Sarah Johnson</div>
                                    <div class="text-sm text-gray-600">Product Manager</div>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 text-gray-600">
                                <span class="flex items-center">
                                    <i class="fas fa-eye mr-1"></i>
                                    15.2K views
                                </span>
                                <span class="flex items-center">
                                    <i class="fas fa-thumbs-up mr-1"></i>
                                    342 likes
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Categories -->
        <section class="py-8 bg-gray-100">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center gap-4">
                    <button class="video-category-btn active bg-blue-600 text-white px-6 py-2 rounded-full hover:bg-blue-700 transition duration-300">All Videos</button>
                    <button class="video-category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Tutorials</button>
                    <button class="video-category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Product Demos</button>
                    <button class="video-category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Customer Stories</button>
                    <button class="video-category-btn bg-white text-gray-700 px-6 py-2 rounded-full hover:bg-gray-50 transition duration-300">Webinars</button>
                </div>
            </div>
        </section>

        <!-- Videos Grid -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Video 1 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="tutorials">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                8:32
                            </div>
                            <div class="absolute top-2 left-2 bg-blue-600 text-white px-2 py-1 rounded text-xs">
                                Tutorial
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                How to Set Up Driver Profiles
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Step-by-step guide to creating and managing driver profiles in your TaxiCaller dashboard.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>5.8K views</span>
                                <span>2 days ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video 2 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="product-demos">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/1366919/pexels-photo-1366919.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                15:20
                            </div>
                            <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs">
                                Demo
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                Mobile App Features Walkthrough
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Complete demonstration of all features available in the TaxiCaller mobile application.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>9.2K views</span>
                                <span>1 week ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video 3 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="customer-stories">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/163398/taxi-cab-traffic-cab-163398.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                6:45
                            </div>
                            <div class="absolute top-2 left-2 bg-purple-600 text-white px-2 py-1 rounded text-xs">
                                Success Story
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                CityTaxi Success Story
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                How CityTaxi increased their revenue by 40% using TaxiCaller's dispatch system.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>12.5K views</span>
                                <span>2 weeks ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video 4 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="webinars">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/358319/pexels-photo-358319.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                45:30
                            </div>
                            <div class="absolute top-2 left-2 bg-red-600 text-white px-2 py-1 rounded text-xs">
                                Webinar
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                Future of Transportation Technology
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Industry experts discuss the latest trends and technologies shaping the future of transportation.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>8.7K views</span>
                                <span>3 weeks ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video 5 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="tutorials">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/1534150/pexels-photo-1534150.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                11:15
                            </div>
                            <div class="absolute top-2 left-2 bg-blue-600 text-white px-2 py-1 rounded text-xs">
                                Tutorial
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                Analytics Dashboard Overview
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                Learn how to use the analytics dashboard to track your business performance and key metrics.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>6.3K views</span>
                                <span>1 month ago</span>
                            </div>
                        </div>
                    </div>

                    <!-- Video 6 -->
                    <div class="video-item bg-white border border-gray-200 rounded-lg overflow-hidden hover:shadow-lg transition duration-300" data-category="product-demos">
                        <div class="relative aspect-video bg-gray-200">
                            <img src="https://images.pexels.com/photos/3184465/pexels-photo-3184465.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Video Thumbnail" class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                                <button class="bg-white bg-opacity-90 rounded-full w-12 h-12 flex items-center justify-center">
                                    <i class="fas fa-play text-blue-600 ml-1"></i>
                                </button>
                            </div>
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-xs">
                                9:58
                            </div>
                            <div class="absolute top-2 left-2 bg-green-600 text-white px-2 py-1 rounded text-xs">
                                Demo
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="text-lg font-semibold mb-2 hover:text-blue-600 cursor-pointer">
                                Payment System Integration
                            </h3>
                            <p class="text-gray-600 text-sm mb-3">
                                See how easy it is to integrate various payment systems with your TaxiCaller setup.
                            </p>
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>4.9K views</span>
                                <span>1 month ago</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Load More Button -->
                <div class="text-center mt-12">
                    <button class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition duration-300">
                        Load More Videos
                    </button>
                </div>
            </div>
        </section>

        <!-- Video Playlists -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Video Playlists</h2>
                
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Playlist 1 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/1595391/pexels-photo-1595391.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Playlist Thumbnail" class="w-full h-40 object-cover">
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm">
                                8 videos
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Getting Started Series</h3>
                            <p class="text-gray-600 mb-4">Complete beginner's guide to using TaxiCaller from setup to advanced features.</p>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Watch Playlist
                            </button>
                        </div>
                    </div>

                    <!-- Playlist 2 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/1097456/pexels-photo-1097456.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Playlist Thumbnail" class="w-full h-40 object-cover">
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm">
                                12 videos
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Advanced Features</h3>
                            <p class="text-gray-600 mb-4">Deep dive into advanced features and customization options for power users.</p>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Watch Playlist
                            </button>
                        </div>
                    </div>

                    <!-- Playlist 3 -->
                    <div class="bg-white rounded-lg overflow-hidden shadow-lg hover:shadow-xl transition duration-300">
                        <div class="relative">
                            <img src="https://images.pexels.com/photos/163398/taxi-cab-traffic-cab-163398.jpeg?auto=compress&cs=tinysrgb&w=400&h=225" alt="Playlist Thumbnail" class="w-full h-40 object-cover">
                            <div class="absolute bottom-2 right-2 bg-black bg-opacity-75 text-white px-2 py-1 rounded text-sm">
                                6 videos
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-semibold mb-2">Customer Success Stories</h3>
                            <p class="text-gray-600 mb-4">Real stories from taxi operators who transformed their business with TaxiCaller.</p>
                            <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                                Watch Playlist
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <?php include '../components/footer.php'; ?>
    <script>
        // Video category filtering
        document.addEventListener('DOMContentLoaded', function() {
            const categoryButtons = document.querySelectorAll('.video-category-btn');
            const videoItems = document.querySelectorAll('.video-item');
            
            categoryButtons.forEach(button => {
                button.addEventListener('click', function() {
                    // Remove active class from all buttons
                    categoryButtons.forEach(btn => {
                        btn.classList.remove('active');
                        btn.classList.remove('bg-blue-600', 'text-white');
                        btn.classList.add('bg-white', 'text-gray-700');
                    });
                    
                    // Add active class to clicked button
                    this.classList.add('active');
                    this.classList.remove('bg-white', 'text-gray-700');
                    this.classList.add('bg-blue-600', 'text-white');
                    
                    const category = this.textContent.toLowerCase().replace(' ', '-');
                    
                    // Filter video items
                    videoItems.forEach(item => {
                        const itemCategory = item.getAttribute('data-category');
                        if (category === 'all-videos' || itemCategory === category) {
                            item.style.display = 'block';
                        } else {
                            item.style.display = 'none';
                        }
                    });
                });
            });
        });
    </script>
</body>
</html>