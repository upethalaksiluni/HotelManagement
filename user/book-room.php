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

// Handle room booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['book_room'])) {
    $room_id = $db->escape($_POST['room_id']);
    $check_in = $db->escape($_POST['check_in']);
    $check_out = $db->escape($_POST['check_out']);
    
    if (checkRoomAvailability($db, $room_id, $check_in, $check_out)) {
        $query = "INSERT INTO Bookings (user_id, room_id, check_in_date, check_out_date) 
                 VALUES ('$user_id', '$room_id', '$check_in', '$check_out')";
        
        if ($db->query($query)) {
            $success = 'Room booked successfully!';
        } else {
            $error = 'Booking failed. Please try again.';
        }
    } else {
        $error = 'Room is not available for selected dates.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Room - Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <?php include './components/nav.php'; ?>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl font-serif font-bold text-gray-900 mb-4">Book Your Perfect Room</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Choose from our selection of luxurious rooms and suites. Each room is designed for your comfort and equipped with modern amenities.
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

        <!-- Room Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $rooms = getAvailableRooms($db);
            while ($room = $rooms->fetch_assoc()):
            ?>
            <div class="bg-white rounded-xl shadow-lg overflow-hidden transform transition-all duration-300 hover:-translate-y-2 hover:shadow-xl">
                <!-- Room Image -->
                <div class="h-56 overflow-hidden">
                    <img src="../assets/images/rooms/<?php echo strtolower($room['room_type']); ?>.jpg" 
                         alt="<?php echo htmlspecialchars($room['room_type']); ?>"
                         class="w-full h-full object-cover transition-transform duration-300 hover:scale-110">
                </div>

                <div class="p-6">
                    <!-- Room Header -->
                    <div class="mb-4">
                        <h3 class="text-2xl font-serif font-bold text-gray-900 mb-2">
                            <?php echo htmlspecialchars($room['room_type']); ?>
                        </h3>
                        <p class="text-gray-600"><?php echo htmlspecialchars($room['description']); ?></p>
                    </div>

                    <!-- Room Features -->
                    <div class="mb-4 flex items-center space-x-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"/>
                            </svg>
                            <span>Room <?php echo htmlspecialchars($room['room_number']); ?></span>
                        </div>
                        <div class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z"/>
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z" clip-rule="evenodd"/>
                            </svg>
                            <span><?php echo formatCurrency($room['price']); ?>/night</span>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form method="POST" class="space-y-4">
                        <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Check-in Date</label>
                                <input type="date" name="check_in" required 
                                       min="<?php echo date('Y-m-d'); ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-navy focus:border-navy">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Check-out Date</label>
                                <input type="date" name="check_out" required 
                                       min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>"
                                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-navy focus:border-navy">
                            </div>
                        </div>
                        
                        <button type="submit" name="book_room" 
                                class="w-full bg-navy text-white px-6 py-3 rounded-md font-medium hover:bg-navy-light transition-colors duration-300">
                            Book Now
                        </button>
                    </form>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>

    <script>
    document.querySelectorAll('input[type="date"]').forEach(input => {
        input.addEventListener('change', function() {
            const checkIn = this.form.querySelector('input[name="check_in"]');
            const checkOut = this.form.querySelector('input[name="check_out"]');
            
            if (checkIn.value && checkOut.value) {
                if (new Date(checkOut.value) <= new Date(checkIn.value)) {
                    alert('Check-out date must be after check-in date');
                    checkOut.value = '';
                }
            }
        });
    });
    </script>
</body>
</html>