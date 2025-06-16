<?php
require_once '../includes/config.php';
require_once '../includes/db.php';
require_once './includes/functions.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$error = '';
$success = '';

// Handle taxi booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_taxi'])) {
    $taxi_id = $db->escape($_POST['taxi_id']);
    $pickup_location = $db->escape($_POST['pickup_location']);
    $drop_location = $db->escape($_POST['drop_location']);
    $pickup_time = $db->escape($_POST['pickup_time']);
    
    // Check if taxi is available
    $availability = $db->query("SELECT * FROM Taxis WHERE taxi_id = '$taxi_id' AND status = 'available'");
    
    if ($availability->num_rows > 0) {
        // Check for existing bookings at the same time
        $conflict = $db->query("SELECT * FROM Taxi_Bookings 
                              WHERE taxi_id = '$taxi_id' 
                              AND status = 'booked'
                              AND pickup_time = '$pickup_time'");
        
        if ($conflict->num_rows === 0) {
            $query = "INSERT INTO Taxi_Bookings (user_id, taxi_id, pickup_location, drop_location, pickup_time) 
                     VALUES ('$user_id', '$taxi_id', '$pickup_location', '$drop_location', '$pickup_time')";
            
            if ($db->query($query)) {
                $success = 'Taxi booked successfully!';
            } else {
                $error = 'Booking failed. Please try again.';
            }
        } else {
            $error = 'Taxi is not available at the selected time.';
        }
    } else {
        $error = 'Taxi is not available.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Taxi - Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include './components/nav.php'; ?>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-gray-900 mb-4">Book a Taxi Service</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Travel in comfort with our professional taxi service. All our drivers are experienced and vetted for your safety.
            </p>
        </div>

        <?php if ($error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6 rounded-md">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <?php if ($success): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded-md">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <!-- Taxi Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $taxis = getAvailableTaxis($db);
            while ($taxi = $taxis->fetch_assoc()):
            ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <!-- Taxi Header -->
                <div class="p-6 bg-gradient-to-r from-navy to-navy-dark text-white">
                    <div class="flex justify-between items-start">
                        <div>
                            <h3 class="text-xl font-bold mb-2"><?php echo htmlspecialchars($taxi['vehicle_number']); ?></h3>
                            <p class="text-gray-200"><?php echo htmlspecialchars($taxi['driver_name']); ?></p>
                        </div>
                        <span class="px-3 py-1 bg-green-500 text-white rounded-full text-sm font-medium">
                            Available
                        </span>
                    </div>
                </div>

                <div class="p-6">
                    <!-- Driver Info -->
                    <div class="mb-6">
                        <div class="flex items-center mb-3">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            <span class="text-gray-600"><?php echo htmlspecialchars($taxi['driver_name']); ?></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                            <span class="text-gray-600"><?php echo htmlspecialchars($taxi['driver_contact']); ?></span>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form method="POST" class="space-y-4">
                        <input type="hidden" name="taxi_id" value="<?php echo $taxi['taxi_id']; ?>">
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pickup Location</label>
                            <input type="text" name="pickup_location" required 
                                   placeholder="Enter pickup location"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-navy focus:border-navy">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Drop Location</label>
                            <input type="text" name="drop_location" required 
                                   placeholder="Enter drop location"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-navy focus:border-navy">
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Pickup Time</label>
                            <input type="datetime-local" name="pickup_time" required 
                                   min="<?php echo date('Y-m-d\TH:i'); ?>"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-navy focus:border-navy">
                        </div>
                        
                        <button type="submit" name="book_taxi" 
                                class="w-full bg-navy text-white px-6 py-3 rounded-md font-medium hover:bg-navy-light transition-colors duration-300">
                            Book Taxi
                        </button>
                    </form>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    document.querySelectorAll('input[type="datetime-local"]').forEach(input => {
        input.addEventListener('change', function() {
            const selected = new Date(this.value);
            const now = new Date();
            
            if (selected < now) {
                alert('Please select a future date and time');
                this.value = '';
            }
        });
    });
    </script>
</body>
</html>