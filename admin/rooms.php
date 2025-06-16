<?php
 
require_once '../includes/header.php';

// Handle room deletion
if (isset($_POST['delete_room'])) {
    $room_id = $db->escape($_POST['room_id']);
    $db->query("DELETE FROM Rooms WHERE room_id = '$room_id'");
}

// Handle room addition/update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_room'])) {
    $room_number = $db->escape($_POST['room_number']);
    $room_type = $db->escape($_POST['room_type']);
    $price = $db->escape($_POST['price']);
    $description = $db->escape($_POST['description']);
    $status = $db->escape($_POST['status']);
    
    if (isset($_POST['room_id'])) {
        // Update
        $room_id = $db->escape($_POST['room_id']);
        $db->query("UPDATE Rooms SET room_number = '$room_number', room_type = '$room_type', 
                    price = '$price', description = '$description', status = '$status' 
                    WHERE room_id = '$room_id'");
    } else {
        // Add new
        $db->query("INSERT INTO Rooms (room_number, room_type, price, description, status) 
                    VALUES ('$room_number', '$room_type', '$price', '$description', '$status')");
    }
}
?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Rooms Management</h1>
        <button onclick="openModal()" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-light">
            Add New Room
        </button>
    </div>

    <!-- Rooms Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Room Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Type</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $rooms = getAllRooms($db);
                while ($room = $rooms->fetch_assoc()):
                ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($room['room_number']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($room['room_type']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">$<?php echo number_format($room['price'], 2); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo $room['status'] === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo ucfirst($room['status']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button onclick="editRoom(<?php echo htmlspecialchars(json_encode($room)); ?>)" 
                                class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="room_id" value="<?php echo $room['room_id']; ?>">
                            <button type="submit" name="delete_room" 
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this room?')">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div id="roomModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4" id="modalTitle">Add New Room</h3>
            <form method="POST" id="roomForm">
                <input type="hidden" name="room_id" id="room_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Room Number</label>
                    <input type="text" name="room_number" id="room_number" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Room Type</label>
                    <input type="text" name="room_type" id="room_type" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" step="0.01" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Description</label>
                    <textarea name="description" id="description"
                              class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2"></textarea>
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Status</label>
                    <select name="status" id="status" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="available">Available</option>
                        <option value="unavailable">Unavailable</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                            class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">Cancel</button>
                    <button type="submit" name="save_room"
                            class="px-4 py-2 bg-navy text-white rounded hover:bg-navy-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('roomModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Add New Room';
    document.getElementById('roomForm').reset();
    document.getElementById('room_id').value = '';
}

function closeModal() {
    document.getElementById('roomModal').classList.add('hidden');
}

function editRoom(room) {
    document.getElementById('roomModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Edit Room';
    document.getElementById('room_id').value = room.room_id;
    document.getElementById('room_number').value = room.room_number;
    document.getElementById('room_type').value = room.room_type;
    document.getElementById('price').value = room.price;
    document.getElementById('description').value = room.description;
    document.getElementById('status').value = room.status;
}
</script>

<?php require_once '../includes/footer.php'; ?>