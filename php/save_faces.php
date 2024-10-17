<?php
session_start();

// Redirect to login page if user is not logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "evacuation_system";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];
$data = json_decode(file_get_contents("php://input"), true);
$images = $data['images'];

// Define the directory to save images: ROOT uploads/user_id/
$directory = __DIR__ . "/../uploads/$user_id/";  // Path to root-level uploads folder
if (!is_dir($directory)) {
    mkdir($directory, 0755, true); // Create user-specific directory if it doesn't exist
}

$face_images = [];
foreach ($images as $index => $image) {
    // Prepare the image data by decoding the base64 string
    $image = str_replace('data:image/png;base64,', '', $image);  // Replace png reference
    $image = str_replace(' ', '+', $image);  // Adjust base64 encoding spaces
    $imageData = base64_decode($image);
    
    // Save the image as a .jpg in the root-level uploads directory
    $filePath = $directory . "face_" . ($index + 1) . ".jpg";  // Saving as .jpg
    file_put_contents($filePath, $imageData);
    $face_images[] = $filePath; // Store the file path
}

// Update user record with face images in JSON format
$face_images_json = json_encode($face_images);
$sql = "UPDATE users SET faces='$face_images_json' WHERE id=$user_id";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false, "error" => $conn->error]);
}

$conn->close();
?>
