<?php
require_once '../includes/config.php';

// Check if user is logged in and is admin
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

require_once '../includes/header.php'; ?>

<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Dashboard</h1>
    
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Users -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-gray-600 text-sm">Total Users</h2>
                    <p class="text-2xl font-semibold text-gray-800">
                        <?php
                        $result = $db->query("SELECT COUNT(*) as count FROM Users");
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Active Bookings -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-gray-600 text-sm">Active Bookings</h2>
                    <p class="text-2xl font-semibold text-gray-800">
                        <?php
                        $result = $db->query("SELECT COUNT(*) as count FROM Bookings WHERE status = 'booked'");
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Available Rooms -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-gray-600 text-sm">Available Rooms</h2>
                    <p class="text-2xl font-semibold text-gray-800">
                        <?php
                        $result = $db->query("SELECT COUNT(*) as count FROM Rooms WHERE status = 'available'");
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Available Taxis -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-500">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                    </svg>
                </div>
                <div class="ml-4">
                    <h2 class="text-gray-600 text-sm">Available Taxis</h2>
                    <p class="text-2xl font-semibold text-gray-800">
                        <?php
                        $result = $db->query("SELECT COUNT(*) as count FROM Taxis WHERE status = 'available'");
                        $row = $result->fetch_assoc();
                        echo $row['count'];
                        ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-lg shadow-sm mb-8">
        <div class="p-6">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Bookings</h2>
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead>
                        <tr class="text-left bg-gray-50">
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">ID</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">User</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Room</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Check In</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Check Out</th>
                            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Status</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        <?php
                        $query = "SELECT b.*, u.username, r.room_number 
                                 FROM Bookings b 
                                 JOIN Users u ON b.user_id = u.user_id 
                                 JOIN Rooms r ON b.room_id = r.room_id 
                                 ORDER BY b.created_at DESC LIMIT 5";
                        $result = $db->query($query);
                        while ($row = $result->fetch_assoc()):
                        ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['booking_id']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($row['username']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($row['room_number']); ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['check_in_date']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['check_out_date']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    <?php echo $row['status'] === 'booked' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                                    <?php echo ucfirst($row['status']); ?>
                                </span>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>