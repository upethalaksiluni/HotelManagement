<?php
require_once '../includes/header.php';

// Handle taxi booking status update
if (isset($_POST['update_booking'])) {
    $booking_id = $db->escape($_POST['taxi_booking_id']);
    $status = $db->escape($_POST['status']);
    $db->query("UPDATE Taxi_Bookings SET status = '$status' WHERE taxi_booking_id = '$booking_id'");
}
?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Taxi Bookings Management</h1>
    </div>

    <!-- Taxi Bookings Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Booking ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Pickup</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Drop Location</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Time</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $query = "SELECT tb.*, u.username, t.vehicle_number 
                         FROM Taxi_Bookings tb 
                         JOIN Users u ON tb.user_id = u.user_id 
                         JOIN Taxis t ON tb.taxi_id = t.taxi_id 
                         ORDER BY tb.pickup_time DESC";
                $bookings = $db->query($query);
                while ($booking = $bookings->fetch_assoc()):
                ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $booking['taxi_booking_id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($booking['username']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($booking['vehicle_number']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($booking['pickup_location']); ?></td>
                    <td class="px-6 py-4"><?php echo htmlspecialchars($booking['drop_location']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <?php echo date('Y-m-d H:i', strtotime($booking['pickup_time'])); ?>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo $booking['status'] === 'booked' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo ucfirst($booking['status']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="taxi_booking_id" value="<?php echo $booking['taxi_booking_id']; ?>">
                            <select name="status" class="mr-2 border rounded p-1">
                                <option value="booked" <?php echo $booking['status'] === 'booked' ? 'selected' : ''; ?>>
                                    Booked
                                </option>
                                <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>
                                    Cancelled
                                </option>
                            </select>
                            <button type="submit" name="update_booking" 
                                    class="bg-navy text-white px-3 py-1 rounded hover:bg-navy-light">
                                Update
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <!-- Mobile View for Bookings -->
    <div class="md:hidden space-y-4 mt-4">
        <?php
        // Reset the result pointer
        $bookings->data_seek(0);
        while ($booking = $bookings->fetch_assoc()):
        ?>
        <div class="bg-white p-4 rounded-lg shadow">
            <div class="flex justify-between items-center mb-2">
                <span class="font-bold">Booking #<?php echo $booking['taxi_booking_id']; ?></span>
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    <?php echo $booking['status'] === 'booked' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                    <?php echo ucfirst($booking['status']); ?>
                </span>
            </div>
            <div class="space-y-2">
                <p><span class="font-medium">User:</span> <?php echo htmlspecialchars($booking['username']); ?></p>
                <p><span class="font-medium">Vehicle:</span> <?php echo htmlspecialchars($booking['vehicle_number']); ?></p>
                <p><span class="font-medium">Pickup:</span> <?php echo htmlspecialchars($booking['pickup_location']); ?></p>
                <p><span class="font-medium">Drop:</span> <?php echo htmlspecialchars($booking['drop_location']); ?></p>
                <p><span class="font-medium">Time:</span> 
                    <?php echo date('Y-m-d H:i', strtotime($booking['pickup_time'])); ?>
                </p>
                <form method="POST" class="mt-3">
                    <input type="hidden" name="taxi_booking_id" value="<?php echo $booking['taxi_booking_id']; ?>">
                    <select name="status" class="w-full border rounded p-2 mb-2">
                        <option value="booked" <?php echo $booking['status'] === 'booked' ? 'selected' : ''; ?>>
                            Booked
                        </option>
                        <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>
                            Cancelled
                        </option>
                    </select>
                    <button type="submit" name="update_booking" 
                            class="w-full bg-navy text-white px-4 py-2 rounded hover:bg-navy-light">
                        Update Status
                    </button>
                </form>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php require_once '../includes/footer.php'; ?>