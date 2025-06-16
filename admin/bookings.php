<?php
require_once '../includes/header.php';

// Handle booking deletion/cancellation
if (isset($_POST['update_booking'])) {
    $booking_id = $db->escape($_POST['booking_id']);
    $status = $db->escape($_POST['status']);
    $db->query("UPDATE Bookings SET status = '$status' WHERE booking_id = '$booking_id'");
}

?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Bookings Management</h1>
    </div>

    <!-- Bookings Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check In</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Check Out</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $bookings = getAllBookings($db);
                while ($booking = $bookings->fetch_assoc()):
                ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $booking['booking_id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($booking['username']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($booking['room_number']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $booking['check_in_date']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $booking['check_out_date']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo $booking['status'] === 'booked' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo ucfirst($booking['status']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                            <select name="status" class="mr-2 border rounded p-1">
                                <option value="booked" <?php echo $booking['status'] === 'booked' ? 'selected' : ''; ?>>Booked</option>
                                <option value="cancelled" <?php echo $booking['status'] === 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
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
</div>

<?php require_once '../includes/footer.php'; ?>