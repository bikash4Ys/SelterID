-- Create the database if it doesn't exist
CREATE DATABASE IF NOT EXISTS evacuation_system;
USE evacuation_system;

-- Create users table with necessary fields
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,  -- Password will be hashed
    gender ENUM('male', 'female', 'other') NOT NULL,
    dob DATE NOT NULL,
    address VARCHAR(255) NOT NULL,
    emergency_contact VARCHAR(20) NOT NULL,
    profile_image VARCHAR(255),      -- Path to the profile image
    faces JSON,                      -- JSON array to store paths to face scan images
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Alter the table to add any new columns if needed
-- This command is here to ensure backward compatibility if the table already exists
ALTER TABLE users
    ADD COLUMN IF NOT EXISTS profile_image VARCHAR(255),
    ADD COLUMN IF NOT EXISTS faces JSON;