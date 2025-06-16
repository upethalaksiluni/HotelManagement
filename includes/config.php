<?php
// First configure session parameters before starting the session
session_set_cookie_params([
    'lifetime' => 3600, // 1 hour
    'path' => '/',
    'secure' => false, // Changed from true since we're using XAMPP locally
    'httponly' => true
]);

// Then start the session if it hasn't started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'hotel_management');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

