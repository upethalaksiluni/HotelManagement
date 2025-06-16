<?php
require_once '../includes/header.php';

// Handle taxi deletion
if (isset($_POST['delete_taxi'])) {
    $taxi_id = $db->escape($_POST['taxi_id']);
    $db->query("DELETE FROM Taxis WHERE taxi_id = '$taxi_id'");
}

// Handle taxi addition/update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_taxi'])) {
    $vehicle_number = $db->escape($_POST['vehicle_number']);
    $driver_name = $db->escape($_POST['driver_name']);
    $driver_contact = $db->escape($_POST['driver_contact']);
    $status = $db->escape($_POST['status']);
    
    if (isset($_POST['taxi_id'])) {
        // Update
        $taxi_id = $db->escape($_POST['taxi_id']);
        $db->query("UPDATE Taxis SET 
            vehicle_number = '$vehicle_number',
            driver_name = '$driver_name',
            driver_contact = '$driver_contact',
            status = '$status'
            WHERE taxi_id = '$taxi_id'");
    } else {
        // Add new
        $db->query("INSERT INTO Taxis (vehicle_number, driver_name, driver_contact, status) 
                    VALUES ('$vehicle_number', '$driver_name', '$driver_contact', '$status')");
    }
}
?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Taxi Fleet Management</h1>
        <button onclick="openModal()" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-light">
            Add New Taxi
        </button>
    </div>

    <!-- Taxis Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle Number</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Driver Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Contact</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $taxis = $db->query("SELECT * FROM Taxis ORDER BY vehicle_number");
                while ($taxi = $taxis->fetch_assoc()):
                ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($taxi['vehicle_number']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($taxi['driver_name']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($taxi['driver_contact']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo $taxi['status'] === 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800'; ?>">
                            <?php echo ucfirst($taxi['status']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button onclick="editTaxi(<?php echo htmlspecialchars(json_encode($taxi)); ?>)" 
                                class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="taxi_id" value="<?php echo $taxi['taxi_id']; ?>">
                            <button type="submit" name="delete_taxi" 
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this taxi?')">
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
<div id="taxiModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4" id="modalTitle">Add New Taxi</h3>
            <form method="POST" id="taxiForm">
                <input type="hidden" name="taxi_id" id="taxi_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Vehicle Number</label>
                    <input type="text" name="vehicle_number" id="vehicle_number" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Driver Name</label>
                    <input type="text" name="driver_name" id="driver_name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Driver Contact</label>
                    <input type="text" name="driver_contact" id="driver_contact"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
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
                    <button type="submit" name="save_taxi"
                            class="px-4 py-2 bg-navy text-white rounded hover:bg-navy-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('taxiModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Add New Taxi';
    document.getElementById('taxiForm').reset();
    document.getElementById('taxi_id').value = '';
}

function closeModal() {
    document.getElementById('taxiModal').classList.add('hidden');
}

function editTaxi(taxi) {
    document.getElementById('taxiModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Edit Taxi';
    document.getElementById('taxi_id').value = taxi.taxi_id;
    document.getElementById('vehicle_number').value = taxi.vehicle_number;
    document.getElementById('driver_name').value = taxi.driver_name;
    document.getElementById('driver_contact').value = taxi.driver_contact;
    document.getElementById('status').value = taxi.status;
}
</script>

<?php require_once '../includes/footer.php'; ?>