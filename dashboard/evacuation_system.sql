CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    photo_path VARCHAR(255),
    face_encoding TEXT
);
-- keep the database name as 'evacuation_system'