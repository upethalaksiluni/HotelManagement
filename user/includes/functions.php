<?php
function formatDate($date) {
    return date('F j, Y', strtotime($date));
}

function formatDateTime($datetime) {
    return date('F j, Y g:i A', strtotime($datetime));
}

function formatCurrency($amount) {
    return '$' . number_format($amount, 2);
}

function getStatusBadgeClass($status) {
    return $status === 'booked' 
        ? 'bg-green-100 text-green-800' 
        : 'bg-red-100 text-red-800';
}

function checkRoomAvailability($db, $room_id, $check_in, $check_out) {
    $room_id = $db->escape($room_id);
    $check_in = $db->escape($check_in);
    $check_out = $db->escape($check_out);

    $query = "SELECT * FROM Bookings 
              WHERE room_id = '$room_id' 
              AND status = 'booked'
              AND (
                  (check_in_date <= '$check_in' AND check_out_date >= '$check_in')
                  OR (check_in_date <= '$check_out' AND check_out_date >= '$check_out')
                  OR (check_in_date >= '$check_in' AND check_out_date <= '$check_out')
              )";
    
    return $db->query($query)->num_rows === 0;
}

function checkTaxiAvailability($db, $taxi_id, $pickup_time) {
    $taxi_id = $db->escape($taxi_id);
    $pickup_time = $db->escape($pickup_time);

    $query = "SELECT * FROM Taxi_Bookings 
              WHERE taxi_id = '$taxi_id' 
              AND status = 'booked'
              AND pickup_time = '$pickup_time'";
    
    return $db->query($query)->num_rows === 0;
}

function getUserBookings($db, $user_id) {
    $user_id = $db->escape($user_id);
    return $db->query("SELECT b.*, r.room_number, r.room_type, r.price 
                      FROM Bookings b 
                      JOIN Rooms r ON b.room_id = r.room_id 
                      WHERE b.user_id = '$user_id' 
                      ORDER BY b.created_at DESC");
}

function getUserTaxiBookings($db, $user_id) {
    $user_id = $db->escape($user_id);
    return $db->query("SELECT tb.*, t.vehicle_number, t.driver_name 
                      FROM Taxi_Bookings tb 
                      JOIN Taxis t ON tb.taxi_id = t.taxi_id 
                      WHERE tb.user_id = '$user_id' 
                      ORDER BY tb.created_at DESC");
}

function getAvailableRooms($db) {
    return $db->query("SELECT * FROM Rooms WHERE status = 'available' ORDER BY room_type, price");
}

function getAvailableTaxis($db) {
    return $db->query("SELECT * FROM Taxis WHERE status = 'available' ORDER BY vehicle_number");
}

function cancelBooking($db, $booking_id, $user_id) {
    $booking_id = $db->escape($booking_id);
    $user_id = $db->escape($user_id);
    return $db->query("UPDATE Bookings 
                      SET status = 'cancelled' 
                      WHERE booking_id = '$booking_id' 
                      AND user_id = '$user_id'");
}

function cancelTaxiBooking($db, $booking_id, $user_id) {
    $booking_id = $db->escape($booking_id);
    $user_id = $db->escape($user_id);
    return $db->query("UPDATE Taxi_Bookings 
                      SET status = 'cancelled' 
                      WHERE taxi_booking_id = '$booking_id' 
                      AND user_id = '$user_id'");
}

function updateUserProfile($db, $user_id, $data) {
    $user_id = $db->escape($user_id);
    $email = $db->escape($data['email']);
    $full_name = $db->escape($data['full_name']);
    
    return $db->query("UPDATE Users 
                      SET email = '$email', full_name = '$full_name' 
                      WHERE user_id = '$user_id'");
}

function updateUserPassword($db, $user_id, $new_password) {
    $user_id = $db->escape($user_id);
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    
    return $db->query("UPDATE Users 
                      SET password = '$hashed_password' 
                      WHERE user_id = '$user_id'");
}