<?php
require_once '../includes/config.php';
require_once '../includes/db.php';
require_once './includes/functions.php';

// Check authentication
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = $db->query("SELECT * FROM Users WHERE user_id = '$user_id'")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-50">
    <?php include './components/nav.php'; ?>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <!-- Welcome Section -->
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8 border-l-4 border-navy">
            <h1 class="text-2xl font-bold text-gray-800">Welcome back, <?php echo htmlspecialchars($user['full_name']); ?>!</h1>
            <p class="text-gray-600 mt-2">Manage your hotel bookings and services from your personalized dashboard.</p>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <!-- Room Bookings Stats -->
            <div class="bg-white rounded-lg shadow-sm p-6 border border-gray-200 hover:shadow-md transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-gray-600 text-sm">Active Room Bookings</h2>
                        <p class="text-2xl font-semibold text-gray-800">
                            <?php
                            $result = $db->query("SELECT COUNT(*) as count FROM Bookings 
                                                WHERE user_id = '$user_id' AND status = 'booked'");
                            echo $result->fetch_assoc()['count'];
                            ?>
                        </p>
                    </div>
                </div>
            </div>

            <!-- Recent Bookings Table -->
            <div class="col-span-full bg-white rounded-lg shadow-sm border border-gray-200">
                <div class="p-6 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-800">Recent Bookings</h2>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="table-header">Room</th>
                                <th class="table-header">Check In</th>
                                <th class="table-header">Check Out</th>
                                <th class="table-header">Status</th>
                                <th class="table-header">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            $bookings = getUserBookings($db, $user_id);
                            while ($booking = $bookings->fetch_assoc()):
                            ?>
                            <tr class="hover:bg-gray-50">
                                <td class="table-cell"><?php echo htmlspecialchars($booking['room_number']); ?></td>
                                <td class="table-cell"><?php echo formatDate($booking['check_in_date']); ?></td>
                                <td class="table-cell"><?php echo formatDate($booking['check_out_date']); ?></td>
                                <td class="table-cell">
                                    <span class="status-badge <?php echo getStatusBadgeClass($booking['status']); ?>">
                                        <?php echo ucfirst($booking['status']); ?>
                                    </span>
                                </td>
                                <td class="table-cell">
                                    <?php if ($booking['status'] === 'booked'): ?>
                                        <button onclick="cancelBooking(<?php echo $booking['booking_id']; ?>)"
                                                class="btn-danger text-sm">
                                            Cancel
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="book-room.php" class="card card-hover bg-gradient-to-br from-navy to-navy-dark text-white">
                <h3 class="text-xl font-semibold mb-2">Book a Room</h3>
                <p class="text-gray-200">Browse and book available rooms for your stay.</p>
            </a>
            <a href="book-taxi.php" class="card card-hover bg-gradient-to-br from-gold to-gold-dark text-white">
                <h3 class="text-xl font-semibold mb-2">Book a Taxi</h3>
                <p class="text-gray-200">Schedule a taxi for convenient transportation.</p>
            </a>
        </div>
    </div>

    <script>
    function cancelBooking(bookingId) {
        if (confirm('Are you sure you want to cancel this booking?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.innerHTML = `<input type="hidden" name="cancel_booking" value="${bookingId}">`;
            document.body.appendChild(form);
            form.submit();
        }
    }
    </script>
</body>
</html>