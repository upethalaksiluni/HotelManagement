<?php
require_once 'config.php';
require_once 'db.php';
require_once 'functions.php';

// Remove session_start() since it's already in config.php

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="hidden md:flex flex-col w-64 bg-navy text-white">
            <div class="p-4">
                <h1 class="text-2xl font-bold">Hotel Admin</h1>
            </div>
            <nav class="flex-1">
                <a href="index.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Dashboard</span>
                </a>
                <a href="users.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Users</span>
                </a>
                <a href="rooms.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Rooms</span>
                </a>
                <a href="bookings.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Bookings</span>
                </a>
                <a href="facilities.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Facilities</span>
                </a>
                <a href="taxis.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Taxis</span>
                </a>
                <a href="taxi-bookings.php" class="flex items-center py-2 px-4 hover:bg-navy-light">
                    <span>Taxi Bookings</span>
                </a>
            </nav>
            <div class="p-4">
                <a href="logout.php" class="flex items-center text-red-300 hover:text-red-100">
                    <span>Logout</span>
                </a>
            </div>
        </div>

        <!-- Mobile nav toggle -->
        <div class="md:hidden fixed top-0 left-0 right-0 bg-navy p-4">
            <button id="mobile-menu-button" class="text-white">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>

        <!-- Mobile menu -->
        <div id="mobile-menu" class="hidden fixed inset-0 bg-navy z-50 md:hidden">
            <div class="p-4">
                <nav class="space-y-4">
                    <a href="index.php" class="block text-white hover:bg-navy-light p-2">Dashboard</a>
                    <a href="users.php" class="block text-white hover:bg-navy-light p-2">Users</a>
                    <a href="rooms.php" class="block text-white hover:bg-navy-light p-2">Rooms</a>
                    <a href="bookings.php" class="block text-white hover:bg-navy-light p-2">Bookings</a>
                    <a href="facilities.php" class="block text-white hover:bg-navy-light p-2">Facilities</a>
                    <a href="taxis.php" class="block text-white hover:bg-navy-light p-2">Taxis</a>
                    <a href="taxi-bookings.php" class="block text-white hover:bg-navy-light p-2">Taxi Bookings</a>
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
            </main>
        </div>
    </div>
    <script src="../js/admin.js"></script>
</body>
</html>