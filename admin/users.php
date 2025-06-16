<?php
require_once '../includes/header.php';

// Handle user deletion
if (isset($_POST['delete_user'])) {
    $user_id = $db->escape($_POST['user_id']);
    $db->query("DELETE FROM Users WHERE user_id = '$user_id'");
}

// Handle user addition/update
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['save_user'])) {
    $username = $db->escape($_POST['username']);
    $email = $db->escape($_POST['email']);
    $full_name = $db->escape($_POST['full_name']);
    $role = $db->escape($_POST['role']);
    
    if (isset($_POST['user_id'])) {
        // Update
        $user_id = $db->escape($_POST['user_id']);
        $db->query("UPDATE Users SET username = '$username', email = '$email', 
                    full_name = '$full_name', role = '$role' 
                    WHERE user_id = '$user_id'");
    } else {
        // Add new
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $db->query("INSERT INTO Users (username, password, email, full_name, role) 
                    VALUES ('$username', '$password', '$email', '$full_name', '$role')");
    }
}
?>

<div class="container mx-auto px-4">
    <div class="flex justify-between items-center mb-8">
        <h1 class="text-3xl font-bold text-gray-800">Users Management</h1>
        <button onclick="openModal()" class="bg-navy text-white px-4 py-2 rounded hover:bg-navy-light">
            Add New User
        </button>
    </div>

    <!-- Users Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Username</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Full Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Role</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <?php
                $users = getAllUsers($db);
                while ($user = $users->fetch_assoc()):
                ?>
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo $user['user_id']; ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['username']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['email']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap"><?php echo htmlspecialchars($user['full_name']); ?></td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                            <?php echo $user['role'] === 'admin' ? 'bg-purple-100 text-purple-800' : 'bg-green-100 text-green-800'; ?>">
                            <?php echo ucfirst($user['role']); ?>
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm">
                        <button onclick="editUser(<?php echo htmlspecialchars(json_encode($user)); ?>)" 
                                class="text-blue-600 hover:text-blue-900 mr-3">Edit</button>
                        <form method="POST" class="inline-block">
                            <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>">
                            <button type="submit" name="delete_user" 
                                    class="text-red-600 hover:text-red-900"
                                    onclick="return confirm('Are you sure you want to delete this user?')">
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
<div id="userModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <h3 class="text-lg font-medium text-gray-900 mb-4" id="modalTitle">Add New User</h3>
            <form method="POST" id="userForm">
                <input type="hidden" name="user_id" id="user_id">
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" name="username" id="username" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4" id="passwordField">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password"
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" id="email" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" name="full_name" id="full_name" required
                           class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                </div>
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700">Role</label>
                    <select name="role" id="role" required
                            class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button" onclick="closeModal()"
                            class="mr-2 px-4 py-2 text-gray-500 hover:text-gray-700">Cancel</button>
                    <button type="submit" name="save_user"
                            class="px-4 py-2 bg-navy text-white rounded hover:bg-navy-light">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openModal() {
    document.getElementById('userModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Add New User';
    document.getElementById('userForm').reset();
    document.getElementById('user_id').value = '';
    document.getElementById('passwordField').style.display = 'block';
}

function closeModal() {
    document.getElementById('userModal').classList.add('hidden');
}

function editUser(user) {
    document.getElementById('userModal').classList.remove('hidden');
    document.getElementById('modalTitle').textContent = 'Edit User';
    document.getElementById('user_id').value = user.user_id;
    document.getElementById('username').value = user.username;
    document.getElementById('email').value = user.email;
    document.getElementById('full_name').value = user.full_name;
    document.getElementById('role').value = user.role;
    document.getElementById('passwordField').style.display = 'none';
}
</script>

<?php require_once '../includes/footer.php'; ?>