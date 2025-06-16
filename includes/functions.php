<?php
// includes/functions.php

// User related functions
function getUserById($db, $id) {
    $id = $db->escape($id);
    $result = $db->query("SELECT * FROM Users WHERE user_id = '$id'");
    return $result->fetch_assoc();
}

function getAllUsers($db) {
    return $db->query("SELECT * FROM Users ORDER BY created_at DESC");
}

// Room related functions 
function getRoomById($db, $id) {
    $id = $db->escape($id);
    $result = $db->query("SELECT * FROM Rooms WHERE room_id = '$id'");
    return $result->fetch_assoc();
}

function getAllRooms($db) {
    return $db->query("SELECT * FROM Rooms");
}

// Booking related functions
function getBookingById($db, $id) {
    $id = $db->escape($id);
    return $db->query("SELECT b.*, u.username, r.room_number 
                      FROM Bookings b 
                      JOIN Users u ON b.user_id = u.user_id 
                      JOIN Rooms r ON b.room_id = r.room_id 
                      WHERE b.booking_id = '$id'");
}

function getAllBookings($db) {
    return $db->query("SELECT b.*, u.username, r.room_number 
                      FROM Bookings b 
                      JOIN Users u ON b.user_id = u.user_id 
                      JOIN Rooms r ON b.room_id = r.room_id 
                      ORDER BY b.created_at DESC");
}

// Taxi related functions
function getTaxiById($db, $id) {
    $id = $db->escape($id);
    $result = $db->query("SELECT * FROM Taxis WHERE taxi_id = '$id'");
    return $result->fetch_assoc();
}

function getAllTaxis($db) {
    return $db->query("SELECT * FROM Taxis");
}

// Taxi booking related functions
function getTaxiBookingById($db, $id) {
    $id = $db->escape($id);
    return $db->query("SELECT tb.*, u.username, t.vehicle_number 
                      FROM Taxi_Bookings tb 
                      JOIN Users u ON tb.user_id = u.user_id 
                      JOIN Taxis t ON tb.taxi_id = t.taxi_id 
                      WHERE tb.taxi_booking_id = '$id'");
}

function getAllTaxiBookings($db) {
    return $db->query("SELECT tb.*, u.username, t.vehicle_number 
                      FROM Taxi_Bookings tb 
                      JOIN Users u ON tb.user_id = u.user_id 
                      JOIN Taxis t ON tb.taxi_id = t.taxi_id 
                      ORDER BY tb.created_at DESC");
}

// Authentication functions
function checkLogin() {
    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header('Location: login.php');
        exit();
    }
}

function loginUser($db, $username, $password) {
    $username = $db->escape($username);
    $result = $db->query("SELECT * FROM Users WHERE username = '$username' AND role = 'admin'");
    
    if ($result && $user = $result->fetch_assoc()) {
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];
            $_SESSION['username'] = $user['username'];
            return true;
        }
    }
    return false;
}

// Utility functions
function formatDate($date) {
    return date('Y-m-d H:i:s', strtotime($date));
}

function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

function generateRandomString($length = 10) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}