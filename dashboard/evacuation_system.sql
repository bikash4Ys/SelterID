CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,          -- Unique ID for each user
    name VARCHAR(100) NOT NULL,                 -- User's name
    email VARCHAR(100) NOT NULL UNIQUE,         -- User's email (must be unique)
    password VARCHAR(255) NOT NULL,             -- User's password (hashed)
    gender ENUM('male', 'female', 'other') NOT NULL, -- User's gender
    dob DATE NOT NULL,                           -- User's date of birth
    address VARCHAR(255),                        -- User's address
    emergency_contact VARCHAR(20)                -- User's emergency contact number
);

-- keep the database name as 'evacuation_system'