<?php
require_once '../includes/config.php';
require_once '../includes/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'user') {
    header('Location: ../login.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$user = $db->query("SELECT * FROM Users WHERE user_id = '$user_id'")->fetch_assoc();

// Handle profile update
$success = '';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_profile'])) {
        $email = $db->escape($_POST['email']);
        $full_name = $db->escape($_POST['full_name']);
        
        // Update profile
        $query = "UPDATE Users SET email = '$email', full_name = '$full_name' WHERE user_id = '$user_id'";
        
        if ($db->query($query)) {
            $success = 'Profile updated successfully!';
            $user = $db->query("SELECT * FROM Users WHERE user_id = '$user_id'")->fetch_assoc();
        } else {
            $error = 'Failed to update profile';
        }
    } elseif (isset($_POST['change_password'])) {
        $current_password = $_POST['current_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        
        if (password_verify($current_password, $user['password'])) {
            if ($new_password === $confirm_password) {
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                $query = "UPDATE Users SET password = '$hashed_password' WHERE user_id = '$user_id'";
                
                if ($db->query($query)) {
                    $success = 'Password changed successfully!';
                } else {
                    $error = 'Failed to change password';
                }
            } else {
                $error = 'New passwords do not match';
            }
        } else {
            $error = 'Current password is incorrect';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - Hotel Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <?php include 'nav.php'; ?>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <h1 class="text-3xl font-bold text-gray-800 mb-8">My Profile</h1>

        <?php if ($success): ?>
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <div class="grid md:grid-cols-2 gap-8">
            <!-- Profile Information -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Profile Information</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Username</label>
                        <input type="text" value="<?php echo htmlspecialchars($user['username']); ?>" 
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 bg-gray-50" 
                               disabled>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" 
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="full_name" value="<?php echo htmlspecialchars($user['full_name']); ?>" 
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2" required>
                    </div>
                    
                    <div>
                        <button type="submit" name="update_profile"
                                class="w-full bg-navy text-white px-4 py-2 rounded hover:bg-navy-light transition-colors">
                            Update Profile
                        </button>
                    </div>
                </form>
            </div>

            <!-- Change Password -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-6">Change Password</h2>
                <form method="POST" class="space-y-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Current Password</label>
                        <input type="password" name="current_password" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">New Password</label>
                        <input type="password" name="new_password" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Confirm New Password</label>
                        <input type="password" name="confirm_password" required
                               class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2">
                    </div>
                    
                    <div>
                        <button type="submit" name="change_password"
                                class="w-full bg-navy text-white px-4 py-2 rounded hover:bg-navy-light transition-colors">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Account Statistics -->
        <div class="grid md:grid-cols-3 gap-6 mt-8">
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Room Bookings</h3>
                <div class="text-3xl font-bold text-navy">
                    <?php
                    $result = $db->query("SELECT COUNT(*) as count FROM Bookings WHERE user_id = '$user_id'");
                    echo $result->fetch_assoc()['count'];
                    ?>
                </div>
                <p class="text-gray-600">Total bookings made</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Taxi Bookings</h3>
                <div class="text-3xl font-bold text-navy">
                    <?php
                    $result = $db->query("SELECT COUNT(*) as count FROM Taxi_Bookings WHERE user_id = '$user_id'");
                    echo $result->fetch_assoc()['count'];
                    ?>
                </div>
                <p class="text-gray-600">Total taxi services used</p>
            </div>

            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Member Since</h3>
                <div class="text-xl font-bold text-navy">
                    <?php echo date('F j, Y', strtotime($user['created_at'])); ?>
                </div>
                <p class="text-gray-600">Account creation date</p>
            </div>
        </div>
    </div>

    <script>
        // Password validation
        document.querySelector('form[name="change_password"]').addEventListener('submit', function(e) {
            const newPassword = document.querySelector('input[name="new_password"]').value;
            const confirmPassword = document.querySelector('input[name="confirm_password"]').value;
            
            if (newPassword !== confirmPassword) {
                e.preventDefault();
                alert('New passwords do not match!');
            }
        });
    </script>
</body>
</html>