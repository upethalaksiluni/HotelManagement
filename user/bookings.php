<?php
require_once '../includes/config.php';
require_once '../includes/db.php';
require_once './includes/functions.php';

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];

// Handle booking cancellations
if (isset($_POST['cancel_booking'])) {
    $booking_id = $db->escape($_POST['booking_id']);
    cancelBooking($db, $booking_id, $user_id);
}

if (isset($_POST['cancel_taxi_booking'])) {
    $booking_id = $db->escape($_POST['taxi_booking_id']);
    cancelTaxiBooking($db, $booking_id, $user_id);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings - Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <?php include './components/nav.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Page Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">My Bookings</h1>
            <p class="mt-2 text-gray-600">View and manage all your room and taxi bookings</p>
        </div>

        <!-- Room Bookings Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Room Bookings</h2>
            </div>
            
            <!-- Desktop View -->
            <div class="hidden md:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check In</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check Out</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $bookings = getUserBookings($db, $user_id);
                        while ($booking = $bookings->fetch_assoc()):
                        ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($booking['room_number']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($booking['room_type']); ?></td>
                            <td class="px-6 py-4"><?php echo formatDate($booking['check_in_date']); ?></td>
                            <td class="px-6 py-4"><?php echo formatDate($booking['check_out_date']); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php echo getStatusBadgeClass($booking['status']); ?>">
                                    <?php echo ucfirst($booking['status']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($booking['status'] === 'booked'): ?>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                                        <button type="submit" name="cancel_booking" 
                                                onclick="return confirm('Are you sure you want to cancel this booking?')"
                                                class="text-red-600 hover:text-red-900">
                                            Cancel
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Mobile View -->
            <div class="md:hidden">
                <?php
                $bookings->data_seek(0); // Reset pointer to start
                while ($booking = $bookings->fetch_assoc()):
                ?>
                <div class="p-4 border-b border-gray-200">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold">Room <?php echo htmlspecialchars($booking['room_number']); ?></h3>
                            <p class="text-sm text-gray-600"><?php echo htmlspecialchars($booking['room_type']); ?></p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo getStatusBadgeClass($booking['status']); ?>">
                            <?php echo ucfirst($booking['status']); ?>
                        </span>
                    </div>
                    <div class="space-y-1 text-sm">
                        <p><span class="text-gray-600">Check In:</span> <?php echo formatDate($booking['check_in_date']); ?></p>
                        <p><span class="text-gray-600">Check Out:</span> <?php echo formatDate($booking['check_out_date']); ?></p>
                    </div>
                    <?php if ($booking['status'] === 'booked'): ?>
                        <div class="mt-3">
                            <form method="POST" class="inline">
                                <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                                <button type="submit" name="cancel_booking"
                                        onclick="return confirm('Are you sure you want to cancel this booking?')"
                                        class="text-red-600 hover:text-red-900">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>

        <!-- Taxi Bookings Section -->
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Taxi Bookings</h2>
            </div>
            
            <!-- Desktop View -->
            <div class="hidden md:block">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pickup</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Drop</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <?php
                        $taxi_bookings = getUserTaxiBookings($db, $user_id);
                        while ($booking = $taxi_bookings->fetch_assoc()):
                        ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4"><?php echo htmlspecialchars($booking['vehicle_number']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($booking['pickup_location']); ?></td>
                            <td class="px-6 py-4"><?php echo htmlspecialchars($booking['drop_location']); ?></td>
                            <td class="px-6 py-4"><?php echo formatDateTime($booking['pickup_time']); ?></td>
                            <td class="px-6 py-4">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php echo getStatusBadgeClass($booking['status']); ?>">
                                    <?php echo ucfirst($booking['status']); ?>
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <?php if ($booking['status'] === 'booked'): ?>
                                    <form method="POST" class="inline">
                                        <input type="hidden" name="taxi_booking_id" value="<?php echo $booking['taxi_booking_id']; ?>">
                                        <button type="submit" name="cancel_taxi_booking"
                                                onclick="return confirm('Are you sure you want to cancel this taxi booking?')"
                                                class="text-red-600 hover:text-red-900">
                                            Cancel
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>

            <!-- Mobile View -->
            <div class="md:hidden">
                <?php
                $taxi_bookings->data_seek(0); // Reset pointer to start
                while ($booking = $taxi_bookings->fetch_assoc()):
                ?>
                <div class="p-4 border-b border-gray-200">
                    <div class="flex justify-between items-start mb-2">
                        <div>
                            <h3 class="font-semibold">Taxi <?php echo htmlspecialchars($booking['vehicle_number']); ?></h3>
                            <p class="text-sm text-gray-600"><?php echo formatDateTime($booking['pickup_time']); ?></p>
                        </div>
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo getStatusBadgeClass($booking['status']); ?>">
                            <?php echo ucfirst($booking['status']); ?>
                        </span>
                    </div>
                    <div class="space-y-1 text-sm">
                        <p><span class="text-gray-600">Pickup:</span> <?php echo htmlspecialchars($booking['pickup_location']); ?></p>
                        <p><span class="text-gray-600">Drop:</span> <?php echo htmlspecialchars($booking['drop_location']); ?></p>
                    </div>
                    <?php if ($booking['status'] === 'booked'): ?>
                        <div class="mt-3">
                            <form method="POST" class="inline">
                                <input type="hidden" name="taxi_booking_id" value="<?php echo $booking['taxi_booking_id']; ?>">
                                <button type="submit" name="cancel_taxi_booking"
                                        onclick="return confirm('Are you sure you want to cancel this taxi booking?')"
                                        class="text-red-600 hover:text-red-900">
                                    Cancel Booking
                                </button>
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</body>
</html>