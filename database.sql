CREATE DATABASE IF NOT EXISTS hotel_management;
USE hotel_management;

-- Drop tables in reverse‐dependency order (if they exist)
DROP TABLE IF EXISTS Taxi_Bookings;
DROP TABLE IF EXISTS Bookings;
DROP TABLE IF EXISTS Room_Facility_Assignments;
DROP TABLE IF EXISTS Room_Facilities;
DROP TABLE IF EXISTS Taxis;
DROP TABLE IF EXISTS Rooms;
DROP TABLE IF EXISTS Users;
-- 1) Users (both regular users and admins)
CREATE TABLE Users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(255) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  full_name VARCHAR(100) NOT NULL,
  role ENUM('user','admin') NOT NULL DEFAULT 'user',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;
-- 2) Rooms
CREATE TABLE Rooms (
  room_id INT AUTO_INCREMENT PRIMARY KEY,
  room_number VARCHAR(20) NOT NULL UNIQUE,
  room_type VARCHAR(50) NOT NULL,
  price DECIMAL(10,2) NOT NULL,
  description TEXT,
  status ENUM('available','unavailable') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB;
-- 3) Room facilities master list
CREATE TABLE Room_Facilities (
  facility_id INT AUTO_INCREMENT PRIMARY KEY,
  facility_name VARCHAR(50) NOT NULL UNIQUE
) ENGINE=InnoDB;
-- 4) Assignment of facilities to rooms (many‐to‐many)
CREATE TABLE Room_Facility_Assignments (
  room_id INT NOT NULL,
  facility_id INT NOT NULL,
  PRIMARY KEY (room_id, facility_id),
  FOREIGN KEY (room_id) REFERENCES Rooms(room_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (facility_id) REFERENCES Room_Facilities(facility_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE
) ENGINE=InnoDB;
-- 5) Room bookings
CREATE TABLE Bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  room_id INT NOT NULL,
  check_in_date DATE NOT NULL,
  check_out_date DATE NOT NULL,
  status ENUM('booked','cancelled') NOT NULL DEFAULT 'booked',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (room_id) REFERENCES Rooms(room_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  INDEX idx_booking_user (user_id),
  INDEX idx_booking_room (room_id)
) ENGINE=InnoDB;
-- 6) Taxi fleet
CREATE TABLE Taxis (
  taxi_id INT AUTO_INCREMENT PRIMARY KEY,
  vehicle_number VARCHAR(20) NOT NULL UNIQUE,
  driver_name VARCHAR(100) NOT NULL,
  driver_contact VARCHAR(20),
  status ENUM('available','unavailable') NOT NULL DEFAULT 'available'
) ENGINE=InnoDB;
-- 7) Taxi bookings
CREATE TABLE Taxi_Bookings (
  taxi_booking_id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  taxi_id INT NOT NULL,
  pickup_location VARCHAR(200) NOT NULL,
  drop_location VARCHAR(200) NOT NULL,
  pickup_time DATETIME NOT NULL,
  status ENUM('booked','cancelled') NOT NULL DEFAULT 'booked',
  created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES Users(user_id)
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  FOREIGN KEY (taxi_id) REFERENCES Taxis(taxi_id)
    ON DELETE RESTRICT
    ON UPDATE CASCADE,
  INDEX idx_taxi_booking_user (user_id),
  INDEX idx_taxi_booking_taxi (taxi_id)
) ENGINE=InnoDB; 

-- Create admin user
INSERT INTO Users (username, password, email, full_name, role) 
VALUES (
    'admin',
    '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', -- password is 'admin123'
    'admin@example.com',
    'System Administrator',
    'admin'
);