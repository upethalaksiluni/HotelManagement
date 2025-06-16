<?php
require_once '../includes/header.php';

// Handle facility deletion
if (isset($_POST['delete_facility'])) {
    $facility_id = $db->escape($_POST['facility_id']);
    $db->query("DELETE FROM Room_Facilities WHERE facility_id = '$facility_id'");
}

// Handle facility addition/update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_facility'])) {
    $facility_name = $db->escape($_POST['facility_name']);
    
    if (isset($_POST['facility_id'])) {
        // Update
        $facility_id = $db->escape($_POST['facility_id']);
        $db->query("UPDATE Room_Facilities SET facility_name = '$facility_name' 
                    WHERE facility_id = '$facility_id'");
    } else {
        // Add new
        $db->query("INSERT INTO Room_Facilities (facility_name) VALUES ('$facility_name')");
    }
}

// Get all facilities
$facilities = $db->query("SELECT * FROM Room_Facilities ORDER BY facility_name");
?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Facilities Management</h1>
        <button onclick="openModal()" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-light">
            Add New Facility
        </button>
    </div>

    <!-- Facilities Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Facility Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php while ($facility = $facilities->fetch_assoc()): ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $facility['facility_id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($facility['facility_name']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button onclick="editFacility(<?php echo htmlspecialchars(json_encode($facility)); ?>)" 
                                class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="facility_id" value="<?php echo $facility['facility_id']; ?>">
                            <button type="submit" name="delete_facility" 
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this facility?')">
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
<div id="facilityModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4" id="modalTitle">Add New Facility</h3>
            <form method="POST" id="facilityForm">
                <input type="hidden" name="facility_id" id="facility_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Facility Name</label>
                    <input type="text" name="facility_name" id="facility_name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                            class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">Cancel</button>
                    <button type="submit" name="save_facility"
                            class="px-4 py-2 bg-navy text-white rounded hover:bg-navy-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('facilityModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Add New Facility';
    document.getElementById('facilityForm').reset();
    document.getElementById('facility_id').value = '';
}

function closeModal() {
    document.getElementById('facilityModal').classList.add('hidden');
}

function editFacility(facility) {
    document.getElementById('facilityModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Edit Facility';
    document.getElementById('facility_id').value = facility.facility_id;
    document.getElementById('facility_name').value = facility.facility_name;
}
</script>

<?php require_once '../includes/footer.php'; ?>